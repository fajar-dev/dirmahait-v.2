<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Page');

    if($this->session->userdata('status')!= "login"){
			redirect(base_url());
		}
	}

  public function pesan()
	{
    $data['title'] = 'Pesan';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
    $data['hasil'] = $this->db->get('request')->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/admin/pesan');
		$this->load->view('backend/footer');
	}

  public function pesan_hapus($id)
	{
    $this->db->delete('request', array('id' => $id));
    $this->session->set_flashdata('msg', '
    <div class="position-fixed" style="z-index: 9999999">
      <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Notifikasi</div>
          <small>Now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Berhasil menghapus Pesan
        </div>
      </div>
    </div>
    ');
    redirect(base_url('admin/pesan')); 
	}

  public function admin()
	{
    $data['title'] = 'Admin';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
    $q = $this->db->select('*')->from('admin')->join('mahasiswa', 'mahasiswa.nim=admin.nim_mhs', 'left')->get();
    $data['admin'] = $q->result();
    $data['mhs'] = $this->db->get('mahasiswa')->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/admin/admin');
		$this->load->view('backend/footer');
	}

  	public function admin_add()
	{
    $data = array(
      'nim_mhs' => $this->input->post('user'),
      'level' => 1,
      'user_log' => $this->session->userdata('nim'),
    );
    $this->db->insert('admin' ,$data);
    $this->session->set_flashdata('msg', '
    <div class="position-fixed" style="z-index: 9999999">
      <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Notifikasi</div>
          <small>Now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Berhasil menambahkan admin
        </div>
      </div>
    </div>
    ');
    redirect(base_url('admin/admin')); 
	}

  public function admin_hapus($id)
	{
    $this->db->delete('admin', array('nim_mhs' => $id));
    $this->session->set_flashdata('msg', '
    <div class="position-fixed" style="z-index: 9999999">
      <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Notifikasi</div>
          <small>Now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Berhasil menghapus admin
        </div>
      </div>
    </div>
    ');
    redirect(base_url('admin/admin')); 
	}

	public function setting()
	{
    $data['title'] = 'Setting';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
    $data['setting'] = $this->db->get_where('setting', array('id'=> 1))->row();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/admin/setting');
		$this->load->view('backend/footer');
	}

  	public function setting_update()
	{
    $data = array(
      'pengumuman' => $this->input->post('pengumuman'),
      'register' => $this->input->post('reg'),
      'user_log' => $this->session->userdata('nim'),
    );
    $this->db->where('id', 1);
    $this->db->update('setting' ,$data);
    $this->session->set_flashdata('msg', '
    <div class="position-fixed" style="z-index: 9999999">
      <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Notifikasi</div>
          <small>Now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Berhasil memperbarui setting
        </div>
      </div>
    </div>
    ');
    redirect(base_url('admin/setting')); 
	}
}
