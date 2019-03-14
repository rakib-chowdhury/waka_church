<?php $admin_session_data = $this->session->userdata('admin_sess_data'); //echo "<pre>"; print_r($admin_session_data); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Waka Church Admin</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/AdminLTE.min.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins. -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/skin-purple.min.css">
		<!-- Date Picker -->
		<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css"> 
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datetimepicker.css">
		<link href='<?= base_url() ?>assets/css/select2.min.css' rel='stylesheet' type='text/css'>	  
		<!-- jQuery 2.2.3 -->
		<script src="<?= base_url() ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>	
		<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script> 
		<script src='<?= base_url() ?>assets/js/select2.min.js' type='text/javascript'></script>
        		  	
	</head>
	<body class="hold-transition skin-purple sidebar-mini">
		<div class="wrapper" style="height: auto;">
			 <?php if($this->session->flashdata('msg') != ''): ?>
			    <div class="alert alert-success flash-msg alert-dismissible">
			      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			      <h4> Success!</h4>
			      <?= $this->session->flashdata('msg'); ?> 
			    </div>
			 <?php endif; ?>
			 <?php if($this->session->flashdata('err') != ''): ?>
			    <div class="alert alert-danger flash-msg alert-dismissible">
			      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			      <h4> Error!</h4>
			      <?= $this->session->flashdata('err'); ?> 
			    </div>
			  <?php endif; ?> 			   
			<section id="container">
				<!--header start-->
				<header class="header white-bg">
					<?php include('include/navbar.php'); ?>
				</header>
				<!--header end-->
				<!--sidebar start-->
				<aside>
					<?php include('include/sidebar.php'); ?>
				</aside>
				<!--sidebar end-->
				<!--main content start-->
				<section id="main-content">
					<div class="content-wrapper" style="min-height: 394px; padding:15px;">
						<!-- page start-->
						<?php $this->load->view($view);?>
						<!-- page end-->
					</div>
				</section>
				<!--main content end-->
				<!--footer start-->
				<footer class="main-footer">
					<div class="col-md-6" style="line-height: 20px;">
					<strong>Copyright © 2018 <a href="<?php echo base_url("admin/dashboard"); ?>">Wakachurch</a></strong> All rights reserved.
				</div>
				<div class="col-md-6 copy">
					<p><strong>Designed and Developed</strong> by <strong><a href="#" target="_blank">Imtiyaz</a></strong></p>
				</div>
				</footer>
				<!--footer end-->
			</section>
	    </div>	
		<!-- Bootstrap 3.3.6 -->
		<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?= base_url() ?>assets/js/app.min.js"></script>
		<script src="<?= base_url() ?>assets/js/jquery.session.js"></script>
		<!-- Slimscroll -->
		<script src="<?= base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- DataTables -->
		<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<!-- <script src="<?= base_url() ?>public/plugins/fastclick/fastclick.js"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		<script src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
		<!-- page script -->
		<script type="text/javascript">
		  	//for datatable
			$(function () {
				$("#example1").DataTable({
				    "order": [[ 0, "desc" ]]
				});
			});
			// for flash message
			$(".flash-msg").fadeTo(10000, 1000).slideUp(1000, function(){
				$(".flash-msg").slideUp(1000);
			});
			// for datetimepicker
            $(function () {
                $('#event_date').datetimepicker({
			        format: 'YYYY-MM-DD HH:mm:ss',
			        minDate: new Date()
			    });
            });
            $(function () {
                $('#mon_start,#mon_end,#tue_start,#tue_end,#wed_start,#wed_end,#thu_start,#thu_end,#fri_start,#fri_end,#sat_start,#sat_end,#sun_start,#sun_end,#event_start,#event_end').datetimepicker({
                    format: 'LT'
                });
            });            
		</script>	
	</body>
</html>