<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

	/**
	 * @param String $num1
	 * @param String $num2
	 * @return String
	 */
	function multiply($num1, $num2) {
		if($num1 == 0 || $num2 == 0) return '0';
		$n = strlen($num1);
		$m = strlen($num2);
		$num1 = str_split(strrev($num1));
		$num2 = str_split(strrev($num2));


		$total = $n + $m ;
		$arr = array_fill(0,$total,0);
		for($i = 0;$i < $n; $i++){
			for($l = 0; $l < $m; $l++){
				$current = $l + $i;
				$s =  $num1[$i] * $num2[$l];
				if($s > 9){
					$arr[$current] = $arr[$current] + $s % 10;
					$arr[$current + 1] = $arr[$current+1] + ($s - ($s % 10)) / 10;
				} else {
					$arr[$current] =  $arr[$current] + $s;
				}

				if($arr[$current] > 9){
					$s = $arr[$current];
					$arr[$current] = $s % 10;
					$arr[$current + 1] = $arr[$current + 1] + ($s - ($s % 10)) / 10;
				}

			}
		}

		if(end($arr) === 0) array_pop($arr);

		return strrev(implode('',$arr));
	}
}

echo (new Solution())->multiply('999',"999");   //   "998001"
//echo (new Solution())->multiply('123',"456");   //   "56088"