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
                        <h1 class="page-header">Laporan Pelimpahan No Porsi Haji</h1>
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
                                        Tentukan Tanggal dan Jenis Laporan yang diinginkan!
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form id="lap-form" class="lap-form">
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>Jenis Laporan</label>
                                                <select class="form-control" name="jenis" id="jenis">


                                                    <?php foreach ($kab as $key => $value) {
                                                        echo '<option value="' . $value->kode . '">' . $value->nama_kab . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>Jenis pelimpahan</label>
                                                <select class="form-control" name="jenisp" id="jenisp">
                                                    <option value="all">Semua Jenis</option>
                                                    <option value="Meninggal Dunia">Meninggal Dunia</option>
                                                    <option value="Sakit Permanen">Sakit Permanen</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-6">
                                            <div class="form-group">
                                                <label>Status Pengajuan Pelimpahan</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="all">Semua Status</option>
                                                    <option value="Diterima">Diterima</option>
                                                    <option value="Diteruskan">Diteruskan</option>
                                                    <option value="Diproses">Diproses</option>
                                                    <option value="Ditolak">Ditolak</option>
                                                    <option value="Terkirim">Terkirim</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col col-md-6">
                                            <label>Tanggal</label>
                                            <div class="form-group input-group">
                                                <input type="date" class="form-control" value="<?= Date("Y-m-d"); ?>"
                                                    name="tglm" id="tglm">
                                                <span class="input-group-addon">s.d</span>
                                                <input type="date" class="form-control" value="<?= Date("Y-m-d"); ?>"
                                                    name="tgla" id="tgla">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col col-md-9"></div>
                                        <div class="col col-md-3" style="text-align:right;">
                                            <button type="button" onclick=" submitform();" class="btn btn-primary"
                                                name="submit"><i class="fa fa-search"></i>Preview</button>

                                        </div>
                                    </div>

                                </form>


                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                        <div id="isi2"></div>
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

    function submitform() {
        var form = $('#lap-form');
        $.ajax({
            url: '<?php echo base_url('pelimpahan/viewlap') ?>',
            type: 'post',
            data: form.serialize(),
            dataType: 'html',
            success: function (response) {
                var html = '<div class="panel panel-default">' +
                    '<div class="panel-heading">' +
                    '<div class="row">' +
                    '<div class="col-md-9 ">Preview Data Pelimpahan</div>' +
                    '<div class="col col-md-3" style="text-align:right;">' +
                    '<a href="javascript:void(processPrint());" class="btn btn-xs btn-success">' +
                    '<i class="fa fa-print"></i>Print</a>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="panel-body" id="printMe">' + response +
                    '</div>' +
                    ' </div > ';
                $('#isi2').html(html);
            }
        });
        return false;
    };

    function generatePDF() {
        var form = $('#lap-form');
        $.ajax({
            url: '<?php echo base_url('pelimpahan/generatePDFlap') ?>',
            type: 'post',
            data: form.serialize()
        });
        return false;

    }
</script>

</html>