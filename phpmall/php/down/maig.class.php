<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/14
 * Time: 10:40
 */
class maig{

    //转义、过滤信息
    function str($str){
        $str=trim($str);
        if(!get_magic_quotes_gpc()){
            $str=addslashes($str);
        }
        return htmlspecialchars($str);
    }


}