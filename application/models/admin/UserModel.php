<?php
class UserModel extends CI_Model
{
	function __construct()
	{

		parent::__construct();

		$this->load->database();
	}
	private $table = 'tbl_user';
	//Get All User
	function get($limit = array())
	{
		$this->db->select('*');
		$this->db->join('m_kemenag', 'm_kemenag.kode=tbl_user.kode_kab');
		$this->db->join('tbl_kelompok_user', 'tbl_kelompok_user.idkelompok=tbl_user.idkelompok');
		$this->db->order_by('tbl_kelompok_user.nama_kelompok', 'ASC');
		if ($limit == NULL) {
			return $this->db->get($this->table)->result();
		} else {
			return $this->db->limit($limit['perpage'], $limit['offset'])->get($this->table)->result();
		}
	}


	//Get Satu USer
	function getOne($userid)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->join('m_kemenag', 'm_kemenag.kode=tbl_user.kode_kab');
		$this->db->join('tbl_kelompok_user', 'tbl_kelompok_user.idkelompok=tbl_user.idkelompok');
		$query = $this->db->where('tbl_user.userid', $userid)->get();
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return FALSE;
		}
	}
	//Get Satu USer
	function getUsername($username)
	{
		$query = $this->db->get_where($this->table, ['username' => $username]);

		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return FALSE;
		}
	}





	#insert
	function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}
	#update
	function update($data, $id)
	{
		$this->db->where('userid', $id);
		return $this->db->update($this->table, $data);
	}

	#delete
	function delete($data)
	{
		return $this->db->delete($this->table, $data);
	}
}