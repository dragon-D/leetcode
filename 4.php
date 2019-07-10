<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 *  寻找两个有序数组的中位数
 */

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2 长的在后
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $m = count($nums1);
        $n = count($nums2);
        if($m > $n){
            return $this->findMedianSortedArrays($nums2,$nums1);
        }
        $count = floor( ($m + $n + 1) / 2) ;
        $top = 0;
        $max = $m;
        while ($top < $max){

            $m1 = floor(($max + $top) / 2);
            $n2 = $count - $m1;

            if($nums1[$m1] < $nums2[$n2 -1]){

                $top = $m1 + 1;
            }
            else
                $max = $m1;
        }
        $m1 = $top;  //数组1的中间值
        $n2 = $count - $m1; //数组2的中间值
        // 左边边界最大值
        $max = max($nums1[$m1-1] ?? NUll,$nums2[$n2 -1] ?? NUll);
        //奇数中间值
        if(($m + $n) % 2 == 1){
            echo $max,"\n";
            return $max;
        }
        //右边边界最小值
        $m1 = $m1 < $m ? $nums1[$m1] : '';
        $n2 = $n2 < $n ? $nums2[$n2] : '';
        if($m1 == '')
            $m1 = $n2;
        elseif ($n2 == '')
            $n2 = $m1;
        $min = min($m1,$n2);
        //偶数
        return ($max + $min) / 2;
    }

    public function test($nums1, $nums2) {
        $m = count($nums1);
        $n = count($nums2);

        if($m < $n){
//            return $this->test($nums2,$nums1);
        }

        $count = ($m + $n + 1) / 2 ;
        $top = 0;
        $max = $m;
        while ($top < $max){
            echo $top,"\n";
            $m1 = floor(($max + $top) / 2);
            $n2 = $count - $m1;

            if($nums1[$m1] < $nums2[$n2 -1])
                $top = $m1 + 1;
            else
                $max = $m1;
        }

        $m2 = $count - $m1;
        echo $nums1[$m1],"=",$nums2[$m2 -1],"\n";
        $right = max($nums1[$m1-1] ?? 0,$nums2[$m2 -1] ?? 0);
        if(($m + $n) % 2 == 1)
            return $right;
        $min = min($m1 < $m ? $nums1[$m1] : 0,$m2 < $n ? $nums2[$m2] : 0);

        return ($right + $min) / 2;
    }
}

//$s = (new Solution())->findMedianSortedArrays([2, 4, 6, 10],[1, 5, 8]  );   //5
$s = (new Solution())->findMedianSortedArrays([1, 5, 8] ,[2, 4, 6, 10]  );   //5
$s = (new Solution())->findMedianSortedArrays([1,2],[3,4]  );   //2.5
$s = (new Solution())->findMedianSortedArrays([-1,1,3,5,7,9],[2,4,6,8,10,12,14,16]  );   //6.5
$s = (new Solution())->findMedianSortedArrays([1,2,3],[4,7,8]  );   //3.5
$s = (new Solution())->findMedianSortedArrays([2,4,6],[3,5,7]  );   //4.5
$s = (new Solution())->findMedianSortedArrays([3],[-2,-1] );   //-1.0
