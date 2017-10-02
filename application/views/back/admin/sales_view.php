<style>
@media print {
    #navbar,
    #mainnav-container,
    #footer,
    #scroll-top,
    #page-title,
    .print_btn,
    #invoice_map{
        display: none;
    }
    .print{
        width: 100%;
        border-style: none !important;
    }
}

/*Invoice Page
------------------------------------*/
@media print {
    * { -webkit-print-color-adjust: exact; }
    
    .btn-u,
    .header,
    .footer-v1, 
    .breadcrumbs,
    #topcontrol {
        display: none; 
    }

    .panel {
        border: none;
    }
}

/*Invoice Header*/
.invoice-header {
    color: #555;
    overflow: hidden;
    margin-bottom: 40px;
}

.invoice-header h2 {
    font-size: 30px;
}

.invoice-header .invoice-numb {
    font-size: 16px;
    text-align: right;
}

.invoice-header .invoice-numb span {
    color: 777;
    display: block;
    font-size: 13px;
}

/*Invoice Info*/
.invoice-info {
    margin-bottom: 10px;
}

.invoice-info h2 {
    color: #555;
    font-size: 18px;
}

/*Invoice Footer*/
address {
    line-height: 20px;
}

.invoice-total-info {
    margin-bottom: 30px;
}

.invoice-total-info li {
    font-size: 14px;
    margin-bottom: 5px;
    /*font-family: 'Open Sans'; */
}

/*Tag Boxes
------------------------------------*/
.tag-box  {
  padding: 20px;
  background: #fff;
  margin-bottom: 30px;
}

.tag-box h2 {
  font-size: 20px;
  line-height: 25px;
}

.tag-box.tag-text-space p {
  margin-bottom: 10px;
}

/*Tag Boxes v4*/
.tag-box-v4 {
  border: dashed 1px #bbb;
}
</style>

<?php
    if(isset($sale)){
        $buyer = $sale['buyer'];
        $user_info = $this->db->get_where('user', array('user_id' => $buyer))->row();
        $product_details = json_decode($sale['product_details'], true);
        $shipping_info = json_decode($sale['shipping_address'],true);
?>
<div class="panel-heading">
    <div class="panel-control" style="float: left;">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#full"><?php echo translate('full_invoice'); ?></a>
            </li>
            <?php
                if($this->crud_model->is_admin_in_sale($sale['sale_id'])){
            ?>
            <li>
                <a data-toggle="tab" href="#quart"><?php echo translate('invoice_for'); ?>: <?php echo translate('admin'); ?></a>
            </li>
            <?php
                }
            ?>
            <?php
                $vendors = $this->crud_model->vendors_in_sale($sale['sale_id']);
                foreach ($vendors as $ven) {
            ?>
            <li>
                <a data-toggle="tab" href="#half_<?php echo $ven; ?>"><?php echo translate('invoice_for'); ?>: <?php echo $this->crud_model->get_type_name_by_id('vendor', $ven, 'display_name'); ?> (<?php echo translate('vendor'); ?>)</a>
            </li>
            <?php
                }
            ?>
        </ul>
    </div>
</div>

<div class="panel-body ">
    <div class="tab-base"> 

        <div class="col-md-2"></div>
        <div class="col-md-8 bordered print">
            <div class="tab-content">
                <div id="full" class="tab-pane fade active in">

                    <div class="row invoice_div">
                        <!--Invoice Header-->
                        <div class="row invoice-header">
                            <div class="col-xs-6">
                                <img src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="Product Invoice" width="60%">
                            </div>
                            <div class="col-xs-6 invoice-numb">
                                <ul class="list-unstyled">
                                    <li><strong><?php echo translate('invoice_no');?></strong> : <?php echo $sale['sale_code'];?></li>
                                    <li><strong><?php echo translate('date');?></strong> : <?php echo date('F j, Y',$sale['sale_datetime'] );?></li>
                                </ul>
                            </div>
                        </div>
                        <!--End Invoice Header-->

                        <!--Invoice Details-->
                        <div class="row invoice-info">
                            <div class="col-xs-6">
                                <div class="tag-box tag-box-v4">
                                    <h2><?php echo translate('client_information');?> :</h2>
                                    <ul class="list-unstyled">
                                        <li><strong><?php echo translate('first_name');?> :</strong> <?php echo $user_info->username; ?></li>
                                        <li><strong><?php echo translate('last_name');?> :</strong> <?php echo $user_info->surname; ?></li>
                                        <li><strong><?php echo translate('email');?> :</strong> <?php echo $user_info->email; ?></li>
                                        <li><strong><?php echo translate('phone');?> :</strong> <?php echo $user_info->phone; ?></li>
                                        <li><strong><?php echo translate('address1');?> :</strong> <?php echo $user_info->address1; ?></li>
                                        <li><strong><?php echo translate('address2');?> :</strong> <?php echo $user_info->address2; ?></li>
                                        <li><strong><?php echo translate('city');?> :</strong> <?php echo $user_info->city; ?></li>
                                    </ul>
                                </div>        
                            </div>
                            <div class="col-xs-6">
                                <div class="tag-box tag-box-v4">
                                    <h2><?php echo translate('shipping_information');?> :</h2>
                                    <ul class="list-unstyled">
                                        <li><strong><?php echo translate('first_name');?> :</strong> <?php echo $shipping_info['firstname']; ?></li>
                                        <li><strong><?php echo translate('last_name');?> :</strong> <?php echo $shipping_info['lastname']; ?></li>
                                        <li><strong><?php echo translate('email');?> :</strong> <?php echo $shipping_info['email']; ?></li>
                                        <li><strong><?php echo translate('phone');?> :</strong> <?php echo $shipping_info['phone']; ?></li>
                                        <li><strong><?php echo translate('address');?> :</strong> <?php echo $shipping_info['address1']; ?></li>
                                        <li><strong><?php echo translate('city');?> :</strong> <?php echo $shipping_info['city']; ?></li>
                                        <li><strong><?php echo translate('ZIP');?> :</strong> <?php echo $shipping_info['zip']; ?></li>
                                    </ul>
                                </div>            
                            </div>
                        </div>
                        <!--End Invoice Detials-->

                        <!--Invoice Table-->
                        <div class="panel panel-default margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('invoice_details');?></h3>
                            </div>
                            <table class="table table-striped invoice-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo translate('item');?></th>
                                        <th><?php echo translate('options');?></th>
                                        <th><?php echo translate('quantity');?></th>
                                        <th><?php echo translate('unit_cost');?></th>
                                        <th><?php echo translate('total');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i =0; $total = 0;
                                        foreach ($product_details as $row1) {
                                            $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row1['name']; ?></td>
                                            <td>
                                                <?php 
                                                    $all_o = json_decode($row1['option'],true);
                                                    $color = $all_o['color']['value'];
                                                        if($color){
                                                ?>
                                                <div style="background:<?php echo $color; ?>; height:25px; width:25px;" ></div>
                                                <?php
                                                    }
                                                ?>
                                                <?php
                                                    foreach ($all_o as $l => $op) {
                                                        if($l !== 'color' && $op['value'] !== '' && $op['value'] !== NULL){
                                                ?>
                                                    <?php echo $op['title'] ?> : 
                                                    <?php 
                                                        if(is_array($va = $op['value'])){ 
                                                            echo $va = join(', ',$va); 
                                                        } else {
                                                            echo $va;
                                                        }
                                                    ?>
                                                    <br>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $row1['qty']; ?></td>
                                            <td style="text-align:center;"><?php echo currency().$this->cart->format_number($row1['price']); ?></td>
                                            <td style="text-align:right;"><?php echo currency().$this->cart->format_number($row1['subtotal']); $total += $row1['subtotal']; ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!--End Invoice Table-->

                        <!--Invoice Footer-->
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="tag-box tag-box-v4">
                                    <h2><?php echo translate('payment_details');?> :</h2>  
                                    <ul class="list-unstyled">       
                                        <li><strong><?php echo translate('payment_status');?> :</strong> <i><?php echo translate($this->crud_model->sale_payment_status($sale['sale_id'])); ?></i></li>
                                        <li><strong><?php echo translate('payment_method');?> :</strong> <?php echo ucfirst(str_replace('_', ' ', $shipping_info['payment_type'])); ?></li>  
                                        <li><strong><?php echo translate('payment_date');?> :</strong> <?php echo date('F j, Y',$sale['sale_datetime'] ); ?></li>  
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xs-6 text-right">
                                <div class="tag-box tag-box-v4">
                                    <ul class="list-unstyled invoice-total-info">
                                        <li><strong><?php echo translate('sub_total_amount');?> :</strong> <?php echo currency().$this->cart->format_number($total);?></li>
                                        <li><strong><?php echo translate('tax');?> :</strong> <?php echo currency().$this->cart->format_number($sale['vat']);?></li>
                                        <li><strong><?php echo translate('shipping');?> :</strong> <?php echo currency().$this->cart->format_number($sale['shipping']);?></li>
                                        <li><strong><?php echo translate('grand_total');?> :</strong> <?php echo currency().$this->cart->format_number($sale['grand_total']);?></li>
                                    </ul>
                                </div>
                                <span class="btn btn-success btn-md btn-labeled fa fa-print margin-top-10 print_btn" onclick="print()"><?php echo translate('print');?></span>
                            </div>
                        </div>
                        <!--End Invoice Footer-->

                    </div>
                </div>


                <?php
                    foreach ($vendors as $ven) {
                ?>
                <div id="half_<?php echo $ven; ?>" class="tab-pane fade">

                    <div class="row invoice_div">
                        <!--Invoice Header-->
                        <div class="row invoice-header">
                            <div class="col-xs-6">
                                <img src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="Product Invoice" width="60%">
                            </div>
                            <div class="col-xs-6 invoice-numb">
                                <ul class="list-unstyled">
                                    <li><strong><?php echo translate('invoice_no');?></strong> : <?php echo $sale['sale_code'];?>/<?php echo $ven;?></li>
                                    <li><strong><?php echo translate('date');?></strong> : <?php echo date('F j, Y',$sale['sale_datetime'] );?></li>
                                </ul>
                            </div>
                        </div>
                        <!--End Invoice Header-->

                        <!--Invoice Details-->
                        <div class="row invoice-info">
                            <div class="col-xs-6">
                                <div class="tag-box tag-box-v4">
                                    <h2><?php echo translate('client_information');?> :</h2>
                                    <ul class="list-unstyled">
                                        <li><strong><?php echo translate('first_name');?> :</strong> <?php echo $user_info->username; ?></li>
                                        <li><strong><?php echo translate('last_name');?> :</strong> <?php echo $user_info->surname; ?></li>
                                        <li><strong><?php echo translate('email');?> :</strong> <?php echo $user_info->email; ?></li>
                                        <li><strong><?php echo translate('phone');?> :</strong> <?php echo $user_info->phone; ?></li>
                                        <li><strong><?php echo translate('address1');?> :</strong> <?php echo $user_info->address1; ?></li>
                                        <li><strong><?php echo translate('address2');?> :</strong> <?php echo $user_info->address2; ?></li>
                                        <li><strong><?php echo translate('city');?> :</strong> <?php echo $user_info->city; ?></li>
                                    </ul>
                                </div>        
                            </div>
                            <div class="col-xs-6">
                                <div class="tag-box tag-box-v4">
                                    <h2><?php echo translate('shipping_information');?> :</h2>
                                    <ul class="list-unstyled">
                                        <li><strong><?php echo translate('first_name');?> :</strong> <?php echo $shipping_info['firstname']; ?></li>
                                        <li><strong><?php echo translate('last_name');?> :</strong> <?php echo $shipping_info['lastname']; ?></li>
                                        <li><strong><?php echo translate('email');?> :</strong> <?php echo $shipping_info['email']; ?></li>
                                        <li><strong><?php echo translate('phone');?> :</strong> <?php echo $shipping_info['phone']; ?></li>
                                        <li><strong><?php echo translate('address');?> :</strong> <?php echo $shipping_info['address1']; ?></li>
                                        <li><strong><?php echo translate('city');?> :</strong> <?php echo $shipping_info['city']; ?></li>
                                        <li><strong><?php echo translate('ZIP');?> :</strong> <?php echo $shipping_info['zip']; ?></li>
                                    </ul>
                                </div>            
                            </div>
                        </div>
                        <!--End Invoice Detials-->

                        <!--Invoice Table-->
                        <div class="panel panel-default margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('invoice_details');?></h3>
                            </div>
                            <table class="table table-striped invoice-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo translate('item');?></th>
                                        <th><?php echo translate('options');?></th>
                                        <th><?php echo translate('quantity');?></th>
                                        <th><?php echo translate('unit_cost');?></th>
                                        <th><?php echo translate('total');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i =0; $total = 0; $vat = 0; $shipping = 0;
                                        foreach ($product_details as $row1) {
                                            if($this->crud_model->is_added_by('product',$row1['id'],$ven)){
                                            $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row1['name']; ?></td>
                                        <td>
                                            <?php 
                                                $all_o = json_decode($row1['option'],true);
                                                $color = $all_o['color']['value'];
                                                    if($color){
                                            ?>
                                            <div style="background:<?php echo $color; ?>; height:25px; width:25px;" ></div>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                foreach ($all_o as $l => $op) {
                                                    if($l !== 'color' && $op['value'] !== '' && $op['value'] !== NULL){
                                            ?>
                                                <?php echo $op['title'] ?> : 
                                                <?php 
                                                    if(is_array($va = $op['value'])){ 
                                                        echo $va = join(', ',$va); 
                                                    } else {
                                                        echo $va;
                                                    }
                                                ?>
                                                <br>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $row1['qty']; ?></td>
                                        <td style="text-align:center;"><?php echo currency().$this->cart->format_number($row1['price']); ?></td>
                                        <td style="text-align:right;"><?php echo currency().$this->cart->format_number($row1['subtotal']); $total += $row1['subtotal']; ?></td>
                                        <?php
                                            $vat += $row1['tax'];
                                            $shipping += $row1['shipping'];
                                        ?>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!--End Invoice Table-->

                        <!--Invoice Footer-->
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="tag-box tag-box-v4">
                                    <h2><?php echo translate('payment_details');?> :</h2>  
                                    <ul class="list-unstyled">       
                                        <li><strong><?php echo translate('payment_status');?> :</strong> <i><?php echo translate($this->crud_model->sale_payment_status($sale['sale_id'],'vendor',$ven)); ?></i></li>
                                        <li><strong><?php echo translate('payment_method');?> :</strong> <?php echo ucfirst(str_replace('_', ' ', $shipping_info['payment_type'])); ?></li>  
                                        <li><strong><?php echo translate('payment_date');?> :</strong> <?php echo date('F j, Y',$sale['sale_datetime'] ); ?></li>  
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xs-6 text-right">
                                <div class="tag-box tag-box-v4">
                                    <ul class="list-unstyled invoice-total-info">
                                        <li><strong><?php echo translate('sub_total_amount');?> :</strong> <?php echo currency().$this->cart->format_number($total);?></li>
                                        <li><strong><?php echo translate('tax');?> :</strong> <?php echo currency().$this->cart->format_number($vat);?></li>
                                        <li><strong><?php echo translate('shipping');?> :</strong> <?php echo currency().$this->cart->format_number($shipping);?></li>
                                        <li><strong><?php echo translate('grand_total');?> :</strong> <?php echo currency().$this->cart->format_number($total+$vat+$shipping);?></li>
                                    </ul>
                                </div>
                                <span class="btn btn-success btn-md btn-labeled fa fa-print margin-top-10 print_btn" onclick="print()"><?php echo translate('print');?></span>
                            </div>
                        </div>
                        <!--End Invoice Footer-->

                    </div>
                </div>
                <?php
                    }
                ?>


                <div id="quart" class="tab-pane fade">
                    <div class="row invoice_div">

                        <!--Invoice Header-->
                        <div class="row invoice-header">
                            <div class="col-xs-6">
                                <img src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="Product Invoice" width="60%">
                            </div>
                            <div class="col-xs-6 invoice-numb">
                                <ul class="list-unstyled">
                                    <li><strong><?php echo translate('invoice_no');?></strong> : <?php echo $sale['sale_code'];?>/A</li>
                                    <li><strong><?php echo translate('date');?></strong> : <?php echo date('F j, Y',$sale['sale_datetime'] );?></li>
                                </ul>
                            </div>
                        </div>
                        <!--End Invoice Header-->

                        <!--Invoice Details-->
                        <div class="row invoice-info">
                            <div class="col-xs-6">
                                <div class="tag-box tag-box-v4">
                                    <h2><?php echo translate('client_information');?> :</h2>
                                    <ul class="list-unstyled">
                                        <li><strong><?php echo translate('first_name');?> :</strong> <?php echo $user_info->username; ?></li>
                                        <li><strong><?php echo translate('last_name');?> :</strong> <?php echo $user_info->surname; ?></li>
                                        <li><strong><?php echo translate('email');?> :</strong> <?php echo $user_info->email; ?></li>
                                        <li><strong><?php echo translate('phone');?> :</strong> <?php echo $user_info->phone; ?></li>
                                        <li><strong><?php echo translate('address1');?> :</strong> <?php echo $user_info->address1; ?></li>
                                        <li><strong><?php echo translate('address2');?> :</strong> <?php echo $user_info->address2; ?></li>
                                        <li><strong><?php echo translate('city');?> :</strong> <?php echo $user_info->city; ?></li>
                                    </ul>
                                </div>        
                            </div>
                            <div class="col-xs-6">
                                <div class="tag-box tag-box-v4">
                                    <h2><?php echo translate('shipping_information');?> :</h2>
                                    <ul class="list-unstyled">
                                        <li><strong><?php echo translate('first_name');?> :</strong> <?php echo $shipping_info['firstname']; ?></li>
                                        <li><strong><?php echo translate('last_name');?> :</strong> <?php echo $shipping_info['lastname']; ?></li>
                                        <li><strong><?php echo translate('email');?> :</strong> <?php echo $shipping_info['email']; ?></li>
                                        <li><strong><?php echo translate('phone');?> :</strong> <?php echo $shipping_info['phone']; ?></li>
                                        <li><strong><?php echo translate('address');?> :</strong> <?php echo $shipping_info['address1']; ?></li>
                                        <li><strong><?php echo translate('city');?> :</strong> <?php echo $shipping_info['city']; ?></li>
                                        <li><strong><?php echo translate('ZIP');?> :</strong> <?php echo $shipping_info['zip']; ?></li>
                                    </ul>
                                </div>            
                            </div>
                        </div>
                        <!--End Invoice Detials-->

                        <!--Invoice Table-->
                        <div class="panel panel-default margin-bottom-40">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo translate('invoice_details');?></h3>
                            </div>
                            <table class="table table-striped invoice-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?php echo translate('item');?></th>
                                        <th><?php echo translate('options');?></th>
                                        <th><?php echo translate('quantity');?></th>
                                        <th><?php echo translate('unit_cost');?></th>
                                        <th><?php echo translate('total');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i =0; $total = 0; $vat = 0; $shipping = 0;
                                        foreach ($product_details as $row1) {
                                            if($this->crud_model->is_added_by('product',$row1['id'],0,'admin')){
                                            $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row1['name']; ?></td>
                                        <td>
                                            <?php 
                                                $all_o = json_decode($row1['option'],true);
                                                $color = $all_o['color']['value'];
                                                    if($color){
                                            ?>
                                            <div style="background:<?php echo $color; ?>; height:25px; width:25px;" ></div>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                foreach ($all_o as $l => $op) {
                                                    if($l !== 'color' && $op['value'] !== '' && $op['value'] !== NULL){
                                            ?>
                                                <?php echo $op['title'] ?> : 
                                                <?php 
                                                    if(is_array($va = $op['value'])){ 
                                                        echo $va = join(', ',$va); 
                                                    } else {
                                                        echo $va;
                                                    }
                                                ?>
                                                <br>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $row1['qty']; ?></td>
                                        <td style="text-align:center;"><?php echo currency().$this->cart->format_number($row1['price']); ?></td>
                                        <td style="text-align:right;"><?php echo currency().$this->cart->format_number($row1['subtotal']); $total += $row1['subtotal']; ?></td>
                                        <?php
                                            $vat += $row1['tax'];
                                            $shipping += $row1['shipping'];
                                        ?>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!--End Invoice Table-->

                        <!--Invoice Footer-->
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="tag-box tag-box-v4">
                                    <h2><?php echo translate('payment_details');?> :</h2>  
                                    <ul class="list-unstyled">       
                                        <li><strong><?php echo translate('payment_status');?> :</strong> <i><?php echo translate($this->crud_model->sale_payment_status($sale['sale_id'],'admin')); ?></i></li>
                                        <li><strong><?php echo translate('payment_method');?> :</strong> <?php echo ucfirst(str_replace('_', ' ', $shipping_info['payment_type'])); ?></li>  
                                        <li><strong><?php echo translate('payment_date');?> :</strong> <?php echo date('F j, Y',$sale['sale_datetime'] ); ?></li>  
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xs-6 text-right">
                                <div class="tag-box tag-box-v4">
                                    <ul class="list-unstyled invoice-total-info">
                                        <li><strong><?php echo translate('sub_total_amount');?> :</strong> <?php echo currency().$this->cart->format_number($total);?></li>
                                        <li><strong><?php echo translate('tax');?> :</strong> <?php echo currency().$this->cart->format_number($vat);?></li>
                                        <li><strong><?php echo translate('shipping');?> :</strong> <?php echo currency().$this->cart->format_number($shipping);?></li>
                                        <li><strong><?php echo translate('grand_total');?> :</strong> <?php echo currency().$this->cart->format_number($total+$vat+$shipping);?></li>
                                    </ul>
                                </div>
                                <span class="btn btn-success btn-md btn-labeled fa fa-print margin-top-10 print_btn" onclick="print()"><?php echo translate('print');?></span>
                            </div>
                        </div>
                        <!--End Invoice Footer-->
                    </div>
                </div>

            </div>
            <div class="row" style="height:300px;" id="invoice_map"></div>
        </div>
        <div class="col-md-2"></div>
    </div>

</div>

<?php
    $position = explode(',',str_replace('(', '', str_replace(')', '',$shipping_info['langlat'])));
?>
        
<script>
	$.getScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyClcdQxQl8F0kq3M_SNDBz7F70_Vl9Fw-s&callback=MapApiLoaded", function () {});
	function MapApiLoaded() {
		var map;
		function initialize() {
		  var mapOptions = {
			zoom: 16,
			center: {lat: <?php echo $position[0]; ?>, lng: <?php echo $position[1]; ?>}
		  };
		  map = new google.maps.Map(document.getElementById('invoice_map'),
			  mapOptions);
	
		  var marker = new google.maps.Marker({
			position: {lat: <?php echo $position[0]; ?>, lng: <?php echo $position[1]; ?>},
			map: map
		  });
	
		  var infowindow = new google.maps.InfoWindow({
			content: '<p><?php echo translate('marker_location'); ?>:</p><p><?php echo $shipping_info['address1']; ?> </p><p><?php echo translate('city'); ?>: <?php echo $shipping_info['city']; ?> </p><p><?php echo translate('ZIP'); ?>: <?php echo $shipping_info['zip']; ?> </p>'
		  });
		  google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map, marker);
		  });
		}
		initialize();
	}
</script>

<?php
	}
?>
