<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7
 * Time: 16:39
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";


$id=$_GET['id'];

$typename=$_POST['typename'];
$typeorder=$_POST['typeorder'];
$typezt=$_POST['typezt'];

$db=new DbMysql();

$db->sql("select * from mall_consultType where typename = '$typename'");
if($db->affected()>0){

    $sql="update mall_consultType set typeorder='$typeorder',typezt = '$typezt' where id = '$id'";

//    echo "<script>alert('该分类已经存在，请检查');location.href='./consultType.php'</script>";
//    exit;
}else{

    $sql="update mall_consultType set typename='$typename',typeorder='$typeorder',typezt = '$typezt' where id = '$id'";

}






$isok=$db->sql($sql);


if($isok==1){
    echo "<script>alert('修改成功');location.href='./consultType.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='./consultTypeChange.php?id=$id'</script>";
}