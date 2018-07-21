<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Reacciones extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('reacciones_model');
	}
	public function likeEstado(){
		$idestado = $this->input->post("idestado");
		$idUser = $this->session->userdata('idUser');
		
		echo $this->reacciones_model->liked($idestado,$idUser);
		
	}

}

/* End of file Reacciones.php */
/* Location: ./application/controllers/Reacciones.php */
 ?>