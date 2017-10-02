<!--=== Register ===-->

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        	<center>
            	<a href="<?php echo base_url(); ?>">
                    <img id="logo-footer" class="footer-logo img-sm" style="max-width:100px;" src="<?php echo $this->crud_model->logo('home_bottom_logo'); ?>" alt="">
                </a>
            </center>
            <button aria-hidden="true" data-dismiss="modal" id="close_logup_modal" class="close" type="button">×</button>
            
        </div>
        <div class="modal-body">
            <div class="logup_html log-reg-v3">
                <?php
                    echo form_open(base_url() . 'index.php/home/registration/add_info/', array(
                        'class' => 'log-reg-block sky-form',
                        'method' => 'post',
                        'style' => 'padding:30px !important;',
                        'id' => 'logup_form'
                    ));
                    $fb_login_set = $this->crud_model->get_type_name_by_id('general_settings','51','value');
                    $g_login_set = $this->crud_model->get_type_name_by_id('general_settings','52','value');
                ?>  
                <h2><?php echo translate('create_new_account');?></h2>
                    <section>
                        <label class="input login-input">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" placeholder="<?php echo translate('email_address'); ?>" name="email" class="form-control emails required" >
                            </div>
                        </label>
                    </section> 
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" placeholder="<?php echo translate('password'); ?>" name="password1" class="form-control pass pass1 required" >
                            </div>    
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" placeholder="<?php echo translate('confirm_password'); ?>" name="password2" class="form-control pass pass2 required" >
                            </div>    
                            <div id='pass_note'></div> 
                        </label>
                    </section>   
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" placeholder="<?php echo translate('first_name'); ?>" name="username" class="form-control required" >
                            </div>    
                        </label>
                    </section>    
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" placeholder="<?php echo translate('last_name'); ?>" name="surname" class="form-control required" >
                            </div>    
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" placeholder="<?php echo translate('phone'); ?>" name="phone" class="form-control required">
                            </div>
                        </label>
                    </section> 
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" placeholder="<?php echo translate('address_line_1'); ?>" name="address1" class="form-control required" >
                            </div>    
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" placeholder="<?php echo translate('address_line_2'); ?>" name="address2" class="form-control required">
                            </div>    
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" placeholder="<?php echo translate('city'); ?>" name="city" class="form-control required" >
                            </div>  
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" placeholder="<?php echo translate('ZIP'); ?>" name="zip" class="form-control required">
                            </div> 
                        </label>
                    </section>
                    
                    <div class="row margin-bottom-5">
                        <div class="col-xs-6"></div>
                        <div class="col-xs-6 text-right">
                            <span class="btn-u btn-u-sea-shop btn-block margin-bottom-20 reg_btn logup_btn" data-ing='<?php echo translate('registering..'); ?>' data-msg="" type="submit"><?php echo translate('register');?></span>
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
                <p class="text-center"><?php echo translate('already_you_have_an_account?');?><a href="#" data-dismiss="modal" onclick="signin(); return false;"> <?php echo translate('sign_in');?></a></p>
            </div>

                      
        </div>
    </div>
</div>
<!--=== End Register ===-->
