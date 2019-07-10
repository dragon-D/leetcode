<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s){
        $count = strlen($s);
        $str = '';
        $int = 0;
        for ($i=0;$i<$count;$i++){
            if($i === 0){
                $str  = $s[$i];
                $int = strlen($str);

            } else {

                if(($pos = strpos($str,$s[$i])) === false) {
                    $str .= $s[$i];
                } else {
                    $str = substr($str,$pos+1).$s[$i];
                }
                $len = strlen($str);
                if($int < $len)
                    $int = $len;

            }
        }
        return $int;
    }

}
//$s = (new Solution())->test("abcabcbb");
//$s = (new Solution())->test("");
//$s = (new Solution())->test("pwwkew");
//$s = (new Solution())->test("dvdf");
//$s = (new Solution())->test("aabaab!bb");
$s = (new Solution())->test("ggububgvfk");
print_r($s);
