
<?php
require_once "../public/init.php";

$sql=" select mall_design.*,mall_designfenlei.fenleiname from mall_design inner join mall_designfenlei on mall_design.fenlei=mall_designfenlei.id ";
$parm=" where 1 ";



//echo $sql;

$db=new DbMysql();
$db->sql($sql);
$pagesize=5;
$infocount=$db->affected();

$num=ceil($infocount/$pagesize);

//echo $num;

$page=new page($infocount,$pagesize);

$sql.=" order by id desc ";
$sql.=$page->limit();

$result=$db->select($sql);

//var_dump($result);
$nowpage1=1;

if(@$_GET['page']!=""){
    $nowpage1=$_GET['page'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>嘉宝设计师列表</title>
</head>
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/initail.css">
<link rel="stylesheet" href="src/jquery.page.css">
<!--<script src="jQueryPage/pager.js">  </script>-->
<!--<link rel="stylesheet" href="jQueryPage/pager.css"/>-->
<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">

<style>
    
    body{
        background: #f6f8f9!important;
        font-family: '微软雅黑'!important;
    }
.desContainer{
    width: 960px;
    margin:0 auto;
}

    .des1>img{
        width: 100%;
        display: block;
    }

    .title{
        margin:70px auto 20px auto;
    }

.title>h1{
    font-size: 38px;
    color: #2b343c;
    text-align: center;
}
.title>h2{
    text-align: center;
    font-size: 18px;
    color: #7b8a97;
    margin-top:10px;
}

    .listShow{
        background: white;
        overflow: hidden;
        height: 300px;
        margin:25px 0 ;
    }
    .listShow>div{
        float: left;
    }
    .touxiang{
        width: 270px;
    }
    .touxiang>img{
        width: 100%;
    }

    .listShow{
        display: block;
    }

    .listinfo{
        margin-left:2px;
        width: 688px;
    }
    .listinfo>h1{
        margin-top:17px;
        font-size: 23px;
        color: #3d4c51;
        text-indent:19px;
    }

    .listinfo>h2{
        margin-top:9px;
        font-size: 14px;
        color: #7d8c92;
        text-indent:19px;

        border-bottom:2px solid #ebeef0;
        padding-bottom:18px
    }
    
    .listinfo>p{
        color: #7b8a97;
        font-size: 14px;
        margin-left:22px;
    }

    .picShow{
        overflow: hidden;
    }
    .picShow>li{
        float: left;
        width: 150px;
        height: 100px;
        background: black;
        margin:18px 10px;
    }

    .picShow>li>img{
        width: 100%;
        display: block;
    }
</style>
<body>

<?php

include webdir."/include/header.php";
?>

<div class="des1">
    <img src="img/designList1.png" alt="">
</div>

<div class="des2">
    <div class="desContainer">

        <div class="title">
            <h1>设计团队</h1>
            <h2>我们拥有行业内最尖端的精锐设计团队</h2>
        </div>

        <div class="list">

            <?php

            foreach ($result as $info) {
                preg_match_all("/(.*?)@(.+?)#/is", $info['works'], $arr, PREG_SET_ORDER);
                ?>

                <a class="listShow" href="designInfo.php?id=<?php echo $info['id']?>">
                    <div class="touxiang"><img src="<?php echo str_replace("../../", "../", $info['touxiang']); ?>" alt=""></div>
                    <div class="listinfo">
                        <h1><?php echo $info['designName'] ?> <span
                                style="float: right;font-size: 14px;color: #7d8c92;margin:15px 20px 0 0 ">了解更多 ></span>
                        </h1>
                        <h2><?php echo $info['zhiwei'] ?> </h2>
                        <p style="margin-top:22px">擅长设计风格：<?php echo $info['style'] ?> </p>
                        <p style="margin-top:5px">设计理念：<?php echo $info['idea'] ?> </p>


                        <ul class="picShow">
                            <?php
                            foreach ($arr as $k => $v) {
                                ?>

                                <li><img src="<?php echo str_replace("../../", "../", $arr[$k][2]); ?>" alt=""></li>

                                <?php
                            }
                            ?>


                        </ul>
                    </div>

                </a>
                <?php
            }
            ?>
        </div>

    </div>

</div>

    <div class="desContainer">

        <div id="page"></div>

        <script type="text/javascript" src="src/jquery.page.js"></script>
        <script type="text/javascript">
            $(function(){
                $("#page").Page({
                    totalPages: <?php echo $num;?>,//分页总数
                    liNums: 7,//分页的数字按钮数(建议取奇数)
                    firstPage: '首',//first button name
                    lastPage: '末',
                    activeClass: 'activP', //active 类样式定义
                    callBack : function(page){
                        console.log(page)
                        location.href='designList.php?page='+page;

                    }
                });

                <?php
                $nowpage=($nowpage1-1);
                echo "$('#page').children('ul').children('li').children('a').removeClass('activP');$('#page').children('ul').children('li').eq(".$nowpage.").children('a').addClass('activP');";
                ?>

            })
        </script>


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