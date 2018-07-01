<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/4
 * Time: 9:44
 */

require_once "./../../down/checkLogin.php";
require_once "./../../down/connectDb.php";

//var_dump($_POST);

$ppname=$_POST['ppname'];
$pporder=$_POST['pporder'];
$recommend=$_POST['recommend'];
$picurl=$_POST['picurl'];
$ppinfo=$_POST['ppinfo'];

$db=new DbMysql();


$db->sql("select * from mall_productPP where ppname = '$ppname'");

if($db->affected()>0){
    echo "<script>alert('品牌名称已经存在,请确认后重新添加');location.href='./productpp.php'</script>";
    exit;

}








$sql="insert into mall_productPP (ppname,pporder,recommend,picurl,ppinfo) values ('$ppname','$pporder','$recommend','$picurl','$ppinfo') ";

$result=$db->sql($sql);

 $isok=$db->affected();


if($isok==1){
    echo "<script>alert('创建成功');location.href='./productpp.php'</script>";
}else{
    echo "<script>alert('创建失败');location.href='./productppAdd.php'</script>";
}