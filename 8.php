<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
        $str = ltrim($str);
        preg_match('/^(?(?=-)-\d+|\d+)/',$str,$m);
        if(!$m){
            preg_match('/^(?(?=\+)\+\d+|\d+)/',$str,$m);
        }
        if(!$m) return 0;
        $m[0] = ltrim($m[0],'+');

        if($m[0] < pow(-2,31))
            return pow(-2,31);

        if($m[0] > pow(2,31) -1)
            return pow(2,31) -1;

        return intval($m[0]);
    }
}


//echo (new Solution())->myAtoi(" +987");
//echo (new Solution())->myAtoi("+1");
//echo (new Solution())->myAtoi("+-2");
echo (new Solution())->myAtoi("ddd 333");

//preg_match(' /^(?(?=-)-\d+|\d+)/','987',$m);
//print_r($m);