
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
require_once "./down/checkLogin.php";
require_once "./down/connectDb.php";
$id=$_GET['id'];
$edit=new DbMysql();
$result=$edit->select("select * from mall_admin where id = '$id'",1);


$username=$result['username'];
$password=$result['password'];
$rights=$result['rights'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../css/inital.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
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
        <h1>用户管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：添加管理员 </h2>
    <h3>管理员基本信息</h3>

    <form action="./deal/adminChangeDeal.php?id=<?php echo $id;?>" method="post" onsubmit="return test()">
        <div>
            <label for="adminName">管理员账号</label>
            <input type="text" id="username" name="username" style="border: 1px solid rgba(86,61,124,.6);" required value="<?php echo $username;?>">
        </div>
        <div>
            <label for="adminName">管理员密码</label>
            <input type="text" id="password"  name="password" style="border: 1px solid rgba(86,61,124,.6);" required value="<?php echo $password;?>">
        </div>
        <div>
            <span>修改管理员身份：</span>
            <select name="rights" id="rights"  style="border: 1px solid rgba(86,61,124,.6);">
                <option value="2" <?php
                    if($rights==2){
                        echo "selected";
                    }
                ?>>普通管理员</option>
                <option value="1"  <?php
                if($rights==1){
                    echo "selected";
                }
                ?>>超级管理员</option>

            </select>
        </div>

        <button class="btn btn-primary" type="submit">修改</button> <button class="btn btn-primary">重置</button>
    </form>


    <script>
        function test(){
            if($('#username').val()=='<?php echo $username?>' && $('#password').val()=='<?php echo $password?>' && $('#rights').val()=='<?php echo $rights?>'){
                alert('修改的信息与修改前一致，无需提交');
                return false;
            }
            return true;
        }


    </script>
</div>
</body>
</html>