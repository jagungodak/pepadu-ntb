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
                        <h1 class="page-header">History Status Pengajuan Pelimpahan</h1>
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
                                        History Pengajuan Pelimpahan No Porsi <b>
                                            <?= $pelimpahan['jamaah_no_porsi']; ?>
                                        </b>
                                    </div>
                                    <div class="col-md-3  text-right">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="kembali();"><i
                                                class="fa fa-arrow-left fa-fw"></i>Kembali</button>
                                    </div>
                                </div>

                            </div>

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <ul class="timeline">
                                            <?php
                                            $label = '';
                                            $awal = 1;
                                            $posisi = '';
                                            $icon = 1;
                                            foreach ($status as $key => $val) {
                                                if ($val->status == 'Terkirim') {
                                                    $label = 'primary';
                                                    $icon = 'fa-send';
                                                } else if ($val->status == 'Diproses') {
                                                    $label = 'info';
                                                    $icon = 'fa-save';

                                                } else if ($val->status == 'Ditolak') {
                                                    $label = 'danger';
                                                    $icon = 'fa-close';
                                                } else if ($val->status == 'Diteruskan') {
                                                    $label = 'warning';
                                                    $icon = 'fa-mail-forward';
                                                } else {
                                                    $label = 'success';
                                                    $icon = 'fa-check';
                                                }
                                                if ($awal == 1) {
                                                    $posisi = 'class="timeline-inverted"';
                                                    $awal = 0;
                                                } else {
                                                    $posisi = '';
                                                    $awal = 1;
                                                }
                                                echo '<li ' . $posisi . '>
                                                <div class="timeline-badge ' . $label . '"><i class="fa ' . $icon . '"></i>
                                                </div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">' . $val->status . '</h4>

                                                        <p>
                                                            <small class="text-muted"><i class="fa fa-clock-o"></i> ' . $this->fungsi->tanggal($val->tgl, false) . '
                                                             <i class="fa fa-user"></i>  oleh ' . $val->nama_user . '<br>
                                                             <i class="fa fa-home"></i> ' . $val->nama_kab . '</small>
                                                        </p>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>' . $val->keterangan . '</p>
                                                    </div>
                                                </div>
                                            </li>';
                                            }

                                            ?>


                                        </ul>
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->

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
    function kembali() {
        window.location = '<?= base_url() . "pelimpahan"; ?>';
    }
</script>

</html>