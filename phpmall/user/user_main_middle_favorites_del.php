<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/23
 * Time: 17:02
 */

require_once "../public/init.php";

$id=$_GET['id'];

$db=new DbMysql();

$sql=" delete  from mall_favorites where id = '$id' and username = '".UID."'";

$db->sql($sql);

$isok=$db->affected();

if($isok==1){
    echo "<script>alert('删除成功');location.href='./user_main_middle_favorites.php'</script>";
}else{
    echo "<script>alert('删除失败');;location.href='./user_main_middle_favorites.php'</script>";
}