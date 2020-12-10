<div class="content-wrapper">
    <section class="content-header">
      <h1>
      <!--  Center/Station Information -->
        
      </h1>
     
    </section>


    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button> -->


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add  Center/Station</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Pagescontroller/AddStation') ?>" method="post">
        <div class="box-body">
                    <div class="col-sm-12 form-group">
                    <label> Center/Station Name</label>
                    <input type="text" name="center_station_name" placeholder="Enter  Center/Station Name" class="form-control" required pattern="[A-zÀ-ž&\s]+">
                    </div>
                     <div class="col-sm-12 form-group">
                    <label> Phone #</label>
                    <input type="text" name="center_station_phone" placeholder="Enter  Center/Station Phone" title="Enter Only digits" class="form-control" required>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Fax #</label>
                    <input type="text" name="center_station_fax"  placeholder="Enter  Center/Station Fax" title="Enter Only digits" class="form-control" required>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Email</label>
                    <input type="text" name="center_station_email" placeholder="Enter  Center/Station Email" class="form-control" required>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Website link</label>
                  <input type="text" name="center_station_website" placeholder="i.e http://lims.kpdata.gov.pk/"  class="form-control" required>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Directorate</label>
                    <select class="form-control"  name="directorate_id"  style="width: 100%" required>
                      <option  value="">-select-</option>
                    <?php 
                    
                    foreach ($directorates as $direct) {
                      # code...
                      ?>
                      <option  value="<?php echo $direct->directorate_id; ?>"><?php echo $direct->directorate_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label>District</label>
                     <select class="form-control"  name="district_id"  style="width: 100%" required>
                      <option  value="">-select-</option>
                    <?php 
                    
                    foreach ($districts as $district) {
                      # code...
                      ?>
                      <option value="<?php echo $district->district_id; ?>"><?php echo $district->district_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                     <div class="col-sm-12 form-group">
                        <label>Center/Station Address</label>
                        <textarea class="form-control" name="center_station_address" cols="4" rows="3" ></textarea>
                      </div>
                  
                </div>
                 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-success" id="rclass">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>


    <!-- Main content -->
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header with-border">
              <b> Center/Station Information</b><?php include'MessageAlert.php'; ?>
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
               <a class="btn btn-success pull-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#myModal'>Add Center/Station</a>
            </div>
            <div class="card-body">
             <table class="table  table-striped table-hover" id="tbl-center">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Center/Station</th>
                  <th>Phone#</th>
                  <th>Fax#</th>
                  <th>Email</th>
                  <th>Url</th>
                  <th>Directorate</th>
                  <th>District</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                <tbody>
                  <?php 
                  $count=1;
                foreach ($stations as $key => $station) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?php echo $count++ ?></td>
                    <td><?php echo $station->center_station_name; ?></td>
                    <td><?php echo $station->center_station_phone; ?></td>
                    <td><?php echo $station->center_station_fax; ?></td>
                    <td><?php echo $station->center_station_email; ?></td>
                    <td><?php echo $station->center_station_website; ?></td>
                    <td><?php echo $station->directorate_name; ?></td>
                    <td><?php echo $station->district_name; ?></td>
                    <td><?php echo $station->center_station_address; ?></td>
                    <td><a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#station<?= $key; ?>'> <span class="badge bg-success"> <i class="fa fa-pencil-square-o   secedit"></i> edit</span></a> <a onclick="return confirm('Are you sure to delete?');" href="<?=  base_url('Pagescontroller/StationDelete/'.$station->center_station_id) ?>"> <span class="badge bg-danger"><i class="fa fa-trash  secedit"></i> Remove</span></a></td>
<!-- The Modal -->
<div class="modal" id="station<?= $key; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Center/Station</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Pagescontroller/StationUpdate') ?>" method="post">
        <div class="box-body">
                    <input type="hidden" name="center_station_id"  value="<?=  $station->center_station_id; ?>">
                    <div class="col-sm-12 form-group">
                   <label> Center/Station Name</label>
                    <input type="text" name="center_station_name" value="<?php echo $station->center_station_name; ?>" placeholder="Enter  Center/Station Name" class="form-control">
                    </div>
                   <div class="col-sm-12 form-group">
                    <label> Phone #</label>
                    <input type="text" name="center_station_phone" value="<?php echo $station->center_station_phone; ?>"  placeholder="Enter  Center/Station Phone" title="Enter Only digits" class="form-control" required>
                    </div>
                     <div class="col-sm-12 form-group">
                    <label> Fax #</label>
                    <input type="text" name="center_station_fax" value="<?php echo $station->center_station_fax; ?>"  placeholder="Enter  Center/Station Phone" title="Enter Only digits" class="form-control" required>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Email</label>
                    <input type="text" name="center_station_email" value="<?php echo $station->center_station_email; ?>" placeholder="Enter  Center/Station Email" class="form-control" required>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Website link</label>
                  <input type="text" name="center_station_website" value="<?php echo $station->center_station_website; ?>" placeholder="i.e http://lims.kpdata.gov.pk/"  class="form-control" required>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label> Directorate</label>
                    <select class="form-control"  name="directorate_id"  style="width: 100%" required>
                    <?php 
                    
                    foreach ($directorates as $direct) {
                      # code...
                      ?>
                      <option <?php if($direct->directorate_id==$station->directorate_id){ echo "selected";} ?> value="<?php echo $direct->directorate_id; ?>"><?php echo $direct->directorate_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                    <div class="col-sm-12 form-group">
                    <label>District</label>
                     <select class="form-control"  name="district_id"  style="width: 100%" required>
                    <?php 
                    
                    foreach ($districts as $district) {
                      # code...
                      ?>
                      <option <?php if($district->district_id==$station->district_id){ echo "selected";} ?> value="<?php echo $district->district_id; ?>"><?php echo $district->district_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                     <div class="col-sm-12 form-group">
                        <label>Center/Station Address</label>
                        <textarea class="form-control" name="center_station_address" cols="4" rows="3"> <?= $station->center_station_address; ?> </textarea>
                      </div>
                 
                </div>
                
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-success" id="rclass">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>                    
                    

                    
                    
                  </tr>
                  <?php  
                }

                   ?>
                </tbody>
              </thead>
            </table>
          </div>
          </div>
        </div>
      </div>
      </div>
      <!-- /.row -->
    </section>
    
<script>
  $(document).ready(function(){

$('#tbl-center').DataTable({
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
                    columns: [ 0,1,2 ]
                }
            }
        ]
})
  })
</script>