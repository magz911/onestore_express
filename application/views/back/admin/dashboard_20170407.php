<?php
    /*
    //daily
    $daily_time = time()-86400;
    $daily_stock_arr = $this->db->get_where('stock',array('datetime >= '=>$daily_time,'datetime <= '=>time()))->result_array();
    $daily_sale_arr = $this->db->get_where('sale',array('sale_datetime >= '=>$daily_time,'sale_datetime <= '=>time()))->result_array();
    $daily_stock = 0;
    foreach($daily_stock_arr as $row){
        if($row['type'] == 'add'){
            $daily_stock += $row['total'];
        }
    }
    $daily_destroy = 0;
    foreach($daily_stock_arr as $row){
        if($row['type'] == 'destroy'){
            if($row['reason_note'] !== 'sale'){
                $daily_destroy += $row['total'];
            }
        }
    }
    $daily_sale = 0;
    $daily_transaction = 0;
    foreach($daily_sale_arr as $row){
        $daily_transaction++;
        $daily_sale += $row['grand_total'];
    }

    //monthly
    $monthly_time = time()-(86400*30);
    $monthly_stock_arr = $this->db->get_where('stock',array('datetime >= '=>$monthly_time,'datetime <= '=>time()))->result_array();
    $monthly_sale_arr = $this->db->get_where('sale',array('sale_datetime >= '=>$monthly_time,'sale_datetime <= '=>time()))->result_array();
    $monthly_stock = 0;
    foreach($monthly_stock_arr as $row){
        if($row['type'] == 'add'){
            $monthly_stock += $row['total'];
        }
    }
    $monthly_destroy = 0;
    foreach($monthly_stock_arr as $row){
        if($row['type'] == 'destroy'){
            if($row['reason_note'] !== 'sale'){
                $monthly_destroy += $row['total'];
            }
        }
    }
    $monthly_sale = 0;
    $monthly_transaction = 0;
    foreach($monthly_sale_arr as $row){
        $monthly_transaction++;
        $monthly_sale += $row['grand_total'];
    }

    //total
    $total_stock_arr = $this->db->get_where('stock')->result_array();
    $total_sale_arr = $this->db->get_where('sale')->result_array();
    $total_stock = 0;
    foreach($total_stock_arr as $row){
        if($row['type'] == 'add'){
            $total_stock += $row['total'];
        }
    }
    $total_destroy = 0;
    foreach($total_stock_arr as $row){
        if($row['type'] == 'destroy'){
            if($row['reason_note'] !== 'sale'){
                $total_destroy += $row['total'];
            }
        }
    }
    $total_sale = 0;
    $total_transaction = 0;
    foreach($total_sale_arr as $row){
        $total_transaction++;
        $total_sale += $row['grand_total'];
    }*/

    /*total2*/
    $daily_time = time()-86400;
    $monthly_time = time()-(86400*30);

    $total_stock_arr = $this->db->get_where('stock')->result_array();
    $total_sale_arr = $this->db->get_where('sale')->result_array();

    $daily_stock = 0; 
    $monthly_stock = 0;
    $total_stock = 0;
    $daily_destroy = 0;
    $monthly_destroy = 0;
    $total_destroy = 0;
    foreach($total_stock_arr as $row){
        if(($row['sale_datetime'] >= $daily_time) && ($row['sale_datetime'] <= time())){
            if($row['type'] == 'add'){
                $daily_stock += $row['total'];
            }
            if($row['type'] == 'destroy'){
                if($row['reason_note'] !== 'sale'){
                    $daily_destroy += $row['total'];
                }
            }
        }
        if(($row['sale_datetime'] >= $monthly_time) && ($row['sale_datetime'] <= time())){
            if($row['type'] == 'add'){
                $monthly_stock += $row['total'];
            }
            if($row['type'] == 'destroy'){
                if($row['reason_note'] !== 'sale'){
                    $monthly_destroy += $row['total'];
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
    $daily_stock = number_format($daily_stock, 2, '.', ','); 
    $monthly_stock = number_format($monthly_stock, 2, '.', ',');
    $total_stock = number_format($total_stock, 2, '.', ',');
    $daily_destroy = number_format($daily_destroy, 2, '.', ',');
    $monthly_destroy = number_format($monthly_destroy, 2, '.', ',');
    $total_destroy = number_format($total_destroy, 2, '.', ',');
    

    $daily_transaction = 0;
    $monthly_transaction = 0;
    $total_transaction = 0;
    $daily_sale = 0;
    $monthly_sale = 0;
    $total_sale = 0;
    foreach($total_sale_arr as $row){
        if(($row['datetime'] >= $daily_time) && ($row['datetime'] <= time())){
            $daily_transaction++;
            $daily_sale += $row['grand_total'];
        }
        if(($row['datetime'] >= $monthly_time) && ($row['datetime'] <= time())){
            $monthly_transaction++;
            $monthly_sale += $row['grand_total'];
        }
        $total_transaction++;
        $total_sale += $row['grand_total'];
    }
    $daily_sale = number_format($daily_sale, 2, '.', ',');
    $monthly_sale = number_format($monthly_sale, 2, '.', ',');
    $total_sale = number_format($total_sale, 2, '.', ',');
?>

<div id="content-container">	
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('dashboard');?></h1>
    </div>
    <div id="page-content">
        
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-mint" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('daily_transaction');?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $daily_transaction;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-warning" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('daily_sale');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $daily_sale;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('daily_stock');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $daily_stock;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('daily_destroy');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $daily_destroy;?></h2>
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
                            <h3 class="panel-title"><?php echo translate('monthly_transaction');?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $monthly_transaction;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-warning" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('monthly_sale');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $monthly_sale;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('monthly_stock');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $monthly_stock;?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="panel panel-bordered panel-danger" >
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo translate('monthly_destroy');?>(<?php echo currency();?>)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-center">
                                <h2><?php echo $monthly_destroy;?></h2>
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