<?php
/**
* Interface for send request
**/

require_once dirname(__FILE__).'/Requester.php';

interface SenderInterface
{
	/**
	 * Prepare and send request
	 * @param string $clientPass	Client Password
	 * @param array $params	Request parameters
	 * @return boolean|string	Json from API or false if errors
	 */
	public function send( $clientPass, $params=[] );

	/**
	 * Check request parameters
	 * @param array $params Request parameters
	 * @return boolean	Check result
	 */
	public function checkRequestParams( $params=[] );
}

