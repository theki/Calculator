<?php
/**
 * Created by PhpStorm.
 * User: theki
 * Date: 19.09.14
 * Time: 20:30
 */

/**
 * Class InfixToRPNconverter
 *
 * Class responsible for convert from infix notation to
 * reverse polish notation
 */
class InfixToRPNconverter {

    public function convert($formula)
    {
        $content = $this->_divideFormula($formula);
        $output = $this->_convertInfixToRPN($content);
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

    private function _isParenthesesOpen($char)
    {
        return $char == '(' ? true : false;
    }

    private function _isParenthesesClose($char)
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

    private function _convertInfixToRPN($content)
    {
        $stack = array();
        $output = array();
        foreach ($content as $part) {
            if ($this->_isParenthesesOpen($part)) {
                array_push($stack, $part);
            } else if ($this->_isParenthesesClose($part)) {
                $this->_performParentheses($stack, $output);
            } else if ($this->_isDigit($part)) {
                array_push($output, $part);
            } else if ($this->_isOperation($part)) {
                $this->_performOperation($stack, $output, $part);
            }
        }
        while ($last = array_pop($stack)) {
            array_push($output, $last);
        }
        return $output;
    }

    private function _performOperation(&$stack, &$output, $part)
    {
        if (empty($stack)) {
            array_push($stack, $part);
            return;
        }
        $last = array_pop($stack);
        if ($this->_isParenthesesOpen($last)) {
            array_push($stack, $last);
            array_push($stack, $part);
        } else if ($this->_isOperation($last)) {
            if ($this->_checkHigherPriority($part, $last)) {
                array_push($stack, $last);
                array_push($stack, $part);
            } else {
                array_push($output, $last);
                $last = array_pop($stack);
                while ($last != null && !$this->_checkHigherPriority($part, $last) && !$this->_isParenthesesOpen($last)) {
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

    private function _performParentheses(&$stack, &$output)
    {
        $last = array_pop($stack);
        while (!$this->_isParenthesesOpen($last)) {
            array_push($output, $last);
            $last = array_pop($stack);
        }
    }
} 