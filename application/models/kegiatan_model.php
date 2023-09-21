<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kegiatan_model extends CI_Model {
	private $_table = "kegiatan";

	public $id;
	public $kegiatan;
	public $tema;
	public $tempat;
	public $waktu_mulai;
	public $waktu_selesai;
	public $file;
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
    $this->file = $this->_uploadFiles(); 
    $this->kegiatan = $post["kegiatan"];
    $this->tema = $post["tema"];
    $this->tempat = $post["tempat"];
    $this->waktu_mulai = $post["waktu_mulai"];
    $this->waktu_selesai = $post["waktu_selesai"];
    $this->color = $post["color"];

    // Insert the data into the database
    $this->db->insert($this->_table, $this);
}

private function _uploadFiles()
{
    $uploaded_files = array();

    // Check if files were uploaded
    if (isset($_FILES['file']) && is_array($_FILES['file']['name'])) {
        $files = $_FILES['file'];

        // Load the upload library
        $this->load->library('upload');

        // Loop through each file
        for ($i = 0; $i < count($files['name']); $i++) {
            $_FILES['file[]'] = array(
                'name'     => $files['name'][$i],
                'type'     => $files['type'][$i],
                'tmp_name' => $files['tmp_name'][$i],
                'error'    => $files['error'][$i],
                'size'     => $files['size'][$i]
            );

            // Configure the upload settings
            $config['upload_path']   = './upload/internal/';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
            $config['overwrite']     = true;
            $config['max_size']      = 51200; // 50MB

            $this->upload->initialize($config);

            // Handle the upload for each file
            if ($this->upload->do_upload('file[]')) {				
                $uploaded_files[] = $this->upload->data('orig_name');

            } else {
                $uploaded_files[] = null;
            }
        }
    }

    return implode(',', $uploaded_files); // Store the file names as a comma-separated string in the database
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
		
		// check files
		if (!empty($_FILES["file"]["name"])) {
			// Upload new files
			$newFilesString = $this->_uploadFiles(); // Assuming this returns a comma-separated string
			$newFiles = explode(',', $newFilesString);
			$newFiles = array_map('trim', $newFiles); // Trim whitespace

			// Handle the case where old_file is an array
			$existingFiles = $post["old_file"];
			if (is_array($existingFiles)) {
						$existingFiles = implode(',', $existingFiles); // Convert the array to a comma-separated string
			}

			$existingFiles = explode(',', $existingFiles);
			$existingFiles = array_map('trim', $existingFiles); // Trim whitespace

			// Combine the existing files and new files while filtering out empty values
			$combinedFiles = [];

			// Merge old and new files maintaining the order of old files
			foreach ($existingFiles as $file) {
						if ($file !== '') {
									$combinedFiles[] = $file;
						}
			}

			// Add new files to the combined files
			foreach ($newFiles as $file) {
						if ($file !== '') {
									$combinedFiles[] = $file;
						}
			}

			// Ensure that the combined files do not exceed the maximum allowed (3 files)
			if (count($combinedFiles) > 3) {
						$combinedFiles = array_slice($combinedFiles, 0, 3); // Keep only the first 3 files
			}

			// Implode the combined files to store them as a comma-separated string
			$this->file = implode(',', $combinedFiles);
		} else {
			// No new files were uploaded, keep the existing files
			$this->file = $post["old_file"];
		}

		$this->db->update($this->_table, $this, array('id' => $post['id']));
	}


	// delete data
	public function delete($id)
	{
		$this->_deleteFiles($id);
		return $this->db->delete($this->_table, array("id" => $id));
	}

	private function _deleteFiles($id)
	{
		$kegiatan = $this->getById($id);
		if ($kegiatan->file != null) {
			$files = explode(",", $kegiatan->file);
			foreach ($files as $file) {
				$filename = $file;
				unlink(FCPATH . "upload/internal/" . $filename);
			}
		}
	}

}

