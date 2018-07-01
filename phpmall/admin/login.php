<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/jquery.min.js"></script>
    <title>后台管理登录界面</title>
</head>
<body>
<h2>商城管理系统</h2>
<form action="./deal/loginDeal.php" class="userLogin" onSubmit="return test()" method="POST">
    <div>
        账号: <input type="text" class="username" name="username" id="username">
    </div>
    <div>
        密码：<input type="text" class="userpsd" name="userpsd" id="userpsd">
    </div>
    <div>
        验证码：<input type="text" class="code" name="code">
    </div>
    <div><img src="./down/code.php" alt=""></div>
    <button type="submit"  id="btn">登录</button>
</form>


<script>
    function test(){
        if($('.username').val()==''){
            alert('请输入用户名');
            return false;
        }else if($('.userpsd').val()==''){
            alert('请输入密码');
            return false;
        }else{
            return true;}
    }

</script>
</body>
</html>