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
<body oncontextmenu="return false;"  class="hold-transition login-page">
    <div class="row bg-success p-1">
    <div class="col-md-8">
      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. </p> -->
    </div>
    <div class="col-md-4"><a href="<?= base_url('Search'); ?>"><button class="btn btn-info pull-right mr-3"><strong>SEARCH</strong></button></a></div>
  </div>
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0)"><b>LIVE STOCK</b>|Login here</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session <br><?php include'pages/MessageAlert.php'; ?></p>
          <?php echo validation_errors();?>
      <form action="<?= base_url('Login/check_labs_selection'); ?>" method="post">
          <div class="input-group mb-3">
             <input type="email" name="admin_email" class="form-control"  placeholder="Enter your email" autocomplete="off" required autofocus>
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-envelope"></i></span>
            </div>
          </div>

           <div class="input-group mb-3">
              <input type="password" name="admin_pass" id="login_pass" autocomplete="off" class="form-control" placeholder="Password" required>
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock "></i></span>
              </div>
          </div>

          <div>
            <label><?php echo $label = ucwords('captcha'); ?>:</label>
          </div>
          <span class="input-group-prepend"><b><?php echo $math_captcha_question; ?></b></span>
        <div class="input-group  has-feedback">
         <input type="text" autocomplete="off" class="form-control validate[required,minSize[1],maxSize[15],custom[number]]" value="<?php echo set_value('captcha'); ?>"  name="captcha"  id="captcha" placeholder="Answer" required>
          <!-- <span class="fa fa-reply form-control-feedback"></span> -->
           <?php echo form_error('captcha'); ?>
        </div>
        <div class="row">
          <div class="col-8">
             <div class="">
                <input id="chek"  type="checkbox" onclick="showpass();"> Show <br>
            </div> 
          </div>
          <!-- /.col -->
          <div class="col-12"><br>
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
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

      <!--< p class="mb-1">
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
