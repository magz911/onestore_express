<?php
/*******************************************************************************
 *                      PHP ibayad API Integration Class
 *******************************************************************************
 *      Author:     Christopher Musni
 *      Email:      christopher.musni@gmail.com
 *      Website:    http://intelmatics.com
 *
 *      File:       ibayad.class.php
 *      Version:    1.0.0
 *      Copyright:  (c) 2016 - Christopher Musni
 *                  You are free to use, distribute, and modify this software 
 *                  under the terms of the GNU General Public License.  See the
 *                  included license.txt file.
 *      
 *******************************************************************************
 *  VERION HISTORY:
 *
 *      v1.0.0 [02.09.2016] - Initial Version
 *
 *******************************************************************************
*/

class Ibayad {
    
   var $last_error;                 // holds the last error encountered
   
   var $api_log;                    // bool: log api results to text file?
   
   var $api_log_file;               // filename of the api log
   var $api_response;               // holds the api response from ibayad   
   var $api_data = array();         // array contains the POST values for api
   
   var $fields = array();           // array holds the fields to submit to ibayad

   
   function Ibayad() {
       
      // initialization constructor.  Called when class is created.
      $CI=& get_instance();
      $CI->load->database();
      $type = $CI->db->get_where('business_settings',array('type'=>'ibayad_type'))->row()->value;
      if($type == 'dev') {
         $this->ibayad_url = 'https://dev.payments.air21global.com/transaction_requests.json';
         $this->ibayad_ip = '64.49.234.95';
         $this->ibayad_userpwd = 'onestore_api:emgQs7dX';
      } else if($type == 'original') {
         $this->ibayad_url = 'https://payments.shopinas.com/transaction_requests.json';
         $this->ibayad_ip = '166.78.18.121';
         $this->ibayad_userpwd = 'onestore_api:cmUEGM2W';
      }

      $this->last_error = '';
      
      $this->api_log_file = './api_results.log';
      $this->api_log = true; 
      $this->api_response = '';
      
   }
   
   function add_field($field, $value) {
      
      // adds a key=>value pair to the fields array, which is what will be 
      // sent to ibayad as POST variables.  If the value is already in the 
      // array, it will be overwritten.
            
      $this->fields["$field"] = $value;
   }

   function submit_ibayad_post() {

      $ibayad = array();
      $ibayad_data = array();
      foreach ($this->fields as $name => $value) {
         $ibayad_data[$name] = $value;
      }
      $ibayad['TransactionRequest'] = $ibayad_data;
      $ibayad_encoded = json_encode($ibayad);

      $ch = curl_init($this->ibayad_url);
      curl_setopt_array($ch, array(
         CURLOPT_POST => TRUE,
         CURLOPT_RETURNTRANSFER => TRUE,
         CURLOPT_SSL_VERIFYPEER => FALSE,
         CURLOPT_SSL_VERIFYHOST => FALSE,
         CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
         CURLOPT_POSTFIELDS => $ibayad_encoded,
         CURLOPT_USERPWD => $this->ibayad_userpwd
      ));
        
      $res = curl_exec($ch);

      if(!$res) {
         $this->write_log('curl error');
         exit;
      }
      curl_close($ch);

      $res_decoded = json_decode($res);

      if(isset($res_decoded->paymentUrl))
         header('Location: ' . $res_decoded->paymentUrl);
         
   }

   function is_webhook() {    
      $raw_post_data = file_get_contents('php://input');
      $message_decoded = json_decode($raw_post_data);
      if(isset($message_decoded->Transaction) && (isset($message_decoded->TransactionRequest))){
         return true;
      } else {
         return false;
      }

   }

   function validate_api() {    
      $remote_server = $_SERVER['REMOTE_ADDR'];
      if($remote_server == $this->ibayad_ip){
         return true;
      } else {
         return false;
      }

   }

   /*

   function webhook_data(){
      $raw_post_data = file_get_contents('php://input');
      $message_decoded = json_decode($raw_post_data);
      return $message_decoded;
   }
   
   function validate_api() {      

      # STEP 1: Read POST data

		# reading posted data from directly from $_POST causes serialization 
		# issues with array data in POST
		# reading raw POST data from input stream instead. 
		$raw_post_data = file_get_contents('php://input');

		$raw_post_array = explode('&', $raw_post_data);
		$myPost = array();
		foreach ($raw_post_array as $keyval) 
		{
		  $keyval = explode ('=', $keyval);
		  if (count($keyval) == 2)
			 $myPost[$keyval[0]] = urldecode($keyval[1]);
		}
		# read the post from Ibayad system and add 'cmd'
		$req = 'cmd=_notify-validate';
		if(function_exists('get_magic_quotes_gpc')) 
		{
		   $get_magic_quotes_exists = true;
		} 
		foreach ($myPost as $key => $value) 
		{        
		   if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) 
		   { 
				$value = urlencode(stripslashes($value)); 
		   } 
		   else 
		   {
				$value = urlencode($value);
		   }
		   $req .= "&$key=$value";
		}
		 
		 
		# STEP 2: Post API data back to ibayad to validate
		 
		$ch = curl_init($this->ibayad_url);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
		 
		# In wamp like environments that do not come bundled with root authority certificates,
		# please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path 
		# of the certificate as shown below.
		# curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
		if( !($res = curl_exec($ch)) ) {
			curl_close($ch);
			$this->write_log('curl error');
			exit;
		}
		curl_close($ch);
		 
		
		# STEP 3: Inspect API validation result and act accordingly
		 
		if (strcmp ($res, "VERIFIED") == 0) 
		{
			return true;
			# assign posted variables to local variables
			#$uniqid 			= $_POST['custom'];
			#$item_number 		= $_POST['item_number'];
			#$payment_status 	= $_POST['payment_status'];
			#$payment_amount 	= $_POST['mc_gross'];
			#$payment_currency 	= $_POST['mc_currency'];
			#$txn_id 			= $_POST['txn_id'];
			#$txn_type 			= $_POST['txn_type'];
			#$receiver_email 	= $_POST['receiver_email'];
			#$payer_email 		= $_POST['payer_email'];
			# check whether the payment_status is Completed
			# check that txn_id has not been previously processed
			# check that receiver_email is your Primary Ibayad email
			# check that payment_amount/payment_currency are correct

			
		}
		else if (strcmp ($res, "INVALID") == 0) 
		{ 
			return false;
		}
      
   }
   
   function log_api_results($success) {
       
      if (!$this->api_log) return;  // is logging turned off?
      
      // Timestamp
      $text = '['.date('m/d/Y g:i A').'] - '; 
      
      // Success or failure being logged?
      if ($success) $text .= "SUCCESS!\n";
      else $text .= 'FAIL: '.$this->last_error."\n";
      
      // Log the POST variables
      $text .= "API POST Vars from Ibayad:\n";
      foreach ($this->api_data as $key=>$value) {
         $text .= "$key=$value, ";
      }
 
      // Log the response from the ibayad server
      $text .= "\nAPI Response from Ibayad Server:\n ".$this->api_response;
      
      // Write to log
      $fp=fopen($this->api_log_file,'a');
      fwrite($fp, $text . "\n\n"); 

      fclose($fp);  // close file
   }

   function dump_fields() {
 
      // Used for debugging, this function will output all the field/value pairs
      // that are currently defined in the instance of the class using the
      // add_field() function.
      
      echo "<h3>Ibayad->dump_fields() Output:</h3>";
      echo "<table width=\"95%\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\">
            <tr>
               <td bgcolor=\"black\"><b><font color=\"white\">Field Name</font></b></td>
               <td bgcolor=\"black\"><b><font color=\"white\">Value</font></b></td>
            </tr>"; 
      
      ksort($this->fields);
      foreach ($this->fields as $key => $value) {
         echo "<tr><td>$key</td><td>".urldecode($value)."&nbsp;</td></tr>";
      }
 
      echo "</table><br>"; 
   }
   */
}         


 
