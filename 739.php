<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

	/**
	 * 每日温度 栈方式
	 * @param Integer[] $T
	 * @return Integer[]
	 */
	function dailyTemperatures($T) {
		$len = count($T);
		$stack = new SplStack();
		$stack->push($len-1);
		$arr = array_fill(0,$len,0);
		for ($i = $len - 2;$i>=0; $i--) {

			if($T[$stack->top()] <= $T[$i]){
				$stack->pop();
				while (!$stack->isEmpty()) {
					$pop = $stack->pop();
					if($T[$pop] > $T[$i]) {
						$stack->push($pop);
						$arr[$i] = $pop - $i;
						break;
					}
				}
				$stack->push($i);
			} else {
				$arr[$i] = $stack->top() - $i;
				$stack->push($i);
			}
		}
		return $arr;
	}

	/**
	 * 暴力法 容易超时
	 * @param Integer[] $T
	 * @return Integer[]
	 */
	function dailyTemperatures2($T) {
		$len = count($T);
		$stack = [];
		$max = $T[$len - 1];

		for ($i = $len - 1;$i>=0; $i--) {

			if($i == $len - 1) {
				$arr[$i] = 0;
				continue;
			}
			$max = max($max, $T[$i]);
			if($T[$i] < $T[$i + 1]){
				$arr[$i] = 1;
			}else if ($T[$i] >= $max){
				$arr[$i] = 0;
			} else {
				$left = $i;
				while ($left < $len) {
					if($T[$i] < $T[$left]){
						$arr[$i] = $left - $i;
						break;
					}
					$left++;
				}

			}
			$stack[] = $i;
		}
		ksort($arr);
		return $arr;
	}
}
//根据每日 气温 列表，请重新生成一个列表，对应位置的输入是你需要再等待多久温度才会升高超过该日的天数。如果之后都不会升高，请在该位置用 0 来代替。
//
//例如，给定一个列表 temperatures = [73, 74, 75, 71, 69, 72, 76, 73]，你的输出应该是 [1, 1, 4, 2, 1, 1, 0, 0]。
//例如，给定一个列表 temperatures = [73, 74, 75, 71, 69, 71, 76, 73]，你的输出应该是 [1, 1, 4, 3, 1, 1, 0, 0]
//例如，给定一个列表 temperatures = [55,38,53,81,61,93,97,32,43,78]，你的输出应该是 [3,1,1,2,1,1,0,1,1,0]
//
//提示：气温 列表长度的范围是 [1, 30000]。每个气温的值的均为华氏度，都是在 [30, 100] 范围内的整数。

//(new Solution())->dailyTemperatures( [55,38,53,81,61,93,97,32,43,78]);    //[3,1,1,2,1,1,0,1,1,0]
(new Solution())->dailyTemperatures( [89,62,70,58,47,47,46,76,100,70]);    // [8,1,5,4,3,2,1,1,0,0]
//(new Solution())->dailyTemperatures([79, 74, 75, 71, 69, 72, 76, 73]);    // [1, 1, 4, 2, 1, 1, 0, 0]
//(new Solution())->dailyTemperatures ([73, 74, 75, 71, 69, 71, 76, 73]);    // [1, 1, 4, 3, 1, 1, 0, 0]

