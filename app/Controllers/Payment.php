<?php

namespace App\Controllers;

use App\Models\PaymentModel;

class Payment extends AppBase{

	protected $paymentModel;

    function __construct(){
        $this->paymentModel = new PaymentModel;
    }
	
	public function index(){
		$purchase_info = trim($_POST['purchase_info']);
		$contact_number = trim($_POST['contact_number']);
		$payable_amount = trim($_POST['payable_amount']);
		$gst_type = trim($_POST['gst_type']);
		$gst_value = trim($_POST['gst_value']);
		$gst_added = trim($_POST['gst_added']);
		$payment_gross = trim($_POST['payment_gross']);
		$from = trim($_POST['from']);
		$redirectUrl = base_url().'/paynow';
		if($from == 'with-gst'){
			$redirectUrl = base_url().'/paynow?tb=2b';
		}

		$currency_code = 'INR';
		if(isset($_POST['currency_code'])){
			$currency_code = $_POST['currency_code'];
			if($currency_code == ''){
				$currency_code = 'INR';
			}
		}

		if($purchase_info == '' || $payable_amount == '' || $contact_number == ''){
			return redirect()->to($redirectUrl);
		}

		if($gst_type == '0' || $gst_type == ''){
			$gst_type == '0';
			$gst_value = "";
			$gst_added = "";
			$payment_gross = $payable_amount;
		} else if($gst_type == '1'){
			if($gst_value == ''){
				$gst_value = '0';
			}
			$gst_added = $gst_value;
			$payment_gross = $payable_amount + $gst_added;
		} else if($gst_type == '2'){
			if($gst_value == ''){
				$gst_value = '0';
			}
			$gst_added = ($gst_value / 100) * $payable_amount;
			$payment_gross = $payable_amount + $gst_added;
		}

		$dbData = array(
		  	'purchase_info' => $purchase_info,
		  	'contact_number' => $contact_number,
		  	'payable_amount' => $payable_amount,
		  	'gst_type' => $gst_type,
		  	'gst_value' => $gst_value,
		  	'gst_added' => $gst_added,
		  	'payment_gross' => $payment_gross,
		  	'currency_code' => $currency_code
		);

		$payment_id = $this->paymentModel->insertRecord($dbData);

		$data['business'] = PAYPAL_ID;
		$data['cmd'] = '_xclick';
		$data['item_name'] = $purchase_info;
		$data['item_number'] = $payment_id;
		$data['amount'] = $payment_gross;
		$data['currency_code'] = $currency_code;
		$data['return'] = base_url().'/success'.'?item_number='.$payment_id;
		$data['cancel_return'] = base_url().'/cancel'.'?item_number='.$payment_id;
		$data['notify_url'] = base_url().'/ipn';

		// Build the query string from the data.
		$queryString = http_build_query($data);

		// Redirect to paypal IPN
		return redirect()->to(PAYPAL_URL . '?' . $queryString);
	}

	public function success(){
		$message = '<h1>Payment successfully completed</h1>';

	    if ($this->verifyTransaction($_POST, PAYPAL_URL)) {
	        $item_name = $_POST['item_name'];
	        $item_number = $_POST['item_number'];
	        $payment_status = $_POST['payment_status'];
	        $payment_amount = $_POST['mc_gross'];
	        $payment_currency = $_POST['mc_currency'];
	        $txn_id = $_POST['txn_id'];
	        $receiver_email = $_POST['receiver_email'];
	        $payer_email = $_POST['payer_email'];
	        $custom = $_POST['custom'];

	        $message = '<h1>Payment successfully completed</h1>
	                    <h4>Payment Information</h4>
	                    <p><b>Payment Status:</b> '.$payment_status.'</p>
	                    <p><b>Reference Number:</b> '.$item_number.'</p>
	                    <p><b>Transaction ID:</b> '.$txn_id.'</p>
	                    <p><b>Paid Amount:</b> '.$payment_amount.'</p>';

	        $payment = $this->paymentModel->getRecordById($item_number);
	        if($payment){
	        	$payment->txn_id = $txn_id;
	        	$payment->payment_currency = $payment_currency;
	        	$payment->payment_status = $payment_status;
	        	$payment->receiver_email = $receiver_email;
	        	$payment->payer_email = $payer_email;
	        	$payment->custom = $custom;
	        	$payment->completed_on = date('Y-m-d H:i:s');
	        	$this->paymentModel->saveRecord($payment);
	        }
	    }

	    if(isset($_GET['item_number'])){
	        $item_number = $_GET['item_number'];
	        $payment = $this->paymentModel->getRecordById($item_number);
	        if($payment){
	            $message = '<h1>Payment successfully completed</h1>
	                    <h4>Payment Information</h4>
	                    <p><b>Payment Status:</b> '.$payment->payment_status.'</p>
	                    <p><b>Reference Number:</b> '.$item_number.'</p>
	                    <p><b>Transaction ID:</b> '.$payment->txn_id.'</p>
	                    <p><b>Paid Amount:</b> '.$payment->payment_gross.'</p>';
	        }
	    }

	    $this->data['message'] = $message;

	    $metaData = array(
            'meta_title' => 'GNEC Media: Top Bulk SMS, App and Web Development Company',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is an industry-leading agency which offers reliable bulk SMS, app development, web development services for your exceptional business growth.'
        );
        $this->data['metaData'] = $metaData;

	    $this->data['pageCss'] = null;
        $this->data['page'] = 'pages/success';
        $this->data['pageScript'] = null;
        return $this->layout();
	}

	public function cancel(){
		if(isset($_GET['item_number'])){
		    $item_number = $_GET['item_number'];
		    $payment = $this->paymentModel->getRecordById($item_number);
		    if($payment){
		    	$payment->payment_status = 'cancelled';
		    	$payment->completed_on = date('Y-m-d H:i:s');

		    	$this->paymentModel->saveRecord($payment);
		  	}
		}

		$metaData = array(
            'meta_title' => 'GNEC Media: Top Bulk SMS, App and Web Development Company',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is an industry-leading agency which offers reliable bulk SMS, app development, web development services for your exceptional business growth.'
        );
        $this->data['metaData'] = $metaData;

		$this->data['pageCss'] = null;
        $this->data['page'] = 'pages/cancel';
        $this->data['pageScript'] = null;
        return $this->layout();
	}

	public function ipn(){
		/* 
		 * Read POST data 
		 * reading posted data directly from $_POST causes serialization 
		 * issues with array data in POST. 
		 * Reading raw POST data from input stream instead. 
		 */         
		$raw_post_data = file_get_contents('php://input'); 
		$raw_post_array = explode('&', $raw_post_data); 
		$myPost = array(); 
		foreach ($raw_post_array as $keyval) { 
		    $keyval = explode ('=', $keyval); 
		    if (count($keyval) == 2) 
		        $myPost[$keyval[0]] = urldecode($keyval[1]); 
		} 
		 
		// Read the post from PayPal system and add 'cmd' 
		$req = 'cmd=_notify-validate'; 
		if(function_exists('get_magic_quotes_gpc')) { 
		    $get_magic_quotes_exists = true;
		} 
		foreach ($myPost as $key => $value) { 
		    if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
		        $value = urlencode(stripslashes($value)); 
		    } else { 
		        $value = urlencode($value); 
		    } 
		    $req .= "&$key=$value"; 
		} 
		 
		/* 
		 * Post IPN data back to PayPal to validate the IPN data is genuine 
		 * Without this step anyone can fake IPN data 
		 */ 
		$paypalURL = PAYPAL_URL; 
		$ch = curl_init($paypalURL); 
		if ($ch == FALSE) { 
		    return FALSE; 
		} 
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $req); 
		curl_setopt($ch, CURLOPT_SSLVERSION, 6); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
		curl_setopt($ch, CURLOPT_FORBID_REUSE, 1); 
		 
		// Set TCP timeout to 30 seconds 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name')); 
		$res = curl_exec($ch); 
		 
		/* 
		 * Inspect IPN validation result and act accordingly 
		 * Split response headers and payload, a better way for strcmp 
		 */  
		$tokens = explode("\r\n\r\n", trim($res)); 
		$res = trim(end($tokens)); 
		if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) {
		    // Retrieve transaction info from PayPal 
		    $item_name = $_POST['item_name'];
		    $item_number = $_POST['item_number'];
		    $payment_status = $_POST['payment_status'];
		    $payment_amount = $_POST['mc_gross'];
		    $payment_currency = $_POST['mc_currency'];
		    $txn_id = $_POST['txn_id'];
		    $receiver_email = $_POST['receiver_email'];
		    $payer_email = $_POST['payer_email'];
		    $custom = $_POST['custom'];

		    // Check if transaction data exists with the same TXN ID 
		    $payment = $this->paymentModel->getRecordById($item_number);
		    if($payment){
		    	$payment->txn_id = $txn_id;
	        	$payment->payment_currency = $payment_currency;
	        	$payment->payment_status = $payment_status;
	        	$payment->receiver_email = $receiver_email;
	        	$payment->payer_email = $payer_email;
	        	$payment->custom = $custom;
	        	$payment->completed_on = date('Y-m-d H:i:s');
	        	$this->paymentModel->saveRecord($payment);
		    }
		}
	}

	public function ccavRequestHandler(){
		$merchant_data='';
		$working_key='58F83954FA930D888F7BE4B5CBF1B111';//Shared by CCAVENUES
		$access_code='AVYQ76FB42BR11QYRB';//Shared by CCAVENUES
		
		foreach ($_POST as $key => $value){
			if($key != 'csrf_token_name'){
				$merchant_data.=$key.'='.$value.'&';
			}
		}

		$encrypted_data=$this->encrypt($merchant_data,$working_key);
		$data['encrypted_data'] = $encrypted_data;
		$data['access_code'] = $access_code;
		return view('pages/ccavrequesthandler', $data);
	}

	public function ccavResponseHandler(){
		$message  = "<center>";
		$response  = "<br>Thank you for shopping with us.However,the transaction has been declined.";
		if( isset( $_POST['orderNo'] ) ) {
			$workingKey='58F83954FA930D888F7BE4B5CBF1B111';		//Working Key should be provided here.
			$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
			$rcvdString=$this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
			$order_status="";
			$decryptValues=explode('&', $rcvdString);
			$dataSize=sizeof($decryptValues);

			for($i = 0; $i < $dataSize; $i++) 
			{
				$information = explode('=', $decryptValues[$i]);
				if($i == 3)	$order_status = $information[1];
			}

			if($order_status === "Success")
			{
				$response = "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
				
			}
			else if($order_status === "Aborted")
			{
				$response = "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
			
			}
			else if($order_status === "Failure")
			{
				$response = "<br>Thank you for shopping with us.However,the transaction has been declined.";
			}
			else
			{
				$response = "<br>Security Error. Illegal access detected";		
			}

			$message .= $response;

			$message  .= "<br><br>";

			$message  .= "<table cellspacing=4 cellpadding=4>";
			$cstm_insert_array = array();
			for($i = 0; $i < $dataSize; $i++) 
			{
				$information=explode('=',$decryptValues[$i]);
					$message  .= '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
					$cstm_insert_array[$information[0]] = $information[1];
					if( $information[0]== 'order_status' ) {
						$status = ( $information[1] == 'Success' ) ? 1 : 0;
					}
			}

			$message  .= "</table><br>";
			
		}else{
			$message .= $response;
		}

		$message  .= "</center>";

		$this->data['message'] = $message;

		$metaData = array(
            'meta_title' => 'GNEC Media: Top Bulk SMS, App and Web Development Company',
            'meta_keywords' => 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media',
            'meta_description' => 'GNEC Media is an industry-leading agency which offers reliable bulk SMS, app development, web development services for your exceptional business growth.'
        );
        $this->data['metaData'] = $metaData;

	    $this->data['pageCss'] = null;
        $this->data['page'] = 'pages/ccavresponsehandler';
        $this->data['pageScript'] = null;
        return $this->layout();
	}

	protected function verifyTransaction($data, $paypalUrl) {
	    $req = 'cmd=_notify-validate';
	    foreach ($data as $key => $value) {
	        $value = urlencode(stripslashes($value));
	        $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
	        $req .= "&$key=$value";
	    }

	    $ch = curl_init($paypalUrl);
	    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
	    $res = curl_exec($ch);

	    if (!$res) {
	        $errno = curl_errno($ch);
	        $errstr = curl_error($ch);
	        curl_close($ch);
	        throw new Exception("cURL error: [$errno] $errstr");
	    }

	    $info = curl_getinfo($ch);

	    // Check the http response
	    $httpCode = $info['http_code'];
	    if ($httpCode != 200) {
	        throw new Exception("PayPal responded with http code $httpCode");
	    }

	    curl_close($ch);

	    return $res === 'VERIFIED';
	}

	/*
	* @param1 : Plain String
	* @param2 : Working key provided by CCAvenue
	* @return : Decrypted String
	*/
	protected function encrypt($plainText,$key){
		$key = $this->hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
		$encryptedText = bin2hex($openMode);
		return $encryptedText;
	}

	/*
	* @param1 : Encrypted String
	* @param2 : Working key provided by CCAvenue
	* @return : Plain String
	*/
	protected function decrypt($encryptedText,$key){
		$key = $this->hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$encryptedText = $this->hextobin($encryptedText);
		$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
		return $decryptedText;
	}

	protected function hextobin($hexString){ 
		$length = strlen($hexString); 
		$binString="";   
		$count=0; 
		while($count<$length){       
		    $subString =substr($hexString,$count,2);           
		    $packedString = pack("H*",$subString); 
		    if ($count==0){
				$binString=$packedString;
		    }else{
				$binString.=$packedString;
		    } 
		    
		    $count+=2; 
		} 
	    return $binString; 
	} 
}
