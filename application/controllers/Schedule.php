<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserList extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Schedule';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header');
        $this->load->view('schedule/index', $data);
        $this->load->view('templates/footer');
    }
}
