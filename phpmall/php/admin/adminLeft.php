
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/10-->
<!-- * Time: 10:55-->
<!-- */-->
<?php
require_once ('../lgCheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>左边选项栏</title>
    <link rel="stylesheet" href="../css/inital.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <style>
        body{
            font-family:"微软雅黑"!important;}

    </style>
</head>
<style>
    a:hover{ text-decoration: none!important;}

    .nav{
        width: 180px;}
    .nav>li{
        font-size: 20px;
        position: relative;
        text-align: center;}
    .navlist{left:0;top:100%;
        width: 100%;
        position:relative;}
    .navlist a{
        font-size:16px;
        color: white;;}
    .navlist>li{
        border-radius: 10px;;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;}
    .navlist>li:hover{
        background: #5bc0de;}


</style>
<body style="background:  #eee;">

<ul class="nav">
    <li class="lis btn btn-success">派单系统管理
        <ol class="navlist">
            <li><a href="adminIndex.php" target="main">派单系统</a></li>
<!--            <li><a href="links/links.php" target="main">友情链接</a></li>-->

        </ol>
    </li>
<!--    <li class="lis btn btn-success">文章管理-->
<!--        <ol class="navlist">-->
<!--            <li><a href="article/articleList.php" target="main">文章分类</a></li>-->
<!--            <li><a href="article/article.php" target="main">文章管理</a></li>-->
<!---->
<!--        </ol></li>-->
<!--    <li class="lis btn btn-success">商品管理-->
<!--        <ol class="navlist">-->
<!--            <li><a href="product/productList.php" target="main">商品分类</a></li>-->
<!--            <li><a href="product/product.php" target="main">商品管理</a></li>-->
<!--            <li><a href="#">订单管理</a></li>-->
<!--        </ol></li>-->
    <li class="lis btn btn-success">工作日志
        <ol class="navlist">
            <?php
            if($_SESSION['power']<=1){
            ?>
            <li><a href="log.php" target="main">查看工作日志</a></li>
            <?php
            }
            ?>

        </ol></li>
</ul>


<script>
    $('.navlist').hide();



    $('.nav>li').click(function(){
//    var i=$(this).index;
        $(this).find('.navlist').slideDown();

    })

</script>
</body>
</html>