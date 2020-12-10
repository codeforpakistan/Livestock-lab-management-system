<div class="content-wrapper">
    <section class="content-header">
      <h1>
       <!-- Test Section Information -->
        
      </h1>
     
    </section>


    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button> -->


<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Test Section</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Pagescontroller/Addtest_section') ?>" method="post">
        <div class="box-body">
          <div class="row">
                    <div class="col-sm-12 form-group">
                    <label> Directorate</label>
                    <select class="form-control directorate_id" onchange="GetStations(this.value)"  name="directorate_id"  style="width: 100%" required>
                    <option  value="">-select-</option>
                    <?php 
                    
                    foreach ($directorates as $directorate) {
                      # code...
                      ?>
                      <option  value="<?php echo $directorate->directorate_id; ?>"><?php echo $directorate->directorate_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Center/Station</label>
                    <select class="form-control center_station_id"   name="center_station_id"  style="width: 100%" required>
                    <option  value="">-select-</option>
                     </select>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label>Section Name</label>
                   <select class="form-control" name="sectionHelp_id"  style="width: 100%" required>
                    <option  value="">-select-</option>
                    <?php 
                    
                    foreach ($sectionhelp as $items) {
                      # code...
                      ?>
                      <option  value="<?php echo $items->sectionHelp_id; ?>"><?php echo $items->sectionHelp_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                  </div>
                </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Save" id="rclass">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
              
              <b>Test Section Information</b><?php include'MessageAlert.php'; ?>
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
                  <a href="<?= base_url('Pagescontroller/sectionItems') ?>" style="margin-left:10px; "  class="btn btn-success pull-right">
                 Section Items
                </a>&nbsp;&nbsp;&nbsp;&nbsp;
               <a class="btn btn-success pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal'>Add Test Section</a>&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="card-body">
             <table class="table  table-striped table-hover" id="tbl-test-section">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Section</th>
                  <th>Center/Station</th>
                  <th>Directorate</th>
                  <th>Action</th>
                </tr>
                <tbody>
                  <?php 
                  $count=1;
                foreach ($testsection as $key => $testsection) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?php echo $count++ ?></td>
                    <td><?php echo $testsection->sectionHelp_name; ?></td>
                    <td><?php echo $testsection->center_station_name; ?></td>
                    <td><?php echo $testsection->directorate_name; ?></td>
                    <td><a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#testsection<?= $key; ?>'> <span class="badge bg-success"> <i class="fa fa-pencil-square-o "></i> edit</span></a> <a onclick="return confirm('Are you sure to delete?');"  href="<?= base_url('Pagescontroller/delete/'.$testsection->section_id);?>"><span class="badge bg-danger"><i class="fa fa-trash"></i> Remove</span></a></td>
<!-- The Modal -->
<div class="modal" id="testsection<?= $key; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Test Section</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Pagescontroller/testSectionUpdate') ?>" method="post">
        <div class="box-body">
                    <input type="hidden" name="section_id"  value="<?= $testsection->section_id; ?>">
                    <div class="col-sm-12 form-group">
                    <label> Directorate</label>
                    <select class="form-control  Updatedirectorate_id" onchange="GetStations(this.value)"   name="directorate_id"  style="width: 100%" required>
                    <option  value="">-select-</option>
                    <?php 
                    foreach ($directorates as $directorate) {
                      # code...
                      ?>
                      <option <?php if($directorate->directorate_id==$testsection->directorate_id){ echo "selected"; } ?>  value="<?php echo $directorate->directorate_id; ?>"><?php echo $directorate->directorate_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Center/Station</label>
                    <select class="form-control center_station_id"   name="center_station_id"  style="width: 100%" required>
                     <?php 
                       $stations = $this->API_m->getRecordWhere('center_station',['directorate_id' => $testsection->directorate_id]);
                    foreach ($stations as $station) {
                      ?>
                      <option <?php if($station->center_station_id==$testsection->center_station_id){ echo "selected"; } ?>  value="<?php echo $station->center_station_id; ?>"><?php echo $station->center_station_name; ?></option>
                      <?php 
                    }
                    ?>
                     </select>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label>Section Name</label>
                     <select class="form-control" name="sectionHelp_id"  style="width: 100%" required>
                    <option  value="">-select-</option>
                    <?php 
                    
                    foreach ($sectionhelp as $items) {
                      # code...
                      ?>
                      <option <?php if($items->sectionHelp_id==$testsection->sectionHelp_id){ echo "selected"; } ?>   value="<?php echo $items->sectionHelp_id; ?>"><?php echo $items->sectionHelp_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" > Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

$('#tbl-test-section').DataTable({
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
                    columns: [ 0,1,2,3 ]
                }
            }
        ]
})
  })
</script>