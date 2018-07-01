<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/14
 * Time: 17:06
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=$_GET['id'];
$pid=$_POST['pid'];
$issh=$_POST['issh'];
$istop=$_POST['istop'];
$recommend=$_POST['recommend'];
$pinglun=$_POST['pinglun'];
$content=$_POST['content'];
$usernameshow=$_POST['usernameshow'];


$db=new DbMysql();

$db->sql("select * from mall_assess where id = '$id'");

if($db->affected()!=1){
    echo "<script>alert('ID错误');location.href='./assess.php'</script>";
    exit;
}
$db->sql("select * from mall_product where id = '$pid'");
if($db->affected()!=1){
    echo "<script>alert('商品ID错误');location.href='./assess.php'</script>";
    exit;
}






 $sql="update mall_assess set pid = '$pid',issh='$issh',istop='$istop',recommend='$recommend',pinglun='$pinglun',content='$content',usernameshow = '$usernameshow' where id = '$id'";

$isok=$db->sql($sql);


if($isok==1){
    echo "<script>alert('修改成功');location.href='./assess.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='./assess.php'</script>";
}