<?php

/**
 * Class to manage request and response
 */

require_once dirname(__FILE__).'/SaleSender.php';
require_once dirname(__FILE__).'/SaleChecker.php';

class APIManager
{
	/**
	 * Get instance of Sender
	 * @param string $action	Action
	 * @return boolean|string Class name to send request || false if error
	 */
	public static function getSender($action)
	{
		$className = $action[0]. strtolower (substr($action,1))."Sender";
		if (class_exists ($className))
			return new $className();
		else
		{
			echo "Class is not exist: {$className}\n";
			return false;
		}
	}

	/**
	 * Get instance of Checker
	 * @param string $action	Action
	 * @return boolean|string Class name to check response || false if error
	 */
	public static function getResponseChecker($action)
	{
		$className = $action[0]. strtolower (substr($action,1))."Checker";
		if (class_exists ($className))
			return new $className();
		else
		{
			echo "Class is not exist: {$className}\n";
			return false;
		}
	}

	/**
	 * Main method to manage process
	 * @param string $clientPass	Client password
	 * @param array $requestParams Request parameters
	 * @return boolean||array	Result of check response
	 */
	public static function call($clientPass,$requestParams)
	{
		$sender = static::getSender($requestParams['action']);
		if (!is_object ($sender))
			return false;

		$result = $sender->send($clientPass,$requestParams);
		if ($result)
		{
			$checker = static::getResponseChecker($requestParams['action']);
			if (!is_object ($checker))
			    return false;

			return $checker->checkResponse($result);
		}
		else
		    return false;
	}
}

