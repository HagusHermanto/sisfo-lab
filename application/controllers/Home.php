<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
	}

	public function index()
	{
		$data = array(
			'title'	=> 'Home',
			'isi'	=> 'v_home'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function download()
	{
		$data = array(
			'title' 	=> 'Download',
			'download' 	=> $this->m_home->download(),
			'isi'		=> 'v_download'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function jadwal()
	{
		$data = array(
			'title' 	=> 'Jadwal Praktikum',
			'download' 	=> $this->m_home->jadwal(),
			'isi'		=> 'v_jadwal'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function pengumuman()
	{
		$data = array(
			'title' 	=> 'Jadwal Praktikum',
			'pengumuman' 	=> $this->m_home->pengumuman(),
			'isi'		=> 'v_pengumuman'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}
}

/* End of file Home.php */
