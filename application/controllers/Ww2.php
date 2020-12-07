<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}
	
	function index()
	{
		$this->layout->set_title('Dashboard');
		$this->layout->view('back/dashboard');
	}
	
	
}