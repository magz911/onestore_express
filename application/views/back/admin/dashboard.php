<?php
    date_default_timezone_set('Asia/Manila');
    //$script_tz = date_default_timezone_get();

    $thisday_time = strtotime('today');
    $thismonth_time = strtotime('midnight first day of this month');
    $thisyear_time = strtotime('midnight first day of january');

    $total_stock_arr = $this->db->get_where('stock')->result_array();
    $total_sale_arr = $this->db->get_where('sale')->result_array();

    $thisday_stock = 0; 
    $thismonth_stock = 0;
    $thisyear_stock = 0;
    $total_stock = 0;
    $thisday_destroy = 0;
    $thismonth_destroy = 0;
    $thisyear_destroy = 0;
    $total_destroy = 0;
    foreach($total_stock_arr as $row){
        if(($row['sale_datetime'] >= $thisday_time) && ($row['sale_datetime'] <= time())){
            if($row['type'] == 'add'){
                $thisday_stock += $row['total'];
            }
            if($row['type'] == 'destroy'){
                if($row['reason_note'] !== 'sale'){
                    $thisday_destroy += $row['total'];
                }
            }
        }
        if(($row['sale_datetime'] >= $thismonth_time) && ($row['sale_datetime'] <= time())){
            if($row['type'] == 'add'){
                $thismonth_stock += $row['total'];
            }
            if($row['type'] == 'destroy'){
                if($row['reason_note'] !== 'sale'){
                    $thismonth_destroy += $row['total'];
                }
            }
        }
        if(($row['sale_datetime'] >= $thisyear_time) && ($row['sale_datetime'] <= time())){
            if($row['type'] == 'add'){
                $thisyear_stock += $row['total'];
            }
            if($row['type'] == 'destroy'){
                if($row['reason_note'] !== 'sale'){
                    $thisyear_destroy += $row['total'];
                }
            }
        }
        if($row['type'] == 'add'){
            $total_stock += $row['total'];
        }
        if($row['type'] == 'destroy'){
            if($row['reason_note'] !== 'sale'){
                $total_destroy += $row['total'];
            }
        }
    }
    $thisday_stock = number_format($thisday_stock, 2, '.', ','); 
    $thismonth_stock = number_format($thismonth_stock, 2, '.', ',');
    $thisyear_stock = number_format($thisyear_stock, 2, '.', ',');
    $total_stock = number_format($total_stock, 2, '.', ',');
    $thisday_destroy = number_format($thisday_destroy, 2, '.', ',');
    $thismonth_destroy = number_format($thismonth_destroy, 2, '.', ',');
    $thisyear_destroy = number_format($thismonth_destroy, 2, '.', ',');
    $total_destroy = number_format($total_destroy, 2, '.', ',');
    

    $thisday_transaction = 0;
    $thismonth_transaction = 0;
    $thisyear_transaction = 0;
    $total_transaction = 0;
    $thisday_sale = 0;
    $thismonth_sale = 0;
    $thisyear_sale = 0;
    $total_sale = 0;
    foreach($total_sale_arr as $row){
        if(($row['sale_datetime'] >= $thisday_time) && ($row['sale_datetime'] <= time())){
            $thisday_transaction++;
            $thisday_sale += $row['grand_total'];
        }
        if(($row['sale_datetime'] >= $thismonth_time) && ($row['sale_datetime'] <= time())){
            $thismonth_transaction++;
            $thismonth_sale += $row['grand_total'];
        }
        if(($row['sale_datetime'] >= $thisyear_time) && ($row['sale_datetime'] <= time())){
            $thisyear_transaction++;
            $thisyear_sale += $row['grand_total'];
        }
        $total_transaction++;
        $total_sale += $row['grand_total'];
    }
    $thisday_sale = number_format($thisday_sale, 2, '.', ',');
    $thismonth_sale = number_format($thismonth_sale, 2, '.', ',');
    $thisyear_sale = number_format($thisyear_sale, 2, '.', ',');
    $total_sale = number_format($total_sale, 2, '.', ',');
?>

<div id="content-container">	
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('dashboard'); ?></h1>
    </div>
    <div id="page-content">
        
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
                            <h3 class="panel-title"><?php echo translate('this_day_stock');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thisday_stock;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_day_destroy');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thisday_destroy;?></h2>
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
                    <div class="panel panel-bordered panel-warning" >
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
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_month_stock');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thismonth_stock;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_month_destroy');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thismonth_destroy;?></h2>
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
                    <div class="panel panel-bordered panel-warning" >
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
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_year_stock');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thisyear_stock;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('this_year_destroy');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $thisyear_destroy;?></h2>
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
                    <div class="panel panel-bordered panel-warning" >
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
                    <div class="panel panel-bordered panel-primary" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('total_HUBs');?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $this->db->get('vendor')->num_rows();?></h2>
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
                                <h2><?php echo $this->db->get('product')->num_rows();?></h2>
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