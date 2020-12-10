<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Personal Information</h1> -->
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<?php include'MessageAlert.php'; ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <b class="card-title">Personal Information</b>
<!-- 
           <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>  -->
        </div>
        <div class="card-body">
         <div class="row">
        <?php
            if(!empty($logUser['u']->user_img))
            {
        ?>
           <div class="col-md-3">
  <img class="profile-user-img img-fluid img-circle"  src="<?= base_url('img_uploads/user_images/' . $logUser['u']->user_img); ?>"  alt="User profile picture">
  <div class="col-sm-4">
  <a class="btn btn-danger btn-sm" style="width: 100%"  href="<?= base_url('Login/DeleteProfileImg/'.$logUser['u']->user_id); ?>">Delete</a>
  </div>
           </div>
      <?php
        }else{
      ?>
      <div class="col-sm-3 form-group">
      <form action="<?= base_url('Login/changeProfileImg'); ?>" method="post" enctype="multipart/form-data">
        <label>User Image</label>
        <input type="file"   name="file"   class="form-control"><br>
        <button type="submit" class="btn btn-primary btn-block">Change Picture</button>
      </form>
      </div>
      <?php
        }
      ?>
           <div class="col-md-4">
             <span class="text-primary">Full Name: </span>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?= $logUser['u']->user_name; ?></b><br><br>
             <span class="text-primary">Email: </span>      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?= $logUser['u']->user_email; ?></b>
           </div>
           <div class="col-md-4">
             <span class="text-primary">Designation:</span> &nbsp;&nbsp;&nbsp;&nbsp; <b><?= $logUser['u']->designation; ?></b><br><br>
             <span class="text-primary">Role:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?= $logUser['u']->role_name; ?></b>
           </div>
            <div class="col-md-3"></div>
           <div class="col-md-4">
             <span class="text-primary">Contact#:</span> &nbsp;&nbsp;&nbsp;&nbsp; <b><?= $logUser['u']->user_contact; ?></b><br><br>
             <span class="text-primary">Lab:</span> &nbsp;&nbsp;&nbsp;&nbsp; <a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#labModal'><b>lab assign</b></a><br>
           </div>
           <div class="col-md-4">
             <span class="text-primary">Gender:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?= $logUser['u']->gender; ?></b><br><br>
              <span class="text-primary">Join Date:</span> &nbsp;&nbsp;&nbsp;&nbsp; <b><?php if (!empty($logUser['u']->created_date)) { echo date('M d Y',strtotime($logUser['u']->created_date)); } ?></b>
           </div>
         </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="row">
            <div class="col-md-12">
            <p class="text-danger text-center" style="font-weight: bold;"><i class="fa fa-warning"></i> Warning! &nbsp;&nbsp;&nbsp; Enter New Password for your account, If you want to replace with old Password.</p>
            </div>
            </div>
                <form action="<?= base_url('Login/UpdatePassword/'); ?>" method="post">
            <div class="row">
            <div class="col-md-6">
                  <input type="password"   name="New_Password"  placeholder="Enter New Password"  class="form-control" required>
            </div>
             <div class="col-md-6">
                  <button type="submit" class="btn btn-primary" class="form-control">Change Password</button>
            </div>
          </div>
                </form>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!--  The Details Modal -->
<div class="modal" id="labModal">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Labs Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="box-body">
      <?php
        if(!empty($logUser['ul']))
        {
          $sn = 1;
        foreach($logUser['ul'] as $ul)
        {
      ?>
     <div class="row"> 
            <div class="col-sm-2">
              <?= $sn; ?> :&nbsp;&nbsp;
              <b>Lab Name</b>
            </div>
             <div class="col-sm-2">
              <?= $ul->lab_name; ?>
            </div>
            <div class="col-sm-2">
              <b>Address</b>
            </div>
             <div class="col-sm-2">
              <?= $ul->lab_address; ?>
            </div>
            <div class="col-sm-2">
              <b>Description</b>
            </div>
             <div class="col-sm-2">
              <?= $ul->lab_description; ?>
            </div>
          </div>
       <?php
       $sn++;
         }
        }else
        {
        ?>
          <div class="row"> 
            <div class="col-sm-12">
              <b>No Lab ASsign yet!</b>
            </div>
          </div>
        <?php
        }
      ?>
          
                </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>