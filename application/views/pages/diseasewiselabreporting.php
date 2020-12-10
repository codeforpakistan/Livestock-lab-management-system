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
              <b>Test Type wise Reports</b> <?php include'MessageAlert.php'; ?>
                <form action="<?php echo base_url('Reports/diseases') ?>" method="post">
                  <label>Test Name</label>
                  <select name="testHelp_id" id="testHelp_id" class="form-control">
                     <option value="">-- Select test name --</option>
                    <?php 
                    $disease = $this->db->get("testhelp")->result();
                        foreach ($disease as $diseases) {
                          # code...
                       ?>
                    <option value="<?php echo $diseases->testHelp_id ?>"><?php echo $diseases->testHelp_name ?></option>
                    <?php  }
                     ?>
                  </select>
              
                 
                 
                  <input type="submit" id="">
                </form>

                
                  <div class="row">
                    <div class="col-md-6">
                        <kbd class=""><?php echo count($records); ?><kbd> 
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
             <table class="table  table-striped table-hover" id="tbl-anti">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Test Name</th>
                  <th>Lab</th>
                  <th>Section</th>
                  <th>Center Station</th>
                  <th>Received date</th>
                  <th>Current Date</th>
                  <th>Total Days of Pendency</th>
                  <th>Status</th>
                </tr>
                <tbody class="pendingdata">
                  <?php 
                  $count=1;
                  //var_dump($records);
                  if(!empty($records))
                  {
                  foreach ($records as $key => $rec) {
                     $current_date = date('d-m-Y');
                    $received_date  = date('d-m-Y',strtotime($rec->received_date));

                ?>
                  <tr style="background-color: <?php if($current_date==$received_date){ echo 'red'; } ?>">
                    <td><?=  $rec->testDetails_id;   ?></td>
                   
                    <td>
                      
                        <?=  $rec->testHelp_name;        ?>
                      </td>
                    <td><?=  $rec->lab_name;   ?></td>
                    <td><?=  $rec->sectionHelp_name;   ?></td>
                    <td><?=  $rec->center_station_name;   ?></td>
                    <td><?=  date('M d Y',strtotime($rec->received_date));    ?></td>
                    <td><?=  date('M d Y');      ?></td>
                    <td>
                    <?php 
                    
                      $todate =  time();
                      $dbdate = strtotime($rec->received_date);
                      $day_diff = $todate - $dbdate;
                      $pendency =  floor($day_diff/(60*60*24));
                      if($rec->post_status==0 && $rec->is_cancel==0)
                      {
                         echo $pendency." days";
                      }
                     
                     ?>
                    <td>
                    <?php 
                     $status      = '';
                     $color       = '';
                      if($rec->post_status==0 && $rec->is_cancel==0)
                      {
                        $status      = 'IN PROGRESS';
                        $color       = 'warning';
                      }else if($rec->post_status==0 && $rec->is_cancel==1)
                      {
                        $status      = 'CANCELLED';
                        $color       = 'danger';
                      }else if($rec->post_status==1 && $rec->is_cancel==0)
                      {
                        $status      = 'COMPLETED';
                        $color       = 'success';
                      }
                     ?>
                     <span class="badge bg-<?= $color; ?>" style="font-color: white;"><?= $status; ?></span>
                                        </td>
                                        
                                      </tr>
                                      <?php  
                                    }
                    }
                   ?>
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


 <script type="text/javascript">
 // first_date
//load

$(document).ready(function() {
    var center_station_labs;
  $("#center_id").change(function(event) {
     $("#labs").empty();
    center_station_labs = $(this).val();
    $.ajax({
     url: "<?php echo base_url('Reports/centr_wise_data'); ?>",
       type: 'POST',
      
       data: {center_station_labs: center_station_labs},
    })
    .done(function(j) {
      console.log(j);
        var json = JSON.parse(j);
       console.log(json);
       $.each(json, function(index, val) {
          /* iterate through array or object */
          var option = `<option value="${val.lab_id}"> ${val.lab_name}</option>`;
          $("#labs").append(option);
       });
        $("#labs").prepend(`<option value="all"> All Lbs </option>`);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
   });

var center_id ,labs_id;
   $("#load").click(function(event) {
     /* Act on the event */
     event.preventDefault();

    $(".export").attr('disabled', false);
    $("#tbl-pendency").dataTable().fnDestroy();
    $(".datewisedata").empty();

     var status;
     var color;
      center_id = $("#center_id").val();
      labs_id = $("#labs").val();
     // alert("ok");
     $.ajax({
       url: "<?php echo base_url('Reports/pending_test_ajax'); ?>",
       type: 'POST',
      
       data: {center_id: center_id,labs_id:labs_id},
     })
     .done(function(j) {
      var json = JSON.parse(j);
      //alert(json.length);
      //alert(json);
      console.log(json.length);
      $(".counttest").html("Total test Conduct "+json.length);
       console.log(json);
       $.each(json, function(index, val) {
          /* iterate through array or object */
          console.log(val);
          if(val.post_status==0 && val.is_cancel==0){
            status="IN PROGRESS";
            color="warning"
          }
          else if(val.post_status==0 && val.is_cancel==1){
              status      = 'CANCELLED';
              color       = 'danger';
           }
           else if(val.post_status==1 && val.is_cancel==0){
              status      = 'POSTED';
              color       = 'success';
           }
          var table = `<tr><td>${val.testDetails_id}</td><td>${val.client_name}</td><td>${val.client_contact}</td> <td>${val.cattle_name}</td><td>${val.cattle_tag_no}</td><td>${val.testHelp_name}</td><td>${val.sample_name}</td><td>${val.test_total_fee}</td><td>${val.received_date}</td><td>${val.result_date}</td><td><span class="badge bg-${color}"> ${status}</td></tr>`;
          $(".datewisedata").append(table);
       });
       $('#tbl-anti').DataTable({
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
                              columns: [ 0,1,2,3,4,5,6,7,8,9,10]
                          }
                      }
                  ]
          })

     })
     .fail(function() {
       console.log("error");
       alert("error");
     })
     .always(function() {
       console.log("complete");
     });
     
   });
   });
 </script>
   
   
<script>

</script>




<script>
  $(document).ready(function(){

$('#tbl-anti').DataTable({
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
                    columns: [ 0,1 ,2,3,4,5,6,7,8]
                }
            }
        ]
})
  })
</script>



