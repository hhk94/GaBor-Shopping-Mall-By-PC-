<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 17:12
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
require_once "./../down/maig.class.php";

$mag=new maig();
$mag->str($_POST['title']);
$id=$_GET['id'];
$typeid=$mag->str($_POST['typeid']);
$title=$mag->str($_POST['title']);
$author=$mag->str($_POST['author']);
$com=$mag->str($_POST['com']);
$hits=$mag->str($_POST['hits']);
$content=$_POST['content'];
$inputer=$_SESSION['username']; //当前登录的id
$time=time();

$add=new DbMysql();
$add->sql("update mall_article set title='$title',typeid='$typeid',author='$author',com='$com',hits='$hits',inputer='$inputer',addtime='$time',content='$content' where id = '$id'");


$isok=$add->affected();

if($isok==1){
    echo "<script>alert('文章修改成功');location.href='./../article/article.php'</script>";
}else{
    echo "<script>alert('文章修改失败');location.href='./../article/articleChange.php?id={$id}'</script>";
}




//echo $add->affected();