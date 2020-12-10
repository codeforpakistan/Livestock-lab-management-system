<?php
// $count      = $this->API_m->countAllRows('testDetails');
//         $trackingID = $count+1 . date('m').date('y');
//         echo  $trackingID;
//         exit();
//      $this->db->where('tracking_id',$trackingID)->get('testdetails')->row();
//      do
//      {
//        $trackingID      = rand(99, 9999).date('m').date('y');;  
//        $tracking_record = $this->db->where('tracking_id',$trackingID)->get('testdetails')->row();
     
//      }
//      while(!empty($tracking_record));

?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
    <!-- Register New Test  -->
        
      </h1>
     
    </section>

    <!-- Main content -->
<section class="content">
    <div class="row">
      <div class="col-3">
        <small class="float-left">Date: <?= date('M d Y'); ?></small>
      </div>
       <div class="col-6" style="text-align: center;">
        
      </div>
       <div class="col-3">
         <small class="float-right">Lab #: <?= $logLab->lab_id; ?></small>
      </div>
      <!-- /.col -->
    </div>
    <hr>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card">
             


            <div class="card-header with-border">
              <b> Register New Test</b>
               <?php include'MessageAlert.php'; ?>

            </div>
                 <form action="<?= base_url('Tests/AddNewTestRec'); ?>" method="post"  enctype="multipart/form-data" >
        <div class="card-body">
          <div class="row"> 
            <div class="col-md-12">
              <div class="row">
                 <div class="col-sm-12 form-group">
                    <label>Source Type</label>
                     <select class="form-control" id="client_type" onchange="GetClientType(this.value)" style="width: 100% !important"  name="client_type" required>
                        <option value="">-Select-</option>
                        <option value="farmer">Farmer/Owner</option>
                        <option value="Patient">Patient/Human</option>
                        <option value="own_dept">Own Department</option>
                        <option value="other_dept">Other Department</option>
                        <option value="farm_visited">Farm Visited</option>
                      </select>
                 </div>
              </div>
              <b class="text-success" id="source_info">Source Information</b>
                <hr>
               <div class="row" id="source_row">
                     <div class="col-sm-3 form-group div_deptName">
                    <label id="label_deptName">Department Name</label>
                    <input type="text" name="dept_name" placeholder="Enter  Department Name" class="form-control dept_name ownDeptt">
                    </div>
                    <div class="col-sm-3 form-group div_dept_phone">
                    <label id="deptPhone">Department Phone#</label>
                    <input type="text" name="dept_phone" id="deptPhone"  placeholder="Enter  Phone#" class="form-control ownDeptt_phone" maxlength="12" >
                    </div>
                    <div class="col-sm-3 form-group div_source_cnic">
                    <label id="lebClient">Farmer/Owner/CNIC#</label>
                    <input type="text" name="client_cnic" data-inputmask="'mask': ['99999-9999999-9']"  data-mask="" id="client_cnic" onblur="GetClient_cnic()"  placeholder="Enter  CNIC#" class="form-control clientCnic" maxlength="15">
                    </div>
                   <div class="col-sm-3 form-group div_source_Name">
                    <label id="label_name">Name</label>
                    <input type="text" name="client_name" id="client_name" placeholder="Enter  Name" class="form-control client_name frmerName" >
                    </div>
                    <div class="col-sm-3 form-group div_source_contact">
                    <label id="label_contact">Contact#</label>
                    <input type="text" name="client_contact" id="client_contact" data-inputmask="'mask': ['9999-9999999']"  data-mask=""  placeholder="Enter  Contact" class="form-control client_contact" maxlength="12" >
                    </div>
                    
                <!--      <div class="col-sm-3 form-group">
                    <label>Referred by</label>
                    <input type="text" name="referred_by"  placeholder="Enter Referred by" class="form-control referred_by">
                    </div> -->
                     <div class="col-sm-3 form-group div_source_contact">
                    <label>District</label>
                     <select class="form-control  districtid" name="district_id" onchange="GetTehsils(this.value)">
                      <option value="">-select-</option>
                      <?php
                          if($districts)
                          {
                            foreach($districts as $dis)
                            {
                      ?>
                      <option value="<?= $dis->district_id; ?>"><?= $dis->district_name; ?></option>
                      <?php
                            }
                          }
                      ?>
                    </select>
                    </div>
                     <div class="col-sm-3 form-group div_source_contact">
                    <label>Tehsil</label>
                    <select class="form-control tehsil_id tehsilid" name="tehsil_id">
                      <option value="">-select-</option>
                    </select>
                    </div>
                    <div class="col-sm-4 form-group div_source_address">
                    <label id="client_address">Village/UC/Area</label>
                    <input type="text" name="client_vil_uc_area"  placeholder="Enter Village/UC/Area" class="form-control client_vil_uc_area">
                    </div>
                     <div class="col-sm-4 form-group div_source_address">
                    <label id="client_address">Address</label>
                    <input type="text" name="client_address"  placeholder="Enter Address" class="form-control client_address">
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>Referred by</label>
                    <input type="text" name="sender_name"  value="nill" placeholder="Enter Referred by name" class="form-control">
                    </div>
                     <div class="col-sm-3 form-group">
                    <label>Designation</label>
                  <input type="text" name="sender_designation" value="nill"  placeholder="Enter Referred Designation" class="form-control">
                    </div>
                </div>
                 <b class="text-success animal_info">Animal Information</b>
                <hr>
                <div class="row">
                    <div class="col-sm-4 form-group animal_info">
                      <label>Animal Type </label>
                        <select class="form-control cattle_id" onchange="GetBreeds(this.value);"  name="cattle_name"  style="width: 100%" >
                          <option value="">-select-</option>
                        <?php 
                        foreach ($cattles as $cattle) {
                          # code...
                          ?>
                          <option  value="<?php echo $cattle->cattle_id; ?>"><?php echo $cattle->cattle_name; ?></option>
                          <?php 
                        }

                         ?>
                      </select>
                    </div>  
                    <div class="col-sm-4 form-group animal_info">
                      <label> Breed</label>
                       <select class="form-control breed_id"  name="cattle_breed"  style="width: 100%" >
                        <option  value="">-select-</option>
                      </select>
                    </div> 
                    <div class="col-sm-4 form-group animal_info">
                      <label> Tag#</label>
                      <input type="text" name="cattle_tag_no"  placeholder="Enter Animal Tag No" class="form-control " >
                    </div>  
                    <div class="col-sm-4 form-group ">
                      <label> Sex</label>
                      <select class="form-control"  name="cattle_sex"  style="width: 100%" required>
                          <option value="">-select-</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>

                    </div>   
                    <div class="col-sm-6 form-group ">
                      <label> Age (Year & Month)</label>
                      <div class="row">
                        <div class="col-md-3 ">
                           <input type="number" class="form-control humanAge" value="0" name="cattle_year"  style="display: none;" >
                           <select class="animalAge form-control"  name="cattle_year"  style="width: 160px;" >
                              <option value="">-Year-</option>
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                          </select>
                        </div>
                          <!-- <div class="col-sm-1"> -->
                            <b style="margin-left: 25px;">&</b>
                          <!-- </div> -->
                        <div class="col-md-3">
                           <select class="form-control"  name="cattle_month"  style="width: 150px; margin-left: 10px" required>
                              <option value="">-Month-</option>
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                          </select>
                        </div>
                          <div class="col-md-5">
                          </div>
                      </div>
                    </div>   
                      <div class="col-sm-6 form-group">
                      <label>History/Symptoms</label>
                      <textarea name="symptoms_info" placeholder="Write in a few words" class="form-control"></textarea>
                      </div>
                      <div class="col-sm-6 form-group">
                      <label>Additional Information</label>
                      <textarea name="additional_info" placeholder="Write in a few words" class="form-control"></textarea>
                      </div>
                </div>
                   <b class="text-success animal_info">House hold or Farm Information</b><hr>
                   <div class="row animal_info">
                      <div class="col-md-2 form-group">
                        <label> Cows #</label>
                        <input type="number" name="cows_no" min="0" value="0" placeholder="Enter Cows No" class="cows_no form-control  cattleCount" >
                      </div>
                      <div class="col-md-2 form-group">
                        <label> Buffalos #</label>
                        <input type="number" name="buffalos_no" min="0" value="0" placeholder="Enter Buffalos No" class="buffalos_no form-control cattleCount" >
                      </div>
                      <div class="col-md-2 form-group">
                        <label> Goat #</label>
                        <input type="number" name="goat_no" min="0" value="0" placeholder="Enter Goat No" class="goat_no form-control cattleCount" >
                      </div>
                      <div class="col-md-2 form-group">
                        <label> Sheep #</label>
                        <input type="number" name="sheep_no" min="0" value="0" placeholder="Enter Sheep No" class="sheep_no form-control cattleCount" >
                      </div> 
                        <div class="col-md-2 form-group">
                        <label> Other </label>
                        <input type="number" name="cattle_other_no" min="0" value="0" placeholder="Enter Animal Total No" class="cattle_other_no form-control cattleCount" >
                      </div>
                       <div class="col-md-2 form-group">
                        <label> Total </label>
                        <input type="number" name="cattle_total_no" value="0" placeholder="Enter Animal Total No" class="cattle_total_no form-control cattleTotal" readonly>
                      </div>
                   </div>
                 <b class="text-success" id="source_info">Test  Information</b><hr>
              <div class="row">
                    <div class="col-sm-4 form-group">
                    <label>Test to be Conducted</label>
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
                     <div class="col-sm-4 form-group">
                        <label>Sample/Specimen</label>
                        <select class="form-control " id="test_sample_id" style="width: 100% !important" name="sample_id" required>
                          <option value="">-select-</option>
                        </select>
                    </div>
                     <div class="col-sm-4 form-group">
                          <label>Sample/Specimen Details</label>
                        <textarea name="sample_desc" rows="2" cols="10" placeholder="Write in a few words" class="form-control"></textarea>
                    </div>
                   
                     <div class="col-sm-4 form-group">
                    <label>Fee (PKR)</label>
                    <input type="number" name="test_total_fee"  onBlur="if (this.value < 1) { this.value = '0.00';}" value="0.00"  placeholder="Enter Test Fee" class="form-control testHelp_fee testPrice" required>
                    </div>
                    <div class="col-sm-4 form-group">
                    <label>Received Date</label>
                    <input type="text" name="received_date"   placeholder="Enter Date" value="<?= date('m/d/Y') ?>" id="tbDate" class="form-control  datepicker" required>
                    </div>
                   
                  <!--  <div class="col-sm-4 form-group">
                    <label>House hold & Farm Info</label>
                    <textarea name="house_hold_or_farm_info" placeholder="Write in a few words" class="form-control"></textarea>
                   </div> -->
                    
                </div>
              
               
                 <!-- <b class="text-success">Result  Info</b> -->
                <hr>
                

               <div class="row" id="fmastitis" class="none">
                <hr>
                   <div class="col-sm-3 form-group">
                    <label>Calving Kidding Lambing date</label>
                    <input type="text" name="cal_kid_lambing_date" value="<?= date('m/d/Y') ?>" class="form-control datepicker" >
                  </div>
                   <div class="col-sm-3 form-group">
                    <label>Daily Milk Production (LTRs)</label>
                    <input type="text" name="daily_milk_production" placeholder="Daily Milk Production" class="form-control" >
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>Lactation No#</label>
                     <select class="form-control"  name="lactation_no"  style="width: 100%" >
                        <option value="">-Select-</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>No of Animals at Farm</label>
                    <input type="text" name="total_animals_at_farm"  placeholder="Enter Total Animals Farm" class="form-control " >
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>In Milk</label>
                    <input type="number" name="in_milk"  placeholder="Enter In Milk" class="form-control">
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>Dry Period Given</label>
                    <input type="text" name="dry_period_given"  placeholder=" Enter Dry Period Given" class="form-control " >
                    </div>
                    <!-- <div class="row"> -->
                    <div class="col-sm-3 form-group">
                    <label>Previous Mastitis Record of the Animal</label>
                    <select name="prev_mastatis_rec_of_anim" class="form-control">
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>Previous Mastitis Record of the farm</label>
                    <select name="prev_mastatis_rec_of_farm" class="form-control">
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>Practice of Mastatis Test at the Farm</label>
                    <select name="prac_mastatis_test_at_farm" class="form-control">
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    </div>
                  <!-- </div> -->
                   
                </div>
                <div class="row" id="f_human" class="none">
                <hr>
                   <div class="col-sm-4 form-group">
                    <label>Clinical Sign</label>
                    <input type="text" name="clinical_sign"  class="form-control" >
                  </div>
                    <div class="col-md-4 form-group">
                    <label>Animal Contact</label>
                    <select name="animal_contact" class="form-control">
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    </div>
                    <div class="col-md-4 form-group">
                    <label>Treatment Used (if any)</label>
                      <input type="text" name="treatment_used"  class="form-control" >
                    </div>
                </div>
                <div class="row" id="f_animal" class="none">
                <hr>
                    <div class="col-md-4 form-group">
                    <label>Parity</label>
                      <input type="number" name="parity"  class="form-control" >
                    </div>
                    <div class="col-md-4 form-group">
                    <label>Abortion History</label>
                    <select name="abortion_history" onchange="abortionStatus(this.value);" class="form-control abortionHistory">
                      <option value="">-Select-</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    </div>
                    <div class="col-sm-4 form-group dateAbortion">
                    <label>Date of Abortion</label>
                    <input type="text" name="vac_against_brucellosis"  class="form-control datepicker" >
                  </div>
                   <div class="col-sm-4 form-group">
                    <label>Vaccination against Brucellosis</label>
                     <select name="vac_against_brucellosis" class="form-control">
                      <option value="">-Select-</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                </div>
                 <div class="row" id="afb" class="none">
                <hr>
                   <div class="col-sm-3 form-group">
                     <label>Parity</label>
                     <input type="number" name="parity"  class="form-control" >
                  </div>
                    <div class="col-sm-3 form-group">
                      <label>Daily Milk Production</label>
                      <input type="text" name="daily_milk_production"  class="form-control" >
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3"></div>
                </div>
                    <div class="form-group">
                      <button onclick="return confirm('Are you sure to submit Record?');" type="submit" class="btn btn-success pull-right" >Submit</button><br><br>
                    </div>
                  </div>
                </div>
                </form>
          </div>
          <!-- </div> -->
        </div>
      </div>
      </div>
      <!-- /.row -->
    </section>
     
</div>



  
 
   
   



<script>
  $(document).ready(function(){
    $('.dateAbortion').hide();

    $('.cattleCount').blur(function(){
      var cnt = parseInt($('.cows_no').val())+parseInt($('.buffalos_no').val())+parseInt($('.goat_no').val())+parseInt($('.sheep_no').val())+parseInt($('.cattle_other_no').val());
        $('.cattleTotal').val(cnt);

    });
  });
function abortionStatus(val)
{ 
  if(val=='Yes')
  {
    $('.dateAbortion').show();
  }
  else
  {
    $('.dateAbortion').hide();
  }
}

</script>