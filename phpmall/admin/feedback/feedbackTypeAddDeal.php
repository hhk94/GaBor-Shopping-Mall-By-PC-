<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/16
 * Time: 16:56
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
require_once "./../down/maig.class.php";

$db= new DbMysql();

$typename=$_POST['typename'];
$typeorder=$_POST['typeorder'];

$typezt=$_POST['typezt'];

if($typename==""){
    echo "Error";

}

$db->sql("select * from mall_feedbackType where typename='$typename'");

if($db->affected()!=0){

    echo "<script>alert('分类名称 $typename 已经存在');location.href='./feedbackType.php'</script>";
    exit();
}




$sql=" insert into mall_feedbackType (typename,typeorder,typezt) values ('$typename','$typeorder','$typezt') ";

$isok=$db->sql($sql);

if($isok==1){
    echo "<script>alert('新增分类成功');location.href='./feedbackType.php'</script>";
}else{
    echo "<script>alert('新增分类失败');location.href='./feedbackTypeAdd.php'</script>";
}