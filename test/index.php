<?php

use Ngomafortuna\NumberFormatter\NumberFormatter;

require_once dirname(__FILE__, 2) . "/vendor/autoload.php";

echo PHP_EOL;
echo PHP_EOL;

$value = 10000000000000;

$number = new NumberFormatter;

var_dump($number->byte($value));