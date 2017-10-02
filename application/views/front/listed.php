<?php
	if($viewtype == 'list'){
        foreach($all_products as $row){
?>

<div class="list-product-description product-description-brd margin-bottom-30">
    <div class="row">
        <div class="col-sm-4">
            <a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>">
                <img class="img-responsive sm-margin-bottom-20" src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','one'); ?>" alt="">
            </a>
        </div> 
        <div class="col-sm-8 product-description">
            <div class="overflow-h margin-bottom-5">
                        <ul class="list-inline overflow-h">
                            <li><h4 class="title-price"><a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>"><?php echo $this->crud_model->limit_chars($row['title'],40);?></a></h4></li>
                            <li>
                                <span class="gender">
                                    <?php
                                        if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'current_stock') <= 0 && !$this->crud_model->is_digital($row['product_id'])){
                                    ?>
                                    <div class="shop-rgba-red"><?php echo translate('out_of_stock');?></div>
                                    <?php
                                        } else {
                                            if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ 
                                    ?>
                                        <div class="shop-rgba-dark-green">
                                            <?php 
                                                if($row['discount_type'] == 'percent'){
                                                    echo $row['discount'].'%';
                                                } else if($row['discount_type'] == 'amount'){
                                                    echo currency().$row['discount'];
                                                }
                                            ?>
                                            <?php echo ' '.translate('off'); ?>
                                        </div>
                                    <?php 
                                            } 
                                        }
                                    ?>    
                                </span>
                            </li>
                            <li class="pull-right">
                                <ul class="list-inline product-ratings">
                            <?php
                                $rating = $this->crud_model->rating($row['product_id']);
                                $r = $rating;
                                $i = 0;
                                while($i<5){
                                    $i++;
                            ?>
                            <li><i class="rating<?php if($i<=$rating){ echo '-selected'; } $r--; ?> fa fa-star<?php if($r < 1 && $r > 0){ echo '-half';} ?>"></i></li>
                            <?php
                                }
                            ?>
                                </ul>
                            </li>
                        </ul>   
                        
                        <div class="margin-bottom-10">
                            <p><?php echo $this->crud_model->limit_chars($row['description'],200);?></p>
                        </div>

                        <div class="margin-bottom-10">
                            <?php if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ ?>
                                <span class="title-price margin-right-10"><?php echo currency().$this->crud_model->get_product_price($row['product_id']); ?></span>
                                <span class="title-price line-through"><?php echo currency().$row['sale_price']; ?></span>
                            <?php } else { ?>
                                <span class="title-price margin-right-10"><?php echo currency().$row['sale_price']; ?></span>
                            <?php } ?>
                        </div>

                        <div class="margin-bottom-10">
                        <?php if($this->crud_model->is_added_to_cart($row['product_id'])){ ?>
                            <button type="button" class="btn-u btn-u-sea-shop add-to-cart added_to_cart btn_carted" data-type="text"  data-pid='<?php echo $row['product_id']; ?>'><i class="fa fa-shopping-cart"></i>
                            <?php echo translate('added_to_cart'); ?>
                            </button>
                        <?php } else { ?>
                             <button type="button" class="btn-u btn-u-sea-shop add-to-cart add_to_cart btn_cart" data-type="text"  data-pid='<?php echo $row['product_id']; ?>'><i class="fa fa-shopping-cart"></i>
                            <?php echo translate('add_to_cart'); ?>
                            </button>
                        <?php } ?>
                        </div>

                        <div class="margin-bottom-5">
                        <?php 
                            $wish = $this->crud_model->is_wished($row['product_id']); 
                        ?>
                        <?php if($wish == 'yes'){ ?>
                            <ul class="list-inline add-to-wishlist add-to-wishlist-brd"><li data-pid='<?php echo $row['product_id']; ?>' data-type='text' class="wishlist-in wished_it"><i class="fa fa-heart"></i><?php echo translate('added_to_wishlist');?></li></ul>
                        <?php } else {?>
                            <ul class="list-inline add-to-wishlist add-to-wishlist-brd"><li data-pid='<?php echo $row['product_id']; ?>' data-type='text' class="wishlist-in wish_it"><i class="fa fa-heart"></i><?php echo translate('add_to_wishlist');?></li></ul>
                        <?php } ?>
                        </div>

                                    <ul class="list-inline gender margin-bottom-5">
                                        <li class="">
                                            <strong><?php echo translate('sector:');?></strong>
                                            <a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category']; ?>"><?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name'); ?> </a>

                                        </li>
                                        <?php
                                            if($vendor_system == 'ok'){
                                        ?>
                                        <li class="">
                                            | <strong><?php echo translate('hub:');?></strong>
                                            <?php echo $this->crud_model->product_by($row['product_id'],'with_link'); ?>
                                        </li>
                                        <?php
                                            }
                                        ?>
                                    </ul>

                        <!--<div class="margin-bottom-5">
                            <span class="gender">
                                <strong><?php echo translate('sector:');?></strong>
                                <a href="<?php echo base_url(); ?>index.php/home/category/<?php echo $row['category']; ?>"><?php echo $this->crud_model->get_type_name_by_id('category',$row['category'],'category_name'); ?> </a>
                            </span>
                        </div>

                        <?php
                            if($vendor_system == 'ok'){
                        ?>
                        <div class="margin-bottom-5">
                            <span class="gender">
                                <strong><?php echo translate('hub:');?></strong>
                                <?php echo $this->crud_model->product_by($row['product_id'],'with_link'); ?>
                            </span>
                        </div>
                        <?php
                            }
                        ?>-->
            </div>    
        </div>
    </div>
</div>



<?php
       }
	} else if($viewtype == 'grid'){
		$f_num = (12/$grid_items_per_row);
?>

<div class="row illustration-v2 margin-bottom-30">
<?php
	$n = 0;
    foreach($all_products as $row){
		$n++;
?> 	        
    <div class="col-md-<?php echo $f_num; ?>">
        <div class="item22 custom_item">
            <div class="product-img product-img-brd">
                <a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>"> <img class="full-width img-responsive" src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','one'); ?>" alt=""></a>
                <a class="product-review" href="<?php echo $this->crud_model->product_link($row['product_id']); ?>"><?php echo translate('view');?></a>
                <?php if($this->crud_model->is_added_to_cart($row['product_id'])){ ?>
                    <a class="add-to-cart added_to_cart" href="#" onclick="return false;" data-type='text' data-pid='<?php echo $row['product_id']; ?>'><i class="fa fa-shopping-cart"></i>
                    <?php echo translate('added_to_cart');?>
                    </a>
                <?php } else { ?>
                    <a class="add-to-cart add_to_cart" href="#" onclick="return false;" data-type='text' data-pid='<?php echo $row['product_id']; ?>'><i class="fa fa-shopping-cart"></i>
                    <?php echo translate('add_to_cart');?>
                    </a>
                <?php } ?>

                        <?php
                            if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'current_stock') <= 0 && !$this->crud_model->is_digital($row['product_id'])){
                        ?>
                        <div class="shop-rgba-red rgba-banner"><?php echo translate('out_of_stock');?></div>
                        <?php
                            } else {
                                if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ 
                        ?>
                            <div class="shop-rgba-dark-green rgba-banner">
                                <?php 
                                    if($row['discount_type'] == 'percent'){
                                        echo $row['discount'].'%';
                                    } else if($row['discount_type'] == 'amount'){
                                        echo currency().$row['discount'];
                                    }
                                ?>
                                <?php echo ' '.translate('off'); ?>
                            </div>
                        <?php 
                                } 
                            }
                        ?> 
            </div>
            <div class="product-description-v2 product-description-brd margin-bottom-30">
                <div class="overflow-h margin-bottom-5">
                    <div class="pull-left">
                        <h4 class="title-price"><a href="<?php echo $this->crud_model->product_link($row['product_id']); ?>"><?php echo $row['title'] ?></a></h4>
                        <!--<span class="gender text-uppercase">Men</span>-->
                        <span class="gender22"><?php echo translate('seller').' : '.$this->crud_model->product_by($row['product_id'],'with_link'); ?></span>
                        <div class="product-price">
                            <?php if($this->crud_model->get_type_name_by_id('product',$row['product_id'],'discount') > 0){ ?>
                            <span class="title-price"><?php echo currency().$this->crud_model->get_product_price($row['product_id']); ?></span>
                            <span class="title-price line-through"><?php echo currency().$row['sale_price']; ?></span>
                            <?php } else { ?>
                            <span class="title-price"><?php echo currency().$row['sale_price']; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                        <ul class="list-inline product-ratings tooltips22" data-original-title="<?php echo $rating = $this->crud_model->rating($row['product_id']); ?>" data-toggle="tooltip" data-placement="top" >
                            <?php
                                $rating = $this->crud_model->rating($row['product_id']);
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
                                $wish = $this->crud_model->is_wished($row['product_id']); 
                            ?>

                            <?php if($wish == 'yes'){ ?>
                                <li class="like-icon"><a data-original-title="<?php echo translate('added_to_wishlist');?>" data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row['product_id']; ?>' data-type='icon' class="tooltips wished_it" href="#" onclick="return false;"><i class="fa fa-heart"></i></a></li>
                            <?php } else {?>
                                <li class="like-icon"><a data-original-title="<?php echo translate('add_to_wishlist');?>" data-toggle="tooltip" data-placement="left" data-pid='<?php echo $row['product_id']; ?>' data-type='icon' class="tooltips wish_it" href="#" onclick="return false;"><i class="fa fa-heart"></i></a></li>
                            <?php } ?>

                        </ul>
            </div>
        </div>
    </div>


<?php if($n % 3 == 0){ ?>
</div>
<div class="row illustration-v2 margin-bottom-30">
<?php } ?>

    
    <?php
        }
    ?>
         
</div>
<?php
	}
?>
<!--/end viewtype=grid-->

<div class="text-center" style="display:none;" id="pagenation_links">
    <?php echo $this->ajax_pagination->create_links(); ?>
</div><!--/end pagination-->

<script>
	$(document).ready(function() {
		$('.pg_links').html($('#pagenation_links').html());
		$('.result-category').html(''
			+'<h2><?php echo $name; ?></h2>'
            + '<small class="shop-bg-red badge-results"><?php echo $count; ?> <?php echo translate('results'); ?></small>'
		);
	});
</script>