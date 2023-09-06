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
			$this->load->view('templates/auth_header');
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');	
		} else {
			// if form validation success
			$this->_login();
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
						'role_id' => $user['role_id']
					];

					$this->session->set_userdata($data);

					// redirect to dashboard
					redirect('dashboard');
				} else {
					// if password is incorrect
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('auth');
				}
			} else {
				// if user is not active
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktivasi!</div>');
				redirect('auth');
			}
		} else {
			// if user doesn't exists
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email salah!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{

		// set rules for form validation
		$this->form_validation->set_rules('name', 'name', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|matches[cpassword]', [
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('cpassword', 'cpassword', 'required|trim|matches[password]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header');
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');	
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)), // true for XSS
				'email' => htmlspecialchars($this->input->post('email', true)), // true for XSS
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // default password hashing
				'image' => 'default.jpg',
				'role_id' => 3,
				'date_created' => time(),
				'is_active' => 1
			];  

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dibuat!</div>');
			redirect('auth');
		}
	}

	public function logout() {
		// unset session
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		// set flashdata
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil logout!</div>');
		redirect('auth');
	}
}
