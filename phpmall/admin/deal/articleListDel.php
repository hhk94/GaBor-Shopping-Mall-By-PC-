<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 10:43
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=$_GET['id'];


$add=new DbMysql();
$add->sql("delete from mall_articleType where id= '$id'");
$isok=$add->affected();



if($isok==1){
    echo "<script>alert('删除成功');location.href='./../article/articleList.php'</script>";
}else{
    echo "<script>alert('失败成功');location.href='./../article/articleList.php'</script>";
}