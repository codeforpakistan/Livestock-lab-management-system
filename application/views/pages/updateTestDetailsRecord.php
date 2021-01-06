<?php
  // echo "<pre>";
  // print_r($rec);
  // exit();
date_default_timezone_set('Asia/Karachi');
  // $col = '';
  // if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==0)
  // {
  //   $col = '9';
  // }else
  // {
  //   $col = '12'; 
  // }
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
    <!-- Update Test Result --> 
        
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
              <b>Feed Test Result</b> <?php include'MessageAlert.php'; ?>
            </div>
            <div class="card-body">
                 <form action="<?= base_url('Tests/update_testDetails_Record'); ?>" method="post"  enctype="multipart/form-data" >
                  <input type="hidden" name="testDetails_id" value="<?= $rec['testDetails']->testDetails_id;?>"> 
                  <input type="hidden" name="client_id" value="<?= $rec['testDetails']->client_id;?>"> 
                  <input type="hidden" name="test_id" value="<?= $rec['testDetails']->test_id; ?>">

          <div class="row">
         
            <div class="col-md-9">
               <!-- <b class="text-success">Test Result Info</b> -->
                 <?php 
                    if($rec['testDetails']->testHelp_id==1)
                    {
                ?>
                <input type="hidden" name="impression_smear_id" value="<?= $rec['testType']->impression_smear_id;?>"> 
                 
                 <div class="row" id="impression_smear">
                    <div class="col-sm-4 form-group">
                      <label>Result</label>
                      <input type="text" name="result" value="<?= $rec['testType']->result ?>"  placeholder="Enter Result" class="form-control " required> 
                    </div>   
                      <div class="col-sm-6 form-group">
                          <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <p style="font-size: 18px !important; color: black;">bacteria was observed in the impression smear after gram staining</p>
                      </div>
                     
          <!-- </div> -->
                <?php
                    }
                    else if($rec['testDetails']->testHelp_id==2)
                    {
                ?>
<input type="hidden" name="haematology_id"          value="<?= $rec['testType']->haematology_id; ?>">
                 <div class="row">
                   <div class="col-sm-3">
                    <label>WBC</label>
                     <div class="input-group mb-3">
                       <input type="text" name="WBC" value="<?= $rec['testType']->WBC; ?>"  placeholder="Enter WBC" class="form-control" required>
                          <div class="input-group-append">
                        <span class="input-group-text">x10  <sup>9</sup>/L</span>
                      </div>
                    </div>
                    </div>
                    <!-- Others start -->
                    <?php
                       if($rec['testDetails']->cattle_name!=2 && $rec['testDetails']->cattle_name!=4 && $rec['testDetails']->cattle_name!=5 &&$rec['testDetails']->cattle_name!=7)
                        { 
                    ?>
                    <div class="col-sm-3">
                    <label>Lymph#</label>
                     <div class="input-group mb-3">
                       <input type="text" name="lymph1" value="<?= $rec['testType']->lymph1; ?>"  placeholder="Enter Lymph#" class="form-control" required>
                          <div class="input-group-append">
                        <span class="input-group-text">x10  <sup>9</sup>/L</span>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <label>Mon#</label>
                     <div class="input-group mb-3">
                       <input type="text" name="mon1" value="<?= $rec['testType']->mon1; ?>"  placeholder="Enter Mon#" class="form-control" required>
                          <div class="input-group-append">
                        <span class="input-group-text">x10  <sup>9</sup>/L</span>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <label>Gran#</label>
                     <div class="input-group mb-3">
                       <input type="text" name="gran1" value="<?= $rec['testType']->gran1; ?>"  placeholder="Enter Gran#" class="form-control" required>
                          <div class="input-group-append">
                        <span class="input-group-text">x10  <sup>9</sup>/L</span>
                      </div>
                    </div>
                    </div>
                     <div class="col-sm-3">
                    <label>Lymph%</label>
                     <div class="input-group mb-3">
                       <input type="text" name="lymph1" value="<?= $rec['testType']->lymph2; ?>"  placeholder="Enter Lymph#" class="form-control" required>
                          <div class="input-group-append">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <label>Mon%</label>
                     <div class="input-group mb-3">
                       <input type="text" name="mon1" value="<?= $rec['testType']->mon2; ?>"  placeholder="Enter Mon%" class="form-control" required>
                          <div class="input-group-append">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-3">
                    <label>Gran%</label>
                     <div class="input-group mb-3">
                       <input type="text" name="gran1" value="<?= $rec['testType']->gran2; ?>"  placeholder="Enter Gran%" class="form-control" required>
                          <div class="input-group-append">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>
                    </div>
                  <?php
                    }
                  ?>
                    <!-- Others End -->

                    <div class="col-sm-3 form-group">
                    <label>RBC</label>
                     <div class="input-group mb-3">
                      <input type="text" name="RBC" value="<?= $rec['testType']->RBC; ?>"   placeholder="Enter RBC" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text">x10  <sup>12</sup>/L</span>
                      </div>
                    </div>
                    
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>HGB</label>
                       <div class="input-group mb-3">
                      <input type="text" name="HGB" value="<?= $rec['testType']->HGB; ?>"   placeholder="Enter HGB" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text">g/dL</span>
                      </div>
                    </div>
                   
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>HCT</label>
                       <div class="input-group mb-3">
                     <input type="text" name="HCT" value="<?= $rec['testType']->HCT; ?>"   placeholder="Enter HCT" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>
                    
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>MCV</label>
                       <div class="input-group mb-3">
                      <input type="text" name="MCV" value="<?= $rec['testType']->MCV; ?>"   placeholder=" Enter MCV" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text">fL</span>
                      </div>
                    </div>
                   
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>MCH</label>
                       <div class="input-group mb-3">
                       <input type="text" name="MCH" value="<?= $rec['testType']->MCH; ?>"   placeholder=" Enter MCH" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text">pg</span>
                      </div>
                    </div>
                  
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>MCHC</label>
                       <div class="input-group mb-3">
                     <input type="text" name="MCHC" value="<?= $rec['testType']->MCHC; ?>"   placeholder=" Enter MCHC" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text">g/dl</span>
                      </div>
                    </div>
                    
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>RDW</label>
                       <div class="input-group mb-3">
                      <input type="text" name="RDW" value="<?= $rec['testType']->RDW; ?>"   placeholder=" Enter RDW" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>
                   
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>PLT</label>
                       <div class="input-group mb-3">
                      <input type="text" name="PLT" value="<?= $rec['testType']->PLT; ?>"   placeholder=" Enter PLT" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text">x10  <sup>9</sup>/L</span>
                      </div>
                    </div>
                    
                    </div> 
                    <div class="col-sm-3 form-group">
                    <label>MPV</label>
                       <div class="input-group mb-3">
                     <input type="text" name="MPV" value="<?= $rec['testType']->MPV; ?>"   placeholder=" Enter MPV" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text">fL</span>
                      </div>
                    </div>
                    
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>PDW</label>
                       <div class="input-group mb-3">
                      <input type="text" name="PDW" value="<?= $rec['testType']->PDW; ?>"   placeholder=" Enter PDW" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text"></span>
                      </div>
                    </div>
                   
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>PCT</label>
                       <div class="input-group mb-3">
                     <input type="text" name="PCT" value="<?= $rec['testType']->PCT; ?>"   placeholder=" Enter PCT" class="form-control " required>
                          <div class="input-group-append">
                        <span class="input-group-text">%</span>
                      </div>
                    </div>
                   
                    </div>
                <!-- </div> -->
                <?php
                    }
                    else if($rec['testDetails']->testHelp_id==3)
                    {
                ?>
          <input type="hidden" name="mastitis_id" value="<?= $rec['testType']->mastitis_id; ?>">
          <div class="row">
             <div class="col-sm-3 form-group">
                   <label>Result Status</label>
                     <select class="form-control NegResult_status" name="result_status" required>
                       <option value="">-select-</option>
                       <option value="Negative">Negative</option>
                       <option value="Positive">Positive</option>
                     </select>
              </div>
               <div class="col-sm-3 form-group negStatus">
                   <label>PH:</label>
                     <input type="number" name="neg_ph" value="0.00"  class="form-control">
              </div>
               <div class="col-sm-3 form-group negStatus">
                   <label>S.C.C</label>
                    <input type="number" name="neg_ssc" class="form-control">
              </div>
               <div class="col-sm-3 form-group negStatus">
                   <label>Gross Appearance</label>
                       <select name="neg_gross_appearance" class="form-control clinical_gp_val">
                        <option value="">-select-</option>
                        <option value="Beads">Beads</option>
                        <option value="Clots">Clots</option>
                        <option value="Bloody">Bloody</option>
                        <option value="Yellowish">Yellowish</option>
                        <option value="Greenish">Greenish</option>
                        <option value="Normal">Normal</option>
                        <option value="Other">Other</option>
                      </select>
              </div>
          </div>
        <div class="row" >
               
                <hr>
                <div class="col-sm-4 form-group clinical_or_sub">
                  <h5>Please select the Mastitis Type?</h5>
                   <label>
                    Clinical
                    <input type="radio" name="clinical_or_sub"  value="Clinical" class="clinical" checked>
                  </label>
                </div>  
                <div class="col-sm-4 form-group clinical_or_sub">
                   <h5>&nbsp;&nbsp;</h5>
                 <label>
                   Sub Clinical
                    <input type="radio" name="clinical_or_sub" value="Sub Clinical"  class="sub_clinical">
                  </label>
                </div> 
                <div class="col-sm-4"></div>
                <hr>
                 <div class="col-sm-4 composite_or_ind form-group">
                <h5>Please select Source of milk?</h5>
                   <label>
                    Composite Milk
                    <input type="radio" name="composite_or_ind" value="Composite" class="compositeVal compositeInd" >
                  </label>
                </div>  
                <div class="col-sm-4 composite_or_ind form-group">
                  <h5>&nbsp;&nbsp;</h5>
                 <label>
                   Individual Milk
                    <input type="radio" name="composite_or_ind" value="Individual" class="individualVal compositeInd">
                  </label>
                </div>
                <div class="col-sm-4 checkRow"></div>

                <!-- <div class="row"> -->
                    <div class="col-sm-3 checkRow  form-group">
                     <label>
                      R1(RF)
                      <input type="checkbox" name="r1" class="r1Check">
                    </label>
                    </div>  
                    <div class="col-sm-3 checkRow  form-group">
                     <label>
                      R2 (RH)
                        <input type="checkbox" name="r2" class="r2Check">
                      </label>
                    </div> 
                    <div class="col-sm-3 checkRow  form-group">
                       <label>
                        L1 (LF)
                        <input type="checkbox" name="l1" class="l1Check">
                      </label>
                    </div>  
                    <div class="col-sm-3 checkRow  form-group">
                     <label>
                       L2 (LH)
                        <input type="checkbox" name="l2" class="l2Check">
                      </label>
                    </div> 
                <!-- </div>   -->
                <div class="col-sm-4 mastitisLabel  clinical_or_sub form-group">
                  <label>Mastitis:</label>
                  Clinical Mastitis
                </div>  
                <div class="col-sm-3 clinical_gp form-group clinical_or_sub">
                  <label class="clinical_gpLabel">Gross Appearance:</label>
                </div>    
                <div class="col-sm-3 clinical_gp clinical_or_sub form-group">
                   <select name="clinical_gross_appearance" class="form-control clinical_gp_val">
                      <option value="">-select-</option>
                      <option value="Beads">Beads</option>
                      <option value="Clots">Clots</option>
                      <option value="Bloody">Bloody</option>
                      <option value="Yellowish">Yellowish</option>
                      <option value="Greenish">Greenish</option>
                      <option value="Normal">Normal</option>
                      <option value="Other">Other</option>
                    </select>
                </div>
                 <table class="table table-bordered table_Ind">
                    <thead  id="tableInd">
                      <th>QUARTERS</th>
                      <th>MASTITIS(Severity)</th>
                      <th>MILK PH</th>
                      <th>S.C.C <span style="font-size: 12px;">(SC/ml)</span></th>
                      <th>GROSS APPEARANCE</th>
                    </thead>
                    <tbody>
                       <tr id="compositeRow">
                          <td>Composite
                            <input type="hidden" name="quarters" value="Composite">
                          </td>
                          <td>
                            <select  name="mastitis_severity" class="form-control">
                              <option value="">-select-</option>
                              <option value="Negative">Negative &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- </option>
                              <option value="Mild">Mild &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ </option>
                              <option value="Moderate">Moderate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;++ </option>
                              <option value="Severe">Severe&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+++ </option>
                            </select>
                          </td>
                          <td><input type="number" name="milk_ph" value="0.00" class="form-control"></td>
                          <td><input type="number" name="s_c_c" class="form-control"></td>
                          <td>
                            <select name="gross_appearance" class="form-control">
                              <option value="">-select-</option>
                              <option value="Beads">Beads</option>
                              <option value="Clots">Clots</option>
                              <option value="Bloody">Bloody</option>
                              <option value="Yellowish">Yellowish</option>
                              <option value="Greenish">Greenish</option>
                              <option value="Normal">Normal</option>
                              <option value="Other">Other</option>
                            </select>
                          </td>
                      </tr>
                      <tr id="r1Row">
                        <td>R1 (RF)
                          <input type="hidden" name="quarters" value="R1">
                        </td>
                        <td>
                          <select  name="mastitis_r1" class="form-control">
                            <option value="">-select-</option>
                             <option value="Negative">Negative &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- </option>
                              <option value="Mild">Mild &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ </option>
                              <option value="Moderate">Moderate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;++ </option>
                              <option value="Severe">Severe&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+++ </option>
                          </select>
                        </td>
                        <td><input type="number" name="milk_ph_r1" value="0.00" class="form-control"></td>
                        <td><input type="number" name="s_c_c_r1" class="form-control"></td>
                        <td>
                          <select name="gross_appearance_r1" class="form-control">
                            <option value="">-select-</option>
                            <option value="Beads">Beads</option>
                            <option value="Clots">Clots</option>
                            <option value="Bloody">Bloody</option>
                            <option value="Yellowish">Yellowish</option>
                            <option value="Greenish">Greenish</option>
                            <option value="Normal">Normal</option>
                            <option value="Other">Other</option>
                          </select>
                        </td>
                      </tr>
                       <tr id="r2Row">
                        <td>R2 (RH)
                          <input type="hidden" name="quarters" value="R2">
                        </td>
                        <td>
                          <select  name="mastitis_r2" class="form-control">
                            <option value="">-select-</option>
                            <option value="Negative">Negative &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- </option>
                              <option value="Mild">Mild &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ </option>
                              <option value="Moderate">Moderate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;++ </option>
                              <option value="Severe">Severe&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+++ </option>
                          </select>
                        </td>
                        <td><input type="number" name="milk_ph_r2" value="0.00" class="form-control"></td>
                        <td><input type="number" name="s_c_c_r2" class="form-control"></td>
                        <td>
                          <select name="gross_appearance_r2" class="form-control">
                            <option value="">-select-</option>
                            <option value="Beads">Beads</option>
                            <option value="Clots">Clots</option>
                            <option value="Bloody">Bloody</option>
                            <option value="Yellowish">Yellowish</option>
                            <option value="Greenish">Greenish</option>
                            <option value="Normal">Normal</option>
                            <option value="Other">Other</option>
                          </select>
                        </td>
                      </tr>
                       <tr id="l1Row">
                        <td>L1 (LF)
                          <input type="hidden" name="quarters" value="L1">
                        </td>
                        <td>
                          <select  name="mastitis_l1" class="form-control">
                            <option value="">-select-</option>
                           <option value="Negative">Negative &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- </option>
                              <option value="Mild">Mild &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ </option>
                              <option value="Moderate">Moderate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;++ </option>
                              <option value="Severe">Severe&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+++ </option>
                          </select>
                        </td>
                        <td><input type="number" name="milk_ph_l1" value="0.00" class="form-control"></td>
                        <td><input type="number" name="s_c_c_l1" class="form-control"></td>
                        <td>
                          <select name="gross_appearance_l1" class="form-control">
                            <option value="">-select-</option>
                            <option value="Beads">Beads</option>
                            <option value="Clots">Clots</option>
                            <option value="Bloody">Bloody</option>
                            <option value="Yellowish">Yellowish</option>
                            <option value="Greenish">Greenish</option>
                            <option value="Normal">Normal</option>
                            <option value="Other">Other</option>
                          </select>
                        </td>
                      </tr>
                      <tr id="l2Row">
                        <td>L2 (LH)
                          <input type="hidden" name="quarters" value="L2">
                        </td>
                        <td>
                          <select  name="mastitis_l2" class="form-control">
                            <option value="">-select-</option>
                            <option value="Negative">Negative &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- </option>
                              <option value="Mild">Mild &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+ </option>
                              <option value="Moderate">Moderate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;++ </option>
                              <option value="Severe">Severe&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+++ </option>
                          </select>
                        </td>
                        <td><input type="number" name="milk_ph_l2" class="form-control"></td>
                        <td><input type="number" name="s_c_c_l2" class="form-control"></td>
                        <td>
                          <select name="gross_appearance_l2" class="form-control">
                            <option value="">-select-</option>
                            <option value="Beads">Beads</option>
                            <option value="Clots">Clots</option>
                            <option value="Bloody">Bloody</option>
                            <option value="Yellowish">Yellowish</option>
                            <option value="Greenish">Greenish</option>
                            <option value="Normal">Normal</option>
                            <option value="Other">Other</option>
                          </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                     <div class="col-sm-6 form-group" style="display: none;">
                      <label>Refer to Bacteriology Section for</label>
                      <input type="text" name="refer_to_bacteriology_sec_for"  class="form-control">
                      </div>
                </div>
                <div class="row">
                  
               
                <?php
                    }
                    else if($rec['testDetails']->testHelp_id==4)
                    {
                ?>
                  <input type="hidden" name="culture_sensitivity_id"  value="<?= $rec['testType']->culture_sensitivity_id; ?>">
                   <div class="row" id="culture_sensitivity">
                     <div class="col-sm-4 form-group">
                      <label>Culture Report: Bacterial Specie isolated</label>
                      </div>
                     <div class="col-sm-6 form-group">
                      <input type="text" name="reports"  class="form-control" placeholder="Enter Bacterial Specie isolated Name">
                      </div>
                      <div class="col-sm-2"></div>
  <table class="table table-condenced">
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
        <select name="amipicilin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>18</td>
     <th>Kanamycin</th>
      <td>
        <select name="kanamycin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr>
     <tr>
      <td>2</td>
     <th>Ampiclox</th>
      <td>
        <select name="ampiclox" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>19</td>
      <th>Lincomycin</th>
      <td>
        <select name="lincomycin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr> 
    <tr>
      <td>3</td>
      <th>Amoxicillin</th>
      <td>
        <select name="amoxicillin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>20</td>
      <th>Norfloxacin</th>
      <td>
        <select name="norfloxacin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>4</td>
     <th>Augmentin</th>
      <td>
        <select name="augmentin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>21</td>
      <th>Neomycin Claforan</th>
      <td>
        <select name="neomycin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr> 
     <tr>
      <td>5</td>
     <th>Cephradin</th>
      <td>
        <select name="cephradin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>22</td>
     <th>Negram</th>
      <td>
        <select name="negram" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr>
     <tr>
      <td>6</td>
      <th>Cephradin</th>
      <td>
        <select name="cephradin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>23</td>
       <th>Oxytetracyclin</th>
      <td>
        <select name="oxytetracyclin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr>
     <tr>
      <td>7</td>
     <th>Ciprofloxacin</th>
      <td>
        <select name="ciprofloxacin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>24</td>
      <th>Ofloxacinl</th>
      <td>
        <select name="ofloxacinl" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr> 
    <tr>
      <td>8</td>
      <th>Cloacilin</th>
      <td>
        <select name="cloacilin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>25</td>
     <th>Penicillin</th>
      <td>
        <select name="penicillin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr> 
    <tr>
      <td>9</td>
     <th>Cefotaxime Clavulanic acid</th>
      <td>
        <select name="cefotaxime_Clavulanic_acid" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>26</td>
     <th>Polymixin-B</th>
      <td>
        <select name="polymixin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr>
     <tr>
      <td>10</td>
      <th>Chlorampherical</th>
      <td>
        <select name="chlorampherical" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>27</td>
      <th>Sulphamethoxazoe</th>
      <td>
        <select name="sulphamethoxazoe" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr> 
    <tr>
      <td>11</td>
    <th>Doxycycline</th>
      <td>
        <select name="doxycycline" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>28</td>
       <th>Streptomycin</th>
      <td>
        <select name="streptomycin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr> 
    <tr>
      <td>12</td>
       <th>Doxyeyclin</th>
        <td>
          <select name="doxyeyclin" class="form-control">
            <option value="N/A" >N/A</option>
            <option value="Sensitive">Sensitive</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Resistent">Resistent</option>
          </select>
        </td>
     
      <td>29</td>
      <th>Sulfamethoxazole</th>
      <td>
        <select name="sulfamethoxazole" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>13</td>
       <th>Enrofloxacin</th>
      <td>
        <select name="enrofloxacin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>30</td>
      <th>Sulfamethoxazole Trimethoprim</th>
      <td> 
        <select name="sulfamethoxazoleTrimethoprim" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr>
     <tr>
      <td>14</td>
      <th>Erythromycin</th>
      <td>
        <select name="erythromycin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>31</td>
      <th>Toramycin</th>
      <td>
        <select name="toramycin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
     
    </tr>
    <tr>
      <td>15</td>
       <th>FLoramphenical</th>
      <td> 
        <select name="fLoramphenical" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>32</td>
      <th>Tylosin</th>
      <td> 
        <select name="tylosin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>16</td>
      <th>Flumiquine</th>
      <td>
        <select name="flumiquine" class="form-control">
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>33</td>
      <th>Tilmicosin</th>
      <td> 
        <select name="tilmicosin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>17</td>
      <th>Gentamicin</th>
      <td>
        <select name="gentamicin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
      <td>34</td>
       <th>Urixin</th>
      <td>
        <select name="urixin" class="form-control">
          <option value="N/A" >N/A</option>
          <option value="Sensitive">Sensitive</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Resistent">Resistent</option>
        </select>
      </td>
    </tr>
  </tbody>
</table>
                    <!-- </div> -->
                <?php
                    }else if($rec['testDetails']->testHelp_id==5)
                    {
                ?>
               <input type="hidden" name="urine_id"   value="<?= $rec['testType']->urine_id; ?>">
               <div class="row" >
                   <table class="table" style="width:100%" >
     <thead>
          <tr>
               <th colspan="2">Physical & Chemical Examination</th>
               <th colspan="2">Microscopic Examination</th>
          </tr>
     </thead>
    <tbody>
          <tr>
               <th>Colour</th>
               <td><input type="text" name="colour" value="" placeholder="Enter Colour" class="form-control " required></td>
               <th>Pus Cell</th>
               <td><input type="text" name="pus_cell" value="" placeholder=" Enter Pus Cell" class="form-control " required></td>
          </tr>
          <tr>
               <th>Appearance</th>
               <td><input type="text" name="appearance" value="" placeholder=" Enter Appearance" class="form-control" required></td>
               <th>Epithelial Cell</th>
               <td><input type="text" name="epithelial_cell" value="" placeholder=" Enter Epithelial Cell" class="form-control " required></td>
          </tr>
          <tr>
               <th>Leukocytes</th>
               <td>
                <select name="leukocytes" class="form-control">
              <option value="Negative" >Negative - 0 Cells/µL </option>
              <option value="Trace">Trace + 15 Cells/µL</option>
              <option value="Small">Small + 70 Cells/µL </option>
              <option value="Moderate">Moderate ++ 125 Cells/µL</option>
              <option value="Large">Large +++ 500 Cells/µL</option>
            </select>
               </td>
               <th>RBCs</th>
               <td><input type="text" name="rb_cs" value="" placeholder=" Enter RBCs" class="form-control " required></td>
          </tr>
           <tr>
               <th>Nitrite</th>
               <td>
                <select name="nitrite" class="form-control">
              <option value="Negative">-ive</option>
              <option value="Positive">+ive</option>
            </select>
               </td>
               <th>casts</th>
               <td><input type="text" name="casts" value="" placeholder=" Enter Casts" class="form-control " required></td>
          </tr>
          
          <tr>
               <th>Urobilinogen</th>
               <td>
                  <select name="urobilinogen" class="form-control">
              <option value="0.2" >0.2(Normal) Ehlich Units/dL Urine 3.2 µmol/L</option>
              <option value="1">1 Ehlich Units/dL Urine 16 µmol/L</option>
              <option value="2">2 Ehlich Units/dL Urine 732 µmol/L </option>
              <option value="4">4 Ehlich Units/dL Urine 64 µmol/L</option>
              <option value="8">8 Ehlich Units/dL Urine  128 µmol/L</option>
            </select>
               </td>
               <th>Crystals</th>
               <td><input type="text" name="crystals" value="" placeholder=" Enter Crystals" class="form-control " required></td>
          </tr>
          <tr>
               <th>Protein</th>
               <td>
                <select name="protein" class="form-control">
              <option value="Negative" >Negative - </option>
              <option value="Trace">Trace &plusmn;</option>
              <option value="30mg/dL">30mg/dL + 0.3g/L</option>
              <option value="100mg/dL">100mg/dL ++  1.0g/L</option>
              <option value="300mg/dL">300mg/dL +++ 3.0g/L</option>
              <option value=">2000mg/dL">2000mg/dL ++++ >20 g/L</option>
            </select>
               </td>
                <th>Amorphous</th>
               <td><input type="text" name="amorphous" value="" placeholder=" Enter Amorphous" class="form-control " required></td>
          </tr>
          <tr>
               <th>pH</th>
               <td><input type="number" step="any"  name="ph" value="0.0" placeholder=" i.e 0.0" class="form-control " required></td>
                <th>Parasites</th>
               <td><input type="text" name="parasites" value="" placeholder=" Enter Parasites" class="form-control " required></td>
          </tr>
          <tr>
               <th>Blood</th>
               <td>
                 <select name="blood" class="form-control">
              <option value="Negative" >Negative -</option>
              <option value="Non-Hemolyzed">Non-Hemolyzed / Trace + 10 Cells/µL</option>
              <option value="Hemolyzed">Hemolyzed / Trace + 10 Cells/µL</option>
              <option value="Small">Small + 25 Cells/µL</option>
              <option value="Moderate">Moderate ++  80 Cells/µL/option>
              <option value="Large">Large +++ 250 Cells/µL</option>
            </select>
               </td>
               <th>Bacteria</th>
               <td><input type="text" name="bacteria" value="" placeholder=" Enter Bacteria" class="form-control " required></td>
          </tr>
           <tr>
               <th>Specific Gravity</th>
               <td>
                 <input type="number" step="any" value="0.000" min="0.000" name="specific_gravity"  placeholder=" i.e 0.000" class="form-control " required>
               </td>
               <th>Yeast/Fungi</th>
               <td><input type="text" name="yeastFungi" value="" placeholder=" Enter Yeast/Fungi" class="form-control " required></td>
          </tr>
          <tr>
               <th>Ketone Bodies</th>
               <td>
                <select name="ketone_bodies" class="form-control">
              <option value="Negative">Negative -</option>
              <option value="Trace">Trace 5 mg/dL 0.5 mmol/L </option>
              <option value="Small">Small 15 mg/dL 1.5 mmol/L</option>
              <option value="Moderate">Moderate 40 mg/dL 4.0 mmol/L</option>
              <option value="Large">Large  80 mg/dL 8.0 mmol/L</option>
              <option value="xLarge">Large 160 mg/dL 16.0 mmol/L</option>
            </select>
               </td>
          </tr>
          <tr>
           <th>Bilirubin</th>
               <td>
                <select name="bilirubin" class="form-control">
              <option value="Negative">Negative -</option>
              <option value="Small">Small 1+</option>
              <option value="Moderate">Moderate 3++</option>
              <option value="Large">Large 6+++</option>
            </select>
               </td>
           </tr>
            <tr>
           <th>Glucose</th>
               <td>
                <select name="glucose" class="form-control">
              <option value="Negative">Negative -</option>
              <option value="Trace">Trace + 100 mg/dL 5 mmol/L </option>
              <option value="Small">Small + 50 mg/dL 15 mmol/L</option>
              <option value="Moderate">Moderate ++  500 mg/dL 30 mmol/L</option>
              <option value="Large">Large +++ 1000 mg/dL  60 mmol/L</option>
              <option value="xLarge">Large ++++ >2000 mg/dL 110 mmol/L</option>
            </select>
               </td>
           </tr>

     </tbody>
</table>
                  <!--   <div class="col-sm-3 form-group">
                    <label>Examined by</label>
                    <input type="text" name="ur_examined_by" value="<?// $rec['testType']->examined_by; ?>" placeholder=" Enter Examined by" class="form-control " required>
                    </div>   -->
                <!-- </div> -->
                <?php
                  }else if($rec['testDetails']->testHelp_id==6)
                  {
                ?>
                <input type="hidden" name="mrt_id"  value="<?= $rec['testType']->mrt_id; ?>">
                 <div class="row">
                    <div class="col-sm-3 form-group">
                    <label>Result Status</label>
                   <select class="form-control" name="result_status" required>
                     <option value="">-select-</option>
                     <option value="Negative">Negative</option>
                     <option value="Positive">Positive</option>
                     <option value="Doubtful">Doubtful</option>
                   </select>
                    </div>
                    <!-- <br> -->
                <!-- </div> -->
               
                <?php
                  }else if($rec['testDetails']->testHelp_id==7)
                  {
                ?>
              <input type="hidden" name="rbpt_id"  value="<?= $rec['testType']->rbpt_id; ?>">
                 <div class="row">
                    <div class="col-sm-3 form-group">
                       <label>Result Status</label>
                       <select class="form-control" name="result_status" required>
                         <option value="">-select-</option>
                         <option value="Negative">Negative</option>
                         <option value="Positive">Positive</option>
                         <option value="Doubtful">Doubtful</option>
                       </select>
                    </div>
                 
                <?php
                  }else if($rec['testDetails']->testHelp_id==8)
                  {
                ?>
<input type="hidden" name="spat_human_id"       value="<?= $rec['testType']->spat_human_id; ?>">
                 <div class="row" id="brucella_human">
                   <table class="table table-bordered table-condenced">
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
                     <select name="brucella_abortus_20" class="form-control" required>
                       <option value="-">-</option>
                       <option value="+">+</option>
                     </select> 
                   </td>
                    <td>
                      <select name="brucella_abortus_40" class="form-control" required>
                       <option value="-">-</option>
                       <option value="+">+</option>
                     </select>
                      </td>
                    <td> 
                      <select name="brucella_abortus_80" class="form-control" required>
                       <option value="-">-</option>
                       <option value="+">+</option>
                     </select>
                      </td>
                    <td>
                      <select name="brucella_abortus_160" class="form-control" required>
                       <option value="-">-</option>
                       <option value="+">+</option>
                     </select>
                      </td>
                    <td> 
                      <select name="brucella_abortus_320" class="form-control" required>
                       <option value="-">-</option>
                       <option value="+">+</option>
                     </select>
                    </td>
                  </tr>
                    <tr>
                    <th colspan="2">Brucella melitensis</th>
                     <td>
                     <select name="brucella_meletensis_20" class="form-control" required>
                       <option value="-">-</option>
                       <option value="+">+</option>
                     </select> 
                   </td>
                    <td>
                      <select name="brucella_meletensis_40" class="form-control" required>
                       <option value="-">-</option>
                       <option value="+">+</option>
                     </select>
                      </td>
                    <td> 
                      <select name="brucella_meletensis_80" class="form-control" required>
                       <option value="-">-</option>
                       <option value="+">+</option>
                     </select>
                      </td>
                    <td>
                      <select name="brucella_meletensis_160" class="form-control" required>
                       <option value="-">-</option>
                       <option value="+">+</option>
                     </select>
                      </td>
                    <td> 
                      <select name="brucella_meletensis_320" class="form-control" required>
                       <option value="-">-</option>
                       <option value="+">+</option>
                     </select>
                    </td>
                  </tr>
                  </table>
                <!-- </div> -->
                <div class="col-sm-3 form-group">
                    <label>Result</label>
                    <select name="result_status" class="form-control" required>
                       <option value="">-select-</option>
                       <option value="Postive">Postive</option>
                       <option value="Negative">Negative</option>
                       <option value="Doubtful">Doubtful</option>
                     </select>
                    </div>
                 
                <?php
                  }else if($rec['testDetails']->testHelp_id==9)
                  {
                ?>
                <input type="hidden" name="tst_id"           value="<?= $rec['testType']->tst_id; ?>">
                 <div class="row">
                      <table class="table table-bordered">
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
                          <th>A</th>
                          <td><input type="text" name="A_1st" class="form-control"></td>
                          <td><input type="text" name="A_2nd" class="form-control"></td>
                          <td><input type="text" name="A_result" class="form-control"></td>
                        </tr>
                         <tr>
                          <th>M</th>
                          <td><input type="text" name="M_1st" class="form-control"></td>
                          <td><input type="text" name="M_2nd" class="form-control"></td>
                          <td><input type="text" name="M_result" class="form-control"></td>
                        </tr>

                      </tbody>
                    </table>
                <?php
                 }else  if($rec['testDetails']->testHelp_id==10)
                    {
                ?>
                <input type="hidden" name="water_bacteriology_id" value="<?= $rec['testType']->water_bacteriology_id;?>"> 
                 
                 <div class="row" id="impression_smear">
                    <div class="col-sm-4 form-group">
                      <label>Result</label>
                      <input type="text" name="result" value="<?= $rec['testType']->result ?>"  placeholder="Enter Result" class="form-control " required>
                    </div>   
                     
          <!-- </div> -->
                <?php
                    }else  if($rec['testDetails']->testHelp_id==11)
                    {
                ?>
                <input type="hidden" name="afs_id" value="<?= $rec['testType']->afs_id;?>"> 
                 
                 <div class="row" id="afs_id">
                    <div class="col-sm-3 form-group">
                      <label>Lab Findings</label>
                       <select class="form-control" name="afs_lab_findings">
                         <option value="">-select-</option>
                         <option <?php if($rec['testType']->afs_lab_findings=='positive'){ echo "selected";} ?> value="positive">Positive(+ive)</option>
                         <option <?php if($rec['testType']->afs_lab_findings=='negative'){ echo "selected";} ?> value="negative">Negative (-ive)</option>
                       </select>
                    </div>   
                <?php
                    }
                    else if($rec['testDetails']->testHelp_id==12)
                    {
                ?>
                <input type="hidden" name="elisa_human_id"  value="<?= $rec['testType']->elisa_human_id; ?>">
                   <div class="row">
                    <div class="col-sm-3 form-group">
                         <label>Antibody Index</label>
                        <input type="text" name="antibody_index" placeholder="Enter Antibody Index">
                      </div>
                      <div class="col-sm-3 form-group">
                         <label>Result Status</label>
                         <select class="form-control" name="result_status" required>
                           <option value="">-select-</option>
                           <option value="Negative">Negative</option>
                           <option value="Positive">Positive</option>
                           <option value="Equolical">Equolical</option>
                         </select>
                      </div>
                <?php
                    }
                    else if($rec['testDetails']->testHelp_id==13)
                    {
                ?>
              <input type="hidden" name="elisa_animal_id"  value="<?= $rec['testType']->elisa_animal_id; ?>">
                 <div class="row">
                  <div class="col-sm-3 form-group">
                       <label>Antibody Index</label>
                      <input type="text" name="antibody_index" placeholder="Enter Antibody Index">
                    </div>
                    <div class="col-sm-3 form-group">
                       <label>Result Status</label>
                       <select class="form-control" name="result_status" required>
                         <option value="">-select-</option>
                         <option value="Negative">Negative</option>
                         <option value="Positive">Positive</option>
                         <option value="Doubtful">Doubtful</option>
                       </select>
                    </div>
                <?php
                 }
                 else if($rec['testDetails']->testHelp_id==14)
                 {
                ?>
              <input type="hidden" name="pcr_human_id"  value="<?= $rec['testType']->pcr_human_id; ?>">
                 <div class="row">
                    <div class="col-sm-3 form-group">
                       <label>Result Status</label>
                       <select class="form-control" name="result_status" required>
                         <option value="">-select-</option>
                         <option value="Positive">Positive</option>
                         <option value="Negative">Negative</option>
                         <option value="Doubtful">Doubtful</option>
                       </select>
                    </div>
                <?php
                  }
                 else if($rec['testDetails']->testHelp_id==15)
                    {
                ?>
              <input type="hidden" name="pcr_animal_id"  value="<?= $rec['testType']->pcr_animal_id; ?>">
                 <div class="row">
                    <div class="col-sm-3 form-group">
                       <label>Result Status</label>
                       <select class="form-control" name="result_status" required>
                         <option value="">-select-</option>
                         <option value="Positive">Positive</option>
                         <option value="Negative">Negative</option>
                         <option value="Doubtful">Doubtful</option>
                       </select>
                    </div>
                 
                <?php
                 }
                ?>
               <div class="col-sm-3 form-group">
                <label>Result Date</label>
                <input type="text" name="result_date" value="<?php if(!empty($rec['testDetails']->result_date)){ echo date('d/m/Y',strtotime($rec['testDetails']->result_date)); }else { echo date('m/d/Y'); } ?>"   class="form-control datepicker" >
                </div>
                <div class="col-sm-3 form-group">
                  <label>Examined by</label>
                  <input type="text" name="examined_by" value="<?= $rec['testDetails']->examined_by; ?>" placeholder="Enter Examined by" class="form-control " required>
                </div>
                <div class="col-sm-3 form-group">
                  <label>Designation</label>
                  <input type="text" name="examined_by_desi" value="<?= $rec['testDetails']->examined_by_desi; ?>" placeholder="Enter Examiner Designation" class="form-control " required>
                </div>

            </div>
            <div class="row">
               <div class="col-sm-3 form-group">
                       <label>Disease Found?</label>
                       <select class="form-control diseaseFound" onchange="DiseaseStatus(this.value);" name="disease_found" required>
                         <option value="">-select-</option>
                         <option value="Yes">Yes</option>
                         <option value="No">No</option>
                         <option value="Doubtful">Doubtful</option>
                         <option value="N/A">N/A</option>
                       </select>
                    </div>
                     <div class="col-sm-3 form-group diseaseName">
                       <label>Disease Name</label>
                      <input type="text" name="disease_name" class="form-control">
                    </div>
               <div class="col-sm-6 form-group">
              <label>Remarks</label>
              <textarea name="recommendations" placeholder="Write in few words" class="form-control" required> <?= $rec['testDetails']->recommendations; ?></textarea>
            </div>
            </div>
           <hr>
           
          </div>
   <div class="col-md-3">
                    <?php
              if($rec['testDetails']->post_status==0 && $rec['testDetails']->is_cancel==0)
              {
            ?>
                      <div class="col-md-12">
                        <button type="submit"  onclick="return confirm('Warning! Your will not be able to Modify it again, Once you saved');"  class="btn btn-block btn-primary mr-5 "> Submit Result </button><br>
                      </div>
                     <!--  <div class="col-md-4">
                        <button type="button" onclick="SubmitPost();" class="btn btn-block btn-success mr-5 "> Post Invoice </button><br>
                      </div> -->
                      <div class="col-md-12">
                        <button data-backdrop="static" data-keyboard="false" data-toggle="modal" href="#cancelModal" type="button" class="btn btn-block btn-danger mr-5 "> Cancel  </button>
                      </div>
            <?php  
              }
            ?>
                    </div>
          <hr>
                </div>
          <!-- start row 2 -->
                <div class="row">
                  <div class="col-md-12">
                       <!-- card starts -->
        <div class="card card-info card-outline collapsed-card">
         <a href="javascript:void(0);" data-widget="collapse">
         <div class="card-header" >
            <h3 class="card-title"><b>Overview of Test Initial Information</b> <i class="fa fa-chevron-down"></i></h3>

            <div class="card-tools">
              <!-- <button type="button" class="btn btn-tool" ><i class="fa fa-plus"></i>
              </button> -->
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          </a> 
          <div class="card-body" style="display: none;">
           <div class="row">
                <div class="col-sm-12 form-group">
                    <label>Source Type</label>
                     <select class="form-control" id="client_type"  onchange="GetClientType(this.value)" style="width: 100% !important"  name="client_type" disabled>
                        <option value="">-Select-</option> 
                        <option <?php if($rec['testDetails']->type=='farmer'){ echo "selected";} ?> value="farmer">Farmer/Owner</option>
                        <option <?php if($rec['testDetails']->type=='own_dept'){ echo "selected";} ?> value="own_dept">Own Departmentt</option>
                        <option <?php if($rec['testDetails']->type=='other_dept'){ echo "selected";} ?> value="other_dept">Other Department</option>
                        <option <?php if($rec['testDetails']->type=='farm_visited'){ echo "selected";} ?> value="farm_visited">Farm Visited</option>
                         <option <?php if($rec['testDetails']->type=='Patient'){ echo "selected";} ?> value="Patient">Patient/Human</option>
                      </select>
                    </div>
              </div>
             <b class="text-success" id="source_info"></b>
                <hr>
               <div class="row" id="source_row">
                     <div class="col-sm-3 form-group div_deptName">
                    <label id="label_deptName">Department Name</label>
                    <input type="text" name="dept_name" value="<?php if(!empty($rec['testDetails']->dept_name)){ echo $rec['testDetails']->dept_name; } ?>" placeholder="Enter  Department Name" class="form-control dept_name" readonly>
                    </div>
                    <div class="col-sm-3 form-group div_dept_phone">
                    <label id="deptPhone">Department Phone#</label>
                    <input type="text" name="dept_phone" id="deptPhone" value="<?php if(!empty($rec['testDetails']->dept_phone)){ echo $rec['testDetails']->dept_phone; } ?>"  placeholder="Enter  Phone#" class="form-control" maxlength="12" readonly>
                    </div>
                    <div class="col-sm-3 form-group div_source_cnic">
                    <label>Farmer/Owner/Patient CNIC#</label>
                    <input type="text" name="client_cnic" data-inputmask="'mask': ['99999-9999999-9']"  data-mask="" id="client_cnic" value="<?php if(!empty($rec['testDetails']->client_cnic)){ echo $rec['testDetails']->client_cnic; } ?>" onblur="GetClient_cnic()"  placeholder="Enter  CNIC#" class="form-control clientCnic" maxlength="15" readonly>
                    </div>
                   <div class="col-sm-3 form-group div_source_Name">
                    <label id="label_name"> Name</label>
                    <input type="text" name="client_name" id="client_name" value="<?php if(!empty($rec['testDetails']->client_name)){ echo $rec['testDetails']->client_name; } ?>" placeholder="Enter  Name" class="form-control client_name" readonly>
                    </div>
                    <div class="col-sm-3 form-group div_source_contact">
                    <label id="label_contact"> Contact#</label>
                    <input type="text" name="client_contact" id="client_contact" value="<?php if(!empty($rec['testDetails']->client_contact)){ echo $rec['testDetails']->client_contact; } ?>" data-inputmask="'mask': ['9999-9999999']"  data-mask=""   placeholder="Enter  Contact" class="form-control client_contact" maxlength="12" readonly>
                    </div>
                   
                  <!--   <div class="col-sm-3 form-group">
                    <label>Referred by</label>
                    <input type="text" name="referred_by" value="<?php if(!empty($rec['testDetails']->referred_by)){ echo $rec['testDetails']->referred_by; } ?>"  placeholder="Enter Referred by" class="form-control referred_by" readonly>
                    </div> -->
                    <div class="col-sm-4 form-group div_source_contact">
                    <label> District</label>
                     <select class="form-control " name="district_id" onchange="GetTehsils(this.value)" disabled>
                      <option value="">-select-</option>
                      <?php
                          if($districts)
                          {
                            foreach($districts as $dis)
                            {
                      ?>
                      <option <?php if($dis->district_id==$rec['testDetails']->district_id){ echo "selected"; } ?> value="<?= $dis->district_id; ?>"><?= $dis->district_name; ?></option>
                      <?php
                            }
                          }
                      ?>
                    </select>
                    </div>
                     <div class="col-sm-4 form-group div_source_contact">
                    <label> Tehsil</label>
                    <select class="form-control tehsil_id" name="tehsil_id" disabled>
                     <?php
                      $tehsils    = $this->API_m->getRecordWhere('tehsil',['district_id'=>$rec['testDetails']->district_id,'is_trash'=>0]);
                          if($tehsils)
                          {
                            foreach($tehsils as $teh)
                            {
                      ?>
                      <option <?php if($teh->tehsil_id==$rec['testDetails']->tehsil_id){ echo "selected"; } ?> value="<?= $teh->tehsil_id; ?>"><?= $teh->tehsil_name; ?></option>
                      <?php
                            }
                          }
                      ?>
                    </select>
                    </div>
                     <div class="col-sm-4 form-group div_source_address">
                    <label>Village/UC/Area</label>
                    <input type="text" name="client_vil_uc_area"  value="<?php if(!empty($rec['testDetails']->client_vil_uc_area)){ echo $rec['testDetails']->client_vil_uc_area; } ?>"   placeholder="Enter Village/UC/Area" class="form-control client_vil_uc_area" readonly>
                    </div>
                    <div class="col-sm-3 form-group div_source_address">
                    <label id="client_address"> Address</label>
                    <input type="text" name="client_address" value="<?php if(!empty($rec['testDetails']->client_address)){ echo $rec['testDetails']->client_address; } ?>"  placeholder="Enter Address" class="form-control client_address" readonly>
                    </div>
                     <div class="col-sm-3 form-group">
                    <label>Referred by</label>
                    <input type="text" name="send_by"  value="<?php if(!empty($rec['testDetails']->sender_name)){ echo $rec['testDetails']->sender_name; } ?>" placeholder="Enter Sender name" class="form-control" disabled>
                    </div>
                     <div class="col-sm-3 form-group">
                    <label>Profession/Designation</label>
                    <input type="text" name="sender_designation" value="<?php if(!empty($rec['testDetails']->sender_designation)){ echo $rec['testDetails']->sender_designation; } ?>"  placeholder="Enter Sender Designation" class="form-control" disabled>
                    </div>
                </div>
                <b class="text-success">Animal Information</b>
                <hr>
                <div class="row">
                    <div class="col-sm-4 form-group">
                      <label>Animal Type </label>
                      <select class="form-control cattle_id" onchange="GetBreeds(this.value);"  name="cattle_name"  style="width: 100%" disabled>
                          <option value="">-select-</option>
                        <?php 
                        foreach ($cattles as $cattle) {
                          # code...
                          ?>
                          <option <?php if($rec['testDetails']->cattle_name==$cattle->cattle_id){ echo "selected"; } ?>  value="<?php echo $cattle->cattle_id; ?>"><?php echo $cattle->cattle_name; ?></option>
                          <?php 
                        }

                         ?>
                      </select>
                    </div>   
                    <div class="col-sm-4 form-group">
                      <label>Breed</label>
                       <select class="form-control breed_id"  name="cattle_breed"  style="width: 100%" disabled>
                        <option value="">-select-</option>
                        <?php 
                         $breeds  = $this->API_m->getRecordWhere('breeds',['cattle_id'=>$rec['testDetails']->cattle_name,'is_trash'=>0]);
                        foreach ($breeds as $breed) {
                          ?>
                          <option <?php if($rec['testDetails']->cattle_breed==$breed->breed_id){ echo "selected"; } ?>  value="<?php echo $breed->breed_id; ?>"><?php echo $breed->breed_name; ?></option>
                          <?php 
                        }

                         ?>
                      </select>
                      </select>
                    </div> 
                    <div class="col-sm-4 form-group">
                      <label>Tag#</label>
                      <input type="text" name="cattle_tag_no"  placeholder="Enter Animal Tag No" value="<?= $rec['testDetails']->cattle_tag_no ?>" class="form-control " readonly>
                    </div>   
                     
                    <div class="col-sm-4 form-group">
                      <label>Sex</label>
                        <select class="form-control"  name="cattle_sex"  style="width: 100%"  disabled>
                          <option value="">-select-</option>
                          <option  <?php if($rec['testDetails']->cattle_sex=="Male"){ echo "selected"; } ?> value="Male">Male</option>
                          <option  <?php if($rec['testDetails']->cattle_sex=="Female"){ echo "selected"; } ?> value="Female">Female</option>
                      </select>
                    </div>   
                  <div class="col-sm-6 form-group">
                      <label> Age (Year & Month)</label>
                      <div class="row">
                        <div class="col-md-3">
                          <?php if($rec['testDetails']->type=='Patient'){ ?>
                           <input type="number" class="form-control humanAge" name="cattle_year" value="<?= $rec['testDetails']->cattle_year; ?>"  style="" disabled>
                         <?php } else { ?>
                           <select class="animalAge form-control"  name="cattle_year"  style="width: 100%;"  disabled>
                             <option value="">-Year-</option>
                             <option <?php if($rec['testDetails']->cattle_year==0){ echo 'selected'; } ?> value="0">0</option>
                             <option <?php if($rec['testDetails']->cattle_year==1){ echo 'selected'; } ?> value="1">1</option>
                             <option <?php if($rec['testDetails']->cattle_year==2){ echo 'selected'; } ?> value="2">2</option>
                             <option <?php if($rec['testDetails']->cattle_year==3){ echo 'selected'; } ?> value="3">3</option>
                             <option <?php if($rec['testDetails']->cattle_year==4){ echo 'selected'; } ?> value="4">4</option>
                             <option <?php if($rec['testDetails']->cattle_year==5){ echo 'selected'; } ?> value="5">5</option>
                             <option <?php if($rec['testDetails']->cattle_year==6){ echo 'selected'; } ?> value="6">6</option>
                             <option <?php if($rec['testDetails']->cattle_year==7){ echo 'selected'; } ?> value="7">7</option>
                             <option <?php if($rec['testDetails']->cattle_year==8){ echo 'selected'; } ?> value="8">8</option>
                             <option <?php if($rec['testDetails']->cattle_year==9){ echo 'selected'; } ?> value="9">9</option>
                             <option <?php if($rec['testDetails']->cattle_year==10){ echo 'selected'; } ?> value="10">10</option>
                          </select>
                           <?php } ?> 
                        </div>
                          <div class="col-sm-1">
                            <b>&</b>
                          </div>
                        <div class="col-md-3">
                           <select class="form-control"  name="cattle_month"  style="width: 100%;" required disabled>
                            <option value="">-Month-</option>
                            <option <?php if($rec['testDetails']->cattle_month==0){ echo 'selected'; } ?> value="0">0</option>
                            <option <?php if($rec['testDetails']->cattle_month==1){ echo 'selected'; } ?> value="1">1</option>
                            <option <?php if($rec['testDetails']->cattle_month==2){ echo 'selected'; } ?> value="2">2</option>
                            <option <?php if($rec['testDetails']->cattle_month==3){ echo 'selected'; } ?> value="3">3</option>
                            <option <?php if($rec['testDetails']->cattle_month==4){ echo 'selected'; } ?> value="4">4</option>
                            <option <?php if($rec['testDetails']->cattle_month==5){ echo 'selected'; } ?> value="5">5</option>
                            <option <?php if($rec['testDetails']->cattle_month==6){ echo 'selected'; } ?> value="6">6</option>
                            <option <?php if($rec['testDetails']->cattle_month==7){ echo 'selected'; } ?> value="7">7</option>
                            <option <?php if($rec['testDetails']->cattle_month==8){ echo 'selected'; } ?> value="8">8</option>
                            <option <?php if($rec['testDetails']->cattle_month==9){ echo 'selected'; } ?> value="9">9</option>
                            <option <?php if($rec['testDetails']->cattle_month==10){ echo 'selected'; } ?> value="10">10</option>
                            <option <?php if($rec['testDetails']->cattle_month==11){ echo 'selected'; } ?> value="11">11</option>
                          </select>
                        </div>
                          <div class="col-md-5">
                          </div>
                      </div>
                    </div>      
                   <div class="col-sm-6 form-group">
                    <label>History/Symptoms</label>
                    <textarea name="symptoms_info" class="form-control" readonly><?= $rec['testDetails']->symptoms_info; ?></textarea>
                   </div>
                   <div class="col-sm-6 form-group">
                    <label>Additional Information</label>
                    <textarea name="additional_info" class="form-control" readonly><?= $rec['testDetails']->additional_info ?></textarea>
                   </div>
                </div>
                 <b class="text-success" id="source_info">House hold or Farm Information</b><hr>
                <div class="row">
                    <div class="col-md-2 form-group">
                      <label> No# of Cows</label>
                      <input type="number" name="cows_no" value="<?= $rec['testDetails']->cows_no ?>" placeholder="Enter Cows No" class="form-control " readonly>
                    </div>
                    <div class="col-md-2 form-group">
                      <label>No# of Buffalos</label>
                      <input type="number" name="buffalos_no" value="<?= $rec['testDetails']->buffalos_no ?>" placeholder="Enter Buffalos No" class="form-control " readonly>
                    </div>
                    <div class="col-md-2 form-group">
                      <label> No# of Goat </label>
                      <input type="number" name="goat_no" value="<?= $rec['testDetails']->goat_no ?>" placeholder="Enter Goat No" class="form-control " readonly>
                    </div>
                    <div class="col-md-2 form-group">
                      <label>No# of Sheep </label>
                      <input type="number" name="sheep_no" value="<?= $rec['testDetails']->sheep_no ?>" placeholder="Enter Sheep No" class="form-control " readonly>
                    </div>
                   <div class="col-md-2 form-group">
                      <label>Total</label>
                      <input type="number" name="cattle_total_no" value="<?= $rec['testDetails']->cattle_total_no ?>" placeholder="Enter Animal Total No" class="form-control " readonly>
                    </div>
                </div>
                 <b class="text-success" id="source_info">Test  Information</b><hr>
                <div class="row">
                    <div class="col-sm-4 form-group">
                    <label>Test Name</label>
                     <select class="form-control testHelp_id  re_test_id" id="test_id" style="width: 100% !important"  disabled>
                        <option value="">-Select-</option>
                        <?php 
                           if(!empty($tests))
                          {

                          foreach ($tests as $test) {
                        ?>
                            <option <?php if($rec['testDetails']->test_id==$test->test_id){ echo "selected"; }  ?> value="<?php echo $test->test_id; ?>"><?php echo $test->testHelp_name; ?></option>
                        <?php 
                          }
                            }
                        ?>
                      </select>
                    </div>
                     <div class="col-sm-4 form-group">
                        <label>Sample/Specimen</label>
                        <select class="form-control " id="test_sample_id" style="width: 100% !important" name="sample_id" disabled>
                           <?php 
                              foreach ($samples as $sample) {
                            ?>
                                <option <?php if($rec['testDetails']->sample_id==$sample->sample_id){ echo "selected"; } ?> value="<?php echo $sample->sample_id; ?>"><?php echo $sample->sample_name; ?></option>
                            <?php 
                              }

                            ?>
                        </select>
                    </div>
                     <div class="col-sm-4 form-group">
                          <label>Sample/Specimen Details</label>
                        <textarea name="sample_desc" rows="2" cols="10" class="form-control" readonly> <?= $rec['testDetails']->sample_desc; ?></textarea>
                    </div>
                    <div class="col-sm-4 form-group">
                    <label>Fee (PKR)</label>
                    <input type="number" name="test_total_fee" value="<?= $rec['testDetails']->test_total_fee ?>"  onBlur="if (this.value < 1) { this.value = '0.00';}" value="0.00"  placeholder="Enter Test Fee" class="form-control testHelp_fee testPrice" readonly>
                    </div>
                    <div class="col-sm-4 form-group">
                    <label>Received Date</label>
                    <input type="text" value="<?= date('m/d/Y',strtotime($rec['testDetails']->received_date)); ?>"    class="form-control datepicker" disabled>
                    </div>
                   
                  
                   <!-- <div class="col-sm-4 form-group">
                    <label>House hold & Farm Info</label>
                    <textarea name="house_hold_or_farm_info" class="form-control" readonly><?= $rec['testDetails']->house_hold_or_farm_info; ?></textarea>
                   </div> -->
                </div>
                    <?php
      if($rec['testDetails']->testHelp_id==3)
       {
    ?>
        <div class="row" >
                <hr>
                 
                </div>
                <div class="row">
                   <div class="col-sm-3 form-group">
                    <label>Calving Kidding Lambing date</label>
                    <input type="text" name="cal_kid_lambing_date" value="<?= date('m/d/Y',strtotime($rec['testType']->cal_kid_lambing_date)); ?>" class="form-control datepicker" readonly>
                  </div>
                   <div class="col-sm-3 form-group">
                    <label>Daily Milk Production (LTRs)</label>
                    <input type="text" name="daily_milk_production" value="<?= $rec['testType']->daily_milk_production; ?>" placeholder="Daily Milk Production" class="form-control" readonly>
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>Lactation No#</label>
                     <select class="form-control"  name="lactation_no"  style="" disabled>
                        <option value="">-Select-</option>
                        <option  <?php if($rec['testType']->lactation_no==0){ echo "selected"; } ?> value="0">0</option>
                        <option  <?php if($rec['testType']->lactation_no==1){ echo "selected"; } ?> value="1">1</option>
                        <option  <?php if($rec['testType']->lactation_no==2){ echo "selected"; } ?> value="2">2</option>
                        <option  <?php if($rec['testType']->lactation_no==3){ echo "selected"; } ?> value="3">3</option>
                        <option  <?php if($rec['testType']->lactation_no==4){ echo "selected"; } ?> value="4">4</option>
                        <option  <?php if($rec['testType']->lactation_no==5){ echo "selected"; } ?> value="5">5</option>
                    </select>
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>No of Animals at Farm</label>
                    <input type="text" name="total_animals_at_farm" value="<?= $rec['testType']->total_animals_at_farm; ?>"  placeholder="Enter Total Animals Farm" class="form-control " readonly>
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>In Milk</label>
                    <input type="number" name="in_milk" value="<?= $rec['testType']->in_milk; ?>"  placeholder="Enter In Milk" class="form-control" readonly>
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>Dry Period Given</label>
                    <input type="text" name="dry_period_given" value="<?= $rec['testType']->dry_period_given; ?>"  placeholder=" Enter Dry Period Given" class="form-control " readonly>
                    </div>
                    
                    <div class="col-sm-3 form-group">
                    <label>Previous Mastitis Record of the Animal</label>
                    <select name="prev_mastatis_rec_of_anim" class="form-control" disabled>
                      <option <?php if($rec['testType']->prev_mastatis_rec_of_anim=='Yes'){ echo "selected"; } ?> value="Yes">Yes</option>
                      <option <?php if($rec['testType']->prev_mastatis_rec_of_anim=='No'){ echo "selected"; } ?> value="No">No</option>
                    </select>
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>Previous Mastitis Record of the farm</label>
                    <select name="prev_mastatis_rec_of_farm" class="form-control" disabled>
                      <option <?php if($rec['testType']->prev_mastatis_rec_of_farm=='Yes'){ echo "selected"; } ?> value="Yes">Yes</option>
                      <option <?php if($rec['testType']->prev_mastatis_rec_of_farm=='No'){ echo "selected"; } ?> value="No">No</option>
                    </select>
                    </div>
                    <div class="col-sm-3 form-group">
                    <label>Practice of Mastatis Test at the Farm</label>
                    <select name="prac_mastatis_test_at_farm" class="form-control" disabled>
                      <option <?php if($rec['testType']->prac_mastatis_test_at_farm=='Yes'){ echo "selected"; } ?> value="Yes">Yes</option>
                      <option <?php if($rec['testType']->prac_mastatis_test_at_farm=='No'){ echo "selected"; } ?> value="No">No</option>
                    </select>
                    </div>
               </div>
                <?php
                    }
                ?>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
                  </div>
                </div>
        <!-- End row 2 -->
                </form>
          </div>
          </div>
        </div>
      </div>
      </div>
      <!-- /.row -->
    </section>
     
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
        <form action="<?php echo base_url('Tests/TestRecordCancel') ?>" method="post">
          <input type="hidden" name="testDetails_id" value="<?= $rec['testDetails']->testDetails_id;?>"> 
           <input type="hidden" name="uri" value="<?= $this->uri->segment(2);?>">
         <div class="box-body">
            <div class="col-sm-12 form-group">
              <!-- <label></label> -->
              <textarea name="cancel_reason" placeholder="Write in short words" class="form-control" required="required"></textarea>
            </div>
            <div class="form-group">
              <button type="submit"  onclick="return confirm('Are you sure to Cancel Record?');"  class="btn btn-info pull-right">Submit</button>
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

  function DiseaseStatus(val)
  {
    if(val=='Yes')
    {
      $('.diseaseName').show();
    }
    else
    {
      $('.diseaseName').hide();
    }
  }
</script>

<script type="text/javascript">
  $(document).ready(function(){
// Disease Found status hide/show
 $('.diseaseName').hide();

$('.negStatus').css({'display':'none'});
$('.clinical_or_sub').css({'display':'none'});

$('#r1Row').css({'display':'none'});
$('#r2Row').css({'display':'none'});
$('#l1Row').css({'display':'none'});
$('#l2Row').css({'display':'none'});
$('.composite_or_ind').css({'display':'none'});
$('#compositeRow').css({'display':'none'});
$('#tableInd').css({'display':'none'});
$('.checkRow').css({'display':'none'});

    $('.clinical').click(function(){
      $('.mastitisLabel').show();
      $('.clinical_gp').show();
      $('.clinical_gp_val').css({'display':''});
      $('.composite_or_ind').css({'display':'none'});
      $('#compositeRow').css({'display':'none'});
      $('#tableInd').css({'display':'none'});
      $('.checkRow').css({'display':'none'});
    });
     $('.sub_clinical').click(function(){
        $('.mastitisLabel').hide();
        $('.clinical_gp').hide();
        $('.clinical_gp_val').css({'display':'none'});
        $('.composite_or_ind').css({'display':''});
        $('#compositeRow').css({'display':'none'});
        $('#tableInd').css({'display':'none'});
        $('.checkRow').css({'display':'none'});
        
    });

// individualVal
    $('.compositeVal').click(function(){
      $('.checkRow').css({'display':'none'});
      $('#tableInd').css({'display':''});
      $('#compositeRow').css({'display':''});
      $('#r1Row').css({'display':'none'});
      $('#r2Row').css({'display':'none'});
      $('#l1Row').css({'display':'none'});
      $('#l2Row').css({'display':'none'});

    });
    $('.individualVal').click(function(){
      $('#compositeRow').css({'display':'none'});
      $('#tableInd').css({'display':''});
      $('.checkRow').css({'display':''});
      $('.r1Check').prop('checked',false);
      $('.r2Check').prop('checked',false);
      $('.l1Check').prop('checked',false);
      $('.l2Check').prop('checked',false);
    });

//  CheckBoxes Jquery code
$('.r1Check').click(function(){
        if($(this).prop('checked') == true)
        {
          $('#r1Row').css({'display':''});
        }
        else
        {
          $('#r1Row').css({'display':'none'});
        }
        
    });
$('.r2Check').click(function(){
        if($(this).prop('checked') == true)
        {
          $('#r2Row').css({'display':''});
        }
        else
        {
            $('#r2Row').css({'display':'none'});
        }
    });
$('.l1Check').click(function(){
        if($(this).prop('checked') == true)
        {
          $('#l1Row').css({'display':''});
        }
        else
        {
            $('#l1Row').css({'display':'none'});
        }
        
    });
$('.l2Check').click(function(){
        if($(this).prop('checked') == true)
        {
          $('#l2Row').css({'display':''});
        }
        else
        {
            $('#l2Row').css({'display':'none'});
        }
        
    });

        

$('.NegResult_status').change(function(){
 var vl =  $(this).val();
  if(vl=='Negative')
  {
      $('.negStatus').css({'display':''});
      $('.clinical_or_sub').css({'display':'none'});
  }else if(vl=='Positive')
  {
      $('.negStatus').css({'display':'none'});
      $('.clinical_or_sub').css({'display':''});
  }else{
      $('.negStatus').css({'display':'none'});
      $('.clinical_or_sub').css({'display':'none'});
  }
});

  });
</script>