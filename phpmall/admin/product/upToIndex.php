<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 17:47
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <style>
        body{
            font-family:"微软雅黑";}
        input{
            width: 48%;
            height: 26px;
            line-height:26px;
            display: inline-block!important;

            font-size: 14px;}
    </style>
    <title>Document</title>
</head>
<body>
<?php
if(@$_GET['action']=="sava"){

    //首先判断是不是有效文件
    if(!is_uploaded_file($_FILES['upfile']['tmp_name'])){
        echo "<script>alert('请选择具体的缩略图文件');location.href='upload.php';</script>";
        exit(0);
    }



    $file=$_FILES['upfile'];
    $savadir="../../upload/";
    $isoktype=array("image/jpeg","image/gif","image/pjpeg","image/png");

    //判断文件格式
    if(!in_array($file["type"],$isoktype)){
        echo "<script>alert('不是允许的文件格式');location.href='upload.php';</script>";
        exit(0);
    }


    $exe=substr($file["name"],(stripos($file['name'],".")+1));
    $newname=time();
    $newname.=rand()*1000;


    //执行保存
    move_uploaded_file($file['tmp_name'],$savadir.$newname.".".$exe);
    $toindex=$savadir.$newname.".".$exe;
    echo "上传成功<a href='upToIndex.php'>返回上传</a>";
//        js放回前台
    echo "<script>parent.document.article.toindex.value='$toindex';</script>";
}else {

    ?>


    <form action="?action=sava" method="post" enctype="multipart/form-data">
        <input type="file" name="upfile" style="border: 1px solid rgba(86,61,124,.6);">
        <input type="submit" value="上传" class="btn btn-danger"
               style="line-height: 15px;"
        >
    </form>
    <?php
}
?>

</body>
</html>
