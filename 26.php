<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

/*   删除排序数组中的重复项 */
class Solution {

	/**
	 * @param Integer[] $nums
	 * @return Integer
	 */
	function removeDuplicates(&$nums) {
		$left = 0;
		if(count($nums) < 1) return 0;
		$right = count($nums) -1;
		$i = 1;
		while ($left < $right) {

			if($nums[$left] == $nums[$left + 1]){
				unset($nums[$left]);
				$left++;
				continue;
			}
			$left++;
			$i++;
		}
		print_r($nums);
		return count($nums);
	}
}

$s = [0,0,1,1,1,2,2,3,3,4];
echo (new Solution())->removeDuplicates($s);
