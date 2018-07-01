<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/12
 * Time: 17:22
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
$id = $_GET['id'];
$edit=new DbMysql();
$username=$_POST['username'];
$password=$_POST['password'];
$rights=$_POST['rights'];

$edit->sql("update mall_admin set username='$username',password='$password',rights='$rights' where id = '$id'");
$isok=$edit->affected();
if($isok==1){
    echo "<script>alert('修改成功');location.href='./../adminAdmin.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='./../adminChange.php'</script>";
}