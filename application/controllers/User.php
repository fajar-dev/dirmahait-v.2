<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Page');

    if($this->session->userdata('status')!= "login"){
			redirect(base_url());
		}
	}

	public function index()
	{
		redirect(base_url('user/dashboard'));
	}

	public function dashboard()
	{
		date_default_timezone_set("Asia/Jakarta");
    $jam = date('H:i');
    //atur salam menggunakan IF
    if ($jam > '05:30' && $jam < '10:00') {
        $salam = 'Good Morning,';
    } elseif ($jam >= '10:00' && $jam < '15:00') {
        $salam = 'Good Day,';
    } elseif ($jam >= '15:00' && $jam <= '19:00') {
        $salam = 'Good Afternoon,';
    } else {
        $salam = 'Good Night,';
    } 
    $data['title'] = 'Dashboard';
    $data['salam'] = $salam.' Have a nice day';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
		$data['log'] = $this->db->order_by('date', 'DESC')->get_where('log', array('ket'=>'sukses'), 5)->result();
		$data['set'] = $this->db->get('setting')->row();
		$data['admin'] = $this->db->get('admin')->num_rows();
		$data['aktif'] = $this->db->get_where('mahasiswa', array('status'=>1))->num_rows();
		$data['pending'] = $this->db->get_where('mahasiswa', array('status'=>0))->num_rows();
		$data['suspend'] = $this->db->get_where('mahasiswa', array('status'=>2))->num_rows();
		// print_r($data);die;
    $this->load->view('backend/header', $data);
		$this->load->view('backend/user/dashboard');
		$this->load->view('backend/footer');
	}

	public function biodata()
	{
    $data['title'] = 'Biodata';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
		$data['kontak'] = $this->db->get_where('kontak', array('nim'=> $this->session->userdata('nim')))->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/user/biodata');
		$this->load->view('backend/footer');
	}

	public function biodata_update(){
		if(empty($_FILES['foto']['name'])){
			$data = array(
					'nama' => $this->input->post('nama'),
					'kelamin' => $this->input->post('jk'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'hobi' => $this->input->post('hobi'),
					'agama' => $this->input->post('agama'),
					'alamat_asal' => $this->input->post('asal'),
					'alamat_kost' => $this->input->post('kost'),
					'asal_sekolah' => $this->input->post('asal_sekolah'),
					'email' => $this->input->post('email'),
					'wa' => $this->input->post('wa'),
					'ig' => $this->input->post('ig'),
					'quotes' => $this->input->post('quotes'),
			);
			$this->db->where('nim', $this->session->userdata('nim'));
				$this->db->update('mahasiswa',$data);
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
							Biodata kamu berhasil di update
						</div>
					</div>
				</div>
				');
      redirect(base_url('user/biodata')); 
		}else{
			$config['upload_path']        = './file';
		$config['allowed_types']       = 'img|png|jpeg|gif|jpg';
		$config['encrypt_name']        = true;
		$config['max_size']            = 10000000;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('foto')){
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Gagal!! pastikan ekstensi gambar berupa gif, jpg atau png.</div>');
			redirect('page/pencatatan');
			}else{
							$data = array('foto' => $this->upload->data());
							$uploadData = $this->upload->data();
							$hasil = $uploadData['file_name'];
							$data = array(
							'id_afdeling' => $this->input->post('id'),
							'jenis' => $this->input->post('jenis'),
							'pj' => $this->input->post('pj'),
							'berat' => $this->input->post('berat'),
							'waktu' => $this->input->post('waktu'),
							'foto' => $hasil,
							'log_petugas' => $this->session->userdata('nama')
						);
						$this->db->insert('sampah',$data);
						$this->session->set_flashdata('msg','tambah');
						redirect(base_url('page/pencatatan'));
			}
		}
	}

	public function Kontak()
	{
    $data['title'] = 'Kontak Darurat';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
		$data['kontak'] = $this->db->get_where('kontak', array('nim'=> $this->session->userdata('nim')))->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/user/Kontak');
		$this->load->view('backend/footer');
	}

	public function kontak_add()
  {
      $data = array(
				'nim' => $this->session->userdata('nim'),
        'nama' => $this->input->post('nama'),
        'nomor' => $this->input->post('nomor'),
      );
      $this->db->insert('kontak',$data);
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
            Kontak darurat anda berhasl tersimpan
          </div>
        </div>
      </div>
      ');
      redirect(base_url('user/kontak')); 
  } 

	public function kontak_edit()
  {
      $data = array(
        'nama' => $this->input->post('nama'),
        'nomor' => $this->input->post('nomor'),
      );
			$this->db->where('nim', $this->session->userdata('nim'));
			$this->db->where('id', $this->input->post('id'));
      $this->db->update('kontak',$data);
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
            Kontak darurat anda berhasil diubah
          </div>
        </div>
      </div>
      ');
      redirect(base_url('user/kontak')); 
  } 

	public function kontak_hapus($id)
  {  
		$data = $this->db->get_where('kontak', array('id'=> $id))->row();
		if($this->session->userdata('nim') != $data->nim ){
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
            Anda tidak meiliki akses 
          </div>
        </div>
      </div>
      ');
      redirect(base_url('user/kontak'));
		}
		$this->db->delete('kontak', array('id' => $id));
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
            Kontak darurat anda berhasil dihapus
          </div>
        </div>
      </div>
      ');
      redirect(base_url('user/kontak')); 
  } 

}
