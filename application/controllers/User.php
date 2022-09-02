<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Page');

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
		$data['log'] = $this->db->order_by('date', 'DESC')->get_where('log', array('ket'=>'sukses'), 8)->result();
		$data['set'] = $this->db->get('setting')->row();
		$data['admin'] = $this->db->get('admin')->num_rows();
		$data['aktif'] = $this->db->get_where('mahasiswa', array('status'=>1))->num_rows();
		$data['pending'] = $this->db->get_where('mahasiswa', array('status'=>0))->num_rows();
		$data['suspend'] = $this->db->get_where('mahasiswa', array('status'=>2))->num_rows();
    $chart= $this->db->select('provinsi, COUNT(provinsi) AS hasil FROM mahasiswa WHERE status = 1 AND provinsi IS NOT NULL GROUP BY provinsi')->get();
    $data['provinsi'] = $chart->result();
		$chart= $this->db->select('kabkota, COUNT(kabkota) AS hasil FROM mahasiswa WHERE status = 1 AND kabkota IS NOT NULL GROUP BY kabkota')->get();
    $data['kabkota'] = $chart->result();
		$data['laki'] = $this->db->get_where('mahasiswa', array('kelamin'=>'laki-laki', 'status'=>'1'))->num_rows();
		$data['perempuan'] = $this->db->get_where('mahasiswa', array('kelamin'=>'perempuan', 'status'=>'1'))->num_rows();
		$data['islam'] = $this->db->get_where('mahasiswa', array('agama'=>'islam', 'status'=>'1' ))->num_rows();
		$data['kristen'] = $this->db->get_where('mahasiswa', array('agama'=>'kristen', 'status'=>'1'))->num_rows();
		$data['katolik'] = $this->db->get_where('mahasiswa', array('agama'=>'katolik', 'status'=>'1'))->num_rows();
		$data['hindu'] = $this->db->get_where('mahasiswa', array('agama'=>'hindu', 'status'=>'1'))->num_rows();
		$data['budha'] = $this->db->get_where('mahasiswa', array('agama'=>'budha', 'status'=>'1'))->num_rows();
		//print_r($a);die;
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
		$data['select_provinsi'] = $this->db->get_where('provinsi', array('name !='=> $data['user']['provinsi']))->result();
		$data['provinsi'] = $this->db->get('provinsi')->result();
		$data['kabkota'] = $this->db->get('kabkota')->result();
		$data['select_kabkota'] = $this->db->get_where('kabkota', array('name !='=> $data['user']['kabkota']))->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/user/biodata');
		$this->load->view('backend/footer');
	}

	public function biodata_update(){
		if(empty($_FILES['foto']['name'])){
			$data = array(
					'kelas' => $this->input->post('kelas'),
					'nama' => $this->input->post('nama'),
					'kelamin' => $this->input->post('jk'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'hobi' => $this->input->post('hobi'),
					'agama' => $this->input->post('agama'),
					'provinsi' => $this->input->post('provinsi'),
					'kabkota' => $this->input->post('kabkota'),
					'alamat_asal' => $this->input->post('asal'),
					'alamat_kost' => $this->input->post('kost'),
					'asal_sekolah' => $this->input->post('sekolah'),
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
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Gagal!! pastikan ekstensi gambar berupa gif, jpg atau png. Dengan maksimal ukuran gambar 2MB</div>');
				redirect('user/biodata');
			}else{
								$data = array('foto' => $this->upload->data());
								$uploadData = $this->upload->data();
								$hasil = $uploadData['file_name'];
								$data = array(
									'kelas' => $this->input->post('kelas'),
									'nama' => $this->input->post('nama'),
									'kelamin' => $this->input->post('jk'),
									'tempat_lahir' => $this->input->post('tempat_lahir'),
									'tgl_lahir' => $this->input->post('tgl_lahir'),
									'hobi' => $this->input->post('hobi'),
									'agama' => $this->input->post('agama'),
									'provinsi' => $this->input->post('provinsi'),
									'kabkota' => $this->input->post('kabkota'),
									'alamat_asal' => $this->input->post('asal'),
									'alamat_kost' => $this->input->post('kost'),
									'asal_sekolah' => $this->input->post('sekolah'),
									'email' => $this->input->post('email'),
									'wa' => $this->input->post('wa'),
									'ig' => $this->input->post('ig'),
									'quotes' => $this->input->post('quotes'),
									'foto' => $hasil,
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
			}
		}
	}

	public function kontak()
	{
    $data['title'] = 'Kontak Darurat';
    $q = $this->db->select('*')->from('mahasiswa')->join('admin', 'admin.nim_mhs=mahasiswa.nim', 'left')->where('nim', $this->session->userdata('nim'))->get();
    $data['user'] = $q->row_array();
		$data['kontak'] = $this->db->get_where('kontak', array('nim'=> $this->session->userdata('nim')))->result();
    $this->load->view('backend/header', $data);
		$this->load->view('backend/user/kontak');
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
