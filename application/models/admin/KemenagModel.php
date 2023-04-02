<?php
class KemenagModel extends CI_Model
{
    function __construct()
    {

        parent::__construct();

        $this->load->database();
    }
    private $table = 'm_kemenag';

    //Get All User
    function get($limit = array())
    {
        $this->db->select('*');
        if ($limit == NULL) {
            return $this->db->get($this->table)->result();
        } else {
            return $this->db->limit($limit['perpage'], $limit['offset'])->get($this->table)->result();
        }
    }



    //Get Satu USer
    function getOne($userid)
    {

        $query = $this->db->get_where($this->table, ['kode' => $userid]);
        ;
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
        $this->db->where('kode', $id);
        return $this->db->update($this->table, $data);
    }

    #delete
    function delete($data)
    {
        return $this->db->delete($this->table, $data);
    }
}