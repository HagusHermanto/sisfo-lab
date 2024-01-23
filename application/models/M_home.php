<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
	public function download()
	{
		$this->db->select('*');
		$this->db->from('tbl_file');
		$this->db->order_by('id_file', 'desc');
		return $this->db->get()->result();
	}

	public function jadwal()
	{
		$this->db->select('*');
		$this->db->from('tbl_jadwal');
		$this->db->order_by('id_jadwal', 'desc');
		return $this->db->get()->result();
	}

	public function pengumuman()
	{
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->order_by('id_pengumuman', 'desc');
		return $this->db->get()->result();
	}
}

/* End of file M_home.php */
