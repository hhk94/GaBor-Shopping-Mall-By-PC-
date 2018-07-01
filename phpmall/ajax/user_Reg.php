<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/27
 * Time: 14:56
 */
require_once "../public/init.php";



$username=$_POST['reg_username'];


$password=md5($_POST['reg_password']);
$code=$_POST['reg_code'];
$mobile=$_POST['reg_phone'];

if($code!=$_SESSION['code']){
    echo 0;
    exit;
}




$db=new DbMysql();

$db->sql("select * from mall_user where username = '$username'");

if($db->affected()!=0){
        echo "5";
        exit;
}
$zt=1;

if($reguser=='N') {
    $zt=2;
}



$sql="insert into mall_user (username,password,mobile,email,zt,tiwen,huida,sex,xingming) values('$username','$password','$mobile','$username','$zt',null,null,null,null)";

$db->sql($sql);

$isok=$db->affected();

if($isok==1){
    echo $zt;
}
