<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metadata extends CI_Controller
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
		$data['title'] = 'Metadata';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data["metadata"] = $this->kegiatan_model->getAll();

		$this->load->view('templates/header');
		$this->load->view('repository/metadata/index', $data);
		$this->load->view('templates/footer');
	}


}
