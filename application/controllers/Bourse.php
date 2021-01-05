<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bourse extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Bourse_Model');
		$this->load->model('Jet_Model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');	
	}
	
	/* ACCUEIL BOURSE */

	function index()
	{
		$userId = $this->session->id;
		$data['user'] = $this->User_Model->getUser($userId);
		$data['jet_data'] = $this->Jet_Model->getJetsAndBuilders();
		
		// Set session attribut dept et dist
		$this->session->dept = (isset($this->session->dept)) ? $this->session->dept : substr($data['user']->CP,0,2);
		$this->session->dist = (isset($this->session->dist)) ? $this->session->dist : '100';
		$this->session->req_perso = (isset($this->session->req_perso)) ? $this->session->req_perso : 'Votre requête';

		$this->layout->set_title('bourse');
		$this->layout->view('bourse/home', $data);
	}

	/* RESULTATS REQUETE ANNONCES EBAY */

	function search_ebay()
	{
		if ($this->form_validation->run() == FALSE){
			$this->index();
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;

		} else {

			$userId = $this->session->id;
			$data['user'] = $this->User_Model->getUser($userId);

			// Récup choix
			$loc_ebay = $this->input->post('loc_ebay');  // sélection distance max ou pas
			$dist = $this->input->post('dist');  // distance en km
			$req = $this->input->post('req');
			$req_perso = $this->input->post('req_perso');
			$req = ($req == 'req_perso') ? $req_perso : $req;

			// Set session attribut pour conservation choix
			$this->session->loc_ebay = $loc_ebay;
			$this->session->dist = $dist;
			$this->session->req = $req;
			$this->session->req_perso = $req_perso;
			
			// Préparation requête URL en fonction choix user
			$url = "https://svcs.ebay.com/services/search/FindingService/v1";
			$url .= "?OPERATION-NAME=findItemsByKeywords";
			$url .= "&SERVICE-VERSION=1.0.0";
			$url .= APP_NAME;
			$url .= "&GLOBAL-ID=EBAY-FR";
			$url .= "&RESPONSE-DATA-FORMAT=JSON";
			$url .= "&REST-PAYLOAD";
			$url .= "&buyerPostalCode=".$data['user']->CP;
			$url .= "&sortOrder=CountryAscending";  //en premier le pays, puis pays limitrophes
			$url .= "&sortOrder=DistanceNearest";   //au plus proche par rapport au code postal fournie

			if($loc_ebay == 'dist'){
				$url .= "&itemFilter(0).name=LocalSearchOnly&itemFilter(0).value=true";  //recherche locale only
				$url .= "&itemFilter(1).name=MaxDistance";  //à partir du CP et dans une distance
				$url .= "&itemFilter(1).value=".$dist;  //... de x km
			}

			//$url .= "&descriptionSearch=true";    if true, permet recherche combinée mots + catégorie
			$url .= "&keywords=".$req;  // mots clés recherchés
			//$url .= "&categoryId=Avion+miniatures+Altaya";  ... dans quelles catégories

			/* Autres options de recherche
			$url .= "outputSelector(0)=SellerInfo";
			$url .= "outputSelector(1)=StoreInfo";
			$url .= "outputSelector(1)=AspectHistogram";
			$url .= "outputSelector(1)=CategoryHistogram";
			$url .= "paginationInput.pageNumber=2";  //nb de pages résultats (par défaut 1 page)
			$url .= "&paginationInput.entriesPerPage=5";  //nb résultats par page (par défaut 100) */
			
			// Récup json
			$json = file_get_contents($url);
			$ebay_result = json_decode($json);

			// Mise en place data pour vue
			$root = $ebay_result->findItemsByKeywordsResponse[0];
			$ebayStatus = $root->ack[0];

			if($ebayStatus != 'Success'){
				$data['ebayMsg'] = $root->errorMessage[0]->error[0]->message[0];
				$data['count'] = 0;
			} else {
				$ebayItem = $root->searchResult[0];
				$data['item'] = (isset($ebayItem->item)) ? $ebayItem->item : '';
				$data['count'] = count($data['item']);
			}

			$this->layout->set_title('bourse');
			$this->layout->view('bourse/search_ebay',$data);
		}
	}

	/* RESULTATS REQUETE ANNONCES SITE */

	function search_site()
	{
		if ($this->form_validation->run() == FALSE){
			$this->index();
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;

		} else {

			$data['members'] = $this->User_Model->getUsers();
			$data['favorites'] = $this->Bourse_Model->checkFavoris($this->session->id);

			// Récup choix
			$loc_site = $this->input->post('loc_site');  // sélection distance max ou pas
			$dept = $this->input->post('dept');  // distance en km
			$collection = $this->input->post('collection');
			$model = $this->input->post('model');
			$req_model = $this->input->post('req_model');

			// Set session attribut pour conservation choix
			$this->session->loc_site = $loc_site;
			$this->session->dept = $dept;
			$this->session->model = $model;
			
			// Select tous modeles / collection / France entière
			if($loc_site == 'fra' && $model == 'all'){
				$data['annonces'] = $this->Bourse_Model->getCollectionAds($collection);
			}

			// Select tous modeles / collection / Departement
			if($loc_site == 'dept' && $model == 'all'){
				$data['annonces'] = $this->Bourse_Model->getCollectionAdsByDept($collection,$dept);
			}

			// Select un modele / collection / France entière
			if($loc_site == 'fra' && $model != 'all'){
				$data['annonces'] = $this->Bourse_Model->getModelAds($req_model);
			}

			// Select un modele / collection / Departement
			if($loc_site == 'dept' && $model != 'all'){
				$data['annonces'] = $this->Bourse_Model->getModelAdsByDept($req_model,$dept);
			}

			// Compte nb annonces trouvées
			$data['annonces'] = (isset($data['annonces'])) ? $data['annonces'] : [];
			$count = 0; foreach($data['annonces'] as $annonce){ $count++;}
			$data['count'] = $count;
			
			// Ajout model_name + builder_name dans $data['annonces']
			if($count != 0){
				$data['jet_data'] = $this->Jet_Model->getJetsAndBuilders();

				foreach($data['annonces'] as $annonce){
					foreach($data['jet_data'] as $jet){
						if($annonce->model_id == $jet->id){
							$annonce->model_name = $jet->model;
							$annonce->builder_name = $jet->builder_name;
						}
					}
				}
			}

			// Check si annonces classées ou non en favoris
			foreach($data['annonces'] as $annonce){
				foreach($data['favorites'] as $favorite){
					if($favorite->ad_id == $annonce->id){
						$annonce->favoris = 1;
						break;
					} else {
						$annonce->favoris = 0;
					}
				}
			}

			$this->session->annonces = $data['annonces'];
			$this->session->count = $data['count'];
			$this->layout->set_title('bourse');
			$this->layout->view('bourse/search_site',$data);
		}
	}

	/* ANNONCES FAVORITES */

	function add_favoris_site($adId)
	{
		// stocke information dans table favoris
		$addFav = array(
			'user_id' => $this->session->id,
			'ad_id' => $adId
		);
		$this->MY_Model->add('favoris', $addFav);

		// mise à jour affichage, btn favoris passe de rouge à vert
		$data['annonces'] = $this->session->annonces;
		$data['count'] = $this->session->count;
		$data['favorites'] = $this->Bourse_Model->checkFavoris($this->session->id);

		foreach($data['annonces'] as $annonce){
			foreach($data['favorites'] as $favorite){
				if($favorite->ad_id == $annonce->id){
					$annonce->favoris = 1;
					break;
				} else {
					$annonce->favoris = 0;
				}
			}
		}

		$this->session->annonces = $data['annonces'];
		$this->layout->set_title('bourse');
		$this->layout->view('bourse/search_site',$data);
	}

	// function add_favoris_ebay() TODO : ajout favoris ebay

	function del_favoris_site($adId)
	{
		$this->Bourse_Model->delFavoris($adId);
		redirect('user');
	}
}