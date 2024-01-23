<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{

	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal');
		$this->db->order_by('id_jadwal', 'desc');
		return $this->db->get()->result();
	}

	public function add($data)
	{
		$this->db->insert('tbl_jadwal', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_jadwal', $data['id_jadwal']);
		$this->db->update('tbl_jadwal', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_jadwal', $data['id_jadwal']);
		$this->db->delete('tbl_jadwal', $data);
	}
}

/* End of file M_jadwal.php */
