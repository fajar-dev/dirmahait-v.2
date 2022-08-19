<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Page');
    $this->config->load('mail');
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


  public function kirim_email()
	{
    $data['title'] = 'Kirim Email';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
    $data['hasil'] = $this->db->get('outbox')->result();
    $data['mhs'] = $this->db->get_where('mahasiswa')->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/admin/kirim_email');
		$this->load->view('backend/footer');
	}

  public function kirim_email_add()
	{
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $user = $q->row_array();
    $email = $this->input->post('email');
    $subjek  = $this->input->post('subjek');
    $isi = $this->input->post('isi');
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        $userIp=$this->input->ip_address();
        $secret = $this->config->item('google_secret');
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
        
        $status= json_decode($output, true);

        if ($status['success']) {
          $this->load->library('email');
          $config = $this->config->item('mail');
          $addreas = $this->config->item('addreas');
          $this->email->initialize($config);
          $this->email->set_newline("\r\n");
          $this->email->from($addreas, 'Direktori Mahasiswa IT 2020');
          $this->email->to($email);
          $this->email->subject($subjek);
              $this->email->message('
              <p>
                HI, '.$email.'!<br><br>
                '.$isi.'<br><br><small style="color: green;">
                Oleh: '.$user['nama'].'<br>Pesan Ini dikirim melalui broadcast Dirmahasiswa IT UNIMAL 2020</small><br><br>Thanks,<br>-Direktori Mahasiswa IT 2020
              </p>
              ');
          if ($this->email->send()) {
            $data = array(
              'email' => $email,
              'subjek' => $subjek,
              'isi' => $isi,
              'user_log' => $this->session->userdata('nim'),
            );
            $this->db->insert('outbox' ,$data);
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
                  Email Berhasil Terkirim
                </div>
              </div>
            </div>
            ');
          redirect(base_url('admin/kirim_email'));
          } else {
              echo $this->email->print_debugger();
              die;
          } 
        }else{
          $this->session->set_flashdata('msg', '
          <div class="position-fixed" style="z-index: 9999999">
            <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Notifikasi</div>
                <small>Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
              Sorry Google Recaptcha Unsuccessful!!
              </div>
            </div>
          </div>
          ');
          redirect(base_url('admin/kirim_email')); 
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

  public function print()
	{
    $data['hasil'] = $this->db->order_by('nim', 'ASC')->get_where('mahasiswa', array('status'=> 1))->result();
    $this->load->view('backend/admin/print', $data);
	}

  public function pdf()
	{
    $data['hasil'] = $this->db->order_by('nim', 'ASC')->get_where('mahasiswa', array('status'=> 1))->result();
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('backend/admin/print',$data,true);
		$mpdf->WriteHTML($html);
		//$mpdf->Output(); // opens in browser
		$mpdf->Output('Dirmahasiswa.pdf','D'); // it downloads the file into the user system, with give name
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
    $this->_sendEmail($id, 'acc');
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

  private function _sendEmail($id, $type)
  {
      $user = $this->db->get_where('mahasiswa', ['id' => $id])->row();
      $this->load->library('email');
      $config = $this->config->item('mail');
      $addreas = $this->config->item('addreas');
      $this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from($addreas, 'Direktori Mahasiswa IT 2020');
      $this->email->to($user->email);
      if ($type == 'acc') {
          $this->email->subject('Notifikasi');
          $this->email->message('
          <div style="width:100%;padding:0;Margin:0">
            <div style="background-color:#eeeeee; text-align: center !important;">
              <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
                <tbody><tr style="border-collapse:collapse">
                  <td valign="top" style="padding:0;Margin:0">
                  <table class="m_-7910424275763807554es-content" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed!important;width:100%">
                    <tbody><tr style="border-collapse:collapse"></tr>
                    <tr style="border-collapse:collapse">
                      <td align="center" style="padding:0;Margin:0">
                      <table style="border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center">
                        <tbody><tr style="border-collapse:collapse">
                          <td align="left" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:15px;padding-bottom:15px">
                          </td>
                    </tr>
                  </tbody></table>
                  <table class="m_-7910424275763807554es-content" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed!important;width:100%">
                    <tbody><tr style="border-collapse:collapse">
                      <td align="center" style="padding:0;Margin:0">
                      <table cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="border-collapse:collapse;border-spacing:0px;background-color:#ffffff;width:600px">
                        <tbody><tr style="border-collapse:collapse">
                          <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:35px;padding-right:35px">
                          <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border-spacing:0px">
                            <tbody><tr style="border-collapse:collapse">
                              <td align="center" valign="top" style="padding:0;Margin:0;width:530px">
                              <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                <tbody><tr style="border-collapse:collapse">
                                  <td align="left" style="padding:0;Margin:0"><p style="Margin:0;font-size:30px;line-height:45px;color:#333333"><strong>
                                  <br> CONGRATULATION !! </strong></p></td>
                                </tr>
                              </tbody></table></td>
                            </tr>
                          </tbody></table></td>
                        </tr>
                        <tr style="border-collapse:collapse">
                          <td align="left" style="padding:0;Margin:0;padding-left:35px;padding-right:35px;padding-top:40px">
                          <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px">
                            <tbody><tr style="border-collapse:collapse">
                              <td valign="top" align="center" style="padding:0;Margin:0;width:530px">
                              <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                <tbody><tr style="border-collapse:collapse">
                                  <td class="m_-7910424275763807554es-m-txt-l" align="left" style="padding:0;Margin:0;padding-top:15px"><h3 style="Margin:0;line-height:22px;font-size:18px;font-style:normal;font-weight:bold;color:#333333!important;text-decoration: none !important;">Halo, '. $user->nama .' !!</h3></td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                  <td align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-top:15px"><p style="Margin:0;font-size:16px;line-height:24px;color:#333333">
                                    Akun direktori mahasiswa kamu telah divalidasi oleh ketua angkatan. <br><span style="color: #71dd37 !important;">Status akun sudah aktif, data kamu bakal ditampilkan pada halaman utama!</span> <br></p> 
                                  </td>
                                </tr>
                              </tbody></table></td>
                            </tr>
                          </tbody></table></td>
                        </tr>
                      </tbody></table></td>
                    </tr>
                  </tbody></table>
                  <table class="m_-7910424275763807554es-content" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;border-spacing:0px;table-layout:fixed!important;width:100%">
                    <tbody><tr style="border-collapse:collapse">
                      <td align="center" style="padding:0;Margin:0">
                      <table cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="border-collapse:collapse;border-spacing:0px;background-color:#ffffff;width:600px">
                        <tbody><tr style="border-collapse:collapse">
                          <td align="left" style="padding:0;Margin:0;padding-top:15px;padding-left:35px;padding-right:35px">
                          <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px">
                            <tbody><tr style="border-collapse:collapse">
                              <td valign="top" align="center" style="padding:0;Margin:0;width:530px">
                              <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="border-collapse:collapse;border-spacing:0px">
                                <tbody><tr style="border-collapse:collapse">
                                  <td align="left" style="padding:0;Margin:0"><p style="Margin:0;font-size:15px;line-height:23px;color:#333333"><strong><span style="text-align:center">
                                  <br> -Direktori Mahasiswa IT 2020</span></strong></p><p style="Margin:0;font-size:15px;line-height:23px;color:#333333"><br></p><p style="Margin:0;font-size:15px;line-height:23px;color:#333333"></p><p style="Margin:0;font-size:15px;line-height:23px;color:#333333"><br></p></td>
                                </tr>
                              </tbody></table></td>
                            </tr>
                          </tbody></table></td>
                        </tr>
                      </tbody></table></td>
                    </tr></td>
                </tr>
              </tbody></table>
            </div>
          </div>
          ');
      } 
      if ($this->email->send()) {
          return true;
      } else {
          echo $this->email->print_debugger();
          die;
      }
  }

}
