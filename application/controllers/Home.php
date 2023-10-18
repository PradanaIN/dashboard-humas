<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("home_model");
	}

	public function index() 
	{
		$data['title'] = 'Home';

		$this->load->view('home/index', $data);
	}

	public function repository() 
	{
		$data['title'] = 'Repository';
		$data["internal"] = $this->home_model->getAll();

		$this->load->view('home/repository', $data);
	}


}
