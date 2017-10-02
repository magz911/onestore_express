<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="300">
	<title><?php echo translate('login');?> | <?php echo $this->db->get_where('general_settings',array('type' => 'system_name'))->row()->value;?></title>

	<!-- CSS Global Compulsory -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300,500" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>template/back/css/bootstrap.min.css" rel="stylesheet">

	<!-- CSS Customization -->
	<link href="<?php echo base_url(); ?>template/back/css/activeit.css" rel="stylesheet">	

	<!-- CSS Implementing Plugins -->
	<link href="<?php echo base_url(); ?>template/back/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>template/back/plugins/pace/pace.min.css" rel="stylesheet">

	<!-- JS Implementing Plugins -->
	<script src="<?php echo base_url(); ?>template/back/plugins/pace/pace.min.js"></script>

	<?php $ext =  $this->db->get_where('ui_settings',array('type' => 'fav_ext'))->row()->value; $this->benchmark->mark_time();?>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $ext; ?>">
</head>

<body>
	<div id="container" class="cls-container" style="background:url(<?php echo base_url(); ?>uploads/others/repeat.jpg) 50% 50% / auto repeat scroll;">
		<!-- LOGIN FORM -->
		<div class="cls-content">
			<div class="cls-content-sm panel panel-colorful panel-login" style="margin-top: 50px !important;">
				<div class="panel-body">
					<a class="box-inline" href="<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('title'); ?>">
						<img src="<?php echo $this->crud_model->logo('admin_login_logo'); ?>" class="log_icon">
					</a>
					<hr class="hr-log">
					<p class="pad-btm"><?php echo translate('sign_in_to_your_account');?></p>
					<?php
					echo form_open(base_url() . 'index.php/'.$control.'/login/', array(
						'method' => 'post',
						'id' => 'login'
						));
						?>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user" style="color:#FFF !important"></i></div>
								<input type="text" name="email" class="form-control" placeholder="<?php echo translate('email'); ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key" style="color:#FFF !important"></i></div>
								<input type="password" name="password" class="form-control" placeholder="<?php echo translate('password'); ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 text-left">
								<div class="pad-ver">
									<a href="#" onclick="ajax_modal('forget_form','<?php echo translate('forget_password'); ?>','<?php echo translate('email_sent_with_new_password!'); ?>','forget','')" class="btn-link mar-rgt" style="color:#fff !important;"><?php echo translate('forgot_password');?> ?</a>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group text-right">
									<span class="btn btn-success btn-labeled fa fa-unlock-alt snbtn" id="btn-login" onclick="form_submit('login')">
										<?php echo translate('sign_in');?>
									</span>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- JS Customization -->
	<script src="<?php echo base_url(); ?>template/back/js/jquery-2.1.1.min.js"></script>
	<script src="<?php echo base_url(); ?>template/back/js/bootstrap.min.js"></script>

	<!-- JS Customization -->
	<script src="<?php echo base_url(); ?>template/back/js/activeit.js"></script>
	<script src="<?php echo base_url(); ?>template/back/js/ajax_login.js"></script>

	<!-- JS Implementing Plugins -->
	<script src="<?php echo base_url(); ?>template/back/plugins/bootbox/bootbox.min.js"></script>

	<script>
		var base_url = '<?php echo base_url(); ?>'
		var cancdd = '<?php echo translate('cancelled'); ?>'
		var req = '<?php echo translate('this_field_is_required'); ?>'
		var sing = '<?php echo translate('signing_in...'); ?>';
		var nps = '<?php echo translate('new_password_sent_to_your_email'); ?>';
		var lfil = '<?php echo translate('login_failed!'); ?>';
		var wrem = '<?php echo translate('wrong_e-mail_address!_try_again'); ?>';
		var lss = '<?php echo translate('login_successful!'); ?>';
		var sucss = '<?php echo translate('SUCCESS!'); ?>';
		var rpss = "<?php echo translate('reset_password'); ?>";
		var user_type = '<?php echo $control; ?>';
		var module = 'login';
		var unapproved = '<?php echo translate('account_not_approved._wait_for_approval.'); ?>';

		// added on 09/04/2017 by Magz
		document.onkeydown = function(event){
			if(event.keyCode == '13'){
				$('#btn-login').click();
			}
		}
	</script>
</body>
</html>