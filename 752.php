<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

	/**
	 * 打开锁的次数 bfs
	 * @param String[] $deadends
	 * @param String $target
	 * @return Integer
	 */
	function openLock($deadends, $target) {
		$start = '0000';
		if(array_search($start, $deadends) !== false) return -1;

		$queue = new SplQueue();
		$queue->enqueue([$start, 0]);
		$deadends = array_flip($deadends);
		while($queue->isEmpty() == false) {
			[$d,$step] = $queue->dequeue();
			for($i = 0;$i < 4; $i++){
				foreach([-1,1] as $v){
					$mid = ((substr($d, $i, 1) + $v) % 10 < 0) ? 9 : (substr($d, $i, 1) + $v) % 10;
					$s = substr($d, 0,$i) . $mid . substr($d, $i +1);

					if($s == $target) {
						return $step +1;
					}
					if(isset($deadends[$s])) continue;
					$deadends[$s] = '';
					$queue->enqueue([$s,$step + 1]);
				}
			}
		}
		return -1;
	}
}
$d = ["0201","0101","0102","1212","2002"];
//$d = ["8887","8889","8878","8898","8788","8988","7888","9888"];
echo (new Solution())->openLock($d,'0202');
