<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
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


class Solution
{

	/**
	 * 验证二叉搜索树
	 * @param TreeNode $root
	 * @return Boolean
	 */
	function isValidBST($root)
	{
		if(is_null($root)) return true;

		$min = PHP_INT_MIN;
		$max = PHP_INT_MAX;

		$dfs = function ($root ,$min, $max) use (&$dfs) {
			if(is_null($root)) return true;
			if($root->val <= $min || $root->val >= $max) {
				echo $root->val,"=",$min,"=","$max";
				return false;
			}
			if(!$dfs($root->left, $min, $root->val)) return false;
			if(!$dfs($root->right, $root->val, $max)) return false;
			return true;
		};

		return $dfs($root,$min, $max);
	}

	/**
	 * 栈的形式
	 *
	 * */
	public function dfs($root) {
		if(is_null($root)) return true;
		$stack = new SplStack();
		$min = PHP_INT_MIN;
		$max = PHP_INT_MAX;

		$stack->push([$root, $min, $max]);
		while (!$stack->isEmpty()) {
			[$root, $min,$max] = $stack->pop();
			if(is_null($root)) {
				continue;
//				return true;
			}
			$val = $root->val;
			if($val <= $min || $val >= $max) {

				return false;
			}

			$stack->push([$root->left, $min, $val]);
			$stack->push([$root->right, $val, $max]);

		}
		return true;
	}

	/**
	 * 中序
	 *
	 */
	public function sequence($root) {
		if (is_null($root)) return true;
		$min = -PHP_INT_MAX;
		$this->status = true;
		$s = function ($root) use (&$s, &$min) {
			if(is_null($root) || !$this->status) return;

			$s($root->left);
			if($root->val <= $min) {
				$this->status = false;
				return false;
			}
			$min = $root->val;
			$s($root->right);
		};
		$s($root);
		return $this->status;
	}
}

//[5,1,4,null,null,3,6] false
$b = new TreeNode(5);
$b->left = new TreeNode(-1);
//$a->left->left = new TreeNode(2);
//$a->left->right = new TreeNode(2);
$b->right = new TreeNode(7);
$b->right->left = new TreeNode(6);
$b->right->right = new TreeNode(8);   //false



//[10,5,15,null,null,6,20] false
$b = new TreeNode(10);
$b->left = new TreeNode(5);
$b->right = new TreeNode(15);
$b->right->left = new TreeNode(6);
$b->right->right = new TreeNode(20);


// [5,1,null,null,6,4,7]  false
$b = new TreeNode(5);
$b->left = new TreeNode(1);
$b->right = new TreeNode(6);
$b->right->left = new TreeNode(4);
$b->right->right = new TreeNode(7);


// [1,1]  false
$b = new TreeNode(1);
$b->left = new TreeNode(1);



//[3,null,30, 10,null,   null, 15, null,45]  false
$b = new TreeNode(3);
$b->right = new TreeNode(30);
$b->right->left = new TreeNode(10);
$b->right->left->right = new TreeNode(15);
$b->right->left->right->right = new TreeNode(45);


//[3,1,5,0,2,4,6] true
$b = new TreeNode(3);
$b->left = new TreeNode(1);
$b->right = new TreeNode(5);
$b->left->left = new TreeNode(0);
$b->left->right = new TreeNode(2);
$b->right->left = new TreeNode(4);
$b->right->right = new TreeNode(6);



//[10,5,15,null,null,6,20]  false
$b = new TreeNode(10);
$b->left = new TreeNode(5);
$b->right = new TreeNode(15);
$b->right->left = new TreeNode(6);
$b->right->right = new TreeNode(20);
var_dump((new Solution())->sequence($b));