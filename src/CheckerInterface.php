<?php
/**
 * Interface for evaluate request result
 */

interface CheckerInterface
{
	/**
	 * Check response
	 * @param string $response	Json as response
	 * @return array|bool	Array with sucess data from api or false if error
	 */
	public function checkResponse( $response );
}