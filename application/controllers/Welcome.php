<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ModelData');
		$this->load->helper('string');
		$this->load->library('session');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function index()
	{
		if(($this->session->stat) == null){
			$this->load->view('login');
		}else{
			$data['page'] 	= 'Home';
			$data['aksi']	= 'Home.js';
			$this->load->view('ViewHere', $data);
		}
	}

}
