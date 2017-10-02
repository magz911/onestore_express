    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left"><?php echo translate('invoice');?></h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container content invoice_div">
    <?php
        $sale_details = $this->db->get_where('sale',array('sale_id'=>$sale_id))->row_array();
    ?>
        <!--Invoice Header-->
        <div class="row invoice-header">
            <div class="col-xs-6">
                <img src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="Product Invoice" width="60%">
            </div>
            <div class="col-xs-6 invoice-numb">
            	<ul class="list-unstyled">
                    <li><strong><?php echo translate('invoice_no');?></strong> : <?php echo $sale_details['sale_code']; ?> </li>
                    <li><strong><?php echo translate('date');?></strong> : <?php echo date('F j, Y',$sale_details['sale_datetime'] );?></li>
                </ul>
            </div>
        </div>
        <!--End Invoice Header-->

        <!--Invoice Details-->
        <div class="row invoice-info">
            <div class="col-xs-6">
                <div class="tag-box tag-box-v4">
                    <?php
                        $shipping_info = json_decode($sale_details['shipping_address'],true);
                    ?>
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
            <!--<div class="col-xs-6">
                <div class="tag-box tag-box-v4">
                    <h2><?php echo translate('payment_details');?> :</h2>  
                    <ul class="list-unstyled">       
                        <li><strong><?php echo translate('payment_status');?> :</strong> <i><?php echo translate($this->crud_model->sale_payment_status($sale_details['sale_id'])); ?></i></li>
                        <li><strong><?php echo translate('payment_method');?> :</strong> <?php echo ucfirst(str_replace('_', ' ', $shipping_info['payment_type'])); ?></li>  
                    </ul>
                </div>
            </div>-->
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
                        $product_details = json_decode($sale_details['product_details'], true);
                        $i =0;
                        $total = 0;
                        foreach ($product_details as $row1) {
                            $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row1['name']; ?></td>
                            <td>
                                <?php 
                                    $option = json_decode($row1['option'],true);
                                    foreach ($option as $l => $op) {
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
                        <li><strong><?php echo translate('payment_status');?> :</strong> <i><?php echo translate($this->crud_model->sale_payment_status($sale_details['sale_id'])); ?></i></li>
                        <li><strong><?php echo translate('payment_method');?> :</strong> <?php echo ucfirst(str_replace('_', ' ', $shipping_info['payment_type'])); ?></li>  
                        <li><strong><?php echo translate('payment_date');?> :</strong> <?php echo date('F j, Y',$sale_details['sale_datetime'] ); ?></li>  
                    </ul>
                </div>
            </div>
            <!--<div class="col-xs-6">
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
            </div>-->
            <div class="col-xs-6 text-right">
                <div class="tag-box tag-box-v4">
                    <ul class="list-unstyled invoice-total-info">
                        <li><strong><?php echo translate('sub_total_amount');?> :</strong> <?php echo currency().$this->cart->format_number($total);?></li>
                        <li><strong><?php echo translate('tax');?> :</strong> <?php echo currency().$this->cart->format_number($sale_details['vat']);?></li>
                        <li><strong><?php echo translate('shipping');?> :</strong> <?php echo currency().$this->cart->format_number($sale_details['shipping']);?></li>
                        <li><strong><?php echo translate('grand_total');?> :</strong> <?php echo currency().$this->cart->format_number($sale_details['grand_total']);?></li>
                    </ul>
                </div>
                <button class="btn-u sm-margin-bottom-10" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?php echo translate('print');?></button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div id="invoice_map" class="map map-box map-box-space">
                </div>
                <!--<div class="" style="height:300px;" id="mapa"></div>-->
            </div>
        </div>    
        <!--End Invoice Footer-->
    </div><!--/container-->     
    <!--=== End Content Part ===-->


        <style type="text/css">
            @media print {
                .shop-subscribe{
                    display: none;
                }
                #invoice_map{
                    display: none;
                }
                .invoice_div{
                    display: block !important;
                }
            }
        </style>

        <?php
            $position = explode(',',str_replace('(', '', str_replace(')', '',$shipping_info['langlat'])));
        ?>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClcdQxQl8F0kq3M_SNDBz7F70_Vl9Fw-s"></script>
        <script>
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
                content: '<p>Marker Location:</p><p><?php echo $shipping_info['address1']; ?> </p><p>City: <?php echo $shipping_info['city']; ?> </p><p>ZIP: <?php echo $shipping_info['zip']; ?> </p>'
              });
              google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
              });
            }
            google.maps.event.addDomListener(window, 'load', initialize);

        </script>