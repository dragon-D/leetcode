<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */


/**
 * 有效的括号
 */
class Solution
{

	/**
	 * 栈字符串
	 * @param String $s
	 * @return Boolean
	 */
	function isValid($s)
	{
		$len = strlen($s);
		if ($len % 2 == 1) return false;
		$str['{'] = '}';
		$str['['] = ']';
		$str['('] = ')';
		$a = $b = '';
		for ($i = 0; $i < $len; $i++) {
			if (array_key_exists($s[$i], $str) !== false) {
				$a .= $s[$i];
			}
			else {
				if ($str[substr($a, -1)] == $s[$i])
					$a = substr($a, 0, strlen($a) - 1);

			}
		}
		return empty($a) ? true : false;
	}

	/**
	 * 栈处理方式
	 * @param String $s
	 * @return Boolean
	 */
	function stack($s)
	{
		$len = strlen($s);
		if ($len % 2 == 1) return false;
		$stack = [];
		$str['{'] = '}';
		$str['['] = ']';
		$str['('] = ')';
		for ($i = 0; $i < $len; $i++) {
			if(isset($str[$s[$i]])){
				array_push($stack,$s[$i]);
			} else {

				if($str[array_pop($stack)] != $s[$i]){
					return false;
				}
			}
		}
		return empty($stack) ? true : false;
	}
}


var_dump((new Solution())->stack("({{[}}})")); //false
//var_dump((new Solution())->stack("({{[]}})")); //true
//var_dump((new Solution())->isValid("()[]{}")); //true
var_dump((new Solution())->isValid("()")); //true
//var_dump((new Solution())->isValid("(]")); //false
//var_dump((new Solution())->isValid("{[]}")); //true
//var_dump((new Solution())->isValid("{{)}")); //false
//var_dump((new Solution())->isValid("(([]){})")); //true
//var_dump((new Solution())->isValid("({()({}){}[([{]])]})")); //false
//var_dump((new Solution())->isValid("({()({}){}[([])]})")); //true