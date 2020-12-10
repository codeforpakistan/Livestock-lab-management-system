
<?php
date_default_timezone_set('Asia/Karachi');
// echo   $current_date = date('d-m-Y');;
  // echo "<pre>";
  // print_r($districtreports);
  // exit();
?>

<div class="content-wrapper">
    <section class="content-header">
    </section>
<!-- The Registeration Modal -->
    <!-- Main content -->
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header with-border">
              <b>Sample Test Report</b> <?php include'MessageAlert.php'; ?>
                <form action="<?php echo base_url('Reports/samplereports') ?>" method="post">
                   <div class="form-row">
    <div class="col">
      <label for="from">From date:</label>
      <input type="date" class="form-control" id="first_date">
    </div>
    <div class="col">
      <label for="to">To date:</label>
      <input type="date" class="form-control" id="second_date">
    </div>
  </div>
                  
 <div class="row">

                    

                     <div class="col-sm-3 form-group">
                    <label>Source Type</label>
                     <select class="form-control" id="client_type" onchange="GetClientType(this.value)" style="width: 100% !important"  name="client_type">
                        <option value="">-Select-</option>
                        <option value="">-Select all-</option>
                        <option value="farmer">Farmer</option>
                        <option value="own_dept">Own Departmentt</option>
                        <option value="other_dept">Other Department</option>
                      </select>
                 </div>

                    
                    <div class="col-md-3">
                         <label>Districts:</label>
                  <select name="district_id" id="district_id" class="form-control">
                     <option value="">-- Select districts --</option>
                     <option value="all">Select all</option>
                    <?php 
                    $district=$this->db->get("districts")->result_array();
                        foreach ($district as $districts) {
                          # code...
                       ?>
                    <option value="<?php echo $districts['district_id'] ?>"><?php echo $districts['district_name'] ?></option>
                    <?php  }
                     ?>
                  </select>
                    </div>

                    <div class="col-sm-6 form-group">
                    <label> Directorates</label>
                    <select class="form-control directorate_id" onchange="GetStations(this.value)"  name="directorate_id" id="directorate_id"  style="width: 100%" >
                    <option  value="">-select-</option>
                    <option value="">-Select all-</option>
                   
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
                    <select class="form-control center_station_id" onchange="GetSections(this.value)"  name="center_station_id" id="center_station_id"  style="width: 100%" >
                      <option  value="">-select-</option>
                      <option value="all"> Select all</option>
                      <!-- <option  value="">-select all-</option> -->
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
                  <select class="form-control section_id" onchange="GetLabs(this.value)" name="section_id"  style="width: 100%">
                  <option  value="">-select-</option>
                  <!-- <option  value="">-select all-</option> -->
                  </select>
                </div>
                  <div class="col-sm-6 form-group">
                    <label>Labs Name</label>
                     <select class="form-control lab_id" id="lab_id" style="width: 100% !important" name="lab_id"  pattern="[a-zA-Z]+">
                    <option  value="">-select-</option>
                   <!--  <option  value="">-select all-</option> -->
                  </select>
                    </div>


                     <div class="col-sm-3 form-group">
                        <label>Sample</label>
                        <select name="district_id" id="district_id" class="form-control">
                     <option value="">-- Select sample --</option>
                     <option value="all">Select all</option>
                    <?php 
                    $sample=$this->db->get("samples")->result_array();
                        foreach ($sample as $samples) {
                          # code...
                       ?>
                    <option value="<?php echo $samples['sample_id'] ?>"><?php echo $samples['sample_name'] ?></option>
                    <?php  }
                     ?>
                  </select>
                    </div>
                   
                   
                   
                  </div>
              <button type="submit" value="submit" name="submit" class="btn btn-success  btn-sm">submit</button>
              <br>
                </form>
                <div class="col-md-6">
                        <kbd class=""><?php  if ($districtreports == "null") {
                            echo "0";
                            } 
                            else{
                               echo count($districtreports); 
                            } ?><kbd> 
                    </div>

                
                  <div class="row">

                    <div class="col-md-6">
                       <!--  <kbd class=""><?php echo count($districtreports); ?><kbd>  -->
                    </div>
                    <div class="col-md-6">
                    <button style="margin-left:10px; " type="button" class="btn export btn-success pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
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
                    
                  </div>
                  </div>
             
            </div>
          <div class="box box-primary">
            <div class="table-responsive">
             <table class="table table-hover table-condenced " id="tbl-sample">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                
                  <th>Farmer</th>
                  <th>Contact</th>
                  <th>District</th>
                  <th>Tehsil</th>
                  <th>UC/Address</th>
                  <th>Animal</th>
                  <th>Breed</th>
                  <th>Sex</th>
                  <th>Age</th>
                  <th>Sample</th>
                  <th>Date</th>
                  <th>Test</th>
                  <th>Fee</th>
                  <th>Status</th>
                  <th>Result</th>
                </tr>
                <tbody class="pendingdata">
<?php
if ($districtreports == "null") {

} else {
  $i = 1;foreach ($districtreports as $districtreportsInfo) {?>
                <tr>
                  <td><?php echo $i; ?></td>
                  

                  <?php $getClient = $this->Reports_model->getRecordByArray('client_info', array('client_id' => $districtreportsInfo['client_id']));?>
                  <td><?php echo $getClient['type']; ?></td>
                  <td><?php echo $getClient['client_contact']; ?></td>

                  <?php $getDistrcit = $this->Reports_model->getRecordByArray('districts', array('district_id' => $getClient['district_id']));?>
                  <td><?php echo $getDistrcit['district_name']; ?></td>

                  <?php $getTehsil = $this->Reports_model->getRecordByArray('tehsil', array('tehsil_id' => $getClient['tehsil_id']));?>
                  <td><?php echo $getTehsil['tehsil_name']; ?></td>

                  <td><?php echo $getClient['client_vil_uc_area']; ?></td>

                  <?php $getCattle = $this->Reports_model->getRecordByArray('cattles', array('cattle_id' => $districtreportsInfo['cattle_name']));?>
                  <td><?php echo $getCattle['cattle_name']; ?></td>

                  <?php $getCattleBreed = $this->Reports_model->getRecordByArray('breeds', array('breed_id' => $districtreportsInfo['cattle_breed']));?>
                  <td><?php echo $getCattleBreed['breed_name']; ?></td>

                  <td><?php echo $districtreportsInfo['cattle_sex']; ?></td>
                  <td><?php echo $districtreportsInfo['cattle_year'] . ' Year(s)' . ' ' . $districtreportsInfo['cattle_month'] . ' Month(s)'; ?></td>

                  <?php $getSamples = $this->Reports_model->getRecordByArray('samples', array('sample_id' => $districtreportsInfo['sample_id']));?>
                  <td><?php echo $getSamples['sample_name']; ?></td>
                  <td><?php echo $districtreportsInfo['received_date']; ?></td>

                  <?php $getTestHelp = $this->Reports_model->getRecordByArray('testhelp', array('testHelp_id' => $districtreportsInfo['test_id']));?>
                  <td><?php echo $getTestHelp['testHelp_name']; ?></td>

                  <td><?php echo $districtreportsInfo['test_total_fee']; ?></td>
                  <?php 
 $status      = '';
 $color       = '';
  if($districtreportsInfo['post_status']==1)
  {
    $status      = 'IN PROGRESS';
    $color       = 'warning';
  }else if($districtreportsInfo['post_status']==0)
  {
    $status      = 'CANCELLED';
    $color       = 'danger';
  }else if($districtreportsInfo['post_status']==2)
  {
    $status      = 'POSTED';
    $color       = 'success';
  }
 ?>
 
 <td><span class="badge bg-<?= $color; ?>" style="font-color: white;"><?= $status; ?></span></td>
            
                  <td>Result</td>
                </tr>


  <?php $i++;}
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
     
</div>


  
 <?php
  if(!empty($records))
  {
  foreach($records as $key => $rec)
  {
?>

<?php
  }
}
 ?>


 




<script>
  $(document).ready(function(){
    $("#district_id").change(function(event) {
  /* Act on the event */
  event.preventDefault();
   $("#tehsil_id").empty();
    $("#tehsil_id").attr('disabled', false);;
  var district_id = $(this).val();
  $.ajax({
    url: '<?php echo base_url("Reports/district_tehsils") ?>',
    type: 'POST',
    data: {"district_id": district_id},
  })
  .done(function(j) {
   var json = JSON.parse(j);
       console.log(json);
       $.each(json, function(index, val) {
          /* iterate through array or object */
          var option = `<option value="${val.tehsil_id}"> ${val.tehsil_name}</option>`;
          $("#tehsil_id").append(option);
       });
        $("#tehsil_id").prepend(`<option value="all"></option>`);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
});

$('#tbl-dist').DataTable({
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
                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                }
            }
        ]
})
  })
</script>



<script>
  $(document).ready(function(){

$('#tbl-sample').DataTable({
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
                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                }
            }
        ]
})
  })
</script>