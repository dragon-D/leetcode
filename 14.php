<?php
/**
 * @author: Dragon
 * @copyright Copyright (c) 2019, Infrasys International Ltd.
 */

/*•
 * 最长公共前缀
 */
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        $one = array_shift($strs);
        if(count($strs) < 1) return $one ?: '';
        $oneLen = strlen($one);
        $long = $str = $max = '';
        for ($i = 0; $i < $oneLen;$i++){
            $long .= $one[$i];
            foreach ($strs as $v){
                if(strpos($v,$long) === 0){
                    $str = $long;
                } else {
                    $str = '';
                    break;
                }
            }

            if(strlen($str) > strlen($max))
                $max = $str;
        }
//        echo $str,"\n";
        return $max;
    }

    // 二分算法
    function test($strs){
        $strs = array_unique($strs);
        $one = array_shift($strs);
        if(count($strs) < 1 || !$one) return $one ?: '';
        $oneLen = strlen($one) + 1;
        $i = 0;
        $s = '';
        while ($i < $oneLen){
            $mid = floor(($oneLen + $i ) / 2) ;
            if($mid == 0 || $mid == strlen($one) ){
                $str = substr($one,0);
            }else{
                $str = substr($one,0,$mid);

            }

            $s = $str;
            foreach ($strs as $v){
                if(strpos($v, $str) !== 0){
                    $s = '';
                }
            }
            if(!$s) {
                $oneLen = $mid;
            }else{
                $i = $i + 1;
            }
        }
        return $s;
    }
}

//echo (new Solution())->test(["bc","bc","bca"]); // bc
//echo (new Solution())->test(["aaa","aa","aaa"]); // aa
//echo (new Solution())->test(["aa","ab"]); // a
//echo (new Solution())->test(["ac","acddd",'acc']); // ac
//echo (new Solution())->test(["flower","flow","flight"]); // fl
//echo (new Solution())->test(["c","cac","ccc"]); // c
//echo (new Solution())->test(["","",""]); // ''
//echo (new Solution())->test(["aa","aa"]); // aa
//echo (new Solution())->test(["","aa"]); // ''
echo (new Solution())->test(["",'b']); // ''


//echo substr('bc',0,1),"\n";


