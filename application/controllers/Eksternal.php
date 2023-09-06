<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eksternal extends CI_Controller
{
	
	public function index() 
	{
		$data['title'] = 'Eksternal';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header');
		$this->load->view('repository/eksternal/index', $data);
		$this->load->view('templates/footer');
	}

}
