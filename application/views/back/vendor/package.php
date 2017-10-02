<div id="content-container"> 
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('upgrade_membership');?></h1>
    </div>
    <div class="tab-base">
        <div class="panel">
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="" style="border:1px solid #ebebeb; border-radius:4px;">
                <?php
                    $membership    = $this->db->get_where('vendor', array(
                        'vendor_id' => $this->session->userdata('vendor_id')
                    ))->row()->membership;
                    echo form_open(base_url() . 'index.php/vendor/package/upgrade/', array(
                        'class'     => 'form-horizontal',
                        'method'    => 'post',
                        'id'        => 'upgrade_form',
                        'enctype'   => 'multipart/form-data'
                    ));
                ?>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo translate('product');?></label>
                            <div class="col-sm-6">
                                <select name="membership" id="type" class="demo-chosen-select" onchange="get_membership_info(this.value)">
                                    <option value="0" 
                                        <?php
                                            $e_match = $membership;
                                            if ($e_match == 0) {
                                                $e_match = 'free';
                                            }
                                            if ($e_match == 0) {
                                                echo 'selected="selected"';
                                            } 
                                        ?> >
                                        <?php echo translate('default');?>
                                    </option> 
                                    <?php
                                        $memberships = $this->db->get('membership')->result_array();
                                        foreach ($memberships as $row1) {
                                    ?>
                                    <option value="<?php echo $row1['membership_id']; ?>" 
                                        <?php if ($row1['membership_id'] == $e_match) {
                                            echo 'selected="selected"';
                                        } ?> >
                                        <?php echo $row1['title']; ?>
                                    </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo translate('details');?></label>
                            <div class="col-sm-6" id="mem_info">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo translate('payment_method');?></label>
                            <div class="col-sm-6">
                                <select name="method" class="demo-chosen-select">
                                <?php if($this->db->get_where('business_settings',array('type'=>'paypal_set'))->row()->value == 'ok'){ ?>
                                    <option value="paypal" >PayPal</option>
                                <?php } ?>
                                    <option value="cash" >Cash</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-6">
                                <span id='verify'></span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button class="btn btn-info" >
                            <?php echo translate('upgrade');?>
                        </button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="display:none;" id="business"></div>
<script>
	var base_url = '<?php echo base_url(); ?>';
	var user_type = 'vendor';
	var module = 'logo_settings';
	var list_cont_func = 'show_all';
	var dlt_cont_func = 'delete_logo';

    function get_membership_info(id){
        $('#mem_info').load('<?php echo base_url(); ?>index.php/vendor/business_settings/membership_info/'+id);
    }
    $(document).ready(function(){
        get_membership_info(<?php echo $membership; ?>);
    });

</script>
<script src="<?php echo base_url(); ?>template/back/js/custom/business.js"></script>
