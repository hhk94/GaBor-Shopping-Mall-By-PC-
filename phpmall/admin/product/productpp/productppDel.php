<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/4
 * Time: 17:20
 */


require_once "./../../down/checkLogin.php";
require_once "./../../down/connectDb.php";

$id=$_GET['id'];

$db=new DbMysql();

$sql="delete from mall_productPP where id = '$id' ";

$isok=$db->sql($sql);

if($isok==1){
    echo "<script>alert('删除成功');location.href='./productpp.php'</script>";


}else{
    echo "<script>alert('删除失败');location.href='./productpp.php'</script>";

}
