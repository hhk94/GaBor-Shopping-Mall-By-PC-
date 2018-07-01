<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/21
 * Time: 16:33
 */

require_once '../public/init.php';

$id=$_POST['id'];

$cart=new cart();

if($cart->delCart($id)){
    echo 1;
}else{
    echo 2;
};