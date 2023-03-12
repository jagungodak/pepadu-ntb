<?php
class PelimpahanModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private $table = 'tbl_pelimpahan';

    //Get All Data Pelimpahan
    function get($limit = array())
    {
        $this->db->select('*');
        if ($limit == NULL) {
            return $this->db->get($this->table)->result();
        } else {
            return $this->db->limit($limit['perpage'], $limit['offset'])->get($this->table)->result();
        }
    }
    //Get All Data Pelimpahan
    function getByUserid($userid)
    {

        return $this->db->get_where($this->table, ['userid' => $userid])->result();
    }

    //Get Satu Data Pelimpahan
    function getOne($userid)
    {

        $query = $this->db->get_where($this->table, ['data_id' => $userid]);;
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    #insert
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    #update
    function update($data, $id)
    {
        $this->db->update($this->table, $data, $id);
    }

    #delete
    function delete($data)
    {
        $this->db->delete($this->table, $data);
    }
}