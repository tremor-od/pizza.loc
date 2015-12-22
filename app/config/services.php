<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

    'mailgun' => array(
        'domain' => 'sandbox79c700a7cd7341ca8457f765b4c7c733.mailgun.org',
        'secret' => 'key-ad6bc8af32bce48551d88a1e2dfb7a73',
    ),

	'mandrill' => array(
		'secret' => '',
	),

	'stripe' => array(
		'model'  => 'User',
		'secret' => '',
	),

);
