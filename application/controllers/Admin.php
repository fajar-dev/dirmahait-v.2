<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Page');
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $cek = $q->row_array();
    if($this->session->userdata('status')!= "login"){
      $this->session->set_flashdata('msg', '
			<div class="position-fixed" style="z-index: 9999999">
				<div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header">
						<i class="bx bx-bell me-2"></i>
						<div class="me-auto fw-semibold">Notifikasi</div>
						<small>Now</small>
						<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body">
						Silahkan Login Terlebih dahulu
					</div>
				</div>
			</div>
			');
			redirect(base_url('auth'));
		}elseif($cek['level'] != 1){
      $this->session->set_flashdata('msg', '
			<div class="position-fixed" style="z-index: 9999999">
				<div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header">
						<i class="bx bx-bell me-2"></i>
						<div class="me-auto fw-semibold">Notifikasi</div>
						<small>Now</small>
						<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body">
						Anda bukan admin, Akses ditolak
					</div>
				</div>
			</div>
			');
			redirect(base_url('user/dashboard'));
    }
	}

  public function apikey()
	{
    $data['title'] = 'API Key';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
    $data['hasil'] = $this->db->get('api')->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/admin/apikey');
		$this->load->view('backend/footer');
	}

  public function apikey_add()
	{
    $karakter = 'abcdefghijklmnopqrstuvwxyz123456789';
    $generate  = substr(str_shuffle($karakter), 0, 32);
    $data = array(
      'pj' => $this->input->post('pj'),
      'hp_pj' => $this->input->post('hp'),
      'apikey' => $generate,
      'user_log_add' => $this->session->userdata('nim'),
    );
    $this->db->insert('api' ,$data);
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
          Berhasil menambahkan Data API Key
        </div>
      </div>
    </div>
    ');
    redirect(base_url('admin/apikey')); 
	}

  public function apikey_edit()
	{
    $data = array(
      'pj' => $this->input->post('pj'),
      'hp_pj' => $this->input->post('hp'),
      'user_log_update' => $this->session->userdata('nim'),
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('api' ,$data);
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
          Berhasil Mengubah data API
        </div>
      </div>
    </div>
    ');
    redirect(base_url('admin/apikey')); 
	}

  public function apikey_hapus($id)
	{
    $this->db->delete('api', array('id' => $id));
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
          Berhasil menghapus Apikey
        </div>
      </div>
    </div>
    ');
    redirect(base_url('admin/apikey')); 
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
    $data['mhs'] = $this->db->get_where('mahasiswa')->result();
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

  public function mhs_pending()
	{
    $data['title'] = 'Pending';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
    $data['hasil'] = $this->db->get_where('mahasiswa', array('status'=> 0))->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/admin/pending');
		$this->load->view('backend/footer');
	}

  public function mhs_aktif()
	{
    $data['title'] = 'Aktif';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
    $data['hasil'] = $this->db->get_where('mahasiswa', array('status'=> 1))->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/admin/aktif');
		$this->load->view('backend/footer');
	}

  public function mhs_suspend()
	{
    $data['title'] = 'Suspend';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
    $data['hasil'] = $this->db->get_where('mahasiswa', array('status'=> 2))->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/admin/suspend');
		$this->load->view('backend/footer');
	}

  public function mhs_detail($nim)
	{
    $data['title'] = 'Detail Mahasiswa';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
    $data['kontak'] = $this->db->get_where('kontak', array('nim'=> $nim))->result();
    $data['mhs'] = $this->db->get_where('mahasiswa', array('nim'=> $nim))->row();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/admin/detail');
		$this->load->view('backend/footer');
	}

  public function status_mhs()
	{
    $this->db->set('status_mhs', $this->input->post('status'));
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('mahasiswa');
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
          Berhasil memperbarui Status Mahasiswa
        </div>
      </div>
    </div>
    ');
    redirect(base_url('admin/mhs_aktif')); 
	}

  public function aktifkan($id, $url)
	{
    $this->db->set('status', 1);
    $this->db->where('id', $id);
    $this->db->update('mahasiswa');
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
          Berhasil memperbarui Status Akun Mahasiswa
        </div>
      </div>
    </div>
    ');
    redirect(base_url('admin/'.$url)); 
	}

  public function suspend($id, $url)
	{
    $this->db->set('status', 2);
    $this->db->where('id', $id);
    $this->db->update('mahasiswa');
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
          Berhasil memperbarui Status Akun Mahasiswa
        </div>
      </div>
    </div>
    ');
    redirect(base_url('admin/'.$url)); 
	}

}
