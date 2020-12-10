<div class="content-wrapper">
    <section class="content-header">
      <h1>
       <!-- tehsil Information -->
        
      </h1>
     
    </section>


    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button> -->

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Tehsil</h4>
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('Districtcontroller/tehsil_insert'); ?>" method="post">
        <div class="box-body">
                    <div class="col-sm-12 form-group">
                    <label>Tehsil Name</label>
                    <input type="text" name="tehsil_name" placeholder="Enter Tehsil Name" class="form-control" required maxlength="50" minlength="2">
                    </div>
                    <div class="col-sm-12 form-group">
                    <label>Select District</label>
                     <select class="form-control" name="district_id" required>
                        <option value="">-select-</option>
                         <?php
                              if(!empty($districts))
                              {
                                foreach($districts as $dis)
                                {
                        ?>
                            <option value="<?= $dis->district_id; ?>"><?= $dis->district_name; ?></option>
                        <?php
                                }
                              }
                         ?>
                         <?php
                         ?>
                      </select>
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
              
               <b>  Tehsil Information</b> <?php include'MessageAlert.php'; ?>
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
               <a data-backdrop="static" data-keyboard="false" class="btn btn-success pull-right" data-toggle="modal" href='#myModal'>Add Tehsil</a>
            </div>
            <div class="card-body">
            <table class="table  table-striped table-hover" id="tbl-tehsil">
              <thead>
                <tr class="bg-success">
                  <th>#</th>
                  <th>Tehsil</th>
                  <th>District</th>
                  <th>Action</th>
        
                </tr>
                <tbody>
                  <?php 
                  $count=1;
                foreach ($tehsils as $key => $tehsil) {
                  # code...
                  ?>
                  <tr>
                    <td class="bg-green"><?php echo $count++ ?></td>
                    <td><?php echo $tehsil->tehsil_name; ?></td>
                    <td><?php echo $tehsil->district_name; ?></td>
                    <td><a data-backdrop="static" data-keyboard="false" data-toggle="modal" href='#Distt<?= $key; ?>'> <span class="badge bg-success"> <i class="fa fa-pencil-square-o "></i> edit</span></a> 
                     <a  onclick="return confirm('Are you sure to delete?');" href='<?= base_url('Districtcontroller/deleteTehsil/'.$tehsil->tehsil_id); ?>'> <span class="badge bg-danger"><i class="fa fa-trash "></i> Remove</span></a>
                 </td>
                     
    
<div class="modal" id="Distt<?= $key; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update tehsil</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?= base_url('Districtcontroller/tehsilUpdate'); ?>" method="post">
        <div class="box-body">
              <input type="hidden" value="<?= $tehsil->tehsil_id;  ?>" name="tehsil_id">
                   <div class="col-sm-12 form-group">
                      
                    <label>Tehsil Name</label>
                    <input type="text" name="tehsil_name" placeholder="Enter Tehsil Name" value="<?= $tehsil->tehsil_name; ?>" class="form-control" required maxlength="50" minlength="2">
                    </div>
                    <div class="col-sm-12 form-group">
                    <label>Select District</label>
                      <select class="form-control" name="district_id" required>
                        <option value="">-select-</option>
                         <?php
                              if(!empty($districts))
                              {
                                foreach($districts as $dis)
                                {
                        ?>
                            <option <?php if($tehsil->district_id==$dis->district_id){ echo "selected"; } ?> value="<?= $dis->district_id; ?>"><?= $dis->district_name; ?></option>
                        <?php
                                }
                              }
                         ?>
                         <?php
                         ?>
                      </select>
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

$('#tbl-tehsil').DataTable({
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
                    columns: [ 0,1,2]
                }
            }
        ]
})
  })
</script>