<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eksternal extends CI_Controller
{
	// form validation library
	public function __construct()
	{
		parent::__construct();
		$this->load->model("eksternal_model");
		$this->load->library('form_validation');
		$this->load->helper('download');
	}

	public function index() 
	{
		$data['title'] = 'eksternal';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data["eksternal"] = $this->eksternal_model->getAll();

		// dump and die (dd)
		$this->load->view('templates/header');
		$this->load->view('repository/eksternal/index', $data);
		$this->load->view('templates/footer');
	}

	// add new data
	public function add()
	{
		$eksternal = $this->eksternal_model;
		$validation = $this->form_validation;
		$validation->set_rules($eksternal->rules());

		if ($validation->run()) {
			$eksternal->save();
			$this->session->set_flashdata('success', 'Berhasil ditambahkan!');
			redirect('eksternal/index');
		}

		$this->load->view('templates/header');
		$this->load->view('repository/eksternal/add');
		$this->load->view('templates/footer');
	}

	// edit data
	public function edit($id = null)
	{
		if (!isset($id)) redirect('eksternal/index');

		$eksternal = $this->eksternal_model;
		$validation = $this->form_validation;
		$validation->set_rules($eksternal->rules());

		if ($validation->run()) {
			$eksternal->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan!');
			redirect('eksternal/index');
		}

		$data["eksternal"] = $eksternal->getById($id);
		if (!$data["eksternal"]) show_404();

		$this->load->view('templates/header');
		$this->load->view('repository/eksternal/edit', $data);
		$this->load->view('templates/footer');
	}

	// delete data
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->eksternal_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus!');
			redirect('eksternal/index');
		}
	}

	// download file
	public function download($id)
	{
		$eksternal = $this->eksternal_model->getById($id);
		$file = 'upload/eksternal/'.$eksternal->file;
		force_download($file, NULL);
	}

}
