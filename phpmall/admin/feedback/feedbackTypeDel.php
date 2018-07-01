<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/17
 * Time: 11:24
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=$_GET['id'];

$del=new DbMysql();


$sql="delete from mall_feedbackType where id = '$id'";

$del->sql($sql);

if($del->affected()==1){

    echo "<script>alert('删除成功');location.href='./feedbackType.php'</script>";
}else{

    echo "<script>alert('删除失败');location.href='./feedbackType.php'</script>";
}
