    <!--=== Content Medium Part ===-->
    <div class="content-md margin-bottom-30">
        <div class="container">
            <?php
                echo form_open(base_url() . 'index.php/home/cart_finish/go', array(
                    'class' => 'shopping-cart',
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                    'id' => 'cart_form'
                ));
            ?>    
                <div>

                    <div class="header-tags">
                        <div class="overflow-h">
                            <h2><?php echo translate('shopping_cart');?></h2>
                            <p><?php echo translate('review_&_edit_your_product');?></p>
                            <i class="rounded-x fa fa-shopping-cart"></i>
                        </div>    
                    </div>
                    <section>
                        <div class="table-responsive cart_list">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo translate('product');?></th>
                                        <th><?php echo translate('price');?></th>
                                        <th><?php echo translate('qty');?></th>
                                        <th><?php echo translate('total');?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($carted as $items){ ?>

                                    <tr data-rowid="<?php echo $items['rowid']; ?>" >
                                        <td class="product-in-table">
                                            <img class="img-responsive" src="<?php echo $items['image']; ?>" alt="">
                                            <div class="product-it-in">
                                                <h3><?php echo $items['name']; ?></h3>
                                            </div>    
                                        </td>
                                        <td class="pric"><?php echo currency().$this->cart->format_number($items['price']); ?></td>
                                        <td>
                                            <?php
                                                if(!$this->crud_model->is_digital($items['id'])){
                                            ?>
                                                <button type='button' class="quantity-button minus" value='minus'>-</button>
                                                <input type='text' disabled step='1' class="quantity-field quantity_field" data-rowid="<?php echo $items['rowid']; ?>" data-limit='no' value="<?php echo $items['qty']; ?>" id='qty1' onblur="check_ok(this);" />
                                                <button type='button' class="quantity-button plus" value='plus'>+</button>
                                                <span class="button limit" style="display:none;"></span>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="shop-red sub_total"><?php echo currency().$this->cart->format_number($items['subtotal']); ?></td>
                                        <td>
                                            <button type="button" class="close"><span>&times;</span><span class="sr-only">Close</span></button>
                                        </td>
                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </section>

                    <div class="header-tags">
                        <div class="overflow-h">
                            <h2><?php echo translate('shipping_info'); ?></h2>
                            <p><?php echo translate('shipping_and_address_info'); ?></p>
                            <i class="rounded-x fa fa-send"></i>
                        </div>    
                    </div>
                    <section class="billing-info">
                        <div class="row">
                            <div class="col-md-12 md-margin-bottom-40">
                                <h2 class="title-type"><?php echo translate('shipping_address');?></h2>
                                <div class="billing-info-inputs checkbox-list">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input id="name" type="text" placeholder="<?php echo translate('first_name'); ?>" name="firstname" class="form-control required">
                                            <input id="email" type="text" placeholder="<?php echo translate('email'); ?>" name="email" class="form-control required email">
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="surname" type="text" placeholder="<?php echo translate('last_name'); ?>" name="lastname" class="form-control required">
                                            <input id="phone" type="tel" placeholder="<?php echo translate('phone'); ?>" name="phone" class="form-control required">
                                        </div>
                                    </div>
                                    <input id="address_1" type="text" placeholder="<?php echo translate('address_line_1'); ?>" name="address1" class="form-control required address">
                                    <!--<input id="address_2"  type="text" placeholder="<?php echo translate('address_line_2'); ?>" name="address2" class="form-control required address">-->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input id="city" type="text" placeholder="<?php echo translate('city'); ?>" name="city" class="form-control required address">
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="zip" type="text" placeholder="<?php echo translate('zip/postal_code'); ?>" name="zip" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row" id="lnlat" style="display:none;" >
                                        <div class="col-sm-12">
                                            <input id="langlat" type="text" placeholder="langitude - latitude" name="langlat" class="form-control required" readonly>
                                        </div>
                                    </div>
                                    <div id="maps" style="height:400px;" >
                                        <div id="map-canvas" style="height:400px;"></div>
                                    </div>


                                </div>
                            </div>
                        </div> 
                    </section>
                    
                    <div class="header-tags">
                        <div class="overflow-h">
                            <h2><?php echo translate('payment');?></h2>
                            <p><?php echo translate('select_payment_method');?></p>
                            <i class="rounded-x fa fa-credit-card"></i>
                        </div>    
                    </div>
                    <section>
                        <div class="row">
                            <div class="col-md-6 md-margin-bottom-50">
                                <h2 class="title-type"><?php echo translate('choose_a_payment_method');?></h2>
                                <!-- Accordion -->
                                <div class="accordion-v2">
                                    <div class="panel-group cc-selector" id="accordion">
                                        <?php
                                            $a = 0; $collapse =  ""; $checked = "";
                                            $c_set = $this->db->get_where('business_settings',array('type'=>'cash_set'))->row()->value;
                                            $p_set = $this->db->get_where('business_settings',array('type'=>'paypal_set'))->row()->value;
                                            $i_set = $this->db->get_where('business_settings',array('type'=>'ibayad_set'))->row()->value;
                                            //$c_set = "ok";
                                        ?>
                                        <?php 
                                            if($c_set == 'ok'){
                                                $a++;
                                                if($a > 1){
                                                    $collapse = "collapse";
                                                    $checked = "";
                                                } else {
                                                    $collapse = "";
                                                    $checked = "checked";
                                                }
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        <i class="fa fa-money"></i>
                                                        <?php echo translate('cash_on_delivery');?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse <?php echo $collapse; ?>">
                                                <div class="content margin-left-10">
                                                    <input id="cod" type="radio" name="payment_type" value="cash_on_delivery" <?php echo $checked; ?> />
                                                    <label class="drinkcard-cc cod" for="cod"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>

                                        <?php
                                            if($p_set == 'ok'){
                                                $a++;
                                                if($a > 1){
                                                    $collapse = "collapse";
                                                    $checked = "";
                                                } else {
                                                    $collapse = "";
                                                    $checked = "checked";
                                                }
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                        <i class="fa fa-paypal"></i>
                                                        <?php echo translate('pay_with_paypal');?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse <?php echo $collapse; ?>">
                                                <div class="content margin-left-10">
                                                    <input id="paypal" type="radio" name="payment_type" value="paypal" <?php echo $checked; ?> />
                                                    <label class="drinkcard-cc paypal" for="paypal"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>

                                        <?php 
                                            if($i_set == 'ok'){
                                                $a++;
                                                if($a > 1){
                                                    $collapse = "collapse";
                                                    $checked = "";
                                                } else {
                                                    $collapse = "";
                                                    $checked = "checked";
                                                }
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                        <i class="fa fa-bank"></i>
                                                        <?php echo translate('pay_with_ibayad');?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse <?php echo $collapse; ?>">
                                                <div class="content margin-left-10">
                                                    <input id="ibayad" type="radio" name="payment_type" value="ibayad" <?php echo $checked; ?> />
                                                    <label class="drinkcard-cc ibayad" for="ibayad"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>

                                    </div>
                                </div>
                                <!-- End Accordion -->

                            </div>

                            <div class="col-md-6">
                                <h2 class="title-type"><?php echo translate('frequently_asked_questions');?></h2>
                                <!-- Accordion -->
                                <div class="accordion-v2 plus-toggle">
                                    <div class="panel-group" id="accordion-v2">
                                        <?php
                                            $i = 0;
                                            $faqs = json_decode($this->db->get_where('business_settings',array('type'=>'faqs'))->row()->value,true);
                                            foreach ($faqs as $row) {
                                                $i++;
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion-v2" href="#collapseOne-v<?php echo $i; ?>">
                                                        <?php echo $row['question']; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne-v<?php echo $i; ?>" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <?php echo $row['answer']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <!-- End Accordion -->    
                            </div>
                        </div>
                    </section>

                    <div class="coupon-code">
                        <div class="row">
                            <div class="col-sm-4 sm-margin-bottom-30">
                                <h3><?php echo translate('discount_code');?></h3>
                                <p><?php echo translate('enter_your_coupon_code');?></p>
                                <span id="coupon_report">
                                    <?php if($this->cart->total_discount() <= 0 && $this->session->userdata('couponer') !== 'done' && $this->cart->get_coupon() == 0){ ?>
                                        <input class="form-control margin-bottom-10 coupon_code" type="text">
                                        <button type="button" class="btn-u btn-u-sea-shop coupon_btn"><?php echo translate('apply_coupon'); ?></button>
                                    <?php } else { ?>
                                        <h3><?php echo translate('coupon_already_activated'); ?></h3>  
                                    <?php } ?>
                                </span>
                            </div>
                            <div class="col-sm-3 col-sm-offset-5">
                                    <ul class="list-inline total-result">
                                        <li>
                                            <h4><?php echo translate('subtotal');?>:</h4>
                                            <div class="total-result-in">
                                                <span class="text-right" id="total"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <h4><?php echo translate('tax');?>:</h4>
                                            <div class="total-result-in">
                                                <span class="text-right" id="tax"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <h4><?php echo translate('shipping');?>:</h4>
                                            <div class="total-result-in">
                                                <span class="text-right" id="shipping"></span>
                                            </div>
                                        </li>
                                        <li <?php if($this->cart->total_discount() <= 0){ ?>style="display:none;"<?php } ?> class="coupon_disp">
                                            <h4><?php echo translate('coupon_discount');?>:</h4>
                                            <div class="total-result-in">
                                                <span class="text-right" id="disco"><?php echo currency().$this->cart->total_discount(); ?></span>
                                            </div>
                                        </li>
                                        <li class="divider"></li>
                                        <li class="total-price">
                                            <h4><?php echo translate('total');?>:</h4>
                                            <div class="total-result-in">
                                                <span class="grand_total" id="grand">
                                            </div>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div> 

                </div>
            </form>
        </div><!--/end container-->
    </div>

    <input type="hidden" id="first" value="yes" />
    <!--=== End Content Medium Part ===-->  

<?php
    echo form_open('', array(
        'method' => 'post',
        'id' => 'coupon_set'
    ));
?>
<input type="hidden" id="coup_frm" name="code">
</form>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClcdQxQl8F0kq3M_SNDBz7F70_Vl9Fw-s"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>-->
<script>
    var geocoder = '';
    var map = '';
    var markers = [];

    $(document).ready(function() {
                        /* ----------------- stepWizard.js -----------------*/
                        var form = $(".shopping-cart");
                        form.validate({
                            errorPlacement: function errorPlacement(error, element) { element.before(error); },
                            rules: {
                                confirm: {
                                    equalTo: "#password"
                                }
                            }
                        });
                        form.children("div").steps({
                            headerTag: ".header-tags",
                            bodyTag: "section",
                            transitionEffect: "fade",
                            onStepChanging: function (event, currentIndex, newIndex) {
                                //Allways allow previous action even if the current form is not valid! 
                                if (currentIndex > newIndex){
                                    return true;    
                                }
                                form.validate().settings.ignore = ":disabled,:hidden";
                                return form.valid();
                            },
                            onFinishing: function (event, currentIndex) {
                                //form.validate().settings.ignore = ":disabled";
                                //return form.valid();
                                cart_submission();
                            },
                            onFinished: function (event, currentIndex) {
                                //alert("Submitted!");
                            }
                        });
                        
                        update_calc_cart();
                        set_cart_form();

                        /*$('.colrs').each(function() {
                            var here = $(this);
                            var rad = here.closest('li').find('input');
                            if(rad.is(':checked')) {
                                setTimeout( function(){ 
                                    here.click();
                                }
                                , 800 );
                            }
                        });*/
    });

</script>






<script>
                            /*
                            onStepChanging: function (event, currentIndex, newIndex) {
                                var status = false;
                                if (currentIndex > newIndex){
                                    status = true;    
                                } else {
                                    form.validate().settings.ignore = ":disabled,:hidden";
                                    status = form.valid();
                                }
                                alert('onStepChanging says:'+status);return 0;

                                if(status == true){
                                    if(currentIndex > newIndex){//prev
                                        setTimeout( function(){
                                            if($('#first').val() == 'yes'){
                                                //set_cart_map();
                                            }
                                        }, 500 );
                                        return true;
                                    }else if(currentIndex < newIndex){//next
                                        var state1 = check_login_stat('state');
                                        var name = check_login_stat('name');
                                        state1.success(function (data) {
                                            if(data == 'hypass'){
                                                setTimeout( function(){
                                                    if($('#first').val() == 'yes'){
                                                        //set_cart_map();
                                                    }
                                                }, 500 );
                                                return true;
                                            } else {
                                                signin();
                                            }
                                        });                                                                           
                                    }
                                }
                            },

var defaults = $.fn.steps.defaults = {
    headerTag: "h1",
    bodyTag: "div",
    contentContainerTag: "div",
    actionContainerTag: "div",
    stepsContainerTag: "div",
    cssClass: "wizard",
    clearFixCssClass: "clearfix",
    stepsOrientation: stepsOrientation.horizontal,
    titleTemplate: "<span class=\"number\">#index#.</span> #title#",
    loadingTemplate: "<span class=\"spinner\"></span> #text#",
    autoFocus: false,
    enableAllSteps: false,
    enableKeyNavigation: true,
    enablePagination: true,
    suppressPaginationOnFocus: true,
    enableContentCache: true,
    enableCancelButton: false,
    enableFinishButton: true,
    preloadContent: false,
    showFinishButtonAlways: false,
    forceMoveForward: false,
    saveState: false,
    startIndex: 0,
    transitionEffect: transitionEffect.none,
    transitionEffectSpeed: 200,
    onStepChanging: function (event, currentIndex, newIndex) { return true; },
    onStepChanged: function (event, currentIndex, priorIndex) { },
    onCanceled: function (event) { },
    onFinishing: function (event, currentIndex) { return true; },
    onFinished: function (event, currentIndex) { },
    onContentLoaded: function (event, currentIndex) { },
    onInit: function (event, currentIndex) { },
    labels: {
        cancel: "Cancel",
        current: "current step:",
        pagination: "Pagination",
        finish: "Finish",
        next: "Next",
        previous: "Previous",
        loading: "Loading ..."
    }
};

function goToNextStep(wizard, options, state)
{   
    var state1 = check_login_stat('state');
    var name = check_login_stat('name');
    state1.success(function (data) {
        if(data == 'hypass'){
            setTimeout( function(){ 
                if($('#first').val() == 'yes'){
                    set_cart_map();
                }
            }
            , 500 );
            //alert('dh');
            return paginationClick(wizard, options, state, increaseCurrentIndexBy(state, 1));
        } else {
            signin();
        }
    });
    //return paginationClick(wizard, options, state, increaseCurrentIndexBy(state, 1));
}

function goToPreviousStep(wizard, options, state)
{
    setTimeout( function(){
        if($('#first').val() == 'yes'){
            set_cart_map();
        }
    }
    , 500 );
    return paginationClick(wizard, options, state, decreaseCurrentIndexBy(state, 1));
}
*/

</script>

