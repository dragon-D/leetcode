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
}

echo (new Solution())->numIslands([["1","1","0","0","0"],["1","1","0","0","0"],["0","0","1","0","0"],["0","0","0","1","1"]]);