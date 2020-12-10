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
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php echo $registered;  ?>
                </h3>
                <h4> Total Test</h4>
              </div>
              <div class="icon">
                <i class="fa fa-list-alt"></i>
              </div>
              <a href="<?= base_url('Dashboard/infoDetails/Totals'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php echo $pending; ?>
                </h3>

                <h4>In Progress </h4>
              </div>
              <div class="icon">
                <i class="fa fa-medkit"></i>
              </div>
              <a href="<?= base_url('Dashboard/infoDetails/InProgress'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <!-- <?php echo $labs;  ?><sup style="font-size: 30px"></sup> -->
                  <?php echo $posted;  ?><sup style="font-size: 30px"></sup>
                </h3>

                <!-- <h4>Total Labs Registered</h4> -->
                <h4>Completed </h4>
              </div>
              <div class="icon">
                <i class="fa fa-hospital-o"></i>
              </div>
              <a href="<?= base_url('Dashboard/infoDetails/Completed'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!-- <h3><?php echo $tests;  ?><sup style="font-size: 20px"></sup></h3> -->
                <h3><?php echo $cancelled;  ?><sup style="font-size: 20px"></sup></h3>

                <h4> Cancelled </h4>
                <!-- <h4>  Test Types</h4> -->
              </div>
              <div class="icon">
                <i class="fa fa-file"></i>
              </div>
              <a href="<?= base_url('Dashboard/infoDetails/cancelled'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <!-- <h3><?php echo $tests;  ?><sup style="font-size: 20px"></sup></h3> -->
                <h4>Today Test</h4>
                <h3><?= $today ?><sup style="font-size: 20px"></sup></h3>
                <!-- <h4>  Test Types</h4> -->
              </div>
             <div class="progress progress-mini">
                <div style="width: <?= $today.'%'; ?>" class="progress-bar bg-success"></div>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <!-- <h3><?php echo $tests;  ?><sup style="font-size: 20px"></sup></h3> -->
                <h4>Current Week</h4>
                <h3>
   <?= $current_week; ?>
       <sup style="font-size: 20px"></sup></h3>

                <!-- <h4>  Test Types</h4> -->
              </div>
               <div class="progress progress-mini">
                <div style="width:  <?= $current_week.'%'; ?>" class="progress-bar bg-success"></div>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <!-- <h3><?php echo $tests;  ?><sup style="font-size: 20px"></sup></h3> -->
                <h4> Current Month</h4>
                <h3><?= $current_month; ?><sup style="font-size: 20px"></sup></h3>

                <!-- <h4>  Test Types</h4> -->
              </div>
             <div class="progress progress-mini">
                <div style="width: <?= $current_month.'%'; ?>" class="progress-bar bg-success"></div>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-white">
              <div class="inner">
                <!-- <h3><?php echo $tests;  ?><sup style="font-size: 20px"></sup></h3> -->
                <h4> Current Year</h4>
                <h3><?= $current_year; ?><sup style="font-size: 20px"></sup></h3>

                <!-- <h4>  Test Types</h4> -->
              </div>
               <div class="progress progress-mini">
                <div style="width: <?= $current_year.'%'; ?>" class="progress-bar bg-success"></div>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
    
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
                      <canvas id="pieTab" height="174" width="199" style="width: 199px; height: 174px;"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <!-- <li><i class="fa fa-circle-o text-success"></i> Total</li> -->
                      <li><i class="fa fa-circle-o text-warning"></i> In progress</li>
                      <li><i class="fa fa-circle-o text-info"></i> Completed</li>
                      <li><i class="fa fa-circle-o text-danger"></i> Cancelled</li>
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
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6">
 <!-- AREA CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">MonthlyTotal Test Report Chart</h3>

                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i> -->
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="height:290px !important;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6">
 <!-- DONUT CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Total Test Types Report</h3>

                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i> -->
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                </div>
              </div>
              <div class="card-body">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
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


<?php
 
$dataPoints1 = array(
  array("label"=> "2010", "y"=> 36.12),
  array("label"=> "2011", "y"=> 34.87),
  array("label"=> "2012", "y"=> 40.30),
  array("label"=> "2013", "y"=> 35.30),
  array("label"=> "2014", "y"=> 39.50),
  array("label"=> "2015", "y"=> 50.82),
  array("label"=> "2016", "y"=> 74.70)
);
$dataPoints2 = array(
  array("label"=> "2010", "y"=> 64.61),
  array("label"=> "2011", "y"=> 70.55),
  array("label"=> "2012", "y"=> 72.50),
  array("label"=> "2013", "y"=> 81.30),
  array("label"=> "2014", "y"=> 63.60),
  array("label"=> "2015", "y"=> 69.38),
  array("label"=> "2016", "y"=> 98.70)
);
  
?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("BarchartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Average Amount Spent on Real and Artificial X-Mas Trees in U.S."
  },
  axisY:{
    includeZero: true
  },
  legend:{
    cursor: "pointer",
    verticalAlign: "center",
    horizontalAlign: "right",
    itemclick: toggleDataSeries
  },
  data: [{
    type: "column",
    name: "Real Trees",
    indexLabel: "{y}",
    yValueFormatString: "$#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
  },{
    type: "column",
    name: "Artificial Trees",
    indexLabel: "{y}",
    yValueFormatString: "$#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
function toggleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else{
    e.dataSeries.visible = true;
  }
  chart.render();
}
 
}
</script>
<script type="text/javascript">
window.onload = function () {
    var dataPoints = [
     {'label': 'Impression Smear', y: <?php echo $impression_smear; ?>},
     {'label': 'Mastitis', y: <?php echo $mastitis; ?>},
     {'label': 'Urine Examination', y: <?php echo $urine_examination; ?>},
     {'label':'Haematology', y:<?php echo $haematology; ?>},
     {'label':'Brucella Animal Combine', y:<?php echo $brucella_animal_combine; ?>},
     {'label':'Brucella Animal Ind', y:<?php echo $brucella_animal_ind; ?>},
     {'label':'Brucella Human', y:<?php echo $brucella_human; ?>},
     {'label':'TB & VPH', y:<?php echo $tb_and_vph; ?>},
     {'label':'Water Bacteriology', y:<?php echo $water_bacteriology; ?>},
     {'label':'Acid Fast Staining', y:<?php echo $afs; ?>}
     ];
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        title:{
            text: "Total Test Types Wise Report "
        },
        subtitles: [{
            text: ""
        }],
        data: [{
            type: "pie",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "",
            dataPoints: dataPoints
        }]
    });
chart.render();
}
</script>
