<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27
 * Time: 15:17
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=$_GET['id'];

$del=new DbMysql();

$isok=$del->sql("delete from mall_user where id = '$id'");

if($isok==1){

    echo "<script>alert('删除会员成功');location.href='./user.php'</script>";
}else{
    echo "<script>alert('删除会员失败');location.href='./user.php'</script>";
}