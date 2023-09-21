<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->library('form_validation');
		$this->load->model('kegiatan_model');
	}

    public function index()
    {
        $data['title'] = 'kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data["kegiatan"] = $this->kegiatan_model->getAll();

        $this->load->view('templates/header');
        $this->load->view('kegiatan/index', $data);
        $this->load->view('templates/footer');
    }

	// detail kegiatan
	public function detail($id = null)
	{
		if (!isset($id)) redirect('kegiatan/index');

		$kegiatan = $this->kegiatan_model;
		$data["kegiatan"] = $kegiatan->getById($id);
		if (!$data["kegiatan"]) show_404();

		$this->load->view('templates/header');
		$this->load->view('kegiatan/detail', $data);
		$this->load->view('templates/footer');
	}

	// add
	public function add()
	{
		$validation = $this->form_validation;
		$validation->set_rules($this->kegiatan_model->rules());

		if ($validation->run()) {
			$this->kegiatan_model->save();
			$this->session->set_flashdata('success', 'Berhasil ditambahkan!');
			redirect('kegiatan/index');
		}
	}

	// edit
	public function edit($id = null)
	{
		if (!isset($id)) redirect('kegiatan/index');

		$validation = $this->form_validation;
		$validation->set_rules($this->kegiatan_model->rules());

		if ($validation->run()) {
			$this->kegiatan_model->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan!');
			redirect('kegiatan/detail/' . $id);
		} else {
			$this->session->set_flashdata('error', 'Gagal disimpan!');
			redirect('kegiatan/detail/' . $id);
		}
	}

	// delete
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->kegiatan_model->delete($id)) {
			$this->session->set_flashdata('success', 'Berhasil dihapus!');
			redirect(site_url('kegiatan/index'));
		}
	}

	// download
	public function download_0($id, $filename)
	{
		$kegiatan = $this->kegiatan_model->getById($id);
    
		if ($kegiatan) {

        $fileList = explode(',', $kegiatan->file);

        $file = trim($fileList[0]);

        if (!empty($file) && $file === $filename) {
            $file_path = 'upload/internal/' . $file;
            if (file_exists($file_path)) {
                force_download($file_path, NULL);
			} else {
				$this->session->set_flashdata('error', 'File tidak ditemukan!');
				redirect('kegiatan/detail/' . $id);
			}
		}
	}}
	public function download_1($id, $filename)
	{
		$kegiatan = $this->kegiatan_model->getById($id);
	
		if ($kegiatan) {

		$fileList = explode(',', $kegiatan->file);

		$file = trim($fileList[1]);

		if (!empty($file) && $file === $filename) {
			$file_path = 'upload/internal/' . $file;
			if (file_exists($file_path)) {
				force_download($file_path, NULL);
			} else {
				$this->session->set_flashdata('error', 'File tidak ditemukan!');
				redirect('kegiatan/detail/' . $id);
			}
		}
	}}
	public function download_2($id, $filename)
	{
		$kegiatan = $this->kegiatan_model->getById($id);
	
		if ($kegiatan) {

		$fileList = explode(',', $kegiatan->file);

		$file = trim($fileList[2]);

		if (!empty($file) && $file === $filename) {
			$file_path = 'upload/internal/' . $file;
			if (file_exists($file_path)) {
				force_download($file_path, NULL);
			} else {
				$this->session->set_flashdata('error', 'File tidak ditemukan!');
				redirect('kegiatan/detail/' . $id);
			}
		}
	}}

}
