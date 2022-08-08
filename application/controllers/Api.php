<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function key($id = null)
	{
    $data = $this->db->get('api')->row();
    if( $id == null){
      $data = array(
        'protocol' => 'smtp',
        'smtp_host' => 'tp2go.com',
        'smtp_user' => 'dirmahait',
        'smtp_pass' => '!123master',
        'smtp_port' => 2525,
        'mailtype' => 'html',
        'charset' => 'utf-8'
      );
      echo json_encode($data);
    }elseif($id == $data->apikey){
      $data = $this->db->get_where('mahasiswa', array('status'=> 1))->result();
      echo json_encode($data);
    }else{
      $data = array(
        'protocol' => 'smtp',
        'smtp_host' => 'mail.smtp2go.com',
        'smtp_user' => 'dirmahait',
        'smtp_pass' => '!123master',
        'smtp_port' => 2525,
        'mailtype' => 'html',
        'charset' => 'utf-8'
      );
      echo json_encode($data);
    }
	}
}
