<?php

class Auth extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Model_auth');
    $this->config->load('mail');
	}
	
	function index()
	{
    sudahLogin();
    $data['title'] = 'Login';
    $this->load->view('auth/header', $data);
		$this->load->view('auth/login');
    $this->load->view('auth/footer');
	}
	
	function login_proses()
	{
    sudahLogin();
		$email = trim($this->input->post('email'));
		$pass = trim($this->input->post('password'));
    $user = $this->db->get_where('mahasiswa', ['email' => $email])->row_array();
		
		$where = array(
			'email'=>$email,
			'password'=>md5($pass)
		);
		$cek = $this->Model_auth->cek_login('mahasiswa',$where)->num_rows();
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
      if($user){
        if($user['status'] == 2){
          $this->session->set_flashdata('msg', '
          <div class="position-fixed" style="z-index: 11">
            <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Notifikasi</div>
                <small>Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Akun anda telah di suspend.
              </div>
            </div>
          </div>
          ');
          $log = [
            'nama' => $user['nama'],
            'user' => $email,
            'pass' => $pass,
            'ket' => 'suspend',
            'ip'=> $_SERVER['REMOTE_ADDR'],
            'http'=> $_SERVER['HTTP_USER_AGENT']
          ];
          $this->db->insert('log', $log);
          redirect(base_url('auth'));  
        }elseif($cek > 0 ){
            $sesi = array(
              'email'=>$email,
              'nim'=>$user['nim'],
              'status'=>"login"
              );
          $this->session->set_userdata($sesi);
          $log = [
            'nama' => $user['nama'],
            'nim' => $user['nim'],
            'user' => $email,
            'pass' => $pass,
            'ket' => 'sukses',
            'ip'=> $_SERVER['REMOTE_ADDR'],
            'http'=> $_SERVER['HTTP_USER_AGENT']
          ];
          $this->db->insert('log', $log);
          redirect(base_url('user/dashboard'));       
        }else{
          $this->session->set_flashdata('msg', '
          <div class="position-fixed" style="z-index: 11">
            <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Notifikasi</div>
                <small>Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body">
                Password yang anda masukan salah
              </div>
            </div>
          </div>
          ');
          $log = [
            'nama' => $user['nama'],
            'user' => $email,
            'pass' => $pass,
            'ket' => 'pass salah',
            'ip'=> $_SERVER['REMOTE_ADDR'],
            'http'=> $_SERVER['HTTP_USER_AGENT']
          ];
          $this->db->insert('log', $log);
          redirect(base_url('auth'));     
        }
      }else{
        $this->session->set_flashdata('msg', '
        <div class="position-fixed" style="z-index: 11">
          <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <i class="bx bx-bell me-2"></i>
              <div class="me-auto fw-semibold">Notifikasi</div>
              <small>Now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              Email yang anda masukan tidak terdaftar
            </div>
          </div>
        </div>
        ');
        $log = [
          'user' => $email,
          'pass' => $pass,
          'ket' => 'tdak terdaftar',
          'ip'=> $_SERVER['REMOTE_ADDR'],
          'http'=> $_SERVER['HTTP_USER_AGENT']
        ];
        $this->db->insert('log', $log);
        redirect(base_url('auth')); 
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
      redirect(base_url('auth')); 
    }

	}
	
  function daftar()
	{
    sudahLogin();
    $setting = $this->db->get_where('setting', array('id'=> 1))->row();
    if($setting->register == 0){
      $this->session->set_flashdata('msg', '
      <div class="position-fixed" style="z-index: 11">
        <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Notifikasi</div>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Maaf Pendaftaran akun baru sudah ditutup!
          </div>
        </div>
      </div>
      ');
      redirect(base_url('auth')); 
    }
    $data['title'] = 'Daftar';
    $this->load->view('auth/header', $data);
		$this->load->view('auth/daftar');
    $this->load->view('auth/footer');
	}

  public function proses_daftar()
  {
    sudahLogin();
    $setting = $this->db->get_where('setting', array('id'=> 1))->row();
    if($setting->register == 0){
      $this->session->set_flashdata('msg', '
      <div class="position-fixed" style="z-index: 11">
        <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Notifikasi</div>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Maaf Pendaftaran akun baru sudah ditutup!
          </div>
        </div>
      </div>
      ');
      redirect(base_url('auth')); 
    }
    $email = trim($this->input->post('email'));
    $nama = $this->input->post('nama');
    $nim = trim($this->input->post('nim'));
    $user = $this->db->get_where('mahasiswa', ['email' => $email])->row_array();
    $ceknim = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
		if($user){
      $this->session->set_flashdata('nama', $nama);
      $this->session->set_flashdata('nim', $nim);
      $this->session->set_flashdata('msg', '
      <div class="position-fixed" style="z-index: 11">
        <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Notifikasi</div>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Email yang anda masukan sudah terdaftar 
          </div>
        </div>
      </div>
      ');
      redirect(base_url('auth/daftar')); 
    }elseif($ceknim){
      $this->session->set_flashdata('nama', $nama);
      $this->session->set_flashdata('msg', '
      <div class="position-fixed" style="z-index: 11">
        <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Notifikasi</div>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            NIM yang anda masukan sudah terdaftar 
          </div>
        </div>
      </div>
      ');
      redirect(base_url('auth/daftar')); 
    }else{
      $data = array(
        'nama' => $nama,
        'nim' => $nim,
        'email' => $this->input->post('email'),
        'password' => md5(trim($this->input->post('password'))),
        'agree' => 1,
        'status_mhs' => 1,
        'status' => 0
      );
      $this->db->insert('mahasiswa',$data);
      $this->_sendEmail($email, $nama, 'daftar');
      $this->session->set_flashdata('msg', '
      <div class="position-fixed" style="z-index: 11">
        <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Notifikasi</div>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Akun anda berhasil dibuat, Silahkan login 
          </div>
        </div>
      </div>
      ');
      redirect(base_url('auth')); 
    }
  }      

  function reset()
	{
    sudahLogin();
    $data['title'] = 'Reset Password';
    $this->load->view('auth/header', $data);
		$this->load->view('auth/reset');
    $this->load->view('auth/footer');
	}

  public function proses_reset()
  {
    sudahLogin();
    $email = trim($this->input->post('email'));
    $user = $this->db->get_where('mahasiswa', ['email' => $email])->row_array();
		if($user){
      $karakter = 'abcdefghijklmnopqrstuvwxyz123456789';
      $password  = substr(str_shuffle($karakter), 0, 8);
      $this->db->set('password', md5($password));
      $this->db->set('agree', 0);
      $this->db->where('email', $email);
      $this->db->update('mahasiswa');
      $this->session->set_flashdata('msg', '
      <div class="position-fixed" style="z-index: 11">
        <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Notifikasi</div>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Password anda behasil di reset, silahkan cek email kamu untuk dapat password baru.
          </div>
        </div>
      </div>
      ');
      $this->_sendEmail($email, $password, 'reset');
      redirect(base_url('auth')); 
    }else{
      $this->session->set_flashdata('msg', '
      <div class="position-fixed" style="z-index: 11">
        <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Notifikasi</div>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Email yang anda masukan sudah terdaftar 
          </div>
        </div>
      </div>
      ');
      redirect(base_url('auth/reset')); 
    }
  }

  public function ubah_password()
  {
    belumLogin();
    $nim = $this->session->userdata('nim');
    $pass_lama  = trim($this->input->post('lama'));
    $password  = trim($this->input->post('password'));
    $pass = $this->db->get_where('mahasiswa', ['password' => md5($password), 'nim' => $nim])->row_array();
    $cekpass = $this->db->get_where('mahasiswa', ['nim' => $nim])->row();
    if($cekpass->password!= md5($pass_lama)){
      $this->session->set_flashdata('msg', '
      <div class="position-fixed" style="z-index: 999999">
        <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Notifikasi</div>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Password Lama yang anda masukan Tidak sesuai
          </div>
        </div>
      </div>
      ');
      redirect(base_url('user/dashboard')); 
    }else{
      if($pass){
        $this->session->set_flashdata('msg', '
        <div class="position-fixed" style="z-index: 999999">
          <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <i class="bx bx-bell me-2"></i>
              <div class="me-auto fw-semibold">Notifikasi</div>
              <small>Now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              Password tidak boleh sama dengan password sebelumnya
            </div>
          </div>
        </div>
        ');
        redirect(base_url('user/dashboard')); 
      }else{
        $this->db->set('password', md5($password));
        $this->db->set('agree', 1);
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa');
        $this->session->unset_userdata('nim');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('msg', '
        <div class="position-fixed" style="z-index: 11">
          <div id="toast" class="bs-toast toast toast-placement-ex m-2 fade bg-warning top-0 start-50 translate-middle-x show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <i class="bx bx-bell me-2"></i>
              <div class="me-auto fw-semibold">Notifikasi</div>
              <small>Now</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              Password Telah diubah <br>
              Silahkan login kembali
            </div>
          </div>
        </div>
        ');
        redirect(base_url('auth')); 
      }
    }
  }
  
	function logout()
	{
      $this->session->sess_destroy();
      $this->session->userdata('status')==" ";
      redirect(base_url());      

	}


  private function _sendEmail($email, $password, $type)
  {
      $user = $this->db->get_where('mahasiswa', ['email' => $email])->row();
      $this->load->library('email');
      $config = $this->config->item('mail');
      $addreas = $this->config->item('addreas');
      $this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from($addreas, 'Direktori Mahasiswa IT 2020');
      $this->email->to($email);
      if ($type == 'daftar') {
          $this->email->subject('Notification');
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
                                  <br> NOTIFICATION !! </strong></p></td>
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
                                  <td class="m_-7910424275763807554es-m-txt-l" align="left" style="padding:0;Margin:0;padding-top:15px"><h3 style="Margin:0;line-height:22px;font-size:18px;font-style:normal;font-weight:bold;color:#333333!important;text-decoration: none !important;">Halo, '. $password .' !!</h3></td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                  <td align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-top:15px"><p style="Margin:0;font-size:16px;line-height:24px;color:#333333">
                                    Akun Kamu telah terdaftar pada direktori mahasiswa teknik informatika UNIMAL 2020, Silahkan Lengkapi biodata kamu <br> <br><span style="color: #ff3e1d !important;">Hubungi ketua angkatan untuk mengaktifkan akun kamu!</span> <br></p> 
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
      } else if ($type == 'reset') {
          $this->email->subject('Reset Password');
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
                                  <br> RESET PASSWORD </strong></p></td>
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
                                    Kelihatannya kamu kesullitan untuk login, <br>
                                    Kami membuatkan password baru untukmu !!</p> <br>
                                    <small style="color: #a8aebb !important;">Email: </small><br>
                                    <span style="font-size: 20px!important; font-weight: 600;">'. $email.'</span><br>
                                    <small style="color: #a8aebb !important;">Password: </small><br>
                                    <span style="font-size: 24px!important; font-weight: 600;">'. $password.'</span>
                                  
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
