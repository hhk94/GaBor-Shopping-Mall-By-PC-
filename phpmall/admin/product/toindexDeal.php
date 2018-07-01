<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/24
 * Time: 17:52
 */

require_once '../../public/init.php';

$id=$_GET['id'];

echo $id;

$toindex=$_POST['toindex'];


$sql="update mall_product set toindex='$toindex' where id = '$id' ";


$result=$db->sql($sql);
$isok=$db->affected();

if($isok==1){
    echo "<script>alert('修改成功');location.href='./product.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='./product.php'</script>";
}