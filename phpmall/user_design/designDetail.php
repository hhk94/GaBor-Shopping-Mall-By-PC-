<?php
require_once "../public/init.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设计师详情</title>
</head>
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/initail.css">
<link rel="stylesheet" href="css/designDetail.css">
<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
<script src="<?php echo $webdir?>/js/jquery.min.js"></script>
<script src="js/progress.js"></script>
<script src="js/mubandetail.js"></script>
<!--<script src="jQueryPage/pager.js">  </script>-->
<!--<link rel="stylesheet" href="jQueryPage/pager.css"/>-->

<body>
<?php

include webdir."/include/header.php";
?>

<section class="section1">
    <img src="img/design-topbanner.jpg" alt="">
</section>

<section class="section2">
    <div class="container">
        <h1><a href="#">首页</a>> <a href="#">设计师详情</a></h1>
    </div>

    <div class="container container2">
        <div class="left">
            <div  class="zipai"><img src="img/designer/design1.png" alt="" style="width: 100%;height: 100%;"></div>
            <h1 class="name">史蒂夫/</h1>
            <h2 class="work">高级设计师</h2>
            <h1 >个人信息</h1>
            <h3 class="xueli">学历：<span></span></h3>
            <h3 class="zhuanye">专业：<span></span></h3>
            <h3 class="school">院校：<span></span></h3>
            <h3 class="old">从业年限：<span></span></h3>
            <h1>擅长风格</h1>
            <h3 class="style">田园风格、欧式风格</h3>
            <h1 >代表作</h1>
            <h3 class="best">xxxxxxx</h3>
            <form action="">

                <div>
                    <label for="indexName"></label>
                    <input type="text" name="indexName" class="indexName" id="indexName" placeholder="姓名：">
                </div>
                <div>
                    <label for="indexNum"></label>
                    <input type="text" name="indexNum" class="indexNum" id="indexNum" placeholder="电话：">
                </div>
                <div>
                    <label for="indexLocal"></label>
                    <input type="text" name="indexLocal" class="indexLocal" id="indexLocal" placeholder="地址:">
                </div>
                <div class="button2 tijiao" >提交</div>

            </form>
        </div>
        <div class="right" style="float: right;width: 900px;">
            <h1>设计方案</h1>
            <ul class="case">
                <li class="work1"><a href="">
                    <img src="" alt="">
                    <div>
                        <h1>《北欧风华》</h1>
                        <p>高层小区 欧式风格 造价：10W</p>
                    </div>
                </a></li>
                <li class="work2"><a href="">
                    <img src="" alt="">
                    <div>
                        <h1>《北欧风华》</h1>
                        <p>高层小区 欧式风格 造价：10W</p>
                    </div>
                </a></li>
                <li class="work3"><a href="">
                    <img src="" alt="">
                    <div>
                        <h1>《北欧风华》</h1>
                        <p>高层小区 欧式风格 造价：10W</p>
                    </div>
                </a></li>
                <li class="work4"><a href="">
                    <img src="" alt="">
                    <div>
                        <h1>《北欧风华》</h1>
                        <p>高层小区 欧式风格 造价：10W</p>
                    </div>
                </a></li>
            </ul>
        </div>
    </div>


</section>



<!--footer-->
<?php

include webdir."/include/footer.php";
?>

<!--53kf 客服系统模块 -->
<script>(function() {var _53code = document.createElement("script");_53code.src = "//tb.53kf.com/code/code/10133101/2";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(_53code, s);})();</script>
<!--百度400电话 -->
<div style="height:0;display:none;overflow:hidden;">
    <script src="http://s22.cnzz.com/stat.php?id=5873751&web_id=5873751"></script>
    <script>
        document.write(unescape("%3Cscript src='" + "https:" +"hm.baidu.com/h.js%3F16b1a369d1392d8f7e8978b592e0139f' type='text/javascript'%3E%3C/script%3E"));
    </script>
</div>

</body>


<script>
    //    $(".float").hide();
    //    $(".container2-2 li").mouseenter(function(){
    //
    //        $(this).find(".float").stop(1300,1300).slideToggle();
    //
    //    });




</script>







<!--iframe-->
<script>
    //    处理iframe里的dom元素
    window.onload = function () {
        /*
         *  下面两种获取节点内容的方式都可以。
         *  由于 IE6, IE7 不支持 contentDocument 属性，所以此处用了通用的
         *  window.frames["iframe Name"] or window.frames[index]
         */
        var test = window.frames["iframe1"].document;
        test.getElementsByTagName('li')[7].classList.add("navActive") ;
//        alert(d.getElementsByTagName('h1')[0].firstChild.data);
    }

   ;
</script>
</html>