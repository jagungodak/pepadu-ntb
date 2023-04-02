<?php
class KabupatenModel extends CI_Model
{
    function __construct()
    {

        parent::__construct();

        $this->load->database();
    }
    private $table = 'm_kode_kabupaten';

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

    //Get Kecamatan By Kab Prov
    function getKabupatenByProv($idprov)
    {
        $query = $this->db->get_where($this->table, ['kode_propinsi' => $idprov]);
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