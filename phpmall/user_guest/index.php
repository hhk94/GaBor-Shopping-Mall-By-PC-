<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/4
 * Time: 15:37
 */
require_once "../public/init.php";

$sql=" select * from mall_feedback ";
$parm=" where 1 ";

$parm.=" and issh = 1 ";
$sql.=$parm." order by id desc ";
$db->sql($sql);
$infocount=$db->affected();
$pagesize=5;
$page=new page($infocount,$pagesize);

$sql.=$page->limit();



$list=$db->select($sql);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言板 - <?php echo $webtitle;?></title>
    <link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
    <script src="<?php echo $webdir?>/js/jquery.min.js"></script>
<!--    <link rel="stylesheet" href="--><?php //echo $webdir?><!--/css/bootstrap.min.css">-->
</head>
<style>
    .guestHeader{
        margin-top:10px;
    }
    .guestHeader>a:hover{
        color: #008a9a;}
    .guestContainer{
        margin-top:10px!important;
        background: white;}
    .guestContainer>div{
        height: 100%;
        width: 640px;}
    .guestLeft{
        float: left;
        border-right:1px dashed #e0e0e0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;}
    .guestRight{
        float: right;
       }
    .guestLeft>h2{
        margin-bottom:15px;
        padding-top:10px;
        text-indent:20px;}
    .guestLeft>h3{
        text-align: center;
        font-size: 18px;
    }
    .guestContent{
        background: #F0F0F0;
        width: 80%;
        margin:5px 10% 5px 10%;
    }
    .guestContent>h3{
        padding-top:10px;
        text-indent:20px;
        font-size: 20px;}
    .guestContent>h3>span{
        padding-top:4px;
        margin-right:10px;
        font-size: 12px;
        float: right;}
    .guestContent>p{
        color: #010000;
        font-size: 14px;
        border-bottom:1px dashed white;
        padding-bottom:5px;
        width: 90%;margin:5px 5% 5px 5%;}
    .guestContent>.recontent{
        width: 84%;
        margin:5px 8% 5px 8%;
        font-size: 9px;
        color: #ff5900;}
    .guestType{
        margin-top:25px;
        /*width: 70%;*/
        /*margin:25px 25% 10px 5%;*/
        border-bottom:1px dashed #f0f0f0;
        padding-bottom:10px;
    }
    .guestType>input{
        margin-left:10px
    }
    .guestType>span{
        margin-left:10px;
        color: #ff5900;
        font-size: 20px;}

    .guestMessage>h2{
        margin-top:10px;
        margin-left:10px;
        color: #ff5900;
        font-size: 20px;}
    .guestMessage>h2>span{
        color: #666;}
    .guestMessage>textarea{
        width: 90%;
        height: 200px;
        margin:10px 5% 10px 5%;
        border:1px solid #e0e0e0;
        -webkit-border-radius:6px;
        -moz-border-radius:6px;
        border-radius:6px;
        font-size: 14px;
        resize:none;
    }

    .guestMessage>textarea{ outline:none; }
    .guestMessage>textarea:focus {
        outline:none;
        border:1px solid #ff5900;
    }
    .guestinput>h2{
        width: 90%;
        margin:10px 5% 10px 5%;
        font-size: 16px;
        color: #ff5900;}
    .guestinput>div{
        width: 80%;
        font-size: 18px;
        margin:10px auto;
    }
    .guestinput>div>input{
        border:1px solid #666;
        font-size: 18px;}
    .guestinput>div>span{
        font-size: 12px;
        color: #ff5900;
    }
    .submit{
        padding:10px 15px;
        background: #ff5900;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
        color: white;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        margin-left:50%;
        margin-bottom:15px;
    }
    .submit:hover{
        background: #ff59009e;
    }
</style>
<script>
    //刷新验证码
    function codeF(e) {
        $('#'+e).attr('src','../admin/down/code.php').show();
    }


</script>

<body style="background: #f0f0f0;">
<?php

include webdir."/include/header.php";
?>
<div class="container">
    <h2 class="guestHeader"><a href="">后盾网</a> >> <a href="">留言板</a></h2>
</div>
<div class="container guestContainer">
    <div class="guestLeft">
        <h2>常见问题</h2>

        <?php
        foreach ($list as $row){

        ?>
        <div class="guestContent">
            <h3><?php echo $row['usernameshow']?> <span>发表于 <?php echo date("Y-m-d H:i:s",$row['addtime'])?></span></h3>
            <p><?php echo $row['content']?></p>
            <p class="recontent"><span>客服回复：</span><br>
                <?php
                if($row['ishf']==0){
                    echo "请等待回复";
                }else{
                    echo $row['recontent'];
                }



                ?>
            </p>
        </div>

            <?php
        }
        ?>

        <h3>分页:<?php echo $page->show(1)?></h3>
    </div>
    <div class="guestRight">
        <form action="sava.php" id="guest" name="guest" method="post">
            <div class="guestType">
                <span>留言分类</span>
                <?php
                $type=$db->select(" select * from mall_feedbackType ");


                foreach ($type as $v){
                ?>
                    <input type="radio" name="typeid" value="<?php echo $v['id'];?>"><?php echo $v['typename'];?>

                <?php
                }
                ?>

<!--                <input type="radio">产品咨询-->
<!--                <input type="radio">活动咨询-->
<!--                <input type="radio">配送咨询-->
<!--                <input type="radio">支付咨询-->
<!--                <br>-->
<!--                <input type="radio">订单咨询-->
<!--                <input type="radio">售前咨询-->
            </div>

            <div class="guestMessage ">
                <h2>留言内容： <span>(300字以内)</span></h2>
                <textarea name="content" id="" ></textarea>
            </div>

            <div class="guestinput">
                <h2>温馨提醒：提交留言后可在页面底部区域通过留言时填写的手机号码、email等查询客服回复</h2>

                <div>留言人：&nbsp;&nbsp;&nbsp;
                    <input type="text" style="margin-left:7px"  name="usernameshow" id="usernameshow"></div>
                <div>手机号码：&nbsp;
                    <input type="text"  name="mobile" id="mobile"> <span>*</span>真实号码</div>
                <div>邮箱：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" style="margin-left:4px" name="email" id="email"></div>
                <div>验证码：&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" style="margin-left:2px" onfocus="codeF('regcode')" name="code" id="code">
                    <img src="" alt="" id="regcode" style="display: inline-block;;">
                    <span>为防止广告干扰您的留言，请输入验证码；</span>


                </div>

            </div>
            <button>3</button>
            <input type="submit" value="提交订单" class="submit">
        </form>
    </div>
    <br style="clear: both;">
</div>
<script>
    $('#guest').submit(function(){
        if(!$(':radio[name=typeid]:checked').length) {
            alert('请选择留言分类');
        }

        if($('#usernameshow').val()==""){

            $('#usernameshow').val("请填写您的姓名");
            $('#usernameshow').css({'color':'#ff5900'});
            return false;
        }
        if($('#mobile').val()==""){

            $('#mobile').val("请填写您的手机号");
            $('#mobile').css({'color':'#ff5900'});
            return false;
        }
        if($('#code').val()==""){

            $('#code').val("请填写验证码");
            $('#code').css({'color':'#ff5900'});
            return false;
        }


    })

</script>


<?php

include webdir."/include/footer.php";
?>

</body>
</html>
