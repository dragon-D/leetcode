<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

	/**
	 * 最大子序和   动态规划
	 * @param Integer[] $nums
	 * @return Integer
	 */
	function maxSubArray($nums) {
		$len = count($nums);
		if($len == 1) return $nums[0];

		$n = [];
		$max = $nums[0];
		$m = 0;

		for($i = 0; $i < $len ; $i ++) {
			$m = $m + $nums[$i];
			if($m <= 0){
				$m = 0;
				$max = max($nums[$i],$max);
			}else{
				$max = max($m, $max);
				echo $i,"\n";
			}

		}

//		print_r($max);
		return $max;
	}
}

echo (new Solution())->maxSubArray([-2,1,-3,4,-1,2,1,-5,4]);      //6
//echo (new Solution())->maxSubArray([-2,4,-3,4,-1,2,1,-5,4]);    // 7
//echo (new Solution())->maxSubArray([-2,4,-1,4,5]);    // 6
//echo (new Solution())->maxSubArray([-2,-1]);    // 6


