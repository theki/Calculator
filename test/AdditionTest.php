<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 13.09.14
 * Time: 12:02
 */

require_once '../Addition.php';

class AdditionTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf('Addition', new Addition());
    }

    public function testCalculate()
    {
        $add = new Addition();
        $this->assertEquals(3, $add->calculate(2, 1));
        $this->assertEquals(-1, $add->calculate(4, -5));
    }
}