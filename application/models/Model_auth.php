<?php
class Model_auth extends CI_Model
{

	/*cek login*/
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	function data_user($table,$where){
		return $this->db->get_where($table,$where);
	}
	
}