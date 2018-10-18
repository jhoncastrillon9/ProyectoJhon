<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
Controlador principal de pedidos
Aca se invocaran los metodos o funciones del proceso:
- nuevo pedido
- listar pedidos
- cambiar estado del pedido
- ver un pedido
- imprimir un pedido
Este controlador tendra su propio modelo con el cual 
interactuara con las tabla pedidos_encabezado y pedidos_detalle

*/
class Pedidos extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		// cargar el modelo de productos
		$this->load->model("productos_model");

		if (!$this->session->userdata("idusuario")) {
			redirect('login');
		}
	}


	public function index()
	{
		$vector["usuario"]=$this->session->userdata("nombredeusuario");
		$vector["fotousuario"]=$this->session->userdata("imgusuario");
		$vector["idusuario"]=$this->session->userdata("idusuario");
		$vector["idperfil"]=$this->session->userdata("idperfil");
		$vector["correousuario"]=$this->session->userdata("correousuario");

		$this->load->view('pedidos',$vector);
	}

	public function nuevopedido()
	{
		$vector["usuario"]=$this->session->userdata("nombredeusuario");
		$vector["fotousuario"]=$this->session->userdata("imgusuario");
		$vector["idusuario"]=$this->session->userdata("idusuario");
		$vector["idperfil"]=$this->session->userdata("idperfil");
		$vector["correousuario"]=$this->session->userdata("correousuario");
		// este proceso debe cargar el listado de los productos 
		// y pasar tambien el token que es valor unico por usuario
		$vector["listaproductos"]=$this->productos_model->listar();
		// generar token
		$token=base64_encode(random_bytes(32).session_id());
		$vector["token"]=$token;
		
		$this->load->view('nuevopedido',$vector);
	}



}
