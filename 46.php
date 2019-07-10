<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

/* 全排列   */
class Solution {

	/**
	 * 回溯法
	 * @param Integer[] $nums
	 * @return Integer[][]
	 */
	function permute($nums) {
		if(empty($nums)) return [];

		$len = count($nums);
		if($len == 1) return [$nums];
		$output = [];

		$fun = function ($first = 0) use (&$output, $len, &$nums, &$fun){
			if ($first == $len) {
//				print_r(json_encode($nums));
				$output[implode('',$nums)] = $nums;
				return;
			}

			for($i = $first;$i< $len;$i++){
				[$nums[$first],$nums[$i]] = [$nums[$i],$nums[$first]];
				$fun($first + 1);
				[$nums[$first],$nums[$i]] = [$nums[$i],$nums[$first]];

			}
		};
		$fun();
//		print_r($output);
		return $output;
	}

	/* 用下一个排列方式求全排列 */
	function test($nums) {
		if(empty($nums)) return [];
		sort($nums);
		$len = count($nums);
		return $this->swap($nums,$len);
	}

	public function swap($nums, $len) {

		if($len == 1) return [$nums];
		$r = $len - 1;
		while ($r > 0) {
			if($nums[$r] > $nums[$r - 1]){
				$a = $r -1;
				$rr = $len - 1;
				while ($rr > 0) {
					if($nums[$rr] > $nums[$a]) {
						$b = $rr;
						break;
					}
					$rr--;
				}
				break;
			}
			$r--;
		}

		if(!isset($a)){
			sort($nums);
			$this->arr[] = $nums;
			return  $this->arr;
		}else{

			[$nums[$a], $nums[$b]] = [$nums[$b], $nums[$a]];
			$alert = array_slice($nums,$a+1);
			sort($alert);
			for($i=0;$i<count($alert);$i++){
				$nums[$i + $a+1] = $alert[$i];
			}
			$this->arr[] = $nums;
			return $this->swap($nums, $len);
		}
	}

}

print_r(json_encode((new Solution())->test([1,1,8,1,8])));

//print_r(range(3,3));