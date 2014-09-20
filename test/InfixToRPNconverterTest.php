<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 19.09.14
 * Time: 20:31
 */

require_once '../InfixToRPNconverter.php';

class InfixToRPNTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf('InfixToRPNconverter', new InfixToRPNconverter());
    }

    public function testConvertInfixToRPN()
    {
        $converter = new InfixToRPNconverter();

        $formula = '(2+3)*(2-1)+3';
        $result = $converter->convert($formula);
        $expected = array('2', '3', '+', '2', '1', '-', '*', '3', '+');
        $this->assertEquals(implode('', $expected), implode('', $result));

        $formula = '(2+3)-5*1';
        $result = $converter->convert($formula);
        $expected = array('2', '3', '+', '5', '1', '*', '-');
        $this->assertEquals(implode('', $expected), implode('', $result));

        $formula = '(2+3)*(2-1)+3';
        $result = $converter->convert($formula);
        $expected = array('2', '3', '+', '2', '1', '-', '*', '3', '+');
        $this->assertEquals(implode('', $expected), implode('', $result));

        $formula = '(2-1)*(3-1)+5-(3-2)*(3-1)';
        $result = $converter->convert($formula);
        $expected = array('2', '1', '-', '3', '1', '-', '*', '5', '+', '3', '2', '-', '3', '1', '-', '*', '-');
        $this->assertEquals(implode('', $expected), implode('', $result));

        $formula = '(2-1)*(3-1)+5-(3-2)*(3-1)';
        $result = $converter->convert($formula);
        $expected = array('2', '1', '-', '3', '1', '-', '*', '5', '+', '3', '2', '-', '3', '1', '-', '*', '-');
        $this->assertEquals(implode('', $expected), implode('', $result));
    }

    public function testMultiplications()
    {
        $converter = new InfixToRPNconverter();

        $formula = '2*3*2';
        $result = $converter->convert($formula);
        $expected = array('2', '3', '*', '2', '*');
        $this->assertEquals(implode('', $expected), implode('', $result));

        $formula = '2*3*2-1';
        $result = $converter->convert($formula);
        $expected = array('2', '3', '*', '2', '*', '1', '-');
        $this->assertEquals(implode('', $expected), implode('', $result));

        $formula = '1+2*3*2';
        $result = $converter->convert($formula);
        $expected = array('1', '2', '3', '*', '2', '*', '+');
        $this->assertEquals(implode('', $expected), implode('', $result));
    }

} 