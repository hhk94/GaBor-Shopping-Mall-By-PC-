<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/1
 * Time: 10:53
 */

require_once "../../public/init.php";


$chugui = new DbMysql();

$sql=" select id from mall_productList where typename = '衣柜' ";

$result=$chugui->select($sql,1);

$id=$result['id'];

//echo $result['id'];




$xjid=$db->select("select id from mall_productList where idpath like '%_$id%' ");

$xjids=0;

foreach ($xjid as $k=>$v){
    $xjids.=",".$v['id'];
}




$sql=" select title,id,price,yprice,pic from mall_product ";
$parm=" where 1 ";
$parm.=" and (typeid = '$id' or typeid in ($xjids)) ";

$sql.=$parm;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>衣柜首页</title>
</head>

<link rel="stylesheet" href="css/initail.css">
<script src="../../js/jquery.min.js"></script>
<link rel="stylesheet" href="../../css/initail.css">
<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
<style>
    img{
        width: 100%;}
    .section1{
        background:#666 ;
        height: 400px;
        margin-top:4px;
    }

    .chuguicontainer{
        width: 1170px;margin:0 auto;
    }

    .section2>.chuguicontainer>div{
        width: 570px;
        height: 570px;
        float: left;
    }
    .section2>.chuguicontainer>.rightBanner{
        float: right;

    }


    .rightBottom{
        margin-top:29px;
    }


    /*动画*/
    .leftBanner:hover{
        -webkit-box-shadow: 0 0 10px rgb(89,89,89) ;
        -moz-box-shadow: 0 0 10px rgb(89,89,89) ;
        box-shadow: 0 0 10px rgb(89,89,89) ;
    }



    .section3{
        overflow: hidden;
        margin-top:35px;
    }
    .chuguiPro>div{
        background: white;
        width: 370px;
        height: 410px;
        float: left;
        margin:10px 10px;
    }
    .chuguipic{
        overflow: hidden;
        height: 260px;
    }

    .chuguiPro>div>a>h2{
        font-size:16px;
        text-align: center;
        margin-top:5px;
        color: #666;
    }
    .chuguiPro>div>a>h1{
        font-size:16px;
        text-align: center;
        margin-top:20px;
        color: black;

    }
    .chuguiPro>div>a>h1>span{
        text-decoration: line-through;
        color: #666;
    }
    .chuguiPro>div>a>h3{
        width: 158px;
        height: 40px;
        line-height:40px;
        text-align: center;
        color: black;
        font-size: 15px;
        margin-left:106px;
        margin-top:20px;
        font-weight:bold;

    }

    .chuguiPro>div:hover{
        -webkit-box-shadow: 0 0 10px rgb(89,89,89) ;
        -moz-box-shadow: 0 0 10px rgb(89,89,89) ;
        box-shadow: 0 0 10px rgb(89,89,89) ;
    }
    .chuguiPro>div:hover>a>h1>span{
        display: none;
    }
    .chuguiPro>div:hover>a>h3{
        background: black;
        color: white;
    }
    .chuguiPro>div>a>h3,.chuguiPro>div>a>h1>span,.chuguiPro>div{
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }

    .siecton4{
        margin-top:44px;
        margin-bottom:14px;

    }

    .chuguititle{
        margin-top:20px;
        text-align: center;
        font-size: 24px;
        position: relative;
        margin-bottom:10px;
    }
    .chuguititle::after,.chuguititle::before{
        position: absolute;
        top:50%;
        content: '';
        display: block;
        width: 60px;

        height: 2px;
        background: #000;

    }
    .chuguititle::after{
        left:464px;
    }
    .chuguititle::before{
        right:464px;
    }
    .section3{
        height: 530px;
        position: relative;
    }
    .section3BG{
        position: absolute;
        left:22px;
        z-index: -1;
        background: #f2f2f2;
        width: 1860px;
        height: 530px;
    }


    .chuguiList>div{
        width: 366px;
        height: 400px;
        float: left;
        margin:20px 12px;
    }
    .chuguiList>div>a{
        display: block;
        width: 100%;
        height: 100%;
        position: relative;
    }
    .chuguiList>div>a>img{
        width: 100%;
        height: 100%;
    }
    .listFloat{
        top:0;left:0;
        position: absolute;
        width: 100%;
        height: 0;
        background: rgba(0,0,0,0.2);
        overflow: hidden;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;


    }
    .listFloat>h1{
        position: absolute;
        font-size: 16px;
        padding:15px 46px;
        background: rgba(0,0,0,0.8);
        color: white;
        left:50%;
        top:50%;
        -webkit-transform: translate(-50%,-50%);
        -moz-transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        -o-transform: translate(-50%,-50%);
        transform: translate(-50%,-50%);

        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
    }

    .rightBottom>a{
        float: left;
        width: 270px;
        height: 270px;
    }

    .rightBottom>div{
        float: right;
        width: 280px;
    }

    /*动画*/
    .chuguiList>div:hover .listFloat{
        height: 100%;
    }



    .left{
        float: left;
        width: 769px;
        height: 400px;
    }
    .right{
        float: right;
        height: 400px;
        width: 366px;
    }

    .clearfix-1::after {
        content: " ";
        display: block;
        clear: both;
        height: 0;
    }
    .clearfix-1 {
        zoom: 1;
    }

    .section6{
        background: #f2f2f2;
    }

    .anniu1{
        margin-top:62px;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;

    }
    .section6>.chuguicontainer{
        padding-top:40px;
    }

    .botanniu{
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }




    .botanniu:hover{
        box-shadow: 0 10px 10px #666;
        -webkit-transform: translateY(-10px);
        -moz-transform: translateY(-10px);
        -ms-transform: translateY(-10px);
        -o-transform: translateY(-10px);
        transform: translateY(-10px);
    }
</style>


<!--衣柜第一推荐3 第二推荐3 第三推荐3*n-->

<body>

<?php

include webdir."/include/header.php";
?>
<!--第一屏-->
<section class="section1" style="margin-bottom:47px">
    <img src="../../img/topBanner/1.jpg" alt="" style="height: 400px;">
</section>


<!--第二屏-->
<div class="section2">
    <div class="chuguicontainer">

        <?php
         $parm1=" and fenyetuijian = '1' ";

        $sql1=$sql;
        $sql11=$sql;
        $sql111=$sql;

        $sql1.=$parm1." limit 0,1 ";
         $result1= $chugui->select($sql1,1);

        $sql11.=$parm1." limit 1,2 ";
        $result11= $chugui->select($sql11,1);

        $sql111.=$parm1." limit 2,3 ";
        $result111= $chugui->select($sql11,1);

        ?>



        <div class="leftBanner">
            <a href="<?php echo $webdir."/user_product/product.php?id={$result1['id']}"?>" target="_blank">
                <img src="<?php echo str_replace("../../","../../",$result1['pic']) ?>" alt="">
            </a>
        </div>
        <div class="rightBanner">
            <div class="rightTop">
                <a href="<?php echo $webdir."/user_product/product.php?id={$result11['id']}"?>">
                <img src="img/rightTop-3.png" alt="">
                </a>
            </div>
            <div class="rightBottom clearFix">
                <a href="<?php echo $webdir."/user_pr oduct/product.php?id={$result111['id']}"?>"><img src="<?php echo str_replace("../../","../../",$result111['pic']) ?>" alt=""></a>
                <div>
                    <div><img src="img/anniushow.png" alt=""></div>

                    <div class="botanniu" style="margin-top:12px">
                        <a href="../productList.php">
                            <img src="img/anniu1.png" alt="">
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <br style="clear: both;">
    </div>
</div>
<!--第三屏-->
<div class="section3">

    <div class="section3BG"></div>
    <div class="chuguicontainer">
        <h1 class="chuguititle">嘉宝热卖</h1>
    </div>

    <div class="chuguicontainer chuguiPro">
        <?php
        $parm2=" and fenyetuijian = '2' ";

        $sql2=$sql;

        $sql2.=$parm2;
        $result2= $chugui->select($sql2);

        if(count($result2)!=0){

            foreach ($result2 as $row) {
                ?>

            <div>
                <a href="<?php echo $webdir."/user_product/product.php?id={$row['id']}"?>" target="_blank">
                    <div class="chuguipic">
                        <img src="<?php echo str_replace("../../","../../",$row['pic']) ?>" alt="">
                    </div>
                    <h2><?php echo strindex($row['title'],6,"...")?></h2>
                    <h1>￥<?php echo $row['price']?> <span>￥<?php echo $row['yprice']?></span></h1>
                    <h3>立即购买</h3>
                </a>
            </div>

            <?php
            }
        }

        ?>


        <br style="clear: both;">
    </div>
</div>
<!--g广告-->
<div class="siecton4">
    <div class="chuguicontainer">
        <a href=""><img src="img/guanggao.png" alt=""></a>
    </div>
</div>

<!--c产品列表第三推荐-->

<div class="section5">
    <div class="chuguicontainer  chuguiList">

        <?php
        $parm3=" and fenyetuijian = '3' ";

        $sql3=$sql;

        $sql3.=$parm3;
        $result3= $chugui->select($sql3);

        if(count($result3)!=0){

        foreach ($result3 as $row) {
        ?>


        <div>
            <a href="<?php echo $webdir."/user_product/product.php?id={$row['id']}"?>" target="_blank">
                <img src="<?php echo str_replace("../../","../../",$row['pic']) ?>" alt="">

                <div class="listFloat">
                    <h1><?php echo strindex($row['title'],4,"...")?></h1>
                </div>
            </a>
        </div>


            <?php
        }
        }

        ?>





        <br style="clear: both;">
    </div>

</div>

<!--第四推荐-->
<!--<div class="section6">-->
<!---->
<!--    <div class="chuguicontainer">-->
<!---->
<!--        <div class="sec6top clearfix-1">-->
<!--            <div class="left">-->
<!--                <a href="" target="_blank">-->
<!--                    <img src="img/left1.png" alt="">-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="right">-->
<!---->
<!--                <div class="anniushow"><img src="img/anniushow.png" alt=""></div>-->
<!---->
<!--                <div class="anniu1">-->
<!--                    <a href="../productList.php">-->
<!--                    <img src="img/anniu1.png" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--        <div class="chuguicontainer  chuguiList">-->
<!---->
<!--            --><?php
//
//            $parm4=" and fenyetuijian = '4' ";
//
//            $sql4=$sql;
//
//            $sql4.=$parm4;
////            echo $sql4;
//
//            $result4= $chugui->select($sql4);
//
//            if(count($result4)!=0){
//
//                foreach ($result4 as $row) {
//                    ?>
<!---->
<!---->
<!--                    <div>-->
<!--                        <a href="--><?php //echo $webdir."/user_product/product.php?id={$row['id']}"?><!--" target="_blank">-->
<!--                            <img src="--><?php //echo str_replace("../../","../../",$row['pic']) ?><!--" alt="">-->
<!---->
<!--                            <div class="listFloat">-->
<!--                                <h1>--><?php //echo strindex($row['title'],4,"...")?><!--</h1>-->
<!--                            </div>-->
<!--                        </a>-->
<!--                    </div>-->
<!---->
<!---->
<!--                    --><?php
//                }
//            }
//
//            ?>
<!---->
<!---->
<!---->
<!---->
<!---->
<!--            <br style="clear: both;">-->
<!--        </div>-->
<!---->
<!---->
<!--    </div>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--</div>-->



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