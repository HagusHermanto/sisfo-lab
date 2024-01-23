<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function index()
	{
		$data = array(
			'title'		=> 'Admin',
			'title1'	=> 'Dashboard',
			'isi'		=> 'admin/v_home'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}
}

/* End of file Admin.php */
