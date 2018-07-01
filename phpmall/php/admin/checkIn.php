<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>嘉宝管理员入口</title>
    <style>
        body{
            background:url("img/loginbg.jpg") no-repeat ;
            background-size: cover;}
        *{margin:0;padding:0;border:0}
       /**/
        /*h2{*/
            /*text-align: center;*/
        /*}*/
        /*form{*/
            /*width:300px;*/
            /*height:300px;*/
            /*margin:200px auto 0;*/
        /*}*/
        /*form p {*/
            /*position: relative;*/
            /*height:30px;*/
        /*}*/
        /*span{*/
            /*position:absolute;*/
            /*height:30px;*/
            /*line-height:30px;*/
            /*text-indent:.5em;*/
        /*}*/
        /*input {*/
            /*text-indent:.5em;*/
            /*height:30px;*/
            /*width:200px;*/
        /*}*/
        .container{
            position: relative;
            width: 1000px;margin:0 auto;}
        .floatF{
            position: relative;
            top:200px;
            left:50%;
            /*overflow: hidden;*/
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.2);
            -webkit-border-radius:10px;
            -moz-border-radius:10px;
            border-radius:10px;
            width: 400px;
            height: 400px;}
        h2{margin-top:30px;
            text-align: center;}
        .floatF p{
            height: 60px;
            position: relative;}
        .floatF p:nth-of-type(1){
            margin-top:100px;
        }
        .floatF p>input{
            position: relative;

            width: 80%;
            top:0;
            left:50%;
            height: 40px;
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
            transform: translateX(-50%);}
        .floatF p:nth-of-type(1)>input,.floatF p:nth-of-type(2)>input{
            font-size: 26px;
            text-indent:20px;
        }
        .submit{
            color: white;
            background: rgb(24,188,156);
            font-size: 20px;}
        .floatF h2{
            height: 40px;
            line-height:40px;
            background: rgb(24,188,156);}
        .floatF2{ width: 400px;
            height: 400px;
            position: absolute;top:0;left:105%;background: rgba(255, 255, 255, 0.2);
            -webkit-border-radius:10px;
            -moz-border-radius:10px;
            border-radius:10px;}
        .floatF2 p{
            letter-spacing:2px;
            width: 340px;
            color:black;
            font-weight:bold;
            line-height:30px;
            margin-top:30px!important;
            font-size: 20px;
            position: absolute;
            left:50%;
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
            transform: translateX(-50%);
            }
        .update{
            font-size: 26px;
            text-decoration: none;
            position: absolute;left:50%;bottom:10px;
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
            transform: translateX(-50%);
        }
    </style>
</head>
<body>


<div class="container">
<div class="floatF">
    <br style="clear: both;">
    <h2>嘉宝橱柜后台管理(V—3.1.2)</h2>
    <form action="adminlogin.php" method="POST">
        <p>

            <input type="text" name="phone" placeholder="账号"/>
        </p>
        <p>

            <input type="password" name="password"  placeholder="密码"/>
        </p>
        <p>
            <input type="submit" name="submit" value="登录" class="submit"/>
        </p>
    </form>




<div class="floatF2">
    <h2>3.1.2更新内容</h2>
    <p>1、增加页面跳转 <br>
         <br>
    </p>
    <a href="update.html" class="update">查看详细更新</a>
</div>

</div>
</div>


</body>
<script src="../../js/jquery.min.js"></script>
<script>
    $(function(){
        $('input').on('focus', function(){
            $(this).prev('span').css({display:'none'});
        });
        if($('input').html()){
            $(this).prev('span').css({display:'none'});
        }
    })
</script>
</html>