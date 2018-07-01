<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7
 * Time: 16:24
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=$_GET['id'];

$db=new DbMysql();

$db->sql("select * from mall_consultType where id = '$id'");

if($db->affected()!=1){
    echo "<script>alert('信息不存在');location.href='./consultType.php'</script>";
}




$sql="delete from mall_consultType where id = '$id'";

$isok=$db->sql($sql);


if($isok==1){
    echo "<script>alert('删除成功');location.href='./consultType.php'</script>";
}else{
    echo "<script>alert('删除失败');location.href='./consultType.php'</script>";
}