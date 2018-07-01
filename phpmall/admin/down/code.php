<?php
//创建
$img= imagecreate(50,30);
//北京颜色
$b = imagecolorallocate($img,0,0,0);
//文本颜色
$f = imagecolorallocate($img,255,255,255);
$str="1234567890";
$s='';
        //循环取4位验证码
    for($i=0;$i<4;$i++){
        $k=mt_rand(1,strlen($str));
        $s.=$str[$k-1];
    }

    //填充颜色
    imagefill($img,0,0,$b);
    imagestring($img,5,5,3,$s,$f);
    header("content-type:image/png");
    imagepng($img);

    session_start();
    $_SESSION['code']=$s;

?>