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
                        <h1 class="page-header">Pengaturan </h1>
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
                                        Pengaturan Sistem
                                    </div>
                                    <div class="col-md-3  text-right">
                                        <button type="button" class="btn btn-success btn-sm" onclick="save();"><i
                                                class="fa fa-save fa-fw"></i>Update Profile</button>
                                    </div>
                                </div>

                            </div>
                            <form id="form-profile">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    Profile Pengguna
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input class="form-control" value="<?= $username; ?>"
                                                            name="username" id="username" type="text" readonly>
                                                        <input value="<?= $userid; ?>" name="userid" id="userid"
                                                            type="hidden">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Lengkap</label>
                                                        <input class="form-control" value="<?= $nama; ?>" name="nama"
                                                            id="nama" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kelompok</label>
                                                        <input class="form-control"
                                                            value="<?= $user['nama_kelompok']; ?>" name="kelompok"
                                                            id="kelompok" type="text" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kabupaten/Kota</label>
                                                        <input class="form-control" value="<?= $user['nama_kab']; ?>"
                                                            name="kab" id="kab" type="text" disabled>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="panel panel-danger">
                                                <div class="panel-heading">
                                                    Form Ubah Password Pengguna
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label>Password Lama</label>
                                                        <input class="form-control" value="" name="password1"
                                                            id="password1" type="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password Baru</label>
                                                        <input class="form-control" name="pass1" id="pass1"
                                                            type="password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ketik Ulang Password Baru</label>
                                                        <input class="form-control" name="pass2" id="pass2"
                                                            type="password">
                                                    </div>
                                                </div>
                                                <div class="panel-footer" style="text-align:right;">
                                                    Khusus Update Password <button type="button"
                                                        class="btn btn-sm btn-danger" onclick="updatepassword();">Ubah
                                                        Password</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <div class="panel panel-warning">
                                                <div class="panel-heading">
                                                    Data Kabupaten Kota
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label>Nama Kabupaten</label>
                                                        <input class="form-control" value="<?= $user['nama_kab']; ?>"
                                                            name="nama_kab" id="nama_kab" type="text">
                                                        <input type="hidden" name="kode" id="kode"
                                                            value="<?= $user['kode']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat Baris 1</label>
                                                        <input class="form-control" value="<?= $user['baris1']; ?>"
                                                            name="baris1" id="baris1" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat Baris 2</label>
                                                        <input class="form-control" value="<?= $user['baris2']; ?>"
                                                            name="baris2" id="baris2" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kepala Satker/Madrasah</label>
                                                        <input class="form-control" value="<?= $user['kepala']; ?>"
                                                            name="kepala" id="kepala" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kota Tanda Tangan</label>
                                                        <input class="form-control" value="<?= $user['kota']; ?>"
                                                            name="kota" id="kota" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No Surat untuk Surat Rekomendasi </label>
                                                        <input class="form-control" value="<?= $user['nomor']; ?>"
                                                            name="nomor" id="nomor" type="text">
                                                        <small>Ambil tengah tanpa Bulan/Tahun ex:
                                                            /MA.19.0/KP.00/</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NIP Kepala</label>
                                                        <input class="form-control" value="<?= $user['nip']; ?>"
                                                            name="nip" id="nip" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jabatan Kepala</label>
                                                        <input class="form-control" value="<?= $user['jabatan']; ?>"
                                                            name="jabatan" id="jabatan" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Unit Kerja</label>
                                                        <input class="form-control" value="<?= $user['unit_kerja']; ?>"
                                                            name="unit_kerja" id="unit_kerja" type="text">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer" style="text-align:right;">
                                    <button type="button" class="btn btn-sm btn-success" onclick="save();"><i
                                            class="fa fa-save fa-fw"></i>Simpan Profile</button>
                                </div>
                                <!-- /.panel-body -->
                            </form>
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

    function save() {
        var form = $('#form-profile');
        $.ajax({
            url: '<?php echo base_url('user/updateprofile') ?>',
            type: 'post',
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success === true) {
                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: response.messages,
                        showConfirmButton: false,
                        timer: 3500
                    }).then(function () {
                        window.location = '<?= base_url() . "pengaturan"; ?> ';
                    })
                } else {
                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'error',
                        title: response.messages,
                        showConfirmButton: false,
                        timer: 3500
                    })
                }
            }
        });
    }
    function updatepassword() {
        var form = $('#form-profile');
        $.ajax({
            url: '<?php echo base_url('user/updatepassword') ?>',
            type: 'post',
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success === true) {
                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'success',
                        title: response.messages,
                        showConfirmButton: false,
                        timer: 3500
                    }).then(function () {
                        window.location = '<?= base_url() . "pengaturan"; ?> ';
                    })
                } else {
                    Swal.fire({
                        position: 'bottom-end',
                        icon: 'error',
                        title: response.messages,
                        showConfirmButton: false,
                        timer: 3500
                    })
                }
            }
        });
    }
</script>

</html>