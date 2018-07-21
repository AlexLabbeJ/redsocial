<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Estados_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	public function getEstadosIndex(){
		$this->db->select("*");
		$this->db->from("estados");
		$this->db->join("usuarios", "usuarios.idusuario=estados.idusuario");
		$this->db->order_by("hora","DESC");
		return $this->db->get();
		
	}
	public function insertarEstado($idUser,$txtEstado,$hora){
		$data = array(
			'estado'    => $txtEstado,
			'hora'      => $hora,
			'mg'        => '0',
			'nomg'      => '0',
			'idusuario' => $idUser
		 );
		 if($this->db->insert('estados',$data)){
		 	return true;
		 }else{
		 	return false;
		 }
	}

}

/* End of file Estados_model.php */
/* Location: ./application/models/Estados_model.php */
?>