<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 10:25
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

//header("Content-type: text/html; charset=utf-8");

$fifel=$_FILES['logoUrl'];
$webname=$_POST['webName'];
$weburl=$_POST['webUrl'];
$styleid=$_POST['styleid'];
$intro=$_POST['intro'];
$time=time();

$ftype=$fifel['type'];
$fsize=$fifel['size'];

if($fsize<104857600){

}else{
    echo "<script>alert('上传文件不满足条件');location.href='../links/links.php'</script>";
    exit;
}

//echo $fifel['name'];
//echo "<br>";
//echo $fifel["tmp_name"];
//
//exit;


$fifel["name"]=iconv("UTF-8","gb2312", $fifel["name"]);

//echo $fifel["name"];

move_uploaded_file($fifel["tmp_name"], "../../upload/".$fifel["name"]);

$fifel["name"]=iconv("gb2312","UTF-8", $fifel["name"]);

$logourl="upload/".$fifel['name'];

//
//echo $logourl;
//echo "<br>";
//echo $webname.$weburl.$fifel['name'].$styleid;

$add=new DbMysql();
$add->sql("insert into mall_links(webname,weburl,styleid,logourl,addtime,intro) value('$webname','$weburl','$styleid','$logourl','$time','$intro')");

$isok=$add->affected();
//echo $isok;
if($isok==1){
    echo "<script>alert('友情链接添加成功');location.href='../links/links.php'</script>";
}else{
    echo "<script>alert('友情链接添加失败');location.href='../links/linkAdd.php'</script>";
}