<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 10:38
 */
require_once "../public/init.php";
$userinfo = new UserInfo();

$zt= $userinfo->isok();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $webdir?>css/initail.css">
    <link rel="stylesheet" href="<?php echo $webdir?>css/comment.css">
    <link rel="stylesheet" href="<?php echo $webdir?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $webdir?>css/idangerous.swiper.css">
    <script src="<?php echo $webdir?>/js/jquery-1.11.3.min.js"></script>

    <title>Document</title>
    <style>

        .main_middle{max-width: 640px}
        /*中间*/

        /*中间促销*/
        .main_middle_onsale>h3>span{
            font-size: 14px;
            color: #e0e0e0;}
        .main_middle_onsale>h3{border-bottom:1px solid #f0f0f0}

        .changePassword{
            background: #e0e0e0;}
        .changePassword h4{padding-left:20px;
            line-height:50px;}
        .changePassword form{margin-left:180px;}
        form span{
            color: #c9302c;}
    </style>
</head>
<body>
<div class="main_middle">
    <div class="main_middle_onsale">
        <h3>修改密码 <span>changePassword</span></h3>

    </div>

    <div class="changePassword">
        <h4>以下信息为必填</h4>
    </div>
    <form class="form-horizontal" name="form_edit_profile" id="edit"  action="user_changePasswordDeal.php" method="post">
        <div class="form-group">
            <label  class="col-sm-2 control-label">原始密码</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="yPassword" name="yPassword" placeholder="原始密码">
                <span class="ywarn"></span>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">新设密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="xPassword"  name="xPassword"  placeholder="新设密码">
                <span class="xwarn"></span>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">再次确认新设密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="qPassword" name="qPassword" placeholder="确认密码">
                <span class="qwarn"></span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default disabled" id="btn">保存</button>
            </div>
        </div>
    </form>
</div>
</body>

<script>
    $(function(){

        function noNull(e,l,m) {
            if(e.val()!="" && l.val()!="" && m.val()!=""){

                $('#btn').removeClass('disabled');
            }else{
                $('#btn').addClass('disabled');
            }
        }


        $('#yPassword').blur(function(){
            noNull($('#yPassword'),$('#xPassword'),$('#qPassword'));
        });
        $('#xPassword').blur(function(){
            noNull($('#yPassword'),$('#xPassword'),$('#qPassword'));
        });
        $('#qPassword').blur(function(){
            noNull($('#yPassword'),$('#xPassword'),$('#qPassword'));
        });



        $('#edit').submit(function(){

            if($('#btn').hasClass('disabled')){
                return false;
            }
            if($('#xPassword').val()!=$('#qPassword').val()){
                $('.qwarn').text('两次密码输入不一致！');
                $('#btn').addClass('disabled');
                return false;
            }
            if($('#xPassword').val()==$('#yPassword').val()){
                $('.xwarn').text('新密码不能与原密码相同！');
                return false;
            }

           


        })

    })
</script>
</html>
