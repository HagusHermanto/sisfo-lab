<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_peralatan extends CI_Model
{

	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_peralatan');
		$this->db->order_by('id_peralatan', 'DESC');
		return $this->db->get()->result();
	}

	public function detail($id_peralatan)
	{
		$this->db->select('*');
		$this->db->from('tbl_peralatan');
		$this->db->where('id_peralatan', $id_peralatan);
		return $this->db->get()->row();
	}

	public function add($data)
	{
		$this->db->insert('tbl_peralatan', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_peralatan', $data['id_peralatan']);
		$this->db->update('tbl_peralatan', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_peralatan', $data['id_peralatan']);
		$this->db->delete('tbl_peralatan', $data);
	}
}

/* End of file M_peralatan.php */
