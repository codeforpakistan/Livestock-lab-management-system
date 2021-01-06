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
              <b> All Cancelled Records</b> <?php include'MessageAlert.php'; ?>
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
              <a class="btn btn-success pull-right" href="<?= base_url('Tests/addNew_test'); ?>">Register New Test</a>
            </div>
          <div class="box box-primary">
             <table class="table  table-striped table-hover" id="tbl-can_rec">
              <thead>
               <tr class="bg-success">
                  <th>tracking#</th>
                  <th>Source Type</th>
                  <th>Source Name</th>
                  <th>Contact</th>
                  <th>District</th>
                  <th>Tehsil</th>
                  <th>UC/Address</th>
                  <th>Animal</th>
                  <th>Breed</th>
                  <th>Tag#</th>
                  <th>Sex</th>
                  <th>Age</th>
                  <th>Sample</th>
                  <th>Test</th>
                  <th>Fee</th>
                  <th>Result</th>
                  <th>Result On</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
 
                <tbody>
                  <?php 
                  $count=1;
                  if(!empty($records))
                  {
                  foreach ($records as $key => $rec) {
                    $current_date = date('d-m-Y');
                    $result_date  = date('d-m-Y',strtotime($rec['testDetails']->result_date));

                ?>
<?php 
 $cond        = 0;
 $status      = '';
 $color       = '';
  if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==0)
  {
     $cond       = 0;
    $status      = 'IN PROGRESS';
    $color       = 'warning';
  }else if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==1)
  {
     $cond       = 0;
    $status      = 'CANCELLED';
    $color       = 'danger';
  }else if($rec['testDetails']->post_status==1 && $rec['testDetails']->is_cancel==0)
  {
     $cond       = 1;
    $status      = 'COMPLETED';
    $color       = 'success';
  }
 ?>
                  
  <tr>
                    <td><?=  $rec['testDetails']->tracking_id;   ?></td>
                   <td><?=  $rec['testDetails']->type;   ?></td>
                    <td><?php if(!empty($rec['testDetails']->client_name)){ echo $rec['testDetails']->client_name; }else{ echo $rec['testDetails']->dept_name; }      ?></td>
                    <td><?=  $rec['testDetails']->client_contact;   ?></td>
                    <td><?=  $rec['testDetails']->district_name;      ?></td>
                    <td><?=  $rec['testDetails']->tehsil_name;      ?></td>
                    <td><?=  $rec['testDetails']->client_vil_uc_area;      ?></td>
                    <td><?=  $rec['testDetails']->cattle_name;      ?></td>
                    <td><?=  $rec['testDetails']->breed_name;      ?></td>
                    <td><?=  $rec['testDetails']->cattle_tag_no;      ?></td>
                    <td><?=  $rec['testDetails']->cattle_sex;      ?></td>
                    <td><?=  $rec['testDetails']->cattle_year . ' Y(s)' . ' ' . $rec['testDetails']->cattle_month . ' m(s)'; ;      ?></td>
                    <td><?=  $rec['testDetails']->sample_name;    ?></td>
                    <td><?=  $rec['testDetails']->testHelp_name;        ?></td>
                    <td><?=  number_format($rec['testDetails']->test_total_fee,2);         ?></td>
                     <td>
                      <?php 
                         if($rec['testDetails']->testHelp_id==6   $rec['testDetails']->testHelp_id==3 
                           || $rec['testDetails']->testHelp_id==7 ||  $rec['testDetails']->testHelp_id==8
                           || $rec['testDetails']->testHelp_id==12 || $rec['testDetails']->testHelp_id==13 
                           || $rec['testDetails']->testHelp_id==14 || $rec['testDetails']->testHelp_id==15)
                          {
                            echo $rec['testType']->result_status;
                      ?>
                        
                      <?php
                          } else if($rec['testDetails']->testHelp_id==11) { 
                            echo  $rec['testType']->afs_lab_findings;
                      ?>

                    <?php } else { ?>
                      <a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal<?=$key?>'>Click here </a>
                      <?php } ?>
                    </td>
                    <td><?php if($cond==1){ echo   date('M d Y',strtotime($rec['testDetails']->result_date)); }else{ echo '...'; }     ?></td>
                    <td>
 <span class="badge bg-<?= $color; ?>" style="font-color: white;"><?= $status; ?></span>
                    </td>
                     <td>
                       <?php if($cond==1){ ?>
                       <a href="<?= base_url('Tests/singleTestDetailRecord/'.$rec['testDetails']->testDetails_id); ?>"><span class="badge bg-primary"><i class="fa fa-print"></i> Print</span></a>
                        <?php }else{ ?> 
                          <a href="<?= base_url('Tests/quick_test_receipt/'.$rec['testDetails']->testDetails_id); ?>"><span class="badge bg-primary"><i class="fa fa-print"></i> Print</span></a>
                        <?php }  ?>
            <?php
              if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==0)
              {
            ?>
                      <a href="<?= base_url('Tests/updateTestDetailsRecord/'.$rec['testDetails']->testDetails_id); ?>"><<span class="badge bg-success"> <i class="fa fa-pencil-square-o "></i> Feed Result</span></a>
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

  $animal_id = $rec['testDetails']->cattle_id;
$WBC    = '';
$lymph1 = '';
$mon1   = '';
$gran1  = '';
$lymph2 = '';
$mon2   = '';
$gran2  = '';
$RBC    = '';
$HGB    = '';
$HCT    = '';
$MCV    = '';
$MCH    = '';
$MCHC   = '';
$RDW    = '';
$PLT    = '';
$MPV    = '';
$PDW    = '';
$PCT    = '';
 if($animal_id==1)
  {
    $WBC   = '5.0-16.0';
    $lymph1 = '1.5-9.0';
    $mon1   = '0.3-1.6';
    $gran1  = '2.3-9.1';
    $lymph2 = '20.0-60.3';
    $mon2   = '4.0-12.1';
    $gran2  = '30.0-65.0';
    $RBC   = '5.00-10.10';
    $HGB   = '9.0-13.9';
    $HCT   = '28.0-46.0';
    $MCV   = '38.0-53.0';
    $MCH   = '13.0-19.0';
    $MCHC  = '30.0-37.0';
    $RDW   = '14.0-19.0';
    $PLT   = '120-820';
    $MPV   = '3.8-.7.0';
    $PDW   = 'nill';
    $PCT   = 'nill';
  }else if($animal_id==2)
  {
    $WBC   = '5.0-12.0';
    $lymph1 = '';
    $mon1   = '';
    $gran1  = '';
    $lymph2 = '';
    $mon2   = '';
    $gran2  = '';
    $RBC   = '4.90-9.2';
    $HGB   = '11.0-18.0';
    $HCT   = '30.0-50.0';
    $MCV   = '50.0-70.0';
    $MCH   = '17.0-23.0';
    $MCHC  = '30.0-38.0';
    $RDW   = '14.0-19.0';
    $PLT   = '90-380';
    $MPV   = '6.0-10.0';
    $PDW   = 'nill';
    $PCT   = 'nill';
  }else if($animal_id==3)
  {
    $WBC   = '6.0-17.0';
    $lymph1 = '0.8-5.1';
    $mon1   = '0.0-1.8';
    $gran1  = '4.0-12.6';
    $lymph2 = '12.0-30.0';
    $mon2   = '2.0-9.0';
    $gran2  = '60.0-83.0';
    $RBC   = '5.50-8.50';
    $HGB   = '11.0-19.0';
    $HCT   = '39.0-56.0';
    $MCV   = '62.0-72.0';
    $MCH   = '20.0-25.0';
    $MCHC  = '30.0-38.0';
    $RDW   = '11.0-15.5';
    $PLT   = '117-460';
    $MPV   = '7.0-12.9';
    $PDW   = 'nill';
    $PCT   = 'nill';
  }else if($animal_id==4)
  {
    $WBC   = '5.0-14.0';
    $lymph1 = '';
    $mon1   = '';
    $gran1  = '';
    $lymph2 = '';
    $mon2   = '';
    $gran2  = '';
    $RBC   = '8.30-17.90';
    $HGB   = '8.0-11.5';
    $HCT   = '23.0-35.0';
    $MCV   = '14.0-25.0';
    $MCH   = '5.2-8.0';
    $MCHC  = '30.0-39.0';
    $RDW   = '10.0-20.0';
    $PLT   = 'nill';
    $MPV   = 'nill';
    $PDW   = 'nil';
    $PCT   = 'nill';  
  }else if($animal_id==5)
  {
    $WBC   = '5.0 - 14.0';
    $lymph1 = '';
    $mon1   = '';
    $gran1  = '';
    $lymph2 = '';
    $mon2   = '';
    $gran2  = '';
    $RBC   = '7.80 - 13.8';
    $HGB   = '9.0 - 15.5';
    $HCT   = '26.0 - 45.0';
    $MCV   = '25.0 - 38.0';
    $MCH   = '8.0 - 13.0';
    $MCHC  = '32.0 - 38.0';
    $RDW   = '13.0 - 18.0';
    $PLT   = '180 - 680 ';
    $MPV   = '3.8 - 6.0';
    $PDW   = '&nbsp;';
    $PCT   = '&nbsp;';  
  }else if($animal_id==6)
  {
    $WBC   = '5.2-13.5';
    $lymph1 = '3.2-9.0';
    $mon1   = '0.1-0.6';
    $gran1  = '2.0-7.5';
    $lymph2 = '35.2-75.6';
    $mon2   = '2.5-6.0';
    $gran2  = '20.2-59.3';
    $RBC   = '5.00-7.60';
    $HGB   = '10.5-17.0';
    $HCT   = '31.0-46.0';
    $MCV   = '-66.5';
    $MCH   = '20.1-25.1';
    $MCHC  = '32.0-37.0';
    $RDW   = '13.0-18.5';
    $PLT   = '100-712';
    $MPV   = '3.8-6.8';
    $PDW   = 'nill';
    $PCT   = 'nill';  
  }else if($animal_id==7)
  {
    $WBC   = '8.2-16.5';
    $lymph1 = '';
    $mon1   = '';
    $gran1  = '';
    $lymph2 = '';
    $mon2   = '';
    $gran2  = '';
    $RBC   = '6.70-17.30';
    $HGB   = '10.2-15.0';
    $HCT   = '27.0-45.0';
    $MCV   = '28.0-45.5';
    $MCH   = '8.6-13.0';
    $MCHC  = '33.0-41.0';
    $RDW   = '13.0-18.5';
    $PLT   = 'nill';
    $MPV   = 'nill';
    $PDW   = 'nill';
    $PCT   = 'nill';  
  }else if($animal_id==8)
  {
    $WBC   = '5.0-11.0';
    $lymph1 = '1.4-5.6';
    $mon1   = '0.2-0.8';
    $gran1  = '2.8-6.8';
    $lymph2 = '20.0-80.0';
    $mon2   = '2.0-8.0';
    $gran2  = '20.0-70.0';
    $RBC   = '5.30-13.00';
    $HGB   = '10.8-15.0';
    $HCT   = '28.0-46.0';
    $MCV   = '36.0-55.5';
    $MCH   = '14.0-19.0';
    $MCHC  = '33.0-42.6';
    $RDW   = '5.0-21.0';
    $PLT   = '95-660';
    $MPV   = '5.0-9.0';
    $PDW   = 'nill';
    $PCT   = 'nill';  
  }else if($animal_id==9)
  {
    $WBC   = '0.8-6.0';
    $lymph1 = '0.7-5.7';
    $mon1   = '0.0-0.3';
    $gran1  = '0.1-1.8';
    $lymph2 = '55.8-90.6';
    $mon2   = '1.8-6.0';
    $gran2  = '8.6-38.9';
    $RBC   = '6.36-9.42';
    $HGB   = '11.0-14.3';
    $HCT   = '34.6-44.0';
    $MCV   = '48.2-58.3';
    $MCH   = '15.8-19.0';
    $MCHC  = '30.2-35.3';
    $RDW   = '13.0-17.0';
    $PLT   = '450-1590';
    $MPV   = '3.8-6.0';
    $PDW   = 'nill';
    $PCT   = 'nill';  
  }else if($animal_id==10)
  {
    $WBC   = '2.9-15.3';
    $lymph1 = '2.6-13.5';
    $mon1   = '0.0-0.5';
    $gran1  = '0.4-3.2';
    $lymph2 = '63.7-90.1';
    $mon2   = '1.5-4.5';
    $gran2  = '7.3-30.1';
    $RBC   = '5.60-7.89';
    $HGB   = '12.0-15.0';
    $HCT   = '36.0-46.0';
    $MCV   = '53.0-68.8';
    $MCH   = '16.0-23.1';
    $MCHC  = '30.0-34.1';
    $RDW   = '11.0-15.5';
    $PLT   = '100-1610';
    $MPV   = '3.8-6.2';
    $PDW   = 'nill';
    $PCT   = 'nill';  
  }else if($animal_id==11)
  {
    $WBC    = '6.1-15.8';
    $lymph1 = '1.9-7.6';
    $mon1   = '0.4-1.5';
    $gran1  = '3.1-9.6';
    $lymph2 = '25.0-52.0';
    $mon2   = '4.0-12.0';
    $gran2  = '32.0-65.0';
    $RBC    = '4.0-6.80';
    $HGB    = '10.0-16.0';
    $HCT    = '31.0-48.0';
    $MCV    = '68.0-82.0';
    $MCH    = '21.1-28.3';
    $MCHC   = '30.0-36.0';
    $RDW    = '11.0-16.2';
    $PLT    = '130-480';
    $MPV    = '6.3-8.9';
    $PDW    = 'nill';
    $PCT    = 'nill';  
  }else if($animal_id==12)
  {
    $WBC     = '5.5-19.5';
    $lymph1  = '0.8-7.0';
    $mon1    = '0.0-1.9';
    $gran1   = '2.1-15.0';
    $lymph2  = '12.0-45.0';
    $mon2    = '2.0-9.0';
    $gran2   = '35.0-85.0';
    $RBC     = '4.60-10.00';
    $HGB     = '9.3-15.3';
    $HCT     = '28.0-49.0';
    $MCV     = '39.0-52.0';
    $MCH     = '13.0-21.0';
    $MCHC    = '30.0-38.0';
    $RDW     = '14.0-18.0';
    $PLT     = '100-514';
    $MPV     = '5.0-11.8';
    $PDW     = 'nill';
    $PCT     = 'nill';  
  }
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
               if($rec['testDetails']->testHelp_id==1)
                {
              ?>
                  <table class="table">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Result</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><?=  $rec['testType']->impression_smear_id; ?></td>
                      <td><?=  $rec['testType']->result; ?></td>
                    </tr>
                    </tbody>
                  </table>
              <?php
              } else if($rec['testDetails']->testHelp_id==10) {
            ?>
            <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th># </th>
                  <th>Result </th>
                </tr>
                <tbody>
                  <tr>
                    <td><?=  $rec['testType']->water_bacteriology_id;    ?></td>
                    <td><?=  $rec['testType']->result;                 ?></td>
                  </tr>
                </tbody>
              </thead>
            </table>
            <?php
              } else if($rec['testDetails']->testHelp_id==2) {
            ?>
            <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th>Parameter</th>
                  <th>Result</th>
                  <th>Ref. Range</th>
                   <th>Parameter</th>
                  <th>Result</th>
                  <th>Ref. Range</th>
                </tr>
              </thead>
              <tbody>
                 <?php
         if($animal_id!=2 && $animal_id!=4 && $animal_id!=5 && $animal_id!=7)
          { 
      ?>
       <tr>
          <th>WBC</th>     
          <td><?= $rec['testType']->WBC; ?>&nbsp; x10 <sup>9</sup>/L </td>   
          <td><?=  $WBC; ?></td>  
          <th>PCT</th> 
          <td><?= $rec['testType']->PCT; ?> &nbsp;%</td> 
          <td><?=  $PCT; ?></td>   
      </tr>  
      <tr>
        <th>Lymph#</th>     
        <td><?= $rec['testType']->WBC; ?>&nbsp; x10 <sup>9</sup>/L </td>   
        <td><?=  $WBC; ?></td>  
        <th>MCH</th>     
          <td><?= $rec['testType']->MCH; ?>&nbsp; pg</td>
          <td><?=  $MCH; ?></td> 
      </tr>  
      <tr>
        <th>Mon#</th>     
        <td><?= $rec['testType']->WBC; ?>&nbsp; x10 <sup>9</sup>/L </td>   
        <td><?=  $WBC; ?></td>  
         <th>MCHC</th>     
          <td><?= $rec['testType']->MCHC; ?>&nbsp; g/dl</td> 
          <td><?=  $MCHC; ?></td>     
      </tr>  
      <tr>
        <th>Gran#</th>     
        <td><?= $rec['testType']->WBC; ?>&nbsp; x10 <sup>9</sup>/L </td>   
        <td><?=  $WBC; ?></td>  
         <th>RDW</th>     
          <td><?= $rec['testType']->RDW; ?>&nbsp;%</td> 
          <td><?=  $RDW; ?></td>  
      </tr>
       <tr>
        <th>Lymph%</th>     
        <td><?= $rec['testType']->WBC; ?>&nbsp;%</td>   
        <td><?=  $WBC; ?></td>  
         <th>PLT</th>       
          <td><?= $rec['testType']->PLT; ?>&nbsp;x10  <sup>9</sup>/L</td>  
          <td><?=  $PLT; ?></td>  
      </tr>  
      <tr>
        <th>Mon%</th>     
        <td><?= $rec['testType']->WBC; ?>&nbsp;%</td>   
        <td><?=  $WBC; ?></td>  
         <th>MPV</th>       
          <td><?= $rec['testType']->MPV; ?>&nbsp; fL</td>  
          <td><?=  $MPV; ?></td>    
      </tr>  
      <tr>
        <th>Gran%</th>     
        <td><?= $rec['testType']->WBC; ?>&nbsp;%</td>   
        <td><?=  $WBC; ?></td>  
          <th>PDW</th>        
          <td><?= $rec['testType']->PDW; ?>&nbsp;</td> 
          <td><?=  $PDW; ?></td> 
      </tr> 
      <tr></tr>
        <th>RBC</th>             
        <td><?= $rec['testType']->RBC; ?>&nbsp; x10 <sup>12</sup>/L</td>
        <td><?=  $RBC; ?></td> 
        <th>HCT</th>             
          <td><?= $rec['testType']->HCT; ?>&nbsp; %</td>
          <td><?=  $HCT; ?></td>   
      </tr> 
      <tr>
        <th>HGB</th>            
          <td><?= $rec['testType']->HGB; ?>&nbsp; g/dL</td> 
          <td><?=  $HGB; ?></td>  
           <th>MCV</th>             
          <td><?= $rec['testType']->MCV; ?>&nbsp; fL</td> 
          <td><?=  $MCV; ?></td>  
      </tr>           
    <?php
     }else { ?>
 <tr>
        <th>WBC</th>     
        <td><?= $rec['testType']->WBC; ?>&nbsp; x10 <sup>9</sup>/L </td>   
        <td><?=  $WBC; ?></td>  
         <th>PCT</th> 
          <td><?= $rec['testType']->PCT; ?> &nbsp;%</td> 
           <td><?=  $PCT; ?></td>   
      </tr>  
      <tr>
        <th>RBC</th>             
        <td><?= $rec['testType']->RBC; ?>&nbsp; x10 <sup>12</sup>/L</td>
        <td><?=  $RBC; ?></td> 
        <th>HCT</th>             
          <td><?= $rec['testType']->HCT; ?>&nbsp; %</td>
          <td><?=  $HCT; ?></td>   
      </tr> 
      <tr>
        <th>HGB</th>            
          <td><?= $rec['testType']->HGB; ?>&nbsp; g/dL</td> 
          <td><?=  $HGB; ?></td>  
           <th>MCV</th>             
          <td><?= $rec['testType']->MCV; ?>&nbsp; fL</td> 
          <td><?=  $MCV; ?></td>  
      </tr>           
      <tr>
      <th>MCH</th>     
          <td><?= $rec['testType']->MCH; ?>&nbsp; pg</td>
          <td><?=  $MCH; ?></td>       
           <th>MCHC</th>     
          <td><?= $rec['testType']->MCHC; ?>&nbsp; g/dl</td> 
          <td><?=  $MCHC; ?></td>      
      </tr>    
      <tr>
         <th>RDW</th>     
          <td><?= $rec['testType']->RDW; ?>&nbsp;%</td> 
          <td><?=  $RDW; ?></td>  
           <th>PLT</th>       
          <td><?= $rec['testType']->PLT; ?>&nbsp;x10  <sup>9</sup>/L</td>  
          <td><?=  $PLT; ?></td>  
      </tr>
    <tr>
       <th>MPV</th>       
          <td><?= $rec['testType']->MPV; ?>&nbsp; fL</td>  
          <td><?=  $MPV; ?></td>      
          <th>PDW</th>        
          <td><?= $rec['testType']->PDW; ?>&nbsp;</td> 
          <td><?=  $PDW; ?></td>  
    </tr>
    <?php 
      }
    ?> 
     
  
    </tbody>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==3) {
            ?>
            <?php
              if($rec['testType']->clinical_or_sub=='Clinical')
              {
            ?>
            <table class="table table-bordered">
                <thead>
                  <th>Clinical/Sub Clinical</th>
                  <th>MASTITIS</th>
                  <th>GROSS APPEARANCE</th>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $rec['testType']->clinical_or_sub; ?></td>
                    <td><?= $rec['testType']->clinical_or_sub; ?></td>
                    <td><?= $rec['testType']->clinical_gross_appearance; ?></td>
                  </tr>
                </tbody>
              </table>
            <?php
              }
              else 
              {
            ?>
                 <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Mastitis</th>
                      <td><?= $rec['testType']->clinical_or_sub ?></td>
                      <th>Composite/Individual</th>
                      <td><?= $rec['testType']->composite_or_ind ?></td>
                    </tr>
                      <th>QUARTERS</th>
                      <th>MASTITIS</th>
                      <th>MILK PH</th>
                      <th>S.C.C<span style="font-size: 12px;">(SC/ml)</span></th>
                      <th>GROSS APPEARANCE</th>
                  </thead>
                  <tbody>
            <?php
                  if($rec['testType']->composite_or_ind=='Composite')
                  {
              ?>
                    <tr>
                      <td><?= $rec['testType']->composite_or_ind; ?></td>
                      <td><?= $rec['testType']->mastitis_severity; ?></td>
                      <td><?= $rec['testType']->milk_ph; ?></td>
                      <td><?= $rec['testType']->s_c_c; ?></td>
                      <td><?= $rec['testType']->gross_appearance; ?></td>
                    </tr>
              <?php
                  } 
                  else if($rec['testType']->composite_or_ind=='Individual')
                  {
              ?>
                    <?php 
                      if(!empty($rec['testType']->gross_appearance_r1))
                      {
                    ?>
                        <tr>
                          <td>R1 (RF)</td>
                          <td><?= $rec['testType']->mastitis_r1; ?></td>
                          <td><?= $rec['testType']->milk_ph_r1; ?></td>
                          <td><?= $rec['testType']->s_c_c_r1; ?></td>
                          <td><?= $rec['testType']->gross_appearance_r1; ?></td>
                        </tr>
                    <?php
                      }
                    ?>
                    <?php 
                      if(!empty($rec['testType']->gross_appearance_r2))
                      {
                    ?>
                       <tr>
                        <td>R2 (RH)</td>
                        <td><?= $rec['testType']->mastitis_r2; ?></td>
                        <td><?= $rec['testType']->milk_ph_r2; ?></td>
                        <td><?= $rec['testType']->s_c_c_r2; ?></td>
                        <td><?= $rec['testType']->gross_appearance_r2; ?></td>
                      </tr>
                    <?php
                      }
                    ?>
                     <?php 
                      if(!empty($rec['testType']->gross_appearance_l1))
                      {
                    ?>
                       <tr>
                        <td>L1 (LF)</td>
                        <td><?= $rec['testType']->mastitis_l1; ?></td>
                        <td><?= $rec['testType']->milk_ph_l1; ?></td>
                        <td><?= $rec['testType']->s_c_c_l1; ?></td>
                        <td><?= $rec['testType']->gross_appearance_l1; ?></td>
                      </tr>
                    <?php
                      }
                    ?>
                    <?php 
                      if(!empty($rec['testType']->gross_appearance_l2))
                      {
                    ?>
                        <tr>
                          <td>L2 (LH)</td>
                          <td><?= $rec['testType']->mastitis_l2; ?></td>
                          <td><?= $rec['testType']->milk_ph_l2; ?></td>
                          <td><?= $rec['testType']->s_c_c_l2; ?></td>
                          <td><?= $rec['testType']->gross_appearance_l2; ?></td>
                        </tr>
                    <?php
                      }
                    ?>
              <?php
                  }
             ?>
          </tbody>
        </table>
            <?php
              }
            ?>
              <!-- <p><strong>Refer to Bacteriology Section for</strong>: <?// $rec['testType']->refer_to_bacteriology_sec_for; ?></p> -->
            <?php
              }else if ($rec['testDetails']->testHelp_id==4) {
            ?>
            <div class="row">
             <div class="col-sm-3 form-group">
              <label>Culture Report: Bacterial Specie isolated</label>
              </div>
             <div class="col-sm-2 form-group">
              <b class="text-danger"><?= $rec['testType']->reports; ?></b>
              </div>
              <div class="col-sm-6"></div>
            </div>
            <table class="table table-hover table-condenced">
  <thead>
    <tr>
      <th>S.No</th>
      <th>ANTIBIOTICS</th>
      <th>SENSITIVITY</th>
      <th>S.No</th>
      <th>ANTIBIOTICS</th>
      <th>SENSITIVITY</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
     <th>Amipicilin</th>
      <td>
        <?= $rec['testType']->amipicilin; ?>
      </td>
      <td>18</td>
     <th>Kanamycin</th>
      <td>
        <?= $rec['testType']->kanamycin; ?>
      </td>
    </tr>
     <tr>
      <td>2</td>
     <th>Ampiclox</th>
      <td>
        <?= $rec['testType']->ampiclox; ?>
      </td>
      <td>19</td>
      <th>Lincomycin</th>
      <td>
        <?= $rec['testType']->lincomycin; ?>
      </td>
    </tr> 
    <tr>
      <td>3</td>
      <th>Amoxicillin</th>
      <td>
        <?= $rec['testType']->amoxicillin; ?>
      </td>
      <td>20</td>
      <th>Norfloxacin</th>
      <td>
        <?= $rec['testType']->norfloxacin; ?>
      </td>
    </tr>
    <tr>
      <td>4</td>
     <th>Augmentin</th>
      <td>
        <?= $rec['testType']->augmentin; ?>
      </td>
      <td>21</td>
      <th>Neomycin Claforan</th>
      <td>
        <?= $rec['testType']->neomycin; ?>
      </td>
    </tr> 
     <tr>
      <td>5</td>
     <th>Cephradin</th>
      <td>
        <?= $rec['testType']->cephradin; ?>
      </td>
      <td>22</td>
     <th>Negram</th>
      <td>
        <?= $rec['testType']->negram; ?>
      </td>
    </tr>
     <tr>
      <td>6</td>
      <th>Cephradin</th>
      <td>
        <?= $rec['testType']->cephradin; ?>
      </td>
      <td>23</td>
       <th>Oxytetracyclin</th>
      <td>
        <?= $rec['testType']->oxytetracyclin; ?>
      </td>
    </tr>
     <tr>
      <td>7</td>
     <th>Ciprofloxacin</th>
      <td>
        <?= $rec['testType']->ciprofloxacin; ?>
      </td>
      <td>24</td>
      <th>Ofloxacinl</th>
      <td>
        <?= $rec['testType']->ofloxacinl; ?>
      </td>
    </tr> 
    <tr>
      <td>8</td>
      <th>Cloacilin</th>
      <td>
        <?= $rec['testType']->cloacilin; ?>
      </td>
      <td>25</td>
     <th>Penicillin</th>
      <td>
        <?= $rec['testType']->penicillin; ?>
      </td>
    </tr> 
    <tr>
      <td>9</td>
     <th>Cefotaxime Clavulanic acid</th>
      <td>
        <?= $rec['testType']->cefotaxime_Clavulanic_acid; ?>
      </td>
      <td>26</td>
     <th>Polymixin-B</th>
      <td>
        <?= $rec['testType']->polymixin; ?>
      </td>
    </tr>
     <tr>
      <td>10</td>
      <th>Chlorampherical</th>
      <td>
        <?= $rec['testType']->chlorampherical; ?>
      </td>
      <td>27</td>
      <th>Sulphamethoxazoe</th>
      <td>
        <?= $rec['testType']->sulphamethoxazoe; ?>
      </td>
    </tr> 
    <tr>
      <td>11</td>
    <th>Doxycycline</th>
      <td>
        <?= $rec['testType']->doxycycline; ?>
      </td>
      <td>28</td>
       <th>Streptomycin</th>
      <td>
        <?= $rec['testType']->streptomycin; ?>
      </td>
    </tr> 
    <tr>
      <td>12</td>
       <th>Doxyeyclin</th>
        <td>
          <?= $rec['testType']->doxyeyclin; ?>
        </td>
     
      <td>29</td>
      <th>Sulfamethoxazole</th>
      <td>
        <?= $rec['testType']->sulfamethoxazole; ?>
      </td>
    </tr>
    <tr>
      <td>13</td>
       <th>Enrofloxacin</th>
      <td>
        <?= $rec['testType']->enrofloxacin; ?>
      </td>
      <td>30</td>
      <th>Sulfamethoxazole Trimethoprim</th>
      <td> 
        <?= $rec['testType']->sulfamethoxazoleTrimethoprim; ?>
      </td>
    </tr>
     <tr>
      <td>14</td>
      <th>Erythromycin</th>
      <td>
        <?= $rec['testType']->erythromycin; ?>
      </td>
      <td>31</td>
      <th>Toramycin</th>
      <td>
        <?= $rec['testType']->toramycin; ?>
      </td>
     
    </tr>
    <tr>
      <td>15</td>
       <th>FLoramphenical</th>
      <td> 
        <?= $rec['testType']->fLoramphenical; ?>
      </td>
      <td>32</td>
      <th>Tylosin</th>
      <td> 
        <?= $rec['testType']->tylosin; ?>
      </td>
    </tr>
    <tr>
      <td>16</td>
      <th>Flumiquine</th>
      <td>
        <?= $rec['testType']->flumiquine; ?>
      <td>33</td>
      <th>Tilmicosin</th>
      <td> 
        <?= $rec['testType']->tilmicosin; ?>
      </td>
    </tr>
    <tr>
      <td>17</td>
      <th>Gentamicin</th>
      <td>
        <?= $rec['testType']->gentamicin; ?>
      </td>
      <td>34</td>
       <th>Urixin</th>
      <td>
        <?= $rec['testType']->urixin; ?>
      </td>
    </tr>
  </tbody>
</table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==5) {
            ?>
            <table class="table table-hover table-condenced"  style="width:100%">
                   <thead>
                        <tr>
                             <th colspan="2">Physical & Chemical Examination</th>
                             <th colspan="2">Microscopic Examination</th>
                        </tr>
                   </thead>
                    <tbody>
          <tr>
               <th>Colour</th>
               <td><?= $rec['testType']->colour; ?></td>
               <th>Pus Cell</th>
               <td><?= $rec['testType']->pus_cell; ?></td>
          </tr>
          <tr>
               <th>Appearance</th>
               <td><?= $rec['testType']->appearance; ?></td>
               <th>Epithelial Cell</th>
               <td><?= $rec['testType']->epithelial_cell; ?></td>
          </tr>
          <tr>
               <th>Leukocytes</th>
               <td>
                <?php
                  if($rec['testType']->leukocytes=='Negative')
                  {
                  echo "Negative - 0 Cells/µL";     
                  }else if($rec['testType']->leukocytes=='Trace')
                  {
                    echo "Trace + 15 Cells/µL";                           
                  }else if($rec['testType']->leukocytes=='Small')
                  {
            echo "Small + 70 Cells/µL";                           
                  }else if($rec['testType']->leukocytes=='Moderate')
                  {
            echo "Moderate ++ 125 Cells/µL";                          
                  }else if($rec['testType']->leukocytes=='Large')
                  {
            echo "Large +++ 500 Cells/µL";                          
                  }
                ?>
               </td>
               <th>RBCs</th>
               <td><?= $rec['testType']->rb_cs; ?></td>
          </tr>
           <tr>
               <th>Nitrite</th>
               <td>
                <?php
                  if($rec['testType']->nitrite=='Negative')
                  {
                     echo "-ive";
                  }else if($rec['testType']->nitrite=='Positive')
                  {
                     echo "+ive";                    
                  }
                ?>
                
               </td>
               <th>casts</th>
               <td><?= $rec['testType']->casts; ?></td>
          </tr>
          
          <tr>
               <th>Urobilinogen</th>
               <td>
                <?php
                  if($rec['testType']->urobilinogen=='0.2')
                  {
            echo "0.2(Normal) Ehlich Units/dL Urine 3.2 µmol/L";
                  }else if($rec['testType']->urobilinogen=='1')
                  {
            echo "1 Ehlich Units/dL Urine 16 µmol/L";                     
                  }else if($rec['testType']->urobilinogen=='2')
                  {
            echo "2 Ehlich Units/dL Urine 732 µmol/L";                    
                  }else if($rec['testType']->urobilinogen=='4')
                  {
            echo "4 Ehlich Units/dL Urine 64 µmol/L";                     
                  }else if($rec['testType']->urobilinogen=='8')
                  {
            echo "8 Ehlich Units/dL Urine  128 µmol/L";                     
                  }
                ?>
               </td>
               <th>Crystals</th>
               <td><?= $rec['testType']->crystals; ?></td>
          </tr>
          <tr>
               <th>Protein</th>
               <td>
                <?php
                  if($rec['testType']->protein=='Negative')
                  {
            echo "Negative -";
                  }else if($rec['testType']->protein=='Trace')
                  {
            echo "Trace &plusmn;";                    
                  }else if($rec['testType']->protein=='30mg/dL')
                  {
            echo "30mg/dL + 0.3g/L";                    
                  }else if($rec['testType']->protein=='100mg/dL')
                  {
            echo "100mg/dL ++  1.0g/L";                     
                  }else if($rec['testType']->protein=='300mg/dL')
                  {
            echo "300mg/dL +++ 3.0g/L";                     
                  }else if($rec['testType']->protein=='>2000mg/dL')
                  {
            echo "2000mg/dL ++++ >20 g/L";                    
                  }
                ?>
               </td>
                <th>Amorphous</th>
               <td><?= $rec['testType']->amorphous; ?></td>
          </tr>
          <tr>
               <th>pH</th>
               <td><?= $rec['testType']->ph; ?></td>
                <th>Parasites</th>
               <td><?= $rec['testType']->parasites; ?></td>
          </tr>
          <tr>
               <th>Blood</th>
               <td>
                <?php
                  if($rec['testType']->blood=='Negative')
                  {
            echo "Negative -";
                  }else if($rec['testType']->blood=='Non-Hemolyzed')
                  {
            echo "Non-Hemolyzed / Trace + 10 Cells/µL";                     
                  }else if($rec['testType']->blood=='Hemolyzed')
                  {
            echo "Hemolyzed / Trace + 10 Cells/µL";                     
                  }else if($rec['testType']->blood=='Small')
                  {
            echo "Small + 25 Cells/µL";                     
                  }else if($rec['testType']->blood=='Moderate')
                  {
            echo "Moderate ++  80 Cells/µL";                    
                  }else if($rec['testType']->blood=='Large')
                  {
            echo "Large +++ 250 Cells/µL";                    
                  }
                ?>
               </td>
               <th>Bacteria</th>
               <td><?= $rec['testType']->bacteria; ?></td>
          </tr>
           <tr>
               <th>Specific Gravity</th>
               <td>
                 <?= $rec['testType']->specific_gravity; ?>
               </td>
               <th>Yeast/Fungi</th>
               <td><?= $rec['testType']->yeastFungi; ?></td>
          </tr>
          <tr>
               <th>Ketone Bodies</th>
               <td>
                <?php
                  if($rec['testType']->ketone_bodies=='Negative')
                  {
            echo "Negative -";
                  }else if($rec['testType']->ketone_bodies=='Trace')
                  {
            echo "Trace 5 mg/dL 0.5 mmol/L";                    
                  }else if($rec['testType']->ketone_bodies=='Small')
                  {
            echo "Small 15 mg/dL 1.5 mmol/L";                     
                  }else if($rec['testType']->ketone_bodies=='Moderate')
                  {
            echo "Moderate 40 mg/dL 4.0 mmol/L";                    
                  }else if($rec['testType']->ketone_bodies=='Large')
                  {
            echo "Large  80 mg/dL 8.0 mmol/L";                    
                  }else if($rec['testType']->ketone_bodies=='xLarge')
                  {
            echo "Large 160 mg/dL 16.0 mmol/L";                     
                  }
                ?>
               </td>
          </tr>
          <tr>
           <th>Bilirubin</th>
               <td>
                <?php
                  if($rec['testType']->bilirubin=='Negative')
                  {
            echo "Negative -";
                  }else if($rec['testType']->bilirubin=='Small')
                  {
            echo "Small 1+";
                  }else if($rec['testType']->bilirubin=='Moderate')
                  {
            echo "Moderate 3++";                    
                  }else if($rec['testType']->bilirubin=='Large')
                  {
            echo "Large 6+++";                    
                  }
                ?>
               
               </td>
           </tr>
            <tr>
           <th>Glucose</th>
               <td>
                <?php
                  if($rec['testType']->glucose=='Negative')
                  {
                    echo "Negative -";
                  }else if($rec['testType']->glucose=='Trace')
                  {
                    echo "Trace + 100 mg/dL 5 mmol/L";
                  }else if($rec['testType']->glucose=='Small')
                  {
                    echo "Small + 50 mg/dL 15 mmol/L";
                  }else if($rec['testType']->glucose=='Moderate')
                  {
                    echo "Moderate ++  500 mg/dL 30 mmol/L";
                  }else if($rec['testType']->glucose=='Large')
                  {
                    echo "Large +++ 1000 mg/dL  60 mmol/L";
                  }else if($rec['testType']->glucose=='xLarge')
                  {
                    echo "Large ++++ >2000 mg/dL 110 mmol/L";
                  }
                ?>
                
               </td>
           </tr>

     </tbody>
              </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==6) {
            ?>
            <table class="table table-hover table-condenced">
              <thead>
                 <tr class="bg-success">
                  <th>Test Conducted</th>
                  <th>Specimen</th>
                  <th>Specimen Detail</th>
                  <th>Result</th>
                </tr>
              </thead>
                <tbody>
                  <tr>
                    <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                    <td><?=  $rec['testDetails']->sample_name;   ?></td>
                    <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                    <td><?=  $rec['testType']->result_status;    ?></td>
                </tr>
              </tbody>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==7) {
            ?>
            <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th>Test Conducted</th>
                  <th>Specimen</th>
                  <th>Specimen Detail</th>
                  <th>Result</th>
                </tr>
              </thead>
                <tbody>
                  <tr>
                    <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                    <td><?=  $rec['testDetails']->sample_name;   ?></td>
                    <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                    <td><?=  $rec['testType']->result_status;    ?></td>
                </tr>
                </tbody>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==8) {
            ?>
            <table class="table table-hover table-condenced">
               <tr class="text-center">
                    <th colspan="2" rowspan="2">Anitgen Used</th>
                    <th colspan="5">RECIPROCAL OF SERUM ANTIBODY TITRES</th>
                  </tr>
                  <tr>
                    <th>20</th>
                    <th>40</th>
                    <th>80</th>
                    <th>160</th>
                    <th>320</th>
                  </tr>
                  <tr>
                    <th colspan="2"> Brucella abortus</th>
                    <td>
                     <?= $rec['testType']->brucella_abortus_20; ?>
                   </td>
                    <td>
                      <?= $rec['testType']->brucella_abortus_40; ?>
                      </td>
                    <td> 
                      <?= $rec['testType']->brucella_abortus_80; ?>
                      </td>
                    <td>
                      <?= $rec['testType']->brucella_abortus_160; ?>
                      </td>
                    <td> 
                      <?= $rec['testType']->brucella_abortus_320; ?>
                    </td>
                  </tr>
                    <tr>
                    <th colspan="2">Brucella melitensis</th>
                     <td>
                     <?= $rec['testType']->brucella_meletensis_20; ?>
                   </td>
                    <td>
                      <?= $rec['testType']->brucella_meletensis_40; ?>
                      </td>
                    <td> 
                      <?= $rec['testType']->brucella_meletensis_80; ?>
                      </td>
                    <td>
                      <?= $rec['testType']->brucella_meletensis_160; ?>
                      </td>
                    <td> 
                      <?= $rec['testType']->brucella_meletensis_320; ?>
                    </td>
                  </tr>
            </table><br>
             <table class="table table-hover table-condenced">
              <thead>
               <tr class="bg-success">
                  <th>Test Conducted</th>
                  <th>Specimen</th>
                  <th>Specimen Detail</th>
                  <th>Result </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                   <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                   <td><?=  $rec['testDetails']->sample_name;   ?></td>
                   <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                   <td><?=  $rec['testType']->result_status;    ?></td>
                </tr>
             </tbody>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==9) {
            ?>
            <table class="table table-hover table-condenced">
                <thead>
                   <tr class="text-center">
                    <th colspan="4">TST Readings (mm)</th>
                  </tr>
                  <tr>
                    <th>&nbsp;</th>
                    <th>1 <sup>st</sup></th>
                    <th>2 <sup>nd</sup></th>
                    <th>Result</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>A</td>
                    <td><?= $rec['testType']->A_1st;    ?></td>
                    <td><?= $rec['testType']->A_2nd;    ?></td>
                    <td><?= $rec['testType']->A_result; ?></td>
                  </tr>
                   <tr>
                    <td>M</td>
                    <td><?= $rec['testType']->M_1st;    ?></td>
                    <td><?= $rec['testType']->M_2nd;    ?></td>
                    <td><?= $rec['testType']->M_result; ?></td>
                  </tr>

                </tbody>
              </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==11) {
            ?>
            <table class="table table-hover  table-condenced">
              <thead>
                <tr class="bg-success">
                  <th>Test Conducted</th>
                  <th>Sample/Specimen</th>
                  <th>Sample/Specimen detail</th>
                  <th>Result</th> 
                </tr>
              </thead>
                <tbody>
                  <tr>
                      <td><?=  $rec['testDetails']->testHelp_name; ?></td>    
                      <td><?=  $rec['testDetails']->sample_name; ?></td>
                      <td><?=  $rec['testDetails']->sample_desc; ?></td> 
                      <td><?php if($rec['testType']->afs_lab_findings=='positive'){ echo "Positive (+ive)";} if($rec['testType']->afs_lab_findings=='negative'){ echo "Negative (-ive)";} ?></td> 
                  </tr>
                </tbody>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==12) {
            ?>
             <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th>Test Conducted</th>
                  <th>Specimen</th>
                  <th>Specimen Detail</th>
                  <th>Antibody Index</th>
                  <th>Result </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                  <td><?=  $rec['testDetails']->sample_name;   ?></td>
                  <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                  <td><?= $rec['testType']->intibody_index;  ?></td>
                  <td><?= $rec['testType']->result_status;  ?></td>
                </tr>
              </tbody>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==13) {
            ?>
             <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th>Test Conducted</th>
                  <th>Specimen</th>
                  <th>Specimen Detail</th>
                  <th>Antibody Index</th>
                  <th>Result </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                   <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                   <td><?=  $rec['testDetails']->sample_name;   ?></td>
                   <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                   <td><?=  $rec['testType']->antibody_index;   ?></td>
                   <td><?=  $rec['testType']->result_status;    ?></td>
                </tr>
              </tbody>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==14) {
            ?>
             <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th>Test Conducted</th>
                  <th>Specimen</th>
                  <th>Specimen Detail</th>
                  <th>Result </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                   <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                   <td><?=  $rec['testDetails']->sample_name;   ?></td>
                   <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                   <td><?=  $rec['testType']->result_status;    ?></td>
                </tr>
              </tbody>
            </table>
            <?php
              }else if ($rec['testDetails']->testHelp_id==15) {
            ?>
            <table class="table table-hover table-condenced">
              <thead>
                <tr class="bg-success">
                  <th>Test Conducted</th>
                  <th>Specimen</th>
                  <th>Specimen Detail</th>
                  <th>Result </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?=   $rec['testDetails']->testHelp_name; ?></td>
                   <td><?=  $rec['testDetails']->sample_name;   ?></td>
                   <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                   <td><?=  $rec['testType']->result_status;     ?></td>
                </tr>
              </tbody>
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
   
   
<script>
  $(document).ready(function(){

$('#tbl-can_rec').DataTable({
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
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10 ]
                }
            }
        ]
})
  })
</script>


