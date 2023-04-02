<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;

class Menu extends CI_Controller
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

    public function kelompok()
    {
        $data = array();
        $data = $this->getData();
        $data['kelompok'] = $this->kelompokModel->get();
        if ($this->fungsi->cek_login()) {
            $this->load->view('admin/menu/kelompok', $data);
        } else {
            $this->load->view('login');
        }
    }
    public function index()
    {
        $data = array();
        $data = $this->getData();
        $data['menul'] = $this->menuModel->getLevel2();
        $data['menul2'] = $this->menuModel->get();
        if ($this->fungsi->cek_login()) {
            $this->load->view('admin/menu/menu', $data);
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
    //View Urutan
    public function urutan()
    {
        $id = $this->input->post('id_menu', TRUE);
        $data = $this->menuModel->getByInduk($id);
        echo json_encode($data);
    }
    //View Kelompok
    public function getKelompokOne()
    {
        $id = $this->input->post('kelompok', TRUE);
        $data = $this->kelompokModel->getOne($id);
        echo json_encode($data);
    }
    public function getAll()
    {
        $response = array();
        $data['data'] = array();
        $result = $this->menuModel->getMenuInduk();
        $no = 1;
        $baris = 0;
        foreach ($result as $key => $value) {
            $ops = '';
            $ops .= '	<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $value->id_menu . ')"><i class="fa fa-trash"></i></button> ';
            $ops .= '	<button type="button" class="btn btn-sm btn-success" onclick="reset(' . $value->id_menu . ')"><i class="fa fa-key"></i></button> ';
            $ops .= '	<button type="button" class="btn btn-sm btn-warning" onclick="editdata(' . $value->id_menu . ')"><i class="fa fa-edit"></i></button> ';

            $data['data'][$baris] = array(
                $no++,
                $value->nama_menu,
                $value->link,
                $value->induk,
                $value->level,
                $value->no_urut,
                $value->icon,
                $value->tampil,
                $ops,
            );
            $baris++;
            if ($this->menuModel->cekSub($value->id_menu)) {
                $sub = $this->menuModel->getMenuSub($value->id_menu);
                foreach ($sub as $key2 => $value2) {
                    $ops2 = '';
                    $ops2 .= '	<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $value2->id_menu . ')"><i class="fa fa-trash"></i></button> ';
                    $ops2 .= '	<button type="button" class="btn btn-sm btn-success" onclick="reset(' . $value2->id_menu . ')"><i class="fa fa-key"></i></button> ';
                    $ops2 .= '	<button type="button" class="btn btn-sm btn-warning" onclick="editdata(' . $value2->id_menu . ')"><i class="fa fa-edit"></i></button> ';

                    $data['data'][$baris] = array(
                        $no++,
                        '&nbsp;&nbsp; ' . $value2->nama_menu,
                        $value2->link,
                        $value2->induk,
                        $value2->level,
                        $value2->no_urut,
                        $value2->icon,
                        $value2->tampil,
                        $ops2,
                    );
                    $baris++;
                    $data3 = $this->menuModel->getMenuSub($value2->id_menu);
                    if ($data3) {
                        foreach ($data3 as $key3 => $value3) {
                            $ops3 = '';
                            $ops3 .= '	<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $value3->id_menu . ')"><i class="fa fa-trash"></i></button> ';
                            $ops3 .= '	<button type="button" class="btn btn-sm btn-success" onclick="reset(' . $value3->id_menu . ')"><i class="fa fa-key"></i></button> ';
                            $ops3 .= '	<button type="button" class="btn btn-sm btn-warning" onclick="editdata(' . $value3->id_menu . ')"><i class="fa fa-edit"></i></button> ';

                            $data['data'][$baris] = array(
                                $no++,
                                '&nbsp;&nbsp; &nbsp;&nbsp; ' . $value3->nama_menu,
                                $value3->link,
                                $value3->induk,
                                $value3->level,
                                $value3->no_urut,
                                $value3->icon,
                                $value3->tampil,
                                $ops3,
                            );
                            $baris++;
                        }
                    }
                }
            }

        }

        //JSON RESPON
        header('Content-Type: application/json');
        $response = json_encode($data);
        echo $response;
    }
    public function getAllMenu()
    {
        $response = array();
        $data['data'] = array();
        $kelompok = $this->input->post('kelompok', TRUE);
        $data = $this->kelompokModel->getOne($kelompok);
        $menu = explode(",", $data['menu']);
        $result = $this->menuModel->getMenuInduk();
        $no = 1;
        $baris = 0;
        foreach ($result as $key => $value) {
            if (in_array($value->id_menu, $menu)) {
                $ops = '<input type="checkbox" name="menuid[]"  onclick="update()" value="' . $value->id_menu . '" checked>';
            } else {
                $ops = '<input type="checkbox" name="menuid[]"  onclick="update()" value="' . $value->id_menu . '">';
            }


            $data['data'][$baris] = array(
                $no++,
                $value->nama_menu,
                $value->induk,
                $value->level,
                $value->tampil,
                $ops,
            );
            $baris++;
            if ($this->menuModel->cekSub($value->id_menu)) {
                $sub = $this->menuModel->getMenuSub($value->id_menu);
                foreach ($sub as $key2 => $value2) {
                    if (in_array($value2->id_menu, $menu)) {
                        $ops2 = '<input type="checkbox" name="menuid[]" onclick="update()" value="' . $value2->id_menu . '" checked>';
                    } else {
                        $ops2 = '<input type="checkbox" name="menuid[]"  onclick="update()" value="' . $value2->id_menu . '">';
                    }
                    $data['data'][$baris] = array(
                        $no++,
                        '&nbsp;&nbsp; ' . $value2->nama_menu,
                        $value2->induk,
                        $value2->level,
                        $value2->tampil,
                        $ops2,
                    );
                    $baris++;
                    $data3 = $this->menuModel->getMenuSub($value2->id_menu);
                    if ($data3) {
                        foreach ($data3 as $key3 => $value3) {
                            if (in_array($value3->id_menu, $menu)) {
                                $ops3 = '<input type="checkbox" name="menuid[]"  onclick="update()"  value="' . $value3->id_menu . '" checked>';
                            } else {
                                $ops3 = '<input type="checkbox" name="menuid[]"  onclick="update()" value="' . $value3->id_menu . '">';
                            }
                            $data['data'][$baris] = array(
                                $no++,
                                '&nbsp;&nbsp; &nbsp;&nbsp; ' . $value3->nama_menu,

                                $value3->induk,
                                $value3->level,
                                $value3->tampil,
                                $ops3,
                            );
                            $baris++;
                        }
                    }
                }
            }

        }

        //JSON RESPON
        header('Content-Type: application/json');
        $response = json_encode($data);
        echo $response;
    }

    public function getOne()
    {
        $userid = $this->input->post('id_menu', TRUE);
        $data = $this->menuModel->getOne($userid);
        //JSON RESPON
        header('Content-Type: application/json');
        $response = json_encode($data);
        echo $response;
    }

    public function prosesupdate()
    {
        $response = array();
        $kelompok = $this->input->post('kelompok', TRUE);
        $fields['menu'] = $this->input->post('menu', TRUE);
        if ($this->kelompokModel->update($fields, $kelompok)) {
            $response['success'] = true;
            $response['messages'] = 'Menu berhasil di Update';
        } else {
            $response['success'] = true;
            $response['messages'] = 'Menu Gagal di Update';
        }
        header('Content-Type: application/json');
        $response = json_encode($response);
        echo $response;
    }

    public function prosesadd()
    {
        $this->load->helper(array('form', 'url'));
        $response = array();
        ///JAMAAH
        $jenis = $this->input->post('jenis', TRUE);
        $fields['nama_menu'] = $this->input->post('nama', TRUE);
        $fields['link'] = $this->input->post('link', TRUE);
        $fields['induk'] = $this->input->post('induk', TRUE);
        $fields['tampil'] = $this->input->post('tampil', TRUE);
        $fields['icon'] = $this->input->post('icon', TRUE);
        $fields['level'] = $this->input->post('level', TRUE);
        $fields['no_urut'] = $this->input->post('urut', TRUE);


        $this->load->library('form_validation');
        if ($jenis == 1) {
            $this->form_validation->set_rules(
                'nama',
                'Nama Menu yang digunakan',
                'required|is_unique[tbl_menu.nama_menu]',
                array(
                    'required' => 'Nama Menu Wajib Diisi',
                    'is_unique' => 'Menu %s Sudah Digunakan.'
                )
            );
        } else {
            $this->form_validation->set_rules(
                'nama',
                'Nama Menu yang digunakan',
                'required',
                array(
                    'required' => 'Nama Menu Wajib Diisi'
                )
            );
        }

        $this->form_validation->set_rules(
            'link',
            'Link yang digunakan',
            'required',
            array(
                'required' => 'Link Wajib Diisi'
            )
        );


        if ($this->form_validation->run() == FALSE) {
            $response['success'] = false;
            $response['messages'] = validation_errors();
        } else {
            if ($jenis == 1) {
                if ($this->menuModel->insert($fields)) {
                    $response['success'] = true;
                    $response['messages'] = 'Data has been inserted successfully';
                } else {
                    $response['success'] = false;
                    $response['messages'] = 'Proses Input Data GAGAL!';
                }

            } else {
                $fields['id_menu'] = $this->input->post('idmenu', TRUE);
                if ($this->menuModel->update($fields, $fields['id_menu'])) {
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


    public function remove()
    {
        $response = array();
        if ($this->fungsi->cek_login()) {
            $id = $this->input->post('id', TRUE);
            $fields['id_menu'] = $id;
            if ($id == '' || $id == null) {
                $response['success'] = false;
                $response['messages'] = 'Pilih Data Yang akan dihapus terlebih dahulu';
            } else {
                if ($this->menuModel->delete($fields)) {
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