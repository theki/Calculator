<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 12.09.14
 * Time: 19:45
 */
require_once '../Parser.php';

class ParserTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf('Parser', new Parser());
    }

    /**
     * @expectedException     Exception
     */
    public function testValidateBadFormula()
    {
        $parser = new Parser();
        $formula = '1+2*a+3+4-23+33*55';

        $parser->validate($formula);
    }

    /**
     * @expectedException     Exception
     */
    public function testValidateBadFormulaTwoOperation()
    {
        $parser = new Parser();
        $formula = '1+2*+3+4-23+33*55';

        $parser->validate($formula);
    }

    public function testParse()
    {
        $parser = new Parser();
        $this->assertEquals('(0-1)*(1+2)', $parser->parse(' - ( 1 + 2   ) '));
        $this->assertEquals('(0-1)*(1+2)', $parser->parse('-(1+2)'));
        $this->assertEquals('(0-3)*(1+2)', $parser->parse('-3*(1+2)'));
        $this->assertEquals('2*(0-3)*(1+2)', $parser->parse('2*(-3)*(1+2)'));
        $this->assertEquals('2*(0-3)*(1+2)*(0-1)', $parser->parse('2*(-3)*(1+2)*(-1)'));
    }
}