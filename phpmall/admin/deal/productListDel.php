<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/4
 * Time: 18:11
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
require_once "./../down/productType.class.php";


$id=$_GET['id'];

$del=new ProductType();

$del->typeDel($id);

echo "<script>alert('删除成功');location.href='../product/productList.php';</script>";


