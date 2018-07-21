<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	public function registrarUsuario($idUser,$nombreUser,$nombre,$email,$sexo,$fecha_naci,$pass,$fecha,$hora){
		$data = array(
		 'nombre_usuario' => $nombreUser,
		 'nombre' => $nombre,
		 'email' => $email,
		 'sexo' => $sexo,
		 'fecha_nacimiento' => $fecha_naci,
		 'password' => $pass,
		 'fecha_registro' => $fecha,
		 'hora_registro' => $hora
		 );
		 $this->db->insert('usuarios',$data);

	}
	public function loginUsuario($email,$password){
		$this->db->select('idusuario, nombre_usuario, email, password')
             ->from('usuarios')
             ->where('email', $email);

	    $result = $this->db->get();

	    if($result->num_rows() > 0)
	    {
	        $row = $result->row();

	        //Verificas que el password sea correcto
	        if(password_verify($password, $row->password))
	        {
	            $data = [
	                'email'   => $row->email,
	                'idUser' => $row->idusuario,
	                'nomUser' => $row->nombre_usuario,
	                'logged_in' => true
	            ];

	            $this->session->set_userdata($data);
	            return true;
	        }
	        else
	        {
	            //En este caso la contraseña es incorrecta
	            return false;
	        }
	    }
	}
	public function existeUsuario($nomUser){
		$this->db->select('nombre_usuario')->from('usuarios')->where('nombre_usuario',$nomUser);
		$result = $this->db->get();
		if($result->num_rows() > 0){
			//existe el suaurio
			return true;
		}else{
			//no existe el usuario
			return false;
		}
	}
	public function existeNombreUsuario($nombreUsuario){
		$this->db->select('nombre_usuario')->from('usuarios')->where('nombre_usuario',$nombreUsuario);
		$result = $this->db->get();
		if($result->num_rows() > 0){
			//existe el suaurio
			return true;
		}else{
			//no existe el usuario
			return false;
		}
	}

}