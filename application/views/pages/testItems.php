<div class="content-wrapper">
    <section class="content-header">
      <h1>
       <!-- Cattle Information -->
        
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
        <h4 class="modal-title">Add Test Name</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Pagescontroller/AddTestItem') ?>" method="post">
        <div class="box-body">
                    <div class="col-sm-12 form-group">
                    <label>Name</label>
                    <input type="text" name="testHelp_name" placeholder="Enter Test item Name" class="form-control" required>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label>Fee</label>
                    <input type="text" name="testHelp_fee" placeholder="Enter Test item Fee" class="form-control" required >
                    </div>
                     <div class="col-sm-12 form-group">
                    <label>Disease/Research</label>
                    <select class="form-control" name="disease_or_research" required>
                      <option value="">-select-</option>
                      <option value="Disease">Disease</option>
                      <option value="Research">Research</option>
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
              
             <b>Test Name Information</b><?php include'MessageAlert.php'; ?>
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
               <!-- <a class="btn btn-success pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal'>Add New</a> -->
                <a class="btn btn-success pull-right" href="<?= base_url('Pagescontroller/test_types') ?>" >Assign New Test</a>
            </div>
            <div class="card-body">
             <table class="table  table-striped table-hover" id="tbl-test-items">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Test Name</th>
                  <th>Test Fee</th>
                  <th>Disease/Research</th>
                  <th>Action</th>
        
                </tr>
                <tbody>
                  <?php 
                  $count=1;
                foreach ($testItems as $key => $Items) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?php echo $count++ ?>     </td>
                    <td><?php echo $Items->testHelp_name; ?>        </td>
                    <td><?php echo $Items->testHelp_fee; ?>         </td>
                    <td><?php echo $Items->disease_or_research; ?>  </td>
                    <td><a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#items<?= $key; ?>'> <span class="badge bg-success"> <i class="fa fa-pencil-square-o "></i> edit</span></a></td>
<!-- The Modal -->
<div class="modal" id="items<?= $key; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Test Name</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Pagescontroller/testItemUpdate') ?>" method="post">
                    <input type="hidden" name="testHelp_id"  value="<?= $Items->testHelp_id; ?>">
        <div class="box-body">
                    <div class="col-sm-12 form-group">
                    <label>Name</label>
                    <input type="text" name="testHelp_name" placeholder="Enter Test Item Name" class="form-control" value="<?= $Items->testHelp_name; ?>">
                    </div>
                     <div class="col-sm-12 form-group">
                    <label>Fee</label>
                    <input type="text" name="testHelp_fee" placeholder="Enter Test Item Fee" class="form-control" value="<?= $Items->testHelp_fee; ?>">
                    </div>
                    <div class="col-sm-12 form-group">
                       <label>Disease/Research</label>
                        <select class="form-control" name="disease_or_research" required>
                          <option value="">-select-</option>
                          <option <?php if($Items->disease_or_research=='Disease'){ echo "selected"; } ?> value="Disease">Disease</option>
                          <option <?php if($Items->disease_or_research=='Research'){ echo "selected"; } ?> value="Research">Research</option>
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

$('#tbl-test-items').DataTable({
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