<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 13.09.14
 * Time: 14:35
 */

require_once 'Calculator.php';

if ($argc < 2) {
    exit('Usage: php calc.php [formula]'.PHP_EOL);
}

$calculator = new Calculator($argv[1]);
echo $calculator->calculate().PHP_EOL;