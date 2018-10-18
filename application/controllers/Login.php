<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Controlador Por defecto login
Se cargara la pagina del login*/
/*en los controladores si deseamos cargar libreria, modelos otros controladores usamos 
el metodo construc para que tengamos que estar instanciadno en cada metodo o funcion los mismo procesos*/
class Login extends CI_Controller {

	//con ese controlador hereda del CIcontroller heredamos su consteructor 
	public function __construct(){
		parent::__construct();

		$this->load->Model('login_model');
	}

	//cargar el modelo que permite validar si el usuario existe
	//para llamar el modelo se le coloca _model antes 
	



	public function index()
	{
		$this->load->view('login');
	}



		public function acesso()
	{
		//llamar cosnulta que se realizo en elogin mdoel 
		$resultados=$this->login_model->validar_Usuario();
		//si encuentra resultados lo mande a prioncipal pero cargardo las variables o sino cagar vista login 
		//cuando existan variables de session es mejor redirecionar
		if (count($resultados)) {
			//cargar sessiones
			//las variables de session se cargan usando la funcion set_userdata y lo qyue es un vector pasando el nombe y elñ valor dela session que desesmos
			$data_session=array(
				'idusuario' => $resultados[0]["id"],
				'nombreusuario' => $resultados[0]["nombre"],
				'idperfil' => $resultados[0]["perfil"],
				'correousuario' => $resultados[0]["correo"],
				'imgusuario' => $resultados[0]["Foto"],
			 );
			$this->session->set_userdata($data_session);
			redirect('Principal');

		}
		else
		{
			redirect('login');			
		}
		
	}
}

?>