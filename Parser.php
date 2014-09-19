<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 12.09.14
 * Time: 20:29
 */

class Parser {

    public function validate($formula)
    {
        if (!preg_match('/^[+*\-\/0-9()]*$/', $formula)) {
            throw new Exception('Bad format of formula.');
        }
        if (preg_match('/[+\-*]{2,}/', $formula)) {
            throw new Exception('Bad format of formula.');
        }
    }

    public function parse($formula)
    {
        $formula = preg_replace('/^-\(/', '(0-1)*(', $formula);
        $formula = preg_replace('/^-(\d+)/', '(0-${1})', $formula);
        $formula = preg_replace('/\(-(\d+)\)/', '(0-${1})', $formula);

        return $formula;
    }
} 