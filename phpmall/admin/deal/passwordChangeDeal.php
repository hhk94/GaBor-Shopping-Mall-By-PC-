<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/12
 * Time: 17:22
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$username=$_POST['username'];
$password=$_POST['password'];

//echo $username.$password;

$edit= new DbMysql();
$edit->sql("update mall_admin set password ='$password' where username='$username'");

echo "<script>alert('修改成功，请重新登录');top.location.href='./../login.php'</script>";

session_destroy();