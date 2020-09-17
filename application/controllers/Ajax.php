<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ModelData');
		$this->load->helper('string');
	}

	function getGambar(){
		$data = $this->ModelData->getData('tb_gambar', $where =null, 'uploaded_at', "DESC")->result_array();
		echo json_encode($data);
	}

	function updateGambar($id=null){
		$data = [
			'keterangan'	=> $this->input->post('keterangan')
		];
		$this->ModelData->actionData('update', $data, 'tb_gambar', ['id_gambar' => $id]);
		$res 	=  [
			'stat'	=> '400',
			'err'	=> false,
			'ket'	=> 'Uploaded!',
			'icon'	=> 'success',
		];
		echo json_encode($res);
	}

	function addGambar(){
		if ($_FILES['gambar']['name'] == '') {
			$res =  [
				'stat'	=> '404',
				'err'	=> true,
				'ket'	=> 'Please Choose A File!',
				'icon'	=> 'error'	 
			];
		}else{
			$config['upload_path']          = './assets/upload/';
		    $config['allowed_types']        = 'jpg|png|gif|jpeg';
		    $config['file_name']            = time()."_".uniqid();
		    $config['overwrite']			= true;
		    $this->load->library('upload', $config);
		    
		    if (! $this->upload->do_upload('gambar')) {
		    	$res =  [
					'stat'	=> '404',
					'err'	=> true,
					'ket'	=> 'Failed to upload file!',
					'icon'	=> 'error',
				];
		    }else{
		    	$file 	= $this->upload->data('file_name');
		    	$data 	= [
		    		'id_gambar'		=> uniqid(),
		    		'nm_gambar'		=> $file,
		    		'uploaded_at'	=> date('Y-m-d h:i:s'),
		    		'ukuran'		=> $_FILES['gambar']['size'],
		    		'keterangan'	=> $file
		    	];
		    	$this->ModelData->actionData('input', $data, 'tb_gambar');
		    	$res 	=  [
					'stat'	=> '400',
					'err'	=> false,
					'ket'	=> 'Uploaded!',
					'icon'	=> 'success',
				];

		    }
		}
		echo json_encode($res);
	}

	function hapusGambar($id=null){
		$this->ModelData->actionData('delete', $data=null, 'tb_gambar', ['id_gambar' => $id]);
		$res 	=  [
			'stat'	=> '400',
			'err'	=> false,
			'ket'	=> 'Data telah dihapus',
			'icon'	=> 'success',
		];
		echo json_encode($res);
	}

	function Login(){
		$username 	= $this->input->post('username');
		$password	= $this->input->post('password');

		$data 		= $this->ModelData->getData('tb_auth', ['username' => $username, 'password' => $password])->num_rows();
		if($data > 0){
			$this->session->set_userdata('stat', 'login');
			$res 	=  [
				'stat'	=> '404',
				'err'	=> false,
				'ket'	=> 'Login Sukses !',
				'icon'	=> 'success',
			];
		}else{
			$res 	=  [
				'stat'	=> '500',
				'err'	=> true,
				'ket'	=> 'Login Gagal !',
				'icon'	=> 'error',
			];
		}
		echo json_encode($res);

	}
}
