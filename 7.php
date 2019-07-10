<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 *  整数反转
 */


class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $t = $x >= 0 ? true : false;
        $newx = strval(abs($x));
        $len = strlen($newx);
        if($len > 10) return 0;
        $newx = strrev($newx);
        $int =  intval($newx);
        if($int > pow(2, 31) - 1){
            return 0;
        }
        if(!$t)
            return -intval($int);
        return intval($int);
    }
}

$s = -564633454;
echo (new Solution())->reverse($s);
