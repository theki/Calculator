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

    public function testValidate()
    {
        $parser = new Parser();
        $formula = '1+2*3+4-23+33*55';

        $this->assertTrue($parser->validate($formula));
        $formula1 = $formula.'+-3';
        $this->assertFalse($parser->validate($formula1));
        $formula2 = $formula.'+*3';
        $this->assertFalse($parser->validate($formula2));
    }

    public function testComputeMultiplication()
    {
        $parser = new Parser();
        $this->assertEquals('121', $parser->computeMultiplications('11*11'));
        $this->assertEquals('1+6+4-23+1815', $parser->computeMultiplications('1+2*3+4-23+33*55'));
        $this->assertEquals('1-6+4-23-1815', $parser->computeMultiplications('1-2*3+4-23-33*55'));
        $this->assertEquals('24-23+33', $parser->computeMultiplications('1*2*3*4-23+33'));
    }

    public function testComputeAddition()
    {
        $parser = new Parser();
        $this->assertEquals('22', $parser->computeAddition('11+11'));
        $this->assertEquals('3-7', $parser->computeAddition('1+2-3+4'));
        $this->assertEquals('10', $parser->computeAddition('1+2+3+4'));
    }

    public function testComputeSubtraction()
    {
        $parser = new Parser();
        $this->assertEquals('1', $parser->computeSubtraction('12-11'));
        $this->assertEquals('3', $parser->computeSubtraction('10-3-4'));
    }

    public function testCompute()
    {
        $parser = new Parser();
        $this->assertEquals('1-6+4-23+1815', $parser->compute('1-2*3+4-23+33*55', OperationFactory::OPERATION_MULTIPLICATION));
        $this->assertEquals('3-7', $parser->compute('1+2-3+4', OperationFactory::OPERATION_ADDITION));
        $this->assertEquals('3', $parser->compute('10-3-4', OperationFactory::OPERATION_SUBTRACTION));
    }

    public function testParse()
    {
        $parser = new Parser();
        $this->assertEquals('1841', $parser->parse('1+2*3+23+33*55-4'));
    }
}