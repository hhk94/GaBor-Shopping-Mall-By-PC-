<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/1
 * Time: 10:53
 */

require_once "../../public/init.php";


$chugui = new DbMysql();

$sql=" select id from mall_productList where typename = '橱柜' ";

$result=$chugui->select($sql,1);

$id=$result['id'];

//echo $result['id'];




$xjid=$db->select("select id from mall_productList where idpath like '%_$id%' ");

$xjids=0;

foreach ($xjid as $k=>$v){
    $xjids.=",".$v['id'];
}




$sql=" select title,id,price,yprice,pic,tuijianword from mall_product ";
$parm=" where 1 ";
$parm.=" and (typeid = '$id' or typeid in ($xjids)) ";

$sql.=$parm;

echo 26%2;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>橱柜首页</title>
</head>

<link rel="stylesheet" href="css/initail.css">
<script src="../../js/jquery.min.js"></script>
<link rel="stylesheet" href="../../css/initail.css">
<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">


<style>
    body{
        font-family:"微软雅黑"!important;
        /*background: #f2f2f2!important;*/
    }

    img{
        width: 100%;
    }
    .secondjiange{
        margin-top:46px;
    }

    .chuguicontainer{
        width: 1200px;
        margin:0 auto;
    }

    .tuijianList{
        display: block;
        width: 380px;
        box-sizing: border-box;
        border:1px solid #e5e5e5;
        background: #fff;

    }
    .tuijianList:hover{
        -webkit-box-shadow: 0 0 5px #d6d6d6 ;
        -moz-box-shadow: 0 0 5px #d6d6d6 ;
        box-shadow: 0 0 5px #d6d6d6 ;
    }


    .tuijianList .pic{
        margin:20px;
        width: 340px;
        height:340px;
        background: pink;
    }

    .listTitle{
        /*margin-top:17px;*/
        overflow: hidden;
        margin-left:20px;
        margin-right:20px;
        margin-bottom:20px;
    }
    .listTitle>h1{
        float: left;
        font-size: 18px;
        color: black;
        line-height:26px;
        letter-spacing:2px;


    }
    .listTitle>div{
        float: right;
        width: 142px;
        height: 26px;
    }

    .tuijian2{
        margin-top:30px;
    }
    .tuijian2>.chuguicontainer>.tuijianList{
        margin:25px 10px ;
        float: left;}

.bottom{
    margin-top:60px;
    overflow: hidden;margin-bottom:76px;
}
    .bottom>div{
        float: left;
    }

    .bottom>.chuguimore{
        width: 335px;
        float: right;
        margin-top:50px;

    }

    .bottom>.chuguimore:hover{
        -webkit-box-shadow: 0 0 20px #d6d6d6  ;
        -moz-box-shadow: 0 0 20px #d6d6d6  ;
        box-shadow: 0 0 20px #d6d6d6  ;
    }
</style>
<body>

<?php

include webdir."/include/header.php";
?>
<div class="chuguibanner">
    <img src="newimg/topbanner-chugui.png" alt="">
</div>
<div><img src="newimg/anniu.jpg" alt=""></div>
<div><a href="http://siemensgabor.com/user_product/product.php?id=31" target="_blank"><img src="newimg/4980.jpg" alt=""></a></div>
<div><img src="newimg/jiange.png" alt=""></div>
<div><a href="http://siemensgabor.com/user_product/product.php?id=32" target="_blank"><img src="newimg/5980.png" alt=""></a></div>
<div class="secondjiange"><img src="newimg/jiange.png" alt=""></div>
<div><a href="http://siemensgabor.com/user_product/product.php?id=31" target="_blank"><img src="newimg/toptuijian.jpg" alt=""></a></div>

<div class="tuijian2">
    <div class="chuguicontainer">

        <?php
        $parm3=" and fenyetuijian = '3' ";

        $sql3=$sql;

        $sql3.=$parm3;
        $result3= $chugui->select($sql3);

        if(count($result3)!=0){

        foreach ($result3 as $row) {
        ?>


        <a href="<?php echo $webdir."/user_product/product.php?id={$row['id']}"?>" target="_blank" class="tuijianList">
            <div class="pic"><img src="<?php echo str_replace("../../","../../",$row['pic']) ?>" alt=""></div>
            <div class="listTitle">

                <h1><?php echo strindex($row['tuijianword'],10,"...")?></h1>
                <div>
                    <img src="newimg/buy.png" alt="">
                </div>
            </div>
        </a>



            <?php
        }
        }

        ?>

        <br style="clear: both;">
    </div>
</div>

<div>
    <div class="chuguicontainer bottom">
        <div style="width: 672px;"><img src="newimg/shuoming.png" alt=""></div>
        <div class="chuguimore" style=""><a href="../productList.php"><img src="newimg/chuguimore.png" alt=""></a></div>
    </div>
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