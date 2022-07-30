<?php
class Model_page extends CI_Model
{
	function tampil_mhs($table)
	{
    $this->db->order_by('nim', 'ASC');		
		return $this->db->get_where($table,array('status'=>1));
	}
}