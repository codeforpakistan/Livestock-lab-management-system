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
              <b> All Test Records</b>
                <form action="<?php echo base_url('Reports/dwisereporting') ?>" method="post">
                  <label for="from">From</label>
                  <input type="date" name="first_date" id="first_date">
                  <label for="to">To</label>
                  <input type="date" name="second_date" id="second_date">
                  <input type="submit" id="load">
                </form>
               <?php include'MessageAlert.php'; ?>
         <div class="row">
                    <div class="col-md-6">
                       <kbd class="counttest"><kbd>
                    </div>
                    <div class="col-md-6">
                    <button style="margin-left:10px; " type="button" class="btn export btn-success pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-download"></i>Export</button>
                  <ul class="dropdown-menu" x-placement="bottom-start" style=" transform: translate3d(0px, 48px, 0px);  will-change: transform;">
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
             <table class="table  table-striped table-hover" id="tbl-date-rep">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Client</th>
                  <th>Contact</th>
                  <th>Cattle</th>
                  <th>Tag#</th>
                  <th>Test</th>
                  <th>Sample</th>
                  <th>Fee</th>
                  <th>Received</th>
                  <th>Result</th>
                  <th>Status</th>
                  <!-- <th>Action</th> -->
                </tr>
                <tbody class="datewisedata">
                  
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
 $this->load->view('template_parts/footer');
 ?>

 <script type="text/javascript">
 // first_date
//load
 $(document).ready(function(){

var first_date,second_date ;
   $("#load").click(function(event) {
     /* Act on the event */
     event.preventDefault();
    $(".export").attr('disabled', false);
    $("#tbl-date-rep").dataTable().fnDestroy();
    $(".datewisedata").empty();
   
    
     var status;
     var color;
     first_date = $("#first_date").val();
     second_date = $("#second_date").val();
     alert("ok");
     $.ajax({
       url: "<?php echo base_url('Reports/dwisereporting'); ?>",
       type: 'POST',
      
       data: {first_date: first_date,second_date:second_date},
     })
     .done(function(j) {
      var json = JSON.parse(j);
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
       $('#tbl-date-rep').DataTable({
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
     })
     .always(function() {
       console.log("complete");
     });
     
   });
 });
 </script>
   
   
<script>
  $(document).ready(function(){

// $('#tbl-date-rep').DataTable({
// "paging": true,


// "lengthChange": true,
// "searching": true,
// "ordering": true,
// "info": true,
// "autoWidth": true,

//  "order": [[ 0, "desc" ]],
//     'dom'        : 'Bfrtipl',
//       buttons: [
//             'copy', 'csv', 'excel', 'pdf', 
//             {
//                 extend: 'print',
//                 exportOptions: 
//                 {
//                     columns: [ 0,1,2,3,4,5,6,7,8,9,10 ]
//                 }
//             }
//         ]
// })
  })
   $("th").click(function(event) {
    
   });
</script>


