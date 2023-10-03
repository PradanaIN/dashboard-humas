<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kegiatan_model extends CI_Model {
	private $_table = "kegiatan";

	public $id;
	public $kegiatan;
	public $tema;
	public $tempat;
	public $waktu_mulai;
	public $waktu_selesai;
	public $file_undangan;
	public $file_materi;
	public $file_metadata;
	public $color;

	// rules
	public function rules()
	{
		return [
			['field' => 'kegiatan',
			'label' => 'Kegiatan',
			'rules' => 'required'],
			
			['field' => 'tema',
			'label' => 'Tema',
			'rules' => 'required'],
			
			['field' => 'tempat',
			'label' => 'Tempat',
			'rules' => 'required'],
			
			['field' => 'waktu_mulai',
			'label' => 'Waktu Mulai',
			'rules' => 'required'],

			['field' => 'waktu_selesai',
			'label' => 'Waktu Selesai',
			'rules' => 'required'],

			
		];
	}


	// get all data
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	// get data by id
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id" => $id])->row();
	}

	// save data
	public function save()
	{
		$post = $this->input->post();

		$this->id = uniqid();
		$this->file_undangan = $this->_uploadFileUndangan();
		$this->file_materi = $this->_uploadFileMateri();
		$this->file_metadata = $this->_uploadFileMetadata();
		$this->kegiatan = $post["kegiatan"];
		$this->tema = $post["tema"];
		$this->tempat = $post["tempat"];
		$this->waktu_mulai = $post["waktu_mulai"];
		$this->waktu_selesai = $post["waktu_selesai"];
		$this->color = $post["color"];

		$this->db->insert($this->_table, $this);
	}

	private function _uploadFileUndangan()
	{
		$config['upload_path']          = './upload/internal/';
		$config['allowed_types']        = 'pdf';
		$config['overwrite']			= true;
		$config['max_size']             = 51200; // 50MB
		$config['file_name'] = $_FILES['file_undangan']['name'];

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_undangan')) {
			return $this->upload->data("file_name");
		}
	}

	private function _uploadFileMateri()
	{
		$config['upload_path']          = './upload/internal/';
		$config['allowed_types']        = 'pptx|ppt|pdf';
		$config['overwrite']			= true;
		$config['max_size']             = 51200; // 50MB
		$config['file_name'] = $_FILES['file_materi']['name'];

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_materi')) {
			return $this->upload->data("file_name");
		}
	}

	private function _uploadFileMetadata()
	{
		$config['upload_path']          = './upload/internal/';
		$config['allowed_types']        = 'xls|xlsx|csv';
		$config['overwrite']			= true;
		$config['max_size']             = 51200; // 50MB
		$config['file_name'] = $_FILES['file_metadata']['name'];

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file_metadata')) {
			return $this->upload->data("file_name");
		}
	}

	// update data
	public function update()
	{
		$post = $this->input->post();
		$this->id = $post["id"];
		$this->kegiatan = $post["kegiatan"];
		$this->tema = $post["tema"];
		$this->tempat = $post["tempat"];
		$this->waktu_mulai = $post["waktu_mulai"];
		$this->waktu_selesai = $post["waktu_selesai"];
		$this->color = $post["color"];
		if (!empty($_FILES["file_undangan"]["name"])) {
			$this->file_undangan = $this->_uploadFileUndangan();
		} else {
			$this->file_undangan = $post["old_file_undangan"];
		}
		if (!empty($_FILES["file_materi"]["name"])) {
			$this->file_materi = $this->_uploadFileMateri();
		} else {
			$this->file_materi = $post["old_file_materi"];
		}
		if (!empty($_FILES["file_metadata"]["name"])) {
			$this->file_metadata = $this->_uploadFileMetadata();
		} else {
			$this->file_metadata = $post["old_file_metadata"];
		}
		$this->db->update($this->_table, $this, array('id' => $post['id']));
	}

	// delete data
	public function delete($id)
	{
		$this->_deleteFiles($id);
		return $this->db->delete($this->_table, array("id" => $id));
	}

	// delete files
	private function _deleteFiles($id)
	{
		$kegiatan = $this->getById($id);
	
		$filesToDelete = [
			$kegiatan->file_undangan,
			$kegiatan->file_materi,
			$kegiatan->file_metadata,
		];
	
		$deletedFiles = [];
	
		foreach ($filesToDelete as $file) {
			if ($file != "") {
				$filename = explode(".", $file)[0];
				$deletedFiles = array_merge(
					$deletedFiles,
					array_map('unlink', glob(FCPATH . "upload/internal/$filename.*"))
				);
			}
		}
	
		return $deletedFiles;
	}
	



}

