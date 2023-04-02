<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;

class Pelimpahan extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('fungsi');
        $this->load->model('admin/MenuModel', 'menuModel', TRUE);
        $this->load->model('admin/KemenagModel', 'kemenagModel', TRUE);
        $this->load->model('admin/UserModel', 'userModel', TRUE);
        $this->load->model('admin/ProvinsiModel', 'provinsiModel', TRUE);
        $this->load->model('admin/KabupatenModel', 'kabupatenModel', TRUE);
        $this->load->model('admin/KecamatanModel', 'kecamatanModel', TRUE);
        $this->load->model('admin/PelimpahanModel', 'pelimpahanModel', TRUE);
        $this->load->model('admin/StatusPelimpahanModel', 'statusPelimpahanModel', TRUE);
    }

    public function index()
    {
        $data = array();
        $data = $this->getData();
        if ($this->session->username == '') {
            $this->load->view('login');
        } else {
            if ($data['idkelompok'] <= 3) {
                $this->load->view('admin/phu/pelimpahan-adm', $data);
            } else {
                $this->load->view('admin/phu/pelimpahan', $data);
            }

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

    //View Kabupate
    public function kabupaten()
    {
        $propinsi_id = $this->input->post('id', TRUE);
        $data = $this->kabupatenModel->getKabupatenByProv($propinsi_id);
        echo json_encode($data);
    }

    //View Kecamatan
    public function kecamatan()
    {
        $propinsi_id = $this->input->post('id_prop', TRUE);
        $kab_id = $this->input->post('id_kab', TRUE);
        $data = $this->kecamatanModel->getKecamatanByKabProv($kab_id, $propinsi_id);
        echo json_encode($data);
    }

    //Pelimpahan ADD
    public function add()
    {
        $data = array();
        $data = $this->getData();
        $data['provinsi'] = $this->provinsiModel->get();
        if ($this->session->username == '') {
            $this->load->view('login');
        } else {
            $this->load->view('admin/phu/pelimpahan-add', $data);
        }
    }
    //Pelimpahan ADD
    public function edit($id)
    {
        $data = array();
        $data = $this->getData();
        $data['provinsi'] = $this->provinsiModel->get();
        $data['data'] = $this->pelimpahanModel->getOne($id);
        if ($this->session->username == '') {
            $this->load->view('login');
        } else {
            $this->load->view('admin/phu/pelimpahan-edit', $data);
        }
    }
    //Pelimpahan Upload
    public function upload($id)
    {
        $data = array();
        $data = $this->getData();
        $datap = $this->pelimpahanModel->getOne($id);
        $cekstatus = $this->statusPelimpahanModel->getStatusTerakhir($id);
        if ($cekstatus) {
            $data['status'] = $cekstatus['status'];
        } else {
            $data['status'] = 'Draf';
        }
        $data['pelimpahan'] = $datap;
        $data['alamat'] = $this->pelimpahanModel->getKabKota($datap['jamaah_kd_kecamatan'], $datap['jamaah_kd_kab'], $datap['jamaah_kd_provinsi']);
        $data['alamatp'] = $this->pelimpahanModel->getKabKota($datap['pelimpahan_kd_kecamatan'], $datap['pelimpahan_kd_kab'], $datap['pelimpahan_kd_provinsi']);
        if ($this->session->username == '') {
            $this->load->view('login');
        } else {
            $this->load->view('admin/phu/pelimpahan-upload', $data);
        }
    }
    //Pelimpahan status
    public function status($id)
    {
        $data = array();
        $data = $this->getData();
        $datap = $this->pelimpahanModel->getOne($id);
        $data['status'] = $this->statusPelimpahanModel->getAllStatusId($id);
        $data['pelimpahan'] = $datap;
        if ($this->fungsi->cek_login()) {
            $this->load->view('admin/phu/pelimpahan-history', $data);
        } else {
            $this->load->view('login');
        }
    }
    //Laporan Pelimpahan
    public function laporan()
    {
        $data = array();
        $data = $this->getData();
        $data['kab'] = $this->kemenagModel->get();
        if ($this->fungsi->cek_login()) {
            $this->load->view('admin/phu/pelimpahan-laporan', $data);
        } else {
            $this->load->view('login');
        }
    }

    //Upload File
    public function do_upload()
    {
        $response = array();
        $id = $this->input->post('id', FALSE);
        $jenis = $this->input->post('jenis', FALSE);
        $config['upload_path'] = FCPATH . '/uploads/phu';
        $config['allowed_types'] = 'pdf|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['encrypt_name'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file1')) {
            $uploaded_data = $this->upload->data();
            $data['file' . $jenis] = $uploaded_data['file_name'];
            $this->pelimpahanModel->update($data, $id);
            $link = '<a href="' . base_url() . 'uploads/phu/' . $uploaded_data['file_name'] . '" target="_blank">' . $uploaded_data['file_name'] . '</a>';
            $link .= '<button class="btn btn-sm btn-danger" type="button" id="btn-tambah" onclick="removeFile(' .
                $id . ',\'file' . $jenis . '\',\'' . $uploaded_data['file_name'] . '\');">
                <i class="fa fa-trash"></i></button>';
            $response['success'] = true;
            $response['messages'] = 'File ' . $uploaded_data['file_name'] . ' Berhasil di Upload';
            $response['jenis'] = $jenis;
            $response['link'] = $link;
        } else {
            $response['success'] = false;
            $response['messages'] = 'Gagal Diupload. ' . $this->upload->display_errors();
        }


        //JSON RESPON
        header('Content-Type: application/json');
        echo json_encode($response);

    }


    public function prosesadd()
    {
        $this->load->helper(array('form', 'url'));
        $response = array();
        ///JAMAAH
        $fields['jamaah_no_porsi'] = $this->input->post('noporsi', TRUE);
        $fields['jamaah_nik'] = $this->input->post('nik', TRUE);
        $fields['jamaah_nama'] = $this->input->post('nama', TRUE);
        $fields['jamaah_tptlahir'] = $this->input->post('tptlahir', TRUE);
        $fields['jamaah_tgllahir'] = $this->input->post('tgllahir', TRUE);
        $fields['jamaah_jk'] = $this->input->post('jk', TRUE);
        $fields['jamaah_jenis'] = $this->input->post('jenis', TRUE);
        $fields['jamaah_tgl_wafat'] = $this->input->post('tglwafat', TRUE);
        $fields['haji_tahun_h'] = $this->input->post('tahunh', TRUE);
        $fields['haji_tahun_m'] = $this->input->post('tahunm', TRUE);
        $fields['jamaah_hub_keluarga'] = $this->input->post('keluarga', TRUE);
        $fields['jamaah_alamat'] = $this->input->post('alamat', TRUE);
        $fields['jamaah_kd_kecamatan'] = $this->input->post('kecamatan', TRUE);
        $fields['jamaah_kd_kab'] = $this->input->post('kabupaten', TRUE);
        $fields['jamaah_kd_provinsi'] = $this->input->post('provinsi', TRUE);
        //PELIMPAHAN
        $fields['pelimpahan_nik'] = $this->input->post('nikp', TRUE);
        $fields['pelimpahan_nama'] = $this->input->post('namap', TRUE);
        $fields['pelimpahan_tptlahir'] = $this->input->post('tptlahirp', TRUE);
        $fields['pelimpahan_tgllahir'] = $this->input->post('tgllahirp', TRUE);
        $fields['pelimpahan_jk'] = $this->input->post('jkp', TRUE);
        $fields['pelimpahan_nama_ayah'] = $this->input->post('nama_ayahp', TRUE);
        $fields['pelimpahan_hub_keluarga'] = $this->input->post('keluargap', TRUE);
        $fields['pelimpahan_alamat'] = $this->input->post('alamatp', TRUE);
        $fields['pelimpahan_kd_kecamatan'] = $this->input->post('kecamatanp', TRUE);
        $fields['pelimpahan_kd_kab'] = $this->input->post('kabupatenp', TRUE);
        $fields['pelimpahan_kd_provinsi'] = $this->input->post('provinsip', TRUE);
        if ($this->input->post('kuasa', TRUE)) {
            $fields['menggunakan_kuasa'] = 1;
            //KUASA
            $fields['kuasa_nik'] = $this->input->post('nikk', TRUE);
            $fields['kuasa_nama'] = $this->input->post('namak', TRUE);
            $fields['kuasa_tptlahir'] = $this->input->post('tptlahirk', TRUE);
            $fields['kuasa_tgllahir'] = $this->input->post('tgllahirk', TRUE);
            $fields['kuasa_jk'] = $this->input->post('jkk', TRUE);
            $fields['kuasa_nama_ayah'] = $this->input->post('nama_ayahk', TRUE);
            $fields['kuasa_hub_keluarga'] = $this->input->post('keluargak', TRUE);
            $fields['kuasa_alamat'] = $this->input->post('alamatk', TRUE);
            $fields['kuasa_kd_kecamatan'] = $this->input->post('kecamatank', TRUE);
            $fields['kuasa_kd_kab'] = $this->input->post('kabupatenk', TRUE);
            $fields['kuasa_kd_provinsi'] = $this->input->post('provinsik', TRUE);
        } else {
            $fields['menggunakan_kuasa'] = 0;
        }
        $fields['tgl_input'] = date("Y-m-d");
        $fields['userid'] = $this->session->userid;
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'noporsi',
            'No Porsi Jamaah',
            'required|is_unique[tbl_pelimpahan.jamaah_no_porsi]',
            array(
                'required' => 'No Porsi Masih Kosong, silahkan Diisi  %s.',
                'is_unique' => 'No Porsi %s Sudah Ada.'
            )
        );
        if ($this->form_validation->run() == FALSE) {
            $response['success'] = false;
            $response['messages'] = validation_errors();
        } else {
            if ($this->pelimpahanModel->insert($fields)) {

                $response['success'] = true;
                $response['messages'] = 'Data has been inserted successfully';
            } else {
                $response['success'] = false;
                $response['messages'] = 'Proses Input Data GAGAL!';
            }
        }



        //JSON RESPON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function prosesedit()
    {
        $this->load->helper(array('form', 'url'));
        $response = array();
        ///JAMAAH
        $fields['jamaah_no_porsi'] = $this->input->post('noporsi', TRUE);
        $fields['jamaah_nik'] = $this->input->post('nik', TRUE);
        $fields['pelimpahan_id'] = $this->input->post('pelimpahanid', TRUE);
        $fields['jamaah_nama'] = $this->input->post('nama', TRUE);
        $fields['jamaah_tptlahir'] = $this->input->post('tptlahir', TRUE);
        $fields['jamaah_tgllahir'] = $this->input->post('tgllahir', TRUE);
        $fields['jamaah_jk'] = $this->input->post('jk', TRUE);
        $fields['jamaah_jenis'] = $this->input->post('jenis', TRUE);
        $fields['jamaah_tgl_wafat'] = $this->input->post('tglwafat', TRUE);
        $fields['haji_tahun_h'] = $this->input->post('tahunh', TRUE);
        $fields['haji_tahun_m'] = $this->input->post('tahunm', TRUE);
        $fields['jamaah_hub_keluarga'] = $this->input->post('keluarga', TRUE);
        $fields['jamaah_alamat'] = $this->input->post('alamat', TRUE);
        $fields['jamaah_kd_kecamatan'] = $this->input->post('kecamatan', TRUE);
        $fields['jamaah_kd_kab'] = $this->input->post('kabupaten', TRUE);
        $fields['jamaah_kd_provinsi'] = $this->input->post('provinsi', TRUE);
        //PELIMPAHAN
        $fields['pelimpahan_nik'] = $this->input->post('nikp', TRUE);
        $fields['pelimpahan_nama'] = $this->input->post('namap', TRUE);
        $fields['pelimpahan_tptlahir'] = $this->input->post('tptlahirp', TRUE);
        $fields['pelimpahan_tgllahir'] = $this->input->post('tgllahirp', TRUE);
        $fields['pelimpahan_jk'] = $this->input->post('jkp', TRUE);
        $fields['pelimpahan_nama_ayah'] = $this->input->post('nama_ayahp', TRUE);
        $fields['pelimpahan_hub_keluarga'] = $this->input->post('keluargap', TRUE);
        $fields['pelimpahan_alamat'] = $this->input->post('alamatp', TRUE);
        $fields['pelimpahan_kd_kecamatan'] = $this->input->post('kecamatanp', TRUE);
        $fields['pelimpahan_kd_kab'] = $this->input->post('kabupatenp', TRUE);
        $fields['pelimpahan_kd_provinsi'] = $this->input->post('provinsip', TRUE);
        if ($this->input->post('kuasa', TRUE)) {
            $fields['menggunakan_kuasa'] = 1;
            //KUASA
            $fields['kuasa_nik'] = $this->input->post('nikk', TRUE);
            $fields['kuasa_nama'] = $this->input->post('namak', TRUE);
            $fields['kuasa_tptlahir'] = $this->input->post('tptlahirk', TRUE);
            $fields['kuasa_tgllahir'] = $this->input->post('tgllahirk', TRUE);
            $fields['kuasa_jk'] = $this->input->post('jkk', TRUE);
            $fields['kuasa_nama_ayah'] = $this->input->post('nama_ayahk', TRUE);
            $fields['kuasa_hub_keluarga'] = $this->input->post('keluargak', TRUE);
            $fields['kuasa_alamat'] = $this->input->post('alamatk', TRUE);
            $fields['kuasa_kd_kecamatan'] = $this->input->post('kecamatank', TRUE);
            $fields['kuasa_kd_kab'] = $this->input->post('kabupatenk', TRUE);
            $fields['kuasa_kd_provinsi'] = $this->input->post('provinsik', TRUE);
        } else {
            $fields['menggunakan_kuasa'] = 0;
        }
        $fields['tgl_input'] = date("Y-m-d");
        $fields['userid'] = $this->session->userid;
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'noporsi',
            'No Porsi Jamaah',
            'required',
            array(
                'required' => 'No Porsi Masih Kosong, silahkan Diisi  %s.'
            )
        );
        if ($this->form_validation->run() == TRUE) {
            $response['success'] = false;
            $response['messages'] = 'Data Pelimpahan Tidak dapat diubah';
        } else {
            if ($this->pelimpahanModel->update($fields, $fields['pelimpahan_id'])) {

                $response['success'] = true;
                $response['messages'] = 'Data has been Update successfully';
            } else {
                $response['success'] = false;
                $response['messages'] = 'Proses Update Data GAGAL!';
            }
        }



        //JSON RESPON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    //UPDATE STATUS
    public function insertstatus()
    {

        $response = array();
        $id = $this->input->post('id', TRUE);
        $status = $this->input->post('status', TRUE);
        $ket = $this->input->post('ket', TRUE);
        $tgl = date('Y-m-d H:i:s');
        if ($this->fungsi->cek_login()) {
            if ($this->pelimpahanModel->getOne($id) == false) {
                $response['success'] = false;
                $response['messages'] = 'Data Pelimpahan Tidak Ditemukan';
            } else {
                $data = array();
                $data['status'] = $status;
                $data['pelimpahan_id'] = $id;
                $data['keterangan'] = $ket;
                $data['tgl'] = $tgl;
                $data['userid'] = $this->session->userdata('userid');
                if ($this->statusPelimpahanModel->insert($data)) {
                    $response['success'] = true;
                    $response['messages'] = 'Status Pelimpahan Berhasil di Update';
                } else {
                    $response['success'] = false;
                    $response['messages'] = 'Gagal update status Pelimpahan';
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

    public function remove()
    {
        $response = array();
        if ($this->fungsi->cek_login()) {
            $id = $this->input->post('pelimpahan_id', TRUE);
            $fields['pelimpahan_id'] = $id;
            if ($id == '' || $id == null) {
                $response['success'] = false;
                $response['messages'] = 'Pilih Data Yang akan dihapus terlebih dahulu';
            } else {
                if ($this->pelimpahanModel->delete($fields)) {
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
    public function removeFile()
    {
        $response = array();
        if ($this->fungsi->cek_login()) {
            $id = $this->input->post('pelimpahan_id', TRUE);
            $jenis = $this->input->post('jenis', TRUE);
            $file = $this->input->post('file', TRUE);
            $fields['pelimpahan_id'] = $id;
            if ($id == '' || $id == null) {
                $response['success'] = false;
                $response['messages'] = 'Pilih Data Yang akan dihapus terlebih dahulu';
            } else {
                if (unlink('uploads/phu/' . $file)) {
                    $fields[$jenis] = null;
                    $this->pelimpahanModel->update($fields, $id);
                    $response['success'] = true;
                    $response['messages'] = 'Image has been Remove successfully';
                } else {
                    $response['success'] = false;
                    $response['messages'] = 'Proses Hapus Image  GAGAL!';
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

    //Ambil Data Pelimpahan Berdasarkan User yg login
    public function getAllByUserid()
    {
        $response = array();
        $data['data'] = array();
        $result = $this->pelimpahanModel->getByUserid($this->session->userdata('userid'));
        $no = 1;

        foreach ($result as $key => $value) {
            $ops = '';
            $cekstatus = $this->statusPelimpahanModel->getStatusTerakhir($value->pelimpahan_id);
            if ($cekstatus) {
                if ($cekstatus['status'] == 'Ditolak') {
                    $status = '<a href="#" class="btn btn-xs btn-danger" onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i> ' . $cekstatus['status'] . '</a>';
                    $ops .= '	<button type="button" class="btn btn-sm btn-warning" onclick="editdata(' . $value->pelimpahan_id . ')"><i class="fa fa-edit"></i></button> ';
                    $ops .= '	<button type="button" class="btn btn-sm btn-primary" onclick="kirim(' . $value->pelimpahan_id . ')"><i class="fa fa-send"></i></button> ';
                    $ops .= '	<button type="button" class="btn btn-sm btn-success" onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-upload"></i></button> ';
                    $ops .= '	<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $value->pelimpahan_id . ')"><i class="fa fa-trash"></i></button> ';


                } else if ($cekstatus['status'] == 'Terkirim') {
                    $status = '<a href="#" class="btn btn-xs btn-primary"  onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i> ' . $cekstatus['status'] . '</a>';
                } else if ($cekstatus['status'] == 'Diproses') {
                    $status = '<a href="#" class="btn btn-xs btn-info"  onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i> ' . $cekstatus['status'] . '</a>';
                } else if ($cekstatus['status'] == 'Diteruskan') {
                    $status = '<a href="#" class="btn btn-xs btn-warning"  onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i> ' . $cekstatus['status'] . '</a>';
                } else {
                    $status = '<a href="#" class="btn btn-xs btn-success"  onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i> ' . $cekstatus['status'] . '</a>';
                }
                $ket = $cekstatus['keterangan'];
                $status .= '	<button type="button" class="btn btn-xs btn-success" onclick="history(' . $value->pelimpahan_id . ')"><i class="fa fa-history"></i></button> ';

                $ops .= '	<button type="button" class="btn btn-sm btn-success" onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i></button> ';
                $ops .= '<span style="color:red;">* Data yang sudah dikirim tidak dapat diubah</span>';

            } else {
                $status = '<a href="#" class="btn btn-xs btn-info" onclick="upload(' . $value->pelimpahan_id . ')"> <i class="fa fa-search"></i> Draft </a>';
                $status .= '	<button type="button" class="btn btn-xs btn-warning" onclick="generatePDF(' . $value->pelimpahan_id . ')"><i class="fa fa-download"></i> Rekomendasi</button> ';
                $ops .= '	<button type="button" class="btn btn-sm btn-warning" onclick="editdata(' . $value->pelimpahan_id . ')"><i class="fa fa-edit"></i></button> ';
                $ket = 'Ajuan Pelimpahan Belum Dikirim Ke Kanwil. <br>Lengkapi Berkas Persyaratan kemudian Kirim';
                $ops .= '	<button type="button" class="btn btn-sm btn-primary" onclick="kirim(' . $value->pelimpahan_id . ')"><i class="fa fa-send"></i></button> ';
                $ops .= '	<button type="button" class="btn btn-sm btn-success" onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-upload"></i></button> ';
                $ops .= '	<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $value->pelimpahan_id . ')"><i class="fa fa-trash"></i></button> ';

            }
            $ket .= '<br><span style="color:red;font-size:9px;">';
            if (!isset($value->file1)) {
                $ket .= '- Bukti Setor BIPIH belum ada<br>';
            }
            if (!isset($value->file2)) {
                $ket .= '- Surat Keterangan belum ada<br>';
            }
            if (!isset($value->file3)) {
                $ket .= '- Surat Kuasa belum ada<br>';
            }
            if (!isset($value->file4)) {
                $ket .= '- SPTJM belum ada<br>';
            }
            if (!isset($value->file5)) {
                $ket .= '- KTP/KK/Aka Lahir belum ada<br>';
            }
            if (!isset($value->file6)) {
                $ket .= '- Surat Permohonan belum ada<br>';
            }
            if (!isset($value->file7)) {
                $ket .= '- Surat Rekomendasi belum ada<br>';
            }
            $ket .= '</span>';
            $pengguna = $this->userModel->getOne($value->userid);
            if ($pengguna) {
                $p = $pengguna['nama_user'];
            } else {
                $p = '';
            }
            $data['data'][$key] = array(
                $no++,
                $status,
                $value->jamaah_no_porsi,
                $value->jamaah_nama,
                $value->jamaah_jk,
                $value->jamaah_tptlahir . ', ' . $this->fungsi->tanggal2($value->jamaah_tgllahir, false),
                $value->jamaah_jenis,
                $value->jamaah_hub_keluarga,
                $value->pelimpahan_nama,
                $value->pelimpahan_jk,
                $value->pelimpahan_tptlahir . ', ' . $this->fungsi->tanggal2($value->pelimpahan_tgllahir, false),
                $value->pelimpahan_alamat,
                ($value->menggunakan_kuasa == 0) ? 'Tidak' : 'Ya',
                $value->kuasa_nama,
                $value->tgl_input,
                $ket,
                $p,
                $ops,
            );
        }

        //JSON RESPON
        header('Content-Type: application/json');
        $response = json_encode($data);
        echo $response;
    }
    //Ambil semua data pelimpahan
    public function getAll()
    {
        $response = array();
        $data['data'] = array();
        $result = $this->pelimpahanModel->get();
        $no = 1;

        foreach ($result as $key => $value) {
            $ops = '';
            $cekstatus = $this->statusPelimpahanModel->getStatusTerakhir($value->pelimpahan_id);
            if ($cekstatus) {
                if ($cekstatus['status'] == 'Ditolak') {
                    $status = '<a href="#" class="btn btn-xs btn-danger"  onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i> ' . $cekstatus['status'] . '</a>';

                } elseif ($cekstatus['status'] == 'Terkirim') {
                    $status = '<a href="#" class="btn btn-xs btn-primary"  onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i> ' . $cekstatus['status'] . '</a>';
                } else if ($cekstatus['status'] == 'Diproses') {
                    $status = '<a href="#" class="btn btn-xs btn-info"  onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i> ' . $cekstatus['status'] . '</a>';
                } else if ($cekstatus['status'] == 'Diteruskan') {
                    $status = '<a href="#" class="btn btn-xs btn-warning"  onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i> ' . $cekstatus['status'] . '</a>';
                } else {
                    $status = '<a href="#" class="btn btn-xs btn-success"  onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i> ' . $cekstatus['status'] . '</a>';
                }

                $ket = $cekstatus['keterangan'];
                $status .= '	<button type="button" class="btn btn-xs btn-success" onclick="history(' . $value->pelimpahan_id . ')"><i class="fa fa-history"></i></button> ';
                $ops .= '<span style="color:red;">* Data yang sudah dikirim tidak dapat diubah</span>';

            } else {
                $status = '<a href="#" class="btn btn-xs btn-info" onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-search"></i>  Draft </a>';
                $status .= '	<a href="' . base_url('pelimpahan/generatePDF/') . $value->pelimpahan_id . '" target="_blank"><button type="button" class="btn btn-xs btn-warning" ><i class="fa fa-download"></i> Rekomendasi</button> </a>';
                $ops .= '	<button type="button" class="btn btn-sm btn-warning" onclick="editdata(' . $value->pelimpahan_id . ')"><i class="fa fa-edit"></i></button> ';
                $ket = 'Ajuan Pelimpahan Belum Dikirim Ke Kanwil. <br>Lengkapi Berkas Persyaratan kemudian Kirim';
                $ops .= '	<button type="button" class="btn btn-sm btn-primary" onclick="kirim(' . $value->pelimpahan_id . ')"><i class="fa fa-send"></i></button> ';
                $ops .= '	<button type="button" class="btn btn-sm btn-success" onclick="upload(' . $value->pelimpahan_id . ')"><i class="fa fa-upload"></i></button> ';
                $ops .= '	<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $value->pelimpahan_id . ')"><i class="fa fa-trash"></i></button> ';

            }
            $ket .= '<br><span style="color:red;font-size:9px;">';
            if (!isset($value->file1)) {
                $ket .= '- Bukti Setor BIPIH belum ada<br>';
            }
            if (!isset($value->file2)) {
                $ket .= '- Surat Keterangan belum ada<br>';
            }
            if (!isset($value->file3)) {
                $ket .= '- Surat Kuasa belum ada<br>';
            }
            if (!isset($value->file4)) {
                $ket .= '- SPTJM belum ada<br>';
            }
            if (!isset($value->file5)) {
                $ket .= '- KTP/KK/Aka Lahir belum ada<br>';
            }
            if (!isset($value->file6)) {
                $ket .= '- Surat Permohonan belum ada<br>';
            }
            if (!isset($value->file7)) {
                $ket .= '- Surat Rekomendasi belum ada<br>';
            }
            $ket .= '</span>';
            $pengguna = $this->userModel->getOne($value->userid);
            if ($pengguna) {
                $p = $pengguna['nama_user'];
            } else {
                $p = '';
            }

            $data['data'][$key] = array(
                $no++,
                $status,
                $value->nama_kab,
                $value->jamaah_no_porsi,
                $value->jamaah_nama,
                $value->jamaah_jk,
                $value->jamaah_tptlahir . ', ' . $this->fungsi->tanggal2($value->jamaah_tgllahir, false),
                $value->jamaah_jenis,
                $value->jamaah_hub_keluarga,
                $value->pelimpahan_nama,
                $value->pelimpahan_jk,
                $value->pelimpahan_tptlahir . ', ' . $this->fungsi->tanggal2($value->pelimpahan_tgllahir, false),
                $value->pelimpahan_alamat,
                ($value->menggunakan_kuasa == 0) ? 'Tidak' : 'Ya',
                $value->kuasa_nama,
                $value->tgl_input,
                $ket,
                $p,
                $ops,
            );

        }

        //JSON RESPON
        header('Content-Type: application/json');
        $response = json_encode($data);
        echo $response;
    }

    public function generatePDF2()
    {
        $this->load->helper('file');
        $id = $this->input->post('id', TRUE);
        $this->load->library('pdfgenerator');
        $data = array();
        $data['pelimpahan'] = $this->pelimpahanModel->getOne($id);
        $data['alamat'] = $this->pelimpahanModel->getKabKota($data['pelimpahan']['jamaah_kd_kecamatan'], $data['pelimpahan']['jamaah_kd_kab'], $data['pelimpahan']['jamaah_kd_provinsi']);
        $data['alamatp'] = $this->pelimpahanModel->getKabKota($data['pelimpahan']['pelimpahan_kd_kecamatan'], $data['pelimpahan']['pelimpahan_kd_kab'], $data['pelimpahan']['pelimpahan_kd_provinsi']);

        $data['judul'] = 'Surat Rekomendasi Kemenag';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('admin/phu/laporan/rekomendasi', $data, true);
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

    }
    public function generatePDF($id)
    {
        $this->load->helper('file');
        //$id = $this->input->post('id', TRUE);
        $data = array();

        $dompdf = new \Dompdf\Dompdf();


        $data['pelimpahan'] = $this->pelimpahanModel->getOne($id);
        $data['alamat'] = $this->pelimpahanModel->getKabKota($data['pelimpahan']['jamaah_kd_kecamatan'], $data['pelimpahan']['jamaah_kd_kab'], $data['pelimpahan']['jamaah_kd_provinsi']);
        $data['alamatp'] = $this->pelimpahanModel->getKabKota($data['pelimpahan']['pelimpahan_kd_kecamatan'], $data['pelimpahan']['pelimpahan_kd_kab'], $data['pelimpahan']['pelimpahan_kd_provinsi']);



        $dompdf->loadHtml($this->load->view('admin/phu/laporan/rekomendasi', $data, true));
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);

        $dompdf->setPaper('A4', 'portrait'); //ukuran kertas dan orientasi
        $dompdf->render();

        $dompdf->stream("suratrekomendasi.pdf", [
            "Attachment" => false
        ]); //nama file pdf
        $output = $dompdf->output();
        return $output;

    }

    public function viewlap()
    {
        $jenis = $this->input->post('jenis', TRUE);
        $jenisp = $this->input->post('jenisp', TRUE);
        $status = $this->input->post('status', TRUE);
        $tglm = $this->input->post('tglm', TRUE);
        $tgla = $this->input->post('tgla', TRUE);
        $data = array();
        $data['jenis'] = $jenis;
        $data['jenisp'] = $jenisp;
        $data['status'] = $status;
        $data['tglm'] = $tglm;
        $data['tgla'] = $tgla;
        if ($jenis == 'all') {
            $data['pelimpahan'] = $this->kemenagModel->getOne('kanwil');
        } else {
            $data['pelimpahan'] = $this->kemenagModel->getOne($jenis);
        }

        $data['data'] = $this->pelimpahanModel->getByKabKota($jenis, $tglm, $tgla, $jenisp);
        echo $this->load->view('admin/phu/laporan/rekap', $data, true);
    }
    public function generatePDFlap()
    {
        $this->load->helper('file');
        $jenis = $this->input->post('jenis', TRUE);
        $jenisp = $this->input->post('jenisp', TRUE);
        $status = $this->input->post('status', TRUE);
        $tglm = $this->input->post('tglm', TRUE);
        $tgla = $this->input->post('tgla', TRUE);
        $data = array();

        $dompdf = new \Dompdf\Dompdf();

        $data['jenis'] = $jenis;
        $data['jenisp'] = $jenisp;
        $data['status'] = $status;
        $data['tglm'] = $tglm;
        $data['tgla'] = $tgla;

        $data['data'] = $this->pelimpahanModel->getByKabKota($jenis, $tglm, $tgla, $jenisp);


        $dompdf->loadHtml($this->load->view('admin/phu/laporan/rekap', $data, true));
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);

        $dompdf->setPaper('A4', 'portrait'); //ukuran kertas dan orientasi
        $dompdf->render();

        $dompdf->stream("suratrekomendasi.pdf", [
            "Attachment" => false
        ]); //nama file pdf
        $output = $dompdf->output();
        return $output;

    }
}