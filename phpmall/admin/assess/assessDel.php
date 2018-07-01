<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/14
 * Time: 15:10
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";



$id=$_GET['id'];

$db=new DbMysql();





$sql=" delete from mall_assess where id = '$id'";

$db->sql($sql);
$isok=$db->affected();





if($isok==1){
    echo "<script>alert(' 删除成功');location.href='./assess.php'</script>";
}else{
    echo "<script>alert('删除失败');location.href='./assess.php'</script>";
}