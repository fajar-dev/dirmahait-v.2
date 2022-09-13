<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function key($id = null)
	{
    $data = $this->db->get('api')->row();
    if( $id == null){
      $data = array(
        'response' => '200 OK',
        'status' => 'failed',
        'message' => 'Key Tidak Terdaftar / key Kosong',
      );
      echo json_encode($data);
    }elseif($id == $data->apikey){
      
    $hasil= $this->db->get_where('mahasiswa', array('status'=> 1))->result();
    foreach ($hasil as $x) { 
      if($x->status_mhs == 1){ 
        $stat = 'aktif'; 
      }elseif($x->status_mhs == 2){
         $stat = 'tidak aktif'; 
        }elseif($x->status_mhs == 3){ 
        $stat = 'lulus'; 
      };
      $data_arr[] = array(
        'nama' => $x->nama,
        'nim' => $x->nim,
        'Status_mahasiswa' => $stat,
        'kelas' => $x->kelas,
        'jenis_kelamin' => $x->kelamin,
        'tempat_lahir' => $x->tempat_lahir,
        'tanggal_lahir' => $x->tgl_lahir,
        'hobi' => $x->hobi,
        'agama' => $x->agama,
        'provinsi_asal' => $x->provinsi,
        'kabkota_asal' => $x->kabkota,
        'alamat_asal' => $x->alamat_asal,
        'alamat_kost' => $x->alamat_kost,
        'instagram' => $x->ig,
        'quotes' => $x->quotes,
        'foto' => base_url('file/').$x->foto
      );
    }
      echo json_encode($data_arr);
    }else{
      $data = array(
        'response' => '200 OK',
        'status' => 'failed',
        'message' => 'Key Tidak Terdaftar / key Kosong',
      );
      echo json_encode($data);
    }
	}
}
