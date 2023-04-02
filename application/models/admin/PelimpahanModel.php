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
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.userid=tbl_pelimpahan.userid');
        $this->db->join('m_kemenag', 'm_kemenag.kode=tbl_user.kode_kab');
        $this->db->order_by('tbl_pelimpahan.pelimpahan_id', 'DESC');
        if ($limit == NULL) {
            return $this->db->get()->result();
        } else {
            return $this->db->limit($limit['perpage'], $limit['offset'])->get()->result();
        }
    }
    //Get All Data Pelimpahan
    function getByUserid($userid)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.userid=tbl_pelimpahan.userid');
        $this->db->join('m_kemenag', 'm_kemenag.kode=tbl_user.kode_kab');
        $this->db->where('tbl_pelimpahan.userid', $userid);
        $this->db->order_by('tbl_pelimpahan.pelimpahan_id', 'DESC');
        return $this->db->get()->result();
    }
    //Get All Data Pelimpahan
    function getByKabKota($jenis, $tglm, $tgla, $jenisp)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.userid=tbl_pelimpahan.userid');
        $this->db->join('m_kemenag', 'm_kemenag.kode=tbl_user.kode_kab');
        $this->db->where('tbl_user.kode_kab', $jenis);
        if ($jenisp != 'all') {
            $this->db->where('tbl_pelimpahan.jamaah_jenis', $jenisp);
        }

        $this->db->where('tbl_pelimpahan.tgl_input >=', $tglm);
        $this->db->where('tbl_pelimpahan.tgl_input <=', $tgla);
        $this->db->order_by('tbl_pelimpahan.pelimpahan_id', 'ASC');
        return $this->db->get()->result();
    }

    //Get Satu Data Pelimpahan
    function getOne($userid)
    {

        // $query = $this->db->get_where($this->table, ['pelimpahan_id' => $userid]);
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('tbl_user', 'tbl_user.userid=tbl_pelimpahan.userid');
        $this->db->join('m_kemenag', 'm_kemenag.kode=tbl_user.kode_kab');
        $this->db->where('tbl_pelimpahan.pelimpahan_id', $userid);
        $this->db->order_by('tbl_pelimpahan.pelimpahan_id', 'DESC');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
    //Get Data Kab/Kota
    function getKabKota($kec_id, $kab_id, $prop_id)
    {
        $this->db->select('*');
        $this->db->from('m_kode_kecamatan');
        $this->db->join('m_kode_kabupaten', 'm_kode_kabupaten.kode_kabupaten=m_kode_kecamatan.kode_kabupaten and m_kode_kabupaten.kode_propinsi=m_kode_kecamatan.kode_propinsi');
        $this->db->join('m_kode_propinsi', 'm_kode_propinsi.kode_propinsi=m_kode_kecamatan.kode_propinsi ');
        $this->db->where('m_kode_kecamatan.kode_kecamatan', $kec_id);
        $this->db->where('m_kode_kecamatan.kode_kabupaten', $kab_id);
        $this->db->where('m_kode_kecamatan.kode_propinsi', $prop_id);
        $this->db->limit(0, 1);
        $query = $this->db->get();

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
        $this->db->where('pelimpahan_id', $id);
        return $this->db->update($this->table, $data);
    }

    #delete
    function delete($data)
    {
        // $this->db->where('pelimpahan_id', $id);
        return $this->db->delete($this->table, $data);
    }
}