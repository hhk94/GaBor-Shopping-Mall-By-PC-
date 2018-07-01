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




$name=$maig->str($_POST['name']);
$zhiwei=$_POST['zhiwei'];
$style=$_POST['style'];
$idea=$_POST['idea'];
$touxiang=$_POST['touxiang'];
$fenlei=$_POST['fenlei'];
$wtime=$_POST['wtime'];
$school=$_POST['school'];
$picurls='';


foreach($_SESSION['urlfile_info'] as $row=>$v){

    $picurls.=$_POST['picinfook'.$row]."@".$v;
    $picurls.="#";
}

//echo $ppid;
//exit;
$add=new DbMysql();

$sql=" insert into mall_design (id,designName,zhiwei,style,idea,touxiang,works,fenlei,wtime,school) values (NULL,'$name','$zhiwei','$style','$idea','$touxiang','$picurls','$fenlei','$wtime','$school')";

//echo $sql;
//exit;

$result=$add->sql($sql);



if($result==1){
    echo "<script>alert('新增成功');location.href='./design.php'</script>";
}else{
    echo "<script>alert('新增失败');location.href='./design.php'</script>";
}