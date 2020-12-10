
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
              <b>DistrictS Test Report</b> <?php include'MessageAlert.php'; ?>
                <form action="<?php echo base_url('Reports/districtlabsreports') ?>" method="post">
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
                    <div class="col-md-3">
                         <label>Tehsil:</label>
                  <select name="tehsil_id" id="tehsil_id" class="form-control" disabled>
                     
                      
                  </select>
                    </div> 
                    <div class="col-md-3">
                         <label>Test Type:</label>
                  <select class="form-control testHelp_id" id="test_id" style="width: 100% !important" onchange="GetSample()" name="test_id" required>
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
                   
                  </div>
              
                 
                 
                  <input type="submit" id="">
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
             <table class="table table-hover table-condenced " id="tbl-dist">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>District</th>
                  <th>Tehsil</th>
                  <th>Total Test</th>
                  <th>count</th>
                  <th>IN PROGRESS </th>
                  <th>COMPLETED</th>
                  <th>Cancelled </th>
                  
                </tr>
                <tbody class="pendingdata">
                 
                </tbody>
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
                    columns: [ 0,1,2 ]
                }
            }
        ]
})
  })
</script>

