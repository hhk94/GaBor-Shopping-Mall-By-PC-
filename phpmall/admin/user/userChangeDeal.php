<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/28
 * Time: 15:04
 */


require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
$db=new DbMysql();
$id=$_GET['id'];

$username=$_POST['username'];
$password=$_POST['password'];

if($password!=""){
    $password=md5($password);
    $db->sql("update mall_user set password = '$password'");
    echo "<script>alert('密码修改成功');location.href='./user.php'</script>";
}


$email=$_POST['email'];
$tiwen=$_POST['tiwen'];
$huida=$_POST['huida'];
$zt=$_POST['zt'];
$xingming=$_POST['xingming'];
$sex=$_POST['sex'];
$mobile=$_POST['mobile'];



$sql="update mall_user set username = '$username',email= '$email',tiwen= '$tiwen',huida='$huida',zt='$zt',xingming='$xingming',sex='$sex',mobile='$mobile' where id = '$id'";

$isok=$db->sql($sql);




if($isok==1){

    echo "<script>alert('修改成功');location.href='./user.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='./userChange.php'</script>";
}