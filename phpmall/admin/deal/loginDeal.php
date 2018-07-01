<?php
session_start();
//链接数据库
require_once './../down/connectDb.php';
require_once './../down/adminLogin.class.php';


//获取提交的数据
$user=$_POST['username'];
$password=$_POST['userpsd'];
$code=$_POST['code'];



if($code!=$_SESSION['code']){
    echo "<script>alert('验证码不正确');location.href='./../login.php';</script>";
    exit;
}


$login= new adminLogin();
$isLogin=$login->isLogin($user,$password);

    if($isLogin==1){

        $_SESSION['username']=$user;
        $_SESSION['password']=$password;
        echo "<script>alert('欢迎回来$user;');location.href='./../adminIndex.php'</script>";

    }else if($isLogin==-1){
        echo "<script>alert('密码错误');location.href='./../login.php';</script>";

    }else if($isLogin==-2){
        echo "<script>alert('账号不存在');location.href='./../login.php';</script>";
    };

?>


