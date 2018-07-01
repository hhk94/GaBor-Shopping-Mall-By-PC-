<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/13
 * Time: 16:01
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

//var_dump($_POST);
$picurls='';
$pid=$_POST['pid'];
$issh=$_POST['issh'];
$istop=$_POST['istop'];
$recommend=$_POST['recommend'];
$pinglun=$_POST['pinglun'];
$content=$_POST['content'];
$usernameshow=$_POST['usernameshow'];
$ip="管理员";
$addtime=time();
$inputer=$_SESSION['username'];


foreach($_SESSION['urlfile_info'] as $row=>$v){

    $picurls.=$_POST['picinfook'.$row]."@".$v;
    $picurls.="#";
}




$db= new DbMysql();

$result=$db->select("select title from mall_product where id = '$pid'");
if(empty($result)){
    echo "<script>alert('商品关联ID不存在，请检查');location.href='./assessAdd.php'</script>";
    exit;

}

$pname= $result[0]['title'];




$sql="insert into mall_assess(pid,issh,istop,recommend,pinglun,content,usernameshow,ip,addtime,inputer,picurls) values('$pid','$issh','$istop','$recommend','$pinglun','$content','$usernameshow','$ip','$addtime','$inputer','$picurls')";

$isok=$db->sql($sql);

if($isok==1){
    echo "<script>alert('商品 ".$pname." 添加成功');location.href='./assess.php'</script>";
}else{
    echo "<script>alert('商品 ".$pname." 添加失败');location.href='./assessAdd.php'</script>";
}