<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 19.09.14
 * Time: 21:50
 */

require_once 'Operation.php';

class Division implements Operation
{
    public function calculate($a = 0, $b = 1)
    {
        if ($b == 0) {
            throw new Exception('Division by zero.');
        }
        return $a / $b;
    }
} 