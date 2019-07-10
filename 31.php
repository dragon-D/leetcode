<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

/* 下一个排列 */
class Solution {

	public $arr = [];
	/**
	 * @param Integer[] $nums
	 * @return NULL
	 */
	function nextPermutation(&$nums) {
		if(empty($nums)) return [];

		$len = count($nums);
		if($len == 1) return $nums;
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
			$this->arr[] = $nums;print_r($this->arr);
			return  $nums;
		}else{

			[$nums[$a], $nums[$b]] = [$nums[$b], $nums[$a]];
			$alert = array_slice($nums,$a+1);
			sort($alert);
			for($i=0;$i<count($alert);$i++){
				$nums[$i + $a+1] = $alert[$i];
			}
			$this->arr[] = $nums;
			return $this->nextPermutation($nums);
		}
 	}
}


$arr = [3, 5, 8, 7, 6, 4];
//print_r((new Solution())->nextPermutation($arr));    // 364578
$arr = [1,2,3];
//print_r((new Solution())->nextPermutation($arr));    // 132
$arr = [3,2,1];
//print_r((new Solution())->nextPermutation($arr));    // 123
$arr = [1,1,5];
//print_r((new Solution())->nextPermutation($arr));    // 1,5,1
$arr = [3, 5, 8, 7, 6, 6 ];
//print_r((new Solution())->nextPermutation($arr));    // [3,6,5,6,7,8]
$arr = [0,-1,1];
print_r((new Solution())->nextPermutation($arr));    // [3,6,5,6,7,8]