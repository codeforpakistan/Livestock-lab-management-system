<style> 
.main-header{
  background-color: #00a65a!important;
}
</style>  

<?php 
// $lab    = $this->User_m->getLogUserLabInfo();
// echo "<pre>";
// print_r($logUser);
// exit();
?>
<nav class="main-header navbar navbar-expand bg-success navbar-light border-bottom text-center">
  <div class="row">
    <div class="col-md-3">
      <img src="<?= base_url('img_uploads/logo.jpg');?>" class="profile-user-img img-fluid img-circle" style="width: 60px; height: 60px;">
    </div>
    <div class="col-md-9 text-center">
         <p class="brand-text font-weight-light" style="color: green; font-weight: bold !important; font-size: 15px !important;">
              
 <?php
$dptName = '';
$dptName = 
$role_id               = $this->session->userdata('user')['role'];
$permissions           = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
if($permissions[0]->show_all == 1 && $permissions[1]->show_all==1  && $permissions[2]->show_all==1  && $permissions[3]->show_all==1 && $permissions[4]->show_all==1)
{
?>
<strong style="color: white;">
   <?php echo  'Directorate General (Research) Livestock & Dairy Development KP'; ?>
</strong>
<?php
}else
{
?>
                    <strong style="color: white; ">
                      <?php echo  'Directorate General (Research)  Livestock & Dairy Development KP'; ?>  <br>
                      <?= $logLab->center_station_name; ?>
                      <?= $logLab->sectionHelp_name; ?>
                    </strong>
                    <strong style="color: white; font-weight: bold">
                      <?= $logLab->lab_name; ?>
                    </strong>  
<?php
}
?>
         </p>
    </div> 
  </div>

  <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul> -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto pull-right">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a> -->
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="#" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <!-- <div class="media">
              <img src="#" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> -->
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="#" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <!-- <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a> -->
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown pull-right">
        <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
          <!-- <i class="fa fa-user"></i> -->
          <?php if (!empty($logUser['u']->user_img)) { ?>
  <img class="profile-user-img  img-circle" style="width: 40px; height: 40px;  margin-top: -10px !important;"  src="<?= base_url('img_uploads/user_images/' . $logUser['u']->user_img); ?>"  alt="User profile picture">
<?php }else { ?> 
   <img class="profile-user-img  img-circle" style="width: 40px; height: 40px;  margin-top: -10px !important;"  src="<?= base_url('img_uploads/no-image.png'); ?>"  alt="User profile picture">
<?php } ?>
          <span class="badge badge-success navbar-badge" style="margin-top: -10px !important;">Profile</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
 <?php if ($logUser['u']->user_img!="") { ?>
  <img class="profile-user-img img-fluid img-circle"  src="<?= base_url('img_uploads/user_images/' . $logUser['u']->user_img); ?>"  alt="User profile picture">
<?php }else {
  ?>
  <img class="profile-user-img img-fluid img-circle"  src="<?= base_url('img_uploads/no-image.png'); ?>"  alt="User profile picture">
  <?php
} ?>
                </div>

                <h3 class="profile-username text-center text-success"><?php if (!empty($logUser['u']->user_name)) { echo $logUser['u']->user_name; } ?></h3>

                <p class="text-muted text-center text-success"><?php if (!empty($logUser['u']->designation)) { echo $logUser['u']->designation; } ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Role</b> <span class="float-right text-success"><?php if (!empty($logUser['u']->role_name)) { echo $logUser['u']->role_name; } ?></span>
                  </li>
                  <li class="list-group-item">
                    <b>Member Since</b> <span class="float-right text-success"><?php if (!empty($logUser['u']->created_date)) { echo date('M d Y',strtotime($logUser['u']->created_date)); } ?></span>
                  </li>
                </ul>
            <div class="pull-right">
                
                <a href="<?= base_url('Login/logout/'); ?>" class="btn btn-danger btn-block"><b>Logout</b></a>
                </div>
                 <div class="pull-left">
                <a href="<?= base_url('Login/user_profile/'); ?>" class="btn btn-primary btn-block"><b>Profile</b></a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
      </li>
      
     <!--  <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li> -->
    </ul>
  </nav>