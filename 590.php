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
	 * N叉树后续遍历
	 * 1、先查找所有根有没有叶子，如果有叶子就标记入栈（重右到左）
	 * 2、叶子出栈，
	 * @param Node $root
	 * @return Integer[]
	 */
	function postorder($root) {
		if (is_null($root)) return [];

		$stack = new SplStack();
		$last = null;
		$stack->push($root);

		while (!$stack->isEmpty()) {
			$root = $stack->top();
			$count = count($root->children);
			if($count > 0 && !isset($root->use)) {
				$root->use = 1;
				for($i = $count- 1; $i >= 0; $i--) {
					$stack->push($root->children[$i]);
				}
			} else {
				$stack->pop();
				$list[] = $root->val;

			}
		}
		return $list;
	}
}

$a = new Node(1);  //[5,6,3,2,4,1]
$a3 = new Node(3);
$a3->children[] = new Node(5);
$a3->children[] = new Node(6);
$a->children[] = $a3;
$a->children[] = new Node(2);
$a->children[] = new Node(4);


$a = new Node(1);  //[5,0,10,6,3,1]
$a3 = new Node(10);
$a3->children[] = new Node(5);
$a3->children[] = new Node(0);
$a->children[] = $a3;
$a3 = new Node(3);
$a3->children[] = new Node(6);
$a->children[] = $a3;
print_r((new Solution())->postorder($a));

