<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>PEPADU KANWIL NTB</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?=base_url();?>assets/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?=base_url();?>assets/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?=base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
       
        <!--SWEEETALERT2-->
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">                
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Administrator Login</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" id="login-form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="username" name="username" id="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <div id="notifikasi">
                                        
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                   <button type="submit" id="login"  class="btn btn-success btn-block">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?=base_url();?>assets/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?=base_url();?>assets/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?=base_url();?>assets/js/startmin.js"></script>

        <!--SWEETALERT2-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>



      
            
<script type="text/javascript">
 
    $(document).ready(function() {
    $('#loadingmessage').hide();
    $('#login').click(function(e) {
      e.preventDefault();
      var username = $("#username").val();
      var password = $("#password").val();
      $.ajax({
        url: '<?=base_url()?>index.php/login/login',
        method: "POST",
        data: {
          username: username,
          password: password
        },
         dataType: "JSON",
        success: function(data) {
          if (data.success == true) {                          
           window.location = '<?= base_url(); ?>';
          } else {
           /* $('#notifikasi').html('<div class="alert alert-danger">'+
                    '<a href="#" class="close" data-dismiss="alert">&times;</a>'+
                    '<strong>Warning!</strong> '+data.pesan+
                    '</div>');*/
                    swal("Warning", data.pesan, "warning");
          }
        },
        error: function(request, status, err) {
          alert('Gagal Terhubung Ke Server');
        }
      });
    });

  });
  
</script>
           
    </body>
</html>
