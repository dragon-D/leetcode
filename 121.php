<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

	/**
	 *  买卖股票的最佳时机 动态规划
	 * @param Integer[] $prices
	 * @return Integer
	 */
	function maxProfit($prices) {
		if(count($prices) == 1) return 0;
		$buy = $prices[0];
		$max = 0;
//		$n = $prices;
		foreach ($prices as $k => $v) {
			if($k < 0) continue;
			//  卖出价格
			if($v - $buy <= 0){
				$buy = $v;
			} else {
				$max = max( $v - $buy, $max);

			}
		}
		echo $max;
	}

	public function test($prices) {
		if(count($prices) == 1) return 0;
		$n = count($prices);
		$dp_i_0 = 0;
		$dp_i_1 = -$prices[0];
		for ($i = 0; $i < $n; $i++) {
			if ($i - 1 == -1) {
				continue;
			}
			$dp_i_0 = max($dp_i_0, $dp_i_1 + $prices[$i]);
			$dp_i_1 = max($dp_i_1, -$prices[$i]);
		}

    	return $dp_i_0;
	}

	public function test1($prices) {
		$dp_1_0 = 0;
		$dp_1_1 = -PHP_INT_MAX;
		foreach ($prices as $k => $v) {
			$dp_1_1 = max($dp_1_1, -$v);
			$dp_1_0 = max($dp_1_0, $dp_1_1 + $v);
		}
		echo $dp_1_0;
	}



}

//(new Solution())->test1([7,6,4,3,1]);  //0
(new Solution())->maxProfit([7,1,5,3,6,4]);  //5
//(new Solution())->test1([1,2]);  //1