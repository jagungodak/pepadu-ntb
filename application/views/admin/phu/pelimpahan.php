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
                        <h1 class="page-header">Data Usulan Pelimpahan</h1>
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
                                        Data Usulan Pelimpahan Dari Kemenag Kabupaten/Kota yang belum terselesaikan
                                    </div>
                                    <div class="col-md-3  text-right">
                                        <button type="button" class="btn btn-success btn-sm" onclick="tambah();"><i
                                                class="fa fa-plus fa-fw"></i>Permohonan</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table class="table table-bordered table-striped table-hover dt-responsive nowrap"
                                    id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Status</th>
                                            <th>No Porsi</th>
                                            <th>Nama Jamaah</th>
                                            <th>JK</th>
                                            <th>Tempat/Tgl. Lahir</th>
                                            <th>Jenis Pelimpahan</th>
                                            <th>Dilimpahkan Ke- </th>
                                            <th>Nama </th>
                                            <th>Jenis Kelamin </th>
                                            <th>Tempat/Tgl. Lahir </th>
                                            <th>Alamat </th>
                                            <th>Menggunakan Kuasa? </th>
                                            <th>Nama Pemberi Kuasa </th>
                                            <th>Tgl. Pengajuan </th>
                                            <th>Keterangan </th>
                                            <th>Operator </th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->

                            </div>
                            <!-- /.panel-body -->
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
    function tambah() {
        window.location = '<?= base_url() . "pelimpahan/add"; ?>';
    }
    function editdata(id) {
        window.location = '<?= base_url() . "pelimpahan/edit/"; ?>' + id;
    }
    function upload(id) {
        window.location = '<?= base_url() . "pelimpahan/upload/"; ?>' + id;
    }
    function history(id) {
        window.location = '<?= base_url() . "pelimpahan/status/"; ?>' + id;
    }
    $(document).ready(function () {
        var tabel = $('#dataTables-example').DataTable({
            "paging": true,

            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "ajax": {
                "url": '<?php echo base_url('pelimpahan/getAllByUserid') ?>',
                "type": "POST",
                "dataType": "json",
                async: "true"
            }
        });

    });

    function remove(id) {
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
                    url: '<?php echo base_url('pelimpahan/remove') ?>',
                    type: 'post',
                    data: {
                        pelimpahan_id: id
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
                                $('#dataTables-example').DataTable().ajax.reload(null, false).draw(false);
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
    function kirim(id) {
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
                        id: id,
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

</script>

</html>