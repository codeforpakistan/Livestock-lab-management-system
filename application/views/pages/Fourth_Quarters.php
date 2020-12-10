<style>
  .bg-success{
     background-color: #164821 !important;
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
                <h3 class="card-title text-center"><b>Fourth Quarter</b></h3>

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
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")

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
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
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
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                             
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
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
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
              <button type="button" class="btn btn-success m-r-sm">
                        <?php 
               // echo date("Y");
                    $query6  =  $this->db->select("*")
                              ->from("testdetails")
                             
                             
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                             
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                              ->where('th.testHelp_name',"Impression Smear")
                              
                              ->get();
                      $ims =  $query6->num_rows();
                      echo $ims;

                  ?>
                      </button>
                      Impression Smear
          </div>
                 
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                       <button type="button" class="btn btn-warning m-r-sm">
                      <?php 
               // echo date("Y");
                    $query7  =  $this->db->select("*")
                              ->from("testdetails")
                             
                             
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                             
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                              ->where('th.testHelp_name',"Hematology")
                              
                              ->get();
                      $hemt =  $query7->num_rows();
                      echo $hemt;

                  ?>
                      </button>
                      Hematology
                 </div>

                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-primary m-r-sm">
                        <?php 
               // echo date("Y");
                    $query8  =  $this->db->select("*")
                              ->from("testdetails")
                             
                             
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                             
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                              ->where('th.testHelp_name',"Mastitis")
                              
                              ->get();
                      $mast =  $query8->num_rows();
                      echo $mast;

                  ?>
                      </button>
                      Mastitis
                </div>
                  
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-dark m-r-sm">
                        <?php 
               // echo date("Y");
                    $query9  =  $this->db->select("*")
                              ->from("testdetails")
                             
                             
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                             
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                              ->where('th.testHelp_name',"Urine Examination")
                              
                              ->get();
                      $urine =  $query9->num_rows();
                      echo $urine;

                  ?>
                      </button>
                      Urine Examination
          </div>
                  
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                       <button type="button" class="btn btn-info m-r-sm">
                        <?php 
               // echo date("Y");
                    $query10  =  $this->db->select("*")
                              ->from("testdetails")
                             
                             
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                             
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                              ->where('th.testHelp_name',"Brucella Animal Combine")
                              
                              ->get();
                      $Brucella =  $query10->num_rows();
                      echo $Brucella;

                  ?>
                      </button>
                      Brucella Animal Combine
                  </div>
                 
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                      <button type="button" class="btn btn-danger m-r-sm">
                       <?php 
               // echo date("Y");
                    $query12  =  $this->db->select("*")
                              ->from("testdetails")
                             
                             
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                             
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                              ->where('th.testHelp_name',"Brucella Animal Individual")
                              
                              ->get();
                      $banimal =  $query12->num_rows();
                      echo $banimal;

                  ?>
                      </button>
                      Brucella Animal Individual
                  </div>
                 
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-warning m-r-sm">
                        <?php 
               // echo date("Y");
                    $query13  =  $this->db->select("*")
                              ->from("testdetails")
                             
                             
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                             
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                              ->where('th.testHelp_name',"Brucella Human")
                              
                              ->get();
                      $bhuman =  $query13->num_rows();
                      echo $bhuman;

                  ?>
                      </button>
                      Brucella Human
                  </div>
                 
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <button type="button" class="btn btn-default m-r-sm">
                      <?php 
               // echo date("Y");
                    $query14  =  $this->db->select("*")
                              ->from("testdetails")
                             
                             
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                             
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                              ->where('th.testHelp_name',"Tuberculin Skin Test (TST)")
                              
                              ->get();
                      $Tuberculin =  $query14->num_rows();
                      echo $Tuberculin;

                  ?>
                      </button>
                     Tuberculin Skin Test (TST)
                  </div>
                  
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-success m-r-sm">
                        <?php 
               // echo date("Y");
                    $query15  =  $this->db->select("*")
                              ->from("testdetails")
                             
                             
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                             
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                              ->where('th.testHelp_name',"Water Bacteriology")
                              
                              ->get();
                      $waterbact =  $query15->num_rows();
                      echo $waterbact;

                  ?>
                      </button>
                    Water Bacteriology 
                  </div>
                  
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-success m-r-sm">
                        <?php 
               // echo date("Y");
                    $query16  =  $this->db->select("*")
                              ->from("testdetails")
                             
                             
                              ->join("tests",'tests.test_id=testdetails.test_id')
                              ->join('testhelp as th','th.testHelp_id=tests.testHelp_id')
                             
                              // ->where('testdetails.created_by',$this->session->userdata('user')['user_id'])
                              ->where('testdetails.result_date >=',date("Y")."-04-01")
                              ->where('testdetails.result_date <=',date("Y")."-06-31")
                              ->where('th.testHelp_name',"Acid Fast Staining")
                              
                              ->get();
                      $afs =  $query16->num_rows();
                      echo $afs;

                  ?>
                      </button>
                    Acid Fast Staining (AFS) 
                  </div>
                  
          
          
         
        
    
        </div>
       
  

         
        </div>









        











       
