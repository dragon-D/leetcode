<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

/* 搜索旋转排序数组 */
class Solution {

	/**
	 * @param Integer[] $nums
	 * @param Integer $target
	 * @return Integer
	 */
	function search($nums, $target) {
		$len = count($nums);
		if($len < 1) return -1;
		$left = 0;
		$right = $len;
		$luoxuan = $len;
		while ($left < $right) {
			$mid = floor(($right + $left) / 2);
			if($nums[$mid] == $target){
				return $mid;
			}

			if($nums[$mid] < $nums[0] && $nums[$mid] < $nums[$mid - 1]) {
				$luoxuan = $mid;
				break;
			}

			if($nums[$mid] < $nums[0])
				$right = $mid;
			else
				$left = $left + 1;
		}

		if($nums[0] <= $target){
			$right = $luoxuan;
			$left = 0;
		} else {
			$left = $luoxuan;
			$right = $len;
		}

		while ($left < $right) {
			$mid = floor(($right + $left) / 2);
			if($nums[$mid] == $target)	return $mid;

			if($nums[$mid] < $target)
				$left = $left + 1;
			else
				$right = $mid;
		}

		return -1;
	}

}



echo (new Solution())->search([11,1,2,3,4], 1);