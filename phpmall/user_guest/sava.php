<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/6
 * Time: 16:25
 */
require_once "../public/init.php";

//var_dump($_POST);

$info=array_map("guolvStr",$_POST);

$zt=0;
if($webguest=="N"){
    $zt="1";
}



$addtime=time();
$ip=getIP();
$sql=" insert into mall_feedback(content,usernameshow,inputer,addtime,mobile,email,ip,issh,typeid) values('{$info['content']}','{$info['usernameshow']}','{$info['usernameshow']}','$addtime','{$info['mobile']}','{$info['email']}','$ip','$zt','{$info['typeid']}')";



if($db->sql($sql)){
    webAlter("留言成功",$webdir."/user_guest/");
}else{
    webAlter("留言成功",$webdir."/user_guest/");
};