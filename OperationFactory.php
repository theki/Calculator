<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 13.09.14
 * Time: 12:30
 */
require_once 'Addition.php';
require_once 'Subtraction.php';
require_once 'Multiplication.php';

class OperationFactory
{
    const OPERATION_ADDITION = '+';
    const OPERATION_SUBTRACTION = '-';
    const OPERATION_MULTIPLICATION = '*';

    public static function createOperation($type)
    {
        switch( $type ) {
            case self::OPERATION_ADDITION:
                return new Addition();
                break;
            case self::OPERATION_SUBTRACTION:
                return new Subtraction();
                break;
            case self::OPERATION_MULTIPLICATION:
                return new Multiplication();
                break;
            default:
                return null;
        }
    }
} 