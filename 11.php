<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 *
 */

/**
 * 盛最多水的容器
 */
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $left = $max = 0;
        $right = count($height) - 1;
        while ($left < $right) {
            $min = min($height[$left],$height[$right]);
            $max =  max($max, $min * ($right - $left));
            if($min == $height[$left]){
                $left ++;
            } else {
                $right--;
            }
        }
        return $max;
    }

    function test($height){
        $left = $max = 0;
        $right = $i = count($height) - 1;
        $min = min($height[0],$height[$right]);
        while ($i > 0){
            $max =  max($max, $min * $i);
            echo $height[$left],'-',$height[$right],"**",$min,"\n";
            if($height[$left] <= $height[$right]){
                $left ++;

            }
            else{
                $right--;
                $min = $height[$right];
            }
            $i--;
        }
        return $max;
    }
}

//echo (new Solution())->maxArea( [1,8,6,2,5,4,8,3,7]); //49
echo (new Solution())->maxArea( [11,3,6, 8,5,4, 13,3,7]); //66
