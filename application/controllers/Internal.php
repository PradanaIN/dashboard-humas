<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internal extends CI_Controller
{
	// form validation library
	public function __construct()
	{
		parent::__construct();
		$this->load->model("kegiatan_model");
		$this->load->library('form_validation');
		$this->load->helper('download');
	}

	public function index() 
	{
		$data['title'] = 'Internal';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data["internal"] = $this->kegiatan_model->getAll();

		$this->load->view('templates/header');
		$this->load->view('repository/internal/index', $data);
		$this->load->view('templates/footer');
	}

	// // add new data
	// public function add()
	// {
	// 	$internal = $this->internal_model;
	// 	$validation = $this->form_validation;
	// 	$validation->set_rules($internal->rules());

	// 	if ($validation->run()) {
	// 		$internal->save();
	// 		$this->session->set_flashdata('success', 'Berhasil ditambahkan!');
	// 		redirect('internal/index');
	// 	}

	// 	$this->load->view('templates/header');
	// 	$this->load->view('repository/internal/add');
	// 	$this->load->view('templates/footer');
	// }

	// // edit data
	// public function edit($id = null)
	// {
	// 	if (!isset($id)) redirect('internal/index');

	// 	$internal = $this->internal_model;
	// 	$validation = $this->form_validation;
	// 	$validation->set_rules($internal->rules());

	// 	if ($validation->run()) {
	// 		$internal->update();
	// 		$this->session->set_flashdata('success', 'Berhasil disimpan!');
	// 		redirect('internal/index');
	// 	}

	// 	$data["internal"] = $internal->getById($id);
	// 	if (!$data["internal"]) show_404();

	// 	$this->load->view('templates/header');
	// 	$this->load->view('repository/internal/edit', $data);
	// 	$this->load->view('templates/footer');
	// }

	// // delete data
	// public function delete($id = null)
	// {
	// 	if (!isset($id)) show_404();

	// 	if ($this->internal_model->delete($id)) {
	// 		$this->session->set_flashdata('success', 'Berhasil dihapus!');
	// 		redirect('internal/index');
	// 	}
	// }

	// // download file
	// public function download($id)
	// {
	// 	$internal = $this->internal_model->getById($id);
	// 	$file = 'upload/internal/'.$internal->file;
	// 	force_download($file, NULL);
	// }



}


