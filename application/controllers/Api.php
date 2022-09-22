<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function key($id = null)
	{
    $data = $this->db->get('api')->row();
    if( $id == null){
      $json = array(
        'response' => '200 OK',
        'status' => 'failed',
        'message' => 'API key Kosong',
        'data' => []
      );
      echo json_encode($json);
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
        'nama' => ucwords($x->nama),
        'nim' => $x->nim,
        'Status_mahasiswa' => $stat,
        'kelas' => $x->kelas,
        'jenis_kelamin' => ucwords($x->kelamin),
        'tempat_lahir' => ucwords($x->tempat_lahir),
        'tanggal_lahir' => $x->tgl_lahir,
        'hobi' => $x->hobi,
        'agama' => ucwords($x->agama),
        'provinsi_asal' => ucwords($x->provinsi),
        'kabkota_asal' => ucwords($x->kabkota),
        'alamat_asal' => $x->alamat_asal,
        'alamat_kost' => $x->alamat_kost,
        'instagram' => $x->ig,
        'quotes' => $x->quotes,
        'foto' => base_url('file/').$x->foto
      );
      $json = array(
        'response' => '200 OK',
        'status' => 'Success',
        'message' => 'Berhasil mengambil data ',
        'data' => $data_arr
      );
    } 
      echo json_encode($json);
    }else{
      $json = array(
        'response' => '200 OK',
        'status' => 'failed',
        'message' => 'API Key Tidak Terdaftar',
        'data' => []
      );
      echo json_encode($json);
    }
	}
}
