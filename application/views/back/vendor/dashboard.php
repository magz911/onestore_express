<?php

    date_default_timezone_set('Asia/Manila');
    //$script_tz = date_default_timezone_get();

    $thisday_time = strtotime('today');
    $thismonth_time = strtotime('midnight first day of this month');
    $thisyear_time = strtotime('midnight first day of january');

    $sess_seller_id = $this->session->userdata('vendor_id');

    $sale_arr = $this->db->get_where('sale')->result_array();

    $thisday_paid = 0;
    $thismonth_paid = 0;
    $thisyear_paid = 0;
    $total_paid = 0;
    $thisday_paid_transaction = 0;
    $thismonth_paid_transaction = 0;
    $thisyear_paid_transaction = 0;
    $total_paid_transaction = 0;

    $thisday_unpaid = 0; 
    $thismonth_unpaid = 0;
    $thisyear_unpaid = 0;
    $total_unpaid = 0;
    $thisday_unpaid_transaction = 0;
    $thismonth_unpaid_transaction = 0;
    $thisyear_unpaid_transaction = 0;
    $total_unpaid_transaction = 0;

    $thisday_sale = 0;
    $thismonth_sale = 0;
    $thisyear_sale = 0;
    $total_sale = 0;
    $thisday_sale_transaction = 0;
    $thismonth_sale_transaction = 0;
    $thisyear_sale_transaction = 0;
    $total_sale_transaction = 0;

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

        if($sale_payment_type == $payment_type || $payment_type == ''){
            if($products = $this->crud_model->cpm_is_sale_of_seller($sale_id, $sess_seller_id, $sale_product_details)){ //this wont be necessary if we go single seller per transaction
                if($this->crud_model->cpm_sale_payment_status('vendor', $sess_seller_id, $sale_payment_status) == 'fully_paid'){
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
                        $thismonth_paid_transaction++;
                        $thismonth_paid += $total;
                    }
                    if($sale_datetime >= $thisyear_time){
                        $thisyear_paid_transaction++;
                        $thisyear_paid += $total;
                    }
                    $total_paid_transaction++;
                    $total_paid += $total;
                }
                else {
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
                        $thisday_sold += $total;
                    }*/
                    if($sale_datetime >= $thismonth_time){
                        $thismonth_unpaid_transaction++;
                        $thismonth_unpaid += $total;
                    }
                    if($sale_datetime >= $thisyear_time){
                        $thisyear_unpaid_transaction++;
                        $thisyear_unpaid += $total;
                    }
                    $total_unpaid_transaction++;
                    $total_unpaid += $total;
                }
            }
        }
  
    }

    $thisday_sale = $thisday_paid + $thisday_unpaid;
    $thismonth_sale = $thismonth_paid + $thismonth_unpaid;
    $thisyear_sale = $thisyear_paid + $thisyear_unpaid;
    $total_sale = $total_paid + $total_unpaid;
    $thisday_sale_transaction = $thisday_paid_transaction + $thisday_unpaid_transaction;
    $thismonth_sale_transaction = $thismonth_paid_transaction + $thismonth_unpaid_transaction;
    $thisyear_sale_transaction = $thisyear_paid_transaction + $thisyear_unpaid_transaction;
    $total_sale_transaction = $total_paid_transaction + $total_unpaid_transaction;


    $thisday_paid = number_format($thisday_paid, 2, '.', ',');
    $thismonth_paid = number_format($thismonth_paid, 2, '.', ',');
    $thisyear_paid = number_format($thisyear_paid, 2, '.', ',');
    $total_paid = number_format($total_paid, 2, '.', ',');

    $thisday_unpaid = number_format($thisday_unpaid, 2, '.', ',');
    $thismonth_unpaid = number_format($thismonth_unpaid, 2, '.', ',');
    $thisyear_unpaid = number_format($thisyear_unpaid, 2, '.', ',');
    $total_unpaid = number_format($total_unpaid, 2, '.', ',');

    $thisday_sale = number_format($thisday_sale, 2, '.', ',');
    $thismonth_sale = number_format($thismonth__sale, 2, '.', ',');
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
                                <h2><?php echo $thismonth_sale_transaction;?></h2>
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
                                <h2><?php echo $thismonth_sale;?></h2>
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
                                <h2><?php echo $thismonth_paid;?></h2>
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
                                <h2><?php echo $thisyear_sale_transaction;?></h2>
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
                                <h2><?php echo $thisyear_sale;?></h2>
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
                                <h2><?php echo $thisyear_paid;?></h2>
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
                                <h2><?php echo $total_sale_transaction;?></h2>
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
                                <h2><?php echo $total_sale;?></h2>
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
                                <h2><?php echo $total_paid;?></h2>
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
