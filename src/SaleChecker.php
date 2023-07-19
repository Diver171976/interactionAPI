<?php

/**
 * Realization of CheckerInterface for method SALE
 */

require_once dirname(__FILE__).'/CheckerInterface.php';

class SaleChecker implements CheckerInterface
{
	/**
	 * Consts with result to check
	 */
	const RESULT_ERROR = 'ERROR';
	const RESULT_DECLINED = 'DECLINED';
	const RESULT_SUCCESS = 'SUCCESS';
	const RESULT_REDIRECT = 'REDIRECT';

	/**
	 * Check response
	 * @param string $response	Json as response
	 * @return array|bool	Array with sucess data from api or false if error
	 */
	public function checkResponse( $response )
	{
		try
		{
			//check json
			if ( !strlen($response) )
				throw new Exception ("Wrong json from API: ". print_r ($response,1));
			//decode json
			$data = json_decode($response,true);
			if ( json_last_error() != JSON_ERROR_NONE || !is_array ($data) || empty($data) )
				throw new Exception ("Can't decode json from API: ". print_r ($response,1));
			if ($data['result']== static::RESULT_ERROR)
				throw new Exception ("Returns error from API.". (strlen ($data['error_message'])?" Error message: "
					.$data['error_message']:"")."\nErrors: ".print_r($data['errors'],1));
			if ($data['result']== static::RESULT_DECLINED)
				throw new Exception ("Returns DECLINED result from API. Status: {$data['status']}");
			if ($data['result']!= static::RESULT_SUCCESS && $data['result']!= static::RESULT_REDIRECT)
				throw new Exception ("Returns result from API: {$data['result']}. Status: {$data['status']}");
		}
		catch (Exception $ex)
		{
			echo $ex->getMessage()."\n";
			return false;
		}

		return $data;
	}
}

