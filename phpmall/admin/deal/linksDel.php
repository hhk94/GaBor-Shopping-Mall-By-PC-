<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/31
 * Time: 14:54
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=$_GET['id'];


$add=new DbMysql();
$add->sql("delete from mall_links where id= '$id'");
$isok=$add->affected();



if($isok==1){
    echo "<script>alert('删除成功');location.href='./../links/links.php'</script>";
}else{
    echo "<script>alert('失败成功');location.href='./../links/links.php'</script>";
}