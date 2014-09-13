<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 13.09.14
 * Time: 12:32
 */

require_once '../OperationFactory.php';

class OperationFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testCreateAddition()
    {
        $this->assertInstanceOf('Addition', OperationFactory::createOperation(OperationFactory::OPERATION_ADDITION));
    }

    public function testCreateSubtraction()
    {
        $this->assertInstanceOf('Subtraction', OperationFactory::createOperation(OperationFactory::OPERATION_SUBTRACTION));
    }

    public function testCreateMultiplication()
    {
        $this->assertInstanceOf('Multiplication', OperationFactory::createOperation(OperationFactory::OPERATION_MULTIPLICATION));
    }

    public function testCreateUnknown()
    {
        $this->assertNull(OperationFactory::createOperation(''));
    }
} 