<?php

class User_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login($username, $password)
    {
		$result = $this->db->get_where('users', array(
			'username' => $username,
			'password' => md5($password)
		));

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
	}

    public function daftar_user_old()
    {
		$this->db->from('users');
		$result = $this->db->get();

		return $result->result();
    }

	public function daftar_user($offset, $rows)
    {
		$query = $this->db->get('users');
		$result['total'] = $query->num_rows();

		$query = $this->db->get('users', $rows, $offset);
		$result['rows'] = $query->result();

		return $result;
    }

	public function tambah_user($input)
	{
		$result = $this->db->insert('users', $input);

		if ($result) {
			$result = $this->db->insert_id();
		}

		return $result;
	}

	public function ubah_user($input, $id)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('users', $input);

		return $result;
	}

	public function hapus_user($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('users');

		return $result;
	}
}
