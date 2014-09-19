<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 19.09.14
 * Time: 20:30
 */

class InfixToRPNconverter {

    public function convertInfixToRPN($formula)
    {
        $stack = array();
        $output = array();
        $content = $this->_divideFormula($formula);
        foreach ($content as $part) {
            if ($this->_isParenthaseOpen($part)) {
                array_push($stack, $part);
            } else if ($this->_isParenthaseClose($part)) {
                $last = array_pop($stack);
                while (!$this->_isParenthaseOpen($last)) {
                    array_push($output, $last);
                    $last = array_pop($stack);
                }
            } else if ($this->_isDigit($part)) {
                array_push($output, $part);
            } else if ($this->_isOperation($part)) {
                if (empty($stack)) {
                    array_push($stack, $part);
                } else {
                    $last = array_pop($stack);
                    if ($this->_isParenthaseOpen($last)) {
                        array_push($stack, $last);
                        array_push($stack, $part);
                    } else if ($this->_isOperation($last)) {
                        if ($this->_checkHigherPriority($part, $last)) {
                            array_push($stack, $last);
                            array_push($stack, $part);
                        } else {
                            array_push($output, $last);
                            $last = array_pop($stack);
                            while ($last != null && !$this->_checkHigherPriority($part, $last) && !$this->_isParenthaseOpen($last) ) {
                                array_push($output, $last);
                                $last = array_pop($stack);
                            }
                            if ($this->_checkHigherPriority($part, $last)) {
                                array_push($stack, $last);
                            }
                            array_push($stack, $part);
                        }
                    }
                }
            }
        }
        while ($last = array_pop($stack)) {
            array_push($output, $last);
        }
        return $output;
    }

    private function _divideFormula($formula)
    {
        $divided = array();
        while (strlen($formula)) {
            preg_match('/^(\d+)|\(|\)|[+\-\*\/]/', $formula, $match);
            $piece = $match[0];
            $divided[] = $piece;
            $formula = substr($formula, strpos($formula, $piece) + strlen($piece));
        }
        return $divided;
    }

    private function _isParenthaseOpen($char)
    {
        return $char == '(' ? true : false;
    }

    private function _isParenthaseClose($char)
    {
        return $char == ')' ? true : false;
    }

    private function _isDigit($char)
    {
        return preg_match('/^\d+$/', $char);
    }

    private function _isOperation($part)
    {
        return in_array($part, array('+', '-', '*', '/'));
    }

    private function _checkHigherPriority($higher, $lower)
    {
        switch ($higher) {
            case '*':
            case '/':
                return in_array($lower, array('+', '-'));
            case '+':
            case '-':
                return false;
        }
    }
} 