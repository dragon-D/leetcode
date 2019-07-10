<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */


/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
    	$l1arr = $l2arr = [];
		if($l1->val === null && $l2->val === null) return [];

		if ($l1->val === null) return $l2;
		if ($l2->val === null) return $l1;

    	$a = $l1;
    	$b = $l2;

		while ($a->next || $b->next){
			if($a->next){
				$a = $a->next;
				$l1arr[] = $a->val;
			}

			if($b->next){
				$b = $b->next;
				$l1arr[] = $b->val;
			}
		}
		sort($l1arr);
		$current = new linklist(new ListNode(array_shift($l1arr)));
		foreach ($l1arr as $v){
			$current->insert($v);
		}
		return $current->list;
    }
}

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = null) { $this->val = $val; }
}

class linklist {
	public $list = null;

	public function __construct($data)
	{
		$this->list = $data;
	}

	function end() {
		$current = $this->list;

		while($current->next) {
			$current = $current->next;
		}
		return $current;
	}

	function insert($n) {
		$list = new ListNode($n);
		$current = $this->end();
		$current->next = $list;
	}
}

$ss = new linklist(new ListNode(1));
$ss->insert(2);
$ss->insert(3);


$a = new linklist(new ListNode(1));
$a->insert(3);
$a->insert(4);


print_r((new Solution())->mergeTwoLists($a->list, $ss->list));
//print_r((new Solution())->mergeTwoLists(new ListNode(), new ListNode()));
