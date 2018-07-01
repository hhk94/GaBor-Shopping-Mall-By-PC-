<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/29
 * Time: 17:08
 */

require_once '../public/init.php';

//var_dump($_POST);

$action=$_REQUEST['action'];
$receive=new receive();

$title='收货地址';
$info="";
$url="user_main_middle_receive.php";

switch ($action){
    case "add":
        $infos=$_POST;

        if($receive->receiveAdd($infos,$_SESSION['editOK'])){
            $info= "添加地址成功";
        }else{
            $info=  "添加地址失败";
        };

        break;
    case "edit":
        $infos=$_POST;

        if($receive->receiveEdit($infos,$_SESSION['editOK'])){
            $info= "修改地址成功";
        }else{
            $info=  "修改地址失败";
        };

        break;
    case "del":

        $id=$_GET['id'];
        if($receive->receiveDel($id)){
            $info='删除成功';
        }else{
            $info='删除失败';
        };

        break;
    default:

        break;
}

$_SESSION['editOK']='not ok';
include "user_main_middle_deal_ok.php";