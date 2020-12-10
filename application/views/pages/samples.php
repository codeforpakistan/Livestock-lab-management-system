<div class="content-wrapper">
    <section class="content-header">
      <h1>
       <!-- Sample Information -->
        
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
        <h4 class="modal-title">Add Sample</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('Pagescontroller/addSample'); ?>" method="post" >
        <div class="box-body">
          <div class="row"> 
            <div class="col-md-12">
               <div class="row">
                  <div class="col-sm-12 form-group">
                    <label>Sample Name</label>
                    <input type="text" name="sample_name" placeholder="Enter Sample Name" class="form-control" required pattern="[A-zÀ-ž&\s]+">
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
              <b>Sample Information</b> <?php include'MessageAlert.php'; ?>
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
              <a class="btn btn-success pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal'>Add Sample</a>
            </div>
            <div class="card-body">
             <table class="table   table-striped table-hover" id="tbl-samples">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Sample</th>
                  <th>Action</th>
                </tr>
              </thead>
                <tbody>
                  <?php 
                  $count=1;
                foreach ($samples as $key => $sample) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?= $count++ ?></td>
                    <td><?= $sample->sample_name; ?></td>
                    <td>
                   <a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal<?=$key?>'> <span class="badge bg-success"> <i class="fa fa-pencil-square-o "></i> edit</span></a> 
                   <a  onclick="return confirm('Are you sure to delete?');" href='<?= base_url('Pagescontroller/deleteSample/'.$sample->sample_id); ?>'> <span class="badge bg-danger"><i class="fa fa-trash"></i> Remove</span></a>
                    </td>
<!--  The Updation Modal -->
<div class="modal" id="myModal<?= $key ?>">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update sample</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('Pagescontroller/updateSampleRecord'); ?>" method="post"> 
        <div class="box-body">
          <div class="row"> 
            <div class="col-md-12">
               <div class="row">
                  <div class="col-sm-12 form-group">
                    <label>Sample Name</label>
                    <input type="text" value="<?= $sample->sample_name;?>" name="sample_name" placeholder="Enter Sample" class="form-control" required>
                    <input type="hidden" value="<?= $sample->sample_id;?>" name="sample_id">
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

$('#tbl-samples').DataTable({
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
                    columns: [ 0,1 ]
                }
            }
        ]
})
  })
</script>