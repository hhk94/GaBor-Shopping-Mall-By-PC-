
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

$db=new DbMysql();
$_SESSION['file_info']=array();
//添加一些东西
$_SESSION['urlfile_info']=array();//保存url

$_SESSION['fileid']='';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../../css/inital.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../product/css/addChange.css">
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

    <h2>当前位置 ：添加新设计师</h2>
    <h3>商品基本信息</h3>
    <form action="./designAddDeal.php" method="post" name="article" id="article" onsubmit="return test();">
        <div>
            <label for="name">设计师姓名: &nbsp;</label>
            <input type="text" name="name" style="border: 1px solid rgba(86,61,124,.6);" value="">

        </div>
        <div>
            <label for="zhiwei">职位: &nbsp;</label>
            <input type="text" name="zhiwei" style="border: 1px solid rgba(86,61,124,.6);" >

        </div>

        <div>
            <label for="style">设计风格: &nbsp;</label>
            <input type="text" name="style" style="border: 1px solid rgba(86,61,124,.6);" >

        </div>


        <div>
            <label for="wtime">工作时间: &nbsp;</label>
            <input type="text" name="wtime" style="border: 1px solid rgba(86,61,124,.6);" >

        </div>
        <div>
            <label for="school">毕业学校: &nbsp;</label>
            <input type="text" name="school" style="border: 1px solid rgba(86,61,124,.6);" >

        </div>


        <div>
            <label for="idea">设计理念: &nbsp;</label>
            <input type="text" name="idea" style="border: 1px solid rgba(86,61,124,.6);" >

        </div>




        <div>
            <label for="fenlei">设计分类: &nbsp;</label>
            <select name="fenlei" id=""  style="border: 1px solid rgba(86,61,124,.6);width: 218.89px;">
                <option value=''>请选择分类</option>
                <?php
                $sql="select * from mall_designfenlei ";
                $result=$db->select($sql);
                foreach ($result as $row){

                    echo "<option value='{$row['id']}'>{$row['fenleiname']}</option>";
                }

                ?>

            </select>

        </div>




        <div>
            <label for="touxiang">头像 ： &nbsp;</label>
            <input type="text" name="touxiang" id="picurl" style="border: 1px solid rgba(86,61,124,.6);" >
            <iframe src="upload.php" frameborder="0" style="float: right;height: 28px;"></iframe>
            <br  style="clear: both">
        </div>

        <div>
            <label for="logoUrl">作品图集：</label>
            <?php
            if( !function_exists("imagecopyresampled") ){
                ?>
                <div class="message">
                    <h4><strong>Error:</strong> </h4>
                    <p>Application Demo requires GD Library to be installed on your system.</p>
                    <p>Usually you only have to uncomment <code>;extension=php_gd2.dll</code> by removing the semicolon <code>extension=php_gd2.dll</code> and making sure your extension_dir is pointing in the right place. <code>extension_dir = "c:\php\extensions"</code> in your php.ini file. For further reading please consult the <a href="http://ca3.php.net/manual/en/image.setup.php">PHP manual</a></p>
                </div>
                <?php
            } else {
                ?>

                <div style="display: inline; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;">
                    <span id="spanButtonPlaceholder"></span>
                </div>

                <?php
            }
            ?>
            <div id="divFileProgressContainer" style="height: 75px;"></div>
            <div id="thumbnails" style="overflow: hidden;">

            </div>


        </div>





        <button class="btn btn-primary" type="submit">添加</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
<script>


</script>
<script>

</script>

</html>