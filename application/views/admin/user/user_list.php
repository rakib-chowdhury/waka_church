 <section class="content" onload="initialize()">
   <div class="box">
      <div class="box-header">
          <h3 class="box-title">Users</h3>
          <a style="float: right; width: 15%;" href="<?= base_url('admin/users/add'); ?>" class="btn btn-default btn-xs">Add</a>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped ">
          <thead>
            <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>
              <th class="cust_th_img">Image</th>
              <th>is member?</th>
              <th>Status</th>
              <th class="text-right">Options</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($all_users as $row):  //echo "<pre>"; print_r($row);?>
            <tr>
              <td><?= $row['user_id']; ?></td>
              <td><?= $row['name']; ?></td>
              <td><?= $row['email']; ?></td>
              <td>
                <?php if(!empty($row['image'])){ ?>
                <img src="<?= $row['image']; ?>">
                <?php }else{ ?>
                <img src="<?php echo base_url(); ?>/assets/images/dummyuser.jpg">
                <?php } ?>
              </td>
              <td><?php 
                  if($row['is_member'] == 1){
                    echo '<strong>Yes</strong>';
                  }else{    
                    echo '<strong>No</strong>';
                  }
                  ?> 
              </td>              
              <td><?php 
                  if($row['status'] == 1){
                    echo '<strong><font color="green">Active</font></strong>';
                  }else{    
                    echo '<strong><font color="red">Inactive</font></strong>';
                  }
                  ?> 
              </td>
              <td class="text-right option_td">
                <div class="btn-group cus_action">
                  <button type="button" class="btn btn-info btn-flat">Action</button>
                  <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url('admin/users/view/'.$row['user_id']); ?>">View</a></li>
                    <li><a href="<?= base_url('admin/users/edit/'.$row['user_id']); ?>">Edit</a></li>
                    <li><a href="javascript:void(0);" onclick="ConfirmDelete(<?php echo $row['user_id']; ?>)">Delete</a></li>
                  </ul>
                </div>
              </td>              
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>  

<script type="text/javascript">
    $("#users").addClass('active');

    function ConfirmDelete(ID){
      var gourl = '<?= base_url('admin/users/del/'); ?>'+ID;
          if (confirm("<?php if($this->lang->line('delete_alert')){echo $this->lang->line('delete_alert');}else{ echo "Are you sure you want to delete this data?";} ?>"))
               location.href = gourl;
    }
</script> 
