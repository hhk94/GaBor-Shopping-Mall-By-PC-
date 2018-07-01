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

$typeid=$mag->str($_POST['typeid']);
$title=$mag->str($_POST['title']);
$author=$mag->str($_POST['author']);
$com=$mag->str($_POST['com']);
$hits=$mag->str($_POST['hits']);
$content=$_POST['content'];
$inputer=$_SESSION['username']; //当前登录的id
$time=time();

$sql="insert into mall_article (title,typeid,author,com,hits,inputer,addtime,content) values ('$title','$typeid','$author','$com','$hits','$inputer','$time','$content')";

echo  $sql;
exit;



$add=new DbMysql();
$add->sql($sql);






$isok=$add->affected();


if($isok==1){
    echo "<script>alert('文章添加成功');location.href='./../article/article.php'</script>";
}else{
    echo "<script>alert('文章添加失败');location.href='./../article/articleAdd.php'</script>";
}




//echo $add->affected();