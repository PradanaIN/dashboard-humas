<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('schedule_model');
	}

    public function index()
    {
        $data['title'] = 'Schedule';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header');
        $this->load->view('schedule/index', $data);
        $this->load->view('templates/footer');
    }

	// detail schedule
	// public function detail($id)
	public function detail()
	{
		// $data['title'] = 'Detail Schedule';
		// $data['schedule'] = $this->schedule_model->getScheduleById($id);
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header');
		$this->load->view('schedule/detail');
		$this->load->view('templates/footer');
	}

}
