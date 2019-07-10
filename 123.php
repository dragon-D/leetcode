<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

	/**
	 * @param Integer[] $prices
	 * @return Integer
	 */
	function maxProfit($prices) {
		if(count($prices) <= 1) return 0;

		$buy = $prices[0];
		$sum = 0;
		[$dp_1_0,$dp_2_0] = [0,0];   //没有股票 卖出
		[$dp_1_1,$dp_2_1] = [-PHP_INT_MAX, -PHP_INT_MAX];


		foreach ($prices as $k => $v) {
			//
			$dp_1_1 = max($dp_1_1, -$v);
			$dp_1_0 = max($dp_1_0, $dp_1_1 + $v);


			$dp_2_0 = max($dp_2_0, $dp_2_1 + $v);
			$dp_2_1 = max($dp_2_1, $dp_1_0 - $v);
			if($k > 0) {
				echo $dp_1_1,$dp_1_0,"=",$dp_2_1,$dp_2_0,"\n";
			}

		}

		print_r($dp_2_0);
		exit;
	}

	public function next($prices) {
		$n = count($prices);
		$dp_i_0 = 0;
		$dp_i_1 = 0;
		$dp_pre_0 = 0;
		for($i = 0; $i < $n; $i++) {
			$tmp = $dp_i_0;
			$dp_i_0 = max($dp_i_0, $dp_i_1 + $prices[$i]);
			$dp_i_1 = max($dp_i_1, $dp_pre_0 - $prices[$i]);
			$dp_pre_0 = $tmp;
		}

		echo $dp_pre_0;
	}

	public function test2($prices) {
		$n = count($prices);

		$k_max = 2;
//		$dp = array_fill(0,$n,[]);
		for($j = 0; $j <= $k_max + 1; $j ++){
			[$dp[0][$j][0], $dp[0][$j][0]] = [0,0];
			[$dp[0][$j][1], $dp[0][$j][1]] = [-$prices[0], -$prices[0]];
		}

		for($i = 0; $i < $n; $i++) {
			for($j = $k_max; $j >= 1;$j--){
				@$dp[$i][$j][0] = max($dp[$i - 1][$j][0], $dp[$i - 1][$j][1] + $prices[$i]);    	// shell
				@$dp[$i][$j][1] = max($dp[$i - 1][$j][1], $dp[$i - 1][$j  -1][0] - $prices[$i]);  // buy
			}
		}
		print_r($dp[$n -1][$k_max][0]);
	}

	public function test3($prices) {
		$n = count($prices);
		$k_max = 2;
		for($j = 0; $j <= $k_max + 1; $j ++){
			[$dp[0][$j][0], $dp[0][$j][0]] = [0,0];
			[$dp[0][$j][1], $dp[0][$j][1]] = [-$prices[0], -$prices[0]];
		}

		foreach($prices as $k => $v){
			if($k == 0) continue;
			for($j = $k_max; $j >= 1; $j--) {
				$a = $dp[$k][$j - 1][1] + $v;
				echo $a,"\n";

//				if($a <= 0){
//					@$dp[$k][$j][1] = -$v;
//				}else{
//					@$dp[$k][$j][0] = max($dp[$k][$j][0], $a);
//				}
			}
		}
		print_r($dp[$n-1]);
	}
}


//(new Solution())->test2([7,3,5,3,6,1,1,8,10,3,3]);  //12
//(new Solution())->test2([7,3,5,3,6,4,1,8,10,3,14]);  //20
//(new Solution())->test2([7,3,5,3,6,4,11,8,10,13,14]);  //14
//(new Solution())->maxProfit([1,4,1, 5]);  //14
//(new Solution())->maxProfit([7,1,5,3,6,4]);  //7
//(new Solution())->maxProfit([1,2,3,4,5]);  //4
(new Solution())->test3([1,2,4,1,2,5,1,2,3,1,2,6]);  //9   //12
//(new Solution())->test2([1,2,4,2,5,7,2,4,9,0]);  //13



