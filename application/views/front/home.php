<!--=== Product Content ===-->
    <div class="container content-md ">
        <!--=== Product Service ===-->
        <div class="row margin-bottom-60 ">
            <div class="col-md-4 product-service md-margin-bottom-30">
                <div class="product-service-heading">
                    <i class="fa fa-truck"></i>
                </div>
                <div class="product-service-in">
                    <h3>Delivery Service</h3>
                    <p>oneSTore provides secured and convenient delivery system through our partner Logistics....</p>
                    <!--<a href="#">+Read More</a>-->
                </div>
            </div>
            <div class="col-md-4 product-service md-margin-bottom-30">
                <div class="product-service-heading">
                    <i class="icon-earphones-alt"></i>
                </div>
                <div class="product-service-in">
                    <h3>Customer Service</h3>
                    <p>oneSTore provides customer service to our beloved customers until they are fully satisfied with the Service...</p>
                    <!--<a href="#">+Read More</a>-->
                </div>
            </div>
            <div class="col-md-4 product-service">
                <div class="product-service-heading">
                    <i class="icon-refresh"></i>
                </div>
                <div class="product-service-in">
                    <h3>money-back</h3>
                    <p>oneSTore provides 5 days money-back guarantee. Just let our Logistics know about your concern...</p>
                    <!--<a href="#">+Read More</a>-->
                </div>
            </div>
        </div><!--/end row-->
        <!--=== End Product Service ===-->

        <!--=== Featured Product ===-->
        <div class="row margin-bottom-60 ">
            <div class="heading heading-v4 margin-bottom-20">
                <h2><?php echo translate('featured_product');?></h2>
                <!--<p></p>-->
            </div>

            <div class="illustration-v2">
                <div class="customNavigation margin-bottom-25">
                    <a class="owl-btn prev rounded-x"><i class="fa fa-angle-left"></i></a>
                    <a class="owl-btn next rounded-x"><i class="fa fa-angle-right"></i></a>
                </div>

                <ul class="list-inline owl-slider">
                <?php
                    foreach($featured_data as $row1)
                    {
                        if($this->crud_model->is_publishable($row1['product_id'])){
                ?>

                    <li class="item">
                        <div class="product-img">
                            <a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>"><img class="full-width img-responsive" src="<?php echo $this->crud_model->file_view('product',$row1['product_id'],'','','thumb','src','multi','one'); ?>" alt=""></a>
                            <!--<a class="product-review quick_view" href="<?php echo $this->crud_model->product_link($row1['product_id'],'quick'); ?>"><?php echo translate('quick_view');?></a>-->
                            <a class="product-review" href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>"><?php echo translate('view');?></a>
                            
                                <?php if($this->crud_model->is_added_to_cart($row1['product_id'])){ ?>
                                    <a class="add-to-cart added_to_cart" href="#" onclick="return false;" data-type='text' data-pid='<?php echo $row1['product_id']; ?>'><i class="fa fa-shopping-cart"></i>
                                    <?php echo translate('added_to_cart');?>
                                    </a>
                                <?php } else { ?>
                                    <a class="add-to-cart add_to_cart" href="#" onclick="return false;" data-type='text' data-pid='<?php echo $row1['product_id']; ?>'><i class="fa fa-cart-plus"></i>
                                    <?php echo translate('add_to_cart');?>
                                    </a>
                                <?php } ?>

                            <?php
                                if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'current_stock') <= 0 && !$this->crud_model->is_digital($row1['product_id'])){
                            ?>
                            <div class="shop-rgba-red rgba-banner"><?php echo translate('out_of_stock');?></div>
                            <?php
                                } else {
                                    if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'discount') > 0){ 
                            ?>
                                <div class="shop-rgba-dark-green rgba-banner">
                                    <?php 
                                        if($row1['discount_type'] == 'percent'){
                                            echo $row1['discount'].'%';
                                        } else if($row1['discount_type'] == 'amount'){
                                            echo currency().$row1['discount'];
                                        }
                                    ?>
                                    <?php echo ' '.translate('off'); ?>
                                </div>
                            <?php 
                                    } 
                                }
                            ?>    

                        </div>

                        <div class="product-description-v2 product-description-brd">
                            <div class="overflow-h margin-bottom-5">
                                <div class="pull-left">
                                    <h4 class="title-price"><a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>"><?php echo $row1['title'] ?></a></h4>
                                    <!--<span class="gender text-uppercase">Men</span>-->
                                    <span class="gender22"><?php echo translate('seller').' : '.$this->crud_model->product_by($row1['product_id'],'with_link'); ?></span>
                                    <div class="product-price">
                                        <?php if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'discount') > 0){ ?>
                                            <span class="title-price"><?php echo currency().$this->crud_model->get_product_price($row1['product_id']); ?></span>
                                            <span class="title-price line-through"><?php echo currency().$row1['sale_price']; ?></span>
                                        <?php } else { ?>
                                            <span class="title-price"><?php echo currency().$row1['sale_price']; ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline product-ratings tooltips22" data-original-title="<?php echo $rating = $this->crud_model->rating($row1['product_id']); ?>" data-toggle="tooltip" data-placement="top" >
                                <?php
                                    $rating = $this->crud_model->rating($row1['product_id']);
                                    $r = $rating;
                                    $i = 0;
                                    while($i<5){
                                        $i++;
                                ?>
                                <li>
                                    <i class="rating<?php if($i<=$rating){ echo '-selected'; } $r--; ?> fa fa-star<?php if($r < 1 && $r > 0){ echo '-half';} ?>"></i>
                                </li>
                                <?php
                                    }
                                ?>

                                <?php 
                                    $wish = $this->crud_model->is_wished($row1['product_id']); 
                                ?>

                                <?php if($wish == 'yes'){ ?>
                                    <li class="like-icon"><a data-original-title="<?php echo translate('added_to_wishlist');?>" data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row1['product_id']; ?>' data-type='icon' class="tooltips wished_it" href="#" onclick="return false;"><i class="fa fa-heart"></i></a></li>
                                <?php } else {?>
                                    <li class="like-icon"><a data-original-title="<?php echo translate('add_to_wishlist');?>" data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row1['product_id']; ?>' data-type='icon' class="tooltips wish_it" href="#" onclick="return false;"><i class="fa fa-heart-o"></i></a></li>
                                <?php } ?>

                            </ul>

                        </div>
                    </li>
                    
                <?php
                        }
                    }
                ?>

                </ul>
            </div>
        </div>
        <!--=== End Featured Product ===-->

        <!--=== HUB ===-->
        <?php
            $i = 0;
            if($vendor_system == 'ok'){
                $this->db->order_by('vendor_id','RANDOM');
                $vendors = $this->db->get_where('vendor',array('status'=>'approved'))->result_array();
                if($vendors){
        ?>
        <div class="row margin-bottom-60 ">
            <div class="heading heading-v4 margin-bottom-20">
                <h2><?php echo translate('our_hubs'); ?></h2>
                <!--<p></p>-->
            </div>

            <ul class="list-inline owl-slider-v2">
                <?php
                    $i = 0;
                    foreach($vendors as $row1){
                        $i++;
                ?>

                <li class="item first-child">
                    <a href="<?php echo $this->crud_model->vendor_link($row1['vendor_id']); ?>">
                            <?php
                                if(!file_exists('uploads/vendor/logo_'.$row1['vendor_id'].'.png')){
                            ?>
                            <img class="rounded-x" src="<?php echo base_url(); ?>uploads/vendor/logo_0.png" alt="" style="width:100px;"></a>
                            <?php
                                } else {
                            ?>
                            <img class="rounded-x" src="<?php echo base_url(); ?>uploads/vendor/logo_<?php echo $row1['vendor_id']; ?>.png" alt="" style="width:100px;">  
                            <?php
                                }
                            ?>
                    </a>
                    <div><?php echo $row1['company']; ?></div>
                </li>
                
                <?php
                    }
                ?>

            </ul><!--/end owl-carousel-->
        </div>
        <?php
                }
            }
        ?>
        <!--=== End HUB ===-->

        <!--=== Product by Sector ===-->
        <div class="row margin-bottom-20_22 cpm_border22">
            <div class="heading heading-v4 margin-bottom-20">
                <h2><?php echo translate('product_by_sector'); ?></h2>
                <!--<p></p>-->
            </div>
        </div>
        <?php
            $category = json_decode($this->crud_model->get_type_name_by_id('ui_settings','10','value'));
            foreach($category as $row3)
            {
                $cat_row = $this->db->get_where('category',array('category_id'=>$row3))->row_array();    
        ?>  
            <div class="row margin-bottom-30 cpm_border22">
                <div class="heading heading-v4 margin-bottom-20">
                    <h4><?php echo translate('sector') . ': ' . $cat_row['category_name']; ?></h4>
                    <!--<p></p>-->
                </div>

                <div class="illustration-v2">
                    <ul class="list-inline owl-slider">
                    <?php
                        $this->db->limit(12);
                        $this->db->order_by('product_id','RANDOM');
                        $sub_product = $this->db->get_where('product',array('category'=>$row3, 'status'=>'ok', 'featured'=>'ok'))->result_array();
                        foreach($sub_product as $row1)
                        {
                            if($this->crud_model->is_publishable($row1['product_id'])){
                    ?>
                        <li class="item">
                            <div class="product-img">
                                <a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>"><img class="full-width img-responsive" src="<?php echo $this->crud_model->file_view('product',$row1['product_id'],'','','thumb','src','multi','one'); ?>" alt=""></a>
                                <!--<a class="product-review quick_view" href="<?php echo $this->crud_model->product_link($row1['product_id'],'quick'); ?>"><?php echo translate('quick_view');?></a>-->
                                <a class="product-review" href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>"><?php echo translate('view');?></a>
                                
                                    <?php if($this->crud_model->is_added_to_cart($row1['product_id'])){ ?>
                                        <a class="add-to-cart added_to_cart" href="#" onclick="return false;" data-type='text' data-pid='<?php echo $row1['product_id']; ?>'><i class="fa fa-shopping-cart"></i>
                                        <?php echo translate('added_to_cart');?>
                                        </a>
                                    <?php } else { ?>
                                        <a class="add-to-cart add_to_cart" href="#" onclick="return false;" data-type='text' data-pid='<?php echo $row1['product_id']; ?>'><i class="fa fa-cart-plus"></i>
                                        <?php echo translate('add_to_cart');?>
                                        </a>
                                    <?php } ?>

                                <?php
                                    if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'current_stock') <= 0 && !$this->crud_model->is_digital($row1['product_id'])){
                                ?>
                                <div class="shop-rgba-red rgba-banner"><?php echo translate('out_of_stock');?></div>
                                <?php
                                    } else {
                                        if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'discount') > 0){ 
                                ?>
                                    <div class="shop-rgba-dark-green rgba-banner">
                                        <?php 
                                            if($row1['discount_type'] == 'percent'){
                                                echo $row1['discount'].'%';
                                            } else if($row1['discount_type'] == 'amount'){
                                                echo currency().$row1['discount'];
                                            }
                                        ?>
                                        <?php echo ' '.translate('off'); ?>
                                    </div>
                                <?php 
                                        } 
                                    }
                                ?>    

                            </div>

                            <div class="product-description-v2 product-description-brd">
                                <div class="overflow-h margin-bottom-5">
                                    <div class="pull-left">
                                        <h4 class="title-price"><a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>"><?php echo $row1['title'] ?></a></h4>
                                        <!--<span class="gender text-uppercase">Men</span>-->
                                        <span class="gender22"><?php echo translate('seller').' : '.$this->crud_model->product_by($row1['product_id'],'with_link'); ?></span>
                                        <div class="product-price">
                                            <?php if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'discount') > 0){ ?>
                                                <span class="title-price"><?php echo currency().$this->crud_model->get_product_price($row1['product_id']); ?></span>
                                                <span class="title-price line-through"><?php echo currency().$row1['sale_price']; ?></span>
                                            <?php } else { ?>
                                                <span class="title-price"><?php echo currency().$row1['sale_price']; ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline product-ratings tooltips22" data-original-title="<?php echo $rating = $this->crud_model->rating($row1['product_id']); ?>" data-toggle="tooltip" data-placement="top" >
                                    <?php
                                        $rating = $this->crud_model->rating($row1['product_id']);
                                        $r = $rating;
                                        $i = 0;
                                        while($i<5){
                                            $i++;
                                    ?>
                                    <li>
                                        <i class="rating<?php if($i<=$rating){ echo '-selected'; } $r--; ?> fa fa-star<?php if($r < 1 && $r > 0){ echo '-half';} ?>"></i>
                                    </li>
                                    <?php
                                        }
                                    ?>

                                    <?php 
                                        $wish = $this->crud_model->is_wished($row1['product_id']); 
                                    ?>

                                    <?php if($wish == 'yes'){ ?>
                                        <li class="like-icon"><a data-original-title="<?php echo translate('added_to_wishlist');?>" data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row1['product_id']; ?>' data-type='icon' class="tooltips wished_it" href="#" onclick="return false;"><i class="fa fa-heart"></i></a></li>
                                    <?php } else {?>
                                        <li class="like-icon"><a data-original-title="<?php echo translate('add_to_wishlist');?>" data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row1['product_id']; ?>' data-type='icon' class="tooltips wish_it" href="#" onclick="return false;"><i class="fa fa-heart-o"></i></a></li>
                                    <?php } ?>

                                </ul>

                            </div>
                        </li>
                        
                    <?php
                            }
                        }
                    ?>

                    </ul>
                </div>
            </div>
        <?php
            }
        ?>
        <div class="margin-bottom-30"></div>
        <!--=== End Product by Sector ===-->
        
        <!--=== Illustration v4 ===-->
        <div class="row illustration-v4 ">
            <div class="col-md-4 ">
                <div class="heading heading-v4 margin-bottom-20">
                    <h2><?php echo translate('new_product'); ?></h2>
                </div>
                <?php
                    $this->db->limit(3);
                    $this->db->order_by('product_id','desc');
                    $this->db->where('status','ok');
                    $latest = $this->db->get('product')->result_array();
                    foreach ($latest as $row2){
                        if($this->crud_model->is_publishable($row2['product_id'])){
                ?>
                <div class="thumb-product">
                    <img class="thumb-product-img" src="<?php echo $this->crud_model->file_view('product',$row2['product_id'],'','','thumb','src','multi','one'); ?>" alt="">
                    <div class="thumb-product-in">
                        <h4><a href="<?php echo $this->crud_model->product_link($row2['product_id']); ?>"><?php echo $row2['title'] ?></a></h4>
                        <span class="thumb-product-type"><?php echo $this->crud_model->get_type_name_by_id('category',$row2['category'],'category_name'); ?></span>
                    </div>

                    <ul class="list-inline overflow-h">
                    <?php if($this->crud_model->get_type_name_by_id('product',$row2['product_id'],'discount') > 0){ ?>
                        <li class="thumb-product-price">
                            <?php echo currency().$this->crud_model->get_product_price($row2['product_id']); ?>
                        </li>
                        <li class="thumb-product-price line-through">
                            <?php echo currency().$row2['sale_price']; ?>
                        </li>
                    <?php } else { ?>
                        <li class="thumb-product-price">
                            <?php echo currency().$row2['sale_price']; ?>
                        </li>
                    <?php } ?>
                        <li class="thumb-product-purchase">
                            <?php if($this->crud_model->is_added_to_cart($row2['product_id'])){ ?>
                                <a data-original-title="<?php echo translate('added_to_cart'); ?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips add-to-cart added_to_cart" href="#" onclick="return false;"><i class="fa fa-shopping-cart"></i></a> 
                            <?php } else { ?>
                                <a data-original-title="<?php echo translate('add_to_cart'); ?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips add-to-cart add_to_cart" href="#" onclick="return false;"><i class="fa fa-cart-plus"></i></a> 
                            <?php } ?>
                            | 
                            <?php if($this->crud_model->is_wished($row2['product_id'])=='yes'){ ?>
                                <a data-original-title="<?php echo translate('added_to_wishlist');?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips wished_it" href="#" onclick="return false;"><i class="fa fa-heart"></i></a>
                            <?php } else { ?>
                                <a data-original-title="<?php echo translate('add_to_wishlist');?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips wish_it" href="#" onclick="return false;"><i class="fa fa-heart-o"></i></a>
                            <?php } ?>
                        </li>
                    </ul>    
                </div>
                <?php
                        }
                    }
                ?>
            </div>

            <div class="col-md-4 ">
                <div class="heading heading-v4 margin-bottom-20">
                    <h2><?php echo  translate('top_rated'); ?></h2>
                </div>
                <?php
                    $this->db->limit(3);
                    $this->db->order_by('rating_total','desc');
                    $this->db->where('status','ok');
                    $rated = $this->db->get('product')->result_array();
                    foreach ($rated as $row2){
                        if($this->crud_model->is_publishable($row2['product_id'])){
                ?>
                <div class="thumb-product">
                    <img class="thumb-product-img" src="<?php echo $this->crud_model->file_view('product',$row2['product_id'],'','','thumb','src','multi','one'); ?>" alt="">
                    <div class="thumb-product-in">
                        <h4><a href="<?php echo $this->crud_model->product_link($row2['product_id']); ?>"><?php echo $row2['title']; ?></a></h4>
                        <span class="thumb-product-type"><?php echo $this->crud_model->get_type_name_by_id('category',$row2['category'],'category_name'); ?></span>
                    </div>

                    <ul class="list-inline overflow-h">
                    <?php if($this->crud_model->get_type_name_by_id('product',$row2['product_id'],'discount') > 0){ ?>
                        <li class="thumb-product-price">
                            <?php echo currency().$this->crud_model->get_product_price($row2['product_id']); ?>
                        </li>
                        <li class="thumb-product-price line-through">
                            <?php echo currency().$row2['sale_price']; ?>
                        </li>
                    <?php } else { ?>
                        <li class="thumb-product-price">
                            <?php echo currency().$row2['sale_price']; ?>
                        </li>
                    <?php } ?>
                        <li class="thumb-product-purchase">
                            <?php if($this->crud_model->is_added_to_cart($row2['product_id'])){ ?>
                                <a data-original-title="<?php echo translate('added_to_cart'); ?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips add-to-cart added_to_cart" href="#" onclick="return false;"><i class="fa fa-shopping-cart"></i></a> 
                            <?php } else { ?>
                                <a data-original-title="<?php echo translate('add_to_cart'); ?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips add-to-cart add_to_cart" href="#" onclick="return false;"><i class="fa fa-cart-plus"></i></a> 
                            <?php } ?>
                            | 
                            <?php if($this->crud_model->is_wished($row2['product_id'])=='yes'){ ?>
                                <a data-original-title="<?php echo translate('added_to_wishlist');?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips wished_it" href="#" onclick="return false;"><i class="fa fa-heart"></i></a>
                            <?php } else { ?>
                                <a data-original-title="<?php echo translate('add_to_wishlist');?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips wish_it" href="#" onclick="return false;"><i class="fa fa-heart-o"></i></a>
                            <?php } ?>
                        </li>
                    </ul>    
                </div>
                <?php
                        }
                    }
                ?>
            </div>

            <div class="col-md-4 ">
                <div class="heading heading-v4 margin-bottom-20">
                    <h2><?php echo  translate('most_viewed'); ?></h2>
                </div>
                <?php
                    $this->db->limit(3);
                    $this->db->order_by('number_of_view','desc');
                    $this->db->where('status','ok');
                    $most_viewed = $this->db->get('product')->result_array();
                    foreach ($most_viewed as $row2){
                        if($this->crud_model->is_publishable($row2['product_id'])){
                ?>
                <div class="thumb-product">
                    <img class="thumb-product-img" src="<?php echo $this->crud_model->file_view('product',$row2['product_id'],'','','thumb','src','multi','one'); ?>" alt="">
                    <div class="thumb-product-in">
                        <h4><a href="<?php echo $this->crud_model->product_link($row2['product_id']); ?>"><?php echo $row2['title'] ?></a></h4>
                        <span class="thumb-product-type"><?php echo $this->crud_model->get_type_name_by_id('category',$row2['category'],'category_name'); ?></span>
                    </div>
                    <ul class="list-inline overflow-h">
                    <?php if($this->crud_model->get_type_name_by_id('product',$row2['product_id'],'discount') > 0){ ?>
                        <li class="thumb-product-price">
                            <?php echo currency().$this->crud_model->get_product_price($row2['product_id']); ?>
                        </li>
                        <li class="thumb-product-price line-through">
                            <?php echo currency().$row2['sale_price']; ?>
                        </li>
                    <?php } else { ?>
                        <li class="thumb-product-price">
                            <?php echo currency().$row2['sale_price']; ?>
                        </li>
                    <?php } ?>
                        <li class="thumb-product-purchase">
                            <?php if($this->crud_model->is_added_to_cart($row2['product_id'])){ ?>
                                <a data-original-title="<?php echo translate('added_to_cart'); ?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips add-to-cart added_to_cart" href="#" onclick="return false;"><i class="fa fa-shopping-cart"></i></a> 
                            <?php } else { ?>
                                <a data-original-title="<?php echo translate('add_to_cart'); ?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips add-to-cart add_to_cart" href="#" onclick="return false;"><i class="fa fa-cart-plus"></i></a> 
                            <?php } ?>
                            | 
                            <?php if($this->crud_model->is_wished($row2['product_id'])=='yes'){ ?>
                                <a data-original-title="<?php echo translate('added_to_wishlist');?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips wished_it" href="#" onclick="return false;"><i class="fa fa-heart"></i></a>
                            <?php } else { ?>
                                <a data-original-title="<?php echo translate('add_to_wishlist');?>" data-type='icon' data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row2['product_id']; ?>' class="tooltips wish_it" href="#" onclick="return false;"><i class="fa fa-heart-o"></i></a>
                            <?php } ?>
                        </li>
                    </ul>    
                </div>
                <?php
                        }
                    }
                ?>
            </div>

        </div><!--/end row-->
        <!--=== End Illustration v4 ===-->
    </div>
<!--=== End Product Content ===-->