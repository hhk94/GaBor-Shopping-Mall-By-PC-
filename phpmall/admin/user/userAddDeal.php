<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/25
 * Time: 17:23
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

//var_dump($_POST);

$username=$_POST['username'];
$password=md5($_POST['password']);
$email=$_POST['email'];
$tiwen=$_POST['tiwen'];
$huida=$_POST['huida'];
$zt=$_POST['zt'];
$xingming=$_POST['xingming'];
$sex=$_POST['sex'];
$mobile=$_POST['mobile'];


$db= new DbMysql();

$db->sql("select * from mall_user where username = '$username'");


if($db->affected()>=1){
    echo "<script>alert('已经存在用户$username');location.href='./userAdd.php'</script>";
    exit;
}





$sql=" insert into mall_user (username,password,email,tiwen,huida,zt,xingming,sex,mobile) values ('$username','$password','$email','$tiwen','$huida','$zt','$xingming','$sex','$mobile')";

$result=$db->sql("$sql");

$isok=$db->affected();



if($isok==1){

    echo "<script>alert('创建成功');location.href='./user.php'</script>";
}else{
    echo "<script>alert('创建失败');location.href='./userAdd.php'</script>";
}