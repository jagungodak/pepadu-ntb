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
                        <h1 class="page-header">Usulan Pelimpahan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form id="basic-form">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-9 ">
                                            Data Usulan Pelimpahan Dari Kemenag Kabupaten/Kota
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
                                        <!--START STEP 1: Data Jamaah-->
                                        <div class="card2 b-0 rounded-0 show">
                                            <div class="row justify-content-center mx-auto step-container">

                                                <div class="col-md-3 col-3 step-box active2">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-circle"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 1: Data Jamaah</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-circle"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 2: Data Pelimpahan</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-circle"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 3: Pemberi Kuasa</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-circle"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 4: Resume</span>
                                                    </h6>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <!--KOLOM KIRI-->
                                                <div class="col-md-6">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            Biodata Jamaah
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="noporsi">Nomor
                                                                            Porsi</label>
                                                                        <input class="form-control" id="noporsi"
                                                                            name="noporsi" maxlength="25" type="text"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label" for="nik">Nomor KTP
                                                                            (NIK)</label>
                                                                        <input class="form-control " placeholder=""
                                                                            name="nik" id="nik" maxlength="100"
                                                                            type="text" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label" for="nama">Nama
                                                                    Jamaah</label>
                                                                <input class="form-control" id="nama" name="nama"
                                                                    maxlength="100" type="text" required>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label"
                                                                            for="tptlahir">Tempat Lahir</label>
                                                                        <input class="form-control" placeholder=""
                                                                            name="tptlahir" id="tptlahir" type="text"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Tanggal
                                                                            Lahir</label>
                                                                        <input class="form-control" placeholder=""
                                                                            name="tgllahir" id="tgllahir" type="date"
                                                                            dateISO="true" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <fieldset class="form-group row">
                                                                <label
                                                                    class="col-form-label col-sm-5 float-sm-left pt-0">Jenis
                                                                    Kelamin</label>
                                                                <div class="col-sm-10">
                                                                    <label class="radio-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="jk" id="jk" value="L"
                                                                            checked>Laki-Laki
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="jk" id="jk" value="P">Perempuan

                                                                    </label>
                                                                </div>

                                                            </fieldset>

                                                            <div class="form-group">
                                                                <label for="jenis">Jenis Pelimpahan </label>

                                                                <select id="jenis" name="jenis" class="form-control"
                                                                    required>
                                                                    <option value="Meninggal Dunia">Meninggal Dunia
                                                                    </option>
                                                                    <option value="Sakit Permanen">Sakit
                                                                        Permanen
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Tanggal Wafat/Sakit Permanen</label>
                                                                <input class="form-control" placeholder=""
                                                                    name="tglwafat" id="tglwafat" type="date" required>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--KOLOM KANAN-->
                                                <div class="col-md-6">
                                                    <div class="panel panel-green">
                                                        <div class="panel-heading">
                                                            Data Keberangkatan dan Alamat Lengkap Jamaah
                                                        </div>
                                                        <div class="panel-body">
                                                            <label class="control-label" for="tptlahir">Keberangkatan
                                                                Haji
                                                                Tahun</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group input-group">
                                                                        <input class="form-control" placeholder="1444"
                                                                            name="tahunh" id="tahunh" type="text"
                                                                            required>
                                                                        <span class="input-group-addon">H</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group input-group">
                                                                        <input class="form-control" placeholder="2023"
                                                                            name="tahunm" id="tahunm" type="text"
                                                                            required>
                                                                        <span class="input-group-addon">M</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="disabledSelect">Hubungan Keluarga antara
                                                                    Jamaah dengan Pelimpahan</label>
                                                                <select id="keluarga" name="keluarga"
                                                                    class="form-control" required>
                                                                    <option value="Suami">Suami</option>
                                                                    <option value="Istri">Istri</option>
                                                                    <option value="Ayah">Ayah</option>
                                                                    <option value="Ibu">Ibu</option>
                                                                    <option value="Anak Kandung">Anak Kandung</option>
                                                                    <option value="Saudara Kandung">Saudara Kandung
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="disabledSelect">Provinsi</label>
                                                                <select id="provinsi" name="provinsi"
                                                                    class="form-control" required>
                                                                    <option>---Pilih Provinsi--</option>
                                                                    <?php
                                                                    foreach ($provinsi as $key => $val) {
                                                                        echo '<option value="' . $val->kode_propinsi . '">' . $val->nama_propinsi . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="disabledSelect">Kabupaten</label>
                                                                <select id="kabupaten" name="kabupaten"
                                                                    class="form-control" required>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="disabledSelect">Kecamatan</label>
                                                                <select id="kecamatan" name="kecamatan"
                                                                    class="form-control" required>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <textarea class="form-control" id="alamat"
                                                                    name="alamat"></textarea>
                                                            </div>



                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!--END STEP 1: Data Jamaah-->
                                        <!--START STEP 2: Data Pelimpahan-->
                                        <div class="card2 b-0 rounded-0">
                                            <div class="row justify-content-center mx-auto step-container">

                                                <div class="col-md-3 col-3 step-box ">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-check"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 1: Data Jamaah</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box active2">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-circle"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 2: Data Pelimpahan</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-circle"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 3: Pemberi Kuasa</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-circle"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 4: Resume</span>
                                                    </h6>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <!--KOLOM KIRI-->
                                                <div class="col-md-6">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            Biodata Pelimpahan
                                                        </div>
                                                        <div class="panel-body">

                                                            <div class="form-group">
                                                                <label class="control-label" for="nama">Nama
                                                                    Pelimpahan</label>
                                                                <input class="form-control" id="namap" name="namap"
                                                                    maxlength="100" type="text" required>

                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="nik">Nomor Induk
                                                                    Kependudukan (NIK)</label>
                                                                <input class="form-control " placeholder="" name="nikp"
                                                                    id="nikp" maxlength="100" type="text" required>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label"
                                                                            for="tptlahir">Tempat Lahir</label>
                                                                        <input class="form-control" placeholder=""
                                                                            name="tptlahirp" id="tptlahirp" type="text"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Tanggal
                                                                            Lahir</label>
                                                                        <input class="form-control" placeholder=""
                                                                            name="tgllahirp" id="tgllahirp" type="date"
                                                                            dateISO="true" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <fieldset class="form-group row">
                                                                        <label
                                                                            class="col-form-label col-sm-5 float-sm-left pt-0">Jenis
                                                                            Kelamin</label>
                                                                        <div class="col-sm-10">
                                                                            <label class="radio-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="jkp" id="jkp"
                                                                                    value="L" checked>Laki-Laki
                                                                            </label>
                                                                            <label class="radio-inline">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="jkp" id="jkp"
                                                                                    value="P">Perempuan
                                                                            </label>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group ">
                                                                        <label class="control-label"
                                                                            for="nama_ayah">Nama Ayah
                                                                            Kandung</label>
                                                                        <input class="form-control " placeholder=""
                                                                            name="nama_ayahp" id="nama_ayahp"
                                                                            maxlength="100" type="text" required>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="disabledSelect">Hubungan Keluarga Dengan
                                                                    Jamaah Wafat/Sakit Permanen</label>
                                                                <select id="keluargap" name="keluargap"
                                                                    class="form-control" required>
                                                                    <option value="Suami">Suami</option>
                                                                    <option value="Istri">Istri</option>
                                                                    <option value="Ayah">Ayah</option>
                                                                    <option value="Ibu">Ibu</option>
                                                                    <option value="Anak Kandung">Anak Kandung</option>
                                                                    <option value="Saudara Kandung">Saudara Kandung
                                                                    </option>
                                                                </select>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <!--KOLOM KANAN-->
                                                <div class="col-md-6">
                                                    <div class="panel panel-green">
                                                        <div class="panel-heading">
                                                            Alamat Lengkap Sesuai KTP
                                                        </div>
                                                        <div class="panel-body">

                                                            <div class="form-group">
                                                                <label for="disabledSelect">Provinsi</label>
                                                                <select id="provinsip" name="provinsip"
                                                                    class="form-control" required>
                                                                    <option>---Pilih Provinsi--</option>
                                                                    <?php
                                                                    foreach ($provinsi as $key => $val) {
                                                                        echo '<option value="' . $val->kode_propinsi . '">' . $val->nama_propinsi . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="disabledSelect">Kabupaten</label>
                                                                <select id="kabupatenp" name="kabupatenp"
                                                                    class="form-control" required>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="disabledSelect">Kecamatan</label>
                                                                <select id="kecamatanp" name="kabupatenp"
                                                                    class="form-control" required>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <textarea class="form-control" id="alamatp"
                                                                    name="alamatp"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--END STEP 2: Data Pelimpahan-->
                                        <!--START STEP 3: Pemberi Kuasa-->
                                        <div class="card2 b-0 rounded-0">
                                            <div class="row justify-content-center mx-auto step-container">

                                                <div class="col-md-3 col-3 step-box ">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-check"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 1: Data Jamaah</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box ">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-check"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 2: Data Pelimpahan</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box active2">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-circle"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 3: Pemberi Kuasa</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-circle"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 4: Resume</span>
                                                    </h6>
                                                </div>


                                            </div>

                                            <div class="form-group">
                                                <label>Apakah Penerima Pelimpahan Adalah Orang Lain (Menggunakan Kuasa)?
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="kuasa" id="kuasa"> Ya
                                                </label>
                                            </div>

                                            <div class="row" id="data-kuasa">
                                                <!--KOLOM KIRI-->
                                                <div class="col-md-6">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            Biodata Pemberi Kuasa Pelimpahan
                                                        </div>
                                                        <div class="panel-body">

                                                            <div class="form-group">
                                                                <label class="control-label" for="nama">Nama
                                                                    Pemberi Kuasa</label>
                                                                <input class="form-control" id="namak" name="namak"
                                                                    maxlength="100" type="text" required>

                                                            </div>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="nikk">Nomor Induk
                                                                    Kependudukan (NIK)</label>
                                                                <input class="form-control " placeholder="" name="nikk"
                                                                    id="nikk" maxlength="100" type="text" required>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label"
                                                                            for="tptlahir">Tempat Lahir</label>
                                                                        <input class="form-control" placeholder=""
                                                                            name="tptlahirk" id="tptlahirk" type="text"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Tanggal
                                                                            Lahir</label>
                                                                        <input class="form-control" placeholder=""
                                                                            name="tgllahirk" id="tgllahirk" type="date"
                                                                            dateISO="true" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <fieldset class="form-group row">
                                                                <label
                                                                    class="col-form-label col-sm-5 float-sm-left pt-0">Jenis
                                                                    Kelamin</label>
                                                                <div class="col-sm-10">
                                                                    <label class="radio-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="jkk" id="jkk" value="L"
                                                                            checked>Laki-Laki
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="jkk" id="jkk" value="P">Perempuan
                                                                    </label>
                                                                </div>

                                                            </fieldset>
                                                            <div class="form-group ">
                                                                <label class="control-label" for="nama_ayah">Nama Ayah
                                                                    Kandung</label>
                                                                <input class="form-control " placeholder=""
                                                                    name="nama_ayahk" id="nama_ayahk" maxlength="100"
                                                                    type="text" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="disabledSelect">Hubungan Keluarga Dengan
                                                                    Jamaah Wafat/Sakit Permanen</label>
                                                                <select id="keluargak" name="keluargak"
                                                                    class="form-control" required>
                                                                    <option value="Suami">Suami</option>
                                                                    <option value="Istri">Istri</option>
                                                                    <option value="Ayah">Ayah</option>
                                                                    <option value="Ibu">Ibu</option>
                                                                    <option value="Anak Kandung">Anak Kandung</option>
                                                                    <option value="Saudara Kandung">Saudara Kandung
                                                                    </option>
                                                                    <option value="Lainnya">Lainnya
                                                                    </option>
                                                                </select>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <!--KOLOM KANAN-->
                                                <div class="col-md-6">
                                                    <div class="panel panel-green">
                                                        <div class="panel-heading">
                                                            Alamat Lengkap Pemberi Kuasa Sesuai KTP
                                                        </div>
                                                        <div class="panel-body">

                                                            <div class="form-group">
                                                                <label for="disabledSelect">Provinsi</label>
                                                                <select id="provinsik" name="provinsik"
                                                                    class="form-control" required>
                                                                    <option>---Pilih Provinsi--</option>
                                                                    <?php
                                                                    foreach ($provinsi as $key => $val) {
                                                                        echo '<option value="' . $val->kode_propinsi . '">' . $val->nama_propinsi . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="disabledSelect">Kabupaten</label>
                                                                <select id="kabupatenk" name="kabupatenk"
                                                                    class="form-control" required>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="disabledSelect">Kecamatan</label>
                                                                <select id="kecamatank" name="kecamatank"
                                                                    class="form-control" required>

                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <textarea class="form-control" id="alamatk"
                                                                    name="alamatk"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--END STEP 3: Pemberi Kuasa-->
                                        <!--START STEP 4: Resume-->
                                        <div class="card2 b-0 rounded-0">
                                            <div class="row justify-content-center mx-auto step-container">

                                                <div class="col-md-3 col-3 step-box ">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-check"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 1: Data Jamaah</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box ">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-check"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 2: Data Pelimpahan</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-check"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 3: Pemberi Kuasa</span>
                                                    </h6>
                                                </div>
                                                <div class="col-md-3 col-3 step-box active2">
                                                    <h6 class="step-title-0">
                                                        <span class="fa fa-circle"></span>
                                                        <span class="break-line"></span>
                                                        <span class="step-title">STEP 4: Resume</span>
                                                    </h6>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            DATA JAMAAH
                                                        </div>
                                                        <!-- /.panel-heading -->
                                                        <div class="panel-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered table-striped">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>NO Porsi</td>
                                                                            <td>:</td>
                                                                            <td><span id="lporsi"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nama</td>
                                                                            <td>:</td>
                                                                            <td><span id="lnama"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>NIK</td>
                                                                            <td>:</td>
                                                                            <td><span id="lnik"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tempat/Tgl. Lahir</td>
                                                                            <td>:</td>
                                                                            <td><span id="lttl"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jenis Kelamin</td>
                                                                            <td>:</td>
                                                                            <td><span id="ljk"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Keberangkatan Tahun</td>
                                                                            <td>:</td>
                                                                            <td><span id="ltahun"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Hubungan Keluarga</td>
                                                                            <td>:</td>
                                                                            <td><span id="lhub"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jenis Pelimpahan</td>
                                                                            <td>:</td>
                                                                            <td><span id="ljenis"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tgl. Wafat/Sakit</td>
                                                                            <td>:</td>
                                                                            <td><span id="ltglwafat"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Alamat</td>
                                                                            <td>:</td>
                                                                            <td><span id="lalamat"></span></td>
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
                                                                            <td><span id="lnamap"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>NIK</td>
                                                                            <td>:</td>
                                                                            <td><span id="lnikp"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tempat/Tgl. Lahir</td>
                                                                            <td>:</td>
                                                                            <td><span id="lttlp"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jenis Kelamin</td>
                                                                            <td>:</td>
                                                                            <td><span id="ljkp"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nama Ayah </td>
                                                                            <td>:</td>
                                                                            <td><span id="lnamaayahp"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Hubungan Keluarga</td>
                                                                            <td>:</td>
                                                                            <td><span id="lhubp"></span></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Alamat</td>
                                                                            <td>:</td>
                                                                            <td><span id="lalamatp"></span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                            <!-- /.table-responsive -->
                                                        </div>
                                                        <!-- /.panel-body -->
                                                    </div>
                                                    <!-- /.panel -->
                                                    <br>&nbsp;
                                                    Apakah Pelimpahan menggunakan Kuasa?
                                                    <b><span id="lkuasa"></span></b>
                                                </div>
                                                <!-- /.col-lg-4 -->
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="panel panel-default" id="dkuasa">
                                                        <div class="panel-heading">
                                                            Data Pemberi Kuasa
                                                        </div>
                                                        <!-- /.panel-heading -->
                                                        <div class="panel-body">
                                                            <div class="table-responsive table-striped table-bordered">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Nama</td>
                                                                            <td>:</td>
                                                                            <td><span id="lnamak"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>NIK</td>
                                                                            <td>:</td>
                                                                            <td><span id="lnikk"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tempat/Tgl. Lahir</td>
                                                                            <td>:</td>
                                                                            <td><span id="lttlk"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jenis Kelamin</td>
                                                                            <td>:</td>
                                                                            <td><span id="ljkk"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nama Ayah Kandung</td>
                                                                            <td>:</td>
                                                                            <td><span id="lnamaayahk"></span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Hubungan Keluarga</td>
                                                                            <td>:</td>
                                                                            <td><span id="lhubk"></span></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>Alamat</td>
                                                                            <td>:</td>
                                                                            <td><span id="lalamatk"></span></td>
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

                                            Pastikan semua data yang diinput sudah benar. <br>Centang checkbox
                                            disamping untuk memastikan semua data sudah diisi dengan benar.

                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="data-final" id="data-final"> Ya
                                            </label>

                                        </div>
                                        <!--END STEP 4: Resume-->

                                    </div>

                                </div>
                                <!-- /.panel-body -->
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6 ">

                                        </div>
                                        <div class="col-md-6  text-right">

                                            <button class="btn btn-info previous" type="button"
                                                value="Sebelumnya">Sebelumnya</button>
                                            <button class="btn btn-success next" type="button" value="Selanjutnya"
                                                onclick="isiResume();">Selanjutnya</button>
                                            <button class="btn btn-success submit" type="button" value="Submit"
                                                id="btn-tambah" onclick="return tambah();">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.panel -->
                        </form>
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
    <?php
    #include Header CSS
    $this->load->view("/admin/layout/footerjs");
    ?>

</body>
<?php
#include Header CSS
$this->load->view("/admin/layout/script");
$this->load->view("/admin/layout/scriptform");
?>
<script>
    $("#data-kuasa").hide();
    $("#kuasa").click(function () {
        isiResume();
        if ($(this).is(":checked")) {
            $("#data-kuasa").show(300);
        } else {
            $("#data-kuasa").hide(200);
        }
    });

    function kembali() {
        window.location = '<?= base_url() . "pelimpahan"; ?>';
    }

    $('#provinsi').click(function () {

        var id = $(this).val();
        $.ajax({
            url: "<?= base_url() . 'pelimpahan/kabupaten'; ?>",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                var html = '<option value="">--Pilih Kabupaten--</option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_kabupaten + '>' + data[i].nama_kabupaten + '</option>';
                }
                $('#kabupaten').html(html);

            }
        });
        return false;
    });
    $('#kabupaten').change(function () {
        var id = $(this).val();
        var idp = $('#provinsi').val();
        $.ajax({
            url: "<?= base_url() . 'pelimpahan/kecamatan'; ?>",
            method: "POST",
            data: {
                id_kab: id,
                id_prop: idp
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                var html = '<option value="">--Pilih kecamatan--</option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_kecamatan + '>' + data[i].nama_kecamatan + '</option>';
                }
                $('#kecamatan').html(html);

            }
        });
        return false;
    });
    $('#provinsip').click(function () {
        var id = $(this).val();
        $.ajax({
            url: "<?= base_url() . 'pelimpahan/kabupaten'; ?>",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                var html = '<option value="">--Pilih Kabupaten--</option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_kabupaten + '>' + data[i].nama_kabupaten + '</option>';
                }
                $('#kabupatenp').html(html);

            }
        });
        return false;
    });
    $('#kabupatenp').change(function () {
        isiResume();
        var id = $(this).val();
        var idp = $('#provinsip').val();
        $.ajax({
            url: "<?= base_url() . 'pelimpahan/kecamatan'; ?>",
            method: "POST",
            data: {
                id_kab: id,
                id_prop: idp
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                var html = '<option value="">--Pilih kecamatan--</option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_kecamatan + '>' + data[i].nama_kecamatan + '</option>';
                }
                $('#kecamatanp').html(html);

            }
        });
        return false;
    });
    $('#provinsik').click(function () {

        var id = $(this).val();
        $.ajax({
            url: "<?= base_url() . 'pelimpahan/kabupaten'; ?>",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                var html = '<option value="">--Pilih Kabupaten--</option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_kabupaten + '>' + data[i].nama_kabupaten + '</option>';
                }
                $('#kabupatenk').html(html);

            }
        });
        return false;
    });
    $('#kabupatenk').change(function () {
        isiResume();
        var id = $(this).val();
        var idp = $('#provinsik').val();
        $.ajax({
            url: "<?= base_url() . 'pelimpahan/kecamatan'; ?>",
            method: "POST",
            data: {
                id_kab: id,
                id_prop: idp
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                var html = '<option value="">--Pilih kecamatan--</option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].kode_kecamatan + '>' + data[i].nama_kecamatan + '</option>';
                }
                $('#kecamatank').html(html);

            }
        });
        return false;
    });
    $(document).ready(function () {

        var val = {
            // Specify validation rules
            rules: {
                name: "required",
                nik: "required",
                tptlahir: "required"

            },
            // Specify validation error messages
            messages: {
                nama: "First name is required",
                nik: "First name is required",
                tptlahir: "First name is required"

            }
        }
        $("#basic-form").multiStepForm(
            {
                // defaultStep:0,
                beforeSubmit: function (form, submit) {
                    console.log("called before submiting the form");
                    console.log(form);
                    console.log(submit);
                },
                validations: val,
            }
        ).navigateTo(0);




    });
    function isiResume() {
        $('#lporsi').html($('#noporsi').val());
        $('#lnama').html($('#nama').val());
        $('#lnik').html($('#nik').val());
        $('#lttl').html($('#tptlahir').val() + ', ' + $('#tgllahir').val());
        $('#ljk').html($('#jk').val());
        $('#ltahun').html($('#tahunh').val() + 'H/' + $('#tahunm').val() + 'M');
        $('#lhub').html($('#keluarga').val());
        $('#ltglwafat').html($('#tglwafat').val());
        $('#ljenis').html($('#jenis  option:selected').text());
        $('#lalamat').html($('#alamat').val() + ' Kec. ' + $('#kecamatan  option:selected').text() + ' Kab. ' + $('#kabupaten  option:selected').text() + $('#provinsi  option:selected').text());
        //Pelimpahan
        $('#lnamap').html($('#namap').val());
        $('#lnikp').html($('#nikp').val());
        $('#lttlp').html($('#tptlahirp').val() + ', ' + $('#tgllahirp').val());
        $('#ljkp').html($('#jkp').val());
        $('#lnamaayahp').html($('#nama_ayahp').val());
        $('#lhubp').html($('#keluargap option:selected').text());
        $('#lalamatp').html($('#alamatp').val() + ' Kec. ' + $('#kecamatanp  option:selected').text() + ' Kab. ' + $('#kabupatenp  option:selected').text() + $('#provinsip  option:selected').text());
        //Kuasa
        if ($('#kuasa').is(":checked")) {
            $("#dkuasa").show(300);
            $('#lkuasa').html('Ya');
        } else {
            $("#dkuasa").hide(200);
            $('#lkuasa').html('Tidak');
        }
        $('#lnamak').html($('#namak').val());
        $('#lnikk').html($('#nikk').val());
        $('#lttlk').html($('#tptlahirk').val() + ', ' + $('#tgllahirk').val());
        $('#ljkk').html($('#jkk').val());
        $('#lnamaayahk').html($('#nama_ayahk').val());
        $('#lhubk').html($('#keluargak option:selected').text());
        $('#lalamatk').html($('#alamatk').val() + ' Kec. ' + $('#kecamatank  option:selected').text() + ' Kab. ' + $('#kabupatenk  option:selected').text() + $('#provinsik  option:selected').text());
    }

    function tambah() {
        if ($('#data-final').is(":checked")) {
            // submit the add from      
            var form = $('#basic-form');
            $.ajax({
                url: '<?php echo base_url() . "pelimpahan/prosesadd" ?> ',
                type: 'post',
                data: form.serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $('#btn-tambah').html('<i class="fa fa-spinner fa-spin"></i>');
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
                            window.location = '<?= base_url() . "pelimpahan"; ?> ';
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
                                position: 'bottom-end',
                                icon: 'error',
                                title: response.messages,
                                showConfirmButton: false,
                                timer: 5000
                            })

                        }
                    }
                    $('#btn-tambah').html('Submit');
                }
            });
            return false;

        } else {
            Swal.fire({
                position: 'bottom-end',
                icon: 'warning',
                title: ' Centang Checkbox Data Final terlebih dahulu. Untuk memastikan semua data sudah benar!',
                showConfirmButton: false,
                timer: 1500
            })
        }
        return false;
    }



</script>

</html>