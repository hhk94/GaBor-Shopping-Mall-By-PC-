<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/10-->
<!-- * Time: 10:54-->
<!-- */-->
<?php
require_once ('../lgCheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>header</title>
</head>
<link rel="stylesheet" href="../css/inital.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<style>
    body{
        font-family:"微软雅黑"!important;}

</style>
<style>


    .container{margin:0 auto;width: 1200px;}
    .container>ul{margin-top:10px;
        overflow: hidden;}
    .container>ul>li{
        color: white;
        float: left;}

    .container>ul>li:nth-of-type(2){margin-left:20px;
    }
    .container>ul>li:nth-of-type(3),.container>ul>li:nth-of-type(4){
        float: right;
        margin-left:20px;}

</style>
<body>
<div style="background: #337ab7;">
    <div class="container">
        <ul>
            <li><a href="#" class="btn btn-primary">后台管理页面</a></li>
            <li><a href="#" class="btn btn-info">账号：<?php echo $_SESSION['name'];?></a></li>
            <li><a href="#" id="out" class="btn btn-info">注销(请点这里退出)</a></li>
            <li><a href="#" class="btn btn-info">修改密码(暂未开发)</a></li>
        </ul>

    </div>

</div>

<script>
    $('#out').on('click', function(){
        $.ajax({
            url : '../lgOut.php',
            type : 'post',
            success : function(data){
                alert('注销成功!');
                top.location.href = 'checkIn.php';
            }
        })
    })
</script>
</body>
</html>