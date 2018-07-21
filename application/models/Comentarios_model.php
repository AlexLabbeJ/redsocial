<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->library("LibraryCustom");
	}
	public function getComentariosEstado($idestado){
		$this->db->select("comentarios.comentario as txtComentario, comentarios.hora as horaComentario, usuarios.nombre as nomUser,usuarios.nombre_usuario as nombre_usuario");
		$this->db->from("comentarios");
		$this->db->join("usuarios","usuarios.idusuario=comentarios.idusuario");
		$this->db->join("estados","estados.idestado=comentarios.idestado");
		$this->db->where("estados.idestado=".$idestado);
		return $this->db->get();
	}
	public function insertarComentario($idUser,$idpost,$txtComentario,$hora){
		$data = array(
			'comentario' => $txtComentario,
			'hora'       => $hora,
			'idestado'   => $idpost,
			'idusuario'  => $idUser
		 );
		 if($this->db->insert('comentarios',$data)){
		 	$return = array('insertado' => true);
		 	foreach($this->getComentariosEstado($idpost)->result() as $rowComent){
		 		$imprimir = '<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-1" style="margin-right: -10px;">
								<img src="'.base_url().'assets/imgs/img_perfil.png" alt="" width="40px">
							</div>
							<div class="col-sm-11">
								<div class="col-sm-12">
									<b><a href="'.base_url().'usuarios/perfil/'.$rowComent->nombre_usuario.'" style="color: #333;font-size: 14px;">'.$rowComent->nomUser.'</a></b>'.$rowComent->txtComentario.'
								</div>
								<div class="col-sm-8" style="margin-left: 15px;">
									<div class="row">
										<a href="" style="font-size: 12px;">Me gusta</a> &nbsp;&nbsp;
										<a href="" style="font-size: 12px;">No me gusta</a> &nbsp;&nbsp;
										<p class="text-muted" style="font-size: 12px;">'.$librarycustom->haceTiempo($rowComent->horaComentario).'
										</p> &nbsp;&nbsp;
									</div>
								</div>
							</div>
						</div>
					</div>';
					$return = array('contenido' => $imprimir);
		 	}
		 }
		 return json_encode($return);
	}

}

/* End of file Comentarios_model.php */
/* Location: ./application/models/Comentarios_model.php */
 ?>