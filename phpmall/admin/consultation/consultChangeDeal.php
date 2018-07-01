<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/10
 * Time: 16:07
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

//var_dump($_POST);
$db=new DbMysql();

$id=$_GET['id'];
$pid=$_POST['pid'];
$typeid=$_POST['typeid'];
$issh=$_POST['issh'];
$ishf=$_POST['ishf'];
$content=$_POST['content'];
$recontent=$_POST['recontent'];
$usernameshow=$_POST['username'];


$db->sql("select * from mall_consult where id = '$id'");


if($db->affected()!=1){
    echo "<script>alert('未知错误');location.href='./consult.php'</script>";
    exit;
};
if($recontent==""){
    $ishf=0;
}




echo $sql="update mall_consult set pid = '$pid',typeid ='$typeid',ishf ='$ishf',issh='$issh',content='$content',recontent ='$recontent',usernameshow = '$usernameshow' where id = '$id'";




$isok=$db->sql($sql);



if($isok==1){
    echo "<script>alert('修改成功');location.href='./consult.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='./consultChange.php?id=$id'</script>";
}