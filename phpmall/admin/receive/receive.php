
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


$sql="select * from mall_receive ";
$parm=" where 1 ";
$sql.=$parm;

$db=new DbMysql();
$db->sql($sql);
 $infocount=$db->affected();
$pagesize=10;

$page=new page($infocount,$pagesize);

$sql.=$page->limit();



$result=$db->select($sql);

//var_dump($result)



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
        <h1>其他管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：收货地址 </h2>

    <table class="table table-bordered">
        <thead>
        <tr class="success" >
            <td>ID</td>
            <td>收货人</td>
            <td>收货地址</td>
            <td>邮编</td>
            <td>电话</td>
            <td>手机</td>
            <td>会员</td>

            <td>操作</td>

        </tr>

        </thead>

        <tbody>
        <?php
        if($infocount>=1){
        foreach($result as $row){
        ?>
        <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['shouhuoren'];?></td>
        <td><?php echo $row['shdizhi'];?></td>
        <td><?php echo $row['youbian'];?></td>
        <td><?php echo $row['tel'];?></td>
        <td><?php echo $row['mobile'];?></td>
        <td><?php echo $row['username'];?></td>

        <td><a href="receiveDel.php?id=<?php echo $row['id'];?>">删除</a></td>
        </tr>

        <?php
        }}else{
            echo "<tr class=\"danger\">
                <td>暂无</td>
                <td>暂无</td>
                <td>暂无</td>
                <td>暂无</td>
                <td>暂无</td>
                <td>暂无</td>
                <td>暂无</td>
                <td>暂无</td>
                <td>暂无</td>
            </tr>";
        }

        ?>
        </tbody>

    </table>



        <h1 style="text-align: center;font-size: 20px;">分页:
            <?php
            echo $page->show(1);
            ?>
        </h1>



</div>
</body>
</html>