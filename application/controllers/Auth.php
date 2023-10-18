<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	// form validation library
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		// set rules for form validation
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		// if form validation fails
		if ($this->form_validation->run() == false) {
			$data['title'] = "Login";
			$this->load->view('auth/login');
		} else {
			// if form validation success
			$this->_login();
		}

		// if user already logged in = is_login == true

		if ($this->session->userdata('is_login') == 'true') {
			redirect('dashboard');
		} 
	} 

	private function _login() 
	{
		// get input from form
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// get data from database
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// if user exists
		if ($user) {
			// if user is active
			if ($user['is_active'] == 1) {
				// if password is correct
				if (password_verify($password, $user['password'])) {
					// set session
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'name' => $user['nama'],
						'is_login' => 'true'
					];

					$this->session->set_userdata($data);

					if ($user['role_id'] == 1) {
						// if user is admin
						redirect('dashboard');
					} if ($user['role_id'] == 2) {
						// if user is kepala
						redirect('kegiatan');
					} else {
						// if user is user
						redirect('internal');
					} 

				} else {
					// if password is incorrect
					$this->session->set_flashdata('message', 'Password salah!');
					redirect('auth');
				}
			} else {
				// if user is not active
				$this->session->set_flashdata('message', 'Email belum diaktivasi!');
				redirect('auth');
			}
		} else {
			// if user doesn't exists
			$this->session->set_flashdata('message', 'Email tidak terdaftar!');
			redirect('auth');
		}
	}

	public function logout() {
		// unset session
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('role_id');

		// destroy session
		$this->session->sess_destroy();

		redirect('auth');
	}
}
