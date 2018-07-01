<?php
session_start();

if(empty($_SESSION['username'])){

    echo "<script>alert('请正确登录商城管理系统');top.location.href='./login.php'</script>";
    exit;

}

?>