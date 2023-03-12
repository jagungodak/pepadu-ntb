<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('admin/MenuModel', 'menuModel', 'TRUE');
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
    public function index()
    {
        $data = array();
        $data = $this->getData();
        if ($this->session->username == '') {
            $this->load->view('login');
        } else {
            $this->load->view('admin/home', $data);
        }
    }
}
