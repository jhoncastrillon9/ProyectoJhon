<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*Para entrar a este controlador le podemos aplciar desde el constructor que valide
si esta logueado o que es lo mismo que exista la variable de session*/

class Productos extends CI_Controller 
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
		$crud->set_table('tblproductos');
		//titulo que se ene l encabezado de la tabla
		$crud->Set_subject('Listado de productos');
		//Relacionar tablas entre si uno a uno  con el comando set_relation 
		//$crud->set_relation("tipocliente","tiposdeclientes", "Nombre");
		//campo para guarda imagen o archivo 
		
		$crud->set_field_upload("Imagen","assets/imagenes/productos");
		
		//Relacionar tablas entre si uno a uno  con el comando set_relation 
		$crud->set_relation("IdProveedor","tblproveedores", "razonsocial");

		//definir que texto queremso mostrar en el comapos
		$crud->display_as('id','Código');
		$crud->display_as('IdProveedor','Proveedor');

		//Nombre del campo - Como lo quiero llamar cuando salga el error - la regla
		$crud->set_rules('Nombre','Nombre','required');
		$crud->set_rules('Stock','Stock','required');
		$crud->set_rules('IdProveedor','Proveedor','required');
		$crud->set_rules('Precio','Precio','required');

		//campos obligatorios
		$crud->required_fields(array('Nombre','Stock', 'IdProveedor','Precio'));

		//campso a mostratr nuevo
		$crud->fields(array('Nombre','Descripcion','Imagen', 'Stock','IdProveedor'));

		$crud->columns(array('Nombre','Descripcion', 'Imagen','IdProveedor', 'Precio'));

	
		//ocultar campo clave en ele edit
		if ($crud->getState()=="edit") $crud->field_type("id","hidden");

		//geenrar el render 
		$tabla = $crud->render();
		//cuando se general el render el genera un avaribale output que es dodne esta todo el contenido resultante de la configuracion
		$vector['tabla']=$tabla->output;
		$vector['css_files']=$tabla->css_files;
		$vector['js_files']=$tabla->js_files;

		$this->load->view('productos',$vector );
	}

}

?>