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
              <b> All Test Reports</b> <?php include'MessageAlert.php'; ?>
              <!-- <a class="btn btn-primary pull-right" href="<?= base_url('Tests/addNew_test'); ?>">Register New Test</a> -->
             <!--   <button style="margin-left:10px; " type="button" class="btn export btn-info pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false" disabled>
                    <i class="fa fa-download"></i>Export</button> -->
                  <form action="<?php echo base_url('Reports/dwisereporting') ?>" method="post">
                    <label>Center Station</label>
                    <select name="center_id" id="center_id" class="form-control">
                       <option value="">-- Select Center --</option>
                      <?php 
                          foreach ($center as $centers) {
                            # code...
                         ?>
                      <option value="<?php echo $centers['center_station_id'] ?>"><?php echo $centers['center_station_name'] ?></option>
                      <?php  }
                       ?>
                    </select>
                    <label for="">Labs</label>
                    <select name="" id="labs" class="form-control"></select>
                   
                    <input type="submit" id="load">
                  </form>
                   <div class="row">
                    <div class="col-md-6">
                       <kbd class="counttest"><kbd>
                    </div>
                    <div class="col-md-6">
                    <button style="margin-left:10px; " type="button" class="btn export btn-success pull-right dropdown-toggle" data-toggle="dropdown" aria-expanded="false" disabled>
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
             <table class="table  table-striped table-hover" id="tbl-all-test-rep">
              <thead>
                <tr class="bg-success">
                 <th>tracking#</th>
                  <th>Client/Owner</th>
                  <th>Contact</th>
                  <th>Animal</th>
                  <th>Tag#</th>
                  <th>Test</th>
                  <th>Sample/Specimen</th>
                  <th>Fee</th>
                  <th>Received On</th>
                  <th>Result On</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <tbody class="alltestdata">
                  <?php 
                  $count=1;
                  if(!empty($records))
                  {
                  foreach ($records as $key => $rec) {
                    $current_date = date('d-m-Y');
                    $result_date  = date('d-m-Y',strtotime($rec['testDetails']->result_date));

                ?>
                  <tr style="background-color: <?php if($current_date==$result_date){ echo 'red'; } ?>">
                    <td><?=  $rec['testDetails']->testDetails_id;   ?></td>
                    <td><?=  $rec['testDetails']->client_name;      ?></td>
                    <td><?=  $rec['testDetails']->client_contact;   ?></td>
                    <td><?=  $rec['testDetails']->cattle_name;      ?></td>
                    <td><?=  $rec['testDetails']->cattle_tag_no;    ?></td>
                    <td>
                      <a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal<?=$key?>'>
                        <?=  $rec['testDetails']->testHelp_name;        ?>
                      </a></td>
                    <td><?=  $rec['testDetails']->sample_name;      ?></td>
                    <td><?=  number_format($rec['testDetails']->test_total_fee,2);         ?></td>
                    <td><?=  date('M d Y',strtotime($rec['testDetails']->received_date));    ?></td>
                    <td><?=  date('M d Y',strtotime($rec['testDetails']->result_date));      ?></td>
                    <td>
<?php 
 $status      = '';
 $color       = '';
  if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==0)
  {
    $status      = 'IN PROGRESS';
    $color       = 'warning';
  }else if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==1)
  {
    $status      = 'CANCELLED';
    $color       = 'danger';
  }else if($rec['testDetails']->post_status==1 && $rec['testDetails']->is_cancel==0)
  {
    $status      = 'COMPLETED';
    $color       = 'success';
  }
 ?>
 <span class="badge bg-<?= $color; ?>" style="font-color: white;"><?= $status; ?></span>
                    </td>
                     <td>
                       <!-- <a href="<?= base_url('Tests/singleTestDetailRecord/'.$rec['testDetails']->testDetails_id); ?>"><i class="fa fa-eye  text-blue"></i></a> -->
            <?php
              if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==0)
              {
            ?>
                      <!-- <a href="<?= base_url('Tests/updateTestDetailsRecord/'.$rec['testDetails']->testDetails_id); ?>"><i class="fa fa-pencil-square-o  text-black"></i></a> -->
            <?php
              }
            ?>
                      <!-- <a href=""><i class="fa fa-trash  text-danger"></i></a> -->
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
<div class="modal" id="myModal<?= $key ?>">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?=  $rec['testDetails']->testHelp_name;        ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="box-body">
          <div class="row"> 
            <div class="col-md-12">
            <?php
              if ($rec['testDetails']->testHelp_id==1) {
            ?>
            <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th># </th>
                  <th>Type of Specimen</th>
                  <th>Animals/Specimen</th>
                  <th>Examined for </th>
                  <th>Result </th>
                  <th>Remarks </th>
                  <th>Examined by</th>
                </tr>
                <tbody>
                  <tr>
                    <td><?=  $rec['testType']->impression_smear_id;    ?></td>
                    <td><?=  $rec['testType']->type_specimen;          ?></td>
                    <td><?=  $rec['testType']->animals_specimen;       ?></td>
                    <td><?=  $rec['testType']->examined_for;           ?></td>
                    <td><?=  $rec['testType']->result;                 ?></td>
                    <td><?=  $rec['testType']->remarks;                ?></td>
                    <td><?=  $rec['testType']->examined_by;            ?></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <?php
              } else if ($rec['testDetails']->testHelp_id==2) {
            ?>
            <table class="table table-hover table-condenced table-responsive">
              <tbody>
                <tr >
                  <th># </th>
                      <td><?= $rec['testType']->haemoglobin; ?></td>     
                  <th>haemoglobin</th>     
                      <td><?= $rec['testType']->haemoglobin; ?></td>     
                  <th>ESR</th>             
                      <td><?= $rec['testType']->ESR; ?></td>
                   <tr>
                  </tr>             
                  <th>TRBC</th>            
                      <td><?= $rec['testType']->TRBC; ?></td>            
                  <th>TLC</th>             
                      <td><?= $rec['testType']->TLC; ?></td>             
                  <th>PCV</th>             
                      <td><?= $rec['testType']->PCV; ?></td> 
                  <tr>
                  </tr>            
                  <th>neutrophils</th>     
                      <td><?= $rec['testType']->neutrophils; ?></td>     
                  <th>lymphocytes</th>     
                      <td><?= $rec['testType']->lymphocytes; ?></td>     
                  <th>eosinophils</th>     
                      <td><?= $rec['testType']->eosinophils; ?></td> 
                   <tr>
                  </tr>    
                  <th>monocytes</th>       
                      <td><?= $rec['testType']->monocytes; ?></td>       
                  <th>basophils</th>       
                      <td><?= $rec['testType']->basophils; ?></td>       
                  <th>protozoa</th>        
                      <td><?= $rec['testType']->protozoa; ?></td>        
                  <th>iodine flocculation test</th> 
                      <td><?= $rec['testType']->iodine_flocculation_test; ?></td> 
                </tr>
               
                 
                </tbody>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==3) {
            ?>
            <table class="table table-hover table-condenced">
               <tbody>
                <tr>
                  <th># </th>
                  <td><?= $rec['testType']->mastitis_id;    ?></td>
                  <th>daily_milk_production</th>        
                    <td><?= $rec['testType']->daily_milk_production; ?></td>        
                </tr>
                <tr>               
                  <th>lactation_no</th>                 
                    <td><?= $rec['testType']->lactation_no; ?></td>  
                  <th>total_animals_at_farm</th>        
                    <td><?= $rec['testType']->total_animals_at_farm; ?></td>     
                     </tr>
                <tr>    
                  <th>in_milk</th>                      
                    <td><?= $rec['testType']->in_milk; ?></td>                      
                  <th>dry_period_given</th>             
                    <td><?= $rec['testType']->dry_period_given; ?></td>    
                  </tr>
                <tr>         
                  <th>cal_kid_lambing_date</th>         
                    <td><?= $rec['testType']->cal_kid_lambing_date; ?></td>         
                  <th>prev_mastatis_rec_of_anim</th>    
                    <td><?= $rec['testType']->prev_mastatis_rec_of_anim; ?></td>    
                  </tr>
                <tr> 
                  <th>prev_mastatis_rec_of_farm</th>    
                    <td><?= $rec['testType']->prev_mastatis_rec_of_farm; ?></td>   
                  <th>prac_mastatis_test_at_farm</th>   
                    <td><?= $rec['testType']->prac_mastatis_test_at_farm; ?></td>   
                    </tr>
                <tr>           
                  <th>sample_received</th>              
                    <td><?= $rec['testType']->sample_received; ?></td>   
                  <th>test_required</th>                
                    <td><?= $rec['testType']->test_required; ?></td>       
                     </tr>
                <tr>           
                  <th>refer_to_bacteriology_sec_for</th>
                    <td><?= $rec['testType']->refer_to_bacteriology_sec_for; ?></td>
                </tr>
              
                
                </tbody>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==4) {
            ?>
            <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th># </th>
                  <th>antibiotics_id</th> 
                  <th>sensitivity</th>    
                  <th>tested_by</th>      
                  <th>reports</th>  
                </tr>
                <tbody>
                  <tr>
                    <td><?= $rec['testType']->antibiotics_id; ?> </td> 
                    <td><?= $rec['testType']->antibiotics_id; ?> </td> 
                    <td><?= $rec['testType']->sensitivity; ?> </td>    
                    <td><?= $rec['testType']->tested_by; ?> </td>      
                    <td><?= $rec['testType']->reports; ?> </td> 
                  </tr>
                </tbody>
              </thead>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==5) {
            ?>
            <table class="table table-hover table-condenced">
              <tbody>
                <tr >
                  <th># </th>
                      <td><?= $rec['testType']->colour;  ?></td>
                  <th>colour</th>          
                      <td><?= $rec['testType']->colour;  ?></td>
                   </tr>
                  <tr>
                  <th>appearance</th>      
                      <td><?= $rec['testType']->appearance;  ?></td>
                  <th>reaction</th>        
                      <td><?= $rec['testType']->reaction;  ?></td>
                       </tr>
                  <tr>
                  <th>specific_gravity</th>
                      <td><?= $rec['testType']->specific_gravity;  ?></td>
                  <th>glucose</th>         
                      <td><?= $rec['testType']->glucose;  ?></td>
                       </tr>
                  <tr>
                  <th>protein</th>         
                      <td><?= $rec['testType']->protein;  ?></td>
                  <th>bile_salts</th>      
                      <td><?= $rec['testType']->bile_salts;  ?></td>
                       </tr>
                  <tr>
                  <th>bile_pigments</th>   
                      <td><?= $rec['testType']->bile_pigments;  ?></td>
                  <th>ketone_bodies</th>   
                      <td><?= $rec['testType']->ketone_bodies;  ?></td>
                       </tr>
                  <tr>
                  <th>haemoglobin</th>     
                      <td><?= $rec['testType']->haemoglobin;  ?></td>
                  <th>pus_cell</th>        
                      <td><?= $rec['testType']->pus_cell;  ?></td>
                       </tr>
                  <tr>
                  <th>epithelial_cell</th> 
                      <td><?= $rec['testType']->epithelial_cell;  ?></td>
                  <th>rb_cs</th>           
                      <td><?= $rec['testType']->rb_cs;  ?></td>
                       </tr>
                  <tr>
                  <th>casts</th>           
                      <td><?= $rec['testType']->casts;  ?></td>
                  <th>crystals</th>        
                      <td><?= $rec['testType']->crystals;  ?></td>
                       </tr>
                  <tr>
                  <th>amorphous</th>       
                      <td><?= $rec['testType']->amorphous;  ?></td>
                  <th>parasites</th>       
                      <td><?= $rec['testType']->parasites;  ?></td>
                       </tr>
                  <tr>
                  <th>bacteria</th>        
                      <td><?= $rec['testType']->bacteria;  ?></td>
                  <th>remarks</th>        
                      <td><?= $rec['testType']->remarks;  ?></td>
                       </tr>
                  <tr>
                  <th>examined_by</th>  
                      <td><?= $rec['testType']->examined_by;  ?></td>
               
                  </tr>
                </tbody>
             
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==6) {
            ?>
            <table class="table table-hover table-condenced">
             <tbody>
                <tr>
                  <th># </th>
                    <td><?= $rec['testType']->tag_no;  ?></td>
                  <th>tag_no</th>
                    <td><?= $rec['testType']->tag_no;  ?></td>
                  <th>vac_against_brucellosis</th>
                    <td><?= $rec['testType']->vac_against_brucellosis;  ?></td>
                      </tr>
                    <tr>
                  <th>sample</th>
                    <td><?= $rec['testType']->sample;  ?></td>
                  <th>species</th>
                    <td><?= $rec['testType']->species;  ?></td>
                  <th>technician</th>
                    <td><?= $rec['testType']->technician;  ?></td>
                    </tr>
                     <tr>
                  <th>remarks</th>
                    <td><?= $rec['testType']->remarks;  ?></td>
                  <th>result</th>
                    <td><?= $rec['testType']->result;  ?></td>
                  <th>history</th>
                    <td><?= $rec['testType']->history;  ?></td>
                </tr>
                </tbody>
              
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==7) {
            ?>
            <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th># </th>
                  <th>tag_no</th>                  
                  <th>vac_against_brucellosis</th> 
                  <th>sample</th>                  
                  <th>parity</th>                  
                  <th>technician</th>              
                  <th>result</th>                  
                  <th>history</th>  
                </tr>
                <tbody>
                  <tr>
                      <td><?= $rec['testType']->tag_no; ?></td>
                      <td><?= $rec['testType']->tag_no; ?></td>
                      <td><?= $rec['testType']->vac_against_brucellosis; ?></td>
                      <td><?= $rec['testType']->sample; ?></td>
                      <td><?= $rec['testType']->parity; ?></td>
                      <td><?= $rec['testType']->technician; ?></td>
                      <td><?= $rec['testType']->result; ?></td>
                      <td><?= $rec['testType']->history; ?></td> 
                  </tr>
                </tbody>
              </thead>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==8) {
            ?>
            <table class="table table-hover table-condenced">
              <thead>
                <tr >
                  <th># </th>
                    <td><?= $rec['testType']->brucella_abortus_20; ?></td>    
                  <th>brucella_abortus_20</th>
                    <td><?= $rec['testType']->brucella_abortus_20; ?></td>    
                  <th>brucella_abortus_40</th>
                    <td><?= $rec['testType']->brucella_abortus_40; ?></td>    
                  <th>brucella_abortus_80</th>
                    <td><?= $rec['testType']->brucella_abortus_80; ?></td>    
                  <th>brucella_abortus_160</th>
                    <td><?= $rec['testType']->brucella_abortus_160; ?></td>   
                  <th>brucella_abortus_320</th>
                    <td><?= $rec['testType']->brucella_abortus_320; ?></td>   
                  <th>brucella_meletensis_20</th>
                    <td><?= $rec['testType']->brucella_meletensis_20; ?></td> 
                  <th>brucella_meletensis_40</th>
                    <td><?= $rec['testType']->brucella_meletensis_40; ?></td> 
                  <th>brucella_meletensis_80</th>
                    <td><?= $rec['testType']->brucella_meletensis_80; ?></td> 
                  <th>brucella_meletensis_160</th>
                    <td><?= $rec['testType']->brucella_meletensis_160; ?></td>
                  <th>brucella_meletensis_320</th>
                    <td><?= $rec['testType']->brucella_meletensis_320; ?></td>
                  <th>result_status</th>
                    <td><?= $rec['testType']->result_status; ?></td>          
                </tr>
                <tbody>
                  <tr>
                  </tr>
                </tbody>
              </thead>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==9) {
            ?>
            <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th># </th>
                  <th>symptoms</th>     
                  <th>specimen</th>     
                  <th>lab_findings</th> 
                  <th>referred_by</th>  
                  <th>examined_by</th>  
                  <th>remarks</th> 
                </tr>
                <tbody>
                  <tr>
                      <td><?= $rec['testType']->symptoms; ?></td>     
                      <td><?= $rec['testType']->symptoms; ?></td>     
                      <td><?= $rec['testType']->specimen; ?></td>     
                      <td><?= $rec['testType']->lab_findings; ?></td> 
                      <td><?= $rec['testType']->referred_by; ?></td>  
                      <td><?= $rec['testType']->examined_by; ?></td>  
                      <td><?= $rec['testType']->remarks; ?></td>  
                  </tr>
                </tbody>
              </thead>
            </table>
            <?php
              }
            ?>
              
            </div>
          </div>
                   
                </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
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
     url: "<?php echo base_url('Reports/test_report_ajax'); ?>",
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
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
   });

var center_id ,labs_id;
var countclick=0;
   $("#load").click(function(event) {
     /* Act on the event */
     event.preventDefault();
    $(".export").attr('disabled', false);
    countclick++;
     if(countclick>1){
       $("#tbl-all-test-rep").dataTable().fnDestroy();
     }
    $(".alltestdata").empty();
     var status;
     var color;
      center_id = $("#center_id").val();
      labs_id = $("#labs").val();
     // alert("ok");
     $.ajax({
       url: "<?php echo base_url('Reports/test_report_ajax'); ?>",
       type: 'POST',
      
       data: {center_id: center_id,labs_id:labs_id},
     })
     .done(function(j) {
      var json = JSON.parse(j);
      //alert(json.length);
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
          $(".alltestdata").append(table);
       });
        $('#tbl-all-test-rep').DataTable({"paging": true,
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
          });

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


   



