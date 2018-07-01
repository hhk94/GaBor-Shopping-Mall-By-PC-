<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/10
 * Time: 15:28
 */
require_once "./../down/checkLogin.php";

$id=$_GET['id'];
//echo $id;

require_once "./../down/connectDb.php";

//实例化操作类
$logDel=new DbMysql();
$logDel->sql("delete from mall_adminLog where id=$id");
$result=$logDel->affected();
if($result==1){
    echo "<script>alert('删除成功');location.href='../adminLog.php'</script>";
}else{
    echo "<script>alert('删除失败');location.href='../adminLog.php'</script>";
}