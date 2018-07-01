<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/26
 * Time: 17:08
 */

require_once "../down/checkLogin.php";
require_once "../down/connectDb.php";
require_once "../down/config.class.php";

$up=new config();
$up->configUp();
