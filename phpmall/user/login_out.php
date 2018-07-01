<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 9:57
 */
require_once "../public/init.php";

session_destroy();
$_SESSION=array();
//echo $webdir.'phpmall/index.php';

$title='退出成功！';
$url= $webdir.'/index.php';
webAlter($title,$url);

