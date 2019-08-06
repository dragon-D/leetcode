<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */


class TreeNode
{
	public $val = null;
	public $left = null;
	public $right = null;

	function __construct($value)
	{
		$this->val = $value;
	}
}

class Solution {

	/**
	 * 二叉树后续遍历  左右中 双栈法
	 * @param TreeNode $root
	 * @return Integer[]
	 */
	function postorderTraversal($root) {
		if(is_null($root)) return [];

		$stack = new SplStack();
		$tmp = new SplStack();
		$lastNodfe = null;
//		$stack->push($root);

		while ($root || !$tmp->isEmpty()) {
			if(!is_null($root)) {
				$tmp->push($root);
				$stack->push($root);
				$root = $root->right;
			} else {
				$root = $tmp->pop();
				$root = $root->left;
			}
		}

		while (!$stack->isEmpty()) {
			$root = $stack->pop();
			echo $root->val;
		}
	}

	/**
	 * 1、先得到所有左边
	 * 2，判断右边是否有或者上一个是右边的儿子得到右边最低部
	 */
	public function postorder2($root) {
		if(is_null($root)) return [];

		$stack = new SplStack();
		$prev = null;

		while($root || !$stack->isEmpty()) {
			if($root) {
				$stack->push($root);
				$root = $root->left;

			} else {
				$root = $stack->top();
				if($root->right == null || $root->right == $prev){
					$stack->pop();
					$list[] = $root->val;
					$prev = $root;
					$root = null;
				} else {
					$root = $root->right;
				}
			}

		}
		return $list;
	}
}

//[[1,1.5,2,3]]     [3,1,1,4,2,1]
$b = new TreeNode(1);
$b->left = new TreeNode(1.5);
$b->left->left = new TreeNode(-3);
$b->left->right = new TreeNode(-2);
$b->right = new TreeNode(2);
$b->right->left = new TreeNode(3);
print_r((new Solution())->postorder2($b));


//[[1,null,2,3]]     [3,2,1]
$b = new TreeNode(1);
$b->right = new TreeNode(2);
$b->right->left = new TreeNode(3);

