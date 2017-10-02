    <?php
        $sale_details = $this->db->get_where('sale',array('sale_id'=>$sale_id))->row_array();
        if(isset($sale_details)){
            $buyer = $sale_details['buyer'];
            $user_info = $this->db->get_where('user', array('user_id' => $buyer))->row();
            $shipping_info = json_decode($sale_details['shipping_address'],true);
            $product_details = json_decode($sale_details['product_details'], true);
    ?>
    <div style="padding:5px; background:rgba(230, 126, 34, 1); color:white;">
        <center>
            <h1 class="text-center; "><?php echo translate('oneSTore.ph_invoice_paper');?></h1>
        </center>
    </div>
    <table width="100%" style="background:rgba(212, 224, 212, 0.17);">
        <tr>
            <td style="padding:10px;">
                <img src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="oneSTore.ph" width="60%">
            </td>
            <td>
                <table>
                    <tr><td><strong><?php echo translate('invoice_no');?></strong> : <?php echo $sale_details['sale_code']; ?> </td></tr>
                    <tr><td><strong><?php echo translate('date');?></strong> : <?php echo date('F j, Y',$sale_details['sale_datetime'] );?></td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding:20px;">
                <div class="tag-box tag-box-v3">
                    <h2><?php echo translate('client_information');?> :</h2>
                    <table>
                        <tr><td><strong><?php echo translate('first_name');?> :</strong> <?php echo $user_info->username; ?></td></tr>
                        <tr><td><strong><?php echo translate('last_name');?> :</strong> <?php echo $user_info->surname; ?></td></tr>
                        <tr><td><strong><?php echo translate('email');?> :</strong> <?php echo $user_info->email; ?></td></tr>
                        <tr><td><strong><?php echo translate('phone');?> :</strong> <?php echo $user_info->phone; ?></td></tr>
                        <tr><td><strong><?php echo translate('address1');?> :</strong> <?php echo $user_info->address1; ?></td></tr>
                        <tr><td><strong><?php echo translate('address2');?> :</strong> <?php echo $user_info->address2; ?></td></tr>
                        <tr><td><strong><?php echo translate('city');?> :</strong> <?php echo $user_info->city; ?></td></tr>
                    </table>
                </div>        
            </td>
            <td>
                <div class="tag-box tag-box-v3">
                    <h2><?php echo translate('shipping_information');?> :</h2>  
                    <table> 
                        <tr><td><strong><?php echo translate('first_name');?> :</strong> <?php echo $shipping_info['firstname']; ?></td></tr>
                        <tr><td><strong><?php echo translate('last_name');?> :</strong> <?php echo $shipping_info['lastname']; ?></td></tr>
                        <tr><td><strong><?php echo translate('email');?> :</strong> <?php echo $shipping_info['email']; ?></td></tr>
                        <tr><td><strong><?php echo translate('phone');?> :</strong> <?php echo $shipping_info['phone']; ?></td></tr>
                        <tr><td><strong><?php echo translate('address');?> :</strong> <?php echo $shipping_info['address1']; ?></td></tr>
                        <tr><td><strong><?php echo translate('city');?> :</strong> <?php echo $shipping_info['city']; ?></td></tr>
                        <tr><td><strong><?php echo translate('ZIP');?> :</strong> <?php echo $shipping_info['zip']; ?></td></tr>  
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td style="background:rgba(212, 224, 212, 0.72); text-align:center;" colspan="2">
                <h3><?php echo translate('invoice_details');?></h3>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:0px;">
            <table width="100%">
                <thead>
                    <tr>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)">#</th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('option');?></th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('item');?></th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('quantity');?></th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('unit_cost');?></th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('total');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i =0; $total = 0;
                        foreach ($product_details as $row1) {
                            $i++;
                    ?>
                        <tr>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo $i; ?></td>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)">
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
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo $row1['name']; ?></td>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo $row1['qty']; ?></td>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo currency().$this->cart->format_number($row1['price']); ?></td>
                            <td style="padding: 5px;text-align:right;background:rgba(128, 128, 128, 0.18)"><?php echo currency().$this->cart->format_number($row1['subtotal']); $total += $row1['subtotal']; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <td>
        </tr>
        <tr>
            <td style="padding:20px;">
                <div class="tag-box tag-box-v3">
                    <h2><?php echo translate('payment_details');?> :</h2>
                    <table>
                        <tr><td><strong><?php echo translate('payment_status');?> :</strong> <i><?php echo translate($this->crud_model->sale_payment_status($sale_details['sale_id'])); ?></i></td></tr>
                        <tr><td><strong><?php echo translate('payment_method');?> :</strong> <?php echo ucfirst(str_replace('_', ' ', $shipping_info['payment_type'])); ?></td></tr>  
                        <tr><td><strong><?php echo translate('payment_date');?> :</strong> <?php echo date('F j, Y',$sale_details['sale_datetime'] ); ?></td></tr>  
                    </table>
                </div>        
            </td>
            <td>
                <div class="tag-box tag-box-v3">
                    <table> 
                        <tr><td><strong><?php echo translate('sub_total_amount');?> :</strong> <?php echo currency().$this->cart->format_number($total);?></td></tr>
                        <tr><td><strong><?php echo translate('tax');?> :</strong> <?php echo currency().$this->cart->format_number($sale_details['vat']);?></td></tr>
                        <tr><td><strong><?php echo translate('shipping');?> :</strong> <?php echo currency().$this->cart->format_number($sale_details['shipping']);?></td></tr>
                        <tr><td><strong><?php echo translate('grand_total');?> :</strong> <?php echo currency().$this->cart->format_number($sale_details['grand_total']);?></td></tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <?php
        }
    ?>