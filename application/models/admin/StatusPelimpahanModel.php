<?php
class StatusPelimpahanModel extends CI_Model
{
    function __construct()
    {

        parent::__construct();

        $this->load->database();
    }
    private $table = 'tbl_status_pelimpahan';

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
    //Get Semua Status By ID Pelimpahan
    function getStatusByIdPelimpahan($id)
    {
        $query = $this->db->get_where($this->table, ['pelimpahan_id' => $id]);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    //Get Status Akhir Pelimpahan
    function getStatusTerakhir($id)
    {
        // $this->db->get_where($this->table, ['pelimpahan_id' => $id]);
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('pelimpahan_id', $id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
    //Get Status Akhir Pelimpahan
    function getAllStatusId($id)
    {
        // $this->db->get_where($this->table, ['pelimpahan_id' => $id]);
        $this->db->select('tbl_status_pelimpahan.id,
                        tbl_status_pelimpahan.`status`,
                        tbl_status_pelimpahan.tgl,
                        tbl_status_pelimpahan.pelimpahan_id,
                        tbl_status_pelimpahan.userid,
                        tbl_status_pelimpahan.keterangan,
                        tbl_user.nama_user,
                        m_kemenag.nama_kab');
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.userid=tbl_status_pelimpahan.userid ');
        $this->db->join('m_kemenag', 'm_kemenag.kode=tbl_user.kode_kab ');
        $this->db->where('pelimpahan_id', $id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();

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
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data, $id);
    }

    #delete
    function delete($data)
    {
        return $this->db->delete($this->table, $data);
    }
}