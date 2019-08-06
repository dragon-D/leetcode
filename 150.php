<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

	/**
	 * 逆波兰表达式求值 栈的方式最大o(n)
	 * @param String[] $tokens
	 * @return Integer
	 */
	function evalRPN($tokens) {
		$len = count($tokens);
		$stack = [];
		$op['+'] = '+';
		$op['-'] = '-';
		$op['*'] = '*';
		$op['/'] = '/';
		for ($i = 0; $i < $len ; $i++) {
			if(isset($op[$tokens[$i]])){
				$s1 = array_pop($stack);
				$s2 = array_pop($stack);
				switch ($tokens[$i]){
					case '+' :
						$v = floor($s1 + $s2);
						break;
					case '-' :
						$v = floor($s2 - $s1);
						break;
					case '*' :
						$v = floor($s1 * $s2);
						break;
					case '/' :
						$v = sprintf("%d",$s2 / $s1);
						break;
				}
				array_push($stack,$v);
			} else {
				array_push($stack,$tokens[$i]);
			}
		}
		return $stack[0];
	}
}

//(new Solution())->evalRPN(  ["4", "13", "5", "/", "+"] );  //  6
//(new Solution())->evalRPN( ["4", "13", "5", "/", "+"]);  //  9
echo (new Solution())->evalRPN( ["10","6","9","3","+","-11","*","/","*","17","+","5","+"]); // 22   10 * (6 / ((9+3) * -11)) + 17 + 5


