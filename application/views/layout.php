<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title><?= isset($title) ? $title . ' -' . $this->general_settings['application_name'] : $this->general_settings['application_name'] ?></title>
	<!-- Favicon-->
	<link rel="icon" href="<?= base_url($this->general_settings['favicon']) ?>" type="image/x-icon">
	<!-- Google Fonts -->
	<link href="<?= base_url() ?>public/plugins/google-fonts/roboto.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>public/plugins/google-fonts/material-icons.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap Core Css -->
	<link href="<?= base_url() ?>public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
	<!-- Waves Effect Css -->
	<link href="<?= base_url() ?>public/plugins/node-waves/waves.css" rel="stylesheet" />
	<!-- Animation Css -->
	<link href="<?= base_url() ?>public/plugins/animate-css/animate.css" rel="stylesheet" />
	<!-- Morris Chart Css-->
	<link href="<?= base_url() ?>public/plugins/morrisjs/morris.css" rel="stylesheet" />
	<!-- Custom Css -->
	<link href="<?= base_url() ?>public/css/style.css" rel="stylesheet">
	<!-- Materialize Css -->
	<link href="<?= base_url() ?>public/css/materialize.css" rel="stylesheet">
	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="<?= base_url() ?>public/css/themes/all-themes.css" rel="stylesheet" />
	<!-- Shared Plugin CSS -->
	<link href="<?= base_url() ?>public/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
	<link href="<?= base_url() ?>public/plugins/waitme/waitMe.css" rel="stylesheet" />
	<link href="<?= base_url() ?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
	<link href="<?= base_url() ?>public/plugins/dropzone/dropzone.css" rel="stylesheet">
	<link href="<?= base_url() ?>public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

	<!-- Google reCaptcha -->
	<script src="<?= base_url() ?>public/plugins/recaptcha/api.js" async defer></script>
	<!-- Jquery Core Js -->
	<script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
	<!-- daterange-picker -->
	<link href="<?= base_url() ?>public/plugins/daterange-picker/css/daterangepicker.css" rel="stylesheet" />
	<!-- SweetAlert2 CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>public/plugins/sweetalert2/sweetalert2.min.css">
	<!-- Include Select2 CSS -->
	<link href="<?= base_url() ?>public/plugins/select2/select2.min.css" rel="stylesheet" />
	<!-- DataTables CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/css/dataTables.bootstrap.min.css">
	<!-- jQuery UI CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>public/plugins/jquery-ui/css/jquery-ui.css">
	<!-- NProgress CSS (local) -->
	<link rel="stylesheet" href="<?= base_url() ?>public/plugins/nprogress/nprogress.min.css">
</head>

<!-- Daterange custome style -->
<style>
	.daterangepicker .ranges ul li.active {
		background-color: #1f91f3 !important;
		color: white !important;
	}

	.daterangepicker .ranges ul li:hover {
		background-color: #6e6e6e !important;
		color: white !important;
	}

	.daterangepicker .drp-buttons .applyBtn {
		background-color: #28a745 !important;
		border-color: #28a745 !important;
		color: white !important;
	}

	.daterangepicker .drp-buttons .cancelBtn {
		background-color: #dc3545 !important;
		border-color: #dc3545 !important;
		color: white !important;
	}

	.daterangepicker .drp-buttons .applyBtn:hover {
		background-color: #218838 !important;
		border-color: #218838 !important;
		color: white !important;
	}

	.daterangepicker .drp-buttons .cancelBtn:hover {
		background-color: #c82333 !important;
		border-color: #c82333 !important;
		color: white !important;
	}

	.dataTables_wrapper {
		overflow-x: hidden;
	}

	.body.table-responsive {
		overflow-x: visible !important;
	}

	/* NProgress Color Customization */
	#nprogress .bar {
		background: #8BC34A !important; /* Blue color to match your theme */
		height: 3px !important;
	}

	#nprogress .peg {
		box-shadow: 0 0 10px #8BC34A, 0 0 5px #8BC34A !important;
	}

	#nprogress .spinner-icon {
		border-top-color: #8BC34A !important;
		border-left-color: #8BC34A !important;
	}

	/* Required Field Red Asterisk */
	.form-group .form-line:has(input[required]) .form-label::after,
	.form-group .form-line:has(select[required]) .form-label::after,
	.form-group .form-line:has(textarea[required]) .form-label::after {
		content: " *";
		color: #F44336;
		font-weight: bold;
		margin-left: 2px;
	}

	/* For older browsers that don't support :has() */
	.form-group .form-line input[required] + .form-label::after,
	.form-group .form-line select[required] + .form-label::after,
	.form-group .form-line textarea[required] + .form-label::after {
		content: " *";
		color: #F44336;
		font-weight: bold;
		margin-left: 2px;
	}

	/* Alternative approach: add required class to label */
	.form-label.required::after {
		content: " *";
		color: #F44336;
		font-weight: bold;
		margin-left: 2px;
	}
</style>

<body class="theme-light-green">

	<!-- #END# Page Loader -->

	<!-- top navbar -->
	<?php include('include/navbar.php'); ?>
	<!-- end top navbar -->

	<section>
		<!--left sidebar start-->
		<?php if ($this->session->userdata('is_admin_login')): ?>
			<?php
			include('include/sidebar.php');
			?>
		<?php else: ?>
			<?php
			include('include/sidebar.php');
			?>
		<?php endif; ?>
		<!--left sidebar end-->

		<!--right sidebar start-->
		<?php include('include/right_sidebar.php'); ?>
		<!--right sidebar end-->
	</section>

	<!--main content-->
	<section class="content">
		<!-- <?php if ($this->session->flashdata('msg') != ''): ?>
		    <div class="alert alert-success flash-msg alert-dismissible">
		      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		      <h4> Success!</h4>
		      <?= $this->session->flashdata('msg'); ?> 
		    </div>
		<?php endif; ?>  -->

		<?php if ($this->session->flashdata('error') != ''): ?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4> Error!</h4>
				<?= $this->session->flashdata('error'); ?>
			</div>
		<?php endif; ?>
		<!-- main content start-->
		<?php if (isset($postdata)) {
			$this->load->view($view, $postdata);
		} else {
			$this->load->view($view);
		} ?>
		<!-- end-->
	</section>
	<!--end main content-->

	<!-- Bootstrap Core Js -->
	<script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.js"></script>
	<!-- Select Plugin Js -->
	<script src="<?= base_url() ?>public/plugins/bootstrap-select/js/bootstrap-select.js"></script>
	<!-- Slimscroll Plugin Js -->
	<script src="<?= base_url() ?>public/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<!-- Waves Effect Plugin Js -->
	<script src="<?= base_url() ?>public/plugins/node-waves/waves.js"></script>
	<!-- Custom Js -->
	<script src="<?= base_url() ?>public/js/admin.js"></script>
	<!-- Demo Js -->
	<script src="<?= base_url() ?>public/js/demo.js"></script>
	<!-- page script -->
	<!-- date range picker -->
	<script src="<?= base_url() ?>public/plugins/daterange-picker/js/moment.min.js"></script>
	<script src="<?= base_url() ?>public/plugins/daterange-picker/js/daterangepicker.min.js"></script>

	<!-- SweetAlert2 JavaScript -->
	<script src="<?= base_url() ?>public/plugins/sweetalert2/sweetalert2.all.min.js"></script>

	<!-- Include Select2 JS -->
	<script src="<?= base_url() ?>public/plugins/select2/select2.min.js"></script>

	<!-- DataTables JS -->
	<script src="<?= base_url() ?>public/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>public/plugins/datatables/js/dataTables.bootstrap.min.js"></script>

	<!-- jQuery UI JS -->
	<script src="<?= base_url() ?>public/plugins/jquery-ui/js/jquery-ui.min.js"></script>

	<!-- PDF Libraries -->
	<script src="<?= base_url() ?>public/plugins/pdf-js/pdf.min.js"></script>
	<script src="<?= base_url() ?>public/plugins/pdf-lib/pdf-lib.min.js"></script>

	<!-- XLSX Library -->
	<script src="<?= base_url() ?>public/plugins/xlsx/xlsx.full.min.js"></script>

	<!-- NProgress JS (local) -->
	<script src="<?= base_url() ?>public/plugins/nprogress/nprogress.min.js"></script>

	<!-- Shared Plugin JS -->
	<script src="<?= base_url() ?>public/plugins/autosize/autosize.js"></script>
	<script src="<?= base_url() ?>public/plugins/dropzone/dropzone.js"></script>
	<script src="<?= base_url() ?>public/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
	<script src="<?= base_url() ?>public/plugins/jquery-validation/jquery.validate.js"></script>
	<script src="<?= base_url() ?>assets/js/common.js"></script>
	<script src="<?= base_url() ?>public/js/pages/forms/basic-form-elements.js"></script>
	<script src="<?= base_url() ?>public/plugins/jquery-datatable/jquery.dataTables.js"></script>
	<script src="<?= base_url() ?>public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
	<script src="<?= base_url() ?>public/js/xlsx.full.min.js"></script>


	<script type="text/javascript">
		$(".flash-msg").fadeTo(2000, 500).slideUp(500, function() {
			$(".flash-msg").slideUp(500);
		});

	</script>

	<script>
      // Show loader only for AJAX calls (no page navigation/loading)
      try {
        NProgress.configure({ showSpinner: false, trickleSpeed: 120, minimum: 0.08 });
        if (window.jQuery) {
          jQuery(document).on('ajaxStart', function(){ NProgress.start(); })
                          .on('ajaxStop', function(){ NProgress.done(); });
        }
      } catch (_) {}
    </script>

	<script>
		// Automatically add 'required' class to labels for required fields
		$(document).ready(function() {
			function markRequiredLabels() {
				// For input fields with required attribute
				$('.form-line input[required], .form-line select[required], .form-line textarea[required]').each(function() {
					var $label = $(this).siblings('.form-label');
					if ($label.length && !$label.hasClass('required')) {
						$label.addClass('required');
					}
				});

				// For select fields without form-line but with required
				$('select[required]').each(function() {
					var $formLine = $(this).closest('.form-line');
					if ($formLine.length) {
						var $label = $formLine.find('.form-label');
						if ($label.length && !$label.hasClass('required')) {
							$label.addClass('required');
						}
					}
				});

				// Handle labels that are siblings of form-line (like in rto_company_list.php)
				$('.form-group').each(function() {
					var $group = $(this);
					$group.find('input[required], select[required], textarea[required]').each(function() {
						var $label = $group.find('label.form-label').first();
						if ($label.length && !$label.hasClass('required')) {
							$label.addClass('required');
						}
					});
				});
			}

			// Run on page load
			markRequiredLabels();

			// Run when modals are shown (for dynamically loaded content)
			$(document).on('shown.bs.modal', function() {
				markRequiredLabels();
			});

			// Run after AJAX calls complete
			$(document).ajaxComplete(function() {
				markRequiredLabels();
			});
		});
	</script>




</body>

</html>