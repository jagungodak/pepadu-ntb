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
                        <h1 class="page-header">Data Menu Navigation</h1>
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
                                        Pilih Kelompok Pengguna
                                    </div>
                                    <div class="col-md-3  text-right">
                                        <select class="form-control" name="kelompok" id="kelompok">
                                            <?php foreach ($kelompok as $key => $value) {
                                                if ($value->idkelompok == 1) {
                                                    continue;
                                                }
                                                echo '<option value="' . $value->idkelompok . '">' . $value->nama_kelompok . '</option>';
                                            } ?>
                                        </select>
                                        <input type="hidden" value="" name="listmenu" id="listmenu">
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
                                            <th>Menu</th>
                                            <th>Induk</th>
                                            <th>Level</th>
                                            <th>Tampil</th>
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

    var listmenu = $("#listmenu").val();
    $('#kelompok').change(function () {
        var id = $(this).val();
        $.ajax({
            url: "<?= base_url() . 'menu/getKelompokOne'; ?>",
            method: "POST",
            data: {
                kelompok: id
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                $('#dataTables-example').DataTable().clear();
                $('#dataTables-example').DataTable({
                    "paging": false,
                    destroy: true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                    "responsive": false,
                    "ajax": {
                        "url": '<?php echo base_url('menu/getAllMenu') ?>',
                        "type": "POST",
                        "data": {
                            kelompok: $("#kelompok").val(),
                        },
                        "dataType": "json",
                        async: "true"
                    }
                });
            }
        });
        return false;
    });


    var tabel = $('#dataTables-example').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": false,
        "ajax": {
            "url": '<?php echo base_url('menu/getAllMenu') ?>',
            "type": "POST",
            "data": {
                kelompok: $("#kelompok").val(),
            },
            "dataType": "json",
            async: "true"
        }
    });

    function update() {
        var searchIDs = '';

        $("#dataTables-example input:checkbox:checked").map(function () {
            searchIDs = searchIDs + ',' + $(this).val();
        });
        var menu = searchIDs.substr(1);
        console.log(menu);
        $.ajax({
            url: '<?php echo base_url('menu/prosesupdate') ?>',
            type: 'post',
            data: { menu: menu, kelompok: $("#kelompok").val() }, // /converting the form data into array and sending it to server
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
                            position: 'center-center',
                            icon: 'error',
                            title: response.messages,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }

            }
        });

        return false;
    }

    function submitstatus() {
        var form = $('#update-form');
        $.ajax({
            url: '<?php echo base_url('menu/prosesadd') ?>',
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
                        $('#dataTables-example').DataTable().ajax.reload(null, false).draw(false);
                        $('#myModal').modal('hide');
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
                            title: response.messages,
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
                    url: '<?php echo base_url('menu/remove') ?>',
                    type: 'post',
                    data: {
                        id: id
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



</script>

</html>