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


/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

	/**
	 * 二叉树前序遍历
	 * @param TreeNode $root
	 * @return Integer[]
	 */
	function preorderTraversal($root) {
		if(is_null($root)) return [];

		$stack = new SplStack();
		$stack->push($root);
		$list = [];
		while (!$stack->isEmpty()) {
			$root = $stack->pop();
			if(is_null($root)) continue;
			$list[] = $root->val;
			$stack->push($root->right);
			$stack->push($root->left);
		}
		return $list;
	}

	/**
	 * 递归
	 */
	public function preorderRecursive($root) {
		if(is_null($root)) return;
		$this->list[] = $root->val;
		$this->preorderRecursive($root->left);
		$this->preorderRecursive($root->right);
		return $this->list;
	}
}





//[[1,null,2,3]]     [1,2,3]
$b = new TreeNode(1);
$b->right = new TreeNode(2);
$b->right->left = new TreeNode(3);



//[1,1,2,3,null,4,1]     [3,1,1,4,2,1]
$b = new TreeNode(1);
$b->left = new TreeNode(1);
$b->right = new TreeNode(2);
$b->left->left = new TreeNode(3);
$b->right->left = new TreeNode(4);
$b->right->right = new TreeNode(1);
print_r((new Solution())->preorderRecursive($b));