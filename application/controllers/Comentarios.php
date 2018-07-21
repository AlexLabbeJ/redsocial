<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('comentarios_model');
	}
	public function insertarComentario(){
			$txtComentario = $this->input->post("txtComentario");
			$idpost = $this->input->post("idpost");
			$idUser = $this->session->userdata('idUser');
			date_default_timezone_set('America/Santiago');
			$hora = time();
			if($txtComentario!="" && $idpost!="" && $idUser!=""){
				echo $this->comentarios_model->insertarComentario($idUser,$idpost,$txtComentario,$hora);
			}
	}
	

}

/* End of file Comentarios.php */
/* Location: ./application/controllers/Comentarios.php */
 ?>