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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quick Test Receipt</h1>
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
               <div class="row headFootColor">
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
                                }else if($rec["testDetails"]->type=='farm_visited')
                                {
                                  echo "Farm Visited"; 
                                } 
                                ?></strong>
  </div>
  <div class="col-md-4"><strong style="font-size: 26px;">RECEIPT</strong></div>
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
              <!-- Table row -->
           <!--  <b style="text-decoration: underline;"><?// strtoupper($rec['testDetails']->testHelp_name); ?></b><br> -->
           <div class="row">
             <div class="col-4"></div>
             <div class="col-4"> <strong style="font-size: 22px;">TEST DETAIL</strong></div>
             <div class="col-4"></div>
           </div>
              <div class="row">
                <div class="col-12">
                        <table class="table">
                          <thead>
                          <tr>
                            <th>Test Required</th>
                            <th>Sample/Specimen</th>
                            <th>Sample/Specimen detail</th>
                            <th>Fee(PKR)</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                            <td><?=  $rec['testDetails']->sample_name; ?></td>
                            <td><?=  $rec['testDetails']->sample_desc; ?></td>
                            <td><?=  number_format($rec['testDetails']->test_total_fee,2); ?></td>
                          </tr>
                          <tr>
                            <th colspan="2">&nbsp;</th>
                            <th colspan="">Total Charges</th>
                            <td><strong><?=  number_format($rec['testDetails']->test_total_fee,2); ?> PKR</strong></td>
                          </tr>
                          </tbody>
                        </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row" style="display: none;">
                <!-- accepted payments column -->
                <div class="col-6" >
                  <b class="text-primary" style="font-size: 18px;">Additional Information</b>
                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?=  $rec['testDetails']->additional_info; ?>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                 <div class="col-md-12">
               <strong class="text-danger">Note: You can View & Print your Test Report from " livestockres.kp.gov.pk/page/kplims " by using the above Tracking #</strong>
                </div>
                <!-- <div class="col-md-3"></div> -->
                 
              </div>
              <hr>
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
                  <!-- <?php
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
                  ?> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
         

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<!-- quick Reciept two -->
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
               <div class="row headFootColor">
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
                                }  else if($rec["testDetails"]->type=='farm_visited')
                                                  {
                                                    echo "Farm Visited"; 
                                                  } 
                                ?></strong>
  </div>
  <div class="col-md-4"><strong style="font-size: 26px;">RECEIPT</strong></div>
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
              <!-- Table row -->
           <!--  <b style="text-decoration: underline;"><?// strtoupper($rec['testDetails']->testHelp_name); ?></b><br> -->
           <div class="row">
             <div class="col-4"></div>
             <div class="col-4"> <strong style="font-size: 22px;">TEST DETAIL</strong></div>
             <div class="col-4"></div>
           </div>
              <div class="row">
                <div class="col-12">
                        <table class="table">
                          <thead>
                          <tr>
                            <th>Test Required</th>
                            <th>Sample/Specimen</th>
                            <th>Sample/Specimen detail</th>
                            <th>Fee(PKR)</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td><?=  $rec['testDetails']->testHelp_name; ?></td>
                            <td><?=  $rec['testDetails']->sample_name; ?></td>
                            <td><?=  $rec['testDetails']->sample_desc; ?></td>
                            <td><?=  number_format($rec['testDetails']->test_total_fee,2); ?></td>
                          </tr>
                          <tr>
                            <th colspan="2">&nbsp;</th>
                            <th colspan="">Total Charges</th>
                            <td><strong><?=  number_format($rec['testDetails']->test_total_fee,2); ?> PKR</strong></td>
                          </tr>
                          </tbody>
                        </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6" style="display: none;">
                  <b class="text-primary" style="font-size: 18px;">Additional Information</b>
                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <?=  $rec['testDetails']->additional_info; ?>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <!-- <p class="lead">Amount Due 2/22/2014</p> -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                 <div class="col-md-12">
               <strong class="text-danger">Note: You can View & Print your Test Report from " livestockres.kp.gov.pk/page/kplims " by using the above Tracking #</strong>
                </div>
                <!-- <div class="col-md-3"></div> -->
                 
              </div>
              <hr>
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
                  <!-- <?php
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
                  ?> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
         

      </div><!-- /.container-fluid -->
    </section>
<!-- ./quick reciept two end -->


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
<style type="text/css">
  @media print {
      @page { margin: 0; }
      p { page-break-after: always; }
      #duplicatePrint{ display: block; }
  }
  
</style>
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
      // $('#DuplicateprintRow').append(``);
    window.print();

  }
</script>