<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27
 * Time: 15:54
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

//var_dump($_POST);

$id=@$_POST['id'];

if(count($id)<1){
    echo "<script>alert('请选择一个要删除的信息');location.href='./user.php'</script>";
    exit;
}

$del=new DbMysql();

foreach($id as $v){
    $sql=" delete from mall_user where id = '$v'";
    $isok=$del->sql($sql);
    if($isok!=1){
        echo "<script>alert('出现错误ID：$v');location.href='./user.php'</script>";
        exit;
    }
}

echo "<script>alert('批量修改成功');location.href='./user.php'</script>";