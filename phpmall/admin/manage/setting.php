
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/12-->
<!-- * Time: 10:48-->
<!-- */-->

<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/12-->
<!-- * Time: 10:28-->
<!-- */-->
<?php
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

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

    <h2>当前位置 ：基本设置 </h2>
    <h3>网站基本信息</h3>
    <form action="./settingDeal.php" method="post">
        <div>
            <label for="varname">显示名称：</label>
            <input type="text" name="varshowname" style="border: 1px solid rgba(86,61,124,.6);" required>
            <span style="float: right;">用于修改时查看</span>
        </div>
        <div>
            <label for="varname">变量名称：</label>
            <input type="text" name="varname" style="border: 1px solid rgba(86,61,124,.6);" required>
            <span style="float: right;">用于使用时调用</span>
        </div>
        <div>
            <label for="varinfo">变量描述：</label>
            <input type="text" name="varinfo" style="border: 1px solid rgba(86,61,124,.6);" required>
            <span style="float: right;">用于配置时有一个提示</span>
        </div>
        <div>
            <label>变量类型：</label>
            <input type="radio" name="vartype" value="string"><span>文本</span>
            <input type="radio" name="vartype" value="bool" ><span>布尔值（是、否）</span>
            <input type="radio" name="vartype"  value="strings"><span>多行文本</span>
            <span style="float: right;">配置时显示形式</span>
        </div>
        <div>
            <label for="varvalue">变量内容：</label>
            <input type="text" name="varvalue" style="border: 1px solid rgba(86,61,124,.6);" required>
            <span style="float: right;">默认内容</span>
        </div>

        <button class="btn btn-primary" type="submit">创建</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
</html>