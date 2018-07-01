<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/20
 * Time: 18:10
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$db=new DbMysql();
$id=$_POST['id'];
$typeid=$_POST['typeid'];
$issh=$_POST['issh'];
$ishf=$_POST['ishf'];
$content=$_POST['content'];
$recontent=$_POST['recontent'];
$usernameshow=$_POST['usernameshow'];

if($id==""){
    echo "<script>alert('ID不存在');location.href='./feedback.php'</script>";
    exit();
}

$db->sql("select * from mall_feedback where id = '$id'");

if($db->affected()!=1){
    echo "<script>alert('ID不存在');location.href='./feedback.php'</script>";
    exit();
}

if($typeid==""){
    echo "<script>alert('分类ID不能为空');location.href='./feedback.php'</script>";
    exit();
}

if($content==""){
    echo "<script>alert('留言内容不能为空');location.href='./feedback.php'</script>";
    exit();
}



$sql="update mall_feedback set typeid='$typeid',issh='$issh',ishf='$ishf',content='$content',recontent='$recontent',usernameshow='$usernameshow' where id = '$id' ";

$isok=$db->sql($sql);

if($isok==1){
    echo "<script>alert('留言修改成功');location.href='./feedback.php'</script>";
}else{
    echo "<script>alert('留言修改失败');location.href='./feedback.php'</script>";
}