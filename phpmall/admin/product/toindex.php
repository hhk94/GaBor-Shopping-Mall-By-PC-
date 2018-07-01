
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
require_once "./../down/productType.class.php";


$id=$_GET['id'];




$ptype= new ProductType();


$_SESSION['file_info']=array();
//添加一些东西
$_SESSION['urlfile_info']=array();//保存url

$_SESSION['fileid']='';

$productID=time();
$productID.=rand(333,555)*1000;


$edit=new DbMysql();
$result=$edit->select("select * from mall_product where id = '$id'",1);

$title= $result['title'];
$productID=$result['numbers'];
$typeid=$result['typeid'];
$hot=$result['hot'];
$drops=$result['drops'];
$recommend=$result['recommend'];
$kucun=$result['kucun'];
$hits=$result['hits'];
$picurl=$result['pic'];
$content=$result['content'];
$picurls=$result['picurls'];
$ppid=$result['ppid'];
$yprice=$result['yprice'];
$price=$result['price'];
$shortShow=$result['shortShow'];
$tuijianword=$result['tuijianword'];
//echo $picurls;
$picurlArray=array_filter(explode("#",$picurls));

$style=$result['style'];
$toindex=$result['toindex'];

$menu=$ptype->floption(0,$typeid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../../css/inital.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/addChange.css">
    <script src="../../js/jquery.min.js"></script>
    <script src="../../ckeditor/ckeditor.js"></script>
    <script src="../swfupload/swfupload.js"></script>
    <script src="../swfupload/handlers.js"  charset="utf-8"  type="text/javascript"></script>
    <style>
        body{
            font-family:"微软雅黑"!important;}

    </style>
    <script type="text/javascript">
        var swfu;
        window.onload = function () {
            swfu = new SWFUpload({
                // Backend Settings
                upload_url: "uploadPics.php",
                post_params: {"PHPSESSID": "<?php echo session_id(); ?>"},

                // File Upload Settings
                file_size_limit : "6 MB",	// 2MB
                file_types : "*.jpg",
                file_types_description : "JPG Images",
                file_upload_limit : "0",

                // Event Handler Settings - these functions as defined in Handlers.js
                //  The handlers are not part of SWFUpload but are part of my website and control how
                //  my website reacts to the SWFUpload events.
                file_queue_error_handler : fileQueueError,
                file_dialog_complete_handler : fileDialogComplete,
                upload_progress_handler : uploadProgress,
                upload_error_handler : uploadError,
                upload_success_handler : uploadSuccess,
                upload_complete_handler : uploadComplete,

                // Button Settings
                button_image_url : "images/SmallSpyGlassWithTransperancy_17x18.png",
                button_placeholder_id : "spanButtonPlaceholder",
                button_width: 180,
                button_height: 18,
                button_text : '<span class="button">Select Images <span class="buttonSmall">(2 MB Max)</span></span>',
                button_text_style : '.button { font-family: Helvetica, Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
                button_text_top_padding: 0,
                button_text_left_padding: 18,
                button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
                button_cursor: SWFUpload.CURSOR.HAND,

                // Flash Settings
                flash_url : "../swfupload/swfupload.swf",

                custom_settings : {
                    upload_target : "divFileProgressContainer"
                },

                // Debug Settings
                debug: false
            });
        };
        function imgdel(pid)
        {
            // 移动到 thumbnails 容器下
            // altok _ pid
            // 移除
            var ydiv = document.getElementById('altok'+pid);
            document.getElementById("thumbnails").removeChild(ydiv);
            // 不光要移动视觉上的删除
            //还要删除session
            // 删除服务器上图片
            $.ajax({
                type:"post",
                url:"delimg.php?id="+pid
            });
        }
        function editimgdel(id){
            var ydiv=document.getElementById('editimg'+id);
            document.getElementById('editimg').removeChild(ydiv);
        }
    </script>
</head>
<style>
    .imgshow{
        float: left;
        border:1px solid #666;
        margin:5px 2px;
    }
</style>

<body>
<div class="logBackground">
    <div class="logTop">
        <h1>商品管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：修改商品 </h2>
    <h3>商品基本信息</h3>
    <form action="toindexDeal.php?id=<?php echo $id;?>" method="post" name="article" id="article" onsubmit="return test();">
        <div>
            <label for="numbers">商品编号: &nbsp;</label>
            <input type="text" name="numbers" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $productID;?>">

        </div>
        <div>
            <label for="title">商品名称: &nbsp;</label>
            <input type="text" name="title" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $title;?>">

        </div>


        <div>
            <label for="title">一句话标题: &nbsp;</label>
            <input type="text" name="tuijianword" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $tuijianword;?>">

        </div>



        <div>
            <label for="toindex">首页用途 ： &nbsp;</label>
            <input type="text" name="toindex" id="toindex" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $toindex;?>">
            <iframe src="upToIndex.php" frameborder="0" style="float: right;height: 28px;"></iframe>
            <br  style="clear: both">
        </div>










        <button class="btn btn-primary" type="submit">修改</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
<script>


</script>


</html>