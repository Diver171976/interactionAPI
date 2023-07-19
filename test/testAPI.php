<?php

/*
 * Simple test
 */

require_once dirname(dirname(__FILE__)).'/src/APIManager.php';

$requestParams = require_once dirname(__FILE__).'/testParams.php';
$clientPass = 'd0ec0beca8a3c30652746925d5380cf3';

$result = APIManager::call($clientPass, $requestParams);

echo "Result=";
var_dump($result);
