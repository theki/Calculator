<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 13.09.14
 * Time: 12:02
 */

require_once '../Subtraction.php';

class SubtractionTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf('Subtraction', new Subtraction());
    }

    public function testCalculate()
    {
        $sub = new Subtraction();
        $this->assertEquals(3, $sub->calculate(4, 1));
        $this->assertEquals(-1, $sub->calculate(4, 5));
    }
}