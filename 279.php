<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */


class Solution {

	/**
	 * 完全平方数 bfs
	 * 一. 获取一个数的最大平方数作为一个边值
	 * @param Integer $n
	 * @return Integer
	 */
	function numSquares($n) {
		if($n < 1) return 0;

		$sqrt = sqrt($n);
		if(strpos($sqrt,'.') === false) return 1;

		$q = new SplQueue();
		$q->enqueue([floor($sqrt),0, 0]);  //初始化一个边界值大小，和，次数


		while ($q->isEmpty() == false) {
			[$v, $sum,$step] = $q->dequeue();
			for($i = $v; $i >=1 ;$i--) {
				$str = pow($i, 2);
				$res = $str + $sum;
				if($res == $n) {
					return $step + 1;
				}

				if(isset($arr[$res]) || $res > $n) {
					continue;
				}
				$arr[$res] = '';
				$q->enqueue([$i, $res, $step + 1]);
			}
		}
	}

	public function bfs($n) {

	}
}

echo (new Solution())->numSquares(47);