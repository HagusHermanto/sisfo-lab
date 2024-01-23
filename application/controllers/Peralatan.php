<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peralatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_peralatan');
	}

	public function index()
	{
		$data = array(
			'title'  => 'Sisfo Laboratorium',
			'title2' => 'Data peralatan',
			'peralatan'	 => $this->m_peralatan->lists(),
			'isi'	 => 'admin/peralatan/v_list'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
		$this->form_validation->set_rules('banyak', 'banyak', 'required');
		$this->form_validation->set_rules('kode', 'kode', 'required');
		$this->form_validation->set_rules('tanggal_pembelian', 'Tanggal Pembelian', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');



		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './foto_peralatan/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto_peralatan')) {

				$data = array(
					'title'  => 'Sisfo Laboratorium',
					'title2' => 'Add Data peralatan',
					'error' => $this->upload->display_errors(),
					'isi'	 => 'admin/peralatan/v_add'
				);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
			} else {
				$upload_data 			 = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image']	 = './foto_peralatan/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);

				$data = array(
					'nama' 			=> $this->input->post('nama'),
					'jenis' 	=> $this->input->post('jenis'),
					'kondisi' 	=> $this->input->post('kondisi'),
					'banyak' 	=> $this->input->post('banyak'),
					'kode' 		=> $this->input->post('kode'),
					'tanggal_pembelian' 	=> $this->input->post('tanggal_pembelian'),
					'harga' 		=> $this->input->post('harga'),
					'foto_peralatan'	=> $upload_data['uploads']['file_name']
				);
				$this->m_peralatan->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !!');
				redirect('peralatan');
			}
		}

		$data = array(
			'title'  => 'Sisfo Laboratorium',
			'title2' => 'Add Data peralatan',
			'isi'	 => 'admin/peralatan/v_add'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	public function edit($id_peralatan)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
		$this->form_validation->set_rules('banyak', 'banyak', 'required');
		$this->form_validation->set_rules('kode', 'kode', 'required');
		$this->form_validation->set_rules('tanggal_pembelian', 'Tanggal Pembelian', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');



		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './foto_peralatan/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto_peralatan')) {

				$data = array(
					'title'  => 'Sisfo Laboratorium',
					'title2' => 'Edit peralatan',
					'error' => $this->upload->display_errors(),
					'peralatan' => $this->m_peralatan->detail($id_peralatan),
					'isi'	 => 'admin/peralatan/v_edit'
				);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
			} else {

				//menghapus file foto lama
				$peralatan = $this->m_peralatan->detail($id_peralatan);
				if ($peralatan->foto_peralatan != "") {
					unlink('./foto_peralatan/' . $peralatan->foto_peralatan);
				}
				//end menghapus foto

				$upload_data 			 = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image']	 = './foto_peralatan/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);

				$data = array(
					'id_peralatan'	=> $id_peralatan,
					'nama' 			=> $this->input->post('nama'),
					'jenis' 	=> $this->input->post('jenis'),
					'kondisi' 	=> $this->input->post('kondisi'),
					'banyak' 	=> $this->input->post('banyak'),
					'kode' 		=> $this->input->post('kode'),
					'tanggal_pembelian' 	=> $this->input->post('tanggal_pembelian'),
					'harga' 		=> $this->input->post('harga'),
					'foto_peralatan'	=> $upload_data['uploads']['file_name']
				);
				$this->m_peralatan->edit($data);
				$this->session->set_flashdata('pesan', 'peralatan Berhasil Di Edit !!');
				redirect('peralatan');
			}

			$data = array(
				'id_peralatan'	=> $id_peralatan,
				'nama' 			=> $this->input->post('nama'),
				'jenis' 	=> $this->input->post('jenis'),
				'kondisi' 	=> $this->input->post('kondisi'),
				'banyak' 	=> $this->input->post('banyak'),
				'kode' 		=> $this->input->post('kode'),
				'tanggal_pembelian' 	=> $this->input->post('tanggal_pembelian'),
				'harga' 		=> $this->input->post('harga'),
			);
			$this->m_peralatan->edit($data);
			$this->session->set_flashdata('pesan', 'peralatan Berhasil Di Edit !!');
			redirect('peralatan');
		}
		$data = array(
			'title'  => 'Sisfo Laboratorium',
			'title2' => 'Edit peralatan',
			'peralatan' => $this->m_peralatan->detail($id_peralatan),
			'isi'	 => 'admin/peralatan/v_edit'
		);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	public function delete($id_peralatan)
	{
		//menghapus file foto lama
		$peralatan = $this->m_peralatan->detail($id_peralatan);
		if ($peralatan->foto_peralatan != "") {
			unlink('./foto_peralatan/' . $peralatan->foto_peralatan);
		}
		//end menghapus foto

		$data = array('id_peralatan' => $id_peralatan);
		$this->m_peralatan->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!!');
		redirect('peralatan');
	}
}

/* End of file Peralatan.php */
