<body class="header-fixed">
<div class="wrapper">
    <div class="header-v5 header-static header">
        <!-- Topbar v3 -->
        <div class="topbar-v3">
            <div class="search-open">
                <?php
                    echo form_open(base_url() . 'index.php/home/text_search/', array(
                        'class' => 'sky-form22',
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                        'style' => '',
                        'name' => 'frm_search'
                    ));
                ?>
                    <!--<div class="container">
                        <input type="text" name="query" id="query" class="form-control" placeholder="Search">
                        <input type="hidden" name="type" id="type" value="product">
                        <div class="search-close"><i class="icon-close"></i></div>
                        <button type="submit" style="display:none;" value=""><?php echo translate('search');?></button>
                    </div>-->
                    <div class="container">
                        <input type="text" name="query" id="query" class="form-control" placeholder="<?php echo translate('search_locally_produced_products');?>">
                        <input type="hidden" name="type" id="type" value="product">
                        <div class="search" onClick="document.frm_search.submit();"><i class="fa fa-search"></i></div>
                        <button type="submit" style="display:none;" value=""><?php echo translate('search');?></button>
                    </div>
                </form>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <!-- Topbar Navigation -->
                        <ul class="header-socials list-inline left-topbar">

                            <!-- Social Links -->
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
                            <!-- End Social Links -->

                        </ul><!--/end left-topbar-->
                    </div>

                    <div class="col-sm-4">
                        <ul class="list-inline left-topbar">
                            <li><i class="fa fa-phone"></i><?php echo translate('Hotline'); ?><a href="tel:<?php echo $contact_phone; ?>"> <?php echo $contact_phone; ?></a></li>
                        </ul>
                    </div>

                    <div class="col-sm-4">
                        <ul class="list-inline right-topbar pull-right" id="loginsets"></ul>
                        <!--<li><i class="search fa fa-search search-button"></i></li>-->
                    </div>
                </div>
            </div><!--/container-->
                
        </div>
        <!-- End Topbar v3 -->

        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only"><?php echo translate('toggle_navigation');?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home/">
                        <img id="logo-header" src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="Logo" class="img-responsive" style="max-width:170px; max-height:40px;">
                    </a>
                </div>
                
                <!-- Shopping Cart -->
                <div class="shop-badge badge-icons pull-right" id="added_list"></div>
                <!-- End Shopping Cart -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <!-- Nav Menu -->
                    <ul class="nav navbar-nav">

                        <!-- Home -->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>index.php/home/" class="dropdown-toggle" >
                                <?php echo translate('home'); ?>
                            </a>
                        </li>
                        <!-- End Home -->

                        <!-- Category -->
                        <li class="dropdown mega-menu-fullwidth">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <?php echo translate('sector'); ?>
                            </a>
                            <ul class="dropdown-menu ">
                                <li>
                                    <div class="mega-menu-content">
                                        <div class="container">
                                            <div class="row">
                                                <?php
                                                    $category = $this->db->get('category')->result_array();
                                                    foreach($category as $row){
                                                ?>
                                                 <div class="col-md-2 col-sm-6">
                                                    <h3 class="mega-menu-heading">
                                                        <a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category_id']; ?>/">
                                                            <?php echo $row['category_name']; ?>
                                                        </a>
                                                    </h3>
                                                    <ul class="list-unstyled style-list">
                                                        <?php
                                                            $sub_category = $this->db->get_where('sub_category',array('category' => $row['category_id']))->result_array();
                                                            foreach($sub_category as $row1){
                                                        ?>
                                                            <li>
                                                                <a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category_id']; ?>/<?php echo $row1['sub_category_id']; ?>/">
                                                                    <?php echo $row1['sub_category_name']; ?>
                                                                </a>
                                                            </li>
                                                        <?php
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                            </div><!--/end row-->
                                        </div><!--/end container-->
                                    </div><!--/end mega menu content-->  
                                </li>
                            </ul><!--/end dropdown-menu-->
                        </li>
                        <!-- End Category -->

                        <!-- Contact -->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>index.php/home/featured_item/" class="dropdown-toggle" >
                                <?php echo translate('featured_product'); ?>
                            </a>
                        </li>
                        <!-- End Contact -->

                        <!-- Featured -->
                        <!--<li class="dropdown mega-menu-fullwidth">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <?php echo translate('featured_product');?>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="mega-menu-content">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12 col-xs-12 md-margin-bottom-30">
                                                    <h3 class="mega-menu-heading">There are lot's of Featured Products</h3>
                                                    <p>isdfls sjdlfj sdlfjs dfj sdjfo s...</p>
                                                    <a href="<?php echo base_url(); ?>index.php/home/featured_item">
                                                        <button type="button" class="btn-u btn-u-dark"><?php echo translate('see_more');?> <i class="fa fa-arrow-circle-right"></i></button>
                                                    </a>
                                                </div>
                                                
                                                <?php
													$this->db->order_by('product_id','desc');
													$this->db->limit(3);
                                                	$featured = $this->db->get_where('product',array('featured'=>'ok'))->result_array();
													foreach($featured as $row){
												?>
                                                 <div class="col-md-3 col-sm-4 col-xs-4 md-margin-bottom-30">
                                                    <a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>"><img class="product-offers img-responsive" src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','no','src','multi','one') ?>" alt=""></a>
                                                </div>
                                                <?php
													}
												?>
                                            
                                            </div>
                                        </div>
                                    </div>  
                                </li>
                            </ul>
                        </li>-->
                        <!-- End Featured -->

                        <!-- Blog -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <?php echo translate('blog'); ?>
                            </a>
                            <ul class="dropdown-menu ">
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/home/blog/all" >
                                        <?php echo translate('all_blogs'); ?>
                                    </a>
                                </li>
                                <?php
                                    $bcats = $this->db->get('blog_category')->result_array();
                                    foreach ($bcats as $row) {
                                ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/home/blog/<?php echo $row['blog_category_id']; ?>" >
                                        <?php echo $row['name']; ?>
                                    </a>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>
                        <!-- End Blog -->

                        <!-- Partner -->
                        <li class="dropdown mega-menu-fullwidth">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <?php echo translate('partner'); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="mega-menu-content">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-4 col-xs-4 md-margin-bottom-30">
                                                    <a href="http://www.air21.com.ph/"><img class="product-offers img-responsive" src="<?php echo base_url(); ?>uploads/partner/partner_air21.png" alt=""></a>
                                                </div>
                                                <div class="col-md-3 col-sm-4 col-xs-4 sm-margin-bottom-30">
                                                    <a href="http://travel.2go.com.ph/"><img class="product-offers img-responsive" src="<?php echo base_url(); ?>uploads/partner/partner_2go.png" alt=""></a>
                                                </div>
                                                <div class="col-md-3 col-sm-4 col-xs-4">
                                                    <a href="https://www.landbank.com/"><img class="product-offers img-responsive" src="<?php echo base_url(); ?>uploads/partner/partner_lbp.png" alt=""></a>
                                                </div>
                                                <div class="col-md-3 col-sm-4 col-xs-4">
                                                    <a href="http://mimaropaventures.ph/"><img class="product-offers img-responsive" src="<?php echo base_url(); ?>uploads/partner/partner_mimaropaventures.png" alt=""></a>
                                                </div>
                                            </div><!--/end row-->
                                        </div><!--/end container-->
                                    </div><!--/end mega menu content-->
                                </li>
                            </ul><!--/end dropdown-menu-->
                        </li>
                        <!-- End Partner -->
                        
                        <!-- Contact -->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>index.php/home/contact/" class="dropdown-toggle" >
                                <?php echo translate('contact'); ?>
                            </a>
                        </li>
                        <!-- End Contact -->

						<?php
                        	$pages = $this->db->get_where('page',array('status'=>'ok'))->result_array();
							foreach($pages as $row1){
						?>
                        <!-- Home -->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>index.php/home/page/<?php echo $row1['parmalink']; ?>" class="dropdown-toggle" >
                                <?php echo translate($row1['page_name']); ?>
                            </a>
                        </li>
                        <!-- End Home -->
                        <?php
                        	}
						?>
                    </ul>
                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header v5 ===-->
