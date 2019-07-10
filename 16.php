<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */


/**
 * 最接近的三数之和
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        $len = count($nums);
        if($len == 3) return array_sum($nums);
        sort($nums);
        $lMin = $nums[0]+$nums[1]+$nums[2];
        $rMin =  $nums[$len -1]+$nums[$len - 2]+$nums[$len - 3];

        for ($i = 0;$i<$len;$i++){

            if($nums[$i] > 0 && ($nums[$i] + $nums[$i-1]) > $target){
                continue;
            }

            $l = $i + 1;
            $r = $len - 1;
            while ($l < $r){
                $res = $nums[$i] + $nums[$l] + $nums[$r];
                if($res == $target){
                    return $res;
                }
                if($res < $target) {
                    $lMin = max($lMin,$res);
                    while ($l < $r && $nums[$l] === $nums[$l+1]){$l++;}
                    $l++;

                }else{
                    $rMin = min($rMin,$res);
                    while ($l < $r && $nums[$r] === $nums[$r-1]){$r--;}
                    $r--;
                }
            }
        }


        if($target - $lMin <= $rMin - $target)
            return $lMin;
        else
            return $rMin;
    }
}

echo (new Solution())->threeSumClosest([-99,21,1,-31,3,5,22,9,29,10,21,33,7,5,4,36,243,12,11,13,21,-1,-8,-20], 135); // 136
//echo (new Solution())->threeSumClosest([1,1,1,110], 0); // 3
//echo (new Solution())->threeSumClosest([6,-18,-20,-7,-15,9,18,10,1,-20,-17,-19,-3,-5,-19,10,6,-11,1,-17,-15,6,17,-18,-3,16,19,-20,-3,-17,-15,-3,12,1,-9,4,1,12,-2,14,4,-4,19,-20,6,0,-19,18,14,1,-15,-5,14,12,-4,0,-10,6,6,-6,20,-8,-6,5,0,3,10,7,-2,17,20,12,19,-13,-1,10,-1,14,0,7,-3,10,14,14,11,0,-4,-15,-8,3,2,-5,9,10,16,-4,-3,-9,-8,-14,10,6,2,-12,-7,-16,-6,10], -52); // -52


