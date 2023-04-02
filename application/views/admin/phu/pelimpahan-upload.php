<!DOCTYPE html>
<html lang="en">
<?php
$ci = &get_instance();
#include Header CSS
$this->load->view("/admin/layout/headercss");
?>

<body>
    <div id="wrapper">
        <?php
        #include Navbar
        $this->load->view("admin/layout/menu");
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Upload Dokumen Persyaratan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-9 ">
                                        Upload Dokumen Persyaratan
                                    </div>
                                    <div class="col-md-3  text-right">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="kembali();"><i
                                                class="fa fa-arrow-left fa-fw"></i>Kembali</button>
                                    </div>
                                </div>

                            </div>

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <!--START  Resume-->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Data Jamaah
                                                </div>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td>NO Porsi</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['jamaah_no_porsi']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['jamaah_nama']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NIK</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['jamaah_nik']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tempat/Tgl. Lahir</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['jamaah_tptlahir'] . ', ' . $this->fungsi->tanggal2($pelimpahan['jamaah_tgllahir'], false); ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jenis Kelamin</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= ($pelimpahan['jamaah_jk'] == 'L') ? 'Laki-Laki' : 'Perempuan'; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Keberangkatan Tahun</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['haji_tahun_h'] . 'H/' . $pelimpahan['haji_tahun_m']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hubungan Keluarga </td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['jamaah_hub_keluarga']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jenis Pelimpahan</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['jamaah_jenis']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tgl. Wafat/Sakit</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $this->fungsi->tanggal2($pelimpahan['jamaah_tgl_wafat'], false); ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Alamat</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['jamaah_alamat']; ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                            <!-- /.panel -->
                                        </div>
                                        <!-- /.col-lg-4 -->
                                        <div class="col-lg-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Data Pelimpahan
                                                </div>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div class="table-responsive table-striped table-bordered">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['pelimpahan_nama']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>NIK</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['pelimpahan_nik']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tempat/Tgl. Lahir</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['pelimpahan_tptlahir'] . ', ' . $this->fungsi->tanggal2($pelimpahan['pelimpahan_tgllahir'], false); ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jenis Kelamin</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= ($pelimpahan['pelimpahan_jk'] == 'L') ? 'Laki-Laki' : 'Perempuan'; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Ayah </td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['pelimpahan_nama_ayah']; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hubungan Keluarga</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['pelimpahan_hub_keluarga']; ?>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Alamat</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?= $pelimpahan['pelimpahan_alamat']; ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                            <!-- /.panel -->

                                        </div>
                                        <!-- /.col-lg-4 -->
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-default" id="dkuasa">
                                                <div class="panel-heading">
                                                    Persyaratan Pendukung untuk Jenis Pelimpahan <b>
                                                        <?= $pelimpahan['jamaah_jenis']; ?>
                                                    </b>
                                                </div>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">

                                                    <div class="table-responsive table-striped table-bordered">
                                                        <table class="table" id="data_table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>1.</td>
                                                                    <td width="60%">Asli bukti setoran awal
                                                                        dan/atau
                                                                        setoran
                                                                        lunas BIPIH</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?php if (isset($pelimpahan['file1'])):
                                                                            echo '<a href="' . base_url() . 'uploads/phu/' . $pelimpahan['file1'] . '" target="_blank">' . $pelimpahan['file1'] . '</a>';
                                                                            if ($status == 'Draf'):
                                                                                echo '<button class="btn btn-sm btn-danger"                                                                                        type="button" 
                                                                                        id="btn-tambah" onclick="removeFile(' .
                                                                                    $pelimpahan['pelimpahan_id'] . ',\'file1\',
                                                                                        \'' . $pelimpahan['file1'] . '\');">
                                                                                        <i class="fa fa-trash"></i></button>';
                                                                            endif;
                                                                        else: ?>
                                                                            <div id="ket1">
                                                                                <form id="form1"
                                                                                    enctype="multipart/form-data">

                                                                                    <input type="file" name="file1"
                                                                                        id="file1" required width="20" />
                                                                                    <input type="hidden" name="jenis"
                                                                                        value="1" />
                                                                                    <input type="hidden" name="id"
                                                                                        value="<?= $pelimpahan['pelimpahan_id']; ?>" />
                                                                                    <button class="btn btn-success submit"
                                                                                        type="button" value="Submit"
                                                                                        id="btn-tambah"
                                                                                        onclick="upload(1);">Upload</button>

                                                                                </form>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>


                                                                <?php if ($pelimpahan['jamaah_jenis'] == 'Meninggal Dunia'): ?>

                                                                    <tr>
                                                                        <td>2.</td>
                                                                        <td>Salinan Akta Kematian dari Dinas
                                                                            Kependudukan dan Catatan Sipil setempat
                                                                        </td>
                                                                        <td>:</td>
                                                                        <td>
                                                                            <?php if (isset($pelimpahan['file2'])):
                                                                                echo '<a href="' . base_url() . 'uploads/phu/' . $pelimpahan['file2'] . '" target="_blank">' . $pelimpahan['file2'] . '</a>';
                                                                                if ($status == 'Draf'):
                                                                                    echo '<button class="btn btn-sm btn-danger"                                                                                        type="button" 
                                                                                        id="btn-tambah" onclick="removeFile(' .
                                                                                        $pelimpahan['pelimpahan_id'] . ',\'file2\',
                                                                                        \'' . $pelimpahan['file2'] . '\');">
                                                                                        <i class="fa fa-trash"></i></button>';
                                                                                endif;
                                                                            else: ?>
                                                                                <div id="ket2">
                                                                                    <form id="form2"
                                                                                        enctype="multipart/form-data">
                                                                                        <input type="file" name="file1"
                                                                                            id="file1" required width="20" />
                                                                                        <input type="hidden" name="jenis"
                                                                                            value="2" />
                                                                                        <input type="hidden" name="id"
                                                                                            value="<?= $pelimpahan['pelimpahan_id']; ?>" />
                                                                                        <button
                                                                                            class="btn btn-success btn-sm submit"
                                                                                            type="button" value="Submit"
                                                                                            id="btn-tambah"
                                                                                            onclick="upload(2);">Upload</button>
                                                                                    </form>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php else: ?>
                                                                    <tr>
                                                                        <td>2.</td>
                                                                        <td>Asli surat keterangan sakit permanen
                                                                            dari
                                                                            rumah sakit pemerintah dengan kategori
                                                                            sakit
                                                                            sesuai surat edaran Menteri Kesehatan
                                                                            Nomor
                                                                            HK.02 .0 / MENKES / 33/ 2020 tentang
                                                                            Kategori Sakit Permanen dalam
                                                                            Penyelenggaraan Ibadah Haji</td>
                                                                        <td>:</td>
                                                                        <td>
                                                                            <?php if (isset($pelimpahan['file2'])):
                                                                                echo '<a href="' . base_url() . 'uploads/phu/' . $pelimpahan['file2'] . '" target="_blank">' . $pelimpahan['file2'] . '</a>';
                                                                                if ($status == 'Draf'):
                                                                                    echo '<button class="btn btn-sm btn-danger"                                                                                        type="button" 
                                                                                        id="btn-tambah" onclick="removeFile(' .
                                                                                        $pelimpahan['pelimpahan_id'] . ',\'file2\',
                                                                                        \'' . $pelimpahan['file2'] . '\');">
                                                                                        <i class="fa fa-trash"></i></button>';
                                                                                endif;
                                                                            else: ?>
                                                                                <div id="ket2">
                                                                                    <form id="form2"
                                                                                        enctype="multipart/form-data">

                                                                                        <input type="file" name="file1"
                                                                                            id="file1" required width="20" />
                                                                                        <input type="hidden" name="jenis"
                                                                                            value="2" />
                                                                                        <input type="hidden" name="id"
                                                                                            value="<?= $pelimpahan['pelimpahan_id']; ?>" />
                                                                                        <button
                                                                                            class="btn btn-success btn-sm submit"
                                                                                            type="button" value="Submit"
                                                                                            id="btn-tambah"
                                                                                            onclick="upload(2);">Upload</button>

                                                                                    </form>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                                <tr>
                                                                    <td>3.</td>
                                                                    <td>Asli surat kuasa penunjukan pelimpahan
                                                                        nomor porsi jemaah haji meninggal dunia
                                                                        yang
                                                                        ditandatangani oleh suami, istri, ayah,
                                                                        ibu,
                                                                        anak kandung, atau saudara kandung yang
                                                                        diketahui oleh RT, RW, dan Lurah/ Kepala
                                                                        Desa</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?php if (isset($pelimpahan['file3'])):
                                                                            echo '<a href="' . base_url() . 'uploads/phu/' . $pelimpahan['file3'] . '" target="_blank">' . $pelimpahan['file3'] . '</a>';
                                                                            if ($status == 'Draf'):
                                                                                echo '<button class="btn btn-sm btn-danger"                                                                                        type="button" 
                                                                                        id="btn-tambah" onclick="removeFile(' .
                                                                                    $pelimpahan['pelimpahan_id'] . ',\'file3\',
                                                                                        \'' . $pelimpahan['file3'] . '\');">
                                                                                        <i class="fa fa-trash"></i></button>';
                                                                            endif;
                                                                        else: ?>
                                                                            <div id="ket3">
                                                                                <form id="form3"
                                                                                    enctype="multipart/form-data">

                                                                                    <input type="file" name="file1"
                                                                                        id="file1" required width="20" />
                                                                                    <input type="hidden" name="jenis"
                                                                                        value="3" />
                                                                                    <input type="hidden" name="id"
                                                                                        value="<?= $pelimpahan['pelimpahan_id']; ?>" />
                                                                                    <button
                                                                                        class="btn btn-success btn-sm submit"
                                                                                        type="button" value="Submit"
                                                                                        id="btn-tambah"
                                                                                        onclick="upload(3);">Upload</button>

                                                                                </form>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4.</td>
                                                                    <td>Asli Surat Keterangan Tanggung Jawab
                                                                        Mutlak yang ditandatangani oleh jemaah
                                                                        haji
                                                                        penerima pelimpahan</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?php if (isset($pelimpahan['file4'])):
                                                                            echo '<a href="' . base_url() . 'uploads/phu/' . $pelimpahan['file4'] . '" target="_blank">' . $pelimpahan['file4'] . '</a>';
                                                                            if ($status == 'Draf'):
                                                                                echo '<button class="btn btn-sm btn-danger"                                                                                        type="button" 
                                                                                        id="btn-tambah" onclick="removeFile(' .
                                                                                    $pelimpahan['pelimpahan_id'] . ',\'file4\',
                                                                                        \'' . $pelimpahan['file4'] . '\');">
                                                                                        <i class="fa fa-trash"></i></button>';
                                                                            endif;
                                                                        else: ?>
                                                                            <div id="ket4">
                                                                                <form id="form4"
                                                                                    enctype="multipart/form-data">

                                                                                    <input type="file" name="file1"
                                                                                        id="file1" required width="20" />
                                                                                    <input type="hidden" name="jenis"
                                                                                        value="4" />
                                                                                    <input type="hidden" name="id"
                                                                                        value="<?= $pelimpahan['pelimpahan_id']; ?>" />
                                                                                    <button
                                                                                        class="btn btn-success btn-sm submit"
                                                                                        type="button" value="Submit"
                                                                                        id="btn-tambah"
                                                                                        onclick="upload(4);">Upload</button>

                                                                                </form>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5.</td>
                                                                    <td>Salinan KTP, Kartu Keluarga, Akte
                                                                        Kelahiran/ Surat Kenal Lahir, Salinan
                                                                        Akta
                                                                        Nikah, atau bukti lain jemaah penerima
                                                                        pelimpahan nomor porsi dengan
                                                                        menunjukkan
                                                                        aslinya</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?php if (isset($pelimpahan['file5'])):
                                                                            echo '<a href="' . base_url() . 'uploads/phu/' . $pelimpahan['file5'] . '" target="_blank">' . $pelimpahan['file5'] . '</a>';
                                                                            if ($status == 'Draf'):
                                                                                echo '<button class="btn btn-sm btn-danger"                                                                                        type="button" 
                                                                                        id="btn-tambah" onclick="removeFile(' .
                                                                                    $pelimpahan['pelimpahan_id'] . ',\'file5\',
                                                                                        \'' . $pelimpahan['file5'] . '\');">
                                                                                        <i class="fa fa-trash"></i></button>';
                                                                            endif;
                                                                        else: ?>
                                                                            <div id="ket5">
                                                                                <form id="form5"
                                                                                    enctype="multipart/form-data">

                                                                                    <input type="file" name="file1"
                                                                                        id="file1" required width="20" />
                                                                                    <input type="hidden" name="jenis"
                                                                                        value="5" />
                                                                                    <input type="hidden" name="id"
                                                                                        value="<?= $pelimpahan['pelimpahan_id']; ?>" />
                                                                                    <button
                                                                                        class="btn btn-success btn-sm submit"
                                                                                        type="button" value="Submit"
                                                                                        id="btn-tambah"
                                                                                        onclick="upload(5);">Upload</button>

                                                                                </form>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6.</td>
                                                                    <td>Surat Permohonan tertulis dari penerima
                                                                        pelimpahan nomor porsi </td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?php if (isset($pelimpahan['file6'])):
                                                                            echo '<a href="' . base_url() . 'uploads/phu/' . $pelimpahan['file6'] . '" target="_blank">' . $pelimpahan['file6'] . '</a>';
                                                                            if ($status == 'Draf'):
                                                                                echo '<button class="btn btn-sm btn-danger"                                                                                        type="button" 
                                                                                        id="btn-tambah" onclick="removeFile(' .
                                                                                    $pelimpahan['pelimpahan_id'] . ',\'file6\',
                                                                                        \'' . $pelimpahan['file6'] . '\');">
                                                                                        <i class="fa fa-trash"></i></button>';
                                                                            endif;
                                                                        else: ?>
                                                                            <div id="ket6">
                                                                                <form id="form6"
                                                                                    enctype="multipart/form-data">
                                                                                    <input type="file" name="file1"
                                                                                        id="file1" required width="20" />
                                                                                    <input type="hidden" name="jenis"
                                                                                        value="6" />
                                                                                    <input type="hidden" name="id"
                                                                                        value="<?= $pelimpahan['pelimpahan_id']; ?>" />
                                                                                    <button
                                                                                        class="btn btn-success btn-sm submit"
                                                                                        type="button" value="Submit"
                                                                                        id="btn-tambah"
                                                                                        onclick="upload(6);">Upload</button>

                                                                                </form>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>7.</td>
                                                                    <td>Surat rekomendasi dari Kantor Kemenag
                                                                        Kab./Kota bagi pemohon pelimpahan
                                                                        nomor porsi yang memenuhi persyaratan
                                                                        dan
                                                                        telah diverifikasi</td>
                                                                    <td>:</td>
                                                                    <td>
                                                                        <?php if (isset($pelimpahan['file7'])):
                                                                            echo '<a href="' . base_url() . 'uploads/phu/' . $pelimpahan['file7'] . '" target="_blank">' .
                                                                                $pelimpahan['file7'] . '</a>';
                                                                            if ($status == 'Draf'):
                                                                                echo '<button class="btn btn-sm btn-danger"                                                                                        type="button" 
                                                                                        id="btn-tambah" onclick="removeFile(' .
                                                                                    $pelimpahan['pelimpahan_id'] . ',\'file7\',
                                                                                        \'' . $pelimpahan['file7'] . '\');">
                                                                                        <i class="fa fa-trash"></i></button>';
                                                                            endif;
                                                                        else: ?>
                                                                            <div id="ket7">
                                                                                <form id="form7"
                                                                                    enctype="multipart/form-data">

                                                                                    <input type="file" name="file1"
                                                                                        id="file1" required width="20" />
                                                                                    <input type="hidden" name="jenis"
                                                                                        value="7" />
                                                                                    <input type="hidden" name="id"
                                                                                        value="<?= $pelimpahan['pelimpahan_id']; ?>" />
                                                                                    <button
                                                                                        class="btn btn-sm btn-success submit"
                                                                                        type="button" value="Submit"
                                                                                        id="btn-tambah"
                                                                                        onclick="upload(7);">Upload</button>

                                                                                </form>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->

                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                            <!-- /.panel -->
                                        </div>

                                    </div>

                                    <!--END  Resume-->

                                </div>

                            </div>
                            <!-- /.panel-body -->
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-6 col-sm-4">
                                        <span>Status Pelimpahan: <b>
                                                <?= $status; ?>
                                            </b></span>
                                    </div>
                                    <div class="col-md-6 col-sm-4 text-right">

                                        <?php if (($status == 'Draf' || $status == 'Ditolak') && $idkelompok > 3): ?>
                                            <button class="btn btn-success submit" type="button" value="Submit"
                                                id="btn-tambah" onclick="updatestatus();"><i
                                                    class="fa fa-send fa-fw"></i>Kirim Ke Kanwil</button>
                                        <?php else:
                                            if ($idkelompok <= 3):
                                                if ($status == 'Diproses') {
                                                    echo ' <button class="btn btn-success submit" type="button" value="Submit"
                                                id="btn-tambah" onclick="updatestatus2(\'Diteruskan\');"><i
                                                    class="fa fa-send fa-fw"></i>Kirim Ke Ditjen PHU</button>';
                                                } else if ($status == 'Diteruskan') {
                                                    echo ' <button class="btn btn-success submit" type="button" value="Submit"
                                                id="btn-tambah" onclick="updatestatus2(\'Disetujui\');"><i
                                                    class="fa fa-send fa-fw"></i>Disetujui & Selesai</button>';
                                                } else if ($status == 'Terkirim') {
                                                    echo '<button class="btn btn-danger submit" type="button" value="Submit"
                                                id="btn-tambah" onclick="updatestatus2(\'Ditolak\');"><i
                                                    class="fa fa-close fa-fw"></i>Tolak</button>
                                            <button class="btn btn-primary submit" type="button" value="Submit"
                                                id="btn-tambah" onclick="updatestatus2(\'Diproses\');"><i
                                                    class="fa fa-check-square-o fa-fw"></i>Diproses</button>';
                                                }
                                            endif;
                                        endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.panel -->

                    </div>
                    <!-- /.col-lg-12 -->
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Update Status Pelimpahan</h4>
                </div>
                <div class="modal-body">
                    <form id="update-form" class="pl-3 pr-3" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="text-label-black">Keterangan <span class="not-empty">*</span></label>
                            <textarea class="form-control" id="ket" name="ket"></textarea>
                            <input type="hidden" value="" name="id" id="id">
                            <input type="hidden" value="" name="status" id="status">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add-form-btn"
                        onclick="submitstatus();">Save</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <?php
    #include Header CSS
    $this->load->view("/admin/layout/footerjs");
    ?>

</body>
<?php
#include Header CSS
$this->load->view("/admin/layout/script");
?>
<script>

    function kembali() {
        window.location = '<?= base_url() . "pelimpahan"; ?>';
    }

    function removeFile(id, jenis, file) {
        Swal.fire({
            title: 'Are you sure of the deleting process?',
            text: "You cannot back after confirmation",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?php echo base_url('pelimpahan/removeFile') ?>',
                    type: 'post',
                    data: {
                        pelimpahan_id: id,
                        jenis: jenis,
                        file: file
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success === true) {
                            Swal.fire({
                                position: 'bottom-end',
                                icon: 'success',
                                title: response.messages,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                window.location = '<?= base_url() . "pelimpahan/upload/"; ?>' + id;
                            })
                        } else {
                            Swal.fire({
                                position: 'bottom-end',
                                icon: 'error',
                                title: response.messages,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            }
        })
    }

    function updatestatus() {
        Swal.fire({
            title: 'Yakin akan mengirim data ke Kanwil?',
            text: "Data Pelimpahan yang sudah dikirim tidak dapat diupdate kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?php echo base_url('pelimpahan/insertstatus') ?>',
                    type: 'post',
                    data: {
                        id: <?= $pelimpahan['pelimpahan_id']; ?>,
                        ket: 'Pelimpahan dikirim ke Kanwil',
                        status: 'Terkirim',
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success === true) {
                            Swal.fire({
                                position: 'bottom-end',
                                icon: 'success',
                                title: response.messages,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                window.location = '<?= base_url() . "pelimpahan"; ?> ';
                            })
                        } else {
                            Swal.fire({
                                position: 'bottom-end',
                                icon: 'error',
                                title: response.messages,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            }
        })
    }

    function updatestatus2(status) {
        // reset the form 
        $("#update-form")[0].reset();
        $(".form-control").removeClass('is-invalid').removeClass('is-valid');
        $('#myModal').modal('show');
        $("#update-form #id").val(<?= $pelimpahan['pelimpahan_id']; ?>);
        $("#update-form #status").val(status);
    }
    function submitstatus() {
        Swal.fire({
            title: 'Yakin akan mengirim data ke Kanwil?',
            text: "Data Pelimpahan yang sudah dikirim tidak dapat diupdate kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                var form = $('#update-form');
                $.ajax({
                    url: '<?php echo base_url('pelimpahan/insertstatus') ?>',
                    type: 'post',
                    data: form.serialize(), // /converting the form data into array and sending it to server
                    dataType: 'json',
                    beforeSend: function () {
                        $('#add-form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
                    },
                    success: function (response) {
                        if (response.success === true) {
                            Swal.fire({
                                position: 'bottom-end',
                                icon: 'success',
                                title: response.messages,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                window.location = '<?= base_url() . "pelimpahan/upload/"; ?>' + <?= $pelimpahan['pelimpahan_id']; ?>;
                            })
                        } else {
                            if (response.messages instanceof Object) {
                                $.each(response.messages + ' SALAH', function (index, value) {
                                    var id = $("#" + index);
                                    id.closest('.form-control')
                                        .removeClass('is-invalid')
                                        .removeClass('is-valid')
                                        .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                                    id.after(value);
                                });
                            } else {
                                Swal.fire({
                                    position: 'center-center',
                                    icon: 'error',
                                    title: response.messages + ' SALAH 2',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                        $('#add-form-btn').html('Save');
                    }
                });
                return false;
            }
        })
    }

    // File upload via Ajax
    function upload(id) {
        var form = $('#form1')[0];
        if (id == 1) {
            form = $('#form1')[0];
        } else if (id == 2) {
            form = $('#form2')[0];
        } else if (id == 3) {
            form = $('#form3')[0];
        } else if (id == 4) {
            form = $('#form4')[0];
        } else if (id == 5) {
            form = $('#form5')[0];
        } else if (id == 6) {
            form = $('#form6')[0];
        } else if (id == 7) {
            form = $('#form7')[0];
        }
        $.ajax({
            url: '<?php echo base_url('/pelimpahan/do_upload') ?>',
            type: "post",
            data: new FormData(form),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            beforeSend: function () {
                $('#upload-form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
            },
            success: function (response) {

                if (response.success === true) {

                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: response.messages,
                        showConfirmButton: false,
                        timer: 3000
                    }).then(function () {
                        if (response.jenis === "1") {
                            $('#ket1').html(response.link);
                        } else if (response.jenis === "2") {
                            $('#ket2').html(response.link);
                        } else if (response.jenis === "3") {
                            $('#ket3').html(response.link);
                        } else if (response.jenis === "4") {
                            $('#ket4').html(response.link);
                        } else if (response.jenis === "5") {
                            $('#ket5').html(response.link);
                        } else if (response.jenis === "6") {
                            $('#ket6').html(response.link);
                        } else if (response.jenis === "7") {
                            $('#ket7').html(response.link);
                        }
                    })

                } else {

                    if (response.messages instanceof Object) {
                        $.each(response.messages, function (index, value) {
                            var id = $("#" + index);

                            id.closest('.form-control')
                                .removeClass('is-invalid')
                                .removeClass('is-valid')
                                .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');

                            id.after(value);

                        });
                    } else {
                        Swal.fire({
                            position: 'bottom-end',
                            icon: 'error',
                            title: response.messages,
                            showConfirmButton: false,
                            timer: 3000
                        })

                    }
                }
                $('#upload-form-btn').html('Update');
            }
        });
        return false;
    }


</script>

</html>