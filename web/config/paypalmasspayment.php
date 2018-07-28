<?php

return [


	/*
     * This is Authentication type, You can set it to 'api_certificate' or 'api_signature'
     */
	'authentication'    => 'api_signature',


	/*
     * You can set it to 'sandbox' or 'live'
     */
	'environment'       => 'live',


	/*
     * You can set it to 'nvp' or 'soap'
     */
	'operation_type'    => 'nvp',


	/*
     * You can set it to any valid version
     */
	'api_vesion'        => '51.0',


	/*
     * You can set it to 'email' or 'phone' or 'id'
     */
	'receiver_type'     => 'email',


	/*
     * You can set currency here
     */
	'currency'          => 'ILS',
	/*
     * or other currency ('USD', 'BRL', 'GBP', 'EUR', 'JPY', 'CAD', 'AUD')
     * https://developer.paypal.com/docs/classic/api/currency_codes/
     */


	/*
     * These are sandbox credentials
     * You can set API Username and API Password here
     * If you set authentication as 'api_signature' then you must enter 'api_signature' here
     */

	'sandbox' => [


		'api_username'    => 'instaffic-facilitator_api1.gmail.com',
//		        'api_username'    => 'instaffic_api1.gmail.com',
//
		'api_password'    => 'NFMSYSU6RUDDM7F4',
//		        'api_password'    => 'HEW2AXPPQBK8ALBA',
//
		/*
        * If you set authentication as 'api_certificate' then you must enter 'api_certificate' here
        * If it is 'api_certificate' you must give proper path to cert_key_pem.txt file
        */
		'api_certificate' => '',

		/*
         * If you set authentication as 'api_signature' then you must enter 'api_signature' here
         */
		'api_signature'   => 'AFcWxV21C7fd0v3bYYYRCpSSRl31ALWq67pJYTkk-.xZwp-vpHg13slh',
//		        'api_signature'   => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AaotU6VsJxQcXRb4U1RFd9VajEpv',
	],

	/*
     * These are live credentials
     * You can set API Username and API Password here

     * If you set authentication as 'api_certificate' then you must enter 'api_certificate' here
     * If it is 'api_certificate' you must give proper path to cert_key_pem.txt file

     * If you set authentication as 'api_signature' then you must enter 'api_signature' here
     */
	'live' => [

		'api_username'    => 'instaffic_api1.gmail.com',

		'api_password'    => 'HEW2AXPPQBK8ALBA',

		/*
         * If you set authentication as 'api_certificate' then you must enter 'api_certificate' here
         * If it is 'api_certificate' you must give proper path to cert_key_pem.txt file
         */
		'api_certificate' => '',

		/*
         * If you set authentication as 'api_signature' then you must enter 'api_signature' here
         */
		'api_signature'   => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AaotU6VsJxQcXRb4U1RFd9VajEpv',
	],


];
