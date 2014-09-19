<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 19.09.14
 * Time: 21:52
 */

class DivisionTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf('Division', new Division());
    }

    public function testCalculate()
    {
        $div = new Division();
        $this->assertEquals(2, $div->calculate(2, 1));
        $this->assertEquals(2, $div->calculate(4, 2));
        $this->assertEquals(0.5, $div->calculate(2, 4));
        $this->assertEquals(3, $div->calculate(2.1, 0.7));
    }
} 