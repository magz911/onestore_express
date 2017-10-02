<!--=== Login ===-->

<div class="modal-dialog" style="margin-top:100px !important;">
    <div class="modal-content">
        <div class="modal-header">
        	<center>
            	<a href="<?php echo base_url(); ?>">
                    <img id="logo-footer" class="footer-logo img-sm" style="max-width:100px;" src="<?php echo $this->crud_model->logo('home_bottom_logo'); ?>" alt="">
                </a>
            </center>
            <button aria-hidden="true" data-dismiss="modal" id="close_log_modal" class="close" type="button">×</button>
        </div>
        <div class="modal-body">
            <div class='login_html log-reg-v3'>
				<?php
                    echo form_open(base_url() . 'index.php/home/login/do_login/', array(
                        'class' => 'log-reg-block sky-form',
                        'method' => 'post',
                        'style' => 'padding:30px 10px !important;',
                        'id' => 'login_form'
                    ));
					$fb_login_set = $this->crud_model->get_type_name_by_id('general_settings','51','value');
					$g_login_set = $this->crud_model->get_type_name_by_id('general_settings','52','value');
                ?>
                    <h2><?php echo translate('log_in_to_your_account');?></h2>
                        <section>
                            <label class="input login-input">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" placeholder="<?php echo translate('email_address'); ?>" name="email" class="form-control required">
                                </div>
                            </label>
                        </section>

                        <section>
                            <label class="input login-input no-border-top">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" placeholder="<?php echo translate('password'); ?>" name="password" class="form-control required">
                                </div>
                            </label>
                        </section>
                        <div class="row margin-bottom-5">
                            <div class="col-xs-6">
                                <a href="#" onClick="set_html('login_html','forget_html'); return false;"><?php echo translate('forget_your_password_?');?></a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <!--Remember me-->
                                <!--<button class="btn-u btn-u-sea-shop btn-block margin-bottom-20 login_btn" type="submit"><?php echo translate('log_in');?></button>-->
                                <span class="btn-u btn-u-sea-shop btn-block margin-bottom-20 login_btn" type="submit"><?php echo translate('log_in');?></span>
                            </div>
                        </div>


                        <?php if($fb_login_set == 'ok' || $g_login_set == 'ok'){ ?>

                        <div class="border-wings">
                            <span>or</span>
                        </div>

                        <div class="row columns-space-removes">
                            <?php if($fb_login_set == 'ok'){ ?>
                            <div class="col-lg-6 margin-bottom-10 <?php if($g_login_set !== 'ok'){ ?>mr_log<?php } ?>">
                            <?php if (@$user): ?>
                                <!--<a href="<?= $url ?>" class="btn btn-facebook">
                                    <i class="fa fa-facebook"></i><?php echo translate('facebook_log_in');?>
                                </a>-->
                                <button type="button" class="btn btn-block btn-facebook-inversed" onClick="javascript:window.location.href='<?= $url ?>'"><i class="fa fa-facebook"></i> <?php echo translate('facebook_log_in');?></button>
                            <?php else: ?>
                                <button type="button" class="btn btn-block btn-facebook-inversed" onClick="javascript:window.location.href='<?= $url ?>'"><i class="fa fa-facebook"></i> <?php echo translate('facebook_log_in');?></button>
                            <?php endif; ?>
                            </div>

                            <?php } if($g_login_set == 'ok'){ ?>     
                            <div class="col-lg-6 <?php if($fb_login_set !== 'ok'){ ?>mr_log<?php } ?>">
                            <?php if (@$g_user): ?>
                                <!--<a href="<?= $g_url ?>" class="btn-u btn-u-md btn-u-tw btn-block">
                                    <i class="fa fa-twitter"></i><?php echo translate('twitter_log_in');?>
                                </a>--> 
                                <button type="button" class="btn btn-block btn-googleplus-inversed" onClick="javascript:window.location.href='<?= $g_url ?>'"><i class="fa fa-googleplus"></i> <?php echo translate('google+_log_in');?></button>                          
                            <?php else: ?>
                                <button type="button" class="btn btn-block btn-googleplus-inversed" onClick="javascript:window.location.href='<?= $g_url ?>'"><i class="fa fa-googleplus"></i> <?php echo translate('google+_log_in');?></button>
                            <?php endif; ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>

                </form>
                <div class="margin-bottom-20"></div>
                <p class="text-center"><?php echo translate('Don\'t_have_account_yet?');?><a href="#" data-dismiss="modal" onclick="register(); return false;"> <?php echo translate('sign_up');?></a></p>
            </div>

            <div class='forget_html log-reg-v3' style="display:none;">
                <?php
                    echo form_open(base_url() . 'index.php/home/login/forget/', array(
                        'class' => 'log-reg-block sky-form',
                        'method' => 'post',
                        'style' => 'padding:30px !important;',
                        'id' => 'forget_form'
                    ));
                ?>    
                    <h2><?php echo translate('forgot_password');?></h2>

                    <section>
                        <label class="input login-input">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" placeholder="<?php echo translate('email_address'); ?>" name="email" class="form-control required">
                            </div>
                        </label>
                    </section>  

                    <div class="row margin-bottom-5">
                        <div class="col-xs-6">
                            <a href="#" onClick="set_html('forget_html','login_html'); return false;"><?php echo translate('login');?></a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <span class="btn-u btn-u-sea-shop btn-block margin-bottom-20 forget_btn" type="submit"><?php echo translate('submit');?></span>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
<!--=== End Login ===-->