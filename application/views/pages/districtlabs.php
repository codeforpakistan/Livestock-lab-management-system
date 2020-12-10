<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <!-- Lab Information -->
        
      </h1>
     
    </section>


 
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Lab</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Districtlabscontroller/districtlab'); ?>" method="post">
        <div class="box-body">
          <div class="row">
                    
                  <div class="col-sm-12 form-group">
                    <label> Directorates</label>
                    <select class="form-control directorate_id" onchange="GetStations(this.value)"  name="directorate_id"  style="width: 100%" required>
                    <option  value="">-select-</option>
                    <?php 
                    
                    foreach ($directorates as $directorate) {
                      # code...
                      ?>
                      <option  value="<?php echo $directorate->directorate_id; ?>"><?php echo $directorate->directorate_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                  <div class="col-sm-12 form-group">
                    <label> Center/Station</label>
                    <select class="form-control center_station_id" onchange="GetSections(this.value)"  name="center_station_id"  style="width: 100%" required>
                      <option  value="">-select-</option>
                    
                     </select>
                    </div>
                    <div class="col-sm-12 form-group">
                  <label for="location">Section</label>
                  <select class="form-control section_id"  name="section_id"  style="width: 100%" required>
                  <option  value="">-select-</option>
                  </select>
                </div>
                    <div class="col-sm-12 form-group">
                      <span><?php echo validation_errors('lab_name'); ?> </span>
                    <label>Lab Name</label> 
                    <input type="text" name="lab_name" placeholder="Enter Lab Name" class="form-control" required required pattern="[A-zÀ-ž&\s]+" title="Enter Correct format">
                    </div>
                <div class="col-sm-12 form-group">
                   <span><?php echo validation_errors('lab_description'); ?> </span>
                  <label>Lab Description</label>
                  <textarea class="form-control" name="lab_description" cols="4" rows="3" required=""></textarea>
                </div>
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


    <!-- Main content -->
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header with-border">
            <b>Lab Information</b>  <?php include'MessageAlert.php'; ?>
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
               <a data-backdrop="static" data-keyboard="false" class="btn btn-success pull-right" data-toggle="modal" href='#myModal'>Add Lab</a>
            </div>
            <div class="card">
             <table class="table  table-striped table-hover" id="tbl-districtLab">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Lab</th>
                  <th>Section</th>
                  <th>Center/Station</th>
                  <th>Description</th>
                  <th>Action</th>
        
                </tr>
                <tbody>
                  <?php 
                  $count=1;
                foreach ($districtlab as $key => $districtlabs) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?php echo $count++ ?></td>
                    <td><?php echo $districtlabs->lab_name; ?></td>
                    <td><?php echo $districtlabs->sectionHelp_name; ?></td>
                    <td><?php echo $districtlabs->center_station_name; ?></td>
                    <td><?php echo $districtlabs->lab_description; ?></td>
                    <td><a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#districtlab<?= $key; ?>'> <span class="badge bg-success"> <i class="fa fa-pencil-square-o "></i> edit</span></a> 
                      <a  onclick="return confirm('Are you sure to delete?');" href='<?= base_url('Districtlabscontroller/delete/'.$districtlabs->lab_id); ?>'> <span class="badge bg-danger"><i class="fa fa-trash"></i> Remove</span></a>
                    </td>
                    
<div class="modal" id="districtlab<?= $key; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Lab</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('Districtlabscontroller/UpdateLab/') ?>" method="post">
          <input type="hidden" value="<?= $districtlabs->lab_id; ?>"  name="lab_id">
        <div class="box-body">
                <div class="row">
                    <div class="col-sm-12 form-group">
                    <label> Directorates</label>
                    <select class="form-control directorate_id" onchange="GetStations(this.value)"  name="directorate_id"  style="width: 100%" required>
                    <option  value="">-select-</option>
                    <?php 
                    
                    foreach ($directorates as $directorate) {
                      # code...
                      ?>
                      <option  <?php if($directorate->directorate_id==$districtlabs->directorate_id){ echo "selected";} ?>  value="<?php echo $directorate->directorate_id; ?>"><?php echo $directorate->directorate_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                    </div>
                  <div class="col-sm-12 form-group">
                    <label> Center/Station</label>
                    <select class="form-control center_station_id" onchange="GetSections(this.value)"  name="center_station_id"  style="width: 100%" required>
                      <?php 
                       $stations = $this->API_m->getRecordWhere('center_station',['directorate_id' => $districtlabs->directorate_id]);
                    foreach ($stations as $station) {
                      # code...
                      ?>
                      <option <?php if($station->center_station_id==$districtlabs->center_station_id){ echo "selected";} ?> value="<?php echo $station->center_station_id; ?>"><?php echo $station->center_station_name; ?></option>
                      <?php 
                    }

                     ?>
                     </select>
                    </div>
                    <div class="col-sm-6 form-group">
                  <label for="location">Section</label>
                  <select class="form-control section_id"  name="section_id"  style="width: 100%" required>
                    <option  value="">-select-</option>
                    <?php 
                    $sections = $this->API_m->GetSectionsItems($districtlabs->center_station_id);
                    foreach ($sections as $section) {
                      # code...
                      ?>
                      <option <?php if($section->section_id==$districtlabs->section_id){ echo "selected";} ?> value="<?php echo $section->section_id; ?>"><?php echo $section->sectionHelp_name; ?></option>
                      <?php 
                    }

                     ?>
                  </select>
                </div>
                <div class="col-sm-6 form-group">
                    <label>Lab Name</label>
                    <input type="text" name="labname" placeholder="Enter Lab Name" class="form-control" required value="<?= $districtlabs->lab_name; ?>">
                    </div>
                <div class="col-sm-6 form-group">
                  <label>Lab Description</label>
                  <textarea class="form-control" id="" name="lab_description" cols="4" rows="3"><?= $districtlabs->lab_description; ?></textarea>
                </div>
              </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-success" > Update Lab</button>
                    </div>
                </div>
                 </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The Modal -->
                    
                    
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

$('#tbl-districtLab').DataTable({
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
                    columns: [ 0,1,2,3,4 ]
                }
            }
        ]
})
  })
</script>