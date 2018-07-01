<?php
require_once "../public/init.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>品牌索引 - <?php echo $webname?></title>
</head>
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/initail.css">
<script src="jQueryPage/pager.js">  </script>
<link rel="stylesheet" href="jQueryPage/pager.css"/>
<style>
    .section1{
        width: 100%;
        background: green;
        height:400px;}

    .container1{
        width: 1280px!important;}
    .container1>ul{margin-top:66px;margin-left:142px;margin-bottom:56px;
    }
    .container1 li{
        width: 198px;
        height: 48px;border:1px solid #34495e;
        float: left;}
    .container1 li a{
        font-size: 20px;
        width: 198px;
        font-weight:bold;
        display: block;
        color: #34495e;
        text-align: center;
        line-height:50px;}
    .productOn{
        color: white!important;
        background: #34495e;}
    /*产品*/
    .section2 .container2 a{
        margin:10px 13px 68px 13px;
        position: relative;
        width: 400px;
        height: 400px;
        display: block;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
        overflow: hidden;
    }
    .section2 .container2 a>div{
        height: 100%;
        background: pink;
        width: 100%;}
    .section2 .container2 a>h1{
        position: absolute;
        left:0;bottom:0;
        width: 100%;
        height: 60px;
        line-height:60px;
        text-align: center;
        background: #34495e;opacity: .8;
        color: white;}
    .section2 .container2 a>h1>span{
        font-size: 18px;
        color: #ff9b00;
    }

    .section2{
        position: relative;}


    footer{margin-top:50px;}

    .texing{
        overflow: hidden;
        border-bottom:1px solid #e0e0e0;
        padding-bottom:10px;
    }

    .texing>h3>span{
        background: #F0F0F0;
        padding:5px 10px;
        margin: 0 2px;
        display: inline-block;

    }
    .texing>h3{
        font-size: 20px;
        float:left;}
    .texing>h4{margin-right:20px;
        font-size: 20px;
        float: right;}
    .texing>h4>span{
        background: #F0F0F0;
        padding:5px 10px;
        margin: 0 2px;
        display: inline-block;

    }
    .texing>h5{
        line-height:36px;
        float: right;}
    .texing>h5>span{
        color: #c9302c;}
    .containerProduct{
        overflow: hidden;
        margin-top:40px!important;
        width: 1280px!important;}
    .containerProduct>a{
        float: left;}

    .containerProduct2>div{
        float: right;}
    .containerProduct2>div>h1{
        font-size: 18px;
        float: left;
        margin-right:20px;}



    .indexPP a{
        border:1px solid #e0e0e0;
        width: 200px;
        margin:10px 3.5px;
        display: inline-block;}
    .indexPP a>div{
        background: pink;
        width: 100%;

        overflow: hidden;
        height: 100px;}
    .indexPP a>div>img
    {
        height: 100%;
        width: 100%;}

    .indexPP a>h5{
        text-align: center;
        font-size: 16px;
        background: white;
    }
    .indexPP a:hover>h5{
        background: #e0e0e0;
    }
    .board>a:hover{
        color: #c9302c;;}
    .section1{
        overflow: hidden;}
    .section1>img{
        width: 100%;}
</style>
<body>
<?php

include webdir."/include/header.php";
?>
<section class="section1">
    <img src="../img/topBanner/1.jpg" alt="">
</section>

<section class="section2 ">
    <div class="container container1">


        <div class="texing" style="margin-bottom:10px;">
            <span class="board" style="font-size: 20px;">
                您所在的位置：
                <a href=""><?php echo $webname?></a>

            </span>
        </div>

        <div class="indexPP">

            <?php
            $ppresult =$action->getPP();
            foreach($ppresult as $row){
                ?>
                <a href="productSearch.php?ppid=<?php echo $row['id']?>">
                    <div><img src="<?php echo str_replace("../../../","",$row['picurl']) ?>" alt=""></div>
                    <h5><?php echo $row['ppname'];?></h5>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</section>






<?php

include webdir."/include/footer.php";
?>


</body>




<!--53kf 客服系统模块 -->
<script>(function() {var _53code = document.createElement("script");_53code.src = "//tb.53kf.com/code/code/10133101/2";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(_53code, s);})();</script>





</html>