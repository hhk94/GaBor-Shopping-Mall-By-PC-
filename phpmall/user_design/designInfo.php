<?php
require_once "../public/init.php";


$id=$_GET['id'];
$sql=" select * from mall_design where id = '$id'";

$result=$db->select($sql,1);

preg_match_all("/(.*?)@(.+?)#/is",$result['works'],$zhutuarr,PREG_SET_ORDER);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设计师详情</title>
</head>
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/initail.css">

<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
<script src="<?php echo $webdir?>/js/jquery.min.js"></script>

<style>
body{
    background: #f5f9fa!important;
}
.desContainer{
    width: 960px;
    margin:0 auto;
}
.desTitle{
    font-size: 13px;
    color: black;
    border-bottom:1px solid #4e6073;
    padding-bottom:11px;
}
.desTitle>a{
    color: black;
}
    .section2{
        margin-top:40px;
        margin-bottom:40px;
    }

    .info{

        margin-top:13px;
        overflow: hidden;
        height: 300px;
    }
    .info>div{
        float: left;
        width: 270px;
    }
.info>div>img{
    width: 100%;}
.info>.infolist{
        background: white;
        width: 688px;
        margin-left:2px;
    height: 300px;
    }
    .infolist>h1{
        margin-top:30px;
        font-size: 18px;
        color: #3d4c51;
        margin-left:27px;
    }
.infolist>h1>a{
    float: right;
    display: block;
    width: 120px;
    height: 32px;
    line-height: 32px;
    text-align: center;
    color: white;
    background: black;
    font-size: 12px;margin-right:14px;
}

.infolist>h2{
    font-size: 14px;
    color: #7d8c92;
    margin-top:24px;
    margin-left:27px;
}

    .line{
        width: 100%;
        height: 1px;
        background:#7b8a97;
        margin-top:14px;
    }

    .listShow{
        width: 298px;
        float: left;
        margin:30px 11px;
    }
.listShow>div{

    height: 218px;
    background: black;
}
.listShow img{
    width: 100%;}
.listShow>h1{
    text-align: center;
    line-height: 54px;
    height: 54px;
    font-size: 14px;
    color: black;
    font-weight:bold;
    letter-spacing: 2px;
}
</style>


<body>
<?php

include webdir."/include/header.php";
?>

<div class="section1">
    <img src="img/design-topbanner.jpg" alt="">
</div>

<div class="section2">
    <div class="desContainer">
        <h1 class="desTitle"><a href="designList.php">首页</a> > <a href="designInfo.php?id=<?php echo $id;?>">设计师：<?php echo $result['designName']?></a></h1>

        <div class="info">
             <div><img src="<?php echo str_replace("../../","../",$result['touxiang']);?>" alt=""></div>
             <div class="infolist">
                 <h1><?php echo $result['designName']?> <a href="http://www2.53kf.com/webCompany.php?arg=10133101&style=2&kflist=off&kf=19680502&zdkf_type=3&language=cn&charset=GBK" target="_blank">咨询预约</a></h1>
                 <h2><?php echo $result['zhiwei']?></h2>
                 <h2>工作时间：<?php echo $result['wtime']?></h2>
                 <h2>毕业院校：<?php echo $result['school']?></h2>
                 <h2>擅长设计风格：<?php echo $result['style']?></h2>
                 <h2>设计理念：<?php echo $result['idea']?></h2>
             </div>
        </div>
        <div class="line"></div>
    </div>
</div>
<div class="section3">

    <div class="desContainer">

        <?php
            foreach ($zhutuarr as $k=>$v){
        ?>
        <a  class="listShow">
            <div style="overflow: hidden;"><img src="<?php echo str_replace("../../","../",$zhutuarr[$k][2]);?>" alt=""></div>
            <h1><?php echo $zhutuarr[$k][1];?></h1>
        </a>

        <?php
        }
        ?>


        <br style="clear: both;">
    </div>
</div>



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







</html>