
<style> 
.main-sidebar{
  background-color: #00a65a !important;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #56e05a75 !important;
}
</style>  

<?php

$role_id        = $this->session->userdata('user')['role'];
$permissions    = $this->User_m->getRecordWhere('role_permissions',['role_id' => $role_id]); 
// echo "<pre>";
// print_r($permissions);
// echo  $permissions[0]->module_id;
// exit();
$controller             = $this->uri->segment(1);  
$method                 = $this->uri->segment(2);  
$district               = '';
$tehsil                 = '';
$dash                   = '';
$districtlabs           = '';
$user                   = '';
$sample                 = '';
$roles                  = '';
$test_types             = '';
$anti                   = '';
$test_sec               = '';
$addNew_test            = '';
$reg_test               = '';
$directorates           = '';
$centerStations         = '';
$sectionItems           = '';
$cattles                = '';
$cancelled              = '';
$posted                 = '';
$pending                = '';
$breeds                 = '';
$testItems              = '';
$lab_wise_view          = '';
$center_wise_view       = '';
$datewise_test_records  = '';
$pending_report         = '';
$cancelled_report       = '';
$posted_report          = '';
$all_report             = '';
$quick_test_receipt     = '';
$pendency               = '';
$testtype               = '';
$quarters               = '';
$Second_Quarters        = '';
$Third_Quarters         = '';
$Fourth_Quarters        = '';
$diseases               = '';
$districtlabsreports    = '';
$districcountreports    = '';
$samplereports          = '';
$animalreports          = '';
$testtypereports        = '';
  if($controller=='Pagescontroller' && $method == 'district')
  {
    $district ='active';
  }else if($controller=='Pagescontroller' && $method == 'tehsil')
  {
    $tehsil ='active';
  }
  elseif($controller=='Dashboard' && $method == 'index' || $method=='')
  {
    $dash = 'active';
  }elseif($controller=='Pagescontroller' && $method == 'districtlabs')
  {
    $districtlabs = 'active';
  }
  elseif($controller=='User' && $method == 'index' || $method=='user_detail_info')
  {
    $user = 'active';
  }
  elseif($controller=='User' && $method == 'roles')
  {
    $roles = 'active';
  }
  elseif($controller=='User' && $method == 'role_permissions')
  {
    $roles = 'active';
  }
  elseif($controller=='Pagescontroller' && $method == 'samples')
  {
    $sample = 'active';
  }
  elseif($controller=='Pagescontroller' && $method == 'test_types')
  {
    $test_types = 'active';
  }
  elseif($controller=='Pagescontroller' && $method == 'antibiotics')
  {
    $anti = 'active';
  }
  elseif($controller=='Pagescontroller' && $method == 'test_section')
  {
    $test_sec = 'active';
  }elseif($controller=='Pagescontroller' && $method == 'sectionItems')
  {
    $sectionItems = 'active';
  }
  elseif($controller=='Tests' &&  $method == 'test_records' || $method == 'updateTestDetailsRecord' || $method == 'singleTestDetailRecord')
  {
    $addNew_test = 'active';
  }else if($controller=='Tests' && $method == 'addNew_test')
  {
    $reg_test = 'active';
  }else if($controller=='Tests' && $method == 'pending_records')
  {
    $pending = 'active';
  }else if($controller=='Tests' && $method == 'posted_records')
  {
    $posted = 'active';
  }else if($controller=='Tests' && $method == 'cancelled_records')
  {
    $cancelled = 'active';
  }
  elseif($controller=='Pagescontroller' && $method == 'directorates')
  {
    $directorates = 'active';
  }
  elseif($controller=='Pagescontroller' && $method == 'centerStations')
  {
    $centerStations = 'active';
  }elseif($controller=='Pagescontroller' && $method == 'cattles')
  {
    $cattles = 'active';
  }elseif($controller=='Pagescontroller' && $method == 'breeds')
  {
    $breeds = 'active';
  }elseif($controller=='Pagescontroller' && $method == 'testItems')
  {
    $testItems = 'active';
  }elseif($controller=='Reports' && $method == 'lab_wise_view')
  {
    $lab_wise_view = 'active';
  }elseif($controller=='Reports' && $method == 'center_wise_view')
  {
    $center_wise_view = 'active';
  }elseif($controller=='Reports' && $method == 'datewise_test_records')
  {
    $datewise_test_records = 'active';
  }elseif($controller=='Reports' && $method == 'pending_report')
  {
    $pending_report = 'active';
  }elseif($controller=='Reports' && $method == 'cancelled_report')
  {
    $cancelled_report = 'active';
  }elseif($controller=='Reports' && $method == 'posted_report')
  {
    $posted_report = 'active';
  }elseif($controller=='Reports' && $method == 'test_reports')
  {
    $all_report = 'active';
  }elseif($controller=='Tests' && $method == 'quick_test_receipt')
  {
    $quick_test_receipt = 'active';
  }elseif($controller=='Reports' && $method == 'pending_test')
  {
    $pendency = 'active';
  }elseif($controller=='Reports' && $method == 'testtype')
  {
    $testtype = 'active';
  }elseif($controller=='Reports' && $method == 'quarters')
  {
    $quarters = 'active';
  }elseif($controller=='Reports' && $method == 'Second_Quarters')
  {
    $Second_Quarters = 'active';
  }elseif($controller=='Reports' && $method == 'Third_Quarters')
  {
    $Third_Quarters = 'active';
  }elseif($controller=='Reports' && $method == 'Fourth_Quarters')
  {
    $Fourth_Quarters = 'active';
  }elseif($controller=='Reports' && $method == 'diseases')
  {
    $diseases = 'active';
  }elseif($controller=='Reports' && $method == 'districtlabsreports')
  {
    $districtlabsreports = 'active';
  }elseif($controller=='Reports' && $method == 'districcountreports')
  {
    $districcountreports = 'active';
  }elseif($controller=='Reports' && $method == 'samplereports')
  {
    $samplereports = 'active';
  }elseif($controller=='Reports' && $method == 'Animalreports')
  {
    $animalreports = 'active';
  }elseif($controller=='Reports' && $method == 'testtypereports')
  {
    $testtypereports = 'active';
  }
  






 ?> 





 <aside class="main-sidebar sidebar-dark- elevation-4 bg-success">
  
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
     <!--  <img src="#" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <!-- <span class="brand-text font-weight-light" style="font-weight: bold !important; font-size: 12px !important;"><?php if (!empty($logUser->lab_name)) { echo strtoupper($logUser->lab_name); } ?></span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('img_uploads/user_images/'.$logUser->user_img); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('User/user_profile/'); ?>" class="d-block"><?= $this->session->userdata('user')['username']; ?></a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<?php
 if($permissions[0]->module_id==1)
 {
    if($permissions[0]->show_none==0)
    {
?>
         <li class="nav-item">
                <a href="<?= base_url('Dashboard/index') ?>" class="nav-link <?= $dash; ?> ">
                    <i class="nav-icon fa fa-dashboard"></i>
                  <p>Dashboard</p>
                </a>
              </li>
<?php
    }
    else
    {

    }
 }
 if($permissions[1]->module_id==2)
 {
    if($permissions[1]->show_none==0)
    {
?>
           <li class="nav-item has-treeview <?php if($sample=='active' || $testItems=='active' || $sectionItems=='active' || $cattles=='active' || $breeds=='active' || $tehsil=='active' || $test_types=='active' || $anti=='active' || $test_sec=='active' || $district=='active' || $districtlabs=='active' || $directorates=='active' || $centerStations=='active'){ echo'menu-open'; } ?> ">
            <a href="#" class="nav-link  <?= $sample.' '.$sectionItems.' '.$cattles.' '.$breeds.' '.$test_types.' '.$anti.' '.$districtlabs; ?>  <?= $district; ?> <?= $test_sec.' '.$centerStations; ?> <?= $directorates; ?>">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p style="color: white; font-weight: bold">
               ADMIN PANEL
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('Pagescontroller/directorates') ?>" class="nav-link <?= $directorates; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p> Directorate</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?= base_url('Pagescontroller/centerStations') ?>" class="nav-link <?= $centerStations; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>  Center/Station</p>
                </a>
              </li>
              <!--  <li class="nav-item">
                <a href="<?= base_url('Pagescontroller/sectionItems') ?>" class="nav-link <?= $sectionItems; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p> Section Items</p>
                </a>
              </li> -->
               <li class="nav-item">
                  <a href="<?= base_url('Pagescontroller/test_section') ?>" class="nav-link <?= $test_sec; ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p> Section</p>
                  </a>
                </li>
               
               <li class="nav-item">
                <a href="<?= base_url('Pagescontroller/districtlabs') ?>" class="nav-link <?= $districtlabs; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>  Lab</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?= base_url('Pagescontroller/testItems') ?>" class="nav-link <?= $testItems; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p> Test Items</p>
                </a>
              </li> -->
                <li class="nav-item">
                      <a href="<?= base_url('Pagescontroller/test_types') ?>" class="nav-link <?= $testItems; ?> <?= $test_types; ?>">
                        <i class="fa fa-circle-o nav-icon"></i>Assign Tests
                        <p></p>
                      </a>
                </li>
              <li class="nav-item">
                      <a href="<?= base_url('Pagescontroller/samples') ?>" class="nav-link <?= $sample; ?>">
                        <i class="fa fa-circle-o nav-icon"></i>Samples Types
                        <p></p>
                      </a>
                </li>
                 <li class="nav-item">
                <a href="<?= base_url('Pagescontroller/district') ?>" class="nav-link <?= $district; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p> District</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?= base_url('Pagescontroller/tehsil') ?>" class="nav-link <?= $tehsil; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p> Tehsil</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?= base_url('Pagescontroller/cattles') ?>" class="nav-link <?= $cattles; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p> Animals</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?= base_url('Pagescontroller/breeds') ?>" class="nav-link <?= $breeds; ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p> Breeds</p>
                </a>
              </li>
                <li class="nav-item">
                      <a href="<?= base_url('Pagescontroller/antibiotics') ?>" class="nav-link <?= $anti; ?>">
                        <i class="fa fa-circle-o nav-icon"></i>Antibiotics
                        <p></p>
                      </a>
                </li>
            </ul>
          </li>
<?php
    }
    else
    {

    }
 }
  if($permissions[2]->module_id==3)
 {
    if($permissions[2]->show_none==0)
    {
?>
           <li class="nav-item has-treeview 
           <?php if($addNew_test=='active' || $quick_test_receipt=='active' || $reg_test=='active' || $pending=='active' || $posted=='active' || $cancelled=='active' )
            {
             echo'menu-open'; 
            } ?> ">
            <a href="#" class="nav-link <?= $addNew_test.' '. $quick_test_receipt.' '.$pending.' '.$posted.' '.$cancelled.' '.$reg_test; ?>">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p style="color: white; font-weight: bold">
               TEST PANEL
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="<?= base_url('Tests/addNew_test'); ?>" class="nav-link <?= $reg_test; ?>">
                    <i class="fa fa-file nav-icon"></i>REGISTER NEW TEST
                    <p></p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Tests/test_records') ?>" class="nav-link <?= $addNew_test; ?>">
                  <i class="fa fa-list-alt nav-icon"></i>All TESTS
                  <p></p>
                </a>
              </li>
               <li class="nav-item">
                  <a href="<?= base_url('Tests/pending_records'); ?>" class="nav-link <?= $pending; ?>">
                    <i class="fa fa-list-alt nav-icon"></i>In progress
                    <p></p>
                  </a>
              </li>
               <li class="nav-item">
                  <a href="<?= base_url('Tests/posted_records'); ?>" class="nav-link <?= $posted; ?>">
                    <i class="fa fa-list-alt nav-icon"></i>Completed
                    <p></p>
                  </a>
              </li> 
               <li class="nav-item">
                  <a href="<?= base_url('Tests/cancelled_records'); ?>" class="nav-link <?= $cancelled; ?>">
                    <i class="fa fa-list-alt nav-icon"></i>Cancelled
                    <p></p>
                  </a>
              </li> 
            </ul>
          </li>
<?php
    }
    else
    {

    }
 }
?>
<?php 
 if($permissions[4]->module_id==5)
 {
    if($permissions[4]->show_none==0)
    {
?>



          <li class="nav-item">
            <a href="<?= base_url('Reports/quarters'); ?>" class="nav-link <?= $quarters; ?>">
            <i class="fa fa-list-alt nav-icon"></i>Quarter Reports
          </a>
          </li>

           <li class="nav-item has-treeview <?php if($lab_wise_view=='active' ||  $center_wise_view=='active'  || $datewise_test_records=='active' ||  $pending_report=='active' || $pendency=='active' || $cancelled_report=='active' ||  $posted_report=='active' ||  $all_report=='active' ||  $testtype=='active' ||   $Second_Quarters=='active' ||  $Third_Quarters=='active' ||  $Fourth_Quarters=='active' ||  $diseases=='active' ||  $districtlabsreports=='active' ||  $districcountreports=='active' ||  $samplereports=='active' ||  $animalreports=='active' || $testtypereports=='active'){ echo'menu-open'; } ?> ">
            <a href="#" class="nav-link <?= $lab_wise_view.'  '.$center_wise_view.'  '.$datewise_test_records.' '.$pending_report.' '.$cancelled_report.' '.$posted_report.' '.$all_report.' '.$pendency.' '.$testtype.' '.$Second_Quarters.' '.$Third_Quarters.' '.$Fourth_Quarters.' '.$testtypereports.' '.$diseases.' '.$districtlabsreports.' '.$districcountreports.' '.$samplereports.' '.$animalreports; ?> ">
              <i class="nav-icon fa fa-file"></i>
              <p style="color: white; font-weight: bold">
                 Detail Reports
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
               <!-- <li class="nav-item">
                  <a href="<?= base_url('Reports/center_wise_view'); ?>" class="nav-link <?= $center_wise_view; ?>">
                    <i class="fa fa-list-alt nav-icon"></i>Station Wise Test Report
                    <p></p>
                  </a>
              </li> -->
             <!--  <li class="nav-item">
                  <a href="<?= base_url('Reports/datewise_test_records'); ?>" class="nav-link <?= $datewise_test_records; ?>">
                    <i class="fa fa-list-alt nav-icon"></i>Date Wise Test Report
                    <p></p>
                  </a>
              </li>  -->
               <!-- <li class="nav-item">
                  <a href="<?= base_url('Reports/pending_report'); ?>" class="nav-link <?= $pending_report; ?>">
                    <i class="fa fa-list-alt nav-icon"></i>Pending Test Report


                    <p></p>
                  </a>
              </li>  -->
              <!-- <li class="nav-item">
                  <a href="<?= base_url('Reports/cancelled_report'); ?>" class="nav-link <?= $cancelled_report; ?>">
                    <i class="fa fa-list-alt nav-icon"></i>Cancelled Test Report


                    <p></p>
                  </a>
              </li>  -->
              <!-- <li class="nav-item">
                  <a href="<?= base_url('Reports/posted_report'); ?>" class="nav-link <?= $posted_report; ?>">
                    <i class="fa fa-list-alt nav-icon"></i>Posted Test Report


                    <p></p>
                  </a>
              </li>   -->
              <!-- <li class="nav-item">
                  <a href="<?= base_url('Reports/test_reports'); ?>" class="nav-link <?= $all_report; ?>">
                    <i class="fa fa-list-alt nav-icon"></i>All Tests Report
                    <p></p>
                  </a>
              </li>  -->
              <li class="nav-item">
                <a href="<?= base_url('Reports/testtypereports') ?>" class="nav-link <?= $testtypereports; ?> ">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Test type Wise Lab Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Reports/samplereports') ?>" class="nav-link <?= $samplereports; ?> ">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Sample Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Reports/Animalreports') ?>" class="nav-link <?= $animalreports; ?> ">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Animal type Report</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?= base_url('Reports/lab_wise_view'); ?>" class="nav-link <?= $lab_wise_view; ?>">
                    <i class="fa fa-list-alt nav-icon"></i>Status Wise Report
                    <p></p>
                  </a>
              </li> 

                 <li class="nav-item">
                <a href="<?= base_url('Reports/pending_test') ?>" class="nav-link <?= $pendency; ?> ">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Pendancy Reports</p>
                </a>
              </li> 
                
              
              
              <li class="nav-item">
                <a href="<?= base_url('Reports/districtlabsreports') ?>" class="nav-link <?= $districtlabsreports; ?> ">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Distric Wise Lab Report</p>
                </a>
              </li> 
                <!-- <li class="nav-item">
                <a href="<?= base_url('Reports/districcountreports') ?>" class="nav-link <?= $districcountreports; ?> ">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Distric Wise Lab Report</p>
                </a>
              </li> -->
              
              
            </ul>
          </li>
<?php
    }
    else
    {

    }
 }
?>
<?php
  if($permissions[3]->module_id==4)
 {
    if($permissions[3]->show_none==0)
    {
?>
          <li class="nav-item has-treeview <?php if($user=='active' || $roles=='active'){ echo'menu-open'; } ?> ">
            <a href="#" class="nav-link <?= $user.'  '.$roles; ?> ">
              <i class="nav-icon fa fa-users"></i>
              <p style="color: white; font-weight: bold">
                USER PANEL
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('User/index') ?>" class="nav-link <?= $user; ?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Register Users</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?= base_url('User/roles') ?>" class="nav-link <?= $roles; ?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Roles Permission</p>
                </a>
              </li>
            </ul>
          </li>
         
<?php
    }
    else
    {

    }
 }
?>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->