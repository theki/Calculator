<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 19.09.14
 * Time: 15:19
 */

require_once '../RPN.php';

class RPNTest  extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf('RPN', new RPN());
    }

    public function testCalculate()
    {
        $rpn = new RPN();

        $expression = array('2', '1', '+', '3', '*', '4', '7', '4', '+', '*', '-');
        $result = $rpn->calculate($expression);
        $this->assertEquals(-35, $result);

        $expression = array('3', '4', '+', '8', '3', '2', '*', '*', '+');
        $result = $rpn->calculate($expression);
        $this->assertEquals(55, $result);

        $expression = array('2', '3', '+', '5', '1', '*', '-');
        $result = $rpn->calculate($expression);
        $this->assertEquals(0, $result);

        $expression = array('1', '3', '*', '5', '2', '*', '+', '3', '-');
        $result = $rpn->calculate($expression);
        $this->assertEquals(10, $result);

        $expression = array('2', '3', '+', '2', '1', '-', '*', '3', '+');
        $result = $rpn->calculate($expression);
        $this->assertEquals(8, $result);

        $expression = array('3', '5', '-');
        $result = $rpn->calculate($expression);
        $this->assertEquals(-2, $result);

        $expression = array('0', '1', '-', '2', '1', '-', '*');
        $result = $rpn->calculate($expression);
        $this->assertEquals(-1, $result);
    }
} 