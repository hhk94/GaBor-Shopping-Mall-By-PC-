<?php
require_once "../public/init.php";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>关于嘉宝</title>
</head>
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/initail.css">
<link rel="stylesheet" href="css/about.css">
<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
<style>
.video{
    background: url(img/shipin.jpg);}
    .container1{
        width: 1280px!important;}
</style>

<body>

<?php

include webdir."/include/header.php";
?>
<section class="section1">


</section>

<section class="section2">

    <div class="container">
        <h1 class="title">品牌介绍</h1>

        <div class="container1">
        <div class="aboutWord">
            <p>   &nbsp;&nbsp;&nbsp;&nbsp; 湖南嘉宝家居有限公司是一家专业从事整体
                厨房、整体衣柜、木门等全房定制的公司。<br>
                &nbsp;&nbsp;&nbsp;&nbsp;公司是为客户提供集研发、设计、生产、销
                售、安装于一体的一条龙服务的本土大型家居
                企业集团。<br>
                &nbsp;&nbsp;&nbsp;&nbsp;凭借“精工制造、经典美学、智能科技、环
                保健康”的产品定位及“引领智能厨房生活”
                的品牌宗旨，在零售市场及精装工程市场取得
                了很好的成绩。</p>
        </div>
        <div class="video pause">
            
            
            
            <video src="http://cloud.video.taobao.com/play/u/3244903357/p/1/e/6/t/1/50011842386.mp4"  width="1" height="1" class="video1">您的电脑不适合video</video>

        </div>
        </div>
    </div>

</section>
<script>
    $(".video").click(function(){


        if ($(this).hasClass('pause')) {

            $(".video1").css({"width":"100%","height":"100%"});
            $(".video1").trigger("play");
            $(this).removeClass('pause');
            $(this).addClass('play');
        } else {
            $(".video1").css({"width":"1%","height":"1%"});
            $(".video1").trigger("pause");
            $(this).removeClass('play');
            $(this).addClass('pause');}



    })

</script>

<!--c发展历程-->
<section class="section3">
    <div class="container">
    <h1 class="title">发展历程</h1>
    </div>
    <div class="container" style="margin-top:50px">
        <ul class="develop">
            <li><a href="#">
                <h1>2004</h1>
                <img src="img/developLeft_1.png" alt="">
                <h2>嘉宝家具有限公司成立</h2>
            </a></li>
            <li><a href="#">
                <h1>2011</h1>
                <img src="img/developLeft_3.png" alt="">
                <h2>嘉宝携手德国西门子</h2>
            </a></li>
            <li><a href="#">
                <h1>2013</h1>
                <img src="img/developLeft_3.png" alt="">
                <h2>60000平米产业园投产</h2>
            </a></li>
            <li><a href="#">
                <h1>2014</h1>
                <img src="img/developLeft_4.png" alt="">
                <h2>签约著名主持人：李锐</h2>
            </a></li>
        </ul>
        <div class="developRight">
            <a href="#">
                <h1>2015</h1>
                <img src="img/developRight_1.png" alt="">
                <h2>荣获第四届“芙蓉杯”</h2>
            </a>
            <ul>
                <li><a href="#"><h1>2016</h1>
                    <img src="img/developRight_2.png" alt="">
                    <h2>成为橱柜定制行业标杆</h2></a></li>
                <li><a href="#"><h1>2017</h1>
                    <img src="img/developRight_3.png" alt="">
                    <h2>嘉宝橱柜·定制美好生活</h2></a></li>
            </ul>
        </div>
    </div>
</section>
<!--产品优势-->

<section class="section4">
    <div class="container">
        <h1 class="title" >产品优势</h1>
        <ul>
            <li>易清洁更防污</li>
            <li>高耐磨寿命长</li>
            <li>硬度高破损低</li>
            <li>欧标E0级板材</li>
            <li>双重检验保证</li>
            <li>专业售后保障</li>
        </ul>
    </div>
</section>
<!--企业原则-->
<section class="section5">
    <div class="container">
        <h1 class="title">企业原则</h1>
        <ul>
            <li>
                <h1>品牌直销</h1>
                <h2>拥有60000平米自主
                    权现代化产业园</h2>
            </li>
            <li>
                <h1>一站购物</h1>
                <h2>橱柜衣柜电器一站式
                    购齐</h2>
            </li>
            <li>
                <h1>国际标准</h1>
                <h2>环保以及材质稳定性
                    均高于国际标准</h2>
            </li>
            <li>
                <h1>质保10年</h1>
                <h2>终身成本维修</h2>
            </li>
        </ul>
        
    </div>

</section>
<!--园区风采-->

<section class="section6">
    <div class="container">
    <p>园区风采</p>
    </div>
</section>
<!--位置-->
<section class="section7"></section>
<!--最后-->
<section class="section8">
    <div class="container">
    <h1>嘉宝橱柜·中国橱柜定制大师</h1>
    </div>
</section>
<!--footer-->
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


<script>
$('.headerRbottom>li:nth-of-type(6)').addClass("navActive");

</script>


<!--iframe-->
<!--<script>-->
<!--    //    处理iframe里的dom元素-->
<!--    window.onload = function () {-->
<!--        /*-->
<!--         *  下面两种获取节点内容的方式都可以。-->
<!--         *  由于 IE6, IE7 不支持 contentDocument 属性，所以此处用了通用的-->
<!--         *  window.frames["iframe Name"] or window.frames[index]-->
<!--         */-->
<!--        var test = window.frames["iframe1"].document;-->
<!--        test.getElementsByTagName('li')[10].classList.add("navActive") ;-->
<!--//        alert(d.getElementsByTagName('h1')[0].firstChild.data);-->
<!--    }-->



</html>