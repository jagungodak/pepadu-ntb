<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;

class User extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('fungsi');
        $this->load->model('admin/MenuModel', 'menuModel', TRUE);
        $this->load->model('admin/UserModel', 'userModel', TRUE);
        $this->load->model('admin/KemenagModel', 'kemenagModel', TRUE);
        $this->load->model('admin/HakAksesModel', 'kelompokModel', TRUE);
    }

    public function index()
    {
        $data = array();
        $data = $this->getData();
        $data['data'] = $this->userModel->get();
        $data['kab'] = $this->kemenagModel->get();
        $data['kelompok'] = $this->kelompokModel->get();
        if ($this->fungsi->cek_login()) {
            $this->load->view('admin/user/user', $data);
        } else {
            $this->load->view('login');
        }
    }
    public function pengaturan()
    {
        $data = array();
        $data = $this->getData();
        $data['user'] = $this->userModel->getOne($data['userid']);
        if ($this->fungsi->cek_login()) {
            $this->load->view('admin/user/pengaturan', $data);
        } else {
            $this->load->view('login');
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

    public function getAll()
    {
        $response = array();
        $data['data'] = array();
        $result = $this->userModel->get();
        foreach ($result as $key => $value) {
            $ops = '';
            if ($value->idkelompok != 1) {
                $ops .= '	<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $value->userid . ')"><i class="fa fa-trash"></i></button> ';
                $ops .= '	<button type="button" class="btn btn-sm btn-success" onclick="reset(' . $value->userid . ')"><i class="fa fa-key"></i></button> ';
                $ops .= '	<button type="button" class="btn btn-sm btn-warning" onclick="editdata(' . $value->userid . ')"><i class="fa fa-edit"></i></button> ';

            }

            $data['data'][$key] = array(
                $value->userid,
                $value->username,
                $value->password,
                $value->nama_kelompok,
                $value->nama_user,
                $value->nama_kab,
                $ops,
            );

        }

        //JSON RESPON
        header('Content-Type: application/json');
        $response = json_encode($data);
        echo $response;
    }

    public function getOne()
    {
        $userid = $this->input->post('userid', TRUE);
        $data = $this->userModel->getOne($userid);
        //JSON RESPON
        header('Content-Type: application/json');
        $response = json_encode($data);
        echo $response;
    }

    public function prosesadd()
    {
        $this->load->helper(array('form', 'url'));
        $response = array();
        ///JAMAAH
        $jenis = $this->input->post('jenis', TRUE);
        $fields['username'] = $this->input->post('username', TRUE);
        $fields['password'] = md5($this->input->post('password', TRUE));
        $fields['idkelompok'] = $this->input->post('kelompok', TRUE);
        $fields['nama_user'] = $this->input->post('nama', TRUE);
        $fields['kode_kab'] = $this->input->post('kab', TRUE);
        $fields['status'] = '1';

        $this->load->library('form_validation');
        if ($jenis == 1) {
            $this->form_validation->set_rules(
                'username',
                'Username yang digunakan',
                'required|is_unique[tbl_user.username]',
                array(
                    'required' => 'Username Wajib Diisi',
                    'is_unique' => 'Username %s Sudah Digunakan Pengguna Lain.'
                )
            );
        } else {
            $this->form_validation->set_rules(
                'username',
                'Username yang digunakan',
                'required',
                array(
                    'required' => 'Username Wajib Diisi'
                )
            );
        }

        $this->form_validation->set_rules(
            'password',
            'Password yang digunakan',
            'required',
            array(
                'required' => 'Password Wajib Diisi'
            )
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama Lengkap yang digunakan',
            'required',
            array(
                'required' => 'Nama Lengkap Wajib Diisi'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $response['success'] = false;
            $response['messages'] = validation_errors();
        } else {
            if ($jenis == 1) {
                if ($this->userModel->insert($fields)) {
                    $response['success'] = true;
                    $response['messages'] = 'Data has been inserted successfully';
                } else {
                    $response['success'] = false;
                    $response['messages'] = 'Proses Input Data GAGAL!';
                }

            } else {
                $fields['userid'] = $this->input->post('userid', TRUE);
                if ($this->userModel->update($fields, $fields['userid'])) {
                    $response['success'] = true;
                    $response['messages'] = 'Data has been Update successfully';
                } else {
                    $response['success'] = false;
                    $response['messages'] = 'Proses Update Data GAGAL!';
                }
            }

        }
        //JSON RESPON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function updateprofile()
    {
        $response = array();
        $data['nama_user'] = $this->input->post('nama', TRUE);
        $data2['kode'] = $this->input->post('kode', TRUE);
        $data2['nama_kab'] = $this->input->post('nama_kab', TRUE);
        $data2['baris1'] = $this->input->post('baris1', TRUE);
        $data2['baris2'] = $this->input->post('baris2', TRUE);
        $data2['kepala'] = $this->input->post('kepala', TRUE);
        $data2['kota'] = $this->input->post('kota', TRUE);
        $data2['nip'] = $this->input->post('nip', TRUE);
        $data2['nomor'] = $this->input->post('nomor', TRUE);
        $data2['jabatan'] = $this->input->post('jabatan', TRUE);
        $data2['unit_kerja'] = $this->input->post('unit_kerja', TRUE);
        if ($this->fungsi->cek_login()) {
            $this->userModel->update($data, $this->session->userdata('userid'));
            if ($this->kemenagModel->update($data2, $data2['kode'])) {
                $response['success'] = true;
                $response['messages'] = 'Data Berhasil Di Simpan';
            } else {
                $response['success'] = false;
                $response['messages'] = 'Data Gagal Disimpan';
            }
        } else {
            $response['success'] = false;
            $response['messages'] = 'Sesi berakhir. Silahkan Login Ulang';
        }
        //JSON RESPON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function updatepassword()
    {
        $response = array();
        $password = md5($this->input->post('password1', TRUE));
        $pass1 = md5($this->input->post('pass1', TRUE));
        $pass2 = md5($this->input->post('pass2', TRUE));
        $data2['password'] = $pass1;
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => 'Password Lama Tidak Boleh Kosong.'
            )
        );
        $this->form_validation->set_rules(
            'pass1',
            'Password',
            'required',
            array(
                'required' => 'Password Baru Tidak Boleh Kosong.'
            )
        );
        $this->form_validation->set_rules(
            'pass2',
            'Password',
            'required',
            array(
                'required' => 'Password Baru Ke-2 Tidak Boleh Kosong.'
            )
        );
        if ($this->fungsi->cek_login()) {
            if ($this->form_validation->run() == FALSE) {
                $response['success'] = false;
                $response['messages'] = validation_errors();
            } else if ($password != $this->session->userdata('password')) {
                $response['success'] = false;
                $response['messages'] = 'Password Lama Tidak Sesuai' . $password . '-' . $this->session->userdata('password');
            } else if ($pass1 != $pass2) {
                $response['success'] = false;
                $response['messages'] = 'Password Baru tidak cocok ulangi kembali';
            } elseif ($this->userModel->update($data2, $this->session->userdata('userid'))) {
                $response['success'] = true;
                $response['messages'] = 'Data Berhasil Di Simpan';
            } else {
                $response['success'] = false;
                $response['messages'] = 'Data Gagal Disimpan';
            }
        } else {
            $response['success'] = false;
            $response['messages'] = 'Sesi berakhir. Silahkan Login Ulang';
        }
        //JSON RESPON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function reset()
    {
        $response = array();
        if ($this->fungsi->cek_login()) {
            $id = $this->input->post('id', TRUE);
            $data = $this->userModel->getOne($id);
            $fields['userid'] = $id;
            $fields['password'] = md5($data['username']);
            if ($this->userModel->update($fields, $fields['userid'])) {
                $response['success'] = true;
                $response['messages'] = 'Password telah berhasil di-Reset';
            } else {
                $response['success'] = false;
                $response['messages'] = 'Proses Update Password GAGAL!';
            }
        } else {
            $response['success'] = false;
            $response['messages'] = 'Session Anda Habis. Silahkan Login Ulang';
        }
        //JSON RESPON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function remove()
    {
        $response = array();
        if ($this->fungsi->cek_login()) {
            $id = $this->input->post('id', TRUE);
            $fields['userid'] = $id;
            if ($id == '' || $id == null) {
                $response['success'] = false;
                $response['messages'] = 'Pilih Data Yang akan dihapus terlebih dahulu';
            } else {
                if ($this->userModel->delete($fields)) {
                    $response['success'] = true;
                    $response['messages'] = 'Data has been Remove successfully';
                } else {
                    $response['success'] = false;
                    $response['messages'] = 'Proses Input Data GAGAL!';
                }
            }
        } else {
            $response['success'] = false;
            $response['messages'] = 'Session Anda Habis. Silahkan Login Ulang';
        }

        //JSON RESPON
        header('Content-Type: application/json');
        echo json_encode($response);

    }

}