<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 17:12
 */
require_once ('../../lgCheck.php');
require_once "./../../down/connectDb.php";
require_once "./../../down/maig.class.php";

$mag=new maig();
//$mag->str($_POST['title']);

$typeid=$mag->str($_POST['typeid']);
//$title=$mag->str($_POST['title']);
//$author=$mag->str($_POST['author']);
//$com=$mag->str($_POST['com']);
//$hits=$mag->str($_POST['hits']);

$addtime=time();
date_default_timezone_set("Asia/Shanghai");
$time = date("Y-m-d H:i:s",$addtime);
$getcontent=$_POST['content'];


$content=$getcontent;

$inputer=$_SESSION['name']; //当前登录的id

$uid=$_SESSION['uid'];


$add=new DbMysql();
$add->sql("insert into log (typeid,inputer,addtime,content,uid) values('$typeid','$inputer','$time','$content','$uid')");
$isok=$add->affected();

if($isok==1){
    echo "<script>alert('文章添加成功');location.href='./../log.php'</script>";
}else{
    echo "<script>alert('文章添加失败');location.href='./../logAdd.php'</script>";
}




//echo $add->affected();