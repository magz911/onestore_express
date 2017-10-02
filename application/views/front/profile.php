<?php
     foreach($user_info as $row)
        {
?>
    <!--=== Profile ===-->
    <div class="container content profile">
    	<div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <?php if(file_exists('uploads/user_image/user_'.$row['user_id'].'.jpg')){ ?>
                    <img class="img-responsive profile-img margin-bottom-20" src="<?php echo base_url(); ?>uploads/user_image/user_<?php echo $row['user_id']; ?>.jpg" alt="User_Image">
                <?php } else if($row['fb_id'] !== ''){ ?>
                    <img class="img-responsive profile-img margin-bottom-20" src="https://graph.facebook.com/<?php echo $row['fb_id']; ?>/picture?type=large" alt="User_Image">
                <?php } else if($row['g_id'] !== ''){ ?>
                    <img class="img-responsive profile-img margin-bottom-20" src="<?php echo $row['g_photo']; ?>" alt="User_Image">
                <?php } else { ?>
                    <img class="img-responsive profile-img margin-bottom-20" src="<?php echo base_url(); ?>uploads/user_image/default.jpg" >
                <?php } ?>

                        <div class="md-margin-bottom-30">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-info"></i> <?php echo translate('personal_information');?></h2>
                                </div>
                                <div class="panel-body">
                                     <ul class="list-unstyled social-contacts-v2">
                                        <li><i class="rounded-x fa fa-user"></i> <?php echo $row['username'];?></li>
                                        <li><i class="rounded-x fa fa-envelope"></i> <?php echo $row['email'];?></li>
                                        <li><i class="rounded-x fa fa-phone"></i> <?php echo $row['phone'];?></li>
                                        <li><i class="rounded-x fa fa-home"></i> <?php echo $row['address1'];?></li>
                                        <li><i class="rounded-x fa fa-home"></i> <?php echo $row['address2'];?></li>
                                        <li><i class="rounded-x fa fa-university"></i> <?php echo $row['city'];?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                                        
            </div>
            <!--End Left Sidebar-->

            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body">
                    <!--Service Block v3-->
                	<div class="row margin-bottom-10">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="service-block-v3 service-block-u">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="service-heading"><?php echo translate('total_purchase');?></span>
                                <span class="counter"><?php echo currency().$this->crud_model->user_total(0); ?></span>
                                
                                <div class="clearfix margin-bottom-10"></div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small><?php echo translate('last_7_days');?></small>
                                        <h4 class="counter"><?php echo currency().$this->crud_model->user_total(7); ?></h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small><?php echo translate('last_30_days');?></small>
                                        <h4 class="counter"><?php echo currency().$this->crud_model->user_total(30); ?></h4>
                                    </div>
                                </div>            
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="service-block-v3 service-block-blue">
                                <i class="fa fa-heart"></i>
                                <span class="service-heading"><?php echo translate('wished_products');?></span>
                                <span class="counter"><?php echo $this->crud_model->user_wished(); ?></span>
                                
                                <div class="clearfix margin-bottom-10"></div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small><?php echo translate('user_since');?></small>
                                        <h4 class="counter"><?php echo date('F j, Y',$row['creation_date']);?></h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small><?php echo translate('last_login');?></small>
                                        <h4 class="counter"><?php echo date('F j, Y',$row['last_login']);?></h4>
                                    </div>
                                </div>            
                            </div>
                        </div>
                    </div><!--/end row-->
                    <!--End Service Block v3-->

                    <hr>

                    <div class="tab-v2">
                        <ul class="nav nav-justified nav-tabs">
                            <li class="active"><a href="#tab_purchase" data-toggle="tab"><?php echo translate('purchase_history');?></a></li>
                            <!--<li class=""><a href="#downloads" data-toggle="tab"><?php echo translate('downloads');?></a></li>-->
                            <li class=""><a href="#tab_wish" data-toggle="tab"><?php echo translate('wishlist');?></a></li>
                            <li class=""><a href="#tab_info" data-toggle="tab"><?php echo translate('edit_info');?></a></li>
                            <li class=""><a href="#tab_pw" data-toggle="tab"><?php echo translate('change_password');?></a></li>
                        </ul>                
                        <div class="tab-content">

                            <div class="profile-edit tab-pane fade active in" id="tab_purchase">
                                <h2 class="heading-md"><?php echo translate('view_purchase_history');?></h2>
                                <p>You can view your purchase history and invoice.</p>
                                <br>
                                <div class="table-search-v1 margin-bottom-20">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?php echo translate('date');?></th>
                                                    <th><?php echo translate('total');?></th>
                                                    <th><?php echo translate('payment_status');?></th>
                                                    <th><?php echo translate('delivery_status');?></th>
                                                    <th><?php echo translate('invoice');?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i = 0;
                                                $this->db->order_by('sale_id','desc');
                                                $sales = $this->db->get_where('sale',array('buyer'=>$row['user_id']))->result_array();
                                                foreach ($sales as $row1) {
                                                    $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo date('F j, Y',$row1['sale_datetime']); ?></td>
                                                    <td><?php echo currency().$this->cart->format_number($row1['grand_total']); ?></td>
                                                    <td>
                                                        <?php 
                                                            $payment_status = json_decode($row1['payment_status'],true); 
                                                            foreach ($payment_status as $dev) {
                                                        ?>
                                                        <span class="label label-<?php if($dev['status'] == 'paid'){ ?>success<?php } else { ?>danger<?php } ?>">
                                                        <?php
                                                                if(isset($dev['vendor'])){
                                                                    echo $this->crud_model->get_type_name_by_id('vendor', $dev['vendor'], 'display_name').' ('.translate('vendor').') : '.$dev['status'];
                                                                } else if(isset($dev['admin'])) {
                                                                    echo translate('admin').' : '.$dev['status'];
                                                                }
                                                        ?>
                                                        </span>
                                                        <br>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $delivery_status = json_decode($row1['delivery_status'],true); 
                                                            foreach ($delivery_status as $dev) {
                                                        ?>

                                                        <span class="label label-<?php if($dev['status'] == 'delivered'){ ?>sucess<?php } else { ?>danger<?php } ?>">
                                                        <?php
                                                                if(isset($dev['vendor'])){
                                                                    echo $this->crud_model->get_type_name_by_id('vendor', $dev['vendor'], 'display_name').' ('.translate('vendor').') : '.$dev['status'];
                                                                } else if(isset($dev['admin'])) {
                                                                    echo translate('admin').' : '.$dev['status'];
                                                                }
                                                        ?>
                                                        </span>
                                                        <br>
                                                        <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn-u btn-block btn-u-green btn-u-xs" href="<?php echo base_url(); ?>index.php/home/invoice/<?php echo $row1['sale_id']; ?>">
                                                            <i class="fa fa-file-text margin-right-5"></i>
                                                            <?php echo translate('invoice');?>
                                                        </a>
                                                    </td>                          
                                                </tr>
                                                
                                            <?php
                                                }
                                            ?>   
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                     
                            </div>

                            <!--<div class="tab-pane fade" id="downloads">
                                <div class="table-search-v1 margin-bottom-20">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?php echo translate('image');?></th>
                                                    <th><?php echo translate('name');?></th>
                                                    <th><?php echo translate('download');?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i = 0;
                                                $downloads = $this->db->get_where('user',array('user_id'=>$row['user_id']))->row()->downloads;
                                                if($downloads == ''){
                                                    $downloads = json_decode('[]',true);
                                                } else {
                                                    $downloads = json_decode($downloads,true);
                                                }
                                                foreach ($downloads as $row1) {
                                                    $i++;
                                                    $query1 = $this->db->get_where('product',array('product_id'=>$row1['product']));
        											if($query1->num_rows()>0){
        												$query = $query1->row();
                                            ?>
                                                
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <img class="rounded-x" src="<?php echo $this->crud_model->file_view('product',$row1['product'],'','','thumb','src','multi','one'); ?>" width="100" />
                                                    </td>
                                                    <td><?php echo $query->title; ?></td>
                                                    <td>
                                                        <a class="btn-u btn-block btn-u-green btn-u-xs download_it" data-pid='<?php echo $row1['product']; ?>'>
                                                            <i class="fa fa-cloud-download margin-right-5"></i>
                                                            <?php echo translate('download');?>
                                                        </a>
            
                                                    </td>                          
                                                </tr>
                                            <?php
        											}
                                                }
                                            ?>   
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                   
                            </div>-->

                            <div class="profile-edit tab-pane fade" id="tab_wish">
                                <h2 class="heading-md"><?php echo translate('manage_your_wishlist');?></h2>
                                <p>You can add your wishlist to your cart.</p>
                                <br>
                                <div class="table-search-v1 margin-bottom-20">
                                    <div class="table-responsive">
                                        <table class="table table table-hover table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?php echo translate('image');?></th>
                                                    <th><?php echo translate('name');?></th>
                                                    <th><?php echo translate('price');?></th>
                                                    <th><?php echo translate('availability');?></th>
                                                    <th><?php echo translate('purchase');?></th>
                                                    <th><?php echo translate('remove');?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $i = 0;
                                                $wishlist = json_decode($this->db->get_where('user',array('user_id'=>$row['user_id']))->row()->wishlist);
                                                foreach ($wishlist as $row1) {
                                                    $i++;
                                                    $query = $this->db->get_where('product',array('product_id'=>$row1))->row();
                                            ?>
                                                
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td>
                                                        <img class="rounded-x" src="<?php echo $this->crud_model->file_view('product',$row1,'','','thumb','src','multi','one'); ?>" width="80" />
                                                    </td>
                                                    <td><?php echo $query->title; ?></td>
                                                    <td><?php echo currency().$this->crud_model->get_product_price($row1); ?></td>
                                                    <td>
                                                        <?php if($query->current_stock <= 0){ ?>
                                                            <span class="label label-danger">
                                                                <?php echo translate('unvailable'); ?>
                                                            </span>
                                                        <?php } else { ?>
                                                            <span class="label label-green">
                                                                <?php echo translate('available'); ?>
                                                            </span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if($this->crud_model->is_added_to_cart($row1)){ ?>
                                                            <a class="add-to-cart added_to_cart btn-u btn-block btn-u-green btn-u-xs" href="#" onclick="return false;" data-type='text' data-pid='<?php echo $row1; ?>'>
                                                                <i class="fa fa-shopping-cart"></i>
                                                                <?php echo translate('added');?>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a class="add-to-cart add_to_cart btn-u btn-block btn-u-green btn-u-xs" href="#" onclick="return false;" data-type='text' data-pid='<?php echo $row1; ?>'>
                                                                <i class="fa fa-cart-plus"></i>
                                                                <?php echo translate('add');?>
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a data-original-title="<?php echo translate('remove_from_wishlist'); ?>" data-type='icon' data-toggle="tooltip" data-placement="top" data-pid='<?php echo $row1; ?>' class="tooltips wished_it remove_from_wish btn-u btn-u-red btn-block btn-u-xs" href="#" onclick="return false;">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    </td>                          
                                                </tr>
                                            <?php
                                                }
                                            ?>   
                                            </tbody>
                                        </table>
                                    </div>    
                                </div>                            
                            </div>

                            <div class="profile-edit tab-pane fade" id="tab_info">
                                <h2 class="heading-md"><?php echo translate('manage_your_name,_contact_details,_etc.');?></h2>
                                <p>Below are the name, contact details and addresses on file for your account.</p>
                                <br>
                                <div class="row margin-bottom-20">
                                	<div class="update_info_html log-reg-v3">
                        				<!-- Update-Info-Form -->
										<?php
                                            echo form_open(base_url() . 'index.php/home/registration/update_info/', array(
                                                'class' => 'log-reg-block sky-form',
                                                'method' => 'post',
                                                'enctype' => 'multipart/form-data',
                                                'id' => 'update_info_form',
                                                'novalidate' => 'novalidate'
                                            ));
                                        ?>    
                                        	<?php
											foreach($user_info as $row)
												{
											?>

                                            <dl class="dl-horizontal">
                                                <dt><?php echo translate('first_name'); ?></dt>
                                                <dd>                
                                                    <section>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-user"></i>
                                                            <input type="text" name="username" placeholder="<?php echo translate('first_name'); ?>" class="required" value="<?php echo $row['username'];?>">
                                                            <b class="tooltip tooltip-right"><?php echo translate('re-write your_first_name'); ?></b>
                                                        </label>
                                                    </section> 
                                                </dd>

                                                <dt><?php echo translate('last_name'); ?></dt>
                                                <dd>
                                                    <section>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-user"></i>
                                                            <input type="text" name="surname" placeholder="<?php echo translate('last_name'); ?>" class="required" value="<?php echo $row['surname'];?>">
                                                            <b class="tooltip tooltip-right"><?php echo translate('re-write your_last_name'); ?></b>
                                                        </label>
                                                    </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('phone_number'); ?></dt>
                                                <dd>    
                                                    <section>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-phone"></i>
                                                            <input type="text" name="phone" placeholder="<?php echo translate('phone_number'); ?>" value="<?php echo $row['phone'];?>" >
                                                            <b class="tooltip tooltip-right"><?php echo translate('re-write_your_phone_number'); ?></b>
                                                        </label>
                                                    </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('address_line_1'); ?></dt>
                                                <dd>   
                                                    <section>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-home"></i>
                                                            <input type="text" name="address1" placeholder="<?php echo translate('address_line_1'); ?>" class="required" value="<?php echo $row['address1'];?>">
                                                            <b class="tooltip tooltip-right"><?php echo translate('re-write_your_address_line_1'); ?></b>
                                                        </label>
                                                    </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('address_line_2'); ?></dt>
                                                <dd>    
                                                    <section>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-home"></i>
                                                            <input type="text" name="address2" placeholder="<?php echo translate('address_line_2'); ?>" value="<?php echo $row['address2'];?>">
                                                            <b class="tooltip tooltip-right"><?php echo translate('re-write_your_address_line_2'); ?></b>
                                                        </label>
                                                    </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('ZIP_Code'); ?></dt>
                                                <dd>    
                                                    <section>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-home"></i>
                                                            <input type="text" name="zip" placeholder="<?php echo translate('ZIP_Code'); ?>" value="<?php echo $row['zip'];?>" >
                                                            <b class="tooltip tooltip-right"><?php echo translate('re-write_your_ZIP_Code'); ?></b>
                                                        </label>
                                                    </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('city'); ?></dt>
                                                <dd>    
                                                    <section>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-university"></i>
                                                            <input type="text" name="city" placeholder="<?php echo translate('city'); ?>" class="required" value="<?php echo $row['city'];?>" >
                                                            <b class="tooltip tooltip-right"><?php echo translate('re-write_your_city_name'); ?></b>
                                                        </label>
                                                    </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('skype_id'); ?></dt>
                                                <dd>    
                                                    <section>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-skype"></i>
                                                            <input type="text" name="skype" placeholder="<?php echo translate('skype_id'); ?>" value="<?php echo $row['skype'];?>" >
                                                            <b class="tooltip tooltip-right"><?php echo translate('re-write_your_skype_id'); ?></b>
                                                        </label>
                                                    </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('facebook');?></dt>
                                                <dd>    
                                                    <section>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-facebook"></i>
                                                            <input type="text" name="facebook" placeholder="<?php echo translate('facebook');?>" value="<?php echo $row['facebook'];?>" >
                                                            <b class="tooltip tooltip-right"><?php echo translate('re-write_your_facebook_profile_link');?></b>
                                                        </label>
                                                    </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('google+'); ?></dt>
                                                <dd>    
                                                    <section>
                                                        <label class="input">
                                                            <i class="icon-append fa fa-google-plus"></i>
                                                            <input type="text" name="google_plus" placeholder="<?php echo translate('google+'); ?>" value="<?php echo $row['google_plus'];?>" >
                                                            <b class="tooltip tooltip-right"><?php echo translate('re-write_your_google+_profile_link'); ?></b>
                                                        </label>
                                                    </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('profile_picture'); ?></dt>
                                                <dd>
                                                    <section>
                                                        <label for="file" class="input input-file">
                                                            <div class="button btn-u btn-u-cust">
                                                            	<input type="file" name="image" onchange="document.getElementById('nam').value = this.value;">
                                                                <?php echo translate('browse'); ?>
                                                            </div>
                                                            <input type="text" id="nam" placeholder="Change Profile Picture" readonly>
                                                        </label>
                                                    </section>
                                                </dd>
                                            </dl>
                                            <?php
												}
											?>
                                            <br>
                                            <span type="submit" class="btn-u submitter" data-msg='Info Updated!' data-ing='Updating..'>
                                                <?php echo translate('update_info')?>
                                            </span>
                                        </form>         
                                        <!-- End Update-Info-Form -->
                                    </div>
                                </div>
                            </div>

                            <div class="profile-edit tab-pane fade" id="tab_pw">
                                <h2 class="heading-md"><?php echo translate('manage_your_security_settings');?></h2>
                                <p>Change your password.</p>
                                <br>
                                <div class="row margin-bottom-20">
                                    <div class="update_pw_html log-reg-v3">
                                        <!-- Update-PW-Form -->
										<?php
                                            echo form_open(base_url() . 'index.php/home/registration/update_password/', array(
                                                'class' => 'log-reg-block sky-form',
                                                'method' => 'post',
                                                'enctype' => 'multipart/form-data',
                                                'id' => 'update_pw_form',
                                                'novalidate' => 'novalidate'
                                            ));
                                        ?> 
                                            <dl class="dl-horizontal">
                                                <dt><?php echo translate('current_password');?></dt>
                                                <dd>                  
                                                <section>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-lock"></i>
                                                        <input type="password" name="password" placeholder="<?php echo translate('current_password');?>" class="required" >
                                                        <b class="tooltip tooltip-bottom-right"><?php echo translate('enter_your_current_password');?></b>
                                                    </label>
                                                </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('new_password');?></dt>
                                                <dd>
                                                <section>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-key"></i>
                                                        <input type="password" name="password1" placeholder="<?php echo translate('new_password');?>" class="required pass pass1" >
                                                        <b class="tooltip tooltip-bottom-right"><?php echo translate('enter_your_new_password');?></b>
                                                    </label>
                                                </section>
                                                </dd>
                                                
                                                <dt><?php echo translate('confirm_new_password');?></dt>
                                                <dd>
                                                <section>
                                                    <label class="input">
                                                        <i class="icon-append fa fa-thumbs-up"></i>
                                                        <input type="password" name="password2" placeholder="<?php echo translate('confirm_new_password');?>" class="required pass pass2" >
                                                        <b class="tooltip tooltip-bottom-right"><?php echo translate('re-enter_your_new_password');?></b>
                                                        <div id="pass_note"></div>
                                                    </label>
                                                </section>
                                                </dd>
                                            </dl>

                                            <br>
                                            <span type="submit" class="btn-u submitter pass_chng" data-msg='Password Updated!' data-ing='Saving..'>
                                                <?php echo translate('update_password'); ?>
                                            </span>
                                         </form>
                                         <!-- End Update-PW-Form -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--End Profile Body-->
            </div>
        </div><!--/end row-->
    </div><!--/container-->    
    <!--=== End Profile ===-->
<?php
    }
?>


