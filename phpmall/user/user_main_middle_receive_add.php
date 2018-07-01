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

$_SESSION['editOK']='ok';
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
        
        form span{
            color: #c9302c;}
    </style>
</head>
<body>
<div class="main_middle">
    <div class="main_middle_onsale">
        <h3>管理收货地址 <span>add Receive</span></h3>

    </div>

    <div>
        <form class="form-horizontal" name="form_edit_profile" id="edit"  action="user_main_middle_receive_add_deal.php" method="post">
            <div class="form-group">
                <label  class="col-sm-2 control-label"><input type="hidden" name="action" value="add">收货人 *</label>
                <div class="col-sm-10">

                    <input type="text" class="form-control" id="shouhuoren" name="shouhuoren" placeholder="收货人">
                    <span class="shr"></span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">收货地址 *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="shdizhi"  name="shdizhi"  placeholder="收货地址">
                    <span class="shdz"></span>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">邮编 *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="youbian" name="youbian" placeholder="邮编">
                    <span class="yb"></span>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">手机 *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="手机">
                    <span class="sj"></span>
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">固定电话</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="固定电话">
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

</div>
</body>

<script>
    $(function(){

        function noNull(e,l){
            e.blur(function(){
                if(!e.val()){
                    e.parent('div').children('span').text(l);
                }else{
                    $('.shr').text('');
                }

                if($('#shouhuoren').val()!="" && $('#shdizhi').val()!="" && $('#youbian').val()!="" && $('#mobile').val()!=""){
                    $('#btn').removeClass('disabled');
                }else{
                    $('#btn').addClass('disabled');
                }

            })
        }

        noNull($('#shouhuoren'),'收货人必须填写');
        noNull($('#shdizhi'),'收货地址必须填写');
        noNull($('#youbian'),'邮编必须填写');
        noNull($('#mobile'),'手机号码必须填写');


            $('#edit').submit(function(){

                if(!$('#shouhuoren').val()){
                $('.shr').text('收货人必须填写');
                    return false;
                }else{
                $('.shr').text('');
                }

                if(!$('#shdizhi').val()){
                    $('.shdz').text('收货地址必须填写');
                    return false;
                }else{
                    $('.shdz').text('');
                }

                if(!$('#youbian').val()){
                    $('.yb').text('邮编必须填写');
                    return false;
                }else{
                    $('.yb').text('');
                }

                if(!$('#mobile').val()){
                    $('.sj').text('手机号码必须填写');
                    return false;
                }else{
                    $('.sj').text('');
                }




        })
    })
</script>
</html>
