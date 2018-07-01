<?php
session_start();
include '../connectAdmin.php';

$id =  $_GET['id'];

echo $id;

$renew = "delete from user where id =".$id;


$query = mysqli_query($con, $renew);




if(!$query){
    echo mysqli_error($con);
    echo "<script>alert('删除失败')</script>";

}else{
    echo "<script>alert('删除成功')</script>";
    // 判定是否为 肖右生组

}

header("refresh:0; url=../admin/adminIndex.php");