<?php
  // $user_labs     = $this->API_m->getRecordWhere('user_labs',['ul_user_id' => $user['u']->user_id]);
  // echo "<pre>";
  // print_r($user_labs);
  // exit();

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
          <?php include'MessageAlert.php'; ?>
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php if (!empty($user['u']->user_img)) { ?>
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('img_uploads/user_images/' . $user['u']->user_img); ?>"
                       alt="User profile picture">
                       <?php } ?>
                </div>

                <h3 class="profile-username text-center"><?php if (!empty($user['u']->user_name)) { echo $user['u']->user_name; } ?></h3>

                <p class="text-muted text-center"><?php if (!empty($user['u']->designation)) { echo $user['u']->designation; } ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Role</b> <a class="float-right"><?php if (!empty($user['u']->role_name)) { echo $user['u']->role_name; } ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Member Since</b> <a class="float-right"><?php if (!empty($user['u']->created_date)) { echo date('M d Y',strtotime($user['u']->created_date)); } ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Account Status</b> <a class="float-right"> <?php
                          $status   = '';
                          $color    = '';
                         if($user['u']->is_block==0)
                         {
                           $status  = 'Active';
                           $color   = 'bg-success';
                         }else
                         {
                            $status = 'Blocked';
                            $color  = 'bg-danger';
                         }
                       ?>
                       <span class="badge <?= $color; ?>"><?= $status; ?></span></a>
                  </li>
                </ul>
<?php
  if($user['u']->is_block==0)
   {
?>
 <a onclick="return confirm('Are you sure to Block?');" href="<?= base_url('User/ChangeStatus/1/'.$user['u']->user_id); ?>" class="btn btn-danger btn-block"><b>Click to Block</b></a>
<?php
   }else
   {
?>
 <a onclick="return confirm('Are you sure to unblock?');" href="<?= base_url('User/ChangeStatus/0/'.$user['u']->user_id); ?>" class="btn btn-success btn-block"><b>Click to Unblock</b></a>
<?php
}
?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
           <!--  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div> -->
              <!-- /.card-header -->
             <!-- <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fa fa-pencil mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div> -->
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Detail</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Tests Records</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post clearfix">
                     <!--  <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div> -->
                      <!-- /.user-block -->
                      <div class="row">
                        <div class="col-md-12">
                          <table class="table table-hover ">
                            <tr>
                              <th>Full Name:</th>
                              <td><?= $user['u']->user_name; ?></td>
                              <th>Email:</th>
                              <td><?= $user['u']->user_email; ?></td>
                            </tr>
                            <tr>
                              <th>Designation:</th>
                              <td><?= $user['u']->designation; ?></td>
                              <th>Contact:</th>
                              <td><?= $user['u']->user_contact; ?></td>
                            </tr>
                            <tr>
                              <th>Gender:</th>
                              <td><?= $user['u']->gender; ?></td>
                              <th>Lab:</th>
                              <td><a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#labModal'>Lab Assign</a></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                     <p class="text-danger text-center" style="font-weight: bold;"><i class="fa fa-warning"></i> Warning! &nbsp;&nbsp;&nbsp; Enter New Password for this User account, If you want to replace with old Password.</p>

                      <form action="<?= base_url('User/ChangePassword'); ?>" method="post" class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input  name="user_id" type="hidden" value="<?= $user['u']->user_id; ?>">
                          <input type="password" class="form-control form-control-sm" name="new_password" placeholder="Ente New Password" required>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Replace</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                          <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                   <form action="<?= base_url('User/updateUserRecord'); ?>" method="post" enctype="multipart/form-data"> 
        <div class="box-body">
          <div class="row"> 
            <div class="col-md-12">
               <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>User Name</label>
                    <input type="text" value="<?= $user['u']->user_name;?>" name="user_name" placeholder="Enter User Name" class="form-control" required pattern="[a-zA-Z0-9\s]+">
                    <input type="hidden" value="<?= $user['u']->user_id;?>" name="user_id">
                    <input type="hidden" value="<?= $this->uri->segment(2); ?>" name="uri">
                  <input type="hidden" name="old_img" value="<?= $user['u']->user_img; ?>">
                    </div>
                    <div class="col-sm-6 form-group">
                    <label>User Email</label>
                    <input type="email" value="<?= $user['u']->user_email;?>" name="user_email" placeholder="Enter User Email" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                    <label>User Contact</label>
                    <input type="text" value="<?= $user['u']->user_contact;?>" name="user_contact" placeholder="Enter Contact Number" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                    <label>User Designation</label>
                    <input type="text" value="<?= $user['u']->designation;?>" name="user_desi" placeholder="Enter User Designation" class="form-control" required>
                    </div>
                     <div class="col-sm-6 form-group">
                    <label>User Gender</label>
                    <div class="form-check">
                      <input class="form-check-input" name="user_gender" type="radio" value="Male" <?php if($user['u']->gender=='Male'){ echo "checked"; } ?> >
                      <label class="form-check-label">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input class="form-check-input" name="user_gender" type="radio" value="Female" <?php if($user['u']->gender=='Female'){ echo "checked"; } ?>>
                      <label class="form-check-label">Female</label>
                    </div>
                    </div>
                    
                  <div class="col-sm-6 form-group">
                  <label for="location">User Roles</label>
                  <select class="form-control" name="role_id" required>
                    <option value="">-Select-</option>
                    <?php 
                    
                    foreach ($roles as $role) {
                      # code...
                      ?>
                      <option <?php if($role->role_id==$user['u']->user_role){ echo "selected"; } ?> value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label> Directorates</label>
                    <select class="form-control directorate_id" onchange="GetStations(this.value)"  name="directorate_id"  style="width: 100%" required>
                    <option  value="">-select-</option>
                    <?php 
                    
                    foreach ($directorates as $directorate) {
                      # code...
                      ?>
                      <option  <?php if($directorate->directorate_id==$user['u']->directorate_id){ echo "selected";} ?>  value="<?php echo $directorate->directorate_id; ?>"><?php echo $directorate->directorate_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                  <div class="col-sm-6 form-group">
                    <label> Center/Station</label>
                    <select class="form-control center_station_id" onchange="GetSections(this.value)"  name="center_station_id"  style="width: 100%" required>
                      <?php 
                       $stations = $this->API_m->getRecordWhere('center_station',['directorate_id' => $user['u']->directorate_id]);
                    foreach ($stations as $station) {
                      # code...
                      ?>
                      <option <?php if($station->center_station_id==$user['u']->center_station_id){ echo "selected";} ?> value="<?php echo $station->center_station_id; ?>"><?php echo $station->center_station_name; ?></option>
                      <?php 
                    }

                     ?>
                     </select>
                    </div>
                    <div class="col-sm-6 form-group">
                  <label for="location">Section</label>
                  <select class="form-control section_id"  name="section_id" onchange="GetLabs(this.value)"  style="width: 100%" required>
                    <?php 
                    $sections = $this->API_m->GetSectionsItems($user['u']->center_station_id);
                    foreach ($sections as $section) {
                      # code...
                      ?>
                      <option <?php if($section->section_id==$user['u']->section_id){ echo "selected";} ?> value="<?php echo $section->section_id; ?>"><?php echo $section->sectionHelp_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                </div>
                  <div class="col-sm-6 form-group">
                    <label> Lab</label>
                      <select class="form-control lab_id select2" multiple="multiple" style="width: 100% !important" name="lab_id[]" required>
                    <option value="">-Select-</option>
                    <?php 
                     $labs          = $this->API_m->getRecordWhere('labs',['section_id' => $user['u']->section_id]);
                     $user_labs     = $this->API_m->getRecordWhere('user_labs',['ul_user_id' => $user['u']->user_id]);
                      foreach ($labs as $lab) {
                    ?>
                        <option
                         <?php 
                         foreach ($user_labs as $uLab) { 
                          if($uLab->ul_lab_id==$lab->lab_id){
                               echo "selected"; 
                               }
                           } ?> 

                         value="<?php echo $lab->lab_id; ?>"><?php echo $lab->lab_name; ?></option>
                    <?php 
                      }

                    ?>
                  </select>
                    </div>
                <?php
                    if(!empty($user->user_img))
                    {
                ?>
               <div class="col-sm-6 form-group">
                 <img class="img-rounded" style="width: 120px; height: 100px;" src="<?= base_url('img_uploads/user_images/'.$user['u']->user_img); ?>" >
                 <div class="col-sm-4">
                 <a class="btn btn-danger btn-sm" style="width: 100%"  href="<?= base_url('User/DeleteImg/'.'user_detail_info/'.'users/'.$user['u']->user_id); ?>">Delete</a>
                 </div>
               </div>
                <?php
                    }else{
                ?>
               <div class="col-sm-6 form-group">
                  <label>User Image</label>
                  <input type="file"   name="file"   class="form-control">
               </div>
                <?php
                    }
                ?>
                
          </div>
            </div>
            
          </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-info" > Update Info </button>
                    </div>
                </div>
                </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
        if(!empty($user['ul']))
        {
          $sn = 1;
        foreach($user['ul'] as $ul)
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