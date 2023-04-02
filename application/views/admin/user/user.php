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
                        <h1 class="page-header">Data User</h1>
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
                                        Data User
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
                                            <th>USERID</th>
                                            <th>USERNAME</th>
                                            <th>PASSWORD</th>
                                            <th>KELOMPOK</th>
                                            <th>NAMA</th>
                                            <th>KABUPATEN/KOTA</th>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Data User</h4>
            </div>
            <div class="modal-body">
                <form id="update-form" class="pl-3 pr-3">
                    <div class="form-group">
                        <label class="text-label-black">Username</label>
                        <input type="text" class="form-control" value="" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label class="text-label-black">Password</label>
                        <input type="text" class="form-control" value="" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label class="text-label-black">Nama User</label>
                        <input type="text" class="form-control" value="" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label>Kelompok</label>
                        <select class="form-control" name="kelompok" id="kelompok">
                            <?php foreach ($kelompok as $key => $value) {
                                if ($value->idkelompok == 1) {
                                    continue;
                                }
                                echo '<option value="' . $value->idkelompok . '">' . $value->nama_kelompok . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Satker / Unit Kerja</label>
                        <select class="form-control" name="kab" id="kab">
                            <?php foreach ($kab as $key => $value) {
                                echo '<option value="' . $value->kode . '">' . $value->nama_kab . '</option>';
                            } ?>
                        </select>
                        <input type="hidden" name="jenis" id="jenis" value="1">
                        <input type="hidden" name="userid" id="userid" value="">
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
    function tambah() {
        // reset the form 
        $("#update-form")[0].reset();
        $(".form-control").removeClass('is-invalid').removeClass('is-valid');
        $('#myModal').modal('show');

    }
    function editdata(id) {
        $.ajax({
            url: '<?php echo base_url('user/getOne') ?>',
            type: 'post',
            data: {
                userid: id
            },
            dataType: 'json',
            success: function (response) {
                // reset the form 
                $("#update-form")[0].reset();
                $(".form-control").removeClass('is-invalid').removeClass('is-valid');
                $('#myModal').modal('show');
                $("#update-form #userid").val(response.userid);
                $("#update-form #jenis").val('0');
                $("#update-form #username").val(response.username);
                $("#update-form #nama").val(response.nama_user);
                $("#update-form #kelompok").val(response.idkelompok).change();
                $("#update-form #kab").val(response.kode_kab).change();
                $("#update-form #password").val('');

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
                "url": '<?php echo base_url('user/getAll') ?>',
                "type": "POST",
                "dataType": "json",
                async: "true"
            }
        });

    });

    function submitstatus() {
        var form = $('#update-form');
        $.ajax({
            url: '<?php echo base_url('user/prosesadd') ?>',
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
                    url: '<?php echo base_url('user/remove') ?>',
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
    function reset(id) {
        Swal.fire({
            title: 'Apakah anda yakin akan melakukan Reset Password?',
            text: "Password secara otomatis akan berubah sesuai username",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?php echo base_url('user/reset') ?>',
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