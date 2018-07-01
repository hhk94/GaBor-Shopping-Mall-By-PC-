<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/22
 * Time: 18:36
 */

require_once "../admin/down/connectDb.php";
require_once "../admin/down/userInfo.class.php";

session_start();

if(empty($_POST)){
     echo "";
    exit();
}


$userinfo=new UserInfo();

$username=$_POST['login_username'];
$password=$_POST['login_password'];
$code=$_POST['verifcode'];

echo $userinfo->islogin($username,$password,$code);
