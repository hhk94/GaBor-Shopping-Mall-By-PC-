<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/20
 * Time: 17:00
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";



$id=$_GET['id'];

$del=new DbMysql();

$isok=$del->sql("delete from mall_product where id = '$id'");

if($isok==1){
    echo "<script>alert('删除成功');location.href='../product/product.php'</script>";

}else{
    echo "<script>alert('删除失败');location.href='../product/product.php'</script>";
}