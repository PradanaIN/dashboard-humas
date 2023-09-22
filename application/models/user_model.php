<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model
{
    private $_table = "user";

	public $id;
	public $nama;
	public $email;
	public $password;
	public $role_id;
	public $is_active;
	public $date_created;
	public $image;

	//rules
	public function rules()
	{
		return [
			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email'],

			['field' => 'role', 
			'label' => 'Role',
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
		$this->nama = $post["nama"];
		$this->email = $post["email"];
		$this->password = password_hash($post["password"], PASSWORD_DEFAULT);
		$this->role_id = $post["role"];
		$this->is_active = 1;
		$this->date_created = date("Y-m-d H:i:s");
		$this->image= "https://cdn.pnghd.pics/data/743/logo-badan-pusat-statistik-png-2.jpg";

		$this->db->insert($this->_table, $this);
	}

	// update data
	public function update() {
		$post = $this->input->post();
		
		$this->id = $post["id"];
		$this->nama = $post["nama"];
		$this->email = $post["email"];
		$this->role_id = $post["role"];
		$this->is_active = 1;
		$this->date_created = date("Y-m-d H:i:s");
		
		// check if upload new image
		if (!empty($_FILES["image"]["name"])) {
			$this->image = $this->_uploadImage();
		} else {
			$this->image = $post["old_file"];
		}

		// if not update the password
		if ($post["password"] == "") {
			$this->password = $post["old_password"];
		} else {
			$this->password = password_hash($post["password"], PASSWORD_DEFAULT);
		}

		$this->db->update($this->_table, $this, array('id' => $post['id']));
	}

	// _uploadImage
	private function _uploadImage()
	{
		$config['upload_path']          = 'upload/image/';
		$config['allowed_types']        = 'jpg|png';
		$config['file_name']            = $this->id;
		$config['overwrite']			= true;
		$config['max_size']             = 5120; // 5MB

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}

	}

	// delete data
	public function delete($id)
	{
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("id" => $id));
	}

	// _deleteImage
	private function _deleteImage($id)
	{
		$user = $this->getById($id);
		if ($user->image != "default.jpg") {
			$filename = explode(".", $user->image)[0];
			return array_map('unlink', glob(FCPATH."upload/image/$filename.*"));
		}
	}

}
