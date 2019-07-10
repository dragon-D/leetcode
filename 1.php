<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */


/*
 * @lc app=leetcode.cn id=1 lang=php
 *
 * [1] 两数之和
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum($nums, $target)
    {
        $two = $target / 2;
        $new = $nums;
        $n = array_search($two,$new);
        unset($new[$n]);
        if(($k = array_search($two,$new)) !== false){
            return [$n,$k];
        } else {
            $newarr = array_flip($nums);
            foreach ($nums as $k => $v){
                $complement = $target - $v;
                if(array_key_exists($complement,$newarr) && $complement != $two){
                    return [$k,$newarr[$complement]];
                }
            }
        }
    }
}

//$s = (new Solution())->twoSum([3,3],6);
//$s = (new Solution())->twoSum([3,2,4],6);
//$s = (new Solution())->twoSum([3,2,3],6);
$s = (new Solution())->twoSum([10,6,2,4],6);
print_r($s);


