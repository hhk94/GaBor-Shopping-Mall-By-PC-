<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/20
 * Time: 16:26
 */

require_once "../public/init.php";


if(!ISLOGIN){
    echo "nologin";
    exit;
}

$cart=new cart();

$id=$_POST['id'];
$sum=$_POST['sum'];

$sql="select * from mall_product where id = '$id' ";

$result=$db->select($sql,1);

if(empty($result)){
    echo 0;
    exit;
}

if($sum>$result['kucun']){
    echo 2;
    exit;

}



if($cart->addCart($id,$sum)){
    echo 1;
}
;


