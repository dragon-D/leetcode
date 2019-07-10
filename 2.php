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
 * 两数相加
 */
class Solution
{
    private $listNode;

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {

        $curr = $l1;
        $l1Arr = $l2Arr = [];
        while ($curr != null){
            $l1Arr[] = $curr->val;
            $curr = $curr->next;
        }

        $curr = $l2;
        while ($curr != null){
            $l2Arr[] = $curr->val;
            $curr = $curr->next;
        }


        $l1Count = count($l1Arr);
        $l2Count = count($l2Arr);
        $max = $l1Count > $l2Count ? $l1Count : $l2Count;
        $new = [];
        for ($i=0;$i<$max;$i++){
            if(isset($new[$i]))
                $new[$i] = $new[$i]  + ($l1Arr[$i] ?? 0) + ($l2Arr[$i] ?? 0);
            else
                $new[$i] = ($l1Arr[$i] ?? 0) + ($l2Arr[$i] ?? 0);

            if($new[$i] >= 10){
                $int = $new[$i];
                $new[$i] = substr($int,1);
                $new[$i+1] = substr($int,0,1);
            }
        }

        foreach ($new as $v){
            $this->Node($v);
        }
        return $this->listNode;
    }

    public function Node($val){
        if(isset($this->listNode)){
            $curr = $this->listNode;
            while ($curr->next != null){
                $curr = $curr->next;
            }

            $node = new ListNode($val);
            $node->next = $curr->next;
            $curr->next = $node;
            print_r($curr);
        } else {
            $this->listNode = new ListNode($val);
        }

    }
}


class ListNode
{
    public $val; //节点数据
    public $next; //下一个节点

    public function __construct($data)
    {
        $this->val = $data;
        $this->next = null;
    }

}

class LinkList
{
    private $header;

    function __construct($data)
    {
        $this->header = new ListNode($data);
    }

    //节点查找
    public function find()
    {
        $current = $this->header;
        while ( $current->next !==null) {
            $current = $current->next;
        }
        return $current;
    }

    //在item之后插入
    public function insert($new)
    {
        $Node = new ListNode($new);
        $current = $this->find();
        $Node->next = $current->next;
        $current->next = $Node;

    }

}
$linkList = new LinkList('header');
$linkList->insert('1');
$linkList->insert('5');
//$linkList->insert('5','7');
//$linkList->insert('1','2');
//$linkList->display();
print_r($linkList);
exit;
$a =  new ListNode(8);
$a->next = new ListNode(9);
$a->next->next = new ListNode(9);

$b =  new ListNode(2);
//$b->next = new ListNode(6);
//$b->next->next = new ListNode(4);

$s = (new Solution())->addTwoNumbers($a,$b);
print_r($s);
