<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/20
 * Time: 16:25
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$del=new DbMysql();
$id=$_GET['id'];

if($id==""){
    echo "<script>alert('ID不能为空');location.href='./feedback.php'</script>";
    exit();
}

$del->sql("select * from mall_feedback where id = '$id' ");

if($del->affected()!=1){
    echo "<script>alert('ID丢失');location.href='./feedback.php'</script>";
    exit();

}

$del->sql("delete from mall_feedback where id = '$id' ");

if($del->affected()==1){
    echo "<script>alert('留言信息删除成功');location.href='./feedback.php'</script>";
}else{
    echo "<script>alert('留言信息删除失败');location.href='./feedback.php'</script>";
}