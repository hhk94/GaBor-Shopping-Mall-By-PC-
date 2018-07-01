<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/12
 * Time: 18:23
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
require_once "./../down/maig.class.php";

$maig= new maig();

//var_dump($_POST);
//exit;

$numbers=$_POST['numbers'];
$title=$maig->str($_POST['title']);
$typeid=$_POST['typeid'];
$kucun=$_POST['kucun'];
$hits=$_POST['hits'];
$picurl=$_POST['picurl'];
$content=$_POST['content'];
$picurls='';
$ppid=$_POST['ppid'];

$yprice=$_POST['yprice'];
$price=$_POST['price'];
$shortShow=$_POST['shortShow'];

$tuijianword=$_POST['tuijianword'];

$hot=empty($_POST['hot'])?0:$_POST['hot'];
$drop1=empty($_POST['drop1'])?0:$_POST['drop1'];
$recommend=empty($_POST['recommend'])?0:$_POST['recommend'];

$time=time();
$inputer=$_SESSION['username'];
$fenyetuijian = "0";

$style=$_POST['style'];


foreach($_SESSION['urlfile_info'] as $row=>$v){

    $picurls.=$_POST['picinfook'.$row]."@".$v;
    $picurls.="#";
}

//echo $ppid;
//exit;
$add=new DbMysql();

$sql=" insert into mall_product (id,numbers,title,ppid,typeid,hot,drops,recommend,kucun,hits,pic,picurls,content,addtime,inputer,yprice,price,shortShow,fenyetuijian,tuijianword,style) values (NULL,'$numbers','$title','$ppid','$typeid','$hot','$drop1','$recommend','$kucun','$hits','$picurl','$picurls','$content','$time','$inputer','$yprice','$price','$shortShow','$fenyetuijian','$tuijianword','$style')";

//echo $sql;
//exit;

$result=$add->sql($sql);



if($result==1){
    echo "<script>alert('新增成功');location.href='./../product/product.php'</script>";
}else{
    echo "<script>alert('新增失败');location.href='./../product/productAdd.php'</script>";
}