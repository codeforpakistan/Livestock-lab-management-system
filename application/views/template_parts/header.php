

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo strtoupper('Livestock & Dairy Development KP'); ?> | <?php if (!empty($logLab->lab_name)) { echo strtoupper($logLab->lab_name); } ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url('img_uploads/logo.jpg');?>">
  <link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/bootstrap/css/bootstrap.min.css">  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/iCheck/flat/blue.css">
  <!-- datatable -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/datatables/dataTables.bootstrap4.css">  
  <link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/select2/select2.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- jQuery -->
<script src="<?php echo base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>public/plugins/bootstrap/js/bootstrap.min.js"></script>
  <style type="text/css">
.buttons-copy
,.buttons-csv
,.buttons-excel
,.buttons-pdf
,.buttons-print{
  display: none !important;
}
.page-item.active .page-link {
    background-color: #28a745 !important; 
}
  </style>
</head>
<body oncontextmenu="return false;" class="hold-transition sidebar-mini">
  
<div class="wrapper">
