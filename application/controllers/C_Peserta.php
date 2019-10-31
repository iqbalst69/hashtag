<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Peserta extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Mymodel');
		$this->load->helper('string');
	}
	
	function page($p=null, $id=null){
		$stat 		 = $this->session->userdata('stat');
		$data['lev'] = $this->session->userdata('lev');
		if($stat == 'login' ){
			switch ($p) {
				case 'home':
					$this->load->view('peserta/header');
					$this->load->view('peserta/dashboard');
				break;
				case 'create':
					$data = $this->Mymodel->getData('tb_peserta', $where = ['id_peserta'=>$this->session->userdata('id')])->row_array();
					$this->load->view('peserta/header');
					$this->load->view('peserta/proposal', $data);
				break;
				default:
					echo "Page Not Found";
				break;
			}
		}else{
			redirect(site_url());
		}
	}
}