<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// get user name
		$data['name'] = $data['user']['nama'];

		// get total data from table
		$data['total_kegiatan'] = $this->db->get_where('kegiatan')->num_rows();
		$data['total_internal'] = $this->db->get_where('internal')->num_rows();
		$data['total_eksternal'] = $this->db->get_where('eksternal')->num_rows();
		$data['total_metadata'] = $this->db->get_where('metadata')->num_rows();

		$this->load->view('templates/header');
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
}
