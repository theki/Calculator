<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 13.09.14
 * Time: 14:44
 */

require_once 'Parser.php';

class Calculator
{
    private $formula;

    function __construct($formula)
    {
        $this->formula = trim($formula);
    }

    public function calculate()
    {
        $parser = new Parser();
        $parser->validate($this->formula);
        return $parser->parse($this->formula);
    }
}