<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/28
 * Time: 16:54
 */



require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=@$_POST['id'];

$zt=@$_POST['zt'];
$db=new DbMysql();

if(count($id)==0){
    echo "<script>alert('请选择一条信息');location.href='./user.php'</script>";

    exit;

}

foreach ( $id as $item) {
    $sql="update mall_user set zt = '$zt' where id ='$item'";
    $isok=$db->sql($sql);
    if($isok!=1){
        echo "<script>alert('出现错误ID：$v');location.href='./user.php'</script>";
        exit;
    }

}

echo "<script>alert('批量处理成功');location.href='./user.php'</script>";