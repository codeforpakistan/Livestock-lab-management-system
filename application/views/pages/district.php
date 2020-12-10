<div class="content-wrapper">
    <section class="content-header">
      <h1>
       <!-- District Information -->
        
      </h1>
     
    </section>


    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button> -->

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add District</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('Districtcontroller/district_insert'); ?>" method="post">
        <div class="box-body">
                    <div class="col-sm-12 form-group">
                      <?php echo validation_errors(); ?> 
                    <label>District Name</label>
                    <input type="text" name="district_name" placeholder="Enter District Name" class="form-control" required maxlength="100" minlength="2" pattern="[A-z0-9À-ž&\s]+" title="Enter Correct format">
                    </div>
                  
                </div>
                
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
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
              
               <b>  District Information</b> <?php include'MessageAlert.php'; ?>
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
               <a data-backdrop="static" data-keyboard="false" class="btn btn-success pull-right" data-toggle="modal" href='#myModal'>Add District</a>
            </div>
            <div class="card-body">
            <table class="table  table-striped table-hover" id="tbl-district">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>District Name</th>
                  <th>Action</th>
        
                </tr>
                <tbody>
                  <?php 
                  $count=1;
                foreach ($districts as $key => $district) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?php echo $count++ ?></td>
                    <td><?php echo $district->district_name ?></td>
                    <td><a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#Distt<?= $key; ?>'> <span class="badge bg-success"> <i class="fa fa-pencil-square-o "></i> edit</span>></a> 
                     <a  onclick="return confirm('Are you sure to delete?');" href='<?= base_url('Districtcontroller/deleteDistrict/'.$district->district_id); ?>'> <span class="badge bg-danger"><i class="fa fa-trash "></i> Remove</span></a>
                 </td>
                     
    
<div class="modal" id="Distt<?= $key; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update District</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('Districtcontroller/districtUpdate'); ?>" method="post">
        <div class="box-body">
              <input type="hidden" value="<?= $district->district_id;  ?>" name="district_id">
                    <div class="col-sm-12 form-group">
                    <label>District Name</label>
                    <input type="text" name="district_name" value="<?= $district->district_name;  ?>" placeholder="Enter District Name" class="form-control" required>
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
      
   var trid;

   $(".disedit").click(function(event) {
     /* Act on the event */
     var trid =$(this).closest('tr').attr('id');
     $("#did").val(trid);
     $("#districtname").val($("#"+trid).find('td:eq(1)').html());
   });


    </script>
    
<script>
  $(document).ready(function(){

$('#tbl-district').DataTable({
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
                    columns: [ 0,1]
                }
            }
        ]
})
  })
</script>