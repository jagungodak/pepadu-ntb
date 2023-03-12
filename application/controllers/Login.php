<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/UserModel', 'userModel', 'TRUE');
		$this->load->model('admin/HakAksesModel', 'hakAksesModel', 'TRUE');
	}
	public function index()
	{
		$this->load->view('login');
	}


	//FUNGSI LOGIN
	function login()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');

		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$login = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$username = $login['username'];
		$password = md5($login['password']);
		$query = $this->userModel->getOne($username);
		if ($query) {
			if ($query['password'] == $password) {
				$kelompok = $this->hakAksesModel->getOne($query['idkelompok']);
				//simpan session
				$session = array(
					'userid'	=> $query['userid'],
					'username'	=> $query['username'],
					'nama_user'		=> $query['nama_user'],
					'idkelompok'	=> $query['idkelompok'],
					'menu'	=> $kelompok['menu'],
					'is_login' 	=> 'TRUE'
				);
				$this->session->set_userdata($session);

				//update status login
				$data = array('login' => 1);
				$this->userModel->update($data, $query['userid']);

				$pesan = array(
					'tipe' => 'success',
					'success' => true,
					'pesan' => 'Login Berhasil'
				);
			} else {
				$this->session->set_flashdata('error', 'Password salah ');
				$pesan = array(
					'tipe' => 'error',
					'success' => false,
					'pesan' => 'Password Salah'
				);
			}
		} else {
			$this->session->set_flashdata('error', 'User tidak ditemukan ');
			$pesan = array(
				'tipe' => 'error',
				'success' => false,
				'pesan' => 'User Tidak Ditemukan'
			);
		}
		echo json_encode($pesan);
	}


	function logout()
	{
		//update status login
		$data = array('login' => 0);
		$iduser = $this->session->userdata('userid');
		if ($iduser != '') {
			$this->userModel->update($data, $iduser);
		}

		$this->session->sess_destroy();
		$this->load->view('login');
	}
}
