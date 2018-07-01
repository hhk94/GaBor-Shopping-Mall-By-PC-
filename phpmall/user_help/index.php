<?php
require_once "../public/init.php";
$id=$_GET['id'];
//echo $id;

$info=$db->select(" select * from mall_article inner join mall_articleType on mall_article.typeid=mall_articleType.id  where mall_article.id = '$id' and mall_articleType.leixing='帮助中心'",1);

if(empty($info)){
    weberror();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $info['title']."-".$webtitle?></title>
</head>
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/initail.css">
<link rel="stylesheet" href="css/about.css">
<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
<style>
    .video{
        background: url(img/shipin.jpg);}




    .about_right{
        margin-top:20px;

        width: 990px;
        float: left;
        margin-bottom:200px;
    }

    .about_right>h1{
        text-indent:30px;
        color: #d84340;
        padding:7px 0;margin-bottom:2px ;

        boder-bottom:1px solid #f0f0f0;
        font-size: 26px;
        box-shadow: 0 2px 2px #e0e0e0;
    }

    .about_content{margin:10px 6%;
        font-size: 18px;letter-spacing: 1px;
        width: 88%;}

    .about_content_bottom{margin-top:100px;margin-bottom:200px}



    .main_middle_onsale{margin-top:50px;}
    .main_middle_onsale>h3>span{
        font-size: 24px;
        color: #e0e0e0;}
    .main_middle_onsale>h3{
        font-size: 30px;;border-bottom:1px solid #f0f0f0}

    .about_left{margin-top:20px;
        width: 200px;


        float: left;
        margin-bottom:20px;
    }
    .about_left>h1{border-right:1px solid #a5a5a5;
        padding-bottom:10px;
        font-size: 22px;
        line-height:40px;}
    .about_left>ul>li:nth-of-type(1){
        font-size: 20px;

        color: #d84340;;}

    .about_left li{
        line-height: 30px;
        padding-right:20px;
        text-align: right;
        border-right:1px solid #a5a5a5;
        font-size: 18px;
    }

    .about_left li.help_active{
        background: linear-gradient(to right,#a5a5a5,#ffffff);
        color: #d84340;
        border-left:1px solid #a5a5a5;
        border-top:1px solid #a5a5a5;
        border-bottom:1px solid #a5a5a5;
        border-right:none;



       }



    .about_message{border-right:1px solid #a5a5a5 ;
        overflow: hidden; }
    .about_message>.h2{margin:20px 0 10px 0 ;
        display: block;
        font-size: 20px;}
    .about_message>p{
        margin:10px 0 10px 0 ;
        font-size: 18px;}
</style>

<body>

<?php

include webdir."/include/header.php";
?>
<div class="container">
    <div class="main_middle_onsale">
        <h3>帮助中心 <span>helping</span></h3>

    </div>
</div>
<div class="container">

        <div class="about_left">
            <h1>售后服务</h1>


            <?php
            $articleType=$action->getArticleType(" and leixing = '帮助中心' ",' order by id ');
            foreach ($articleType as $rows){
                echo "<ul>";
                echo "<li>{$rows['typename']}</li>";
                $list=$action->getArticle(" and typeid = '{$rows['id']}'",' order by id ');
                foreach ($list as $item) {
                    if($id==$item['id']){
                        echo "<li class='help_active'><a href='{$webdir}/user_help/index.php?id={$item['id']}'>{$item['title']}</a></li>";
                    }else{
                        echo "<li ><a href='{$webdir}/user_help/index.php?id={$item['id']}'>{$item['title']}</a></li>";
                    }



                }

                echo "</ul>";
            }

            ?>




            <div class="about_message">
                <a class="h2" href="http://www2.53kf.com/webCompany.php?arg=10133101&style=2&kflist=off&kf=19680502&zdkf_type=3&language=cn&charset=GBK" target="_blank">联系客服</a>
                <p>热线：<?php echo $webtel;?></p>
                <a href="<?php echo $webdir;?>/user_guest/index.php" style="font-size: 26px;">留言板</a>
            </div>

        </div>



        <div class="about_right">
            <h1><?php echo $info['title'];?></h1>
            <div class="about_content">
                <div class="about_content_bottom">
                    <?php echo $info['content'];?>
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