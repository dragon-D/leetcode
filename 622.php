<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

/** FIFO(先进先出) queue
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

/**
 *  设计循环队列
 *  MyCircularQueue(k): 构造器，设置队列长度为 k 。
 *	Front: 从队首获取元素。如果队列为空，返回 -1 。
 *	Rear: 获取队尾元素。如果队列为空，返回 -1 。
 *	enQueue(value): 向循环队列插入一个元素。如果成功插入则返回真。
 *	deQueue(): 从循环队列中删除一个元素。如果成功删除则返回真。
 *	isEmpty(): 检查循环队列是否为空。
 *	isFull(): 检查循环队列是否已满。
 */
class MyCircularQueue {
	/**
	 * Initialize your data structure here. Set the size of the queue to be k.
	 * @param Integer $k
	 */

	function __construct($k) {
		$this->size = $k;   //队列总长度
		$this->start = -1;   //队尾位置
		$this->end = -1;   //队首位置
		$this->total = 0;   //当前队列长度
		$this->queue = [];
	}

	/**
	 * Insert an element into the circular queue. Return true if the operation is successful.
	 * @param Integer $value
	 * @return Boolean
	 */
	function enQueue($value) {
		if($this->isFull() == true) return false;
		if($this->isEmpty() == true) $this->start = 0;
		$this->end = ($this->end + 1) % $this->size;
		$this->queue[$this->end] = $value;
		$this->total++;
		return true;
	}

	/**
	 * Delete an element from the circular queue. Return true if the operation is successful.
	 * @return Boolean
	 */
	function deQueue() {
		if($this->isEmpty() == true) return false;
		unset($this->queue[$this->start]);
		if($this->start == $this->end ){
			$this->end = -1;
			$this->start = -1;
		}
		$this->start = ($this->start + 1) % $this->size;
		$this->total--;
		return true;
	}

	/**
	 * Get the front item from the queue.
	 * @return Integer
	 */
	function Front() {
		if($this->isEmpty() == true) return -1;
		return $this->queue[$this->start];
	}

	/**
	 * Get the last item from the queue.
	 * @return Integer
	 */
	function Rear() {
		if($this->isEmpty() == true) return -1;
		return $this->queue[$this->end];
	}

	/**
	 * Checks whether the circular queue is empty or not.
	 * @return Boolean
	 */
	function isEmpty() {

		return $this->total == 0 ? true : false;
	}

	/**
	 * Checks whether the circular queue is full or not.
	 * @return Boolean
	 */
	function isFull() {
		return $this->total == $this->size ? true : false;
	}

	public function get() {
		echo $this->end;
		echo $this->start;
		return $this->queue;
	}

}



/**
 * Your MyCircularQueue object will be instantiated and called as such:
 * $obj = MyCircularQueue($k);
 * $ret_1 = $obj->enQueue($value);
 * $ret_2 = $obj->deQueue();
 * $ret_3 = $obj->Front();
 * $ret_4 = $obj->Rear();
 * $ret_5 = $obj->isEmpty();
 * $ret_6 = $obj->isFull();
 */

$obj = new MyCircularQueue(4);
$ret_1 = $obj->enQueue(1);
$ret_1 = $obj->enQueue(2);
$ret_1 = $obj->enQueue(3);
$ret_1 = $obj->enQueue(4);
$ret_2 = $obj->deQueue();
$ret_2 = $obj->deQueue();

//$ret_1 = $obj->enQueue(1);
//$ret_1 = $obj->enQueue(2);
//print_r($obj->get());
//var_dump($obj->Front());
//var_dump($obj->Rear());
//var_dump($obj->isEmpty());
//var_dump($obj->isFull());
//var_dump($obj->Front());
$ret_2 = $obj->deQueue();
//$ret_2 = $obj->deQueue();
$ret_2 = $obj->deQueue();
//$ret_2 = $obj->deQueue();
//$ret_2 = $obj->deQueue();
//print_r($obj->get());
//$ret_2 = $obj->deQueue();
var_dump($obj->Front());
var_dump($obj->Rear());
var_dump($obj->total);