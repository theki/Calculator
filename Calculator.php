<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 13.09.14
 * Time: 14:44
 */

require_once 'Parser.php';
require_once 'InfixToRPNconverter.php';
require_once 'RPN.php';

class Calculator
{
    private $formula;

    function __construct($formula)
    {
        $this->formula = trim($formula);
    }

    public function calculate()
    {
        $this->parse();
        $rpnData = $this->preparePostfixNotation();
        return $this->calculateRPN($rpnData);
    }

    private function parse()
    {
        $parser = new Parser();
        $parser->validate($this->formula);
        $this->formula = $parser->parse($this->formula);
    }

    private function preparePostfixNotation()
    {
        $converter = new InfixToRPNconverter();
        return $converter->convert($this->formula);
    }

    private function calculateRPN($rpnData)
    {
        $rpn = new RPN();
        return $rpn->calculate($rpnData);
    }
}