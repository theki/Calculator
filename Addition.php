<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 13.09.14
 * Time: 11:43
 */
require_once 'Operation.php';

class Addition implements Operation
{
    public function calculate($a = 0, $b = 0)
    {
        return $a + $b;
    }
}