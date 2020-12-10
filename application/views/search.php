<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LIVE STOCK| Search</title>
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
<body oncontextmenu="return false;" class="hold-transition login-page">
  <div class="row bg-success p-1" style="display: none">
    <div class="col-md-8">
      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. </p> -->
    </div>
    <div class="col-md-4"><a href="<?= base_url('Login'); ?>"><button class="btn btn-info pull-right mr-3"><strong>LOGIN</strong></button></a></div>
  </div>
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0)"><b>LIVE STOCK</b>|Search Tracking #</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Enter Your Tracking # to find Test Result  <br><?php include'pages/MessageAlert.php'; ?></p>
          
      <form action="<?= base_url('Search/GetTrackingID'); ?>" method="post">
          <div class="input-group mb-3">
             <input type="number" name="tracking_id" min="0"  class="form-control"  placeholder="Search Tracking #" autocomplete="off" required autofocus>
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
          </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12"><br>
            <button type="submit" class="btn btn-primary btn-block btn-flat">Search</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
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
</script>

</body>
</html>
