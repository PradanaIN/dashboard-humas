<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	// form validation library
	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->library('form_validation');
	}

	public function index() 
	{
		$data['title'] = 'User List';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// get all user
		$data["user"] = $this->db->get('user')->result();

		$this->load->view('templates/header');
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	// add new user
	public function add()
	{
		$user = $this->user_model;
		$validation = $this->form_validation;
		$validation->set_rules($user->rules());

		if ($validation->run()) {
			$user->save();
			$this->session->set_flashdata('success', 'Berhasil ditambahkan!');
			redirect('user/index');
		}

	}

	// edit user
	public function edit($id = null)
	{
		if (!isset($id)) redirect('user/index');

		$user = $this->user_model;
		$validation = $this->form_validation;
		$validation->set_rules($user->rules());

		if ($validation->run()) {
			$user->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan!');
			redirect('user/index');
		}

		$data["user"] = $user->getById($id);
		if (!$data["user"]) show_404();

		$this->load->view('templates/header');
		$this->load->view('user/edit', $data);
		$this->load->view('templates/footer');
	}

	// delete user
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->user_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus!');
			redirect(site_url('user/index'));
		}
	}


}
