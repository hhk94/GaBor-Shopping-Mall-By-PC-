<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/4
 * Time: 15:37
 */
require_once "../public/init.php";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>定制流程</title>
</head>


<script src="../js/jquery.min.js"></script>
<script src="js/progress.js"></script>
<link rel="stylesheet" href="../css/initail.css">
<link rel="stylesheet" href="../css/comment.css">
<link rel="stylesheet" href="css/process.css">

<style>
    img{
        width: 100%;}
    .section2{
        background:url(img/processBG.png) no-repeat center center ;
        height: 520px;
    }

    .title1{
        width: 527px;
        margin:0 auto 80px auto;
        padding-top:100px;
    }
    .section2 ul>li>div{
        width: 40px;
        margin:28px auto 0 auto;
    }
    .section2 ul>li>div>img{
        width: 100%;
    }

    .section4>div{
        width: 960px;
        margin:80px auto 100px auto;
    }
    .newcontainer{
        overflow: hidden;
        width: 960px;margin:130px auto;
        background: rgba(255,255,255,.5);
        height: 334px;

        
    }
    .newform{

        overflow: hidden;
        height: 600px;
        background: url(img/newformBG.png) no-repeat center center ;
    }
    .newcontainer>form{
        width: 380px;
        float: left;
    }
    .newcontainer>div{
        float: right;
        width: 355px;
    }
    .tiaozhuan ul{
        margin:10px 0;
        overflow: hidden;
    }
    .tiaozhuan li{
        float: left;
        height: 80px;
        background: white;
    }
    .tiaozhuan li h1{
        margin-left:20px;
        margin-top:16px;
        font-size: 14px;
        color: black;
    }
    .tiaozhuan li h1+h1{
        margin-top:10px;
    }
    .tiaozhuan a{
        display: block;
    }
    .tiaozhuan{
        margin:30px 75px 0 0;
    }
    #newForm input{
        width: 100%;
        height: 100%;
    }
    #newForm{margin:35px 0 0 60px;}
    #newForm>h1{
        font-size: 16px;
        color: white;
        font-weight:bold;}
    .shortinput{
        display: inline-block;
        width: 184px;
        height: 30px;
    }

    .longinput{
        width: 380px;
        height: 30px;
    }

    .message{
        height: 116px;
        width: 100%;
    }
    .message>textarea{
        resize: none;
        width: 100%;
        height: 100%;
    }
    input,textarea{
        text-indent:5px;
        font-size: 14px;
    }
    .tijiao{
        width: 110px;
        height: 30px;
        line-height:30px;
        text-align: center;
        background: #85c7d1;
        float: right;
    }
</style>


<body>
<?php

include webdir."/include/header.php";
?>
<!--第一屏-->
<section class="section1" style="margin-top:10px;margin-bottom:47px">
    <img src="img/dingzhibanner.jpg" alt="" style="height: 400px;">
</section>

<!--嘉宝全房定制-->
<section class="section2">
    <div class="container">
        <div class="title1"><img src="img/title1.png" alt=""></div>
        <ul>
            <li class="hover1">
                <div><img src="img/dingzhi_1.png" alt="" class="img1"></div>
                <h1>免费量尺</h1>
            </li>
            <li class="hover2">
                <div><img src="img/dingzhi_2.png" alt="" class="img2"></div>
                <h1>免费设计</h1>
            </li>
            <li class="hover3">
                <div><img src="img/dingzhi_3.png" alt="" class="img3"></div>
                <h1>免费安装</h1>
            </li>
            <li class="hover4">
                <div style="width: 32px;"><img src="img/dingzhi_4.png" alt="" class="img4"></div>
                <h1>环保材料</h1>
            </li>
            <li class="hover5">
                <div><img src="img/dingzhi_5.png" alt="" class="img5"></div>
                <h1>质量保障</h1>
            </li>
            <li class="hover6">
                <div><img src="img/dingzhi_6.png" alt="" class="img6"></div>
                <h1>终生维护</h1>
            </li>
        </ul>

    </div>


</section>


<!--流程-->
<section class="section4">
    <!--<div class="container">-->
        <!--<div><img src="img/title2.png" alt=""></div>-->
        <!--<ul>-->
            <!--<li><h1>拍付定金</h1></li>-->
            <!--<li><h1>上门量尺</h1></li>-->
            <!--<li><h1>门店看样</h1></li>-->
            <!--<li><h1>设计出图</h1></li>-->
            <!--<li><h1>签订合同</h1></li>-->
            <!--<li><h1>上门安装</h1></li>-->
        <!--</ul>-->

    <!--</div>-->
    <div><img src="img/process.png" alt=""></div>

</section>


<!--新的报名-->
<section class="newform">
    <div class="newcontainer">
        <form action="" id="newForm">
            <h1>留言板</h1>
            <div class="shortinput">

                <input type="text" name="indexName" class="indexName" id="indexName" placeholder="姓名：">
            </div>
            <div  class="shortinput" style="margin-left:7px;">

                <input type="text" name="indexNum" class="indexNum" id="indexNum" placeholder="电话：">
            </div>

            <div class="longinput">

                <input type="text" name="indexLocal" class="indexLocal" id="indexLocal" placeholder="地址:">
            </div>
            <div class="message">
            <textarea name="leaveMessage" id="leaveMessage"  class="leaveMessage" placeholder="留言："></textarea>
            </div>
            <div type="submit" class="button2 tijiao" >发送</div>
        </form>
        <div class="tiaozhuan">
            <ul>
                <li style="width: 80px;"><img src="img/newform1.png" alt=""></li>
                <li style="width: 275px;">
                    <h1>客服热线：400-0108-608</h1>
                    <h1>售后电话：0731-88334455</h1>
                </li>
            </ul>
            <a href="https://jiabaochugui.tmall.com" target="_blank">
            <ul>
                <li style="width: 80px;"><img src="img/newform2.png" alt=""></li>
                <li style="width: 194px;">
                    <h1>前往天猫旗舰店</h1>
                    <h1>享受更多优惠活动</h1>
                </li>
                <li style="width: 80px;"><img src="img/newform3.png" alt=""></li>
            </ul>
            </a>
            <ul>
                <li style="width: 80px;"><img src="img/newform4.png" alt=""></li>
                <li style="width: 275px;">
                    <h1>关注嘉宝橱柜公众号</h1>
                    <h1>关注嘉宝橱柜公众号</h1>
                </li>
            </ul>
        </div>
    </div>

</section>






<!--footer-->

<?php

include webdir."/include/footer.php";
?>

</body>


<style>
    /*.section2 ul>li:nth-of-type(1):hover>h1{background: url(../img/dingzhi_1_1.png) no-repeat left center/contain;*/
        /*color: #e9e7ef;*/
    /*}*/
</style>



<script>


    $('.hover1').hover(function(){
        $('.img1').attr('src','img/dingzhi_1_1.png');
    },function () {

        $('.img1').attr('src','img/dingzhi_1.png');
    })
    $('.hover2').hover(function(){
        $('.img2').attr('src','img/dingzhi_2_2.png');
    },function () {

        $('.img2').attr('src','img/dingzhi_2.png');
    })
    $('.hover3').hover(function(){
        $('.img3').attr('src','img/dingzhi_3_3.png');
    },function () {

        $('.img3').attr('src','img/dingzhi_3.png');
    })

    $('.hover4').hover(function(){
        $('.img4').attr('src','img/dingzhi_4_4.png');
    },function () {

        $('.img4').attr('src','img/dingzhi_4.png');
    })
    $('.hover5').hover(function(){
        $('.img5').attr('src','img/dingzhi_5_5.png');
    },function () {

        $('.img5').attr('src','img/dingzhi_5.png');
    })
    $('.hover6').hover(function(){
        $('.img6').attr('src','img/dingzhi_6_6.png');
    },function () {

        $('.img6').attr('src','img/dingzhi_6.png');
    })


    $('.headerRbottom>li').mouseover(function(){
        $(this).addClass('navActive').siblings('li').removeClass('navActive');
    });

</script>
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