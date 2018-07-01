<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/25
 * Time: 16:51
 */

require_once '../public/init.php';

$info=array_map("guolvStr",$_POST);
//$info=array_map("utf",$info);
//function utf($str){
//    return iconv("utf-8",'gb2312',$str);
//}

$ip=getIP();
$addtime=time();

foreach ($_SESSION['productCart'] as $k=>$v){
    $sql="insert into mall_orderList(orderID,pid,title,unitPrice,Price,total,picurl) values('{$info['orderid']}','$k','{$v['title']}','{$v['unitPrice']}','{$v['Price']}','{$v['total']}','{$v['picurl']}') ";
    $db->sql($sql);

}



$sql=" insert into mall_productOrder (orderID,price,shren,shdizhi,youbian,mobile,payment,dTime,feedback,ip,addtime,username) VALUES  ('{$info['orderid']}','{$info['price']}','{$info['shren']}','{$info['shdizhi']}','{$info['youbian']}','{$info['mobile']}','{$info['delivery_id']}','{$info['delivery_time']}','{$info['message']}','$ip','$addtime','".UID."')";




if($db->sql($sql)){
    echo 1;

}else{
    echo 2;
}