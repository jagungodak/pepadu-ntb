<?php
class HakAksesModel extends CI_Model
{
	private $table = 'tbl_kelompok_user';
	function __construct()
	{

		parent::__construct();

		$this->load->database();
	}
	#admin
	function get($limit = array())
	{
		$this->db->select('*');
		if ($limit == NULL) {
			return $this->db->order_by('idkelompok', 'ASC')->get($this->table)->result();
		} else {
			return $this->db->limit($limit['perpage'], $limit['offset'])->order_by('idkelompok', 'ASC')->get($this->table)->result();
		}
	}
	#admin
	function getOne($id)
	{
		$this->db->select('*');
		$this->db->where('idkelompok', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return FALSE;
		}
	}
	#admin
	function getAllUser($id)
	{
		$this->db->select('*');
		$this->db->where('id_menu', $id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return $this->db->order_by('no_urut', 'ASC')->get($this->table)->result();
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
		$this->db->where('idkelompok', $id);
		return $this->db->update($this->table, $data);
	}
	#delete
	function delete($data)
	{
		return $this->db->delete($this->table, $data);
	}
}