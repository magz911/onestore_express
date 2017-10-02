    <!--=== Shop Suvbscribe ===-->
    <div class="shop-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-8 md-margin-bottom-20">
                    <h2><?php echo translate('subscribe_to_our_weekly'); ?> <strong><?php echo translate('newsletter'); ?></strong></h2>
                </div>
                <div class="col-md-4">
                    <?php
                        echo form_open(base_url() . 'index.php/home/subscribe', array(
                            'class' => 'footer-subsribe',
                            'method' => 'post'
                        ));
                    ?>    
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" id="subscr" placeholder="<?php echo translate('email_address'); ?>">
                            <span class="input-group-btn">
                                <button class="btn subscriber" type="button"><i class="fa fa-envelope-o"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--/end container-->
    </div>
    <!--=== End Shop Suvbscribe ===-->  

    <?php 
		$contact_address =  $this->db->get_where('general_settings',array('type' => 'contact_address'))->row()->value;
		$contact_phone =  $this->db->get_where('general_settings',array('type' => 'contact_phone'))->row()->value;
		$contact_email =  $this->db->get_where('general_settings',array('type' => 'contact_email'))->row()->value;
		$contact_website =  $this->db->get_where('general_settings',array('type' => 'contact_website'))->row()->value;
		$contact_about =  $this->db->get_where('general_settings',array('type' => 'contact_about'))->row()->value;
		
        $footer_text =  $this->db->get_where('general_settings',array('type' => 'footer_text'))->row()->value;
        $footer_category =  json_decode($this->db->get_where('general_settings',array('type' => 'footer_category'))->row()->value);
    ?>

    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div id='ajlin'></div>
    </div>
    <!-- End Modal -->

    <!-- Modal -->
    <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div id='ajlup'></div> 
    </div>
    <!-- End Modal -->

    <a data-toggle="modal" data-target="#login" id="loginss" ></a>
    <a data-toggle="modal" data-target="#registration" id="regiss" ></a>
    
<!--=== Footer ===-->


<!--=== Footer Version 1 ===-->
    <div class="footer-v1">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <!-- About -->

                    <div class="col-md-3 md-margin-bottom-40">
                        <a href="<?php echo base_url(); ?>"><img id="logo-footer" class="footer-logo img-responsive" src="<?php echo $this->crud_model->logo('home_bottom_logo'); ?>"  alt=""></a>
                        <p class="margin-bottom-10"><?php echo $footer_text; ?></p>
                    </div><!--/col-md-3-->
                    <!-- End About -->

                    <!-- Recent -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="posts">
                            <div class="headline"><h2><?php echo translate('recent_blogs'); ?></h2></div>
                            <ul class="list-unstyled latest-list">
                                <?php
                                    $i = 0;
                                    $this->db->limit(5);
                                    $this->db->order_by('blog_id','desc');
                                    $result = $this->db->get('blog')->result();
                                    foreach ($result as $row) {
                                        //$now = $this->db->get_where('blog',array('blog_id'=>$row['blog_id']))->row(); 
                                ?>
                                <li>
                                    <a href="<?php echo $this->crud_model->blog_link($row->blog_id); ?>" >
                                        <?php echo $row->title; ?>
                                    </a>
                                    <small><?php echo date("F j, Y", strtotime($row->date)); ?></small>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div><!--/col-md-3-->
                    <!-- End Recent -->

                    <!-- Link List -->
                    <div class="col-md-3 md-margin-bottom-40">
                        <div class="headline"><h2><?php echo translate('useful_links'); ?></h2></div>
                        <ul class="list-unstyled link-list">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/home/">
                                    <?php echo translate('home'); ?>
                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/home/category">
                                    <?php echo translate('sector'); ?>
                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/home/featured_item">
                                    <?php echo translate('featured'); ?>
                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/home/blog">
                                    <?php echo translate('blog'); ?>
                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/home/contact">
                                    <?php echo translate('contact'); ?>
                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ul>
                    </div><!--/col-md-3-->
                    <!-- End Link List -->

                    <!-- Address -->
                    <div class="col-md-3 map-img md-margin-bottom-40">
                        <div class="headline"><h2><?php echo translate('contact_us'); ?></h2></div>
                        <address class="md-margin-bottom-40">
                            <?php echo $contact_address; ?> <br />
                            <?php echo translate('phone'); ?>: <?php echo $contact_phone; ?> <br />
                            <?php echo translate('website'); ?>: <a href="<?php echo $contact_website; ?>"><?php echo $contact_website; ?></a> <br />
                            <?php echo translate('email'); ?>: <a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a> 
                        </address>
                    </div><!--/col-md-3-->
                    <!-- End Address -->


                </div>
            </div>
        </div><!--/footer-->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            2015 &copy; <?php echo translate('all_rights_reserved'); ?>.
                           <a target="_blank" href="<?php echo base_url(); ?>index.php/home/legal/terms_conditions"><?php echo translate('terms_&_condition'); ?></a> | <a target="_blank" href="<?php echo base_url(); ?>index.php/home/legal/privacy_policy"><?php echo translate('privacy_policy'); ?></a>
                        </p>
                    </div>

                    <!-- Social Links -->
                    <div class="col-md-6">
                        <ul class="footer-socials list-inline">
                            <li>
                                <a href="<?php echo $facebook; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo translate('facebook'); ?>">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $googleplus; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo translate('google_plus'); ?>">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $twitter; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo translate('twitter'); ?>">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $skype; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo translate('skype'); ?>">
                                    <i class="fa fa-skype"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $youtube; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo translate('youtube'); ?>">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $pinterest; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo translate('pinterest'); ?>">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                            
                            <!--
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                            -->

                        </ul>
                    </div>
                    <!-- End Social Links -->
                </div>
            </div>
        </div><!--/copyright-->
    </div>
    <!--=== End Footer Version 1 ===-->
</div><!--/End Wrapepr-->