<?php

    date_default_timezone_set('Asia/Manila');
    //$script_tz = date_default_timezone_get();

    $thisday_time = strtotime('today');
    $thismonth_time = strtotime('midnight first day of this month');
    $thisyear_time = strtotime('midnight first day of january');

    $sess_seller_id = $this->session->userdata('vendor_id');

    $sale_arr = $this->db->get_where('sale')->result_array();

    $thisday_sold = 0; 
    $thismonth_sold = 0;
    $thisyear_sold = 0;
    $total_sold = 0;
    $thisday_transaction = 0;
    $thismonth_transaction = 0;
    $thisyear_transaction = 0;
    $total_transaction = 0;
    $thisday_sale = 0;
    $thismonth_sale = 0;
    $thisyear_sale = 0;
    $total_sale = 0;

    $payment_type = '';
    foreach($sale_arr as $sale){
        $sale_id = $sale['sale_id'];
        $sale_payment_status = $sale['payment_status'];
        $sale_payment_type = $sale['payment_type'];
        $sale_product_details = $sale['product_details'];
        $sale_datetime = $sale['sale_datetime'];

        $product_price = 0;
        $tax = 0;
        $shipping = 0;
        $total = 0;

        $payment = 'fully_paid';
        if($this->crud_model->cpm_sale_payment_status('vendor', $sess_seller_id, $sale_payment_status) == $payment || $payment == ''){
            if($sale_payment_type == $payment_type || $payment_type == ''){
                if($products = $this->crud_model->cpm_is_sale_of_seller($sale_id, $sess_seller_id, $sale_product_details)){ //this wont be necessary if we go single seller per transaction
                    $products_in_sale = json_decode($sale_product_details, true);

                    foreach ($products_in_sale as $row) {
                        if(in_array($row['id'], $products)){
                            $product_price  += $row['subtotal'];
                            $tax            += $row['tax'];
                            $shipping       += $row['shipping'];
                            $total          += $row['subtotal']+$row['tax']+$row['shipping'];
                        }
                    }

                            /*if($sale_datetime >= $thisday_time){
                                $thisday_transaction++;
                                $thisday_sale += $total;
                            }*/
                            if($sale_datetime >= $thismonth_time){
                                $thismonth_transaction++;
                                $thismonth_sale += $total;
                            }
                            if($sale_datetime >= $thisyear_time){
                                $thisyear_transaction++;
                                $thisyear_sale += $total;
                            }
                            $total_transaction++;
                            $total_sale += $total;

                }
            }
        }

        $payment = '';
        if($this->crud_model->cpm_sale_payment_status('vendor', $sess_seller_id, $sale_payment_status) == $payment || $payment == ''){
            if($sale_payment_type == $payment_type || $payment_type == ''){
                if($products = $this->crud_model->cpm_is_sale_of_seller($sale_id, $sess_seller_id, $sale_product_details)){ //this wont be necessary if we go single seller per transaction
                    $products_in_sale = json_decode($sale_product_details, true);

                    foreach ($products_in_sale as $row) {
                        if(in_array($row['id'], $products)){
                            $product_price  += $row['subtotal'];
                            $tax            += $row['tax'];
                            $shipping       += $row['shipping'];
                            $total          += $row['subtotal']+$row['tax']+$row['shipping'];
                        }
                    }

                            if($sale_datetime >= $thisday_time){
                                $thisday_transaction++;
                                $thisday_sold += $total;
                            }
                            if($sale_datetime >= $thismonth_time){
                                $thismonth_transaction++;
                                $thismonth_sold += $total;
                            }
                            if($sale_datetime >= $thisyear_time){
                                $thisyear_transaction++;
                                $thisyear_sold += $total;
                            }
                            $total_transaction++;
                            $total_sold += $total;

                }
            }
        }
    }


    $thisday_sold = number_format($thisday_sold, 2, '.', ',');
    $thismonth_sold = number_format($thismonth_sold, 2, '.', ',');
    $thisyear_sold = number_format($thisyear_sold, 2, '.', ',');
    $total_sold = number_format($total_sold, 2, '.', ',');

    $thisday_sale = number_format($thisday_sale, 2, '.', ',');
    $thismonth_sale = number_format($thismonth_sale, 2, '.', ',');
    $thisyear_sale = number_format($thisyear_sale, 2, '.', ',');
    $total_sale = number_format($total_sale, 2, '.', ',');


?>
<div id="content-container">	
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('dashboard');?></h1>
    </div>
    <div id="page-content">
<!--
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-mint" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_day_transaction');?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thisday_transaction;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-warning" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_day_sale');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thisday_sale;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_day_sold');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thisday_sold;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
-->
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-mint" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_month_transaction');?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thismonth_transaction;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_month_sale');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thismonth_sold;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-warning" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_month_paid_sale');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thismonth_sale;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-primary" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('total_products');?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $this->db->get_where('product',array('added_by'=>'{"type":"vendor","id":"'. $sess_seller_id .'"}'))->num_rows(); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-mint" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_year_transaction');?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thisyear_transaction;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_year_sale');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thisyear_sold;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-warning" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_year_paid_sale');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thisyear_sale;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-primary" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('published_products');?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $this->db->get_where('product',array('added_by'=>'{"type":"vendor","id":"'.$sess_seller_id.'"}','status'=>'ok'))->num_rows(); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-mint" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('total_transaction');?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $total_transaction;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('total_sale');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $total_sold;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-warning" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('total_paid_sale');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $total_sale;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</div>


<script>
	var base_url = '<?php echo base_url(); ?>';
	var currency = '<?php echo currency(); ?>';
</script>
