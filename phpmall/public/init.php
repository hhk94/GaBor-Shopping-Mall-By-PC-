<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/24
 * Time: 15:11
 */

define("webdir",dirname(dirname(__FILE__)));


require_once webdir."/admin/config/config.php";
require_once webdir."/public/functions.php";
session_start();
$uid="";
$islogin=false;
$pwd="";

if(isset($_SESSION['webusername'])){
    $uid=$_SESSION['webusername'];
    $pwd=$_SESSION['webpassword'];
    $islogin=true;

}

define("ISLOGIN",$islogin);
define("UID",$uid);
define("PWD",$pwd);



function __autoload($classname){
    if($classname=='DbMysql'){
        $file= webdir."/admin/down/connectDb.php";
    }else{
        $file= webdir."/admin/down/".$classname.".class.php";
    }


    include_once $file;
}
$db=new DbMysql();
$action=new action();