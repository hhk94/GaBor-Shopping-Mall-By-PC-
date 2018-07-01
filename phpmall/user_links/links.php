<?php
require_once "../public/init.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>友情链接<?php echo "-".$webtitle?></title>
</head>
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/initail.css">
<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
<style>

    .about_left{margin-top:20px;
        width: 200px;
        text-align: center;
        border:1px solid #e0e0e0;
        float: left;
        margin-bottom:20px;
    }
    .about_left>h1{
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        position: relative;
        color: #d84340;
        padding:4px 0;margin-bottom:2px ;
        border-top:2px solid #d84340;
        background: #F0F0F0;
        font-size: 26px;
        box-shadow: 0 2px 2px #e0e0e0;
    }

    .about_left>h1::before {
        background: transparent;
        box-shadow: 0 4px 10px #cccccc;
        border-radius: 1000px/10px;
        bottom: -2px;
        content: "";
        height: 8px;
        left: 2%;
        position: absolute;
        width: 96%;
        z-index: -1;
    }

    .about_left li{

        padding:2px 0;
        border-bottom:1px dashed #e0e0e0;
        margin:2px 0 ;
        position: relative;
        font-size: 20px;}

    .about_left_active{
        border-bottom:none!important;
    }
    .about_left_active>a{color: #d84340;}
    .about_left_active::before {
        background: transparent;
        box-shadow: 0 4px 10px #cccccc;
        border-radius: 1000px/10px;
        bottom: -2px;
        content: "";
        height: 8px;
        left: 2%;
        position: absolute;
        width: 96%;
        z-index: -1;
    }

    .about_right{
        margin-top:20px;
        border:1px solid #e0e0e0;
        width: 990px;
        float: right;
        margin-bottom:200px;
    }

    .about_right>h1{
        text-indent:30px;
        color: #d84340;
        padding:4px 0;margin-bottom:2px ;

        background: #F0F0F0;
        font-size: 26px;
        box-shadow: 0 2px 2px #e0e0e0;
    }

    .about_content{margin:10px 6%;
        font-size: 18px;letter-spacing: 1px;
        width: 88%;}

    .about_content_bottom{margin-top:100px;margin-bottom:200px}

    .about_content_bottom li{
        border-bottom:1px solid #f0f0f0;
        margin-top:10px;
    }
    .about_content_bottom>h1{
        font-size: 26px;}
    .about_content_bottom li>a{
        display: block;}
    .about_content_bottom li>a>h1{
        font-size: 20px;}
.about_content_bottom li>a>div{margin-bottom:5px}
    .imgdiv{

        overflow: hidden;
        width: 110px;
        height: 44px;
        }
    .imgdiv>img{
        width: 100%;}
    .about_content_bottom>h1{margin-top:100px;}
    .about_content_bottom li:hover>a>h1{
        color: #d84340;;}
    
    
</style>

<body>

<?php

include webdir."/include/header.php";
?>
<div class="container">
    <div class="about_left">
        <h1>关于我们</h1>
        <ul>

            <?php
            $list=$action->getArticle(' and typeid = 30 ',' order by id ');

            foreach ($list as $row){

                    echo "<li><a href='{$webdir}/user_about/index.php?id={$row['id']}' >{$row['title']}</a></li>";

            }

            ?>




            <li class="about_left_active"><a href="<?php echo $webdir?>/user_links/links.php">友情链接</a></li>

        </ul>
    </div>

    <div class="about_right">
        <h1>友情链接</h1>
        <div class="about_content">
            <div class="about_content_bottom">
                <h1>图片链接</h1>
                <ul>
                    <?php
                    $links=$action->getLinks(" and styleid = 1 ");
//                    var_dump($links);

                    foreach ($links as $row){



                    ?>

                    <li>
                        <a href="<?php echo $row['weburl']?>" target="_blank">

                        <h1><?php echo $row['webname']?>-<?php echo $row['weburl']?></h1>
                        <div class="imgdiv">
                            <img src="<?php echo $webdir."/".$row['logourl']?>" alt="">
                        </div>
                        </a>
                    </li>

                    <?php
                    }
                    ?>



                </ul>
                <h1>文本链接</h1>
                <ul>
                    <?php
                    $links2=$action->getLinks(" and styleid = 2 ");


                    foreach ($links2 as $row) {


                        ?>
                        <li>
                            <a href="<?php echo $row['weburl']?>">
                                <h1><?php echo $row['webname']?>-<?php echo $row['weburl']?></h1>

                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <br style="clear: both;;">
</div>

<?php

include webdir."/include/footer.php";
?>
</body>





<!--53kf 客服系统模块 -->
<script>(function() {var _53code = document.createElement("script");_53code.src = "//tb.53kf.com/code/code/10133101/2";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(_53code, s);})();</script>
<!--百度400电话 -->
<div style="height:0;display:none;overflow:hidden;">
    <script src="http://s22.cnzz.com/stat.php?id=5873751&web_id=5873751"></script>
    <script>
        document.write(unescape("%3Cscript src='" + "https:" +"hm.baidu.com/h.js%3F16b1a369d1392d8f7e8978b592e0139f' type='text/javascript'%3E%3C/script%3E"));
    </script>
</div>






</html>