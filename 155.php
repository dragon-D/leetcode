<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class MinStack {
	/**
	 * 最小栈
	 * initialize your data structure here.
	 */
	function __construct() {
		$this->end = -1;
		$this->stack = [];
		$this->min_stack = [];
		$this->min_end = -1;
	}

	/**
	 * @param Integer $x
	 * @return NULL
	 */
	function push($x) {
		$this->end++;
		$this->stack[$this->end] = $x;
		if (empty($this->min_stack) || $x <= $this->min_stack[$this->min_end]){
			$this->min_end++;
			$this->min_stack[$this->min_end] = $x;
		}
		return;
	}

	/**
	 * @return NULL
	 */
	function pop() {
		if($this->isEmpty()) return -1;
		$s = $this->stack[$this->end];
		unset($this->stack[$this->end]);
		$this->end--;
		if($this->getMin() == $s){
			unset($this->min_stack[$this->min_end]);
			$this->min_end--;
		}
		return $s;
	}

	/**
	 * @return Integer
	 */
	function top() {
		if($this->isEmpty()) return -1;
		return $this->stack[$this->end];
	}

	function isEmpty() {
		return (-1 == $this->end) ? true : false;
	}

	/**
	 * @return Integer
	 */
	function getMin() {
		if($this->isEmpty()) return -1;
		return $this->min_stack[$this->min_end];
	}
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */

 $obj = new MinStack();
 $obj->push(-2);
 $obj->push(0);
 $obj->push(-3);

var_dump($obj->getMin());
$obj->pop();
 var_dump($obj->top());
 var_dump($obj->getMin());


