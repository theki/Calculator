<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 13.09.14
 * Time: 11:55
 */

require_once '../Multiplication.php';

class MultiplicationTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf('Multiplication', new Multiplication());
    }

    public function testCalculate()
    {
        $mult = new Multiplication();
        $this->assertEquals(12, $mult->calculate(3, 4));
        $this->assertEquals(-12, $mult->calculate(3, -4));
    }
}