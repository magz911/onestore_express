<?php
    foreach($product_data as $row)
    {
?>
    <!--=== Shop Product ===-->
    <div class="shop-product" id="product_view">

        <!-- Breadcrumbs v5 -->
        <div class="container product_head">
            <ul class="breadcrumb-v5">
                    <li><a href="<?php echo base_url(); ?>index.php/home/"><i class="fa fa-home"></i></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/home/category/"><?php echo translate('products');?></a></li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category']; ?>">
                            <?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name'); ?>   
                        </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category']; ?>/<?php echo $row['sub_category']; ?>">
                            <?php echo $this->crud_model->get_type_name_by_id('sub_category',$row['sub_category'],'sub_category_name'); ?>
                        </a>
                    </li>
            </ul>
        </div>
        <!-- End Breadcrumbs v5 -->

        <div class="container product_body">
            <div class="row">
                <div class="col-md-6 md-margin-bottom-50">
                    <div class="ms-showcase2-template">
                        <?php
                            $thumbs = $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','all');
                            $mains = $this->crud_model->file_view('product',$row['product_id'],'','','no','src','multi','all');
                        ?>
                        <!-- Master Slider -->
                        <div class="master-slider ms-skin-default" id="masterslider">

                                <?php   $a = 0;
                                        foreach ($mains as $key => $row1) {
                                            $a++;
                                            $b = '';
                                            if($a == 1) $b='ms-brd';
                                ?>
                                <div class="ms-slide">
                                    <img class="<?php echo $b; ?>" src="assets/img/blank.gif" data-src="<?php echo $row1; ?>" alt="main">
                                    <img class="ms-thumb" src="<?php echo $thumbs[$key]; ?>" alt="thumb">
                                </div>
                                <?php   } ?>
                                
                        </div>
                        <!-- End Master Slider -->
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="shop-product-heading">
                        <h2><?php echo $row['title']; ?></h2>
                        <div id="share" class="list-inline shop-product-social"></div>
                        <!--<ul class="list-inline shop-product-social">
                            <?php
                                $facebook        =  $this->db->get_where('social_links',array('type' => 'facebook'))->row()->value;
                                $googleplus      =  $this->db->get_where('social_links',array('type' => 'google-plus'))->row()->value;
                                $twitter         =  $this->db->get_where('social_links',array('type' => 'twitter'))->row()->value;
                                $skype           =  $this->db->get_where('social_links',array('type' => 'skype'))->row()->value;
                                $youtube         =  $this->db->get_where('social_links',array('type' => 'youtube'))->row()->value;
                                $pinterest       =  $this->db->get_where('social_links',array('type' => 'pinterest'))->row()->value;
                            ?>
                            <li><a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $googleplus; ?>"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $skype; ?>"><i class="fa fa-skype"></i></a></li>
                            <li><a href="<?php echo $youtube; ?>"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="<?php echo $pinterest; ?>"><i class="fa fa-pinterest"></i></a></li>
                        </ul>-->
                    </div><!--/end shop product social-->

                    <div id="star_rating" class="list-inline stars-ratings" style="display:none;" data-pid='<?php echo $row['product_id']; ?>'>
                        <input type="radio" class="rate_it" name="rating" data-rate="5" id="rate-5">
                        <label for="rate-5"><i class="fa fa-star"></i></label>
                        <input type="radio" class="rate_it" name="rating" data-rate="4" id="rate-4">
                        <label for="rate-4"><i class="fa fa-star"></i></label>
                        <input type="radio" class="rate_it" name="rating" data-rate="3" id="rate-3">
                        <label for="rate-3"><i class="fa fa-star"></i></label>
                        <input type="radio" class="rate_it" name="rating" data-rate="2" id="rate-2">
                        <label for="rate-2"><i class="fa fa-star"></i></label>
                        <input type="radio" class="rate_it" name="rating" data-rate="1" id="rate-1">
                        <label for="rate-1"><i class="fa fa-star"></i></label>
                    </div>

                    <?php $rating = $this->crud_model->rating($row['product_id']); ?>
                    <ul id="product_rating" class="list-inline product-ratings margin-bottom-10 tooltips" data-original-title="<?php echo $rating; ?>" data-toggle="tooltip" data-placement="left" >
                        <?php
                            $r = $rating;
                            $i = 0;
                            while($i<5){
                                $i++;
                        ?>
                        <li><i class="rating<?php if($i<=$rating){ echo '-selected'; } $r--; ?> fa fa-star<?php if($r < 1 && $r > 0){ echo '-half';} ?>"></i></li>
                        <?php
                            }
                        ?>
                        <li class="product-review-list pull-right"><span><button type="button" id='rate_it_btn' class="btn-u btn-u-sea-shop btn-u-sm"><?php echo translate('rate_it');?></button></span></li>
                    </ul><!--/end shop product ratings-->

                    <p><?php echo $row['description'];?></p><br>

                    <ul class="list-inline shop-product-prices margin-bottom-30">
                    <?php if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ ?>
                        <li class="shop-red"><?php echo currency().$this->crud_model->get_product_price($row['product_id']); ?></li>
                        <li class="line-through"><?php echo currency().$row['sale_price']; ?></li>
                    <?php } else { ?>
                        <li class="shop-red"><?php echo currency().$row['sale_price']; ?></li>
                    <?php } ?>
                    </ul><!--/end shop product prices-->


                    <?php
                        echo form_open('', array(
                            'method' => 'post',
                            'class' => 'sky-form22',
                        ));
                    ?>
                    <?php
                        $all_c = json_decode($row['color']);
                            if($all_c){
                    ?>
                    <h3 class="shop-product-title"><?php echo translate('color');?></h3>
                    <ul class="list-inline product-color margin-bottom-30">
                        <?php
                            $n = 0;
                            foreach($all_c as $i => $p){
                                $c = '';
                                $n++;
                                if($a = $this->crud_model->is_added_to_cart($row['product_id'],'option','color')){
                                    if($a == $p){
                                        $c = 'checked';
                                    }
                                } else {
                                    if($n == 1){
                                        $c = 'checked';
                                    }
                                }
                        ?>
                            <li>
                                <input type="radio" id="c-<?php echo $i; ?>" value="<?php echo $p; ?>" <?php echo $c; ?> class="optional" name="color">
                                <label style="background:<?php echo $p; ?>;width:50px;height:50px;" for="c-<?php echo $i; ?>"></label>
                            </li>  
                        <?php
                                }
                            }
                        ?>
                    </ul><!--/end product color-->
                    <?php
                        $all_op = json_decode($row['options'],true);
                        if(!empty($all_op)){
                            foreach($all_op as $i=>$row1){
                                $type = $row1['type'];
                                $name = $row1['name'];
                                $title = $row1['title'];
                                $option = $row1['option'];
                    ?>
                    <h3 class="shop-product-title"><?php echo $title;?></h3>
                    <div class="list-inline product-option margin-bottom-3">
                    <?php
                        if($type == 'radio'){
                    ?>
                        <?php
                            foreach ($option as $op) {
                        ?>
                        <label class="toggle"><input type="radio" class="optional" name="<?php echo $name;?>" value="<?php echo $op;?>" <?php if($this->crud_model->is_added_to_cart($row['product_id'], 'option', $name) == $op){ echo 'checked'; } ?>  ><i></i><?php echo $op;?></label>
                        <?php
                            }
                        ?>
                    <?php
                        } else if($type == 'text'){
                    ?>
                        <label class="textarea textarea-resizable">
                            <textarea class="optional" rows="5" name="<?php echo $name;?>"><?php echo $this->crud_model->is_added_to_cart($row['product_id'], 'option', $name); ?></textarea>
                        </label>
                    <?php
                        } else if($type == 'single_select'){
                    ?>
                        <label class="select">
                            <select name="<?php echo $name; ?>" class="optional">
                                <option value=""><?php echo translate('choose_one'); ?></option>
                                <?php
                                    foreach ($option as $op) {
                                ?>
                                <option value="<?php echo $op; ?>" <?php if($this->crud_model->is_added_to_cart($row['product_id'], 'option', $name) == $op){ echo 'selected'; } ?> ><?php echo $op; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <i></i>
                        </label>
                    <?php
                        } else if($type == 'multi_select') {
                    ?>
                        <?php
                            foreach ($option as $op){
                        ?>
                        <label class="toggle"><input type="checkbox" class="optional" name="<?php echo $name;?>[]" value="<?php echo $op;?>" <?php if(!is_array($chk = $this->crud_model->is_added_to_cart($row['product_id'], 'option', $name))){ $chk = array(); } if(in_array($op, $chk)){ echo 'checked'; } ?>  ><i></i><?php echo $op;?></label>
                        <?php
                            }
                        ?>
                    <?php
                        }
                    ?>
                    </div>
                    <?php
                            }
                        }
                    ?><!--/end product option-->

                    <?php
                        if(!$this->crud_model->is_digital($row['product_id'])){
                    ?>
                    <h3 class="shop-product-title"><?php echo translate('quantity');?></h3>
                    <?php
                        }
                    ?>
                    <div class="margin-bottom-40">

                        <?php
                            if(!$this->crud_model->is_digital($row['product_id'])){
                        ?>
                        <span class="product-quantity sm-margin-bottom-20">
                            <button type='button' class="quantity-button" name='subtract' onclick='javascript: subtractQty();' value='-'>-</button>
                            <input type='text' class="quantity-field cart_quantity" name='qty' value="<?php if($a = $this->crud_model->is_added_to_cart($row['product_id'],'qty')){echo $a;} else {echo '1';} ?>" id='qty'/>
                            <button type='button' class="quantity-button" name='add' onclick='javascript: document.getElementById("qty").value++;' value='+'>+</button>
                        </span>

                        <?php
                            } else {
                        ?>
                            <input type='hidden' class="quantity-field cart_quantity" name='qty' value="1" id='qty'/>
                        <?php
                            }
                        ?>
                        
                        <?php if($this->crud_model->is_added_to_cart($row['product_id'])){ ?>
                            <button type="button" class="btn-u btn-u-sea-shop btn-u-lg add-to-cart added_to_cart btn_carted" data-type="text"  data-pid='<?php echo $row['product_id']; ?>'><i class="fa fa-shopping-cart"></i>
                            <?php echo translate('added_to_cart'); ?>
                            </button>
                        <?php } else { ?>
                             <button type="button" class="btn-u btn-u-sea-shop btn-u-lg add-to-cart add_to_cart btn_cart" data-type="text"  data-pid='<?php echo $row['product_id']; ?>'><i class="fa fa-shopping-cart"></i>
                            <?php echo translate('add_to_cart'); ?>
                            </button>
                        <?php } ?>

                    </div>
                    <!--/end product quantity--> 
                    </form>

                    <?php 
                        $wish = $this->crud_model->is_wished($row['product_id']); 
                    ?>
                    <?php if($wish == 'yes'){ ?>
                        <ul class="list-inline add-to-wishlist add-to-wishlist-brd"><li data-pid='<?php echo $row['product_id']; ?>' data-type='text' class="wishlist-in wished_it btn_wished"><i class="fa fa-heart"></i><?php echo translate('added_to_wishlist');?></li></ul>
                    <?php } else {?>
                        <ul class="list-inline add-to-wishlist add-to-wishlist-brd"><li data-pid='<?php echo $row['product_id']; ?>' data-type='text' class="wishlist-in wish_it btn_wish"><i class="fa fa-heart"></i><?php echo translate('add_to_wishlist');?></li></ul>
                    <?php } ?>

                    <p class="wishlist-category"><strong><?php echo translate('sector:');?></strong> <a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category']; ?>"><?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name'); ?> </a></p>

                    <?php
                        $vendor_system = $this->db->get_where('general_settings',array('type' => 'vendor_system'))->row()->value;
                        if($vendor_system == 'ok'){
                    ?>
                        <p class="wishlist-category">
                            <strong><?php echo translate('hub:');?></strong>
                            <?php echo $this->crud_model->product_by($row['product_id'],'with_link'); ?>
                        </p>
                    <?php
                        }
                    ?>

                </div>
                <div id="pnopoi"></div>
            </div><!--/end row-->
        </div>
    </div>
    <!--=== End Shop Product ===-->

    <?php
        $discus_id = $this->db->get_where('general_settings',array('type'=>'discus_id'))->row()->value;
        $fb_id = $this->db->get_where('general_settings',array('type'=>'fb_comment_api'))->row()->value;
        $comment_type = $this->db->get_where('general_settings',array('type'=>'comment_type'))->row()->value;

        $desc_active = '';
        $rev_active = '';
        if($comment_type == ''){
            $desc_active = 'active';
        }else if($comment_type == ''){
            $rev_active = 'active';
        }
    ?>

                        <!--=== Content Medium ===-->
                        <div class="content-md container">
                                <div class="tab-v5">
                                        <ul class="nav nav-tabs" role="tablist">
                                                <li class="<?php echo $desc_active; ?>"><a href="#descrt" role="tab" data-toggle="tab"><?php echo translate('full_description');?></a></li>
                                                <li><a href="#spec" role="tab" data-toggle="tab"><?php echo translate('additional_specification');?></a></li>
                                                <li><a href="#shipmnt" role="tab" data-toggle="tab"><?php echo translate('shipment_info');?></a></li>
                                                <li class="<?php echo $rev_active; ?>"><a href="#reviews" role="tab" data-toggle="tab"><?php echo translate('reviews');?></a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <!-- Description -->
                                            <div class="tab-pane fade in <?php echo $desc_active; ?>" id="descrt">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php echo $row['description'];?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Description -->

                                            <!-- Specs -->                
                                            <div class="tab-pane fade in" id="spec">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-sea margin-bottom-40">
                                                            <?php 
                                                                $a = $this->crud_model->get_additional_fields($row['product_id']);
                                                                if(count($a)>0){
                                                            ?>
                                                                <div class="panel-heading">
                                                                    <h2 class="panel-title heading heading-v4" style="font-weight:100;"><?php echo translate('special_specifications');?></h2>
                                                                </div>
                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                    <?php
                                                                        foreach ($a as $val) {
                                                                    ?>
                                                                        <tr>
                                                                            <td style="text-align:center;"><?php echo $val['name']; ?></td>
                                                                            <td style="text-align:center;"><?php echo $val['value']; ?></td>
                                                                        </tr>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </div>       
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Specs --> 

                                            <!-- Shipment -->                
                                            <div class="tab-pane fade in" id="shipmnt">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php
                                                            echo $this->db->get_where('business_settings',array('type'=>'shipment_info'))->row()->value;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Shipment --> 

                                            <!-- Reviews -->                
                                            <div class="tab-pane fade in <?php echo $rev_active; ?>" id="reviews">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php if($comment_type == 'disqus'){ ?>
                                                        <div id="disqus_thread"></div>
                                                        <script type="text/javascript">
                                                            /* * * CONFIGURATION VARIABLES * * */
                                                            var disqus_shortname = '<?php echo $discus_id; ?>';
                                                            
                                                            /* * * DON'T EDIT BELOW THIS LINE * * */
                                                            (function() {
                                                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                                                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                                            })();
                                                        </script>
                                                        <script type="text/javascript">
                                                            /* * * CONFIGURATION VARIABLES * * */
                                                                var disqus_shortname = '<?php echo $discus_id; ?>';
                                                            
                                                            /* * * DON'T EDIT BELOW THIS LINE * * */
                                                            (function () {
                                                                var s = document.createElement('script'); s.async = true;
                                                                s.type = 'text/javascript';
                                                                s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                                                                (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
                                                            }());
                                                        </script>
                                                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                                                        <?php
                                                            }
                                                            else if($comment_type == 'facebook'){
                                                        ?>

                                                            <div id="fb-root"></div>
                                                            <script>(function(d, s, id) {
                                                              var js, fjs = d.getElementsByTagName(s)[0];
                                                              if (d.getElementById(id)) return;
                                                              js = d.createElement(s); js.id = id;
                                                              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=<?php echo $fb_id; ?>";
                                                              fjs.parentNode.insertBefore(js, fjs);
                                                            }(document, 'script', 'facebook-jssdk'));</script>
                                                            <div class="fb-comments" data-href="<?php echo $this->crud_model->product_link($row['product_id']); ?>" data-numposts="5"></div>

                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Reviews -->

                                        </div>

                                </div>
                        </div><!--/end container-->
                        <!--=== End Content Medium ===-->



    <!--=== Illustration v2 ===-->
    <div class="container">

        <div class="heading heading-v4 margin-bottom-60">
            <h2><?php echo translate('related_products');?></h2>
            <!--<p></p>-->
        </div>

        <div class="illustration-v2 margin-bottom-60">
            <div class="customNavigation margin-bottom-25">
                <a class="owl-btn prev rounded-x"><i class="fa fa-angle-left"></i></a>
                <a class="owl-btn next rounded-x"><i class="fa fa-angle-right"></i></a>
            </div>

            <ul class="list-inline owl-slider-v4">
            <?php
                $i = 0;
                $this->db->where('sub_category',$row['sub_category']);
                $this->db->limit(10);
                $this->db->order_by('product_id','desc');
                $a = $this->db->get('product')->result_array();
                foreach ($a as $row2) {
                    $row1 = $this->db->get_where('product',array('product_id'=>$row2['product_id']))->row_array();             
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
                                <a class="add-to-cart add_to_cart" href="#" onclick="return false;" data-type='text' data-pid='<?php echo $row1['product_id']; ?>'><i class="fa fa-shopping-cart"></i>
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
                                <li class="like-icon"><a data-original-title="<?php echo translate('add_to_wishlist');?>" data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row1['product_id']; ?>' data-type='icon' class="tooltips wish_it" href="#" onclick="return false;"><i class="fa fa-heart"></i></a></li>
                            <?php } ?>

                        </ul>

                    </div>
                </li>
                
            <?php
                }
            ?>

            </ul>
        </div>
    </div>
    <!--=== End Illustration v2 ===-->


<?php
    }
?>

<script>
    jQuery(document).ready(function() {
        $('#share').share({
            networks: ['facebook','googleplus','twitter','linkedin'],
            //theme: 'square',
            theme: 'icon', // use round icons sprite
            useIn1: false
        });

        $('body').on('click', '#product_view .quantity-button', function(){
                    $('#product_view .added_to_cart').each(function() {
                        var h = $(this);
                        if(h.data('type') == 'text'){
                            h.removeClass("added_to_cart").addClass("add_to_cart"); 
                            h.html('<i class="fa fa-cart-plus"></i>'+xlat_add_to_cart).fadeIn();                
                        } else if(h.data('type') == 'icon'){
                            h.removeClass("added_to_cart").addClass("add_to_cart"); 
                            h.html('<i class="fa fa-cart-plus"></i>').fadeIn();   
                            h.attr('data-original-title', xlat_add_to_cart);  
                        }
                    });
        });
        $('body').on('change', '#product_view .optional', function(){
                    $('#product_view .added_to_cart').each(function() {
                        var h = $(this);
                        if(h.data('type') == 'text'){
                            h.removeClass("added_to_cart").addClass("add_to_cart"); 
                            h.html('<i class="fa fa-cart-plus"></i>'+xlat_add_to_cart).fadeIn();                
                        } else if(h.data('type') == 'icon'){
                            h.removeClass("added_to_cart").addClass("add_to_cart"); 
                            h.html('<i class="fa fa-cart-plus"></i>').fadeIn();   
                            h.attr('data-original-title', xlat_add_to_cart);  
                        }
                    });
        });

    });
</script>
