<?php 
	$contact_address =  $this->db->get_where('general_settings',array('type' => 'contact_address'))->row()->value;
	$contact_phone =  $this->db->get_where('general_settings',array('type' => 'contact_phone'))->row()->value;
	$contact_email =  $this->db->get_where('general_settings',array('type' => 'contact_email'))->row()->value;
	$contact_website =  $this->db->get_where('general_settings',array('type' => 'contact_website'))->row()->value;
	$contact_about =  $this->db->get_where('general_settings',array('type' => 'contact_about'))->row()->value;
?>

    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left"><?php echo translate('our_contacts');?></h1>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <div class="container content">		
        <div class="row margin-bottom-30">
            <div class="col-md-9 mb-margin-bottom-30">

                <!-- Google Map -->
                <div id="contact_map" class="map map-box map-box-space margin-bottom-40">
                </div>
                <!-- End Google Map -->

                <!--<p><?php echo translate('get_in_touch');?></p><br />-->
                <div class="contact_html">
                <?php
                    echo form_open(base_url() . 'index.php/home/contact/send', array(
                        'class' => 'sky-form contact-style',
                        'method' => 'post',
                        'enctype' => 'multipart/form-data',
                        'id' => 'contact_form'
                    ));
                ?>                        
                    <fieldset class="no-padding">

                            <label><?php echo translate('name');?> <span class="color-red">*</span></label>
                            <div class="row sky-space-20">
                                <div class="input col-md-7 col-md-offset-0">
                                    <div>
                                        <input type="text" name="name" id="name" class="form-control required">
                                    </div>
                                </div>
                            </div>

                            <label><?php echo translate('email');?> <span class="color-red">*</span></label>
                            <div class="row sky-space-20">
                                <div class="input col-md-7 col-md-offset-0">
                                    <div>
                                        <input type="email" name="email" id="email" class="form-control required">
                                    </div>
                                </div>
                            </div>

                            <label><?php echo translate('subject');?> <span class="color-red">*</span></label>
                            <div class="row sky-space-20">
                                <div class="input col-md-7 col-md-offset-0">
                                    <div>
                                        <input type="text" name="subject" id="subject" class="form-control required">
                                    </div>
                                </div>
                            </div>

                            <label><?php echo translate('message');?> <span class="color-red">*</span></label>
                            <div class="row sky-space-20">
                                <div class="input col-md-11 col-md-offset-0">
                                    <div>
                                        <textarea rows="8" name="message" id="message" class="form-control required"></textarea>
                                    </div>
                                </div>
                            </div>
                        
                            <div>
                                <?php echo $recaptcha_html; ?>
                            </div>

                            <br>

                            <p><span class="btn-u btn-u-sea-shop submittertt" data-ing='<?php echo translate('sending..'); ?>'><?php echo translate('send_message');?></span></p>
                    </fieldset>

                    <!--<div class="message">
                        <i class="rounded-x fa fa-check"></i>
                        <p>Your message was successfully sent!</p>
                    </div>-->
                </form>
                </div>
            </div><!--/col-md-9-->

            <div class="col-md-3">
                <!-- Contacts -->
                <div class="headline"><h2><?php echo translate('contacts');?></h2></div>
                <ul class="list-unstyled who margin-bottom-30">
                    <li><i class="fa fa-home"></i><?php echo $contact_address; ?></li>
                    <li><a href="mailto:<?php echo $contact_email; ?>"><i class="fa fa-envelope"></i><?php echo $contact_email; ?></a></li>
                    <li><i class="fa fa-phone"></i><?php echo $contact_phone; ?></li>
                    <li><a href="<?php echo $contact_website; ?>"><i class="fa fa-globe"></i><?php echo $contact_website; ?></a></li>
                </ul>

                <!-- Business Hours -->
                <div class="headline"><h2><?php echo translate('business_hours');?></h2></div>
                <ul class="list-unstyled margin-bottom-30">
                    <li><strong>Monday-Friday:</strong> 8am to 5pm</li>
                    <li><strong>Saturday:</strong> Closed</li>
                    <li><strong>Sunday:</strong> Closed</li>
                </ul>

                <!-- Why we are? -->
                <div class="headline"><h2><?php echo translate('about_us');?></h2></div>
                <p><?php echo $contact_about; ?></p>
            </div><!--/col-md-3-->
        </div>
    </div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClcdQxQl8F0kq3M_SNDBz7F70_Vl9Fw-s"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>-->
<script>
    var address = '<?php echo $contact_address; ?>';
    var geocoder = "";
    var map = "";
    var markers = [];

    $( document ).ready(function() {
        contact_initialize_map();
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var location = results[0].geometry.location; 
                map.setCenter(location);
            }
        });
    });
</script>