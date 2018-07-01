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

$userinfo=$db->select("select * from mall_user where username = '".UID."' ",1);

//var_dump($userinfo);

$mobile=$userinfo['mobile'];
$xingming=$userinfo['xingming'];
$sex=$userinfo['sex'];
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
        <h3>修改资料 <span>changeInformation</span></h3>

    </div>

    <div class="changePassword">
        <h4>以下信息为必填</h4>
    </div>
    <form class="form-horizontal" name="form_edit_profile" id="edit"  action="user_main_middle_information_deal.php" method="post">
        <div class="form-group">
            <label  class="col-sm-2 control-label">真实姓名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="realname" name="realname" placeholder="真实姓名" value="<?php echo $xingming;?>">
                <span class="xingming_error"></span>
            </div>
        </div>
        <div class="form-group">
            <label  class="col-sm-2 control-label">您的性别</label>
            <div class="col-sm-10">
                <select name="sex" id="sex" class="form-control">
                    <option value="保密" >保密</option>
                    <option value="先生" <?php if($sex=='先生'){ echo 'selected';}?>>先生</option>
                    <option value="女士"  <?php if($sex=='女士'){ echo 'selected';}?>>女士</option>
                </select>
                <span class="xwarn"></span>
            </div>
        </div>

        <div class="form-group">
            <label  class="col-sm-2 control-label">手机号码</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="手机号码"  value="<?php echo $mobile;?>">
                <span class="mobile_error"></span>
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


        $('#realname').blur(function(){
            noNull($('#realname'),$('#mobile'),$('#sex'));
            if($('#realname').val()==""){
               $('.xingming_error').text('此项不能为空');

            }else{
                $('.xingming_error').text('');
            }
        });
        $('#sex').blur(function(){
            noNull($('#realname'),$('#mobile'),$('#sex'));
        });
        $('#mobile').blur(function(){
            noNull($('#realname'),$('#mobile'),$('#sex'));

            if($('#mobile').val()==""){
                $('.mobile_error').text('此项不能为空');

            }else{
                $('.mobile_error').text('');
            }
        });



        $('#edit').submit(function(){

            if($('#btn').hasClass('disabled')){
                return false;
            }

            if(!$){}



        })

    })
</script>
</html>
