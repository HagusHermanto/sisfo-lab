<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jadwal');
	}


	public function index()
	{
		$data = array(
			'title'  => 'Sisfo Lab',
			'title2' => 'Jadwal Praktikum',
			'jadwal'  => $this->m_jadwal->lists(),
			'isi'	 => 'admin/v_jadwal'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$data = array(
			'nama_mk' => $this->input->post('nama_mk'),
			'hari' => $this->input->post('hari'),
			'jam' => $this->input->post('jam'),
			'sks' => $this->input->post('sks'),
			'semester' => $this->input->post('semester'),
			'nama_lab' => $this->input->post('nama_lab'),
			'dosen' => $this->input->post('dosen')
		);
		$this->m_jadwal->add($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
		redirect('jadwal');
	}

	public function edit($id_jadwal)
	{
		$data = array(
			'id_jadwal'   => $id_jadwal,
			'nama_mk' => $this->input->post('nama_mk'),
			'hari' => $this->input->post('hari'),
			'jam' => $this->input->post('jam'),
			'sks' => $this->input->post('sks'),
			'semester' => $this->input->post('semester'),
			'nama_lab' => $this->input->post('nama_lab'),
			'dosen' => $this->input->post('dosen')
		);
		$this->m_jadwal->edit($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
		redirect('jadwal');
	}

	public function delete($id_jadwal)
	{
		$data = array(
			'id_jadwal'   => $id_jadwal,
		);
		$this->m_jadwal->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('jadwal');
	}
}

/* End of file Jadwal.php */
