<?php
// echo "<pre>";
// print_r($permissions);
// exit();
?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
       <!-- Role Permissions :: <b><?= $roles->role_name; ?></b> -->
        
      </h1>
     
    </section>


    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button> -->

    <!-- Main content -->
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card">
             


            <div class="card-header with-border">
              Role Permissions :: <b><?= $roles->role_name; ?></b> <?php include'MessageAlert.php'; ?>
            </div>
            <div class="card-body">

              <form action="<?= base_url('User/updateRolePermissions/'); ?>" method="post">
                <input type="hidden" name="role_id" value="<?= $this->uri->segment(3); ?>">
                <table class="table  table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Modules</th>
                        <th>Show Created by</th>
                        <th>Show None</th>
                        <th>Show All</th>
                        <th>Show Lab by</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                          if(!empty($permissions))
                          {
                            foreach($permissions as $perm)
                            {
                      ?>
                        <tr>
                          <td>
                            <?= $perm->module_id; ?>
                          </td>
                          <td>
                            <?= $perm->module; ?>
                              
                          </td>
                          <td>
                            <!-- <?= $perm->show_created_by ?> -->
                            <input type="hidden" name="module[<?= $perm->role_perm_id?>][role_perm_id]" value="<?= $perm->role_perm_id; ?>"> 
                            <?php 
                              if($perm->show_created_by==2){
                             
                                echo "Not Specified"; 
                            ?>
                             <input type="hidden" class="show_created_by"  name="module[<?= $perm->role_perm_id?>][show_created_by]" value="2">  
                            <?php
                              }
                              else
                              {
                            ?>
                            <input type="checkbox" class="show_created_by" onclick="checkUnCheckData(this, 'show_lab_by', 'show_all', 'show_none')"  name="module[<?= $perm->role_perm_id?>][show_created_by]" value="1" <?php if($perm->show_created_by==1){ echo "checked"; } ?> >  
                            <?php
                              }
                             ?> 
                          </td>
                          <td>
                            <!-- <?= $perm->show_none; ?> -->
                            <input type="hidden" name="module[<?= $perm->role_perm_id?>][show_none]" value="0">  
                            <input type="checkbox" class="show_none" onclick="checkUnCheckData(this, 'show_created_by', 'show_lab_by', 'show_all')" name="module[<?= $perm->role_perm_id?>][show_none]" value="1" <?php if($perm->show_none==1){ echo "checked"; } ?> > 
                          </td>
                          <td>
                            <!-- <?= $perm->show_all; ?> -->
                              <input type="hidden" name="module[<?= $perm->role_perm_id?>][show_all]" value="0">  
                              <input type="checkbox" class="show_all" onclick="checkUnCheckData(this, 'show_created_by', 'show_lab_by', 'show_none')" name="module[<?= $perm->role_perm_id?>][show_all]" value="1" <?php if($perm->show_all==1){ echo "checked"; } ?> > 
                          </td>
                          <td>
                            <!-- <?= $perm->show_lab_by; ?> -->
                              <input type="hidden" name="module[<?= $perm->role_perm_id?>][show_lab_by]" value="0">  
                              <input type="checkbox" class="show_lab_by" onclick="checkUnCheckData(this, 'show_created_by', 'show_all', 'show_none')" name="module[<?= $perm->role_perm_id?>][show_lab_by]" value="1" <?php if($perm->show_lab_by==1){ echo "checked"; } ?> > 
                          </td>
                        </tr>
                      <?php
                            }
                          }
                      ?>
                    </tbody>
                </table> 
                <hr>
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4"></div>
                  <div class="col-md-3">
                    <button class="btn btn-block btn-success" type="submit" onclick="return confirm('Are you sure to Save the Changes?');">Save Changes</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
      <!-- /.row -->
    </section>

