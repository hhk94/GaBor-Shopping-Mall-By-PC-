<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 14:30
 */
require_once '../public/init.php';

$userinfo=new UserInfo();
$zt=$userinfo->isok();

$ymima=md5($_POST['yPassword']);
$xmima=md5($_POST['xPassword']);
$qmima=md5($_POST['qPassword']);

$sql="select * from mall_user where username = '".UID."'  and password = '$ymima' ";

$db->sql($sql);
//echo $sql;
//echo $db->affected();

if($db->affected()!=1){
    webAlter('原密码错误','user_main_middle_ChangePassword.php');
    exit;
};

if($xmima!=$qmima){
    webAlter('两次密码输入不一致','user_main_middle_ChangePassword.php');
    exit;
}

$sql=" update mall_user set password = '$xmima' where username= '".UID."' "   ;

$isok=$db->sql($sql);

if($isok){
    session_destroy();
    $_SESSION=array();
    webTopAlter('您的密码修改成功，请重新登录','login.php');

}else{
    webTopAlter('修改失败','user_main_middle_ChangePassword.php');
}


