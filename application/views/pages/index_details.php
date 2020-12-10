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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
         <!--  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div> --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row bg-white" style="padding: 5px;">
          <?php
            if(!empty($testTypes))
            {
              foreach($testTypes as $type)
              {
          ?>
                  <?php
                    if($type->testHelp_id==1)
                    {
                  ?>
          <div class="col-12 col-sm-6 col-md-3 mb-3">
              <button type="button" class="btn btn-success m-r-sm">
                        <?php echo $impression_smear;  ?>
                      </button>
                      <?= $type->testHelp_name; ?>
          </div>
                  <?php
                    }else 
                    if($type->testHelp_id==2)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                       <button type="button" class="btn btn-warning m-r-sm">
                        <?php echo $haematology;  ?>
                      </button>
                       <?= $type->testHelp_name; ?>
                 </div>
                  <?php
                    }else 
                    if($type->testHelp_id==3)
                    {
                  ?>

                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-primary m-r-sm">
                        <?php echo $mastitis;  ?>
                      </button>
                      <?= $type->testHelp_name; ?>
                </div>
                  <?php
                    }else 
                    if($type->testHelp_id==4)
                    {
                  ?>

                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-warning m-r-sm">
                        <?php echo $culture_sensitivity;  ?>
                      </button>
                       <?= $type->testHelp_name; ?>
                </div>
                  <?php
                    }
                    else 
                    if($type->testHelp_id==5)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-dark m-r-sm">
                        <?php echo $urine_examination;  ?>
                      </button>
                       <?= $type->testHelp_name; ?>
          </div>
                  <?php
                    }else 
                    if($type->testHelp_id==6)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                       <button type="button" class="btn btn-info m-r-sm">
                        <?php echo $mrt;  ?>
                      </button>
                      <?= $type->testHelp_name; ?>
                  </div>
                  <?php
                    }else 
                    if($type->testHelp_id==7)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                      <button type="button" class="btn btn-danger m-r-sm">
                        <?php echo $rbpt;  ?>
                      </button>
                      RBPT
                  </div>
                  <?php
                    }else 
                    if($type->testHelp_id==8)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-warning m-r-sm">
                        <?php echo $spat_human;  ?>
                      </button>
                    <?= $type->testHelp_name; ?>
                  </div>
                  <?php
                    }else 
                    if($type->testHelp_id==9)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                    <button type="button" class="btn btn-default m-r-sm">
                        <?php echo $tuberculin_skin_test;  ?>
                      </button>
                     <?= $type->testHelp_name; ?>
                  </div>
                  <?php
                    }else 
                    if($type->testHelp_id==10)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-success m-r-sm">
                        <?php echo $water_bacteriology;  ?>
                      </button>
                     <?= $type->testHelp_name; ?>
                  </div>
                  <?php
                    }
                    else if($type->testHelp_id==11)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-success m-r-sm">
                        <?php echo $afs;  ?>
                      </button>
                    <?= $type->testHelp_name; ?> 
                  </div>
                  <?php
                    }else if($type->testHelp_id==12)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-success m-r-sm">
                        <?php echo $elisa_human;  ?>
                      </button>
                    <?= $type->testHelp_name; ?>
                  </div>
                  <?php
                    }else if($type->testHelp_id==13)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-success m-r-sm">
                        <?php echo $elisa_animal;  ?>
                      </button>
                     <?= $type->testHelp_name; ?> 
                  </div>
                  <?php
                    }else if($type->testHelp_id==14)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-success m-r-sm">
                        <?php echo $pcr_human;  ?>
                      </button>
                     <?= $type->testHelp_name; ?>
                  </div>
                  <?php
                    }else if($type->testHelp_id==15)
                    {
                  ?>
                   <div class="col-12 col-sm-6 col-md-3 mb-3">
                     <button type="button" class="btn btn-success m-r-sm">
                        <?php echo $pcr_human;  ?>
                      </button>
                       <?= $type->testHelp_name; ?>
                  </div>
                  <?php
                    }
                  ?>                 

          <?php
              }
            }
          ?>
  

         
        </div>
        <!-- /.row --><br>
        <div class="row" >
          <section class="col-lg-12">
            <div class="card bg-success">
              <div class="card-header">
                <h3 class="card-title text-center">Graph wise Total Tests Statistics</h3>

                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button> -->
                  <!-- <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i> 
                  </button> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="pieTab2" height="174" width="199" style="width: 199px; height: 174px;"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <!-- <li><i class="fa fa-circle-o text-success"></i> Total</li> -->
                       <?php
            if(!empty($testTypes))
            {
              foreach($testTypes as $type)
              {
          ?>
                  <?php
                    if($type->testHelp_id==1)
                    {
                  ?>
                     <li><i class="fa fa-circle-o" style="color: #4287f5;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else 
                    if($type->testHelp_id==2)
                    {
                  ?>
                      <li><i class="fa fa-circle-o" style="color: #42e3f5;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else 
                    if($type->testHelp_id==3)
                    {
                  ?>
                     <li><i class="fa fa-circle-o" style="color: #2dc286;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else 
                    if($type->testHelp_id==4)
                    {
                  ?>
                     <li><i class="fa fa-circle-o" style="color: #23d94d;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }
                    else 
                    if($type->testHelp_id==5)
                    {
                  ?>
                      <li><i class="fa fa-circle-o" style="color: #5ad923;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else 
                    if($type->testHelp_id==6)
                    {
                  ?>
                     <li><i class="fa fa-circle-o" style="color: #84d923;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else 
                    if($type->testHelp_id==7)
                    {
                  ?>
                     <li><i class="fa fa-circle-o" style="color: #bbd923;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else 
                    if($type->testHelp_id==8)
                    {
                  ?>
                     <li><i class="fa fa-circle-o" style="color: #d9a823;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else 
                    if($type->testHelp_id==9)
                    {
                  ?>
                     <li><i class="fa fa-circle-o" style="color: #d96323;"></i><?= $type->testHelp_name; ?></li>
                  <?php
                    }else 
                    if($type->testHelp_id==10)
                    {
                  ?>
                   <li><i class="fa fa-circle-o" style="color: #d95d23;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }
                    else if($type->testHelp_id==11)
                    {
                  ?>
                     <li><i class="fa fa-circle-o" style="color: #a523d9;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else if($type->testHelp_id==12)
                    {
                  ?>
                    <li><i class="fa fa-circle-o" style="color: #d9239f;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else if($type->testHelp_id==13)
                    {
                  ?>
                    <li><i class="fa fa-circle-o" style="color: #d92351;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else if($type->testHelp_id==14)
                    {
                  ?>
                    <li><i class="fa fa-circle-o" style="color: #d9232c;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }else if($type->testHelp_id==15)
                    {
                  ?>
                 
                       <li><i class="fa fa-circle-o" style="color: #7e23d9;"></i> <?= $type->testHelp_name; ?></li>
                  <?php
                    }
                  ?>                 

          <?php
              }
            }
          ?>
  
                      <!-- <li><i class="fa fa-circle-o text-primary"></i> Opera</li>
                      <li><i class="fa fa-circle-o text-secondary"></i> Navigator</li> -->
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
             
              <!-- /.footer -->
            </div>
          </section>
          <section class="col-lg-6">
            
          </section>
        </div>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer bg-success">
    <strong>Copyright &copy; 2020 <a href="javascript:void(0);"><?php if (!empty($logUser->lab_name)) { echo strtoupper($logUser->lab_name); } ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b><!-- Version</b> 3.0.0-alpha -->
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
