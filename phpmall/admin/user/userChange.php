
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

$id=$_GET['id'];

$db=new DbMysql();
$result=$db->select("select * from mall_user where id = '$id'",1);

$username=$result['username'];
$password=$result['password'];
$email=$result['email'];
$tiwen=$result['tiwen'];
$huida=$result['huida'];
$zt=$result['zt'];
$xingming=$result['xingming'];
$sex=$result['sex'];
$mobile=$result['mobile'];

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
        <h1>会员管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：修改会员 </h2>
    <h3>会员基本信息</h3>
    <form action="./userChangeDeal.php?id=<?php echo $id;?>" method="post">
        <div>
            <label for="username">会员账号</label>
            <input type="text" name="username" style="border: 1px solid rgba(86,61,124,.6);" required value="<?php echo $username;?>">
            <span>登录账号</span>
        </div>
        <div>
            <label for="password">会员密码</label>
            <input type="text" name="password" style="border: 1px solid rgba(86,61,124,.6);" >
            <span>如果密码不要重置则不需要填写</span>
        </div>
        <div>
            <label for="email">会员邮箱</label>
            <input type="text" name="email" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $email;?>">
        </div>
        <div>
            <label for="tiwen">提示问题</label>
            <input type="text" name="tiwen" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $tiwen;?>">
            <span>用于找回密码</span>
        </div>
        <div>
            <label for="huida">回答问题</label>
            <input type="text" name="huida" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $huida;?>">
            <span>用于找回密码</span>
        </div>
        <div>
            <label for="mobile">手机号码</label>
            <input type="text" name="mobile" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $mobile;?>">
            <span>用于找回密码</span>
        </div>
        <div>
            <label for="xingming">真实姓名</label>
            <input type="text" name="xingming" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $xingming;?>">
            <span>用于找回密码</span>
        </div>

        <div>
            <label>性别：</label>
            <select name="sex" id="sex"  style="border: 1px solid rgba(86,61,124,.6);">
                <option value="先生" <?php if($sex=="先生"){echo "selected";}?>>先生</option>
                <option value="女士"  <?php if($sex=="女士"){echo "selected";}?>>女士</option>


            </select>
        </div>
        <div>
            <label>状态：</label>
            <select name="zt" id="zt"  style="border: 1px solid rgba(86,61,124,.6);">
                <option value="1"  <?php if($zt=="1"){echo "selected";}?>>待审核</option>
                <option value="2"  <?php if($zt=="2"){echo "selected";}?>>正常</option>
                <option value="3"  <?php if($zt=="3"){echo "selected";}?>>锁定</option>

            </select>
        </div>

        <button class="btn btn-primary" type="submit">修改</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
</html>