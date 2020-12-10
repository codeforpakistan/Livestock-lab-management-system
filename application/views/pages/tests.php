<div class="content-wrapper">
    <section class="content-header">
      <h1>
      <!--  Test Information -->
        
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
        <h4 class="modal-title">Assign New Test</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('Pagescontroller/AddTest'); ?>" method="post"  enctype="multipart/form-data" >
        <div class="box-body">
          <div class="row"> 
            <div class="col-md-12">
               <div class="row">
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
                      <?php 
                    foreach ($stations as $station) {
                      # code...
                      ?>
                      <option  value="<?php echo $station->center_station_id; ?>"><?php echo $station->center_station_name; ?></option>
                      <?php 
                    }

                     ?>
                     </select>
                    </div>
                    <div class="col-sm-6 form-group">
                  <label for="location">Section</label>
                  <select class="form-control section_id" onchange="GetLabs(this.value)" name="section_id"  style="width: 100%" required>
                  <option  value="">-select-</option>
                  </select>
                </div>
                  <div class="col-sm-6 form-group">
                    <label>Test Labs</label>
                     <select class="form-control lab_id" style="width: 100% !important" name="lab_id" required pattern="[a-zA-Z]+">
                    <option  value="">-select-</option>
                  </select>
                    </div>
                   <div class="col-sm-6 form-group">
                    <label>Test Name</label>
                    <select class="form-control testItemFee" style="width: 100% !important" name="testHelp_id" required="required">
                      <option value="">-Select-</option>
                      <?php 
                        foreach ($testItems as $Items) {
                      ?>
                          <option value="<?php echo $Items->testHelp_id; ?>"><?php echo $Items->testHelp_name; ?></option>
                      <?php 
                        }

                      ?>
                  </select>
                    </div>
                    <div class="col-sm-6 form-group">
                    <label>Test Fee</label>
                    <input type="number" name="test_fee"  onBlur="if(this.value < 1) { this.value = '0.00';}else{ this.value.tofixed(2); }" value="0.00"  placeholder="Enter Test Fee" class="form-control testHelp_Itemfee testPrice" >
                    </div>
                  
                    <div class="col-sm-6 form-group">
                    <label>Description</label>
                    <textarea name="test_desc" class="form-control" pattern="[A-zÀ-ž&\s]+"></textarea>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>Assign Samples</label>
                         <select class="form-control select2" style="width: 100% !important" name="sample_id[]" required="required" multiple="multiple">
                            <option value="">-Select-</option>
                            <?php 
                              foreach ($samples as $sample) {
                            ?>
                                <option value="<?php echo $sample->sample_id; ?>"><?php echo $sample->sample_name; ?></option>
                            <?php 
                              }

                            ?>
                        </select>
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
               <b>Test Information</b><?php include'MessageAlert.php'; ?>
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
                    <a class="btn btn-success pull-right"  data-backdrop="static" style="margin-left: 10px;"  data-keyboard="false" data-toggle="modal" href='#myModal'>Assign New Test</a>
                    <a href="<?= base_url('Pagescontroller/testItems') ?>"  class="btn btn-success pull-right">Edit Fees</a>&nbsp;&nbsp; &nbsp;
            </div>
            <div class="card-body">
             <table class="table   table-striped table-hover" id="tbl-tests">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Test</th>
                  <th>Lab</th>
                  <th>Charges</th>
                  <th>Action</th>
                </tr>
              </thead>
                <tbody id="t_body">
                  <?php 
                  if(!empty($tests))
                  {

                foreach ($tests as $key => $test) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?= $test->test_id; ?></td>
                    <td><?= $test->testHelp_name; ?></td>
                    <td><?= $test->lab_name; ?></td>
                    <td><?= number_format($test->test_fee,2); ?></td>
                    <td>
                   <a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal<?=$key?>'><span class="badge bg-success"> <i class="fa fa-pencil-square-o "></i> edit</span></a>
                   <!-- <a  onclick="return confirm('Are you sure to delete?');" href='<?// base_url('Pagescontroller/deleteTest/'.$test->test_id); ?>'> <span class="badge bg-danger"><i class="fa fa-trash"></i>Remove</span></a> -->
                    </td>
<!--  The Updation Modal -->
<div class="modal" id="myModal<?= $key ?>">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Test</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('Pagescontroller/updateTestRecord'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="test_id" value="<?= $test->test_id; ?>">
        <div class="box-body">
          <div class="row"> 
            <div class="col-md-12">
               <div class="row">
                <div class="col-sm-6 form-group">
                    <label> Directorates</label>
                    <select class="form-control directorate_id" onchange="GetStations(this.value)"  name="directorate_id"  style="width: 100%" required>
                    <option  value="">-select-</option>
                    <?php 
                    
                    foreach ($directorates as $directorate) {
                      # code...
                      ?>
                      <option  <?php if($directorate->directorate_id==$test->directorate_id){ echo "selected";} ?>  value="<?php echo $directorate->directorate_id; ?>"><?php echo $directorate->directorate_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                  <div class="col-sm-6 form-group">
                    <label> Center/Station</label>
                    <select class="form-control center_station_id" onchange="GetSections(this.value)"  name="center_station_id"  style="width: 100%" required>

                      <?php 
                       $stations = $this->API_m->getRecordWhere('center_station',['directorate_id' => $test->directorate_id]);
                    foreach ($stations as $station) {
                      # code...
                      ?>
                      <option <?php if($station->center_station_id==$test->center_station_id){ echo "selected";} ?> value="<?php echo $station->center_station_id; ?>"><?php echo $station->center_station_name; ?></option>
                      <?php 
                    }

                     ?>
                     </select>
                    </div>
                    <div class="col-sm-6 form-group">
                  <label for="location">Section</label>
                  <select class="form-control section_id"  name="section_id" onchange="GetLabs(this.value)"  style="width: 100%" required>
                    <?php 
                      $sections = $this->API_m->GetSectionsItems($test->center_station_id);
                    foreach ($sections as $section) {
                      # code...
                      ?>
                      <option <?php if($section->section_id==$test->section_id){ echo "selected";} ?> value="<?php echo $section->section_id; ?>"><?php echo $section->sectionHelp_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                </div>
                  <div class="col-sm-6 form-group">
                    <label>Test Lab</label>
                     <select class="form-control lab_id" style="width: 100% !important" name="lab_id" required>
                    <option value="">-Select-</option>
                    <?php 
                    $labs = $this->API_m->getRecordWhere('labs',['section_id' => $test->section_id]);
                      foreach ($labs as $lab) {
                    ?>
                        <option <?php if($lab->lab_id==$test->lab_id){ echo "selected"; } ?> value="<?php echo $lab->lab_id; ?>"><?php echo $lab->lab_name; ?></option>
                    <?php 
                      }

                    ?>
                  </select>
                    </div>
                   <div class="col-sm-6 form-group">
                    <label>Test Name</label>
                     <select class="form-control utestHelp_id" onchange="GetTestFee(this);"  style="width: 100% !important" name="testHelp_id" required="required">
                      <option value="">-Select-</option>
                      <?php 
                        foreach ($testItems as $Items) {
                      ?>
                          <option <?php if($Items->testHelp_id==$test->testHelp_id){ echo "selected"; } ?> value="<?php echo $Items->testHelp_id; ?>"><?php echo $Items->testHelp_name; ?></option>
                      <?php 
                        }

                      ?>
                  </select>
                    </div>
                    <div class="col-sm-6 form-group">
                    <label>Test Fee</label>
                    <input type="hidden" class="Old_utestHelp_fee" value="<?= number_format($test->test_fee,2); ?>">
                    <input type="text" name="test_fee"  value="<?= number_format($test->test_fee,2); ?>" onBlur="if (this.value < 1) { this.value = '0.00';}else{ this.value.tofixed(2); }" placeholder="Enter Test Fee" class="form-control utestHelp_fee">
                    </div>
                  
                    <div class="col-sm-6 form-group">
                    <label>Description</label>
                    <textarea name="test_desc" class="form-control"> <?= $test->description; ?></textarea>
                    </div>
                     <div class="col-sm-12 form-group">
                        <label>Assign Samples</label>
                         <select class="form-control select2" style="width: 100% !important" name="sample_id[]"  multiple="multiple" required="required">
                            <?php 
                            $assignTests = $this->API_m->getRecordWhere('test_samples',['test_id'=>$test->test_id]);
                              foreach ($samples as $sample) {
                            ?>
                                <option
                                 <?php 
                                      if(!empty($assignTests))
                                      { 
                                        foreach($assignTests as $assign)
                                        {
                                          if($assign->sample_id == $sample->sample_id)
                                          {
                                            echo 'selected'; 
                                          }
                                        }
                                        
                                      }
                                  ?> 
                                 value="<?php echo $sample->sample_id; ?>">
                                 <?php echo $sample->sample_name; ?></option>
                            <?php 
                              }

                            ?>
                        </select>
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

$('#tbl-tests').DataTable({
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

