<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/23
 * Time: 17:02
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
$id=$_GET['id'];

$db=new DbMysql();

$sql="delete  from mall_receive where id = '$id'";

$db->sql($sql);

$isok=$db->affected();

if($isok==1){
    echo "<script>alert('删除成功');location.href='./receive.php'</script>";
}else{
    echo "<script>alert('删除失败');location.href='./receive.php'</script>";
}