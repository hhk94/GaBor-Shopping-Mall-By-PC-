<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/10
 * Time: 14:59
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";


$id=$_GET['id'];

$del=new DbMysql();

$db->sql("select * from mall_consult where id = '$id'");


if($db->affected()!=1){
    echo "<script>alert('未知错误');location.href='./consult.php'</script>";
    exit;
};








$sql="delete from mall_consult where id = '$id' ";

$isok=$del->sql($sql);



if($isok==1){
    echo "<script>alert('删除成功');location.href='./consult.php'</script>";
}else{
    echo "<script>alert('删除失败');location.href='./consult.php'</script>";
}