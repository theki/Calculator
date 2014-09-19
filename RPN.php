<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 19.09.14
 * Time: 15:21
 */

require_once 'OperationFactory.php';

class RPN {

    public function calculate($expression)
    {
        $stack = array();
        foreach ($expression as $part) {
            if (in_array($part, array('+', '-', '*', '/'))) {
                $b = array_pop($stack);
                $a = array_pop($stack);
                $operation = OperationFactory::createOperation($part);
                $result = $operation->calculate($a, $b);
                array_push($stack, $result);
            } else {
                array_push($stack, $part);
            }
        }
        return $stack[0];
    }
} 