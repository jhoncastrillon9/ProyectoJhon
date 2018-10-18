<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Para entrar a este controlador le podemos aplciar desde el constructor que valide
si esta logueado o que es lo mismo que exista la variable de session*/

class Clientes extends CI_Controller 
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
		$vector["idusuario"] = $this->session->userdata("idusuario");
		$vector["idperfil"] = $this->session->userdata("idperfil");
		$vector["correousuario"] = $this->session->userdata("correousuario");
		$vector["fotousuario"] = $this->session->userdata("imgusuario");
		$vector["usuario"] = $this->session->userdata("nombreusuario");
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
		$crud->set_table('tblclientes');
		//titulo que se ene l encabezado de la tabla
		$crud->Set_subject('Listado de Clientes');
		//Relacionar tablas entre si uno a uno  con el comando set_relation 
		$crud->set_relation("tipocliente","tiposdeclientes", "Nombre");
		//campo para guarda imagen o archivo 
		
		$crud->set_field_upload("copiarut","assets/imagenes/clientes");
		$crud->set_field_upload("cedularrepresentate","assets/imagenes/clientes");



		//definir que texto queremso mostrar en el comapos
		$crud->display_as('identificacion','Identificación');
		$crud->display_as('razonsocial','Razon Social');
		$crud->display_as('nombrecomercial','Nombre Comercial');
		$crud->display_as('direccion','Direccion');
		$crud->display_as('telefono','Telefono');		
		$crud->display_as('correo','Correo');	
		$crud->display_as('cedularrepresentate','Cedula Rep.');	
		$crud->display_as('nombrerepresentante','Nombre Rep.');
		$crud->display_as('tipocliente','Tipo de cliente');
		$crud->display_as('celularrepresentate','Celular Rep.');
		$crud->display_as('copiarut','Copia del Rut.');

		$crud->set_rules('correo','Correo','required');
		

		//campos obligatorios
		$crud->required_fields(array('identificacion','razonsocial', 'nombrecomercial','direccion',  'correo','tipocliente'));
		//campso a mostratr nuevo
		$crud->fields(array('identificacion','razonsocial','nombrecomercial', 'direccion','telefono','correo', 'tipocliente','nombrerepresentante','cedularrepresentate','copiarut' ));
		$crud->columns(array('identificacion','razonsocial', 'telefono','correo', 'tipocliente','nombrerepresentante'));
		//a unc ampo se le puede amboar el tipo 		
		$crud->change_field_type('correo','email');
		//definir cual es campo que no se debe repetir o unique fiels para varios
		$crud->unique_fields(array('correo'));
		$crud->unique_fields(array('identificacion'));

		
		//ocultar campo clave en ele edit
		if ($crud->getState()=="edit") $crud->field_type("identificacion","hidden");

		//geenrar el render 
		$tabla = $crud->render();
		//cuando se general el render el genera un avaribale output que es dodne esta todo el contenido resultante de la configuracion
		$vector['tabla']=$tabla->output;
		$vector['css_files']=$tabla->css_files;
		$vector['js_files']=$tabla->js_files;



		$this->load->view('Usuarios',$vector );
	}


	//crear funcion encrptar 
	//crud grosery utiliza variables reservasd 
	//deberiamos pasar la variables que es de este aso $POST_array
	function encriptar($vector){
		//aca llegar el vector del formulario que el usuario queire ingresafr 
		//bsuca el campo clave y le die que es igual a laclave pero en formato sha1
		$vector["clave"]=sha1($vector["clave"]);

		return $vector;
	}


}

?>