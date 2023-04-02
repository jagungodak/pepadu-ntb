<?php
class MenuModel extends CI_Model
{
    function __construct()
    {

        parent::__construct();

        $this->load->database();
    }
    private $table = 'tbl_menu';

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
    //Get All User
    function getLevel2($limit = array())
    {
        $this->db->select('*');
        $this->db->where('level <=', '2');
        $this->db->order_by('nama_menu', 'ASC');

        if ($limit == NULL) {
            return $this->db->get($this->table)->result();
        } else {
            return $this->db->limit($limit['perpage'], $limit['offset'])->get($this->table)->result();
        }

    }

    //cek apakah memiliki sub
    function cekSub($id)
    {
        $query = $this->db->get_where($this->table, ['induk' => $id]);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    //Get Menu Induk
    function getMenuInduk()
    {

        $query = $this->db->get_where($this->table, ['induk' => 0]);
        ;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    //Get Menu Induk
    function getByInduk($id)
    {

        $query = $this->db->get_where($this->table, ['induk' => $id]);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    //Get Menu Induk
    function getMenuSub($id)
    {

        $query = $this->db->get_where($this->table, ['induk' => $id]);
        ;
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    //Get Satu USer
    function getOne($userid)
    {

        $query = $this->db->get_where($this->table, ['id_menu' => $userid]);
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
        $this->db->where('id_menu', $id);
        return $this->db->update($this->table, $data);
    }

    #delete
    function delete($data)
    {
        return $this->db->delete($this->table, $data);
    }
}