<form id="cart_form_singl">
<input type="hidden" name="color" value="">
<input type="hidden" name="qty" value="1">
</form>

<!-- JS Global Compulsory -->
<!--<script src="<?php echo base_url(); ?>template/front/assets/plugins/jquery/jquery.min.js"></script>-->
<script src="<?php echo base_url(); ?>template/front/assets/plugins/jquery/jquery-migrate.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script src="<?php echo base_url(); ?>template/front/assets/plugins/back-to-top.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/smoothScroll.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/jquery-steps/build/jquery.steps.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/jquery.parallax.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/master-slider/quick-start/masterslider/masterslider.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/master-slider/quick-start/masterslider/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/bootstrap-notify.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/noUiSlider.8.5.1/nouislider.min.js"></script>
<!--<script src="<?php echo base_url(); ?>template/front/assets/plugins/share/jquery.share.js"></script>-->
<!-- JS Optional -->
<script src="<?php echo base_url(); ?>template/front/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/plugins/fancybox/source/jquery.fancybox.js"></script>
<!-- JS Page Level -->
<script src="<?php echo base_url(); ?>template/front/assets/js/plugins/owl-carousel.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/js/plugins/revolution-slider.js"></script>
<script src="<?php echo base_url(); ?>template/front/assets/js/plugins/master-slider.js"></script>
<!--<script src="<?php echo base_url(); ?>template/front/assets/js/plugins/mouse-wheel.js"></script>-->
<!--<script src="<?php echo base_url(); ?>template/front/assets/js/plugins/stepWizard.js"></script>-->

<script src="<?php echo base_url(); ?>template/front/assets/js/shop.app.js"></script>
<!--<script src="<?php echo base_url(); ?>template/front/assets/js/forms/page_login.js"></script>-->
<script src="<?php echo base_url(); ?>template/front/assets/js/forms/product-quantity.js"></script>
<!--<script src="<?php echo base_url(); ?>template/front/assets/js/forms/page_contact_form.js"></script>-->
<!--<script src="<?php echo base_url(); ?>template/front/assets/js/pages/page_contacts.js"></script>-->

<!-- JS Customization -->
<script src="<?php echo base_url(); ?>template/front/assets/js/custom.js"></script>

<script>
    jQuery(document).ready(function() {
        OwlCarousel.initOwlCarousel();
        RevolutionSlider.initRSfullWidth();
        MasterSliderShowcase2.initMasterSliderShowcase2();
        //MouseWheel.initMouseWheel();
        //StepWizard.initStepWizard();
        App.init();
        App.initScrollBar();
        App.initParallaxBg();
        //Login.initLogin();
        //PageContactForm.initPageContactForm();
        //ContactPage.initMap();
    });

    $(document).ready(function() {
        /*$('.search-close').off();*/
        $('.search-open').slideDown();
        set_loggers();

        <?php 
            $a = $this->session->flashdata('alert');
            if(isset($a)){ 
        ?>
            <?php if($a == 'successful_signup'){ ?>
                setTimeout(function(){ notify(xlat_you_registered_successfully,'success','bottom','right');}, 800);
            <?php } ?>
            <?php if($a == 'successful_signin'){ ?>
                setTimeout(function(){ notify(xlat_you_logged_in_successfully,'success','bottom','right');}, 800);
            <?php } ?>
            <?php if($a == 'successful_signout'){ ?> 
                setTimeout(function(){ notify(xlat_you_logged_out_successfully,'success','bottom','right');}, 800);
            <?php } ?>
        <?php } ?>

        <?php
            if($this->session->userdata('user_login') == 'yes'){
        ?>
        setInterval(session_check, 6000);
        function session_check(){
            $.ajax({
                url: base_url+'index.php/home/is_logged/',
                success: function(data) {
                    if(data == 'yah!good'){}
                    else if (data == 'nope!bad') {
                        location.replace(base_url);
                    }
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
        <?php
            }
        ?>

        ajax_load(base_url+'index.php/home/cart/added_list/','added_list');
    });

</script>
<!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/respond.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/js/plugins/placeholder-IE-fixes.js"></script>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
<![endif]-->
<!--[if lt IE 10]>
    <script src="<?php echo base_url(); ?>template/front/assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
<![endif]-->

</body>
</html>