<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}
	
	public function index()
	{
		$this->layout->set_title('accueil');
		$this->layout->view('front/signin');
	}

	public function inscription()
	{
		//Hachage password
		$pseudo = $this->input->post('pseudo');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$hash = password_hash($password, PASSWORD_DEFAULT);

	    if ($this->form_validation->run() === FALSE){
			$this->index();
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			//Sauvegarde DB (compte inactif pour l'instant)
			$data = array(
				'pseudo' => $pseudo,
				'email' => $email,
				'password' => $hash,
				'active' => '0'
			);
			$this->MY_Model->add('user', $data);
			$userId = $this->db->insert_id();

			//Envoi mail pour validation inscription
			$this->load->library('email');
			$this->email->from('brod-web@alwaysdata.net', 'No-Reply');
			$this->email->to($email);
			$this->email->subject('Création de votre compte AVIONS+Maquettes');

			$path = base_url('login/validation');
			$message = "<strong>$pseudo</strong>, merci de cliquer sur ce lien pour valider votre compte : ";
  			$message .= "<a href='$path?id=$userId&hash=$hash'>ICI</a>";

			$this->email->message($message);
			$this->email->send();

			$this->session->set_flashdata('info', "Vous allez recevoir un mail. Merci de le valider pour finaliser votre inscription.");
			redirect('login');
	    } 
	}
}