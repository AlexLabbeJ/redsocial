<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reacciones_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	public function liked($idestado,$iduser){
	
		$this->db->select("*");
		$this->db->from('megusta');
		$this->db->where('idusuario',$iduser);
		$this->db->where('idestado',$idestado);
		$result = $this->db->get();
		if($result->num_rows() > 0){
			//existe el like al post
			$this->db->where('idusuario', $iduser);
			$this->db->where('idestado', $idestado);
			$this->db->delete('megusta');
			//return 2;
			$existe = true;
			
		}else{
			$datos = array(
				'idusuario' => $iduser,
				'idestado' => $idestado
			);
			$this->db->insert('megusta',$datos);
			$existe = false;
			
		}
		$data = array(
			'existe' => $existe,
			'numlikes' => $this->getNumLikes($idestado));
		return json_encode($data);
	}
	public function getLikes($idestado,$iduser){
		$this->db->select("*");
		$this->db->from('megusta');
		$this->db->where('idusuario',$iduser);
		$this->db->where('idestado',$idestado);
		$result = $this->db->get();
		if($result->num_rows() > 0){
			//existe el like al post
			return true;
		}else{
			return false;
			
		}
	}
	public function getNumLikes($idestado){
		$this->db->select("*");
		$this->db->from('megusta');
		$this->db->where('idestado',$idestado);
		$result = $this->db->get();
		return $result->num_rows();
		
	}
}

/* End of file Reacciones_model.php */
/* Location: ./application/models/Reacciones_model.php */
  ?>
