<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/8
 * Time: 11:56
 */

//var_dump($_POST);

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$db= new DbMysql();

$username=$_POST['username'];
$pid=$_POST['pid'];
$typeid=$_POST['typeid'];
$issh=$_POST['issh'];
$ishf=$_POST['ishf'];
$content=$_POST['content'];
$recontent=$_POST['recontent'];


date_default_timezone_set('Asia/Shanghai');
$addtime=time();
$inputer=$_SESSION['username'];
$ip="管理员";



$db->Sql("select * from mall_product where id = '$pid'");

    if($db->affected()!=1
){
    echo "<script>alert('商品关联ID不存在，请检查');location.href='./consultAdd.php'</script>";
        exit;
}


if($recontent==""){
    $ishf=0;
}





$sql="insert into mall_consult (pid,typeid,issh,ishf,content,recontent,usernameshow,addtime,inputer,ip) values ('$pid','$typeid','$issh','$ishf','$content','$recontent','$username','$addtime','$inputer','$ip')";

$isok=$db->sql($sql);

if($isok==1){
    echo "<script>alert('新增成功');location.href='./consult.php'</script>";
}else{
    echo "<script>alert('新增失败');location.href='./consultAdd.php'</script>";
}