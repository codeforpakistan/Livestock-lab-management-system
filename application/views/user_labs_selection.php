<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LIVE STOCK| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?= base_url('img_uploads/logo.jpg');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/public/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/public/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0)"><b>LIVE STOCK</b>|Lab List</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Select Your Desire Lab to start session<br><?php include'pages/MessageAlert.php'; ?></p>
          
      <form action="<?= base_url('Login/AdminVerify'); ?>" method="post">
          <div class="input-group mb-3">
            <select class="form-control" name="lab_id" required>
              <option value="">-Select-</option>
              <?php
                if(!empty($labs))
                {
                   foreach($labs as $lab)
                   {
                ?>
                 <option value="<?= $lab->ul_lab_id; ?>"><?= $lab->lab_name; ?></option>
                <?php
                   }
                }
              ?>
            </select>
          </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12"><br>
            <button type="submit" class="btn btn-success btn-block btn-flat">Go</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fa fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

     <!--  <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p> -->
     <!--  <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>/public/plugins/iCheck/icheck.min.js"></script>
<script>
  // $(function () {
  //   $('input').iCheck({
  //     checkboxClass: 'icheckbox_square-blue',
  //     // radioClass   : 'iradio_square-blue',
  //     increaseArea : '20%' // optional
  //   });
  // });
  function showpass() {
        var x = document.getElementById("login_pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</body>
</html>
