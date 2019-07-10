<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

/*  正方形数组的数目 */

class Solution
{

	/**
	 * 思路： 用回溯发求出所有全排序然后统计完全平方根组合 php计算平方根:sqrt()
	 * @param Integer[] $A
	 * @return Integer
	 */
	function numSquarefulPerms($A)
	{
		$len = count($A);
		if ($len == 1) return 1;
		$nums = 0;
		$this->arr = [];
		$fun = function ($f = 0) use ($len, &$A, &$nums, &$fun) {

			if ($f == $len ) {
				$k = implode('', $A);
				if(array_key_exists($k, $this->arr)) return;
				$this->arr[$k] = 1;
				$nums++;
				return;
			}
			for ($i = $f; $i < $len; $i++) {
				if ($i != $f and $A[$i] == $A[$f])
					continue;
//				if($i < ($len - 1) && $A[$i] == $A[$i + 1]) {
//					continue;
//				};
				[$A[$f], $A[$i]] = [$A[$i], $A[$f]];

				//平方根计算
//				if( $f == 0 or ((($A[$f] + $A[$f-1])** 0.5) ** 2 == ($A[$f] + $A[$f-1])) ){
//				if( $f == 0 or (bcpow(sqrt($A[$f] + $A[$f-1]) , 2,20) == ($A[$f] + $A[$f-1])) ){
				if( $f == 0 or strpos(sqrt($A[$f] + $A[$f-1]),'.') === false ){

					$fun($f + 1);
					[$A[$f], $A[$i]] = [$A[$i], $A[$f]];
				}

			}
		};
		sort($A);
		$fun();

		return $nums;
	}

	function isSqrt($num){
		$a = sqrt($num);
		if(strpos($a,'.') !== false) return false;
		if($a * $a != $num) {
			return false;
		}
		return true;
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
		$new = [];
		if(!isset($a)){
			sort($nums);
			for($i=0;$i<$len;$i++){
				if(isset($nums[$i + 1])){
					$a = sqrt($nums[$i] + $nums[$i + 1]);
					if(strpos($a,'.') !== false) break;
					if($a * $a != $nums[$i] + $nums[$i + 1]) {
						break;
					}
				}
				$new[] = $nums[$i];
			}
			if(count($new) == $len)
				$this->n[] = $new;
//			$this->arr[] = $nums;
			return  count($this->n);
		}else{
			[$nums[$a], $nums[$b]] = [$nums[$b], $nums[$a]];

			$alert = array_slice($nums,$a+1);
			$before = array_slice($nums, 0,$a + 1);
			sort($alert);
			$nums = array_merge($before, $alert);

			for($i=0;$i<$len;$i++){
				if(isset($nums[$i + 1])){
					$a = sqrt($nums[$i] + $nums[$i + 1]);
					if(strpos($a,'.') !== false) break;
					if($a * $a != $nums[$i] + $nums[$i + 1]) {
						break;
					}
				}
				$new[] = $nums[$i];
			}
			if(count($new) == $len)
				$this->n[] = $new;
			echo 1;
			return $this->swap($nums, $len);
		}
	}

	public function permute($A) {
		$len = count($A);
		if ($len == 1) return [];
		$nums = [];
		$fun = function ($f = 0) use ($len, &$A, &$nums, &$fun) {

			for ($i = $f; $i < $len; $i++) {
				if($i < ($len - 1) && $A[$i] == $A[$i + 1]) {
					continue;
				};
				[$A[$f], $A[$i]] = [$A[$i], $A[$f]];
				$k = implode('',$A);

				if(array_key_exists($k,$this->q)) {
//					echo json_encode($k),"\n";
					if($i >= $len - 1) continue;
//					echo $i,"\t";
//					$i = $i;
//					echo $i,"\n";
					[$A[$f], $A[$i+ 1]] = [$A[$i+1], $A[$f]];
					echo json_encode($A),"\n";
					$fun($f  + 1);
					[$A[$f], $A[$i]] = [$A[$i], $A[$f]];

				} else{
					$this->q[$k] = $A;
					$fun($f + 1);
					[$A[$f], $A[$i]] = [$A[$i], $A[$f]];
				};
//				echo json_encode($k),"\n";

//				$nums[] = $A;

			}
		};
		$this->q = [];

		$fun();
//		unset($this->q);
//		echo json_encode($this->q),"\n",count($this->q);
		print_r(count(array_values($this->q)));

//		return $nums;
	}
}

//echo (new Solution())->numSquarefulPerms([65,44,5,11]);  //0
//echo (new Solution())->numSquarefulPerms([2,1,2]);  // 0
//echo (new Solution())->numSquarefulPerms([1,17,8]); // 2
//echo (new Solution())->numSquarefulPerms([1,1,1,1,1,1,1,1,1,1]); // 0
//echo (new Solution())->numSquarefulPerms([2,2,4,4,1,3,2,3,1,5,2]); // 0
echo (new Solution())->numSquarefulPerms([1,1,8,1,8]); // 1


//echo bcmul(sqrt(109) , sqrt(109),13) ;
