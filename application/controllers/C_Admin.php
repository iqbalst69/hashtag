<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {
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
					$this->load->view('template/header');
					$this->load->view('template/menu', $data);
					$this->load->view('admin/dashboard');
					$this->load->view('template/footer');
				break;
				case 'prodi':
					$this->load->view('template/header');
					$this->load->view('template/menu', $data);
					$this->load->view('admin/prodi');
					$this->load->view('template/footer');
				break;
				case 'verifikasi':
					$this->load->view('template/header');
					$this->load->view('template/menu', $data);
					$this->load->view('admin/verifikasi');
					$this->load->view('template/footer');
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