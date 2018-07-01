
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
$links=new DbMysql();

$sql="select * from mall_links order by id desc ";

$links->sql($sql);
$infocount=$links->affected();
$pagesize=5;
$page=new page($infocount,$pagesize);

$sql.=$page->limit();

$result=$links->select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../../css/inital.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery.min.js"></script>
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
    tbody td{
        font-size:16px!important;}

    .logBackground>h3{margin-left:15px;margin-right: 15px;font-weight: bold;
        background: #6f5499;
        color: white;letter-spacing: 3px;
        text-indent:10px;
        line-height:40px;
        font-size: 20px;}

    .logBackground>h3>a{
        color: white; margin-left:20px;}
    .search{margin-top:20px;margin-left:50%;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        width: 400px;}
    .search input{margin-top:20px;margin-left:50%;-webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);}

    .search #key{border:1px solid #666!important;}
    .search label{margin-left:50%;;-webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        font-size: 20px;
        -o-transform: translateX(-50%);
        transform: translateX(-50%);}
</style>

<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>友情链接</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：友情链接列表 </h2>


    <form action="./../deal/articleAllDel.php" method="post">






        <a href="linkAdd.php" class="addAdmin">
            <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>
            <span>添加链接</span>
        </a>
        <table class="table table-bordered">
            <thead>


            <tr class="success" >
                <td>

                    ID
                </td>
                <td>网站名称</td>
                <td>网址</td>
                <td>链接类型</td>
                <td>LOGO</td>
                <td>加入时间</td>

                <td>操作</td>

            </tr>

            </thead>

            <tbody>
                    <?php
                    if($infocount>=1){

                    foreach($result as $row){
                    ?>

                    <tr>

                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['webname']?></td>
                        <td><?php echo $row['weburl']?></td>
                        <td><?php if($row['styleid']==1){
                            echo "LOGO链接";
                            }else{
                                echo "文本链接";
                            }


                            ?></td>
                        <td><?php echo $row['logourl']?></td>
                        <td><?php echo date("Y-m-d",$row['addtime'])?></td>

                        <td><a href="./../deal/linksDel.php?id=<?php echo $row['id']?>">删除</a>
                            <a href="./linksChange.php?id=<?php echo $row['id']?>">修改</a></td>
                    </tr>
                    <?php
                    }}else{
                        echo "<tr><td>暂无连接</td></tr>";
                    }
                    ?>

            </tbody>

        </table>



    </form>









    <h1 style="text-align: center;font-size: 20px;">分页:
                <?php
                    echo $page->show(2);
                ?>
    </h1>
</div>
</body>
</html>