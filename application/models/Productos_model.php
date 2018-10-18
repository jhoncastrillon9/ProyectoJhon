<?php
/* 
Modelo general de productos
*/
class Productos_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->helper('security');
		$this->tabla="tblproductos";
	}

	function listar() {
	
		$query=$this->db->get($this->tabla);
		return $query->result_array();
	
	}

}
?>










