<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('Jet_Model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		//$this->output->enable_profiler(TRUE);
	}

	/* TABLEAU DE BORD USER  */
	
	function index()
	{
		$userId = $this->session->id;
		$this->session->unset_userdata('photo');

		$this->load->model('Bourse_Model');
		$data['user'] = $this->User_Model->getUser($userId);
		$data['collection'] = $this->User_Model->getCollection($userId);
		$data['jet_data'] = $this->Jet_Model->getJetsAndBuilders();
		$data['annonces'] = $this->Bourse_Model->getUserAds($userId);
		$data['favorites'] = $this->Bourse_Model->getFavorisAds($userId);
		$data['members'] = $this->User_Model->getUsers();

		// Ajout model_name + builder_name dans $data['annonces']
		foreach($data['annonces'] as $annonce){
			foreach($data['jet_data'] as $jet){
				if($annonce->model_id == $jet->id){
					$annonce->model_name = $jet->model;
					$annonce->builder_name = $jet->builder_name;
				}
			}
		}

		// Ajout model_name + builder_name dans $data['favorites']
		foreach($data['favorites'] as $favorite){
			foreach($data['jet_data'] as $jet){
				if($favorite->model_id == $jet->id){
					$favorite->model_name = $jet->model;
					$favorite->builder_name = $jet->builder_name;
				}
			}
		}

		$this->layout->set_title('dashboard');
		$this->layout->view('user/dashboard',$data);
	}

	/* MODIF COORDONNEES USER, CHOIX COMPTE(PRIVE/PUBLIC) ET COLLECTIONS DETENUES  */
	
	function mod_infos()
	{
		$userId = $this->session->id;
		$data['user'] = $this->User_Model->getUser($userId);
		$data['collection'] = $this->User_Model->getCollection($userId);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('dashboard');
			$this->layout->view('user/mod_infos',$data);

			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$data = array(
				'pseudo' => $this->input->post('pseudo'),
				'nom' => $this->input->post('nom'),
				'prenom' => $this->input->post('prenom'),
				'email' => $this->input->post('email'),
        		'phone' => $this->input->post('phone'),
        		'pays' => $this->input->post('pays'),
        		'adresse' => $this->input->post('adresse'),
        		'CP' => $this->input->post('CP'),
        		'ville' => $this->input->post('ville'),
				'profil' => $this->input->post('profil')
			);
			$this->MY_Model->modif('user', $userId, $data);

			//MaJ BDD collection
			//premier caractére > collection active si 1
			$jet_haveTable[0] = ($this->input->post('jet') == 'on') ? 1 : 0;
			for($i=1; $i < 74; $i++){
				$jet_haveTable[$i] = "0";
			}
			$jet_have = implode($jet_haveTable);

			$ww2_haveTable[0] = ($this->input->post('ww2') == 'on') ? 1 : 0;
			for($i=1; $i < 61; $i++){
				$ww2_haveTable[$i] = "0";
			}
			$ww2_have = implode($ww2_haveTable);
	
			$data = array(
				'user_id' => $userId,
				'jet_have' => $jet_have,
				'jet_double' => $jet_have,
				'ww2_have' => $ww2_have,
				'ww2_double' => $ww2_have
			);
			$this->User_Model->modifCollection($userId, $data);
			redirect('user');
		}
	}

	/* GESTION COLLECTIONS AVIONS A REACTION + SECONDE GUERRE MONDIALE  */

	function mod_collection($collectionName) //Choix modeles détenus dans une collection
	{
		$userId = $this->session->id;
		$data['collection'] = $this->User_Model->getCollection($userId);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('dashboard');
			$this->layout->view("user/mod_".$collectionName."_collection",$data);

			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$haveTable[0] = "1";
			$count = 0;
			for($i=1; ($collectionName == "jet") ? $i < 74 : $i < 61; $i++){
				$haveTable[$i] = ($this->input->post("model$i") == 'on') ? 1 : 0;
				if($haveTable[$i] == "1"){
					$count++;
				}
			}
			$have = implode($haveTable);

			$data = array(
				$collectionName."_have" => $have,
				$collectionName."Count" => $count
			);
			$this->User_Model->modifCollection($userId, $data);
			redirect('user');
		}
	}

	function sel_all($collectionName) //Sélectionne tous modeles d'une collection
	{
		$userId = $this->session->id;
		$data['collection'] = $this->User_Model->getCollection($userId);
		
		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('dashboard');
			$this->layout->view("user/mod_".$collectionName."_collection",$data);
			
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {			
			$haveTable = [];
			for($i=0; ($collectionName == "jet") ? $i < 74 : $i < 61; $i++){
				$haveTable[$i] = "1";
			}
			$have = implode($haveTable);

			$data = array(
				$collectionName."_have" => $have
			);
			$this->User_Model->modifCollection($userId, $data);

			$data['collection'] = $this->User_Model->getCollection($userId);
			redirect("user/mod_collection/$collectionName",$data);
		}
	}

	function add_double($collectionName) //Sauvegarde modeles en double
	{
		$userId = $this->session->id;
		$data['collection'] = $this->User_Model->getCollection($userId);
		
		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('dashboard');
			$this->layout->view("user/mod_".$collectionName."_collection",$data);
			
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			//liste les doubles			
			$double = $this->input->post('double');
			$doubleTable = str_split($double);
			$doubleTable[0] = "1";

			$rang = $this->input->post('new_double');
			if($doubleTable[$rang] == "0"){
				$doubleTable[$rang] = "1";
			} else {
				$doubleTable[$rang] = "0";
			}
			$double = implode($doubleTable);

			//compte nb de doubles
			$count = 0;
			for($i=1; ($collectionName == "jet") ? $i < 74 : $i < 61; $i++){
				if($doubleTable[$i] == "1"){
					$count++;
				}
			}

			//sauvegarde BDD
			$data = array(
				$collectionName."_double" => $double,
				$collectionName."DoubleCount" => $count
			);
			$this->User_Model->modifCollection($userId, $data);

			$data['collection'] = $this->User_Model->getCollection($userId);
			redirect("user/mod_collection/$collectionName",$data);
		}
	}

	/* AFFICHAGE COLLECTIONS AVIONS A REACTION + SECONDE GUERRE MONDIALE  */

	function aff_collection($collectionName) //Affiche modeles détenus dans une collection
	{
		$userId = $this->session->id;
		$data['collection'] = $this->User_Model->getCollection($userId);

		$have = ($collectionName == "jet") ? 'jet_have' : 'ww2_have';
		$data['have'] = str_split($data['collection']->$have);
		
		$this->layout->set_title('jet');
		$this->layout->view('user/'.$collectionName.'_collection',$data);
	}

	/* ANNONCES USER  */

	function add_annonce() // Ajout annonce user
	{
		$userId = $this->session->id;
		$data['user'] = $this->User_Model->getUser($userId);
		$data['jet_data'] = $this->Jet_Model->getJetsAndBuilders();
		
		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('dashboard');
			$this->layout->view("user/add_annonce",$data);
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;

		} else {
			
			$data = array(
				'user_id' => $userId,
				'deal' => $this->input->post('deal'),
				'collection' => $this->input->post('type'),
				'model_id' => $this->input->post('model'),
				'price' => $this->input->post('price'),
				'text' => $this->input->post('text'),
				'dept' => substr($data['user']->CP,0,2),
				'location' => $data['user']->ville.','.$data['user']->pays,
				'photo' => (isset($this->session->photo)) ? $this->session->photo : ''
			);
			$this->MY_Model->add('annonces', $data);
			redirect('user/add_annonce');
		}
	}

	function mod_annonce($adId) // Modif annonce user
	{
		$this->load->model('Bourse_Model');

		$data['jet_data'] = $this->Jet_Model->getJetsAndBuilders();
		$data['annonce'] = $this->Bourse_Model->getUserAd($adId);

		//Ajout model_name + builder_name dans $data['annonces']
		$annonce = $data['annonce'];
			foreach($data['jet_data'] as $jet){
				if($annonce->model_id == $jet->id){
					$annonce->model_name = $jet->model;
					$annonce->builder_name = $jet->builder_name;
				}
			}
		
		if ($this->form_validation->run() == FALSE ){
			$this->layout->set_title('dashboard');
			$this->layout->view('user/mod_annonce',$data);

			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			
			$data = array(
				'price' => $this->input->post('price'),
				'text' => $this->input->post('text'),
				'photo' => (isset($this->session->photo)) ? $this->session->photo : $this->input->post('photo')
			);
			$this->MY_Model->modif('annonces', $adId, $data);
			redirect('user');
		}
	}

	function del_photo($adId) // Delete photo dans mod_annonce user
	{
		$data = array(
			'photo' => ''
		);
		$this->MY_Model->modif('annonces', $adId, $data);

		$referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
	}

	function del_annonce($adId) //Delete annonce user
	{
		$this->MY_Model->del('annonces', $adId);
		redirect('user');
	}
}