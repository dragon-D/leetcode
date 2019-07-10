<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 *  回文数
 */

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        $x = '@#'.implode('#',str_split($x)).'#';
        $max = strlen($x);
        $i = floor($max / 2);
        $n = 1;

        while (@isset($x[$i + $n]) && @$x[$i - $n] == @$x[$i + $n]){
            $n++;
        }
        echo $n;
        return floor(($i - $n) / 2) == 0;
    }

    public function test($x){
        $max = strlen($x);
        if($max < 2) return true;
        $x = str_split($x);
        $i = floor($max / 2);
        if($max % 2 == 1){
            $n = 1;
            while (isset($x[$i + $n]) && isset($x[$i - $n] ) && $x[$i - $n] == $x[$i + $n]){
                $n++;
            }
            return ($i - $n == -1);
        } else {
            $n = $i - 1;
            while (isset($x[$n]) && $x[$n] == $x[$i]){
                $n--;
                $i++;
            }
            return ($max - $i == 0);
        }
    }

    function test1($x) {
        $max = strlen($x);
        if($max < 2) return true;
        $i = floor($max / 2);
        if($max % 2 == 1){
            $f = substr($x,$i + 1);

        } else {
            $f = substr($x,$i);
        }
        return substr($x,0,$i) == strrev($f);
    }
}

//$s = 'abccddddddddddd';
//$s = '121';
//$s = 'aaaccaaa';
//$s = '10';
$s = '11';

 (new Solution())->test1($s);
echo array_sum([8,6,2,5,4,8,3,7]);
