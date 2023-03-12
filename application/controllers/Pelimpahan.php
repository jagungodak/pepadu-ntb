<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelimpahan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('fungsi');
        $this->load->model('admin/MenuModel', 'menuModel', 'TRUE');
        $this->load->model('admin/PelimpahanModel', 'pelimpahanModel', 'TRUE');
    }

    public function index()
    {
        $data = array();
        $data = $this->getData();
        if ($this->session->username == '') {
            $this->load->view('login');
        } else {
            $this->load->view('admin/phu/pelimpahan', $data);
        }
    }

    public function getData()
    {

        $data = array();
        $data['nama'] = $this->session->userdata('nama_user');
        $data['userid'] = $this->session->userdata('userid');
        $data['username'] = $this->session->userdata('username');
        $data['idkelompok'] = $this->session->userdata('idkelompok');
        $data['menu'] = $this->session->userdata('menu');
        $data['menuModel'] = $this->menuModel;

        return $data;
    }

    public function getAllByUserid()
    {
        $response = array();
        $data['data'] = array();
        $result = $this->pelimpahanModel->getByUserid($this->session->userdata('userid'));
        $no = 1;

        foreach ($result as $key => $value) {
            $ops = '';
            
            $ops .= '	<button type="button" class="btn btn-sm btn-success" "><i class="fa fa-upload"></i></button> ';
            $ops .= '	<button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button> ';

            $data['data'][$key] = array(
                $no++,
                $value->jamaah_no_porsi,
                $value->jamaah_nama,
                $value->jamaah_jk,
                $value->jamaah_tptlahir.', '.$this->fungsi->tanggal($value->jamaah_tgllahir,false),
                $value->jamaah_jenis,
                $value->jamaah_hub_keluarga,
                $value->pelimpahan_nama,
                $value->pelimpahan_jk,
                 $value->pelimpahan_tptlahir.', '.$this->fungsi->tanggal($value->pelimpahan_tgllahir,false),
                $value->pelimpahan_alamat,
                $value->tgl_surat,
                $value->tgl_input,
                $this->session->userdata('nama_user'),
                $ops,
            );
        }

        //JSON RESPON
        header('Content-Type: application/json');
        $response=json_encode($data);
        echo $response;
    }
}
