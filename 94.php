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
	 * 二叉树的中序遍历
	 * @param TreeNode $root
	 * @return Integer[]
	 */
	function inorderTraversal($root) {
		if(is_null($root)) return [];

		$stack = new SplStack();
		$list = [];

		while ($root || !$stack->isEmpty()) {
			while ($root) {
				$stack->push($root);
				$root = $root->left;
			}

			if(is_null($root)) {
				$root = $stack->pop();
				$list[] = $root->val;
				$root = $root->right;
			}
		}
		return $list;
	}

	/**
	 * 递归方式
	 */
	function inorderIteration($root) {
		if(is_null($root)) return ;

		$this->inorderIteration($root->left);
		$this->list[] = $root->val;
		$this->inorderIteration($root->right);
		return $this->list;
	}
}


//[1,1,2,3,null,4,1]     [3,1,1,4,2,1]
$b = new TreeNode(1);
$b->left = new TreeNode(1);
$b->right = new TreeNode(2);
$b->left->left = new TreeNode(3);
$b->right->left = new TreeNode(4);
$b->right->right = new TreeNode(1);



//[[1,null,2,3]]     [1,3,2]
$b = new TreeNode(1);
$b->right = new TreeNode(2);
$b->right->left = new TreeNode(3);
print_r((new Solution())->inorderIteration($b));
