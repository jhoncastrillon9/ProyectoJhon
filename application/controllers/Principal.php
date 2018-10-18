<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Para entrar a este controlador le podemos aplciar desde el constructor que valide
si esta logueado o que es lo mismo que exista la variable de session*/

class Principal extends CI_Controller 
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
		//a este controldor que carga la vista 
		//se necesitamso cargarle los vectores con las variables de session
		$vector["usuario"] = $this->session->userdata("nombreusuario");
		$vector["idusuario"] = $this->session->userdata("idusuario");
		$vector["idperfil"] = $this->session->userdata("idperfil");
		$vector["correousuario"] = $this->session->userdata("correousuario");
		$vector["fotousuario"] = $this->session->userdata("imgusuario");

		$this->load->view('Principal',$vector );
	}
}

?>