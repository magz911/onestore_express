<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title><?php echo $page_title; ?> | <?php echo $system_title; ?></title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description; if($page_name == 'vendor_home'){ echo ', '.$this->db->get_where('vendor',array('vendor_id'=>$vendor))->row()->description; } ?>">
    <meta name="author" content="<?php echo $author; ?>">

    <meta name="keywords" content="<?php echo $keywords; if($page_name == 'vendor_home'){ echo ', '.$this->db->get_where('vendor',array('vendor_id'=>$vendor))->row()->keywords; } ?>">
    <meta name="revisit-after" content="<?php echo $revisit_after; ?> days">
    <meta http-equiv="expires" content="Mon, 10 Dec 2001 00:00:00 GMT" />
    
    <?php 
        if($page_name == 'product_view'){
            foreach($product_data as $row)
            {
    ?>
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?php echo $row['title']; ?>">
        <meta itemprop="description" content="<?php echo strip_tags($row['description']); ?>">
        <meta itemprop="image" content="<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','no','src','multi','one'); ?>">
        
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="<?php echo $row['title']; ?>">
        <meta name="twitter:description" content="<?php echo strip_tags($row['description']); ?>">
        <!-- Twitter summary card with large image must be at least 280x150px -->
        <meta name="twitter:image:src" content="<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','no','src','multi','one'); ?>">
        
        <!-- Open Graph data -->
        <meta property="og:title" content="<?php echo $row['title']; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php  echo base_url(); ?>index.php/home/product_view/<?php echo $row['product_id']; ?>" />
        <meta property="og:image" content="<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','no','src','multi','one'); ?>" />
        <meta property="og:description" content="<?php echo strip_tags($row['description']); ?>" />
        <meta property="og:site_name" content="<?php echo $row['title']; ?>" />
    <?php
            }
        } 
        if($page_name == 'vendor_home'){
            $vendor_data = $this->db->get_where('vendor',array('vendor_id'=>$vendor))->result_array();
            foreach($vendor_data as $row)
            {
    ?>
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?php echo $row['display_name']; ?>">
        <meta itemprop="description" content="<?php echo strip_tags($row['description']); ?>">
        <meta itemprop="image" content="<?php echo base_url(); ?>uploads/vendor/logo_<?php echo $vendor; ?>.png">
        
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="<?php echo $row['display_name']; ?>">
        <meta name="twitter:description" content="<?php echo strip_tags($row['description']); ?>">
        <!-- Twitter summary card with large image must be at least 280x150px -->
        <meta name="twitter:image:src" content="<?php echo base_url(); ?>uploads/vendor/logo_<?php echo $vendor; ?>.png">
        
        <!-- Open Graph data -->
        <meta property="og:title" content="<?php echo $row['display_name']; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php  echo base_url(); ?>index.php/home/vendor/<?php echo $row['vendor_id']; ?>" />
        <meta property="og:image" content="<?php echo base_url(); ?>uploads/vendor/logo_<?php echo $vendor; ?>.png" />
        <meta property="og:description" content="<?php echo strip_tags($row['description']); ?>" />
        <meta property="og:site_name" content="<?php echo $system_title; ?>" />
    <?php
            }
        }
    ?>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/others/favicon.<?php echo $fav_ext; ?>">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,800&amp;subset=cyrillic,latin'>

    <?php
        $this->minify->css(array(
            'front/assets/plugins/bootstrap/css/bootstrap.min.css',
            'front/assets/css/shop.style.css',
            'front/assets/css/style.css',
            'front/assets/css/headers/header-v5.css',
            'front/assets/css/footers/footer-v1.css',
            'front/assets/plugins/animate.css',
            'front/assets/plugins/line-icons/line-icons.css',
            'front/assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css',
            'front/assets/plugins/noUiSlider.8.5.1/nouislider.min.css',
            'front/assets/plugins/jquery-steps/css/custom-jquery.steps.css',
            'front/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css',
            'front/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css',
            'front/assets/plugins/revolution-slider/rs-plugin/css/settings.css',
            'front/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css',
            'front/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css',
            'front/assets/plugins/master-slider/quick-start/masterslider/style/masterslider.css',
            'front/assets/plugins/master-slider/quick-start/masterslider/skins/default/style.css',
            'front/assets/plugins/brand-buttons/brand-buttons.css',
            'front/assets/plugins/brand-buttons/brand-buttons-inversed.css',
            'front/assets/plugins/fancybox/source/jquery.fancybox.css',
            'front/assets/plugins/share/jquery.share.css',
            'front/assets/css/pages/log-reg-v3.css',
            'front/assets/css/pages/page_contact.css',  
            'front/assets/css/pages/blog.css',  
            'front/assets/css/pages/profile.css', 
            'front/assets/css/pages/page_invoice.css',
            'front/assets/css/theme-colors/orange.css" id="style_color',
            'front/assets/css/custom.css'
        )); 
        echo $this->minify->deploy_css($rebuild, 'home_top_css.min.css');
    ?>

    <?php                 
        $this->minify->js(array(
            'front/assets/plugins/jquery/jquery.min.js',
            'front/assets/plugins/share/jquery.share.js'
        ));
        echo $this->minify->deploy_js($rebuild, 'home_top_js.min.js');
    ?>

</head>