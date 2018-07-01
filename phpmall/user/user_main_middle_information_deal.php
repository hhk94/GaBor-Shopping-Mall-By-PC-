<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/29
 * Time: 9:58
 */

require_once "../public/init.php";

$title='修改资料';


$url='user_main_middle_information.php';

$xingming=$_POST['realname'];
$sex=$_POST['sex'];
$mobile=$_POST['mobile'];

$sql="update mall_user set xingming = '$xingming' ,sex = '$sex',mobile = '$mobile'  where username = '".UID."'
";

$isok=$db->sql($sql);

if($isok){

    $info='修改资料成功';
}else{
    $info='修改失败';
}


include 'user_main_middle_deal_ok.php';