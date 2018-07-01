
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2018/2/24-->
<!-- * Time: 17:07-->
<!-- */-->


<?php
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$db=new DbMysql();
$result=$db->select("select * from mall_webconfig");
//echo count($result);
if(count($result)<1){
   echo "<script>alert('无任何变量,即将前往创建');location.href='setting.php'</script>";
}

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
    body{
        font-family:"微软雅黑"!important;}

</style>
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
        position: relative;
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
    .table{margin:10px }
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
    .logBackground>h3{margin-left:15px;margin-right: 15px;font-weight: bold;
        background: #6f5499;
        color: white;letter-spacing: 3px;
        text-indent:10px;
        line-height:40px;
        font-size: 20px;}

    form label,form input,form span,form select,form option{
        font-size: 18px;
    }
    form select{
        height:30px;}
    form{margin:50px 0 20px 50%;

        -webkit-transform: translateX(-25%);
        -moz-transform: translateX(-25%);
        -ms-transform: translateX(-25%);
        -o-transform: translateX(-25%);
        transform: translateX(-25%);
        position: relative;}
    form button{margin-left:80px;margin-top:20px;}
    form>div{margin-bottom:20px;}
</style>

<body>
<div class="logBackground">
    <div class="logTop">
        <h1>常规管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：修改基本设置 </h2>
    <h3>网站基本信息</h3>
    <a href="setting.php" class="btn btn-primary" style="margin-left:20px;">添加变量</a>
    <form action="./settingChangeDeal.php" method="post">
        <?php
            foreach($result as $row){
        ?>

        <div>
            <label for="varname"><?php echo $row['varshowname'];?>：</label>
<!--            <input type="text" name="varname" style="border: 1px solid rgba(86,61,124,.6);" required>-->
            <span><?php
                switch ($row['vartype']){
                    case "string";
                        echo "<input type='text' value='".$row['varvalue']."' name='".$row['varname']."'>";
                        break;
                    case "bool";
                        if($row['varvalue']=='Y'){
                            echo "<input type='radio' value='Y' name='".$row['varname']."' checked>是";
                            echo "<input type='radio' value='N' name='".$row['varname']."'>否";

                        }else{
                            echo "<input type='radio' value='Y' name='".$row['varname']."'>是";
                            echo "<input type='radio' value='N' name='".$row['varname']."' checked>否";
                        }

                        break;
                    case "strings";
                        echo "<textarea name='".$row['varname']."'>".$row['varvalue']."</textarea>";
                        break;

                }
                ?></span>
            <span style="float: right;text-align: left;"><?php echo $row['varinfo'];?></span>
        </div>

        <?php
            }
        ?>

        <button class="btn btn-primary" type="submit">修改</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
</html>