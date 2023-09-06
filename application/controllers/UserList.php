<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserList extends CI_Controller
{
	
	public function index() 
	{
		$data['title'] = 'User List';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header');
		$this->load->view('user-list/index', $data);
		$this->load->view('templates/footer');
	}

}
