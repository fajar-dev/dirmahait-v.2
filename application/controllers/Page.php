<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Model_Page');
	}

	public function index()
	{
		$data['title']= 'Home';
		$data['mhs']= $this->Model_Page->tampil_mhs('mahasiswa')->result();
		$this->load->view('frontend/header', $data);
		$this->load->view('frontend/main');
		$this->load->view('frontend/footer');
	}

	public function docs()
	{
		redirect(base_url('page/maintenace'));
		$data['title']= 'Documentation';
		$this->load->view('frontend/header');
		$this->load->view('frontend/docs');
		$this->load->view('frontend/footer');
	}

	public function request(){
		$data = array(
			'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'hp' => $this->input->post('hp'),
      'tujuan' => $this->input->post('tujuan'),
		);
		$this->db->insert('request',$data);
        $this->session->set_flashdata('msg', '
				<div class="position-fixed top-0 end-0 p-3 show" style="z-index: 9999">
					<div id="liveToast" class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="d-flex">
					<div class="toast-body">
						<strong>Terkirim !</strong><br>Permintaan anda sedang di proses
					</div>
						<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					</div>
				</div>
				');
			 redirect(base_url('page/docs'));      
	}  

	public function error()
	{
		$this->load->view('errors/error404');
	}

	public function maintenace()
	{
		$this->load->view('errors/maintenance');
	}
}
