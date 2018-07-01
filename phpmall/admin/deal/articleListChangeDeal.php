<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 10:43
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
$id=$_GET['id'];
$typename = $_POST['typename'];
$edit=new DbMysql();
$edit->sql("update mall_articleType set typename='$typename' where id='$id'");



//$add=new DbMysql();
//$add->sql("insert into articleType(typename) values('$typename')");
$isok=$edit->affected();



if($isok==1){
    echo "<script>alert('修改成功');location.href='./../article/articleList.php'</script>";
}else{
    echo "<script>alert('修改失败,类名修改前后一致');location.href='./../article/articleListChange.php?id=$id'</script>";
}