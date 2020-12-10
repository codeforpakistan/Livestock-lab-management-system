<div class="content-wrapper">
    <section class="content-header">
      <h1>
       <!-- Role Information -->
        
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
        <h4 class="modal-title">Add Role</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('User/addRole'); ?>" method="post" >
        <div class="box-body">
          <div class="row"> 
            <div class="col-md-12">
               <div class="row">
                  <div class="col-sm-12 form-group">
                    <label>Role Name</label>
                    <input type="text" name="role_name"  placeholder="Enter User Name" class="form-control" required>
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
             <b>Role Information</b>  <?php include'MessageAlert.php'; ?>
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
              <a class="btn btn-success pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal'>Add Role</a>
            </div>
            <div class="card-body">
             <table class="table  table-striped table-hover" id="tbl-roles">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Role</th>
                  <th>Privileges</th>
                  <th>Action</th>
                </tr>
              </thead>
                <tbody>
                  <?php 
                  $count=1;
                foreach ($roles as $key => $role) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?= $count++ ?></td>
                    <td><?= $role->role_name; ?></td>
                    <td>
                       <a href="<?= base_url('User/role_permissions/'.$role->role_id); ?>" title="Assign Permissions"><span class="badge bg-primary"><i class="fa fa-users"></i> Give Access</span></a>
                    </td>
                    <td>
                  
                   <a data-backdrop="static" data-keyboard="false" data-toggle="modal" title="update record" href='#myModal<?=$key?>'> <span class="badge bg-success"> <i class="fa fa-pencil-square-o "></i> edit</span></a> 
                   <a  onclick="return confirm('Are you sure to delete?');" href='<?= base_url('User/deleteRole/'.$role->role_id); ?>'> <span class="badge bg-danger"><i class="fa fa-trash"></i> Remove</span></a>
                    </td>
<!--  The Updation Modal -->
<div class="modal" id="myModal<?= $key ?>">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Role</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('User/updateRoleRecord'); ?>" method="post"> 
        <div class="box-body">
          <div class="row"> 
            <div class="col-md-12">
               <div class="row">
                  <div class="col-sm-12 form-group">
                    <label>Role Name</label>
                    <input type="text" value="<?= $role->role_name;?>" name="role_name" placeholder="Enter Role" class="form-control" required>
                    <input type="hidden" value="<?= $role->role_id;?>" name="role_id">
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
                    
                  </tr>
                  <?php  
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

<script>
  $(document).ready(function(){

$('#tbl-roles').DataTable({
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
                    columns: [ 0,1,2]
                }
            }
        ]
})
  })
</script>