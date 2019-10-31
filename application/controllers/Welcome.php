<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mymodel');
	}
	
	function index(){
		$data['prodi'] = $this->Mymodel->getData('tb_prodi')->result_array();
		$this->load->view('login', $data);
	}
	function registrasi(){
		$this->load->view('registrasi');
	}

	function Login(){
		$data 		= null;
		$where 		= array(
			'id_admin' 	=> $this->input->post('username'),
			'pass' 		=> md5($this->input->post('password')),
		); 
		$cek_adm	= $this->Mymodel->getData('tb_admin', $where)->num_rows();
		if($cek_adm > 0){
			$sess = ['lev' => 'admin','id' => $this->input->post('username'),'stat' => 'login' ];
			$this->session->set_userdata($sess);
			$data = '1';
		}else{
			$where2		= array(
				'id_peserta'=> $this->input->post('username'),
				'pass' 		=> md5($this->input->post('password')),
				'aktivasi'  => '1',
			);
			$cek_peserta= $this->Mymodel->getData('tb_peserta', $where2)->num_rows();
			if($cek_peserta > 0){
				$sess = ['lev' => 'peserta','id' => $this->input->post('username'),'stat' => 'login' ];
				$this->session->set_userdata($sess);
				$data = '1';
			}
		}
		echo json_encode($data);
	}
	function Logout(){
		$this->session->sess_destroy();
		redirect(site_url());
	}

	function Pindah(){
		$lev = $this->session->userdata('lev');
		switch ($lev) {
			case 'admin':
				redirect(site_url('C_Admin/page/home'));
			break;

			case 'operator':
				// redirect(site_url('Operator'));
			break;

			case 'peserta':
				redirect(site_url('C_Peserta/page/home'));
			break;
			
			default:
				// redirect(site_url());
			break;
		}
	}

	function error_404(){
		$this->load->view('404');
	}
}
