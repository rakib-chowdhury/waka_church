<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?= ucwords($admin_session_data['image']); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p style="margin-top: 12px;"><?= ucwords($admin_session_data['name']); ?></p>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li id="dashboard" class="treeview">
            <a href="<?= base_url('admin/dashboard'); ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li> 
        <li id="users" class="treeview">   
            <a href="<?= base_url('admin/users'); ?>">
              <i class="fa fa-user"></i> <span>Users</span>
            </a>
        </li>
        <li id="church" class="treeview">   
            <a href="<?= base_url('admin/church'); ?>">
              <i class="fa fa-tasks"></i> <span>Church</span>
            </a>
        </li>
        <li id="choir" class="treeview">   
            <a href="<?= base_url('admin/choir'); ?>">
              <i class="fa fa-tasks"></i> <span>Choir</span>
            </a>
        </li> 
        <li id="band" class="treeview">   
            <a href="<?= base_url('admin/band'); ?>">
              <i class="fa fa-tasks"></i> <span>Band</span>
            </a>
        </li>
        <li id="event" class="treeview">   
            <a href="<?= base_url('admin/event'); ?>">
              <i class="fa fa-tasks"></i> <span>Event</span>
            </a>
        </li>
         <li id="settings" class="treeview">   
            <a href="<?= base_url('admin/settings'); ?>">
              <i class="fa fa-tasks"></i> <span>Settings</span>
            </a>
        </li>                                                                                                                                                          
         <li id="menu" class="treeview">   
            <a href="<?= base_url('admin/menu'); ?>">
              <i class="fa fa-tasks"></i> <span>Menu</span>
            </a>
        </li>
         <li id="faq" class="treeview">   
            <a href="<?= base_url('admin/faq'); ?>">
              <i class="fa fa-tasks"></i> <span>Faq</span>
            </a>
        </li>
        </li>
         <li id="cms" class="treeview">   
            <a href="<?= base_url('admin/admin_cms'); ?>">
              <i class="fa fa-tasks"></i> <span>Cms</span>
            </a>
        </li>                                   
    </ul>
  </section>
</aside>
<script>
  $("#<?= $cur_tab; ?>").addClass('active');
</script>
