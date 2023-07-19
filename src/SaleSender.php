<?php

/**
 * Realization of SenderInterface for method SALE
 */

require_once dirname(__FILE__).'/SenderInterface.php';

class SaleSender implements SenderInterface
{
	/**
	 * Prepare and send request
	 * @param string $clientPass	Client Password
	 * @param array $params	Request parameters
	 * @return boolean|string	Json from API or false if errors
	 */
	public function send( $clientPass, $params=[] )
	{
		if (!$this->checkRequestParams ($params))
		{
			echo "Error after check request params:".print_r($params,1)."\n";
			return false;
		}

		$params['hash'] = $this->getHash($params['payer_email'], $clientPass, $params['card_number']);
		
		return Requester::request('POST', $params);
	}

	/**
	 * Check request parameters
	 * @param array $params Request parameters
	 * @return boolean	Check result
	 * @throws Exception
	 */
	public function checkRequestParams( $params=[] )
	{
		try
		{
			if (!strlen($params['action']))
				throw new Exception ("Not exists request parametr 'action'");
			elseif(!strlen($params['client_key']))
				throw new Exception ("Not exists request parametr 'client_key'");
			//check all fields in real project
		}
		catch (Exception $ex)
		{
			echo $ex->getMessage()."\n";
			return false;
		}
		return true;
	}

	/**
	 * Get hash to SALE request
	 * This method is required only for the SALE request, method is not described in the interface
	 * @param string $clientEmail	Client email
	 * @param string $clientPass	Client password
	 * @param string $cardNumber	Card number
	 * @return string Hash to SALE request
	 */
	protected function getHash($clientEmail, $clientPass, $cardNumber)
	{
		return md5(strtoupper(strrev($clientEmail).$clientPass
			.strrev(substr($cardNumber,0,6).substr($cardNumber,-4))));
	}
}

