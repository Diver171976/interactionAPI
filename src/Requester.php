<?php
/**
* Class to do curl request
**/

class Requester
{
	//in real project set request url in configuration file or in table DB
	const BASE_URL = 'https://dev-api.rafinita.com/post';

	/**
	 * Do http request
	 * @param string $method	Method
	 * @param array $requestParams	Request arguments
	 * @return string||bool	JSON or false if error
	 * @throws Exception
	 */
	public static function request( $method, $requestParams=null )
	{
    		$ch = curl_init();
		$curlOptions = [
      			CURLOPT_URL => self::BASE_URL,
      			CURLOPT_HTTPHEADER => ['Content-Type: application/json','Accept: application/json'],
			CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_DNS_USE_GLOBAL_CACHE=>false,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
    		];
    		if ($requestParams)
		{
			$jsonArgs = json_encode($requestParams);
			$curlOptions[CURLOPT_POSTFIELDS] = $jsonArgs;
    		}

		curl_setopt_array($ch, $curlOptions);
		$curlResult = curl_exec($ch);
    		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$httpError = curl_error($ch);
    		curl_close($ch);

		echo "Return status: {$status}\n";
    		if ( $status !=200 || $httpError)
		{
			echo "Returns error status: {$status}. Error: {$httpError}. Response: {$curlResult}\n";
    		}
    		return $curlResult;
	}
}