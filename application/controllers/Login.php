<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}
	
	public function index()
	{
		$this->layout->set_title('accueil');
		$this->layout->view('front/login');
		//$this->layout->view('front/signin');
		//$this->layout->view('front/change_pwd');
		//$this->layout->view('user/member_mod');
		//$this->layout->view('user/dashboard');
		//$this->layout->view('user/member_collection');
		//$this->layout->view('jet/fiches');
	}

	public function validation(){
		$userId = $this->input->get('id', TRUE);
		$hash = $this->input->get('hash', TRUE);

		if($this->User_Model->validUser($userId,$hash)){
			//initialise BDD user
			$data = array(
				'active' => '1'
			);
			$this->MY_Model->modif('user', $userId, $data);

			//initialise BDD collection
			//string de caractéres 0 ou 1
			//premier caractére > collection inactive pour l'instant
			//autres caractéres > aucun modèle détenu pour l'instant 
			$jet_haveTable = [];
			$jet_doubleTable = [];
			for($i=0; $i < 74; $i++){
				$jet_haveTable[$i] = "0";
				$jet_doubleTable[$i] = "0";
			}
			$jet_have = implode($jet_haveTable);
			$jet_double = implode($jet_doubleTable);

			$ww2_haveTable = [];
			$ww2_doubleTable = [];
			for($i=0; $i < 61; $i++){
				$ww2_haveTable[$i] = "0";
				$ww2_doubleTable[$i] = "0";
			}
			$ww2_have = implode($ww2_haveTable);
			$ww2_double = implode($ww2_doubleTable);
	
			$data = array(
				'user_id' => $userId,
				'jet_have' => $jet_have,
				'jet_double' => $jet_double,
				'ww2_have' => $ww2_have,
				'ww2_double' => $ww2_double
			);
			$this->MY_Model->add('collection',$data);

			$this->session->set_flashdata('info', "Bienvenue ! Votre compte a été validé avec succès. Merci de vous connectez.");
		} else {
			$this->session->set_flashdata('notvalid', "Désolé ! Votre compte n'a pas pu être validé. Tentez une nouvelle inscription SVP.");
		}
		redirect('login');
	}

	public function connexion()
	{
		$pseudo = $this->input->post("pseudo");
		$pwd = $this->input->post("password");
		$userVerif = $this->User_Model->checkUserExist($pseudo,$pwd);

	    if ($this->form_validation->run() === FALSE){
			$this->index();
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} elseif($userVerif === FALSE) {
			$this->session->set_flashdata('notvalid', "Pseudo ou password invalide, merci de réessayer");
			$this->index();
		} elseif($userVerif != FALSE && $userVerif->active == '0') {
			$this->session->set_flashdata('notvalid', "Merci de valider tout d'abord votre inscription via le mail que vous avez du recevoir");
			$this->index();
		} else {
			$userId = $userVerif->id;
			$this->User_Model->setSession($userId);
			redirect('user');
		}
	}

	public function deconnexion(){
		$array_items = array('id', 'pseudo', 'email');
		$this->session->unset_userdata($array_items);
		session_destroy();
		redirect('login');
	}

	public function userChangePwd(){
		
		$pseudo = $this->input->post("pseudo");
		$email = $this->input->post("email");
		$password = $this->input->post('password');
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$userVerif = $this->User_Model->verifPseudoMail($pseudo,$email);

		if ($this->form_validation->run() === FALSE){
			$this->layout->set_title('accueil');
			$this->layout->view('front/change_pwd');
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
	    } else {
			if($userVerif === FALSE){
				$this->session->set_flashdata('notvalid', "Désolé ! Vérifiez ... Pseudo ou mail inconnu. Sinon tentez une nouvelle inscription.");

				$this->layout->set_title('accueil');
				$this->layout->view('front/change_pwd');
			} else {
				if($userVerif->active !== '1'){
					$this->session->set_flashdata('notvalid', "Désolé ! Compte innactif. Vous n'aviez pas du finaliser votre inscription.");
					$this->layout->set_title('accueil');
					$this->layout->view('front/change_pwd');
				} else {
					$data = array(
						'password' => $hash
					);
					$this->MY_Model->modif('user', $userVerif->id, $data);
					$this->session->set_flashdata('info', "Votre mot de passe a été changé. Merci de vous connectez.");
					redirect('login');
				}
			}
		} 
	}
}