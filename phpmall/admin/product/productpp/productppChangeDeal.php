<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7
 * Time: 9:32
 */

require_once "./../../down/checkLogin.php";
require_once "./../../down/connectDb.php";

//var_dump($_POST);
$id=$_GET['id'];
$ppname=$_POST['ppname'];
$pporder=$_POST['pporder'];
$recommend=$_POST['recommend'];
$picurl=$_POST['picurl'];
$ppinfo=$_POST['ppinfo'];

$db=new DbMysql();

$db->sql("select * from user_productPP where ppname = '$ppname' and not id = '$id'");

if($db->affected()>0){
    echo "<script>alert('要修改的品牌名已经存在');location.href='./productpp.php'</script>";
    exit;
}











$sql="update user_productPP set ppname = '$ppname',pporder = '$pporder',recommend = '$recommend',picurl = '$picurl',ppinfo = '$ppinfo' where id = '$id'";

$isok=$db->sql($sql);



if($isok==1){
    echo "<script>alert('修改成功');location.href='./productpp.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='./productppChange.php'</script>";
}