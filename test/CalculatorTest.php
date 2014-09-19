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

        $calc = new Calculator('(2+3)*(4-5)');
        $this->assertEquals(-5, $calc->calculate());

        $calc = new Calculator('-(2+3)*(4-5)');
        $this->assertEquals(5, $calc->calculate());

        $calc = new Calculator('-4*(2+3)*(4-5)');
        $this->assertEquals(20, $calc->calculate());

        $calc = new Calculator('-4*(2+3)*(4-5)/4');
        $this->assertEquals(5, $calc->calculate());
    }
}