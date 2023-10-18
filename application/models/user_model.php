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

		// if not update the password
		if ($post["password"] == "") {
			$this->password = $post["old_password"];
		} else {
			$this->password = password_hash($post["password"], PASSWORD_DEFAULT);
		}

		$this->db->update($this->_table, $this, array('id' => $post['id']));
	}


	// delete data
	public function delete($id)
	{
		return $this->db->delete($this->_table, array("id" => $id));
	}

}
