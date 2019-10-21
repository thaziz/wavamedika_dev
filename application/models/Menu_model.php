<?php

class Menu_model extends CI_Model
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

	public function daftar_menu($offset, $rows)
    {
		$query = $this->db->get('menus');
		$result['total'] = $query->num_rows();

		$query = $this->db->get('menus', $rows, $offset);
		$result['rows'] = $query->result();

		return $result;
    }

	public function tambah_user($input)
	{
        $input['created_at'] = strtotime(date('Y-m-d H:i:s'));
		$input['updated_at'] = strtotime(date('Y-m-d H:i:s'));
		$result = $this->db->insert('users', $input);

		if ($result) {
			$result = $this->db->insert_id();
		}

		return $result;
	}

	public function ubah_user($update, $where)
	{
		$update['updated_at'] = strtotime(date('Y-m-d H:i:s'));
		$result = $this->db->update('users', $update, $where);

		return $result;
	}

	public function hapus_user($where)
	{
		$result = $this->db->delete('users', $where);

		return $result;
	}
}
