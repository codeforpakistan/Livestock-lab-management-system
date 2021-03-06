
<?php
date_default_timezone_set('Asia/Karachi');
// echo   $current_date = date('d-m-Y');;
// echo "<pre>";
// print_r($records);
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
              <b>Full Report</b> <?php include 'MessageAlert.php';?>
                <form action="<?php echo base_url('Reports/fullReport') ?>" method="post">
                   <div class="form-row">
    <div class="col">
      <label for="from">From date:</label>
      <input type="date" class="form-control" id="first_date" name="first_date">
    </div>
    <div class="col">
      <label for="to">To date:</label>
      <input type="date" class="form-control" id="second_date" name="second_date">
    </div>
  </div>

 <div class="row">


              
               <div class="col-sm-2 form-group">
                    <label>Source Type</label>
                     <select class="form-control" id="client_type" onchange="GetClientType(this.value)" style="width: 100% !important"  name="client_type" required>
                        <option value="">-Select-</option>
                        <option value="farmer">Farmer</option>
                        <option value="own_dept">Own Departmentt</option>
                        <option value="other_dept">Other Department</option>
                      </select>
                 </div>

                    <div class="col-sm-3 form-group">
                    <label> Directorates</label>
                    <select class="form-control directorate_id" onchange="GetStations(this.value)"  name="directorate_id" id="directorate_id"  style="width: 100%" >
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
                  <div class="col-sm-3 form-group">
                    <label> Center/Station</label>
                    <select class="form-control center_station_id" onchange="GetSections(this.value)"  name="center_station_id" id="center_station_id"  style="width: 100%" >
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
                    <div class="col-sm-3 form-group">
                  <label for="location">Section</label>
                  <select class="form-control section_id" onchange="GetLabs(this.value)" name="section_id"  style="width: 100%">
                  <option  value="">-select-</option>
                  </select>
                </div>
                  <div class="col-sm-12 form-group">
                    <label>Labs</label>
                     <select class="form-control lab_id" id="lab_id" style="width: 100% !important" name="lab_id"  pattern="[a-zA-Z]+">
                    <option  value="">-select-</option>
                  </select>
                    </div>

                    <div class="col-md-3">
                         <label>Districts:</label>
                  <select name="district_id" id="district_id" class="form-control">
                     <option value="">-- Select districts --</option>
                     <option value="all">Select all</option>
                    <?php
$district = $this->db->get("districts")->result_array();
foreach ($district as $districts) {
  # code...
  ?>
                    <option value="<?php echo $districts['district_id'] ?>"><?php echo $districts['district_name'] ?></option>
                    <?php }
?>
                  </select>
                    </div>
                    <div class="col-md-3 form-group">
                         <label>Tehsil:</label>
                  <select name="tehsil_id" id="tehsil_id" class="form-control" disabled>


                  </select>
                    </div>

                    <div class="col-md-3 form-group">
                         <label>Uc:</label>
                  <select name="UC_id" id="UC_id" class="form-control">
                     
                    <?php 
                    $client=$this->db->get("client_info")->result_array();
                        foreach ($client as $clients) {
                          # code...
                       ?>
                    <option value="<?php echo $clients['client_id'] ?>"><?php echo $clients['client_vil_uc_area'] ?></option>
                    <?php  }
                     ?>
                  </select>
                    </div>
                   
                    <div class="col-md-4 form-group">
                         <label>Animal Type:</label>
                  <select name="cattle_id" id="cattle_id" class="form-control">
                     <option value="">-- Select Animal type --</option>
                    <?php 
                      $Animal=$this->db->get("cattles")->result_array();
                        foreach ($Animal as $Animals) {
                          # code...
                       ?>
                    <option value="<?php echo $Animals['cattle_id'] ?>"><?php echo $Animals['cattle_name'] ?></option>
                    <?php  }
                     ?>
                  </select>
                    </div>
                    <div class="col-md-3 form-group">
                         <label>Breed:</label>
                  <select name="breed_id" id="breed_id" class="form-control">
                     <option value="">-- Select Breed--</option>
                    <?php 
                      $breeds=$this->db->get("breeds")->result_array();
                        foreach ($breeds as $breedsS) {
                          # code...
                       ?>
                    <option value="<?php echo $breedsS['breed_id'] ?>"><?php echo $breedsS['breed_name'] ?></option>
                    <?php  }
                     ?>
                  </select>
                    </div>
                    <div class="col-md-3 form-group">
                         <label>Sex:</label>
                  <select name="sex_id" id="sex_id" class="form-control">
                     <option value="">-- Select Sex--</option>
                    <?php 
                      $testdetails=$this->db->get("testdetails")->result_array();
                        foreach ($testdetails as $testdetailsS) {
                          # code...
                       ?>
                    <option value="<?php echo $testdetailsS['testDetails_id'] ?>"><?php echo $testdetailsS['cattle_sex'] ?></option>
                    <?php  }
                     ?>
                  </select>
                    </div>
                    <div class="col-md-3 form-group">
                         <label>Age:</label>
                  <select name="cattle_id" id="cattle_id" class="form-control">
                     <option value="">-- Select Sex--</option>
                    <?php 
                      $testdetai=$this->db->get("testdetails")->result_array();
                        foreach ($testdetai as $testdetais) {
                          # code...
                       ?>
                    <option value="<?php echo $testdetais['testDetails_id'] ?>"><?php echo $testdetais['cattle_year'] ?></option>
                    <?php  }
                     ?>
                  </select>
                    </div>
                    <div class="col-md-4 form-group">
                         <label>Test Type:</label>
                   <select class="form-control testHelp_id" id="test_id" style="width: 100% !important" onchange="GetSample()" name="test_id">
                        <option value="">-Select-</option>
                        <?php 
                          if(!empty($tests))
                          {

                          foreach ($tests as $test) {
                        ?>
                            <option value="<?php echo $test->test_id; ?>"><?php echo $test->testHelp_name; ?></option>
                        <?php 
                           }
                          }

                        ?>
                      </select>
                    </div>
                    <div class="col-md-4 form-group">
                         <label>Sample:</label>
                   <select class="form-control " id="test_sample_id" style="width: 100% !important" name="sample_id">
                          <option value="">-select-</option>
                        </select>
                    </div> 
                    <div class="col-md-4 form-group">
                         <label>Result:</label>
                   <select class="form-control " id="test_sample_id" style="width: 100% !important" name="sample_id">
                          <option value="">-select-</option>
                        </select>
                    </div>
                    
                  </div>
                 
  
                  </div>
                    
                  </div>



                  <button type="submit" value="submit" name="submit" class="btn btn-success  btn-sm">submit</button>
                </form>


                  <div class="row">
                    <div class="col-md-6">
                        <kbd class="counttest"><kbd>
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
             <table class="table table-hover table-condenced " id="tbl-detail">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>dept_name</th>
                  <th>Directorates</th>
                  <th>Center/Station</th>
                  <th>Section</th>
                  <th>Test Labs</th>
                  <th>Sample Date</th>
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
                  <th>Test</th>
                  <th>Fee</th>
                  <th>Result Date</th>
                   <th>Status</th>
                </tr>
                <tbody class="pendingdata">
                 <?php
if ($lab_wise_labreporting == "null") {

} else {
  $i = 1;foreach ($lab_wise_labreporting as $lab_wise_labreportingInfo) {
    ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <?php $getTest = $this->reports_model->getRecordByArray('tests', array('test_id' => $lab_wise_labreportingInfo['test_id']));?>

                   <?php $getClient = $this->reports_model->getRecordByArray('client_info', array('client_id' => $lab_wise_labreportingInfo['client_id']));?>
                  <td><?php echo $getClient['dept_name']; ?></td>

                  <?php $getDirectorate = $this->reports_model->getRecordByArray('directorates', array('directorate_id' => $getTest['directorate_id']));?>
                  <td><?php echo $getDirectorate['directorate_name']; ?></td>

                  <?php $getCenterStation = $this->reports_model->getRecordByArray('center_station', array('center_station_id' => $getTest['center_station_id']));?>
                  <td><?php echo $getCenterStation['center_station_name']; ?></td>

                  <?php $getSection = $this->reports_model->getRecordByArray('sectionhelp', array('sectionHelp_id' => $getTest['section_id']));?>
                  <td><?php echo $getSection['sectionHelp_name']; ?></td>

                  <?php $getLab = $this->reports_model->getRecordByArray('labs', array('lab_id' => $getTest['lab_id']));?>
                  <td><?php echo $getLab['lab_name']; ?></td>

                  <td><?php echo $lab_wise_labreportingInfo['received_date']; ?></td>

                  <?php $getClient = $this->reports_model->getRecordByArray('client_info', array('client_id' => $lab_wise_labreportingInfo['client_id']));?>
                  <td><?php echo $getClient['client_name']; ?></td>
                  <td><?php echo $getClient['client_contact']; ?></td>

                  <?php $getDistrcit = $this->reports_model->getRecordByArray('districts', array('district_id' => $getClient['district_id']));?>
                  <td><?php echo $getDistrcit['district_name']; ?></td>

                  <?php $getTehsil = $this->reports_model->getRecordByArray('tehsil', array('tehsil_id' => $getClient['tehsil_id']));?>
                  <td><?php echo $getTehsil['tehsil_name']; ?></td>

                  <td><?php echo $getClient['client_vil_uc_area']; ?></td>

                  <?php $getCattle = $this->reports_model->getRecordByArray('cattles', array('cattle_id' => $lab_wise_labreportingInfo['cattle_name']));?>
                  <td><?php echo $getCattle['cattle_name']; ?></td>

                  <?php $getCattleBreed = $this->reports_model->getRecordByArray('breeds', array('breed_id' => $lab_wise_labreportingInfo['cattle_breed']));?>
                  <td><?php echo $getCattleBreed['breed_name']; ?></td>

                  <td><?php echo $lab_wise_labreportingInfo['cattle_sex']; ?></td>
                  <td><?php echo $lab_wise_labreportingInfo['cattle_year'] . ' Year(s)' . ' ' . $lab_wise_labreportingInfo['cattle_month'] . ' Month(s)'; ?></td>

                  <?php $getSamples = $this->reports_model->getRecordByArray('samples', array('sample_id' => $lab_wise_labreportingInfo['sample_id']));?>
                  <td><?php echo $getSamples['sample_name']; ?></td>

                  <?php $getTestHelp = $this->reports_model->getRecordByArray('testhelp', array('testHelp_id' => $lab_wise_labreportingInfo['test_id']));?>
                  <td><?php echo $getTestHelp['testHelp_name']; ?></td>

                  <td><?php echo $lab_wise_labreportingInfo['test_total_fee']; ?></td>
                  <!-- <td><?php echo $lab_wise_labreportingInfo['post_status']; ?></td> -->
                  <?php
$status = '';
    $color = '';
    if ($lab_wise_labreportingInfo['post_status'] == 1) {
      $status = 'IN PROGRESS';
      $color = 'warning';
    } else if ($lab_wise_labreportingInfo['post_status'] == 0) {
      $status = 'CANCELLED';
      $color = 'danger';
    } else if ($lab_wise_labreportingInfo['post_status'] == 2) {
      $status = 'POSTED';
      $color = 'success';
    }
    ?>

 <td><span class="badge bg-<?=$color;?>" style="font-color: white;"><?=$status;?></span></td>

                  <td>Result</td>
                </tr>


  <?php $i++;}
}
?>
                </tbody>

            </table>

              </thead>

              

            </table>
          </div>

        </div>
      </div>
      </div>
      <!-- /.row -->
    </section>

</div>



 <?php
if (!empty($records)) {
	foreach ($records as $key => $rec) {
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

$('#tbl-detail').DataTable({
"paging": true,
"lengthChange": true,
"searching": true,
"ordering": true,
"info": true,
"autoWidth": true,
"columnDefs": [ {
"targets": 0,
"orderable": false
} ],
 // "order": [[ 1, "desc" ]],
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

