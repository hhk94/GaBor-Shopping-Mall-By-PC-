
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

$db=new DbMysql();

$sql="select id,typename,typeorder,typezt from mall_feedbackType  ";

$zt=@$_GET['zt'];

$parm=" where 1 ";
if($zt!=""){
    $parm.=" and typezt = '$zt'";
}

$db->select($sql);
$infocount=$db->affected();
$pagesize=10;
$page=new page($infocount,$pagesize);



$sql.=$parm;
$sql.=" order by typeorder ";


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
    <link rel="stylesheet" href="css/article.css">
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
    td input{
        width: 100px;
        text-align: center;}

</style>


<script>
    function gosubmit(id){
//        alert(id);

document.go.action="feedbackTypeUpdate.php";




        if(id==0){
            document.go.ziduan.value='typeorder';
            document.go.zt.value=1;

        }else if(id==1){
            document.go.ziduan.value='typezt';
            document.go.zt.value=1;

        }else if(id==2){
//            document.go.ziduan.value='typezt';
            document.go.zt.value=0;
        }
        document.go.submit();
    }

</script>


<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>留言管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：留言分类列表 </h2>

    <h3>查看: <a href="consultType.php">全部</a>
        <a href="?zt=1">开启</a>
        <a href="?zt=0">关闭</a>
    </h3>

    <form action="feedbackTypeAllDel.php" method="post" name="go">
        <a href="feedbackTypeAdd.php" class="addAdmin">
            <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>
            <span>添加留言分类分类</span>
        </a>

        <table class="table table-bordered">
            <thead>
            <tr class="success" >
                <td style="width: 20px;">选择</td>
                <td>排序</td>
                <td>分类名称</td>
                <td>ID</td>
                <td>状态</td>
                <td>操作</td>

            </tr>

            </thead>

            <tbody>
            <?php
            if($infocount>=1){

            foreach ($result as $row){

            ?>
            <tr>
                <td><input type="checkbox" value="<?php echo $row['id']?>" name="id[]"></td>
                <td>

                    <?php echo $row['typeorder']?>
                    <input type="text" name="typeorder<?php echo $row['id'];?>" value="<?php echo $row['typeorder'];?>">
                </td>
                <td><?php echo $row['typename']?></td>
                <td><?php echo $row['id']?></td>
                <td><?php if($row['typezt']==1){
                    echo "<span style='color: #5cb85c'>开启</span>";
                    }else{
                        echo "<span style='color: #d9534f'>关闭</span>";
                    }?>
                </td>

                <td><a href="feedbackTypeDel.php?id=<?php echo $row['id'];?>">删除</a> <a href="feedbackTypeChange.php?id=<?php echo $row['id'];?>">修改</a></td>
            </tr>
            <?php
            }}else {

                ?>

                <tr  class="danger">
                    <td>暂无</td>
                    <td>暂无</td>
                    <td>暂无</td>
                    <td>暂无</td>
                    <td>暂无</td>
                    <td>暂无</td>
                </tr>

                <?php
            }
            ?>
            </tbody>

        </table>
        <input type="hidden" name="ziduan">
        <input type="hidden" name="zt">


        <input type="button" class="btn btn-danger"  onclick="gosubmit(0)" value="批量修改排序">

        <input type="button" value="批量开启" class="btn btn-success"  onclick="gosubmit(1)">
        <input type="button" value="批量关闭" class="btn btn-danger" onclick="gosubmit(2)">

        <input type="submit" value="批量删除" class="btn btn-danger" >



    </form>
    <h1 style="text-align: center;font-size: 20px;">分页:
        <?php
        echo $page->show(1);
        ?>

    </h1>



</div>
</body>
</html>