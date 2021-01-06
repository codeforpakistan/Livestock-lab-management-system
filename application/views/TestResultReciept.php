

<?php 
// echo"<pre>";
// print_r($rec['testType']);
// exit();
 $status      = '';
 $status_date = '';
 $color       = '';
  if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==0)
  {
    $status      = 'IN PROGRESS';
    $color       = 'warning';
    $status_date = '';
  }else if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==1)
  {
    $status      = 'CANCELLED';
    $color       = 'danger';
    $status_date = '';
  }else if($rec['testDetails']->post_status==1 && $rec['testDetails']->is_cancel==0)
  {
    $status      = 'COMPLETED';
    $color       = 'success';
    $status_date = date('M d Y',strtotime($rec['testDetails']->posted_date));
  }
 ?>


<style type="text/css">
#bg-text
{
    position:relative;
    z-index:0;
    font-size:70px;
    margin-top: -120px !important;
    margin-left: 100px !important;
    transform:rotate(300deg );
    -webkit-transform:rotate(300deg);
    opacity: 0.3;
}

.headFootColor{
      background-color: #88c4d2;
      padding: 5px;
}
</style>


<?php
$animal_id = $rec['testDetails']->cattle_id;
$WBC         = '';
$WBC_mx      = '';
$WBC_mi      = '';
$lymph1      = '';
$lymph1_mx   = '';
$lymph1_mi   = '';
$mon1        = '';
$mon1_mx     = '';
$mon1_mi     = '';
$gran1       = '';
$gran1_mx    = '';
$gran1_mi    = '';
$lymph2      = '';
$lymph2_mx   = '';
$lymph2_mi   = '';
$mon2        = '';
$mon2_mx     = '';
$mon2_mi     = '';
$gran2       = '';
$gran2_mx    = '';
$gran2_mi    = '';
$RBC         = '';
$RBC_mx      = '';
$RBC_mi      = '';
$HGB         = '';
$HGB_mx      = '';
$HGB_mi      = '';
$HCT         = '';
$HCT_mx      = '';
$HCT_mi      = '';
$MCV         = '';
$MCV_mx      = '';
$MCV_mi      = '';
$MCV_mx      = '';
$MCV_mi      = '';
$MCH         = '';
$MCHC        = '';
$MCHC_mx     = '';
$MCHC_mi     = '';
$RDW         = '';
$RDW_mx      = '';
$RDW_mi      = '';
$PLT         = '';
$PLT_mx      = '';
$PLT_mi      = '';
$MPV         = '';
$MPV_mx      = '';
$MPV_mi      = '';
$PDW         = '';
$PDW_mx      = '';
$PDW_mi      = '';
$PCT         = '';
$PCT_mx      = '';
$PCT_mi      = '';
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
    $WBC   = '0.8-6.8';
    $lymph1 = '0.7-5.7';
    $mon1   = '0.0-0.3';
    $gran1  = '0.1-1.8';
    $lymph2 = '55.8-90.6';
    $mon2   = '1.8-6.0';
    $gran2  = '8.6-38.9';
    $RBC   = '6.36-9.42';
    $HGB   = '11.0-14.3';
    $HCT   = '34.6-44.6';
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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Receipt</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info"> -->
              <!-- <h5><i class="fa fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
                <div class="row headFootColor" >
                <div class="col-6">
                  <!-- <small class="float-left">Print Date: <? //date('M d Y'); ?></small> -->
                  <img src="<?= base_url('img_uploads/logo.jpg'); ?>" style="width: 100px; height: 100px;">
                   <strong style="font-size: 22px;">
                      <?= $logLab->lab_name; ?>
                    </strong>
                </div>
                 <div class="col-6" style="text-align: center;">
                     <strong style="font-size: 18px;">
                      <?= $logLab->center_station_name; ?>
                    </strong><br>
                    <span>
                      <?= $logLab->center_station_address; ?>
                    </span><br>
                </div>
                <!--  <div class="col-2">
                   <small class="float-right">Lab #: <?= $logLab->lab_id; ?></small>
                </div> -->
                <!-- /.col -->
              </div>
              <hr>
              <!-- <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fa fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: <?= date('M d Y'); ?></small>
                  </h4>
                </div>
              </div> -->
              <!-- info row -->
              <div class="row">
  <div class="col-md-4">
    <strong style="font-size: 22px;">Tracking# <u><?=  $rec['testDetails']->tracking_id; ?></u></strong><br>
    <strong>Source Type: <?php if($rec["testDetails"]->type=='farmer')
                                { 
                                  echo "Farmer/Owner"; 
                                }else if($rec["testDetails"]->type=='own_dept')
                                {
                                  echo "Own Department"; 
                                }else if($rec["testDetails"]->type=='other_dept')
                                {
                                  echo "Other Department"; 
                                } else if($rec["testDetails"]->type=='Patient')
                                {
                                  echo "Patient/Human"; 
                                } else if($rec["testDetails"]->type=='farm_visited')
                                {
                                  echo "Farm Visited"; 
                                } 
                                ?></strong>
  </div>
  <div class="col-md-4"><strong style="font-size: 26px;"></strong></div>
  <div class="col-md-4">Date: <u> <?php echo date('d M Y'); ?></u></div>
</div>  
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <b class="text-primary"><?php if($rec["testDetails"]->type=='farmer')
                                                { 
                                                  echo "Farmer/Owner"; 
                                                }else if($rec["testDetails"]->type=='own_dept')
                                                {
                                                  echo "Own Department"; 
                                                }else if($rec["testDetails"]->type=='other_dept')
                                                {
                                                  echo "Other Department"; 
                                                } else if($rec["testDetails"]->type=='Patient')
                                                {
                                                  echo "Patient/Human"; 
                                                }  else if($rec["testDetails"]->type=='farm_visited')
                                                  {
                                                    echo "Farm Visited"; 
                                                  } 
                                                ?> Information</b>
<table class=" table-responsive">
                    <tbody>
<?php if(!empty($rec['testDetails']->dept_name)){ 
?>
<tr>
<th>Dept Name:   </th>
<td><?=  ucwords($rec['testDetails']->dept_name); ?></td>
</tr>
<?php
   } ?>
<?php if(!empty($rec['testDetails']->dept_phone)){ 
?>
<tr>
<th>Dept Phone#:   </th>
<td><?=  $rec['testDetails']->dept_phone; ?></td>
</tr>
<?php
   } ?>
<?php if(!empty($rec['testDetails']->client_cnic)){ 
?>
<tr>
<th> CNIC:   </th>
<td><?= $rec['testDetails']->client_cnic; ?></td>
</tr>
<?php
   } ?>
<?php if(!empty($rec['testDetails']->client_name)){ 
?>
<tr>
<th> Name:   </th>
<td><?=  ucwords($rec['testDetails']->client_name); ?></td>
</tr>
<?php
   } ?>
<?php if(!empty($rec['testDetails']->client_contact)){ 
?>
<tr>
<th>Contact #:   </th>
<td><?=  $rec['testDetails']->client_contact; ?></td>
</tr>
<?php
 } ?>
 <?php if(!empty($rec['testDetails']->client_address)){ 
?>
<tr>
<th>Address:   </th>
<td><?=  $rec['testDetails']->client_address.', UC/Village '.$rec['testDetails']->client_vil_uc_area.', Tehsil '.$rec['testDetails']->tehsil_name.', District '.$rec['testDetails']->district_name; ?></td>

</tr>
<?php
 } ?>
<tr>
<th>Referred by:  </th>
<td><?=  ucwords($rec['testDetails']->sender_name); ?></td>
</tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col"></div>
                <div class="col-sm-4 invoice-col" >
                  <b class="text-primary"> <?php if($rec["testDetails"]->type=='Patient')
                                                { 
                                                  echo "Other "; 
                                                }else { echo "Animal "; }  ?>Information</b>
                  <table class=" table-responsive">
                    <tbody>
                      <?php
                        if(!empty($rec['testDetails']->cattle_name))
                        {
                      ?>
                        <tr>
                          <th>Type:   </th>
                          <td><?=  $rec['testDetails']->cattle_name; ?></td>
                        </tr>
                      <?php
                        }
                      ?>
                      <?php
                        if(!empty($rec['testDetails']->breed_name))
                        {
                      ?>
                        <tr>
                          <th>Breed:  </th>
                          <td><?=  $rec['testDetails']->breed_name; ?></td>
                        </tr>
                      <?php
                        }
                      ?>
                      <?php
                        if(!empty($rec['testDetails']->cattle_tag_no))
                        {
                      ?>
                        <tr>
                          <th>Tag #:  </th>
                          <td><?=  $rec['testDetails']->cattle_tag_no; ?></td>
                        </tr>
                      <?php
                        }
                      ?>
                    <tr>
                      <th>Sex:   </th>
                      <td><?=  $rec['testDetails']->cattle_sex; ?></td>
                    </tr>
                    <tr>
                       <th>Age(Y/M):</th>
                      <td><?=  $rec['testDetails']->cattle_year.' y & '.$rec['testDetails']->cattle_month.' m'; ?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="display: none;">
                  <b class="text-primary">Invoice Information</b>
                  <table class=" table-responsive">
                    <tbody>
                    <tr>
                      <th>Tracking #:  </th>
                      <td><?=  $rec['testDetails']->tracking_id; ?></td>
                    </tr>
                    <tr>
                      <th>Status:   </th>
                      <td><span class="badge bg-<?= $color; ?>" style="font-color: white;"><?= $status; ?></span></td>
                    </tr>
                   
                    <tr>
                      <th>Sample/Specimen  Received:   </th>
                      <td> <?= date('M d Y',strtotime($rec['testDetails']->received_date)); ?></td>
                    </tr>
                    <tr>
                      <th>Sample/Specimen Result:  </th>
                      <td><?php if(!empty($rec['testDetails']->result_date)){ echo date('M d Y',strtotime($rec['testDetails']->result_date)); }else { ?> <i class="fa fa-ellipsis-h"></i> <?php } ?></td>
                    </tr>
                     <tr>
                      <th>Result Post:   </th>
                      <td><span  style=""><?php if(!empty($status_date)){ echo '  '.$status_date; }else { ?> <i class="fa fa-ellipsis-h"></i> <?php } ?><?= $status_date; ?></span></td>
                    </tr>
                    </tbody>
                  </table>
                 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
<br>
              <!-- Table row -->
              <!-- <b class="text-primary">Report Information</b><br> -->
              <!-- <b style="text-decoration: underline;"><?  //strtoupper($rec['testDetails']->testHelp_name); ?></b><br> -->
               <div class="row">
                 <div class="col-4"></div>
                 <div class="col-4"> <strong style="font-size: 22px;">TEST REPORT</strong></div>
                 <div class="col-4"></div>
               </div>
              <div class="row">
                <div class="col-12">
              <?php
              if(!empty($rec['testType']))
              {
                if($rec['testDetails']->testHelp_id==1)
                {
              ?>
                  <table class="table">
                    <thead>
                    <tr class="bg-success">
                        <th>Test Conducted</th>
                        <th>Specimen</th>
                        <th>Specimen Detail</th>
                        <th>Bacteria Observed</th>
                      </tr>
                    </thead>
                      <tbody>
                        <tr>
                          <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                          <td><?=  $rec['testDetails']->sample_name;   ?></td>
                          <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                          <td><?=  $rec['testType']->result;    ?></td>
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
                        <th>Test Conducted</th>
                        <th>Specimen</th>
                        <th>Specimen Detail</th>
                 </tr>
              </thead>
              <tbody>
                <tr>
                      <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                      <td><?=  $rec['testDetails']->sample_name;   ?></td>
                      <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                </tr>
              </tbody>
            </table>
            
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
           <th>HCT</th>             
          <td><?= $rec['testType']->HCT; ?>&nbsp; %</td>
          <td><?=  $HCT; ?></td>
      </tr>  
      <tr>
        <th>Lymph#</th>     
        <td><?= $rec['testType']->lymph1; ?>&nbsp; x10 <sup>9</sup>/L </td>   
        <td><?=  $lymph1; ?></td>  
        <th>MCV</th> 
        <td><?= $rec['testType']->MCV; ?>&nbsp; fL</td> 
        <td><?=  $MCV; ?></td>  
      </tr>  
      <tr>
        <th>Mon#</th>     
        <td><?= $rec['testType']->mon1; ?>&nbsp; x10 <sup>9</sup>/L </td>   
        <td><?=  $mon1; ?></td>  
         <th>MCH</th>     
          <td><?= $rec['testType']->MCH; ?>&nbsp; pg</td>
          <td><?=  $MCH; ?></td> 
           
      </tr>  
      <tr>
        <th>Gran#</th>     
        <td><?= $rec['testType']->gran1; ?>&nbsp; x10 <sup>9</sup>/L </td>   
        <td><?=  $gran1; ?></td>  
         <th>MCHC</th>     
          <td><?= $rec['testType']->MCHC; ?>&nbsp; g/dl</td> 
          <td><?=  $MCHC; ?></td>  
        
      </tr>
       <tr>
        <th>Lymph%</th>     
        <td><?= $rec['testType']->lymph2; ?>&nbsp;%</td>   
        <td><?=  $lymph2; ?></td>  
         <th>RDW</th>     
          <td><?= $rec['testType']->RDW; ?>&nbsp;%</td> 
          <td><?=  $RDW; ?></td>  
       
      </tr>  
      <tr>
        <th>Mon%</th>     
        <td><?= $rec['testType']->mon2; ?>&nbsp;%</td>   
        <td><?=  $mon2; ?></td> 
          <th>PLT</th>       
          <td><?= $rec['testType']->PLT; ?>&nbsp;x10  <sup>9</sup>/L</td>  
          <td><?=  $PLT; ?></td>   
        
      </tr>  
      <tr>
        <th>Gran%</th>     
        <td><?= $rec['testType']->gran2; ?>&nbsp;%</td>   
        <td><?=  $gran2; ?></td>  
         <th>MPV</th>       
          <td><?= $rec['testType']->MPV; ?>&nbsp; fL</td>  
          <td><?=  $MPV; ?></td>    
         
      </tr> 
      <tr></tr>
        <th>RBC</th>             
        <td><?= $rec['testType']->RBC; ?>&nbsp; x10 <sup>12</sup>/L</td>
        <td><?=  $RBC; ?></td> 
         <th>PDW</th>        
          <td><?= $rec['testType']->PDW; ?>&nbsp;</td> 
          <td><?=  $PDW; ?></td> 
      </tr> 
      <tr>
        <th>HGB</th>            
          <td><?= $rec['testType']->HGB; ?>&nbsp; g/dL</td> 
          <td><?=  $HGB; ?></td>  
            <th>PCT</th> 
          <td><?= $rec['testType']->PCT; ?> &nbsp;%</td> 
          <td><?=  $PCT; ?></td>               
             
      </tr>           
    <?php
     }else { ?>
 <tr>
        <th>WBC</th>     
        <td><?= $rec['testType']->WBC; ?>&nbsp; x10 <sup>9</sup>/L </td>   
        <td><?=  $WBC; ?></td>  
        <th>MCV</th>             
        <td><?= $rec['testType']->MCV; ?>&nbsp; fL</td> 
        <td><?=  $MCV; ?></td>      
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
          <th>PCT</th> 
           <td><?= $rec['testType']->PCT; ?> &nbsp;%</td> 
           <td><?=  $PCT; ?></td>
         
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
                if($rec['testType']->result_status=='Negative')
                {
            ?>
               <table class="table table-bordered">
                  <thead>
                    <th>Test Conducted</th>
                    <th>Specimen</th>
                    <th>Specimen Detail</th>
                    <th>PH</th>
                    <th>S.S.C</th>
                    <th>GROSS APPEARANCE</th>
                    <th>Result</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?=  $rec['testDetails']->testHelp_name;          ?></td>
                      <td><?=  $rec['testDetails']->sample_name;            ?></td>
                      <td><?=  $rec['testDetails']->sample_desc;            ?></td>
                      <td><?=  $rec['testType']->neg_ph;                    ?></td>
                      <td><?=  $rec['testType']->neg_ssc;                   ?></td>
                      <td><?=  $rec['testType']->neg_gross_appearance;      ?></td>
                      <td><?=  $rec['testType']->result_status;             ?></td>
                    </tr>
                  </tbody>
                </table>
            <?php
                }else{
            ?>
            <?php
              if($rec['testType']->clinical_or_sub=='Clinical')
              {
            ?>
            <table class="table table-bordered">
                <thead>
                  <th>Test Conducted</th>
                  <th>Specimen</th>
                  <th>Specimen Detail</th>
                  <th>Result</th>
                  <th>Mastitis Type</th>
                  <th>GROSS APPEARANCE</th>
                </thead>
                <tbody>
                  <tr>
                    <td><?=  $rec['testDetails']->testHelp_name;          ?></td>
                    <td><?=  $rec['testDetails']->sample_name;            ?></td>
                    <td><?=  $rec['testDetails']->sample_desc;            ?></td>
                    <td><?=  $rec['testType']->result_status;             ?></td>
                    <td><?=  $rec['testType']->clinical_or_sub;           ?></td>
                    <td><?=  $rec['testType']->clinical_gross_appearance; ?></td>
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
                  <th>Test Conducted</th>
                  <th>Specimen</th>
                  <th>Specimen Detail</th>
                  <th>Mastitis Type</th>
                </thead>
                <tbody>
                  <tr>
                    <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                    <td><?=  $rec['testDetails']->sample_name;   ?></td>
                    <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                    <td><?=  $rec['testType']->clinical_or_sub;   ?></td>
                  </tr>
                </tbody>
              </table>
<br>
                 <table class="table table-bordered">
                  <thead>
                      <th>QUARTERS</th>
                      <th>MASTITIS (Severity)</th>
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
            }
            ?>
              <!-- <p><strong>Refer to Bacteriology Section for</strong>: <?// $rec['testType']->refer_to_bacteriology_sec_for; ?></p> -->
            <?php
              }else if ($rec['testDetails']->testHelp_id==4) {
            ?>
             <table class="table table-hover table-condenced">
              <thead>
              <th>Test Conducted</th>
              <th>Specimen</th>
              <th>Specimen Detail</th>
              <th>Culture Report</th>
            </thead>
            <tbody>
              <tr>
                <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                <td><?=  $rec['testDetails']->sample_name;   ?></td>
                <td><?=  $rec['testDetails']->sample_desc;   ?></td>
                <td>Bacterial Specie isolated <?=  $rec['testType']->reports; ?></td>
              </tr>
            </tbody>
           </table>
<br>
<div class="row">
     <div class="col-4"></div>
     <div class="col-4"> <strong style="font-size: 22px;">SENSITIVITY REPORT</strong></div>
     <div class="col-4"></div>
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

            }
            ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <b class="text-primary" style="font-size: 18px;">Remarks</b>
                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?=  $rec['testDetails']->recommendations; ?>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                  <div class="table-responsive">
                   <!--  <table class="table">
                      <tr>
                        <th><b class="text-primary" style="font-size: 18px;">Sample/Specimen</b></th>
                        <td><b><?=  strtoupper($rec['testDetails']->sample_name); ?></b></td>
                      </tr>
                      <tr>
                        <th><b class="text-primary" style="font-size: 18px;">Test Conducted</b></th>
                        <td><b><?=  strtoupper($rec['testDetails']->testHelp_name); ?></b></td>
                      </tr>
                      <tr>
                        <th><b class="text-primary" style="font-size: 18px;">Total Charges:</b></th>
                        <td><?=  number_format($rec['testDetails']->test_total_fee,2); ?> PKR</td>
                      </tr>
                    </table> -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                  <div class="col-md-9">
                  </div>
                   <div class="col-md-3">
                    <strong>Examained by</strong><br> <?= $rec['testDetails']->examined_by; ?><br>
                    (<?= $rec['testDetails']->examined_by_desi; ?>)

                  </div>
                   
                </div>
               <div class="row">
                 <div class="col-md-12">
                   <strong class="text-danger">Note: You can View & Print your Test Report from " livestockres.kp.gov.pk/page/kplims " by using the above Tracking #</strong>
                </div>
                <!-- <div class="col-md-3">
                </div> -->
                </div>
                 <br><hr>
                     <div class="row headFootColor">
                      <div class="col-3">
                       <span style="font-size: 14px;">
                       Website: <a href="<?= $logLab->center_station_website; ?>" target="_blank"><?= '  '.$logLab->center_station_website; ?></a>
                      </span>
                      </div>
                      <div class="col-3">
                       <span >
                       Email: <?= '  '.$logLab->center_station_email; ?>
                      </span>
                      </div>
                   <div class="col-3" >
                    <span>
                     Phone#: <?= '  '. $logLab->center_station_phone; ?>
                    </span>
                  </div>
                   <div class="col-3" >
                    <span>
                     Fax#: <?= '  '. $logLab->center_station_fax; ?>
                    </span>
                  </div>
                <!--  <div class="col-2">
                   <small class="float-right">Lab #: <?= $logLab->lab_id; ?></small>
                </div> -->
                <!-- /.col -->
              </div>
              <!-- this row will not appear when printing -->
                <hr>  
              <div class="row no-print">
                <div class="col-12">
                  <a href="javascript:void(0);" onclick="printPage();"   class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                  <?php
                    if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==0)
                    {
                  ?>
                    <button type="button" class="btn btn-danger float-right"  style="display: none;" data-backdrop="static" data-keyboard="false" data-toggle="modal" href="#cancelModal" ><i class="fa fa-remove"></i> Cancel Invoice
                    </button>
                      <button type="button" onclick="SubmitPost();" class="btn btn-success float-right" style="display: none; margin-right: 5px;">
                      <i class="fa fa-send"></i> Post Invoice
                    </button>
                  <?php
                    }
                  ?>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<div class="modal" id="cancelModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cancel Reason</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?=  base_url('Tests/TestRecordCancel') ?>" method="post">
          <input type="hidden" name="testDetails_id" value="<?= $rec['testDetails']->testDetails_id;?>"> 
          <input type="hidden" name="uri" value="<?= $this->uri->segment(2);?>"> 
         <div class="box-body">
            <div class="col-sm-12 form-group">
              <!-- <label></label> -->
              <textarea name="cancel_reason" placeholder="Write in short words" class="form-control" required="required"></textarea>
            </div>
            <div class="form-group">
              <button type="submit"  onclick="return confirm('Are you sure to Cancel the Record?');"  class="btn btn-info pull-right">Submit</button>
            </div>
         </div>
        </form>
      </div>

      <!-- Modal footer -->
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>

<form id="postForm" action="<?php echo base_url('Tests/TestRecordPost') ?>" method="post">
  <input type="hidden" name="testDetails_id" value="<?= $rec['testDetails']->testDetails_id;?>"> 
   <input type="hidden" name="uri" value="<?= $this->uri->segment(2);?>">
</form>

<script type="text/javascript">
  function SubmitPost()
  {
    if(confirm('Warning! Your will not be able to update it, Once you posted')==true)
    {
       $('#postForm').submit();
    }
  }

  function printPage()
  {
    window.print();

  }
</script>