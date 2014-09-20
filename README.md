Calculator
==========

Simple Calculator implementation to perform +,-,*,/ operations based on Reverse Polish Notation (http://en.wikipedia.org/wiki/Reverse_Polish_notation).

It convert formula from infix notation e.g. 
(2-1)*(3-1)+5-(3-2)*(3-1)
to postfix notation (RPN): 
2 1 - 3 1 - * 5 + 3 2 - 3 1 - * -
using Shunting-yard algorithm: http://en.wikipedia.org/wiki/Shunting-yard_algorithm

There are couple of rules for conversion:
multiplication has higher priority than addition;
putting arithmetic operation on stack is possible only if the previous operation on stack has lower priority
if previous put arithmetic operation has higher or the same priority than move it to the output
perform previous step until the operation on stack will be lower or stack will be empty
open parenthesis put on stack, from now is like the stack is empty
digits put on output
close parenthesis cause getting everything from stack and put on output until the open parentheses is readed - it has to be removed

Usage: php calc.php (1+2)*(3+4)-5
