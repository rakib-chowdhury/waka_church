<header class="main-header">
  <a href="<?= base_url('admin/dashboard'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <?php $name_exp = explode(' ',$admin_session_data['name']); ?>
      <span class="logo-mini"><b><?php echo strtoupper($name_exp[0]);?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo strtoupper($admin_session_data['name']);?></b></span>
  </a>
  <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= ucwords($admin_session_data['image']); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?= ucwords($admin_session_data['name']); ?></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="user-header">
                          <a href="<?= site_url('admin/login/profile'); ?>"><img src="<?= ucwords($admin_session_data['image']); ?>" class="img-circle" alt="User Image"></a>
                          <p><a class="nav_cus_link" href="<?= base_url('admin/login/profile'); ?>">Admin</a></p>
                      </li>
                      <li class="user-footer">
                          <div class="pull-right">
                              <a href="<?= base_url('admin/login/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                          </div>
                          <div class="pull-left">
                              <a href="<?= base_url('admin/login/change_pwd'); ?>" class="btn btn-default btn-flat">Change password</a>
                          </div>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
  </nav>
</header>
 