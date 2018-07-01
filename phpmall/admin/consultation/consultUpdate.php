<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/13
 * Time: 13:43
 */

var_dump($_POST);

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=@$_POST['id'];

$db=new DbMysql();

if(count($id)==0){
    echo "<script>alert('请选择一个要更改信息');location.href='./consult.php'</script>";
    exit();
}

$infozt=$_POST['infozt'];
$ziduan=$_POST['ziduan'];

foreach ($id as $item) {
    $sql="update mall_consult set $ziduan= '$infozt' where id = '$item'";
    $isok=$db->sql($sql);
    if($isok!=1){
        echo "<script>alert('批量操作失败');location.href='./consult.php'</script>";
        exit();
    }
}


    echo "<script>alert('批量操作成功');location.href='./consult.php'</script>";
