<?php
	$side_bar_pos=$this->db->get_where('ui_settings',array('type'=>"side_bar_pos_category"))->row()->value;
?>

<div class="content container">
<div class="row">

    	<div class="col-md-1">
			<?php
                if(!file_exists('uploads/vendor/logo_'.$vendor.'.png')){
            ?>
    		<img src='<?php echo base_url(); ?>uploads/vendor/logo_0.png' style="height:80px;"/>
            <?php
                } else {
            ?>
    		<img src='<?php echo base_url(); ?>uploads/vendor/logo_<?php echo $vendor; ?>.png' style="height:80px;"/>
            <?php
                }
            ?>
        </div>
        <div class="col-md-11">
        	<div>
            <?php
            	$seller_info = $this->db->get_where('vendor',array('vendor_id'=>$vendor))->row();
			?>
            <h2>
            <!--<?php echo translate('firm');?>:-->
            <?php
            	echo $seller_info->company.'('.$seller_info->display_name.')';
			?>
            </h2>
            <h4>
			<!--<?php echo translate('address');?>:-->
			<?php
				echo $seller_info->address1;
			?>
            </h4>
            </div>
        </div>
	<div class="col-md-12">
			<?php
                if(!file_exists('uploads/vendor/logo_'.$vendor.'.png')){
            ?>
    			<img src='<?php echo base_url(); ?>uploads/vendor/banner_0.jpg' class="img-responsive" style="max-height:500px;" />
            <?php
                } else {
            ?>
    			<img src='<?php echo base_url(); ?>uploads/vendor/banner_<?php echo $vendor; ?>.jpg' class="img-responsive" style="max-height:500px;" />
            <?php
                }
            ?>
        
	</div>
	<div class="col-md-12">
	    <div class="heading heading-v4">
	        <h2><?php echo translate('HUB_products');?> </h2>
	    </div>
	</div>
<!--</div>
</div>-->

<!--=== Content Part ===-->
<!--<div class="content container">
	<div class="row">-->
		<div class="col-md-3 filter-by-block md-margin-bottom-60 pull-<?php echo $side_bar_pos; ?>-md">
			<h1><?php echo translate('filter_by');?></h1>
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
								<?php echo translate('search'); ?>
								<i class="fa fa-angle-down"></i>
							</a>
						</h2>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in">
						<div class="panel-body" >
		                    <div class="input-group">
		                        <input type="text" id="txtr" value="" name="text" class="form-control" >
		                        <span class="input-group-btn">
		                            <span class="btn btn-input_type custom srch" ><span class="glyphicon glyphicon-search"></span></span>
		                        </span>
		                    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-group" id="accordion-v2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion-v2" href="#collapseTwo">
								<?php echo translate('sector');?>
								<i class="fa fa-angle-down"></i>
							</a>
						</h2>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse in">
						<div class="panel-body">
							<ul class="list-unstyled checkbox-list">
								<li>
								   <label class="checkbox">
										<input type="radio" name="checkbox" class="check_category" onclick="sub_clear();" value="0" />
										<i class="rounded-x"></i><?php echo translate('all_sectors'); ?>
										<small><a href="#"></a></small>
									</label> 
								</li>
								<?php
									foreach($all_category as $row)
									{
										if($this->crud_model->is_category_of_vendor($row['category_id'],$vendor)){
								?>
								<li>
								   <label class="checkbox">
										<input type="radio" name="checkbox"  class="check_category" onclick="sub_clear(); toggle_subs(<?php echo $row['category_id']; ?>);" value="<?php echo $row['category_id']; ?>" />
										<i class="rounded-x"></i><?php echo $row['category_name']; ?> 
										<small>(<?php echo $this->db->get_where('product',array('category'=>$row['category_id'],'status'=>'ok','added_by' => '{"type":"vendor","id":"'.$vendor.'"}'))->num_rows(); ?>)</small>
									</label>
								</li>
								<li>
									<ul class="list-unstyled checkbox-list sub_cat" style="display:none;" id="subs_<?php echo $row['category_id']; ?>">
									<?php
										$sub_category = $this->db->get_where('sub_category',array('category'=>$row['category_id']))->result_array();
										foreach($sub_category as $row1)
										{
											if($this->crud_model->is_sub_cat_of_vendor($row1['sub_category_id'],$vendor)){
									?>
									<li>
										<label class="checkbox">
											<input type="checkbox" name="check_<?php echo $row['category_id']; ?>" class="check_sub_category" onclick="filter('click','none','none','0')" value="<?php echo $row1['sub_category_id']; ?>" />
											<i class="square-x"></i><?php echo $row1['sub_category_name']; ?> 
											<small>(<?php echo $this->db->get_where('product',array('sub_category'=>$row1['sub_category_id'],'status'=>'ok','added_by' => '{"type":"vendor","id":"'.$vendor.'"}'))->num_rows(); ?>)</small>
										</label>
									</li>
									<?php
											} 
										}
									?>
									</ul>
								 </li>
								<?php
										}
									}
								?>
							</ul>        
						</div>
					</div>
				</div>
			</div><!--/end panel group-->

			<div class="panel-group" id="accordion-v4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion-v4" href="#collapseFour">
								<?php echo translate('price'); ?>
								<i class="fa fa-angle-down"></i>
							</a>
						</h2>
					</div>
					<div id="collapseFour" class="panel-collapse collapse in">
                            <div class="panel-body" id="range_wrapper">
                                <div class="slider-snap" id="range"></div>
								<div id="range_script" class=""></div>
                                <p class="slider-snap-text">
                                    <span class="slider-snap-value-lower" id="range_min"><?php echo $range_min ?></span>
                                    <span class="slider-snap-value-upper" id="range_max"><?php echo $range_max ?></span>
                                </p>
                            </div>
					</div>
				</div>
			</div>
			<!-- End Posts -->
							   
			
		</div>

		<input type="hidden" id="viewtype" value="list" />
		<input type="hidden" id="fload" value="first" />
		
		<div class="col-md-9">
			<div class="row margin-bottom-5">
				<div class="col-sm-10 result-category"></div>
				<div class="col-sm-2">
					<ul class="list-inline clear-both">
						<li class="grid-list-icons">
							<span class="viewers" data-typ="list"><i class="fa fa-th-list"></i></span>
							<span class="viewers" data-typ="grid"><i class="fa fa-th"></i></span>
						</li>
					</ul>
				</div>    
			</div><!--/end result category-->

			<div class="filter-results" id="list"></div>
			<!--/end filter resilts-->

			<div class="text-center pg_links" ></div>
			<!--/end pagination-->

		 </div>
		
	</div><!--/end row-->
</div><!--/end container-->    
<!--=== End Content Part ===-->
<!--</div>-->
<?php
	echo form_open(base_url() . 'index.php/home/listed/', array(
		'method' => 'post',
		'id' => 'plistform',
        'enctype' => 'multipart/form-data'
	));
?>
<input type="hidden" name="category" id="categoryaa" value="0">
<input type="hidden" name="sub_category" id="sub_categoryaa" value="">
<input type="hidden" name="range_min" id="range_minaa" value="<?php echo $range_min; ?>">
<input type="hidden" name="range_max" id="range_maxaa" value="<?php echo $range_max; ?>">
<input type="hidden" name="text" id="search_text" value="">
<input type="hidden" name="featured" id="featuredaa" value="">
<input type="hidden" name="vendor" id="vendoraa" value="<?php echo $vendor; ?>">
</form>

<script>
var base_url = '<?php echo base_url(); ?>';
var tokn_nm = '<?php echo $this->config->item('csrf_token_name'); ?>';
$(document).ready(function() {  

	var cur_category = '0'; // all cat
	var cur_sub_category = '';
	//var range = '<?php echo $range; ?>';
	var range_min= '<?php echo $range_min; ?>'
	var range_max= '<?php echo $range_max; ?>'
	var search_text = '';
	var featured  = '';

        $(".check_category").each(function(){
            if(this.value == cur_category){
                $(this).attr("checked",true);
                $("#subs_"+this.value).show('fast');
            }
        });
        
        $(".check_sub_category").each(function(){
            if(this.value == cur_sub_category){
                $(this).attr("checked",true);
            }
        });      

        //separate for seller
        var range = document.getElementById("range"); 
        noUiSlider.create(range, {
                                    start: [ 20, 80 ],
                                    step: 1,
                                    margin: 1,
                                    connect: true,
                                    orientation: "horizontal",
                                    behaviour: "tap-drag",
                                    range: {
                                        "min": 0,
                                        "max": 100
                                    }/*,
                                    pips: {
                                        mode: "steps",
                                        density: 2
                                    }*/
                    });

                range.noUiSlider.on('update', function( values, handle ) {
                    if ( handle ) {
                        $('#range_max').html(values[handle]);
                    } else {
                        $('#range_min').html(values[handle]);
                    }
                }); 

                range.noUiSlider.on('change', function( values, handle ) {
					filter('click','none','none','0');
                }); 

        avs(cur_category, cur_sub_category, range_min, range_max, search_text);
});
</script>