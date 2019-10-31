<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mymodel');
	}

	function add($p=null, $id=null){
		switch ($p) {
			case 'prodi':
				$data = array('nm_prodi' => $this->input->post('nama_prodi'), 'id_prodi' => uniqid());
				$this->Mymodel->actionData('input', $data, 'tb_prodi');
			break;
			case 'peserta':
				$data = array(
					'nama' => $this->input->post('nama'),
					'status' => $this->input->post('status'),
					'id_peserta' => $this->input->post('id_peserta'),
					'id_prodi' => $this->input->post('id_prodi'),
					'golongan' => $this->input->post('golongan'),
					'jabatan' => $this->input->post('jabatan'),
					'pass' => md5($this->input->post('pass')),
					'id_lvl' => '3',
					'log' => date('Y-m-d'),
					'aktivasi' => '0',
					'ket_id' => $this->input->post('ket_id'),
				);
				$this->Mymodel->actionData('input', $data, 'tb_peserta');
			break;
			case 'anggota':
				$data = array(
					'nm_anggota' 	=> $this->input->post('nama'),
					'stat_anggota'  => $this->input->post('status'),
					'id_sess'  		=> $id
				);
				$this->Mymodel->actionData('input', $data, 'tmp_anggota');
			break;
			case 'proposal':
				if($_FILES['file']['name'] != ''){
					$config['upload_path']          = './assets/upload/';
				    $config['allowed_types']        = 'pdf';
				    $config['max_size']				= '5000';
				    $config['file_name']            = time()."_".uniqid();
				    $config['overwrite']			= true;

				    $this->load->library('upload', $config);
				    $upload = $this->upload->do_upload('file');
				}
			break;
		}
		echo json_encode(null);
	}

	function get($p=null, $id=null){
		switch ($p) {
			case 'prodi':
				$data = $this->Mymodel->getData('tb_prodi')->result_array();
			break;
			case 'prodi_id':
				$data = $this->Mymodel->getData('tb_prodi', $where = ['id_prodi' => $id])->row_array();
			break;
			case 'peserta':
				$table = array('tb_prodi');
				$join  = array('tb_prodi.id_prodi = tb_peserta.id_prodi'); 
				$data  = $this->Mymodel->join('tb_peserta', $table, $join)->result_array();
			break;
			case 'anggota':
				$data = $this->Mymodel->getData('tmp_anggota', $where = ['id_sess' => $id])->result_array();
			break;
		}
		echo json_encode($data);
	}

	function del($p=null, $id=null){
		switch ($p) {
			case 'prodi':
				$where =  array('id_prodi' =>$id);
				$this->Mymodel->actionData('delete', $data=null, 'tb_prodi', $where);
			break;
			case 'anggota':
				$where =  array('id_tmp' =>$id);
				$this->Mymodel->actionData('delete', $data=null, 'tmp_anggota', $where);
			break;
		}
		echo json_encode(null);	
	}

	function edit($p=null, $id=null){
		switch ($p) {
			case 'prodi':
				$where =  array('id_prodi' =>$id);
				$data = array('nm_prodi' => $this->input->post('nama_prodi'));
				$this->Mymodel->actionData('update', $data, 'tb_prodi', $where);
			break;
		}
		echo json_encode(null);	
	}

	function verifikasi($id=null){
		$data 	= ['aktivasi' => '1'];
		$where 	= ['id_peserta' => $id];
		$this->Mymodel->actionData('update', $data, 'tb_peserta', $where);
		echo json_encode(null);
	}
}
?>