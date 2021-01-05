<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jet extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Jet_Model');
	}
	
	function list($by)
	{
		$data['countries'] = $this->Jet_Model->getCountries();
		$data['builders'] = $this->Jet_Model->getBuilders();
		
		if($by == 'model'){ // Liste ordonnée par N° fascicule (en fait modèle)
			$data['jets'] = $this->Jet_Model->getJetsList();
			// copie des données pour modèles présents plusieurs fois dans collection
			$this->fighter->copy_dataDouble_for_list($data);
		} else {			// Liste ordonnée par constructeur
			$data['jets'] = $this->Jet_Model->getJetsListByBuilder();
		}
		
		foreach($data['jets'] as $jet){ // Ajout champs longévité
			$start = $jet->carrier_start;
			$end = $jet->carrier_end;
			$end = ($end != null) ? $end : date('Y');
			$jet->longevity = $end - $start;
		}

		$this->fighter->add_flags_on_list($data); // Ajout drapeaux
		
		$this->layout->set_title('jet');
		$this->layout->view('jet/list',$data);
	}

	function card($id)
	{
		$jet = $this->Jet_Model->getModel($id);
		// copie des données pour modèles présents plusieurs fois dans collection
		if($jet->copy_id > 0){
			// Garde en mémoire id et model
			$id = $jet->id;
			$model = $jet->model;
			$copied = $jet->copy_id;
			// Copie données du modèle "original" vers doublon
			$jet_copy = $this->Jet_Model->getModel($copied);
			$jet = $jet_copy;
			//  Rétablie id et model (seuls champs différents entre doublons)
			$jet->id = $id;
			$jet->model = $model;
		}

		$data['jet'] = $jet;
		$builderId = $data['jet']->builder_id;
		$data['builder'] = $this->Jet_Model->getBuilder($builderId);
		$data['photo'] = $this->Jet_Model->getPhoto($id);
		$data['countries'] = $this->Jet_Model->getCountries();
		$this->fighter->add_flags_on_card($data); // Ajout drapeaux
		
		$this->layout->set_title('jet');
		$this->layout->view('jet/card',$data);
	}

	function sortBy($field)
	{
		$data['countries'] = $this->Jet_Model->getCountries();
		$data['builders'] = $this->Jet_Model->getBuilders();
		$data['jets'] = $this->Jet_Model->getFirst_items($field);

		$this->fighter->add_flags_on_list($data); // Ajout drapeaux
		
		$possible = array(
            'carrier_start' => 'Début carrière',
            'built_nb' => 'Nb fabriqués',
            'max_speed' => 'Vitesse Max. (Km/h)',
            'max_thrust' => 'Poussée Max. (avec PC)(Kg)',
            'max_range' => 'Rayon action (Km)',
            'ceiling' => 'Plafond pratique (m)'
		);
        $data['field'] = array($field, $possible[$field]);
        
		$this->layout->set_title('jet');
		$this->layout->view('jet/sortBy',$data);
	}
}