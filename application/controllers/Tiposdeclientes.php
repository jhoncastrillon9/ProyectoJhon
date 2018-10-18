<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Para entrar a este controlador le podemos aplciar desde el constructor que valide
si esta logueado o que es lo mismo que exista la variable de session*/

class Tiposdeclientes extends CI_Controller 
{

	//con ese controlador hereda del CIcontroller heredamos su consteructor 
	public function __construct(){
		parent::__construct();
		//cargar libreria de crud gropsery 
		$this->load->library("grocery_CRUD");
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
		//invocar libreria CRUD grosery
		//para esto se necesita mandarle una serie de parametros a la librearia que son 
		//Nombre tabla campos requeridos, columnas a visulaizar campos a cargar en el sistema
		//la librearia devuelve una variable qu se llama render - la visualizacionde lso pedido 
		//CCss fil rutas donde los estilsod e la libreria
		//js files las lrutas de la librerias
		//todod lso parametros se l pasan a la vista yse imprimen ene ella.
		// sie n la configuracion solo se paa la tabla la libreria asume y pinta todos los camposques eencuentren ene ekl

		$crud = new grocery_CRUD();
		//aplicar el tema de la tabla que deseamos datatables o flexigrid
		$crud->set_theme('flexigrid');
		//cargartabla
		$crud->set_table('tiposdeclientes');
		//titulo que se ene l encabezado de la tabla
		$crud->Set_subject('Listado de tipos de clientes');
		//definir que texto queremso mostrar en el comapos
		$crud->display_as('Nombre','Tipo de cliente');
		$crud->display_as('FechaRegistro','Fecha Registro');
		$crud->display_as('FechaModificación','Feha Modificación');
		//campos obligatorios
		$crud->required_fields(array('Nombre'));
		//campos conseerados unicos
		$crud->unique_fields(array('Nombre'));
		//campso a mostratr
		$crud->fields(array('Nombre'));
		//geenrar el render 
		$tabla = $crud->render();
		//cuando se general el render el genera un avaribale output que es dodne esta todo el contenido resultante de la configuracion
		$vector['tabla']=$tabla->output;
		$vector['css_files']=$tabla->css_files;
		$vector['js_files']=$tabla->js_files;



		$this->load->view('Tiposdeclientes',$vector );
	}
}

?>