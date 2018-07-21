<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		
		$data['title'] = 'Your title';
		$this->load->view('layout/header',$data);
		$this->load->view('index');
		$this->load->view('layout/footer');
	}
}
