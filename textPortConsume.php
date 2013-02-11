<?php

/**
 * ##############################################################################################
 * ##############################################################################################
 * 
 * SERIOUSLY IMPORTANT :: Do **NOT** use this file "as is" on a Production Server. 
 * 
 * This file is to be used for development purposes only until tested on your box (server) due 
 * to the fact that there in NO conditional wraps nor validation against the response.
 * 
 * ##############################################################################################
 * ##############################################################################################
 * 
 * The process for consuming all three methods has been supplied in this file but please only 
 * consume one method at a time. For best results please use the command line for consumption.
 * 
 * Should you have any questions or need assistance with integration, 
 * then do not hesitate to drop me a line on mwatts7222@gmail.com.
 */

$client = new SoapClient('http://www.textport.com/WebServices/TextPortSMS.asmx?WSDL');

## Get a list of methods that are available for consumption. Uncomment the line below to list the messages in the call.
##var_dump($client->__getFunctions()); 

$sendMessages = array(

  "messagesList" => array ( 
  	"UserName" => "yourUsername",
		"Password" => "yourPassword",
		"Messages" => array ( 
			"TextPortSMSMessage" => array (
				"CountryCode" => "US",
				"MobileNumber" => "000000000",
				"MessageText" => "Hey there cowboy"
			)	
		)
	)
);

$verifyAuthentication = array ( 
	"userName" => "userName",
	"password" => "passWord"

);

## Consume the webservice method "Ping" to verify the webservice status. 
$result = $client->__call('Ping', array ('Ping' => $verifyAuthentication));

## Consume the webservice method VerifyAuthentication to validate that a user account exists on the system.
$result = $client->__call('VerifyAuthentication', array ('VerifyAuthentication' => $verifyAuthentication));

## Consume the webservice method SendMessages to send text messages.
$result = $client->__call('SendMessages', array ('SendMessages' => $sendMessages));

## Dump the result.
##var_dump($result);
