<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/19
 * Time: 15:34
 */

session_start();

$image_id=isset($_GET['id'])?$_GET['id']:false;




if($image_id==false){
    echo "no id";
    exit;

}else {


    unlink($_SESSION['urlfile_info'][$image_id]);
    unset($_SESSION['urlfile_info'][$image_id]);

    unset($_SESSION['file_info'][$image_id]);
}