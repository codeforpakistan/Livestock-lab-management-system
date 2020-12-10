<?php
// echo "<pre>";
// print_r($users);
// exit();
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
       <!-- Users Information -->
        
      </h1>
     
    </section>


    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button> -->

<!-- The Registeration Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('User/Registration'); ?>" method="post"  enctype="multipart/form-data" >
        <div class="box-body">
          <div class="row"> 
            <div class="col-md-12">
               <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>User Name</label>
                    <input type="text" name="user_name" placeholder="Enter User Name" class="form-control" required >
                    </div>
                    <div class="col-sm-6 form-group">
                    <label>User Email</label>
                    <input type="email" name="user_email" placeholder="Enter User Email" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                    <label>User Contact</label>
                    <input type="text" name="user_contact" placeholder="Enter Contact Number"  data-inputmask="'mask': ['9999-9999999']"  data-mask=""   maxlength="12" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                    <label>User Password</label>
                    <input type="password" name="user_pass" placeholder="Enter User Password" class="form-control" required>
                    </div>
                    <div class="col-sm-6 form-group">
                    <label>User Designation</label>
                    <input type="text" name="user_desi" placeholder="Enter User Designation" class="form-control" required>
                    </div>
                     <div class="col-sm-6 form-group">
                    <label>User Gender</label>
                    <div class="form-check">
                      <input class="form-check-input" name="user_gender" type="radio" value="Male" checked>
                      <label class="form-check-label">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input class="form-check-input" name="user_gender" type="radio" value="Female">
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
                      <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
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
                            <option    value="<?php echo $directorate->directorate_id; ?>"><?php echo $directorate->directorate_name; ?></option>
                            <?php 
                          }

                           ?>
                        </select>
                       </div>
                        <div class="col-sm-6 form-group">
                          <label> Center/Station</label>
                          <select class="form-control center_station_id" onchange="GetSections(this.value)"  name="center_station_id"  style="width: 100%" required>
                            <option  value="">-select-</option>
                           
                           </select>
                          </div>
                          <div class="col-sm-6 form-group">
                            <label for="location">Section</label>
                            <select class="form-control section_id" onchange="GetLabs(this.value)" name="section_id"  style="width: 100%" required>
                              <option  value="">-select-</option>
                             
                            </select>
                          </div>
                        <div class="col-sm-6 form-group">
                          <label> Labs</label>
                           <select class="form-control lab_id select2" multiple="multiple" style="width: 100% !important" name="lab_id[]" required>
                          <option  value="">-select-</option>
                        </select>
                          </div>
                <div class="col-sm-6  form-group">
                  <label>User Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  >
                          <img class="img-rounded" id="blah" src="" >
                         <input type="file" name="file" id="user_img" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                
          </div>
            </div>
            
          </div>
         
                    
                  
                </div>
               
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-success" id="rclass">Save</button>
      </div>
    </form>

    </div>
  </div>
</div>


    <!-- Main content -->
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card">
             


            <div class="card-header with-border">
               <b>Users Information</b><?php include'MessageAlert.php'; ?>
               <button style="margin-left:10px; " type="button" class="btn btn-info pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-download"></i>Export</button>
                  <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <li class="dropdown-item">
                        <a href="javascript:void(0);"  onclick='$(".buttons-print").click();'>
                            <i class="fa fa-print"></i>
                          Print
                        </a>
                    </li>
                      <li class="dropdown-item">
                        <a href="javascript:void(0);"  onclick='$(".buttons-pdf").click();'>
                            <i class="fa  fa-file-pdf-o"></i>
                          pdf
                        </a>
                    </li>
                      <li class="dropdown-item">
                        <a href="javascript:void(0);"  onclick='$(".buttons-csv").click();'>
                            <i class="fa fa-database"></i>
                          CSV
                        </a>
                    </li>
                      <li class="dropdown-item">
                        <a href="javascript:void(0);"  onclick='$(".buttons-excel").click();'>
                            <i class="fa  fa-file-excel-o"></i>
                          excel
                        </a>
                    </li>
                     <li class="dropdown-item">
                        <a href="javascript:void(0);"  onclick='$(".buttons-copy").click();'>
                            <i class="fa fa-copy"></i>
                          copy
                        </a>
                    </li>
                  </ul> &nbsp;&nbsp;&nbsp;&nbsp;
               <a class="btn btn-success pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal'>Add User</a>
            </div>
            <div class="card-body">
             <table class="table   table-striped table-hover" id="tbl-users">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th> Name</th>
                  <th>Email</th>
                  <th>Designation</th>
                  <th>Lab Assign</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
                <tbody>
                  <?php 
                  $count=1;
                if(!empty($users))
                {
                foreach ($users as $key => $user) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?= $count++ ?></td>
                    <td><?= $user['u']->user_name;   ?></td>
                    <td><?= $user['u']->user_email;  ?></td>
                    <td><?= $user['u']->designation; ?></td>
                    <td><a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#labModal<?=$key?>'>Lab Assign</a></td>
                    <td><?= $user['u']->role_name;   ?></td>
                    <td>
                       <?php
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
                       <span class="badge <?= $color; ?>"><?= $status; ?></span>
                     </td>
                    <td>
                   <a href="<?= base_url('User/user_detail_info/'.$user['u']->user_id); ?>"> <span class="badge bg-primary"><i class="fa fa-eye"></i> view</span></a>
                   <a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal<?=$key?>'> <span class="badge bg-success"> <i class="fa fa-pencil-square-o "></i> edit</span></a>
                   <a  onclick="return confirm('Are you sure to delete?');" href='<?= base_url('User/deleteUser/'.$user['u']->user_id); ?>'> <span class="badge bg-danger"><i class="fa fa-trash"></i> Remove</span></a>
                    </td>
<!--  The Updation Modal -->
<div class="modal" id="myModal<?= $key ?>">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('User/updateUserRecord'); ?>" method="post" enctype="multipart/form-data"> 
        <div class="box-body">
          <div class="row"> 
            <div class="col-md-12">
               <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>User Name</label>
                    <input type="text" value="<?= $user['u']->user_name;?>" name="user_name" placeholder="Enter User Name" class="form-control" required>
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
                    <input type="text" value="<?= $user['u']->user_contact;?>" name="user_contact" placeholder="Enter Contact Number" class="form-control"   data-inputmask="'mask': ['9999-9999999']"  data-mask=""   maxlength="12" required>
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
                        <option <?php foreach ($user_labs as $uLab) {  if($lab->lab_id==$uLab->ul_lab_id){ echo "selected"; } } ?> value="<?php echo $lab->lab_id; ?>"><?php echo $lab->lab_name; ?></option>
                    <?php 
                      }

                    ?>
                  </select>
                    </div>
                <?php
                    if(!empty($user['u']->user_img))
                    {
                ?>
               <div class="col-sm-6 form-group">
                 <img class="img-rounded" style="width: 120px; height: 100px;" src="<?= base_url('img_uploads/user_images/'.$user['u']->user_img); ?>" >
                 <div class="col-sm-4">
                <!--  <a class="btn btn-danger btn-sm" style="width: 100%"  href="<?= base_url('User/DeleteImg/'.'index/'.'users/'.$user['u']->user_id); ?>">Delete</a> -->
                 </div>
               </div>
                <?php
                    }
                ?>
               <div class="col-sm-6 form-group">
                  <label>Change Image</label>
                  <input type="file"   name="file"  id="user_img2"  class="form-control"><br>
               </div>
               
                
          </div>
            </div>
            
          </div>
                   
                </div>
               
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-success" id="rclass">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--  The Details Modal -->
<div class="modal" id="labModal<?=$key ?>">
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
                    
                    
                  </tr>
                  <?php  
                } 
              }
                   ?>
                </tbody>
            </table> 
          </div>
          </div>
        </div>
      </div>
      </div>
      <!-- /.row -->
    </section>

<script type="text/javascript">

 function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $('#blah').css({'width':'150px'});
                $('#blah').css({'width':'150px'});
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#user_img").change(function () {
        readURL(this);
    });
</script>

  
 
   
   <script>
  $(document).ready(function(){

$('#tbl-users').DataTable({
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": true,
 "order": [[ 0, "desc" ]],
    'dom'        : 'Bfrtipl',
      buttons: [
            'copy', 'csv', 'excel', 'pdf', 
            {
                extend: 'print',
                exportOptions: 
                {
                    columns: [ 0,1,2,3,4,5,6 ]
                }
            }
        ]
})
  })
</script>



