<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/14
 * Time: 11:20
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=$_GET['id'];

$del=new DbMysql();
$del->sql("delete from mall_article where id='$id'");

$isok=$del->affected();

if($isok==1){
    echo "<script>alert('文章删除成功');location.href='./../article/article.php'</script>";
}else{
    echo "<script>alert('文章删除失败');location.href='./../article/articleAdd.php'</script>";
}
