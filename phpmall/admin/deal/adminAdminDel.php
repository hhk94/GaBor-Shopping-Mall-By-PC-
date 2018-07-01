<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/12
 * Time: 16:00
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
$id=$_GET['id'];
$del=new DbMysql();
$del->sql("delete from mall_admin where id='$id'");
$isok=$del->affected();
if($isok==1){
    echo "<script>alert('删除成功');location.href='./../adminAdmin.php'</script>";
}else{
    echo "<script>alert('删除失败');location.href='./../adminAdmin.php'</script>";
}