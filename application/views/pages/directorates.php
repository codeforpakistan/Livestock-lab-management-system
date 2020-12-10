<div class="content-wrapper">
    <section class="content-header">
      <h1>
       <!-- tbl-directorate Information -->
        
      </h1>
     
    </section>




<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Directorate</h4>
        
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Pagescontroller/AddDirectorate') ?>" method="post">
        <div class="box-body">
                    <div class="col-sm-12 form-group">
                    <label>Directorate Name</label>
                    <input type="text" name="directorate_name" placeholder="Enter directorate Name" class="form-control" required pattern="[A-zÀ-ž&\s]+">
                    </div>
                     <div class="col-sm-12 form-group">
                    <label>Head of Directorate </label>
                    <input type="text" name="directorate_head" placeholder="Enter directorate head Name" class="form-control" required >
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
               <b> Directorates Information</b> <?php include'MessageAlert.php'; ?>
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
               <a class="btn btn-success pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal'>Add Directorate</a>
            </div>
            <div class="card-body">
             <table class="table table-striped table-hover" id="tbl-directorate">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Directorate</th>
                  <th>HoD</th>
                  <th>Action</th>
        
                </tr>
                <tbody>
                  <?php 
                  $count=1;
                foreach ($directorates as $key => $direct) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?php echo $count++ ?></td>
                    <td><?php echo $direct->directorate_name; ?></td>
                    <td><?php echo $direct->directorate_head; ?></td>
                    <td><a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#direct<?= $key; ?>'> <span class="badge bg-success"> <i class="fa fa-pencil-square-o   secedit"></i> edit</span></a> <a onclick="return confirm('Are you sure to delete?');" href="<?=  base_url('Pagescontroller/directorateDelete/'.$direct->directorate_id) ?>"> <span class="badge bg-danger"><i class="fa fa-trash  secedit"></i> Remove</span></a></td>
<!-- The Modal -->
<div class="modal" id="direct<?= $key; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Directorate</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Pagescontroller/directoreatesUpdate') ?>" method="post">
                    <input type="hidden" name="directorate_id"  value="<?= $direct->directorate_id; ?>">
        <div class="box-body">
                    <div class="col-sm-12 form-group">
                    <label>Directorate Name</label>
                    <input type="text" name="directorate_name" placeholder="Enter Directorate Name" class="form-control" value="<?= $direct->directorate_name; ?>">
                    </div>
                     <div class="col-sm-12 form-group">
                    <label>Directorate Head</label>
                    <input type="text" name="directorate_head" placeholder="Enter Name of Head of Directorate " class="form-control" value="<?= $direct->directorate_head; ?>">
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

$('#tbl-directorate').DataTable({
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