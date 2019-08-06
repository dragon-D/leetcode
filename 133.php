<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

/*
// Definition for a Node.
class Node {
    public $val;
    public $neighbors;

    @param Integer $val
    @param list<Node> $neighbors
    function __construct($val, $neighbors) {
        $this->val = $val;
        $this->neighbors = $neighbors;
    }
}
*/
class Node {
	public $val;
	public $neighbors;

	/**
	 * @param Integer $val
	 * @param list<Node> $neighbors
	 */
	function __construct($val, $neighbors) {
		$this->val = $val;
		$this->neighbors = $neighbors;
	}
}

class Solution {

	/**
	 * 无象连通图
	 * @param Node $node
	 * @return Node
	 */
	function cloneGraph($node) {
		$this->a = [];
		return $this->bfs($node);

	}

	function bfs($node){
		if(isset($this->a[$node->val])) return;
		$this->a[$node->val] = $node;
		foreach ($node->neighbors as $k => $v) {
			$this->a[$node->val]->neighbors[$k] = $v;
			$this->bfs($v);
		}
		return $this->a[$node->val];
	}

	/**
	 * dfs 方式深度复制
	 */
	function  dfs($node) {
		$a = [];
		$stack = new SplStack();
		$stack->push($node);

		while (!$stack->isEmpty()) {
			$l = $stack->pop();
			if(isset($a[$l->val])) {
				continue;
			}

			foreach($l->neighbors as $k => $v) {
				$a[$l->val]->neighbors[$k] = $v;
				$stack->push($v);
			}
			$a[$l->val] = $node;
		}
		return $a[$l->val];
	}
}


$a1 = new Node(1,[]);
$a2 = new Node(2,[]);
$a3 = new Node(3,[]);
$a4 = new Node(4,[]);
$a1->neighbors = [$a2, $a4];
$a2->neighbors = [$a1,$a3];
$a3->neighbors = [$a4,$a2];
$a4->neighbors = [$a3,$a1];

//print_r((new Solution())->cloneGraph($a1));
print_r((new Solution())->dfs($a1));