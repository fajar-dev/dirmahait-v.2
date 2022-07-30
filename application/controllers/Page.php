<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Model_Page');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
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
}
