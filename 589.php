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
	 * N叉树前序遍历
	 * 1、运用栈每次右边先入栈
	 * 2、这样左边一直在栈顶
	 * @param Node $root
	 * @return Integer[]
	 */
	function preorder($root) {
		if(is_null($root)) return null;

		$stack = new SplStack();

		$stack->push($root);

		while (!$stack->isEmpty()) {
			$root = $stack->pop();
			$list[] = $root->val;
			$c = count($root->children);
			for($i = $c -1; $i >=  0; $i--) {
				$stack->push($root->children[$i]);
			}
		}
		return $list;
	}

	/**
	 *  递归前序
	 */
	public function preorderRecursive($root) {
		if(is_null($root)) return [];
		$this->list[] = $root->val;
		$c = count($root->children);

		for($i = 0; $i < $c; $i++){
			$this->preorderRecursive($root->children[$i]);
		}
		return $this->list;
	}
}


$a = new Node(1);  //[1,3,5,6,2,4]
$a3 = new Node(3);
$a3->children[] = new Node(5);
$a3->children[] = new Node(6);
$a->children[] = $a3;
$a->children[] = new Node(2);
$a->children[] = new Node(4);
print_r((new Solution())->preorderRecursive($a));

