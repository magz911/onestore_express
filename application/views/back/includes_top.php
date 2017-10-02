<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $system_title;?></title>

	<!-- CSS Global Compulsory -->
	<link href="<?php echo base_url(); ?>template/back/css/bootstrap.min.css" rel="stylesheet">

	<!-- CSS Customization -->
	<link href="<?php echo base_url(); ?>template/back/css/activeit.css" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
	<link href="<?php echo base_url(); ?>template/back/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/animate-css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/morris-js/morris.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/switchery/switchery.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/summernote/summernote.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/chosen/chosen.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/noUiSlider/jquery.nouislider.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/noUiSlider/jquery.nouislider.pips.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/dropzone/dropzone.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/pace/pace.min.css" rel="stylesheet">

 	<!-- CSS Optional -->
	<link href="<?php echo base_url(); ?>template/back/css/countdown.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <!-- JS Global Compulsory -->
	<script src="<?php echo base_url(); ?>template/back/js/jquery-2.1.1.min.js"></script>
	<script src="<?php echo base_url(); ?>template/back/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>template/back/plugins/pace/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>template/back/colorpicker/dist/js/bootstrap-colorpicker.js"></script>

	
	<?php $ext =  $this->db->get_where('ui_settings',array('type' => 'fav_ext'))->row()->value;?>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>">

</head>
