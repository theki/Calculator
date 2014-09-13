<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 12.09.14
 * Time: 20:29
 */

require_once 'OperationFactory.php';

class Parser {

    public function validate($formula)
    {
        if (!preg_match('/^[+*\-0-9]*$/', $formula)) {
            return false;
        }
        if (preg_match('/[+\-*]{2,}/', $formula)) {
            return false;
        }

        return true;
    }

    public function parse($formula)
    {
        $formula = $this->computeMultiplications($formula);
        $formula = $this->computeAddition($formula);
        $formula = $this->computeSubtraction($formula);

        return $formula;
    }

    public function computeMultiplications($formula)
    {
        return $this->compute($formula, OperationFactory::OPERATION_MULTIPLICATION);
    }

    public function computeAddition($formula)
    {
        return $this->compute($formula, OperationFactory::OPERATION_ADDITION);
    }

    public function computeSubtraction($formula)
    {
        return $this->compute($formula, OperationFactory::OPERATION_SUBTRACTION);
    }

    public function compute($formula, $type)
    {
        while (preg_match("/\d+\\$type\d+/", $formula, $match)) {
            $factors = preg_split("/\\$type/", $match[0]);
            $sub = OperationFactory::createOperation($type);
            $result = $sub->calculate($factors[0], $factors[1]);
            $formula = preg_replace('/'.preg_quote($match[0]).'/', $result, $formula, 1);
        }

        return $formula;
    }
} 