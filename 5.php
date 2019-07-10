<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 * 最长回文子串
 */

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $len = strlen($s);
        if($len < 2) return $s;
        $s  = '@#'.implode('#',str_split($s)).'#';
        $len = strlen($s);
        $max = 0;   //最右回文位置
        $id = 0; //最右回文位置中心点
        $p = []; //回文长度数组
        $maxstr = '';
        $maxLen = 0;
        for($i = 1; $i < $len; $i++){
            if($maxLen > $len - $i)  continue;
            if($max > $i)
                $p[$i] = min($max - $i, $p[2 * $id - $i]);
            else
                $p[$i] = 1;
            while (isset($s[$i + $p[$i]]) && $s[$i - $p[$i]] == $s[$i + $p[$i]]){
                $p[$i]++;
            }

            if($p[$i] * 2 > strlen($maxstr)){
                $maxstr = substr($s, $i - $p[$i] + 1, 2 * $p[$i] - 1);
            }
            if($p[$i] > $maxLen) $maxLen = $p[$i];

            if($i + $p[$i] > $max) {
                $id = $i;
                $max = $i + $p[$i];
            }
        }
        return str_replace('#', '', $maxstr);
    }

}

//$s = 'abccba';
//$s = 'cbbd';
//$s = 'babad';

echo (new Solution())->longestPalindrome($s);

