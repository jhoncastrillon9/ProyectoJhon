<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*controlador para salir*/

class Salir extends CI_Controller 
{

	//con ese controlador hereda del CIcontroller heredamos su consteructor 
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("idusuario")) {
			redirect('login');
		}
		//$this->load->Model('login_model');
	}


	public function index()
	{
		//destruir las sssiones y redirecionas al login 
		$this->session->sess_destroy();

		redirect('Login');
	}
}

?>