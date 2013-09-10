<?php 

// from http://webtraffic360design.googlecode.com/svn/trunk/includes/modules/payment/securepay/

//securepay.ini:
// see class for options details
$securepay_options = array();

$securepay_options['merchID']		=	'581287'; // enter securepay id
$securepay_options['ccMethod']		=	'DATAENTRY'; //   DATAENTRY, SWIPED
$securepay_options['transType']		=	'SALE'; //   SALE, CREDIT, PREAUTH, FORCE, VOID
$securepay_options['recurring']		=	'NO'; //  YES, NO
$securepay_options['timeframe']		=	'MONTH'; //  MONTH, WEEK, BIMONTH, QUARTER, 6MONTH, YEAR, 1AND15, MANUAL
$securepay_options['recamount']		=	0.05; //   valid float
$securepay_options['avsreq']		=	0; //  0, 1
$securepay_options['_timeout']		=	120; //  any valid int

$securepay_options['_debug']		=	0; //  0, 1
$securepay_options['_sURL']			=	'https://www.securepay.com/secure1/index.asp'; //  or any proper url
$securepay_options['_is_test_card']		=	1; //  0, 1
$securepay_options['enabled_card_types'] = array('VISA'			=>	'Visa',
												 'MASTERCARD'	=>	'Master Card',
												 'AMEX'			=>	'American Express',
												 'DISCOVER'		=>	'Discover');
												 

			

//file: messages.php
/*

 Based on payment Module of iongate.php (06/11/2003) Modified for Securepay.com by:

Tony Reynolds  <tonyr@securepay.com>

SecurePay.php version 1.2 06/11/2003

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_SECUREPAY_TEXT_TITLE', 'Secure Credit Card Processessing By SecurePay.com');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_TITLE_CONFIRM', 'Please check Payment data you entered');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_DESCRIPTION', 'SecurePay payment module. <BR>Credit Card Test Info:<br>Aprrovals<br>CC// : 4111111111111111<br>Expiry: Any <BR> Declines <BR>CC// : 5105105105105100<br>Expiry: Any ');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_TYPE', 'Credit Card Type:');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_CREDIT_CARD_OWNER', 'Credit Card Owner:');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_CREDIT_CARD_NUMBER', 'Credit Card Number:');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_CREDIT_CARD_EXPIRES', 'Credit Card Expiry Date:');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_JS_CC_OWNER', '* The owner\'s name of the credit card must be at least 5 characters.\n');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_JS_CC_NUMBER', '* The credit card number must be at least 12 characters.\n');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_ERROR_MESSAGE', 'There has been an error processing your credit card. Please try again.');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_GATEWAY_TIMEOUT', 'There was an error contacting the credit card processor. Please try again.');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_ERROR', 'There was a problem processing your Credit Card! Not-Approved');
  define('MODULE_PAYMENT_SECUREPAY_TEXT_WRONG_TYPE', 'The Credit Card Number does not match the Credit Card Type.');
  
//file: payment.class.php
define('NEW_TRANSACTION', 0);
define('PENDING_TRANSACTION', 1);
define('DEFERRED_TRANSACTION', 2);
define('DECLINED_TRANSACTION', 3);
define('INTERNAL_ERROR_OCCURRED_DURING_TRANSACTION', 4);
define('CONFIRMED_TRANSACTION', 5);
define('COMPLETED_TRANSACTION', 6);


//file: securepay.php

class Securepay
{
	
	////////////////////////////////////////
	//  Class Properties
	//////////////////////////////////////// 
	
	// merchant info
	var $merchID = '58405'; // A unique Merchant identifier assigned to the Merchant by SecurePay.Com.		
	
	// customer info
	var $custName; 			// The name on the credit card.		
	var $street; 			// The street address in the billing address for the credit card.		
	var $city; 				// The city in the billing address for the credit card.		
	var $state; 			// The State in the billing address for the credit card.		
	var $zip;				// The Zip code in the billing address for the credit card.		
	var $country;			// The Country in the billing address for the credit card.
	var $custEmail; 		// The email of the customer making the purchase.
	
	
	// card info
	var $ccNum; 			// The account number of the credit card. No dashes or spaces.		
	var $month; 			// The 2 digit designation for the month of expiration on the card.
								// Example: 01 is January, 12 is December.		
	var $year;   			// The 2 digit designation for the year of expiration on the card.
								// Example: 00 is 2000, 01 is 2001, 02 is 2002.
	var $ccType	= NULL; 	// Should be one of the keys in $this->_ccTypes or null
								// Example: 'VISA' or 'MASTERCARD'

	// transaction info
	var $avsreq = 1; 		// AVS (Address Verification System) type being requested.	
							/*
								Values: 
									0 = transaction authorization only, no AVS check 
									1 = transaction authorization and a Full AVS (both street address and zip code)
									2 = AVS only, Full AVS but do not authorize the Credit Card.
									3 = Credit Card Authorization and Zip Code AVS Only.
									4 = AVS with Zip Code only, do not authorize the Credit Card. 
							*/	
	var $amount = '0.00'; 	// The amount of the charge to be processed. Follow this format xxxx.xx. No dollar sign eg 32.24
	var $recurring = 'NO';	// Add this transaction to recurring database. Valid values 'YES' or 'NO'
	var $recamount;			// Recurring Amount, as it may be different that initial charge
								// Follow this format xxxx.xx. No dollar sign eg 32.24
	var $timeframe;			// Time frame for recurring activity:
							/*	
								Values:  
										  "MONTH" - monthly [default]
										  "WEEK" - weekly
										  "BIMONTH" - twice a month
										  "QUARTER"  - once a quarter
										  "6MONTH" - semi annually
										  "YEAR" - annually
										  "1AND15" - first and fifteenth of every month
										  "MANUAL" - save this transaction and you do it when you want
								
								Any time frame value that does not match the above list
								is interpreted as a monthly recurring entry.
							*/
	var $transType = 'SALE'; // The type of transaction being processed. This variable can have two values. 
								/**************************************************************
									transType Explanation
										SALE - Indicates a charge to be placed against 
												a credit card account.
		
										CREDIT - Indicates a refund or "credit" to be 
												placed against a credit card account.
		
										PREAUTH - Indicates a pre-authorization on a 
												Credit Card. This is a temporary block on
												an Amount submitted by the Merchant. This 
												is not a qualified transaction and if not 
												closed with a FORCE transaction it will 
												release the block after 5-7 days depending
												on the card issuer. This can have a negative 
												impact on the funds availability of the 
												card holder and should be used appropriately.
		
										FORCE - Indicates a closure of a previously 
												PREAUTH (pre-authorized) transaction. A 
												FORCE  requires all data fields submitted 
												with the original pre-authorization plus the 
												additional variable named APPROVNUMBER. The 
												value of this field is the original 
												transaction Approval Number returned as the 
												value of Approv_Num.
			
										VOID - Indicates a reversal of a transaction conducted
												on the same business day. An additional variable 
												must be passed with a VOID transaction. That 
												variable is the original record number assigned 
												to the transaction. This number is passed with 
												each successful transaction as the "VoidRecNum".
										**************************************************************/
	var $ccMethod = 'DataEntry'; 
							//  The type of transaction being presented. Either "DataEntry" or "Swiped" 
							//  Swiped cards are not currently supported by this library
	var $origApprovNumber; 	/* This is passed as a required variable when conducting a FORCE transaction. 
								The value of the variable ApprovNumber is the original Approval Code from 
								the pre-authorization. It is passed back in the response string from the 
								transaction request sent to the COM object.
							*/
	var $voidRecNum; 		/* The VoidRecNum is passed back with the Approval Code and other return 
								variables on each approved transaction. If the transaction is to be 
								reversed on the same business day as the original transaction a VOID 
								transaction type may be initiated provided the original Record Number is 
								passed to SecurePay with all other original transaction data. The value 
								of the Record Number to be passed to SecurePay is the value of the 
								"VoidRecNum" assigned to the original transaction. The name of both the 
								receiving variable and send variable is the same.
							*/
							
	// optional vars
	var $comment1; 			// An optional field used by the Merchant to aid in managing transactions.
	var $comment2; 			// An second optional field used by the Merchant to aid in managing transactions.


	
	// Returned data
	
	var $returnCode = "N";	// Y= approved, N= host decline
	
	var $approvNum = "NONE";// The Approv_Num can have 2 possible responses
								// 1. "XXXXXX", the Approval number of the transaction.
								// 2. "NONE", When a transaction is declined.
	var $cardResponse; 		/* Verbose text from processor: APPROVED, INVALID CARD NUMBER. 
							   The Card_Response can have many possible values. These are 
							   usually verbose descriptions of why a card was declined or 
							   the word "Approved" when transactions are accepted for processing.
							*/
	var $avsResponse; 		/*  The AVS_Response variable provides a method to develop a business rule set
								to work in conjunction with the AVSREQ variable to limit merchant liability
								in credit card acceptance. The AVS system involves presenting 2 pieces of data
								to the processor as an comparative check against information the processor
								has on file. The data used in this comparison are the "Billing Street Address"
								and the "Billing Zip Code" of the credit card holder.
								Dependent on the success of the comparative match on this information the
								value of the AVS_Response variable will be one of the following:
								
									A = Address (Street) matches, Zip does not.
									E = AVS Error
									G = Issuing bank does not subscribe to the AVS system.
									N = no match on Address or Zip Code.
									R = Retry, system unavailable or timed out.
									S = Service not supported by issuer.
									U = Address information unavailable.
									W = 9 digit Zip matches, Address does not.
									X = Exact AVS match.
									Y = Address and 5 digit zip code match.
									Z = 5 digit Zip Code matches, Address does not
							*/
	var $recordNumber; 		/*  the same as $voidRecNum above.
								The Record Number of the Approved Transaction. The value is “000” for Non-
								Approved Transactions. The VoidRecNum is required to conduct a Void or reversal of a
								transaction that was processed on the same business day. Transactions requiring reversal after
								the current business day are required to use the Credit transaction type.
							*/
	
	//  Internal Variables
	var $_errorData;
	var $_timeout = 120;		//  timeout of http session in seconds
	var $_debug = false;
	var $is_test_card = false; 	// true skips the local card validation
	var $_sURL = 'https://www.securepay.com/secure1/index.asp';	// the url to the securepay interface
	
	var $postData;	// the data we're about to send to post
	var $response;	// the raw result that comes back from the cc company
	var $status;	// numeric status
	var $_ccTypes = array('Visa'
						,'Master Card'
						,'American Express'
						,'Discover'
					);
	var $_customer_data_set = false;
	var $_cc_data_set = false;

	/////////////////////////////////////////////
	//  END - Class Properties
	///////////////////////////////////////////// 

	/**
	* Constructor
	* 
	* @param array [string key ] => mixed value passes any given params onto the init method
	*/	
	function Securepay($options=false){
		if(is_array($options)) $this->init($params);
	}
					
	/**
	* Set any of the classes gateway params
	* 
	* @param array [string key ] => mixed value
	*/	
	function init($params)
	{
		foreach($params as $key => $value){
			$this->$key = $value;
		}
	}

	/**
	* Check the address without billing the customer
	* 
	* @param array [string key ] => mixed value
	*/			
	function AVSCheck($params=false){
		$old_avs = $this->avsreq; // store the current value
		$this->avsreq = 2; // full avs check: street address and zip code
		$result = $this->process($params);
		$this->avsrew = $old_avs;
		return $result;
	}
	
	function charge($params=false){
		// TODO: handle params better
		$this->setProcessData($params); // remove this after we have a handle params function
		if(!$this->validateData()) return false;
		$this->beforeProcess();
		$this->doProcess();
		$this->afterProcess();
		$this->checkProcessResult();
		return $this->getProcessResponse();
	}
	
	// void()
	// credit()
	// recurring()
	// hold()
	// force()
	// setCustomerData()
	// setCardData();
	// verifyCard();

	/**
	* Set transaction data
	* Basically assumes all data is good
	*
	* @access	public
	* @param	array
	* 		
	* @return	void
	*/		
	function setProcessData($params)
	{
		if(!$params) return false;
		
		$this->amount 		= 	sprintf("%01.2f", $params['amount']);
		$this->custName		=	$params['name'];
		$this->street		=	$params['street'];
		$this->city			=	$params['city'];
		$this->state		=	$params['state'];
		$this->zip			=	$params['zip'];
		$this->country		=	$params['country'];
		$this->custEmail	=	$params['email'];
		
		$this->ccNum		=	$params['cc'];
		$this->month		=	$params['month'];
		$this->year			=	$params['year'];
		
		if(isset($params['ccType']))
		{
			$this->ccType = $params['ccType'];
		}

		
		// add this transaction to the recurring database
		if($this->recurring == 'YES')
		{
			$this->timeframe	=	(isset($params['timeframe'])) ? $recamount['timeframe'] : 'MONTH';
			$this->recamount	=	(isset($params['recamount'])) ? $recamount['recamount'] : '0.00';
		}
		 
		// if void
		if($this->transType == 'VOID')
		{
			$this->voidRecNum	=	$params['voidRecNum'];
		}
		
		// if force
		if($this->transType == 'FORCE')
		{
			$this->origApprovNumber	=	$params['origApprovNumber'];;
		}
				
		// optional comments
		$this->comment1	= (isset($params['comment1'])) ? $recamount['comment1'] : '';
		$this->comment2	= (isset($params['comment2'])) ? $recamount['comment2'] : '';
	}


	/**
	* Validate Payment data
	* We expect clear data
	*
	* @access	public
	* @param	mixed
	* 		
	* @return	bool
	*/			
	function validateData($params=false)
	{
		// TODO: check / save params first
		if(!$this->is_test_card)
		{
			$cc_validation = new cc_validation();
			$result = $cc_validation->validate($this->ccNum, $this->month, $this->year);

			$error = '';
			switch ($result) 
			{
				case -1:
					$error = sprintf(TEXT_CCVAL_ERROR_UNKNOWN_CARD, substr($cc_validation->cc_number, 0, 4));
				break;
				case -2:
				case -3:
				case -4:
					$error = TEXT_CCVAL_ERROR_INVALID_DATE;
				break;
				case false:
					$error = TEXT_CCVAL_ERROR_INVALID_NUMBER;
				break;
			}

			if ( ($result == false) || ($result < 1) ) 
			{
				return false;
			}

			// check the type the user said the card was, versus the type that cc_validation
			// says it is.
			if(isset($this->ccType))
			{
				if ($cc_validation->cc_type != $this->ccType){
					$this->_errorData = MODULE_PAYMENT_SECUREPAY_TEXT_WRONG_TYPE;
					return false;
				}
			} else $this->ccType = $cc_validation->cc_type;
		
			return true;
		}
		return true;
	}	
	
	
	function beforeProcess()
	{
		$this->status = NEW_TRANSACTION;
		return true;
	}
	
 
	/**
	* make transaction and get response
	* 
	*
	* @access	public
	* @param	mixed
	* 		
	* @return	bool
	*/     
	function doProcess()
	{
		$this->__buildPostData();
		$ch=curl_init($this->_sURL);
		if(!$ch)
		{
			$this->_errorData = sprintf('Error1 [%d]: %s',curl_errno($ch),curl_error($ch));
			$this->status = INTERNAL_ERROR_OCCURRED_DURING_TRANSACTION;
			return false;
		}
		
		curl_setopt($ch, CURLOPT_POST, 1); 
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postRequest);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_SSLVERSION, 3);
		
		$response = curl_exec($ch);
		
		if(!$response)
		{
			$this->_errorData = sprintf('Error2 [%d]: %s',curl_errno($ch),curl_error($ch));
			return false;
		}
		curl_close($ch);
		
		if($this->_debug) echo "<BR><BR><b>Data received from server:</b><BR><BR>$http_response";
		$this->response = $response; // format 'Y,5000,APPROVED,U,1234';
		return true;
	}

	/**
	* interpretation and analyzing the response
	* 
	* @access	public
	* @param	void
	* 		
	* @return	bool
	* @author	VADIM
	*/		
	function checkProcessResult()
	{
		if($this->response == '' || substr_count($this->response, ',') != 4)
		{
			$this->_errorData = 'Unrecognizable response received.';
			$this->status = INTERNAL_ERROR_OCCURRED_DURING_TRANSACTION;
			return false;
		}
		else
		{
			$retval = explode(",", $this->response);
			$this->returnCode	=	$retval[0];
			$this->approvNum	=	$retval[1];
			$this->cardResponse	=	$retval[2];
			$this->avsResponse	=	$retval[3];
			$this->recordNumber	=	$retval[4];
			
			// analyze result
			if($this->returnCode == 'Y')
			{
				$this->status = COMPLETED_TRANSACTION;
				return true; 
			}
			else 
			{
				// todo: analyze AVS code if need
				$this->status = DECLINED_TRANSACTION;
				return false;
			}
		}
	}

	/**
	* get prepared response about made transaction 
	* 
	* @access	public
	* @param	void
	* 		
	* @return	string
	* @author	VADIM
	*/		
	function getProcessResponse($params = null)
	{
		return serialize (array('Request'			=>	$this->postData,
								'Return Code'		=>	$this->returnCode,
								'Approval Code'	=>	$this->approvNum,
								'Card Response'	=>	$this->cardResponse,
								'AVS Response'		=>	$this->avsResponse,
								'Record Number'	=>	$this->recordNumber));
	}
	
	function afterProcess()
	{
		return true;
	}
	
	function getError()
	{
		$error = '';
		if(isset($this->_errorData) && strlen($this->_errorData))
		{
			$error .= $this->_errorData;
		}
		return $error;
	}

	/*
		Function: __buildPostData
		Purpose: String together all passed variables
		Parameters: NONE
	*/
	function __buildPostData()
	{			
		$postData= "merch_id=" . urlencode($this->merchID);
		$postData.= "&amount=" . urlencode($this->amount);
		$postData.= "&name=" . urlencode($this->custName);
		$postData.= "&street=" . urlencode($this->street);
		$postData.= "&city=" . urlencode($this->city);
		$postData.= "&state=" . urlencode($this->state);
		$postData.= "&zip=" . urlencode($this->zip);
		$postData.= "&country=" . urlencode($this->country);
		$postData.= "&email=" . urlencode($this->custEmail);
		$postData.= "&avsreq=" . urlencode($this->avsreq);
		$postData.= "&tr_type=" . urlencode($this->transType);
		$postData.= "&cc_method=" . urlencode($this->ccMethod);
		
		if(strtoupper($this->recurring)=="YES"){
			$postData.= "&recurring=" . urlencode($this->recurring);
			$postData.= "&time_frame=" . urlencode($this->timeframe);
			$postData.= "&rec_amount=" . urlencode($this->recamount);
		}
		
		$postData.= "&cc_number=" . urlencode($this->ccNum);
		$postData.= "&month=" . urlencode($this->month);
		$postData.= "&year=" . urlencode($this->year);

		if(strtoupper($this->transType)=="VOID"){				
			$postData.= "&voidRecNum=" . urlencode($this->voidRecNum);
		}
		if(strtoupper($this->transType)=="FORCE"){
			$postData.= "&app_num=" . urlencode($this->origApprovNumber);
		}
		
		$postData.= "&comment1=" . urlencode($this->comment1);
		$postData.= "&comment2=" . urlencode($this->comment2);
		if($this->_debug)echo "<BR><BR><b>Data posted to server:</b><BR><BR>$postData";
		$this->postData = $postData;
	}// END BuildPostData		
	

	// helper functions for building dropdown lists
	function getMonthsList()
	{
		return array('01'	=>	'01 - January',
					 '02'	=>	'02 - Feburary',
					 '03'	=>	'03 - March',
					 '04'	=>	'04 - April',
					 '05'	=>	'05 - May',
					 '06'	=>	'06 - June',
					 '07'	=>	'07 - July',
					 '08'	=>	'08 - August',
					 '09'	=>	'09 - September',
					 '10'	=>	'10 - October',
					 '11'	=>	'11 - November',
					 '12'	=>	'12 - December');
	}
	
	function getYearsList()
	{
		$expires_year = array();
		$today = getdate(); 
		for ($i=$today['year']; $i < $today['year']+10; $i++) 
		{
			$expires_year[strftime('%y',mktime(0,0,0,1,1,$i))] = strftime('%Y',mktime(0,0,0,1,1,$i));
		}
		return $expires_year;
	}
	
	function getCardsList(){
		return $this->_ccTypes;
	}
			
} //END Class SecurePay


// cc_validation.php

/*
$Id: cc_validation.php,v 1.3 2003/02/12 20:43:41 hpdl Exp $

osCommerce, Open Source E-Commerce Solutions
http://www.oscommerce.com

Copyright (c) 2003 osCommerce

Released under the GNU General Public License
*/

class cc_validation {
var $cc_type, $cc_number, $cc_expiry_month, $cc_expiry_year;

function validate($number, $expiry_m, $expiry_y) {
  $this->cc_number = ereg_replace('[^0-9]', '', $number);

  if (ereg('^4[0-9]{12}([0-9]{3})?$', $this->cc_number)) {
	$this->cc_type = 'Visa';
  } elseif (ereg('^5[1-5][0-9]{14}$', $this->cc_number)) {
	$this->cc_type = 'Master Card';
  } elseif (ereg('^3[47][0-9]{13}$', $this->cc_number)) {
	$this->cc_type = 'American Express';
  } elseif (ereg('^3(0[0-5]|[68][0-9])[0-9]{11}$', $this->cc_number)) {
	$this->cc_type = 'Diners Club';
  } elseif (ereg('^6011[0-9]{12}$', $this->cc_number)) {
	$this->cc_type = 'Discover';
  } elseif (ereg('^(3[0-9]{4}|2131|1800)[0-9]{11}$', $this->cc_number)) {
	$this->cc_type = 'JCB';
  } elseif (ereg('^5610[0-9]{12}$', $this->cc_number)) {
	$this->cc_type = 'Australian BankCard';
  } else {
	return -1;
  }

  if (is_numeric($expiry_m) && ($expiry_m > 0) && ($expiry_m < 13)) {
	$this->cc_expiry_month = $expiry_m;
  } else {
	return -2;
  }

  $current_year = date('Y');
  $expiry_y = substr($current_year, 0, 2) . $expiry_y;
  if (is_numeric($expiry_y) && ($expiry_y >= $current_year) && ($expiry_y <= ($current_year + 10))) {
	$this->cc_expiry_year = $expiry_y;
  } else {
	return -3;
  }

  if ($expiry_y == $current_year) {
	if ($expiry_m < date('n')) {
	  return -4;
	}
  }

  return $this->is_valid();
}

function is_valid() {
  $cardNumber = strrev($this->cc_number);
  $numSum = 0;

  for ($i=0; $i<strlen($cardNumber); $i++) {
	$currentNum = substr($cardNumber, $i, 1);

// Double every second digit
	if ($i % 2 == 1) {
	  $currentNum *= 2;
	}

// Add digits of 2-digit numbers together
	if ($currentNum > 9) {
	  $firstNum = $currentNum % 10;
	  $secondNum = ($currentNum - $firstNum) / 10;
	  $currentNum = $firstNum + $secondNum;
	}

	$numSum += $currentNum;
  }

// If the total has no remainder it's OK
  return ($numSum % 10 == 0);
}
}
?>