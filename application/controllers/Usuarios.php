<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');
    $this->load->model('estados_model');
    $this->load->model('comentarios_model');
    $this->load->model('reacciones_model');
	}
	public function index()
	{
		$data['title'] = 'Iniciar Sesión';
		$this->load->view('layout/header',$data);
		$this->load->view('index');
		$this->load->view('layout/footer');
	}
	public function login(){
		if($this->session->userdata('email')!="" && $this->session->userdata('logged_in')==true){
			$data['title'] = 'Bienvenido!';
			$data['menu'] = 'inicio';
      $getEstados = $this->estados_model->getEstadosIndex();
      $data["estados"] =  $getEstados;
      $data["controller"] = $this->reacciones_model;
			$this->load->view('layout/header',$data);
			$this->load->view('layout/menu',$data);
			
      $this->load->view('index', $data);
			$this->load->view('layout/footer');
		}else{
			$data['title'] = 'Iniciar Sesión';
			$this->load->view('layout/header',$data);
			$this->load->view('usuarios/login');
			$this->load->view('layout/footer');
		}
		
	}
	public function registrar(){
		$data['title'] = 'Registrar';
		$this->load->view('layout/header',$data);
		$this->load->view('usuarios/registrar');
		$this->load->view('layout/footer');

	}
	public function validar_registro(){
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('nombreReg', 'Nombre', 'required|min_length[3]|trim');
      $this->form_validation->set_rules('nombreUserReg', 'Nombre de usuario', 'required|min_length[3]|trim|is_unique[usuarios.nombre_usuario]');
			$this->form_validation->set_rules('diaNaciReg', 'Dia de Nacimiento', 'required');
			$this->form_validation->set_rules('mesNaciReg', 'Mes de Nacimiento', 'required');
			$this->form_validation->set_rules('anioNaciReg', 'Año de Nacimiento', 'required');
			$this->form_validation->set_rules('sexoReg', 'Sexo', 'required');
			$this->form_validation->set_rules('emailReg', 'E-Mail', 'required|valid_email');
			$this->form_validation->set_rules('email2Reg', 'E-Mail', 'required|valid_email|matches[emailReg]|is_unique[usuarios.email]');
			$this->form_validation->set_rules('passwordReg', 'Contraseña', 'required|min_length[3]');
			$this->form_validation->set_rules('password2Reg', 'Repetir contraseña', 'required|min_length[3]|matches[passwordReg]');
             
            //Mensajes
            // %s es el nombre del campo que ha fallado
            $this->form_validation->set_message('required','El campo %s es obligatorio.'); 
            $this->form_validation->set_message('min_length','El campo %s debe tener mas de 3 caracteres.');
            $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto.');
            $this->form_validation->set_message('matches','El campo %s debe ser igual al de arriba.');
            $this->form_validation->set_message('is_unique','El campo %s ya está en nuestro registros.');
             
             if($this->form_validation->run()==false){ //Si la validación es correcta
               $data = array(
               	'nombreReg'		=>	form_error("nombreReg"),
                'nombreUserReg'   =>  form_error("nombreUserReg"),
               	'diaNaciReg'	=>	form_error("diaNaciReg"),
               	'mesNaciReg'	=>	form_error("mesNaciReg"),
               	'anioNaciReg'	=>	form_error("anioNaciReg"),
               	'sexoReg'		=>	form_error("sexoReg"),
               	'emailReg'		=>	form_error("emailReg"),
               	'email2Reg'		=>	form_error("email2Reg"),
               	'passwordReg'	=>	form_error("passwordReg"),
               	'password2Reg'	=>	form_error("password2Reg"),
           		'status'		=>	"false");
             }else{
                $data = array(
           		'status'	=>	"true");
           		$nombre = $this->input->post('nombreReg');
              $nombre_user = $this->input->post('nombreUserReg');
           		$dia_naci = $this->input->post('diaNaciReg');
           		$mes_naci = $this->input->post('mesNaciReg');
           		$anio_naci = $this->input->post('anioNaciReg');
           		$sexo = $this->input->post('sexoReg');
           		$email = $this->input->post('email2Reg');
           		$password = $this->input->post('password2Reg');
           		 date_default_timezone_set("America/Santiago");
         		$fecha = date('d-m-Y');
          		$hora= date("H:i:s");

          		$fecha_naci = $dia_naci."-".$mes_naci."-".$anio_naci;
          		$pass = password_hash($password,PASSWORD_BCRYPT);
              $idUser = $this->randomNum();
           		$insert = $this->usuarios_model->registrarUsuario($idUser,$nombre_user,$nombre,$email,$sexo,$fecha_naci,$pass,$fecha,$hora);
             }
             echo json_encode($data);
		}
	}
	public function validar_login(){
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('emailLogin', 'E-Mail', 'required|valid_email');
			$this->form_validation->set_rules('passLogin', 'Contraseña', 'required|min_length[3]');
             
            $this->form_validation->set_message('required','El campo %s es obligatorio.'); 
            $this->form_validation->set_message('min_length','El campo %s debe tener mas de 3 caracteres.');
            $this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto.');
             
             if($this->form_validation->run()==false){ //Si la validación es incorrecta
               $data = array(
               	'emailLogin'	=>	form_error("emailLogin"),
               	'passLogin'		=>	form_error("passLogin"),
           		'status'		=>	"false");
             }else{
                
           		$email = $this->input->post('emailLogin');
           		$password = $this->input->post('passLogin');
           		$login = $this->usuarios_model->loginUsuario($email,$password);

           		if($login){
           			$data = array(
           			'status'	=>	"login");
           			$this->session->set_userdata('EMAIL_USER', $email);
           		}else{
           			$data = array(
           			'status'	=>	"nologin");
           		}
             }
             echo json_encode($data);
		}
	}
	public function logout(){
		$newdata = array(
                'email'  =>'',
                'logged_in' => FALSE,
                'nomUser' => ''
               );

	     $this->session->unset_userdata($newdata);
	     $this->session->sess_destroy();

	     redirect(base_url(),'refresh');
	}
  public function perfil($nombreUser){

    $data['title'] = 'Perfil';
  	$data['nombreUser'] = $nombreUser;
  	$data['menu'] = 'perfil';
    $this->load->view('layout/header',$data);
  	$this->load->view('layout/menu',$data);
  	if($this->load->usuarios_model->existeUsuario($nombreUser)){
  		  $this->load->view('usuarios/perfil');
  	}else{
  	  $this->load->view('usuarios/noexiste');
  	}
    $this->load->view('layout/footer');
  }
  public function buscarNombreUsuario(){
    $nombreUsuario = $this->input->post("nombreUser");
    if($this->usuarios_model->existeNombreUsuario($nombreUsuario)){
      echo true;//ya existe
    }else{
      echo false;//no existe
    }
  }
  public function randomNum() {
      $Uid=hash("md2",(string)microtime());
      return strtoupper($Uid);
  }
}
