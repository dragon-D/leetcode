<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */



class Node {
	public $val;
	public $children;

	/**
	 * @param  Integer $val;
	 * @param list<Node> $children;
	 */
	function __construct($val, $children = []) {
		$this->val = $val;
		$this->children = $children;
	}
}


class Solution {

	/**
	 *  N叉树的层序遍历
	 * @param Node $root
	 * @return Integer[][]
	 */
	function levelOrder($root) {
		if(is_null($root)) return [];

		$stack = new SplStack();
		$stack->push([$root, 0]);
		while (!$stack->isEmpty()) {
			[$root, $l] = $stack->top();
			$count = count($root->children);
			if($count > 0 && !isset($root->use)) {
				$l = $l + 1;
				$root->use = 1;
				for($i = $count - 1; $i >= 0; $i--){
					$stack->push([$root->children[$i], $l]);
				}

			} else {
				$stack->pop();
				$list[$l][] = $root->val;

			}
		}
		ksort($list);
		return $list;
	}
}

$a = new Node(1);  // [[1],[10,3],[5,0,6]]
$a3 = new Node(10);
$a3->children[] = new Node(5);
$a3->children[] = new Node(0);
$a->children[] = $a3;
$a3 = new Node(3);
$a3->children[] = new Node(6);
$a->children[] = $a3;

$a = new Node(1);  //[5,6,3,2,4,1]
$a3 = new Node(3);
$a3->children[] = new Node(5);
$a3->children[] = new Node(6);
$a->children[] = $a3;
$a->children[] = new Node(2);
$a->children[] = new Node(4);
print_r((new Solution())->levelOrder($a));