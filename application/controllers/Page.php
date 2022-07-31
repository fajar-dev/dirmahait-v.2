<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Model_Page');
	}

	public function index()
	{
		$data['mhs']= $this->Model_Page->tampil_mhs('mahasiswa')->result();
		$this->load->view('header', $data);
		$this->load->view('main');
		$this->load->view('footer');
	}

	public function docs()
	{
		$this->load->view('header');
		$this->load->view('docs');
		$this->load->view('footer');
	}

	public function request()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
      'email' => $this->input->post('email'),
      'hp' => $this->input->post('hp'),
      'tujuan' => $this->input->post('tujuan'),
		);
		$this->db->insert('request',$data);
        $this->session->set_flashdata('msg', '
				<div class="position-fixed top-0 end-0 p-3 show" style="z-index: 9999">
					<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
						<div class="toast-header">
							<strong class="me-auto">Bootstrap</strong>
							<small>Now</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							Hello, world! This is a toast message.
						</div>
					</div>
				</div>
				');
			 redirect(base_url('page/docs'));      
	}  
}
