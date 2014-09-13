<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 13.09.14
 * Time: 14:46
 */

require_once '../Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf('Calculator', new Calculator(''));
    }

    public function testCalculate()
    {
        $calc = new Calculator('2*5+3*10*2-4*3');
        $this->assertEquals(58, $calc->calculate());
    }
}