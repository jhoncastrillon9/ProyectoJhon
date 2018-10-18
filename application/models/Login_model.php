<?php 
/*mdoelo para el login o acesso al ssitema
Todos los mdoelos heredan del CI model que intereactua con la base de datos */

class Login_model extends CI_Model
{
	function __construct()
	{
		//como este modelo recibe parametros desde un formulario 
		//se recomeinda que los datos pasen por la librearia o helper security 
		//este helper permite validar sql inyecction CSFS
		$this->load->helper('security');
	}

	//crear una funcion que permita validar la existencia del usuario 
	function validar_Usuario()
	{
		//con el helper security vamos a formatear los dos campos
		//para recueperar una variabel que viene en una formulario 
		//$correo = $_POST['correo'];
		$correo=$this->input->post("correo");
		$clave=$this->input->post("clave");
		//aplicar libreria security 
		$correo=$this->security->xss_clean($correo);
		$clave=$this->security->xss_clean($clave);
		//en vea de pasar el query select * from usaremos la base de datos que se llama get_where que pida la tabal y en un vector los parametro a cosnultar
		// este tipo de consultas seimpre devuelves un vector
		$vector =  array("correo"=>$correo,"clave"=>sha1($clave));
		$query = $this->db->get_where("tblusuarios",$vector);
		
		return $query->result_array();

	}


}


 ?>
