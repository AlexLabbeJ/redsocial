<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Estados extends CI_Controller {
	
		public function __construct(){
			parent::__construct();
			$this->load->model('estados_model');
			$this->load->library("LibraryCustom");
		}
		public function insertarEstado(){
			$txtEstado = $this->input->post("txtEstado");
			$idUser = $this->session->userdata('idUser');
			date_default_timezone_set('America/Santiago');
			$hora = time();
			if($txtEstado!="" && $idUser!=""){
				echo $this->estados_model->insertarEstado($idUser,$txtEstado,$hora);
			}
		}
		public function haceTiempoEstados(){ 
			$fecha = $this->input->post("hora");
			$timeActual = time();
			$diferencia = $fecha - $timeActual;
				return $this->librarycustom->haceTiempo($fecha); 
			
		} 
	
	}
	
	/* End of file Estados.php */
	/* Location: ./application/controllers/Estados.php */
 ?>