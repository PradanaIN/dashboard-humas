<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metadata extends CI_Controller
{
	// form validation library
	public function __construct()
	{
		parent::__construct();
		$this->load->model("metadata_model");
		$this->load->library('form_validation');
		$this->load->helper('download');
	}

	public function index() 
	{
		$data['title'] = 'Metadata';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data["metadata"] = $this->metadata_model->getAll();

		// dump and die (dd)
		$this->load->view('templates/header');
		$this->load->view('repository/metadata/index', $data);
		$this->load->view('templates/footer');
	}

	// add new data
	public function add()
	{
		$metadata = $this->metadata_model;
		$validation = $this->form_validation;
		$validation->set_rules($metadata->rules());

		if ($validation->run()) {
			$metadata->save();
			$this->session->set_flashdata('success', 'Berhasil ditambahkan!');
			redirect('metadata/index');
		}

		$this->load->view('templates/header');
		$this->load->view('repository/metadata/add');
		$this->load->view('templates/footer');
	}

	// edit data
	public function edit($id = null)
	{
		if (!isset($id)) redirect('metadata/index');

		$metadata = $this->metadata_model;
		$validation = $this->form_validation;
		$validation->set_rules($metadata->rules());

		if ($validation->run()) {
			$metadata->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan!');
			redirect('metadata/index');
		}

		$data["metadata"] = $metadata->getById($id);
		if (!$data["metadata"]) show_404();

		$this->load->view('templates/header');
		$this->load->view('repository/metadata/edit', $data);
		$this->load->view('templates/footer');
	}

	// delete data
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->metadata_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus!');
			redirect('metadata/index');
		}
	}

	// download file
	public function download($id)
	{
		$metadata = $this->metadata_model->getById($id);
		$file = 'upload/metadata/'.$metadata->file;
		force_download($file, NULL);
	}

}
