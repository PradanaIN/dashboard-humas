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


}


