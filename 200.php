<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

	/**
	 * 岛屿个数  BFS 方式
	 * @param String[][] $grid
	 * @return Integer
	 */
	function numIslands($grid) {
		$this->n = count($grid);
		$this->m = count($grid[0]);
		$step = 0;
		$this->grid = $grid;
		for($i = 0; $i < $this->n; $i ++){
			for($j = 0; $j < $this->m; $j++){
				if($this->grid[$i][$j] == 1){
					$this->bfs($i, $j);
					$step++;
				}
			}
		}
		return $step;
	}

	public function bfs($i, $j) {

		if($i < 0 || $i >= $this->n || $j < 0 || $j >= $this->m) return ;

		if($this->grid[$i][$j] != '1') return;

		$this->grid[$i][$j] = 2;
		$this->bfs($i+1, $j);
		$this->bfs($i-1, $j);
		$this->bfs($i, $j+1);
		$this->bfs($i, $j-1);
	}

	/**
	 * 岛屿个数  DFS 方式
	 * @param String[][] $grid
	 * @return Integer
	 */
	public function numIslands2($grid) {
		$n = count($grid);
		$m = count($grid[0]);
		$this->a = $grid;
		$stack = new SplStack();
		$num = 0;
		for($i = 0; $i < $n; $i++){
			for($j = 0; $j < $m; $j++) {
				if($this->a[$i][$j] == 1){
					$num++;
					$stack->push([$i,$j]);

					while (!$stack->isEmpty()) {
						[$ii, $jj] = $stack->pop();
						if($ii == -1 || $jj == -1 || $ii == $n || $jj == $m || $this->a[$ii][$jj] != 1)
							continue;
						$this->a[$ii][$jj] = 2;
						if(isset($this->a[$ii + 1]) && $this->a[$ii + 1][$jj] == 1) $stack->push([$ii + 1, $jj]);
						if(isset($this->a[$ii - 1]) && $this->a[$ii - 1][$jj] == 1) $stack->push([$ii - 1, $jj]);
						if(isset($this->a[$ii][$jj + 1]) && $this->a[$ii][$jj + 1] == 1) $stack->push([$ii, $jj + 1]);
						if(isset($this->a[$ii][$jj - 1]) && $this->a[$ii][$jj - 1] == 1) $stack->push([$ii, $jj - 1]);

					}
				}
			}
		}
		return $num;
	}

	public function dfs($n, $m) {

	}
}

//echo (new Solution())->numIslands2([["1","0","0","0","0"],["1","1","0","0","0"],["0","0","1","0","0"],["0","0","0","1","1"]]);



$a = new SplDoublyLinkedList;
$arr=[1,2,3,4,5,6,7,8,9];
$a->add(0,0); //add method must with index
$a->add(1,2); //add method must with index
print_r($a);
$a->push(11); //push method
$a->add(3,12); //add method must with index
//$a->shift(); //remove array first value
//$a->unshift(1); //add first value
print_r($a);
$a->rewind(); //initial from first

echo "SplDoublyLinkedList array last/top value " .  $a->top() ." \n";
echo "SplDoublyLinkedList array count value " .  $a->count() ." \n";
echo "SplDoublyLinkedList array first/top value " . $a->bottom() . " \n\n";
