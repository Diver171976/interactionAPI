<?php

/**
 * Parameters to send SALE request
 */

return [
	'action'=>'SALE',
	'client_key'=>'5b6492f0-f8f5-11ea-976a-0242c0a85007',
	'order_id'=>'ORDER-12345',
	'order_amount'=>1.99,
	'order_currency'=>'USD',
	'order_description'=>'Product',
	'card_number'=>'4111111111111111',
	'card_exp_month'=>'01',
	'card_exp_year'=>'2025',
	'card_cvv2'=>'000',
	'payer_first_name'=>'John',
	'payer_last_name'=>'Doe',
	'payer_address'=>'Big street',
	'payer_country'=>'US',
	'payer_state'=>'CA',
	'payer_city'=>'City',
	'payer_zip'=>'123456',
	'payer_email'=>'test@gmail.com',
	'payer_phone'=>'199999999',
	'payer_ip'=>'83.8.31.151',
	//'auth'=>'N',
	'term_url_3ds'=>'http://client.site.com/return.php',
];
