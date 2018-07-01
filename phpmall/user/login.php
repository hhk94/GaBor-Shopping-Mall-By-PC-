
<?php

require_once "../admin/config/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员登录 - <?php echo $webname?></title>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<script>
    function form_login(){

    }

//        d登录显示账号密码
    function showwarn(elm,str){
        elm.parent("div").children('span').html(str);
    }
//刷新验证码
function codeF(e) {
    $('#'+e).attr('src','../admin/down/code.php').show();
}

</script>

<script>
    function hiddenwarn(elm,str,num){
        if(num==1){

            if(elm.val()!=""){
                if(ismail(elm.val())){
                    elm.parent("div").children('span').html(str);
                    elm.parent("div").children('span').css({'color':'#5cb85c'});
                }else{
                    elm.parent("div").children('span').html('请输入正确的email');
                    elm.parent("div").children('span').css({'color':'#d9534f'});
                }

            }else{
                elm.parent("div").children('span').html('不能为空');
                elm.parent("div").children('span').css({'color':'#d9534f'});
            }


        }else if(num==2){
            if(elm.val()!=""){


                elm.parent("div").children('span').html(str);
                elm.parent("div").children('span').css({'color':'#5cb85c'});
            }else{
                elm.parent("div").children('span').html('不能为空');
                elm.parent("div").children('span').css({'color':'#d9534f'});
            }
        }else if(num==3){
            if(elm.val()!=""){


                elm.parent("div").children('span').html(str);
                elm.parent("div").children('span').css({'color':'#5cb85c'});
            }else{
                elm.parent("div").children('span').html('不能为空');
                elm.parent("div").children('span').css({'color':'#d9534f'});
            }
        }else if(num==4){
            if(elm.val()!=""){


                elm.parent("div").children('span').html(str);
                elm.parent("div").children('span').css({'color':'#5cb85c'});
            }else{
                elm.parent("div").children('span').html('请输入正确手机号码');
                elm.parent("div").children('span').css({'color':'#d9534f'});
            }
        }


    }


function ismail(str){
    var search_str=/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
    if(!search_str.test(str)){
        return false;
    }
    return true;
}



</script>



<style>
    /*form span{*/
        /*color: #d9534f;}*/
    /*#imgcode{*/
        /*display: none;}*/


    /*#formLogin{*/
        /*width: 342px;}*/
    /*.logo{*/
        /*width: 173px;*/
        /*margin-left:74px;*/
    /*}*/
    /*#formLogin>p{*/
        /*margin-top:5px;*/
        /*font-size:12px;*/
        /*text-align: right;}*/
    /*#formLogin input{*/
        /*text-indent:20px;*/
        /*height: 54px;*/
        /*width: 100%;*/
        /*border:1px solid #00a6ba;*/
        /*-webkit-border-radius:5px;*/
        /*-moz-border-radius:5px;*/
        /*border-radius:5px;*/
        /*margin-bottom:10px;*/
        /*font-size: 30px;*/
    /*}*/

    #formLogin button{
        margin:50px 53px 0 53px;
        width: 340px;
        height: 54px;
        font-size: 24px;
        background: #00a6ba;
        color: white;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
    }

    .login-container{

        width: 1120px;
        margin:100px auto 0 auto;
        position: relative;
    }
    .formLogin{
        background: rgba(255,255,255,0.6);

        width: 446px;
        height: 486px;
        position: absolute;
        right:24px;
        top:73px;
    ;
    }
    .loginLogo{
        width: 173px;
        margin-top:50px;
        margin-left:136.5px;

    }

    .formLogin>p{
        margin-right:52px;
        margin-top:5px;
        font-size:12px;
        text-align: right;}
    .formLogin>p>a{ color: #00a6ba;}
    .inputDiv{
        margin:6px 53px;
    }
    .inputhight{
        height: 38px;
        border-color:transparent;
    }
    .inputLeft{
        padding:0;
        overflow: hidden;
    }
    .checkbox{
        margin-left:53px;}
    .checkbox>a{
        color: #00a6ba;
        margin-right:53px;
        float: right;}
</style>
<body>

<div class="login-container">
    <img src="img/loginBG.png" alt="">
    <form action="" class="formLogin" id="formLogin">
        <div class="loginLogo"><img src="img/logo.png" alt=""></div>
        <p>没有账号，去 <a href="zhuce.php">注册</a></p>

        <div class="form-group has-success has-feedback inputDiv">
            <label class="control-label sr-only" for="login_username">账号</label>
            <div class="input-group">
                <span class="input-group-addon inputLeft"><img src="img/input1.png" alt=""></span>
                <input type="text" class="form-control inputhight" id="login_username" name="login_username" aria-describedby="inputGroupSuccess4Status" placeholder="账号">
            </div>
        </div>

        <div class="form-group has-success has-feedback inputDiv">
            <label class="control-label sr-only" for="login_password">密码</label>
            <div class="input-group">
                <span class="input-group-addon inputLeft"><img src="img/input2.png" alt=""></span>
                <input type="text" class="form-control inputhight" id="login_password" name="login_password"  aria-describedby="inputGroupSuccess4Status" placeholder="密码">
            </div>
        </div>

        <div class="form-group has-success has-feedback inputDiv">
            <label class="control-label sr-only" for="verifcode">验证码</label>
            <div class="input-group">
                <span class="input-group-addon inputLeft"><img src="" alt="" id="imgcode"></span>
                <input type="text" class="form-control inputhight" id="verifcode" aria-describedby="inputGroupSuccess4Status" placeholder="验证码" name="verifcode" onfocus="codeF('imgcode')">
            </div>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="rememberMe" id = "rememberMe">记住账号密码
            </label>
            <a href="">忘记密码?</a>
        </div>


        <button>登录</button>
    </form>

</div>






<!--<form action="" name="admin"  method="post" id="formLogin">-->
<!--    <div class="logo"><img src="logo.png" alt=""></div>-->
<!--    <p>没有账号，去 <a href="">注册</a></p>-->
<!--    <div>-->
<!--<!--        <label for="" >e-mail </label>-->
<!--        <input type="text" name="login_username" placeholder="e-mail" id="login_username" onblur="hiddenwarn($('#login_username'),'账号通过',1)">-->
<!--        <span class="login_username"></span>-->
<!--    </div>-->
<!--    <div>-->
<!--<!--        <label for="">密码</label>-->
<!--        <input type="text" name="login_password" placeholder="密码" id="login_password" onblur="hiddenwarn($('#login_password'),'密码通过',2)">-->
<!--        <span class="login_password"></span>-->
<!--    </div>-->
<!--    <div>-->
<!--<!--        <label for="">验证码</label>-->
<!--        <input type="text" name="verifcode" id="verifcode" placeholder="验证码" onfocus="codeF('imgcode')" onblur="hiddenwarn($('#verifcode'),'已输入',3)" style="width: 50%;">-->
<!--        <img src="" alt="" id="imgcode">-->
<!--        <span class="loginCode"></span>-->
<!--    </div>-->
<!--    <button>登录</button>-->
<!--</form>-->
<!---->
<!---->
<!--<form action="" id="regform" method="post">-->
<!--    注册-->
<!--    <div>-->
<!--        <label for="">e-mail</label>-->
<!--        <input type="text" name="reg_username"  id="reg_username" onblur="hiddenwarn($('#reg_username'),'账号通过',1)">-->
<!---->
<!--        <span class="reg_username"></span>-->
<!--        <p>请填入有效email，用于后期接受发货通知</p>-->
<!--    </div>-->
<!--    <div>-->
<!--        <label for="">设置密码</label>-->
<!--        <input type="text" name="reg_password" id="reg_password" onblur="hiddenwarn($('#reg_password'),'密码通过',2)">-->
<!--        <span class="reg_password"   ></span>-->
<!--    </div>-->
<!---->
<!--    <div>-->
<!--        <label for="">再次输入您的密码</label>-->
<!--        <input type="text" name="reg_password_again" id="reg_password_again" onblur="hiddenwarn($('#reg_password_again'),'再次密码通过',2)">-->
<!--        <span ></span>-->
<!--    </div>-->
<!---->
<!---->
<!--    <div>-->
<!--        <label for="">电话</label>-->
<!--        <input type="text" name="reg_phone" id="reg_phone" onblur="hiddenwarn($('#reg_phone'),'手机号码ok',4)">-->
<!--        <span class="reg_phone"></span>-->
<!--    </div>-->
<!--    <div>-->
<!--        <label for="">验证码</label>-->
<!--        <input type="text" name="reg_code" id="reg_code" onfocus="codeF('regcode')" onblur="hiddenwarn($('#code'),'已输入',3)">-->
<!--        <img src="" alt="" id="regcode">-->
<!--        <span class="regCode"></span>-->
<!--    </div>-->
<!--    <button>注册</button>-->
<!--</form>-->

<script>



    $(function(){





        //biaodan 表单注册
        $('#regform').submit(function(){
            var username=$('#reg_username').val();
            if(!username){
                showwarn( $('#reg_username'),"账号名不能为空");

                return false;
            }

            var password=$('#reg_password').val();
            if(!password){
                showwarn( $('#reg_password'),"密码不能为空");
                return false;
            }

            var password_again=$('#reg_password_again').val();
            if(!password_again){
                showwarn( $('#reg_password'),"再次密码不能为空");
                return false;
            }


            if(password_again!= password){
                showwarn( $('#reg_password_again'),"两次密码输入不一样");
                $('#reg_password_again').parent("div").children('span').css({'color':'#d9534f'});
                return false;
            }



            var reg_phone=$('#reg_phone').val();
            if(!reg_phone){
                showwarn( $('#reg_phone'),"电话号码不能为空");
                return false;
            }

            var verifcode=$('#reg_code').val();
            if(!verifcode){
                showwarn( $('#reg_code'),"验证码不能为空");
                return false;
            }
            $.ajax({
                url:"../ajax/user_Reg.php",
                data:$('#regform').serialize(),
                type:"POST",
                success:function(data){

                    switch(data){
                        case "0":

                            $('.regCode').html('验证码错误！');
                            $('.regCode').css({'color':'#d9534f'});
                            break;
                        case "5":

                            $('.reg_username').html('用户名不存在！');
                            $('.reg_username').css({'color':'#d9534f'});
                            break;

                        case "1":
                            alert('账号注册成功,但是需要管理员审核后才能使用！')

                            break;



                        case "2":

                            location.href="user_main.php";

                            break;

                        default:
                            console.log(data);
                            alert('未知错误，请联系管理员');


                    }
                },
                error:function(e){
                    alert('表单提交错误');
                }
            })

                return false;
        });
        //表单异步登录
        $('#formLogin').submit(function(){
            var username=$('#login_username').val();
            if(!username){
                showwarn( $('#login_username'),"账号名不能为空");

                return false;
            }

            var password=$('#login_password').val();
            if(!password){
                showwarn( $('#login_password'),"密码不能为空");
                return false;
            }

            var verifcode=$('#verifcode').val();
            if(!verifcode){
                showwarn( $('#verifcode'),"验证码不能为空");
                return false;
            }
            $.ajax({
                url:"../ajax/user_LoginSave.php",
                data:$('#formLogin').serialize(),
                type:"POST",
                success:function(data){

                    switch(data){
                        case "0":

                            $('.loginCode').html('验证码错误！');
                            $('.loginCode').css({'color':'#d9534f'});
                            break;
                        case "-1":

                            $('.login_username').html('用户名不存在！');
                            $('.login_username').css({'color':'#d9534f'});
                            break;
                        case "-2":

                            $('.login_password').html('密码不存在！');
                            $('.login_password').css({'color':'#d9534f'});
                            break;
                        case "1":

                            $('.login_username').html('账号未通过审核！');
                            $('.login_username').css({'color':'#d9534f'});
                            break;
                        case "3":

                            $('.login_username').html('账号已被锁定！');
                            $('.login_username').css({'color':'#d9534f'});
                            break;
                        case "2":

                            location.href="user_main.php";

                            break;

                        default:
                            alert('未知错误，请联系管理员');


                    }
                },
                error:function(e){
                    alert('表单提交错误');
                }
            })


            return false;

        })



    })
</script>


</body>
</html>