<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

	/**
	 * 目标和
	 * @param Integer[] $nums
	 * @param Integer $S
	 * @return Integer
	 */
	function findTargetSumWays($nums, $S) {
		$this->n = 0;
		if(array_sum($nums) == $S)  $this->n++;
		$this->len = count($nums);
		$this->op = str_repeat('+',$this->len);
		$this->bfs($nums, $S);
		return $this->n;
	}

	public function bfs($num, $s) {
		for($i = 0; $i < $this->len; $i ++) {
			$this->op[$i] = '-';
			$num[$i] = -$num[$i];
			if(isset($this->arr[$this->op])){
				$this->op[$i] = '+';
				continue;
			}
			$this->arr[$this->op] = '';
			if(array_sum($num) == $s) $this->n++;
			$this->bfs($num, $s);
			$num[$i] = $num[$i];
			$this->op[$i] = '+';
		}
	}

	public function test($nums, $S) {
		$this->n = 0;
		$this->nums = $nums;

		$this->len = count($nums);
		$this->op = str_repeat('+',$this->len);
		$this->dfs($nums, $S, 0, 0);
//		print_r(count($this->a));
		return $this->n;
	}

	public function dfs($nums, $s, $n, $sum) {
		if($n > $this->len - 1){
			if($sum == $s) {
				$this->n++;
			}
			return;
		}

//		if($sum + array_sum(array_slice($nums,$n - 1)) > $s) {
//			return;
//		}
//		if(isset($this->a[$sum .'-'. $n])) return;

		$this->a[$sum .'-'. $n] = 1;

		$str1 = $sum + $nums[$n];
		$str2 = $sum - $nums[$n];
		$this->dfs($nums, $s, $n + 1, $str1 );
		$this->dfs($nums, $s, $n + 1, $str2 );
	}

	function test2($nums, $s) {
		$this->len = count($nums);
		$this->op = str_repeat('+',$this->len);
		$this->n = 0;
		$this->dfs2($nums, $s, 0);
//		print_r($this->a);
		return $this->n;
	}

	public function dfs2($num, $s, $n) {

		for($i = $n; $i < $this->len; $i ++) {
			$num[$i] = -$num[$i];
			if(isset($this->a[implode(',',$num)])) {

//				continue;
			}

			$this->a[implode(',',$num)] = 1;
			$this->dfs2($num, $s, $i+ 1);
			$num[$i] = -$num[$i];
		}
		if(array_sum($num) == $s) {
			$this->n++;
		}
	}
}

//echo (new Solution())->findTargetSumWays([1,1,1,1,1],3);  //5
//echo (new Solution())->findTargetSumWays([1,0],1); //2
//echo (new Solution())->findTargetSumWays([0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1],1); //2
//echo (new Solution())->findTargetSumWays([1,2,0,4,5],2); //4


//echo (new Solution())->test([1,1,1,1,1],3);  //5
//echo (new Solution())->test([1,2,0,4,5],2); //4
//echo (new Solution())->test([1,0],1); //2
//echo (new Solution())->test([20,48,33,16,19,44,14,31,42,34,38,32,27,7,22,22,48,18,48,39],1); // 0
//echo (new Solution())->test([14,23,35,48,10,39,34,40,36,45,11,14,41,6,4,17,42,22,0,35],44); // 5844



//echo (new Solution())->test2([0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1],1); // 524288
//echo (new Solution())->test2([38,21,23,36,1,36,18,3,37,27,29,29,35,47,16,0,2,42,46,6],14); // 6316
//echo (new Solution())->test2([38,21,23,36,1,36,18,3,37,27,29,29,35,47,16,0,2,42,46,6], 14); // 6316
//echo (new Solution())->test2([1,2,0,4,5], 2);  //4
echo (new Solution())->test2([14,23,35,48,10,39,34,40,36,45,11,14,41,6,4,17,42,22,0,35],44); // 0
//echo (new Solution())->test2([1,1,1,1,1,1,1,1,1,1],3);  //5


