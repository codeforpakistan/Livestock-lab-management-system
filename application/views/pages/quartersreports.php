<style>
  .bg-success{
     background-color: #00a65a !important;
  }
</style>

<?php
// echo "<pre>";
// print_r($testTypes);
// exit();

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
         <!--  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div> --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <div class="card bg-success">
              <div class="card-header">
                <h3 class="card-title text-center"><b>First Quarter</b></h3>

                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button> -->
                  <!-- <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i> 
                  </button> -->
                </div>
              </div>
 <!-- DONUT CHART -->
            
           
              </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                <?php 
               // echo date("Y");
                    $query1  =  $this->db->select("*")
                              ->from("testdetails")
                           
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                              
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-07-01")
                              ->where('testdetails.result_date <=',date("Y")."-09-31")

                              ->order_by('testdetails.testdetails_id','DESC')
                              ->get();
                      $total =  $query1->num_rows();
                      echo $total;

                  ?>
                </h3>
                <h4>Total Test</h4>
              </div>
              <div class="icon">
                <!-- <i class="fa fa-list-alt"></i> -->
              </div>
              <!-- <a href="<?= base_url('Tests/test_records'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                 <?php 
               // echo date("Y");
                    $query2  =  $this->db->select("*")
                              ->from("testdetails")
                           
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                              
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-07-01")
                              ->where('testdetails.result_date <=',date("Y")."-09-31")
                              ->where('testdetails.post_status',0)
                              ->where('testdetails.is_cancel',0)

                              ->order_by('testdetails.testdetails_id','DESC')
                              ->get();
                      $pending =  $query2->num_rows();
                      echo $pending;

                  ?>
                </h3>

                <h4>In Progress</h4>
              </div>
              <div class="icon">
                <!-- <i class="fa fa-medkit"></i> -->
              </div>
              <!-- <a href="<?= base_url('Tests/pending_records'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php 
               // echo date("Y");
                    $query3  =  $this->db->select("*")
                              ->from("testdetails")
                           
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                              
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-07-01")
                              ->where('testdetails.result_date <=',date("Y")."-09-31")
                             
                               ->where('testdetails.post_status',1)
                               ->where('testdetails.is_cancel',0)
                              ->order_by('testdetails.testdetails_id','DESC')
                              ->get();
                      $Completed =  $query3->num_rows();
                      echo $Completed;

                  ?>
                </h3>

                <!-- <h4>Total Labs Registered</h4> -->
                <h4>Completed</h4>
              </div>
              <div class="icon">
                <!-- <i class="fa fa-hospital-o"></i> -->
              </div>
              <!-- <a href="<?= base_url('Tests/posted_records'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
               
                <h3>
                  <?php 
               // echo date("Y");
                    $query4  =  $this->db->select("*")
                              ->from("testdetails")
                           
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                              
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-07-01")
                              ->where('testdetails.result_date <=',date("Y")."-09-31")
                              ->where('testdetails.is_cancel',1)
                              ->order_by('testdetails.testdetails_id','DESC')
                              ->get();
                      $canceled =  $query4->num_rows();
                      echo $canceled;

                  ?>
                </h3>

                <h4>Cancelled</h4>
                <!-- <h4>  Test Types</h4> -->
              </div>
              <div class="icon">
               <!--  <i class="fa fa-file"></i> -->
              </div>
              <!-- <a href="<?= base_url('Tests/cancelled_records'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
           <div class="row bg-white" style="padding: 5px;">

          <div class="col-12 col-sm-6 col-md-3 mb-3">
              <button type="button" class="btn btn-success m-r-sm" id="ims">
                      </button>
                      Impression Smear
          </div>
                 
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                       <button type="button" class="btn btn-warning m-r-sm" id="hemt">
                      </button>
                      Hematology
                 </div>

                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-primary m-r-sm" id="mast">
                      </button>
                      Mastitis
                </div>
                  
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-dark m-r-sm" id="urine">
                      </button>
                      Urine Examination
          </div>
                  
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                       <button type="button" class="btn btn-info m-r-sm" id="brucella">
                      </button>
                      Brucella Animal Combine
                  </div>
                 
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                      <button type="button" class="btn btn-danger m-r-sm" id="banimal">
                      </button>
                      Brucella Animal Individual
                  </div>
                 
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-warning m-r-sm" id="bhuman">
                    </button>
                      Brucella Human
                  </div>
                 
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <button type="button" class="btn btn-default m-r-sm" id="tuberculin">
                    </button>
                     Tuberculin Skin Test (TST)
                  </div>
                  
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-success m-r-sm" id="waterbact">
                     </button>
                    Water Bacteriology 
                  </div>
                  
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-success m-r-sm" id="afs">
                      </button>
                    Acid Fast Staining (AFS) 
                  </div>
                  
          
          
         
        
    
        </div>
       
  

         
        </div>









        











       
