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
                                        Menu Navigation
                                    </div>
                                    <div class="col-md-3  text-right">
                                        <button type="button" class="btn btn-success btn-sm" onclick="tambah();"><i
                                                class="fa fa-plus fa-fw"></i>Add</button>
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
                                            <th>Link</th>
                                            <th>Induk</th>
                                            <th>Level</th>
                                            <th>Urut</th>
                                            <th>Icon</th>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Menu Navigation Form</h4>
            </div>
            <div class="modal-body">
                <form id="update-form" class="pl-3 pr-3">
                    <div class="form-group">
                        <label class="text-label-black">Nama Menu</label>
                        <input type="text" class="form-control" value="" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label class="text-label-black">Link</label>
                        <input type="text" class="form-control" value="" name="link" id="link">
                    </div>
                    <div class="form-group">
                        <label class="text-label-black">Icon</label>
                        <input type="text" class="form-control" value="" name="icon" id="icon">
                    </div>
                    <div class="form-group">
                        <label>Induk</label>
                        <select class="form-control" name="induk" id="induk">
                            <option value="0">Menu Utama (Atas)</option>
                            <?php foreach ($menul as $key => $value) {
                                echo '<option value="' . $value->id_menu . '">' . $value->nama_menu . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tampil Menu</label>
                        <select class="form-control" name="tampil" id="tampil">
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>

                        </select>
                        <input type="hidden" name="jenis" id="jenis" value="1">
                        <input type="hidden" name="level" id="level" value="1">
                        <input type="hidden" name="idmenu" id="idmenu" value="">
                    </div>
                    <div class="form-group">
                        <label>Urutan Setelah Menu</label>
                        <select class="form-control" name="urut" id="urut">
                            <?php foreach ($menul2 as $key => $value) {
                                echo '<option value="' . $value->id_menu . '">' . $value->nama_menu . '</option>';
                            } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="add-form-btn" onclick="submitstatus();">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
#include Header CSS
$this->load->view("/admin/layout/script");

?>
<script>
    $('#induk').change(function () {
        var id = $(this).val();
        $.ajax({
            url: "<?= base_url() . 'menu/urutan'; ?>",
            method: "POST",
            data: {
                id_menu: id
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].no_urut + '>' + data[i].nama_menu + '</option>';
                    $('#level').val(data[i].nama_menu - 1);
                }
                $('#urut').html(html);


            }
        });
        return false;
    });
    function tambah() {
        // reset the form 
        $("#update-form")[0].reset();
        $(".form-control").removeClass('is-invalid').removeClass('is-valid');
        $('#myModal').modal('show');

    }
    function editdata(id) {
        $.ajax({
            url: '<?php echo base_url('menu/getOne') ?>',
            type: 'post',
            data: {
                id_menu: id
            },
            dataType: 'json',
            success: function (response) {
                // reset the form 
                $("#update-form")[0].reset();
                $(".form-control").removeClass('is-invalid').removeClass('is-valid');
                $('#myModal').modal('show');
                $("#update-form #idmenu").val(response.id_menu);
                $("#update-form #jenis").val('0');
                $("#update-form #nama").val(response.nama_menu);
                $("#update-form #level").val(response.level);
                $("#update-form #link").val(response.link);
                $("#update-form #induk").val(response.induk).change();
                $("#update-form #tampil").val(response.tampil).change();
                $("#update-form #urut").val((response.no_urut - 1)).change();
                $("#update-form #icon").val(response.icon);
            }
        });
    }
    $(document).ready(function () {
        var tabel = $('#dataTables-example').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            "ajax": {
                "url": '<?php echo base_url('menu/getAll') ?>',
                "type": "POST",
                "dataType": "json",
                async: "true"
            }
        });

    });

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