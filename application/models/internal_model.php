<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Internal_model extends CI_Model
{
    private $_table = "kegiatan";

	public $id;
	public $file;
	public $kegiatan;
	public $tempat;
	public $tanggal;
	public $tema;
	
	// rules
	public function rules()
	{
		return [
			['field' => 'kegiatan',
			'label' => 'Kegiatan',
			'rules' => 'required'],
			
			['field' => 'tempat',
			'label' => 'Tempat',
			'rules' => 'required'],
			
			['field' => 'tanggal',
			'label' => 'Tanggal',
			'rules' => 'required'],

			['field' => 'tema', 
			'label' => 'Tema',
			'rules' => 'required']
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
		$this->file = $this->_uploadFile();
		$this->kegiatan = $post["kegiatan"];
		$this->tema = $post["tema"];
		$this->tempat = $post["tempat"];
		$this->tanggal = $post["tanggal"];
		$this->db->insert($this->_table, $this);
	}

	// upload file
	private function _uploadFile()
	{
		$config['upload_path']          = './upload/internal/';
		$config['allowed_types']        = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
		$config['overwrite']            = true;
		$config['max_size']             = 51200; // 50MB
	
		$this->load->library('upload', $config);
	
		if ($this->upload->do_upload('file')) {
			// Get the original file name
			$original_name = $this->upload->data("orig_name");
			
			// Rename the uploaded file with the original file name
			rename($config['upload_path'] . $this->upload->file_name, $config['upload_path'] . $original_name);
	
			return $original_name;
		}
	
		// If an error occurs, return an error message
		return $this->upload->display_errors();
	}
	
	
	// update data
	public function update()
	{
		$post = $this->input->post();
		$this->id = $post["id"];

		// upload file
		if (!empty($_FILES["file"]["name"])) {
			$this->file = $this->_uploadFile();
			$this->_deleteFile($post["id"]);
		} 
		else {
			$this->file = $post["old_file"];
		}

		$this->kegiatan = $post["kegiatan"];
		$this->tema = $post["tema"];
		$this->tempat = $post["tempat"];
		$this->tanggal = $post["tanggal"];
		$this->db->update($this->_table, $this, array('id' => $post['id']));
	}

	// delete data
	public function delete($id)
	{
		$this->_deleteFile($id);
		return $this->db->delete($this->_table, array("id" => $id));
	}

	private function _deleteFile($id)
	{
		$internal = $this->getById($id);
		
		$filename = explode(".", $internal->file)[0];
		return array_map('unlink', glob("./upload/internal/$filename.*"));
	}

}
