
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/10-->
<!-- * Time: 10:55-->
<!-- */-->
<?php
require_once ('./down/checkLogin.php');
require_once ('./down/connectDb.php');

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
    <li class="lis btn btn-success">网站常规管理
        <ol class="navlist">
            <li><a href="manage/setting.php" target="main">设置基本设置</a></li>
            <li><a href="manage/settingChange.php" target="main">修改基本设置</a></li>
            <li><a href="links/links.php" target="main">友情链接</a></li>

        </ol>
    </li>

    <li class="lis btn btn-success">评论管理
        <ol class="navlist">
            <li><a href="assess/assess.php" target="main">商品评论</a></li>


        </ol>
    </li>

    <li class="lis btn btn-success">文章管理
        <ol class="navlist">
            <li><a href="article/articleList.php" target="main">文章分类</a></li>
            <li><a href="article/article.php" target="main">文章管理</a></li>

        </ol></li>

    <li class="lis btn btn-success">售前咨询
        <ol class="navlist">
            <li><a href="consultation/consultType.php" target="main">咨询分类</a></li>
            <li><a href="consultation/consult.php" target="main">咨询内容</a></li>

        </ol></li>



    <li class="lis btn btn-success">商品管理
        <ol class="navlist">
            <li><a href="product/productList.php" target="main">商品分类</a></li>
            <li><a href="product/productpp/productpp.php" target="main">商品品牌</a></li>
            <li><a href="product/product.php" target="main">商品管理</a></li>
            <li><a href="#">订单管理</a></li>
        </ol></li>



    <li class="lis btn btn-success">留言管理
        <ol class="navlist">
            <li><a href="feedback/feedbackType.php" target="main">留言分类</a></li>
            <li><a href="feedback/feedback.php" target="main">留言内容</a></li>
        </ol></li>



    <li class="lis btn btn-success">用户管理
        <ol class="navlist">

            <li><a href="user/user.php"  target="main">会员管理</a></li>
            <?php
            if($_SESSION['rights']==1){
            ?>
            <li><a href="adminAdmin.php" target="main">管理员管理</a></li>
            <?php
            }
            ?>
            <li><a href="passwordChange.php" target="main">修改密码</a></li>
            <li><a href="adminLog.php" target="main">后台登录日志</a></li>
        </ol></li>

    <li class="lis btn btn-success">其他管理
        <ol class="navlist">
            <li><a href="receive/receive.php" target="main">收货地址</a></li>
            <li><a href="receive/favorites.php" target="main">收藏商品</a></li>
        </ol>
    </li>

    <li class="lis btn btn-success">设计师管理
        <ol class="navlist">
            <li><a href="design/design.php" target="main">设计师页面</a></li>

        </ol>
    </li>


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