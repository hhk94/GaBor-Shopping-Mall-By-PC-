
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/12-->
<!-- * Time: 10:28-->
<!-- */-->
<?php
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
require_once "./../down/page.class.php";
require_once "./../down/productType.class.php";

$rights=$_SESSION['rights'];//当前登录管理员权限
$username=$_SESSION['username'];




$sql=" select mall_product.*,mall_productList.typename from mall_product inner join mall_productList on mall_product.typeid=mall_productList.id ";
$parm=" where 1 ";

//判断管理员身份
if($rights!=1){

    $parm.=" and inputer = '$username'";
}


//判断分类id
$typeid=@$_GET['typeid'];

if($typeid!=""){
        $parm.=" and typeid = '$typeid'";
}else{
    $typeid=0;
}


//热销
$ishot=@$_GET['ishot'];


if($ishot!=""){
    $parm.=" and hot = '$ishot'";
}

$isdrop=@$_GET['isdrop'];


if($isdrop!=""){
    $parm.=" and drops = '$isdrop'";
}

$isrecommend=@$_GET['isrecommend'];


if($isrecommend!=""){
    $parm.=" and recommend = '$isrecommend'";
}

//判断关键词



$key=@$_GET['key'];
$ziduan=@$_GET['ziduan'];


if($key!=""){
    $parm.=" and $ziduan like '%$key%'";
}



$sql.=$parm;

echo $sql;
$db=new DbMysql();
$db->sql($sql);
$pagesize=10;
$infocount=$db->affected();

$page=new page($infocount,$pagesize);

$sql.=" order by id desc ";
$sql.=$page->limit();

$result=$db->select($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../../css/inital.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/product.css">
    <script src="../../js/jquery.min.js"></script>
    <style>
        body{
            font-family:"微软雅黑"!important;}

    </style>
</head>
<style>

</style>
<script>
    function goinfo(str,ztid){
        document.info.ziduan.value=str;
        document.info.infozt.value=ztid;
        document.info.action="productUpdate.php";
        document.info.submit();
    }


</script>
<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>商品管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：商品列表 </h2>

    <h3>查看:
        <a href="product.php">全部</a>
        <a href="product.php?ishot=1">热销</a>
        <a href="product.php?isdrop=1">降价</a>
        <a href="product.php?isrecommend=1">推荐</a>


    </h3>


    <form action="./../deal/productAllDel.php" method="post" name="info">
        <select name="" id="" style="float: right;font-size: 18px;   width: 200px;height: 30px;border: 1px solid rgba(86,61,124,.6)" onchange="javascript:location.href=this.options[selectedIndex].value">
            <option value="product.php">全部商品</option>

            <?php
                $ptype= new ProductType();
                $menu=$ptype->floption(0,$typeid,1);
                echo $menu;



            ?>

        </select>
        <a href="productAdd.php" class="addAdmin">
            <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>
            <span>添加商品</span>
        </a>
        <table class="table table-bordered">
            <thead>


            <tr class="success" >
                <td>ID</td>
                <td>

                    商品编号
                </td>
                <td>商品名称</td>
                <td>所属分类</td>
                <td>商品属性</td>
                <td>库存</td>
                <td>浏览数</td>
                <td>录入员</td>
                <td>上架时间</td>
                <td>操作</td>
                <td>增加主图</td>
                <td>分页面推荐位</td>
                <td>上首页用图</td>
            </tr>

            </thead>

            <tbody>
    <?php
    if($infocount>=1){

    foreach($result as $row) {


    ?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td>
            <input name='id[]' type="checkbox" value="<?php echo $row['id'];?>">
            <?php echo $row['numbers'];?>
        </td>
        <td><?php echo $row['title']?></td>
        <td><?php echo $row['typename']?></td>
        <td>
            <?php
            if($row['hot']==1){
                echo "热销 ";
            }
            if($row['drops']==1){
                echo "新品 ";
            }

            if($row['recommend']==1){
                echo "推荐";
            }
            ?>





        </td>
        <td><?php echo $row['kucun']?></td>
        <td><?php echo $row['hits']?></td>
        <td><?php echo $row['inputer']?></td>
        <td><?php echo date("Y-m-d h:i:s",$row['addtime']);?></td>
        <td>
            <a href="./../deal/productDel.php?id=<?php echo $row['id']?>">删除</a>
            <a href="./productChange.php?id=<?php echo $row['id']?>">修改</a>
            <a href="../consultation/consultAdd.php?pid=<?php echo $row['id']?>">咨询</a>
            <a href="../assess/assessAdd.php?pid=<?php echo $row['id']?>">评论</a>
        </td>
        <td><a href="productZhutu.php?id=<?php echo $row['id']?>">增加主图</a></td>
        <td><?php   if($row['fenyetuijian'] ==0){echo "无推荐位";} if($row['fenyetuijian'] ==1){echo "1号位";} if($row['fenyetuijian'] ==2){echo "2号位";} if($row['fenyetuijian'] ==3){echo "3号位";} if($row['fenyetuijian'] ==4){echo "4号位";}?></td>
        <td><a href="toindex.php?id=<?php echo $row['id']?>">上传</a></td>
    </tr>
    <?php
    }}else{


    ?>
        <tr style="color: red;">
            <td>暂无数据</td>
            <td>暂无数据</td>
            <td>暂无数据</td>
            <td>暂无数据</td>
            <td>暂无数据</td>
            <td>暂无数据</td>
            <td>暂无数据</td>
            <td>暂无数据</td>
            <td>暂无数据</td>
            <td>暂无数据</td>
        </tr>



        <?php
    }

    ?>

            </tbody>

        </table>


        <button class="btn btn-danger">删除所选</button>

        <input type="button" value="取消热销" class="btn btn-success"  onclick="goinfo('hot',0)">
        <input type="button" value="设置热销" class="btn btn-danger" onclick="goinfo('hot',1)">
        <input type="button" value="取消降价" class="btn btn-success" onclick="goinfo('drops',0)">
        <input type="button" value="设置降价" class="btn btn-danger" onclick="goinfo('drops',1)">
        <input type="button" value="设置推荐" class="btn btn-danger" onclick="goinfo('recommend',1)">
        <input type="button" value="取消推荐" class="btn btn-success" onclick="goinfo('recommend',0)">

        <input type="button" value="设置一号推荐" class="btn btn-success" onclick="goinfo('fenyetuijian',1)">
        <input type="button" value="设置二号推荐" class="btn btn-success" onclick="goinfo('fenyetuijian',2)">
        <input type="button" value="设置三号推荐" class="btn btn-success" onclick="goinfo('fenyetuijian',3)">
        <input type="button" value="设置四号推荐" class="btn btn-success" onclick="goinfo('fenyetuijian',4)">
        <input type="button" value="取消分页推荐位" class="btn btn-success" onclick="goinfo('fenyetuijian',0)">

        <input type="hidden" name="ziduan">
        <input type="hidden" name="infozt">

    </form>

    <h1>警告：推荐位为产品分页面推荐位，橱柜、衣柜、全屋 在格子分类中，一号位只有一个； 2号位 三个， 三号位随意</h1>



    <form action="product.php" class="search" method="get" name="search" id="formsearch" target="">
        <label class="control-label" for="key" style=""> 商品关键字：</label>
        <select name="ziduan" id="" style="font-size: 18px;line-height: 24px;width: 140px;height: 36px;" class="form-control input-sm">
            <option value="numbers">商品编号</option>

            <option value="title" selected>商品名称</option>
            <option value="inputer">录入员</option>

        </select>

        <input type="text" name="key" class="form-control" id="key" required>
        <input type="submit" value="查询" class="btn btn-primary">





    </form>



    <h1 style="text-align: center;font-size: 20px;">分页:
        <?php
        echo $page->show(1);
        ?>

    </h1>
</div>
</body>
</html>