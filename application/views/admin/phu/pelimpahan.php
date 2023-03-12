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
                                        <button type="button" class="btn btn-success btn-sm">Permohonan Baru</button>
                                    </div>
                                </div>

                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Porsi</th>
                                                <th>Nama Jamaah</th>
                                                <th>JK</th>
                                                <th>Tempat/Tgl. Lahir</th>
                                                <th>Jenis Pelimpahan</th>
                                                <th>Dilimpahkan Ke-</th>
                                                <th>Nama</th>
                                                <th>JK</th>
                                                <th>Tempat/Tgl. Lahir</th>
                                                <th>Alamat</th>
                                                <th>Tgl. Surat</th>
                                                <th>Tgl. Pengajuan</th>
                                                <th>Status</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
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
    $(document).ready(function() {
        var tabel = $('#dataTables-example').DataTable({
           "paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true,
			"responsive": true,
            "ajax": {
                "url": '<?php echo base_url('pelimpahan/getAllByUserid') ?>',
                "type": "POST",
                "dataType": "json",
                async: "true"
            }
        });

    });
</script>

</html>