<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

	/**
	 * 买卖股票的最佳时机 II
	 * @param Integer[] $prices
	 * @return Integer
	 */
	function maxProfit($prices) {
		if(count($prices) <= 1) return 0;
		$buy = $prices[0];
		$max = 0;
		$sum = 0;
		foreach ($prices as $k => $v) {
			if($k < 1) continue;

			if($v -$buy < $max) {
				$buy = $v;
				$n[] = $max;
				$sum = $sum + $max;

				$max = 0;

			} else {
				$max = max($v-$buy, $max);

			}
		}
		echo  $max + $sum;
//		echo  $sum > $max ? $sum : $max;
	}
}
(new Solution())->maxProfit([7,1,5,3,6,4]);  //7
(new Solution())->maxProfit([1,2,3,4,5]);  //4
(new Solution())->maxProfit([7,6,4,3,1]);  //0
(new Solution())->maxProfit([6,1,3,2,4,7]);  //7
(new Solution())->maxProfit([2,1,2,0,1]);  //2