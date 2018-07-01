<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/17
 * Time: 15:26
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
require_once "./../down/maig.class.php";

$db= new DbMysql();

$id=$_GET['id'];

$typename=$_POST['typename'];
$typeorder=$_POST['typeorder'];
$typezt=$_POST['typezt'];



if($typename==""){

    echo "<script>alert('分类不能为空');location.href='./feedbackType.php'</script>";
    exit();
}









$db->sql("select * from mall_feedbackType where id = '$id'");
if($db->affected()!=1){

    echo "<script>alert('该id不存在');location.href='./feedbackType.php'</script>";
    exit();
}

$db->sql("select * from mall_feedbackType where typename='$typename' and not id = '$id'");
if($db->affected()!=0){

    echo "<script>alert('分类名 $typename 已经存在');location.href='./feedbackType.php'</script>";
    exit();
}



$sql="update mall_feedbackType set typename = '$typename',typeorder = '$typeorder',typezt= '$typezt' where id ='$id'";

$isok=$db->sql($sql);





if($isok==1){
    echo "<script>alert('修改分类成功');location.href='./feedbackType.php'</script>";
}else{
    echo "<script>alert('修改分类失败');location.href='./feedbackType.php'</script>";
}