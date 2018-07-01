<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/26
 * Time: 11:29
 */

require_once "../down/checkLogin.php";
require_once "../down/connectDb.php";
require_once "../down/config.class.php";

$varshowname=$_POST['varshowname'];
$varname=$_POST['varname'];
$varinfo=$_POST['varinfo'];
$vartype=$_POST['vartype'];
$varvalue=$_POST['varvalue'];

//echo $varname;
//echo $varinfo;
//echo $vartype;
//echo $varvalue;

if(preg_match("/[^a-z_]/i",$varname)){
    echo "<script>alert('请输入a-z做为变量名');location.href='setting.php'</script>";
    exit;
};

if($vartype=='bool' && ($varvalue!="Y" && $varvalue!="N")){

        echo "<script>alert('作为bool类型，你需要输入Y或N');location.href='setting.php'</script>";

exit;
}



$add=new DbMysql();

$add->sql("select * from mall_webconfig where varname = '$varname'");

if($add->affected()>0){

    echo "<script>alert('已存在信息');location.href='./setting.php'</script>";
    exit();
}

$isok=$add->sql("insert into mall_webconfig (varshowname,varname,varinfo,vartype,varvalue) values ('$varshowname','$varname','$varinfo','$vartype','$varvalue')");
echo $isok;






if($isok==1){
    $up=new config();
    $up->configUp();

    echo "<script>alert('创建成功');location.href='./settingChange.php'</script>";
}else{
    echo "<script>alert('创建失败');location.href='./settingChange.php'</script>";
}