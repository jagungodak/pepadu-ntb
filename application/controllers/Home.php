<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
        $this->load->library('session');
	}
	public function index()
	{
        $data=array();
        $data['nama']=$this->session->userdata('nama_user');
        $data['userid']=$this->session->userdata('userid');
        $data['username']=$this->session->userdata('username');
        $data['idkelompok']=$this->session->userdata('idkelompok');
        if($this->session->username==''){
            $this->load->view('login');
        }else{
            $this->load->view('admin/home',$data);
        }
		
	}
}
