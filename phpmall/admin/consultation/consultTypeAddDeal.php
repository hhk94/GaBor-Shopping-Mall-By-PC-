<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7
 * Time: 14:36
 */


require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

//var_dump($_POST);

$typename=$_POST['typename'];
$typeorder=$_POST['typeorder'];
$typezt=$_POST['typezt'];

$db=new DbMysql();

$db->sql("select * from mall_consultType where typename = '$typename'");

if($db->affected()>0){
    echo "<script>alert('重名请检查');location.href='./consultType.php'</script>";

}



$sql="insert into mall_consultType (typename,typeorder,typezt) values ('$typename','$typeorder','$typezt')";

$isok=$db->sql($sql);

if($isok==1){
    echo "<script>alert('创建售前咨询成功');location.href='./consultType.php'</script>";
}else{
    echo "<script>alert('创建售前咨询失败');location.href='./consultTypeAdd.php'</script>";
}