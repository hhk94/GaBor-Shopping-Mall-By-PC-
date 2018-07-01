<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/21
 * Time: 17:29
 */
require_once '../public/init.php';

$id=$_POST['id'];
$sum=$_POST['sum'];

//echo "id=".$id."sum=".$sum;

$cart=new cart();

if($cart->addCart($id,$sum)){



    echo 1;
//    $cartList=$cart->cartInfo();

//    echo  $_SESSION['cartPrice'];



}else{
    echo "出现问题，请重新登录";
};