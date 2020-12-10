<div class="content-wrapper">
    <section class="content-header">
      <h1>
     <!--   Breeds Information -->
        
      </h1>
     
    </section>


    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button> -->


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add  Breeds</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Pagescontroller/AddBreed') ?>" method="post">
        <div class="box-body">
                    <div class="col-sm-12 form-group">
                    <label> Breeds Name</label>
                    <input type="text" name="breed_name" placeholder="Enter  Breed Name" class="form-control" required="" pattern="[A-zÀ-ž&\s]+">
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Cattle</label>
                    <select class="form-control"  name="cattle_id"  style="width: 100%" required>
                    <?php 
                    
                    foreach ($cattles as $cattle) {
                      # code...
                      ?>
                      <option  value="<?php echo $cattle->cattle_id; ?>"><?php echo $cattle->cattle_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
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
                <b>Breeds Information</b><?php include'MessageAlert.php'; ?>
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
               <a class="btn btn-success pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal'>Add Breed</a>
            </div>
            <div class="card-body">
             <table class="table  table-striped table-hover" id="tbl-breed">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Breed</th>
                  <th>Cattle</th>
                  <th>Action</th>
        
                </tr>
                <tbody>
                  <?php 
                  $count=1;
                foreach ($breeds as $key => $breed) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?php echo $count++ ?></td>
                    <td><?php echo $breed->breed_name; ?></td>
                    <td><?php echo $breed->cattle_name; ?></td>
                    <td><a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#breed<?= $key; ?>'><span class="badge bg-success"> <i class="fa fa-pencil-square-o   "></i> edit</span></a> <a onclick="return confirm('Are you sure to delete?');" href="<?=  base_url('Pagescontroller/breedDelete/'.$breed->breed_id) ?>"> <span class="badge bg-danger"><i class="fa fa-trash  "></i> Remove</span></a></td>
<!-- The Modal -->
<div class="modal" id="breed<?= $key; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Breed</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Pagescontroller/breedUpdate') ?>" method="post">
        <div class="box-body">
                    <input type="hidden" name="breed_id"  value="<?=  $breed->breed_id; ?>">
                    <div class="col-sm-12 form-group">
                   <label> Breed Name</label>
                    <input type="text" name="breed_name" value="<?php echo $breed->breed_name; ?>" placeholder="Enter  Breed  Name" class="form-control">
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Cattle</label>
                    <select class="form-control"  name="cattle_id"  style="width: 100%" required>
                    <?php 
                    
                    foreach ($cattles as $cattle) {
                      # code...
                      ?>
                      <option <?php if($cattle->cattle_id==$breed->cattle_id){ echo "selected";} ?> value="<?php echo $cattle->cattle_id; ?>"><?php echo $cattle->cattle_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
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
              </thead>
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

$('#tbl-breed').DataTable({
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
                    columns: [ 0,1,2 ]
                }
            }
        ]
})
  })
</script>