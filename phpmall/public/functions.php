<?php
/**
 * Created by PhpStorm. 
 * User: Administrator
 * Date: 2018/3/24
 * Time: 15:57
 */

function weberror($title='错误页面',$info='您的操作未成功'){
    global $webdir,$webname;
        include webdir."/user/error.php";
//    echo webdir;
    exit;
}
//小跳转
function webAlter($title,$url){
    echo "<script>alert('$title');location.href='$url';</script>";

}
//浏览器大跳转
function webTopAlter($title,$url){
    echo "<script>alert('$title');top.location.href='$url';</script>";

}
//截取字符串
function strLeft($str,$length=10,$sl='……'){
    $strleng=mb_strlen($str,'gb2312');
    if($strleng>$length){
        return mb_substr($str,0,$length,'gb2312').$sl;
    }else{
        return $str;
    }
}
//首页截取字符串
function strindex($str,$length=10,$sl='……'){
    $strleng=mb_strlen($str,'utf-8');
    if($strleng>$length){
        return mb_substr($str,0,$length,'utf-8').$sl;
    }else{
        return $str;
    }
}


//IP
function getIP(){
    return $_SERVER['REMOTE_ADDR'];
}

//Pp批量过滤

function guolvStr($str){

    $str=trim($str);
    if(!get_magic_quotes_gpc()){
        $str=addslashes($str);
    }
    return htmlspecialchars($str);

}

//获取分类
function getProductType($tj=""){
    $sql=" select typename, id from mall_productList ";
    $parm=" where  1 ".$tj;
    $sql.=$parm;
    return $this->db->select($sql);

}

