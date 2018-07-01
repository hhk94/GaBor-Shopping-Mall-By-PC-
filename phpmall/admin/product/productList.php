
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/12-->
<!-- * Time: 10:28-->
<!-- */-->
<?php
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
//require_once "./../down/page.class.php";
require_once "./../down/productType.class.php";





$list=new DbMysql();

//$pagesize=5;
$list->sql(" select * from mall_productList ");
$infocount=$list->affected();

//$page = new page($infocount,$pagesize);
//$result=$list->select("select * from productList  ".$page->limit());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../../css/inital.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery.min.js"></script>
    <style>
        body{
            font-family:"微软雅黑"!important;}

    </style>
</head>
<style>
    .logTop{

        background: linear-gradient(45deg,#020031 0,#6d3353 100%);
        border-bottom:4px solid #2e6da4;
    }
    .logTop>h1{
        font-weight:bold;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
        height:40px;
        line-height:40px;
        text-align: center;
        width: 100px;
        float: left;
        margin-left:25px;
        margin-bottom:-7px;
        font-size:20px;;
        color: black;
        background: #eee;}
    .logBackground{
        margin-top:10px;
        background:  #eee;;
        border:2px solid #d4d4dc;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        -webkit-box-shadow: 0 6px 0 #cfcfd4 ;
        -moz-box-shadow: 0 6px 0 #cfcfd4 ;
        box-shadow: 0 6px 0 #cfcfd4 ;;}

    .logBackground>h2{
        font-size: 18px;
        padding: 10px 0;
        margin:10px 15px;
        border-bottom:1px solid black;
    }
    /*.table{margin:10px }*/
    .table>thead>tr{
        font-weight:bold;
        font-size: 18px;}
    .addAdmin{margin-bottom:10px;
        display: block;
        overflow: hidden;}
    .addAdmin>div{margin-left:10px;
        width: 26px;
        float: left;}
    .addAdmin>span{
        font-size: 20px;
        float: left;}
    .addAdmin img{
        width: 100%;}
    td{
        font-size: 20px;}
</style>

<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>商品管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：商品分类列表 </h2>
    <a href="productListAdd.php" class="addAdmin">
        <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>
        <span>添加新分类</span>
    </a>
    <table class="table table-bordered">
        <thead>
        <tr class="success" >
            <td>ID</td>
            <td>分类名称</td>
            <td>操作</td>

        </tr>

        </thead>

        <tbody>

        <?php
        $ptype=new ProductType();
        $menu=$ptype->infoList();
        @$a="";
        foreach ($menu as $row){

            $a.="<tr>";
            $a.="<td>".$row["id"]."</td>";
            $a.="<td>|-".str_repeat("-",substr_count($row['idpath'],"_")) .$row['typename']."</td>";
            $a.="<td><a href='./../deal/productListDel.php?id=".$row["id"]."'>删除</a>
                        <a href='./productListChange.php?id=".$row["id"]."'>修改</a></td>";
            $a.="</tr>";
        }
        echo $a;
        ?>

        </tbody>

    </table>



<!--    <h1 style="text-align: center;font-size: 20px;">分页:-->
<!---->
<!--    </h1>-->



</div>
</body>
</html>