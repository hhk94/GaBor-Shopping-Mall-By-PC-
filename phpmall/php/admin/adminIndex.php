<!DOCTYPE html>
<?php
include '../lgCheck.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>嘉宝橱柜后台管理</title>
    <link href="../css/table.css" rel="stylesheet"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../../js/jquery.min.js"></script>
    <script src="../js/closeLg.js"></script>
    <!--日历插件-->
    <script src="../js/laydate.dev.js"></script>
    <style>
body{
    background:rgb(79,164,223)}
a{
    color:rgb(79,164,223);
    text-decoration: none;}
.bodyinner{
    background:rgb(255,255,255)}
.bodyinner h4{
    color: black;}
        .selectCheck select{
            font-size:15px;
            height: 30px;}
        i{
            line-height:30px;
            font-style: normal;
            font-size: 25px;
            font-weight:bold;}
.bodyinner>h4:nth-of-type(2){
    font-size: 20px;}
        .wrap div{
            color: white;}
        .pageSelect span{
            color: black;}
        .pageSelect{
            color: #232dad;}
        .selectCheck div{
            font-size: 20px;}
        select{
            width: 200px;}
        .form-control{
            display: inline-block;
            width: 150px;
            height: 40px;
            line-height:40px;
        }
        .delete1{
            font-size: 20px;}
    </style>
</head>
<body>
<div class="bodyinner">

    <h2>嘉宝网络客户信息系统</h2>

    <!--显示用户名title部分-->
    <h4>
        当前ID：
        <span>
            <?php
            echo $_SESSION['uid'];
            echo $_SESSION['f_dealer'];
            ?>
        </span>
        用 户:
        <span>
            <?php
             $customer = $_SESSION['name'];
            echo  $customer;
            ?>
        </span>

        <a class="changePW" href='../changePW/changePW.php?id=<?php
        echo $_SESSION['uid'];?>'>修改密码</a>
        <span class="closeLg">退出系统</span>
    </h4>

    <form action="phonesearch.php" method="post" class="serarchForm">
        <input type="text" placehoder="电话号码" name="search_number">
        <input type="submit" value="搜索">
    </form>


    <!--高级筛选-->
    <?php
    $team = floor($_SESSION['uid']/10);
    include "../connectAdmin.php";


    //  初始化 sessionWord  判断是否为 翻页方式 重载  如果是 则 不重置 sessionWord值
    if( !$_SERVER["QUERY_STRING"] ){
        $_SESSION['timeStartWord'] = $_SESSION['timeEndWord'] = $_SESSION['f_teamWord'] = $_SESSION['f_customerWord'] = $_SESSION['f_statusWord'] = $_SESSION['f_fromWord'] = ' ';
    }





//  根据 登录的管理人员 权限等级
if( $_SESSION['power'] == 0){



    /*  高级选择  选中组 */

    if( @$_POST['F-team'] ){

        $_SESSION['f_team'] = $_POST['F-team'];

        // 若选空 team 值
        if($_POST['F-team'] == " " ){
            $_SESSION['f_teamWord'] = ' ';
            // 若选中 team 值
        }else{
            $_SESSION['f_teamWord'] = ' where team = "'.$_POST['F-team'].'"';
        }
    }


}else if( $_SESSION['power'] == 1 ){

    $_SESSION['f_teamWord'] = " where team = ".$team;

}else if( $_SESSION['power'] == 2 ){

    $_SESSION['f_customerWord'] = ' where customer = "'.$customer.'"';

}




    /*  高级选择  选中客服 */


if( $_SESSION['power'] == 0 ||  $_SESSION['power'] == 1 ) {
    if( @$_POST['F-customer'] ){

        $_SESSION['f_customer'] = $_POST['F-customer'];

        // 若选空 customer 值
        if($_POST['F-customer'] == " " ){
            $_SESSION['f_customerWord'] =  ' ';

            // 若选中 customer 值

        }else{

            // 若 前面 team 值为空
            if( @$_SESSION['f_teamWord'] == ' '){

                if( $_SESSION['power'] == 0 ){
                    $_SESSION['f_customerWord'] = ' where customer = "'.$_POST['F-customer'].'"';
                }else{
                    $_SESSION['f_customerWord'] = ' and customer = "'.$_POST['F-customer'].'"';
                };

                // 若 前面 team 值选中
            }else{
                $_SESSION['f_customerWord'] = ' and customer = "'.$_POST['F-customer'].'"';
            }

        }
    }

}



    /* 高级选择 选中客户状态 status*/
    if( @$_POST['F-status'] ){

        $_SESSION['f_status'] = @$_POST['F-status'];

        // 若 status 为空
        if( $_POST['F-status'] == " "){
            $_SESSION['f_statusWord'] = " ";

        // 若 status 选中值
        }else{

            // 若 team 与 customer 两个中任意一个不为空
            if( @$_SESSION['f_teamWord'] != ' ' || @$_SESSION['f_customerWord'] != ' '){

                $_SESSION['f_statusWord'] = ' and status = "'.$_SESSION['f_status'].'"';

            // 若 team 与 customer 两个都为空
            }else{

                $_SESSION['f_statusWord'] = ' where status = "'.$_SESSION['f_status'].'"';

            }
        }
    }




    /* 高级选择  选中来源渠道*/
    if( @$_POST['F-from'] ){
        $_SESSION['f_from'] = $_POST['F-from'];
        // 若 from 选中为空
        if( $_POST['F-from'] == " "){
            $_SESSION['f_fromWord'] = ' ';

        // 若 from 选择值
        }else{
            // 若前面 team / customer / status 中 任意一个不为空
            if( @$_SESSION['f_teamWord'] != ' ' || @$_SESSION['f_customerWord'] != ' ' || @$_SESSION['f_statusWord'] != ' '){

                $_SESSION['f_fromWord'] = ' and infoFrom = "'.$_SESSION['f_from'].'"';

            //  若前面 team / customer / status 全部都为空
            }else{
                $_SESSION['f_fromWord'] = ' where infoFrom = "'.$_SESSION['f_from'].'"';
            }
        }
    }

    /* 高级选择 选中起 - 止时间*/
    if(@$_POST['timeStart'] || @$_POST['timeEnd']){
        $_SESSION['timeStart'] = @$_POST['timeStart'];
        $_SESSION['timeEnd'] = @$_POST['timeEnd'];

        // 若选择时间为空
        if ( $_SESSION['timeStart'] == " " || $_SESSION['timeEnd'] == " " ){
            $_SESSION['timeStartWord'] =  $_SESSION['timeEndWord'] = " ";

        // 若有选择时间
        }else{
            // 若前面 team / customer / status / from 中全部为空
            if( $_SESSION['f_teamWord'] == ' ' && $_SESSION['f_customerWord'] == ' ' && $_SESSION['f_statusWord'] == ' ' && $_SESSION['f_fromWord'] == " " ){

//                $_SESSION['timeStartWord'] = ' where time between "'.$_SESSION['timeStart'].'"';
                $_SESSION['timeStartWord'] = ' and time between "'.$_SESSION['timeStart'].'"';
            }else{
                $_SESSION['timeStartWord'] = ' and time between "'.$_SESSION['timeStart'].'"';
            }

            $_SESSION['timeEndWord'] = ' and "'.$_SESSION['timeEnd'].' 23:59:59"';

        }
    }

    /* 高级选择 选中客户到店情况*/
    if(@$_POST['F-arrive']){
        $_SESSION['f_arrive'] = $_POST['F-arrive'];

        // 若到店情况放 空
        if( $_POST['F-arrive'] == " "){
            $_SESSION['f_arriveWord'] = " ";

            // 若选中 到店情况
        }else{
            // 若其他筛选条件 team / customer / status / from / timeEnd 全部为空
            if( $_SESSION['f_teamWord'] == ' ' &&
                $_SESSION['f_customerWord'] == ' ' &&
                $_SESSION['f_statusWord'] == ' ' &&
                $_SESSION['f_fromWord'] == " " &&
                $_SESSION['timeEndWord'] == ' ')
            {

                $_SESSION['f_arriveWord'] = ' where arrive ="'.$_SESSION['f_arrive'].'"';
            }else{
                $_SESSION['f_arriveWord'] = ' and arrive ="'.$_SESSION['f_arrive'].'"';
            }

        }
    }

    /* 高级选择 选中客户咨询内容*/
    if(@$_POST['F-consult']){
        $_SESSION['f_consult'] = $_POST['F-consult'];

        // 若客户咨询内容 放 空
        if( $_POST['F-consult'] == " "){
            $_SESSION['f_consultWord'] = " ";

        // 若客户咨询内容选中
        }else{
            // 若其他筛选条件 team / customer / status / from / timeEnd / arrive 全部为空
            if( $_SESSION['f_teamWord'] == ' ' &&
                $_SESSION['f_customerWord'] == ' ' &&
                $_SESSION['f_statusWord'] == ' ' &&
                $_SESSION['f_fromWord'] == " " &&
                $_SESSION['timeEndWord'] == ' ' &&
                $_SESSION['f_arriveWord'] == ' '
            )
            {
                $_SESSION['f_consultWord'] = ' where consult = "'.$_SESSION['f_consult'].'"';

            }else{
                $_SESSION['f_consultWord'] = ' and consult = "'.$_SESSION['f_consult'].'"';
            }
        }
    }


    /* 高级选择 选中查选经销商*/
    if(@$_POST['F-dealer']){
        $_SESSION['f_dealer'] = $_POST['F-dealer'];

        // 若选择经销商放 空
        if( $_POST['F-dealer'] == " "){
            $_SESSION['f_dealerWord'] = ' ';

        // 若选中 外地信息总揽
        } else if( $_POST['F-dealer'] == '301' ){

            // 若其他筛选条件 team / customer / status / from / timeEnd / arrive /  consult 全部为空
            if( $_SESSION['f_teamWord'] == ' ' &&
                $_SESSION['f_customerWord'] == ' ' &&
                $_SESSION['f_statusWord'] == ' ' &&
                $_SESSION['f_fromWord'] == " " &&
                $_SESSION['timeEndWord'] == ' ' &&
                $_SESSION['f_arriveWord'] == ' ' &&
                $_SESSION['f_consultWord'] == ' '
            ){
                $_SESSION['f_dealerWord'] = ' where dealer between 310 and 1600';
            }else{
                $_SESSION['f_dealerWord'] = ' and dealer between 310 and 1600';
            }
        }else{

            // 若其他筛选条件 team / customer / status / from / timeEnd / arrive /  consult 全部为空
            if( $_SESSION['f_teamWord'] == ' ' &&
                $_SESSION['f_customerWord'] == ' ' &&
                $_SESSION['f_statusWord'] == ' ' &&
                $_SESSION['f_fromWord'] == " " &&
                $_SESSION['timeEndWord'] == ' ' &&
                $_SESSION['f_arriveWord'] == ' ' &&
                $_SESSION['f_consultWord'] == ' '
            ){
                $_SESSION['f_dealerWord'] = ' where dealer = "'.$_SESSION['f_dealer'].'"';
            }else{
                $_SESSION['f_dealerWord'] = ' and dealer = "'.$_SESSION['f_dealer'].'"';
            }
        }
    }





    if( $_SESSION['uid'] < 3000){
        echo "
        <form class=\"selectCheck\" style=\"height:130px; border:1px #eee solid;\" action=\"adminIndex.php\" method=\"post\">
        <div>
            开始日期：<input type=\"text\" name='timeStart' id=\"J-xl\">
            结束日期：<input type=\"text\" name='timeEnd' id=\"J-xl-3\">
            <span class='timeErr' style='color:red; visibility:hidden;'>时间段选择错误！！</span>
        </div>
        <br/> 
        <div>
            到店状态:
                <select class='selectArrive form-control' name='F-arrive' style='margin-right:80px;'>
                    <option value=' '>[不指定状态]</option>
                    <option value='未到'>未到</option>
                    <option value='已到店'>已到店</option>
                </select>
            
            咨询内容：
                <select class='selectConsult form-control' name='F-consult'>
                    <option value=' '>[不指定内容]</option>
                    <option value='橱柜'>橱柜</option>
                    <option value='衣柜集成'>衣柜集成</option>
                    <option value='橱柜衣柜集成'>橱柜衣柜集成</option>
                </select>
                
                
            经销商选择：
                <select class='selectDealer form-control' name='F-dealer'>
                    <option value=' '>全部信息(长沙+外地)</option>
                   
                    <option value='100'>[未分配]</option>
                    <option value='300'>[长沙]</option>
                    <option value='301'>[外地信息]</option>
                    <option value='' style='color:lightskyblue'>--岳阳区域--</option>    
                    <option value='320'>岳阳旗舰店</option>
                    <option value='330'>湘阴旗舰店——刘博</option>
                    <option value='340'>平江旗舰店——钟丽</option>                                                                        <option value='350'>华容旗舰店——李爱国</option>  
                    <option value='' style='color:lightskyblue'>--益阳区域--</option>            
                    <option value='400'>益阳旗舰店——邓文峰</option>
                    <option value='410'>桃江旗舰店——蔡浩</option>
                    <option value='' style='color:lightskyblue'>--常德区域--</option> 
                    <option value='420'>常德旗舰店——王娇君</option>
                    <option value='430'>汉寿旗舰店——邹继华	</option>
                    <option value='440'>石门旗舰店——杨子浔</option>
                    <option value='450'>临澧旗舰店——刘涛</option>
                    <option value='' style='color:lightskyblue'>--株洲区域--</option> 
                    <option value='500'>株洲旗舰店——谭振民</option>
                    <option value='510'>醴陵旗舰店——文万尧</option>
                    <option value='520'>茶陵旗舰店——段斯齐</option>
                    <option value='' style='color:lightskyblue'>--邵阳区域--</option> 
                    <option value='600'>邵阳旗舰店——欧阳刚健</option>
                    <option value='610'>武冈旗舰店——曾钦</option>
                    <option value='620'>邵东旗舰店——姚璐</option>
                    <option value='' style='color:lightskyblue'>--娄底区域--</option> 
                    <option value='700'>娄底旗舰店——张期</option>
                    <option value='710'>双峰旗舰店——戴红梅</option>
                    <option value='' style='color:lightskyblue'>--长沙区域--</option> 
                    <option value='800'>望城旗舰店——蒋开旺</option>
                    <option value='810'>宁乡旗舰店——彭俊峰</option>
                    <option value='820'>浏阳旗舰店——唐利清</option>
                    <option value='' style='color:lightskyblue'>--湘潭区域--</option> 
                    <option value='900'>湘潭旗舰店——高峰</option>
                    <option value='910'>湘乡旗舰店——彭淑芳</option>
                    <option value='' style='color:lightskyblue'>--永州区域--</option> 
                    <option value='1000'>永州旗舰店——杜爱民</option>
                    <option value='1010'>新田旗舰店——龙上辉</option>
                    <option value='1020'>祁阳旗舰店——唐玲</option>
                    <option value='' style='color:lightskyblue'>--郴州区域--</option> 
                    <option value='1110'>宜章旗舰店——黄增才</option>
                    <option value='1120'>安仁旗舰店——凡征北</option>
                    <option value='1130'>临武旗舰店——易岳云</option>
                    <option value='1140'>汝城旗舰店——周远雄</option>
                    <option value='1150'>桂阳旗舰店——陈庆中</option>
                    <option value='1160'>嘉禾旗舰店——曾启轩</option>
                    <option value='' style='color:lightskyblue'>--衡阳区域--</option> 
                    <option value='1200'>衡阳旗舰店——张检平</option>
                    <option value='1210'>祁东旗舰店——彭俊奇</option>
                    <option value='1220'>衡东旗舰店——曾聪聪</option>
                    <option value='1230'>常宁旗舰店——刘希龙</option>
                    <option value='' style='color:lightskyblue'>--怀化区域--</option> 
                    <option value='1300'>沅陵旗舰店——宋强</option>
                    <option value='1310'>辰溪旗舰店——杜志军</option>
                    <option value='1320'>麻阳旗舰店——张籍尹</option>
                    <option value='1330'>通道旗舰店——朱彦鸿</option>
                    <option value='1340'>靖州旗舰店——丁豪</option>
                    <option value='1350'>洪江旗舰店——陈小桃</option>
                    <option value='1360'>怀化旗舰店</option>
                    <option value='' style='color:lightskyblue'>--吉首区域--</option> 
                    <option value='1400'>吉首旗舰店——田云</option>
                    <option value='1410'>保靖旗舰店——黄珍</option>
                    <option value='1420'>古丈旗舰店——饶佳</option>
                    <option value='1430'>龙山旗舰店——罗亚琼</option>
                    <option value='' style='color:lightskyblue'>--其他区域--</option> 
                    <option value='1500'>张家界旗舰店——李琅</option>
                    <option value='1600'>成都旗舰店——李清萍</option>
                   

                </select>
        </div>
        <br/>";


        if( $_SESSION['uid'] < 1000 ){
            echo "
        <i>组别</i>
        <select class=\"selectTeam form-control\" name=\"F-team\">
            <option value=\" \">[不指定组]</option>
            <option value=\"100\">肖右生组</option>
            <option value=\"200\">夏阳组</option>
        </select>";
        }else if ($_SESSION['uid'] == 1000 ){
            echo "<i>组别</i>
            <select class=\"selectTeam\" name=\"F-team\">
               
                <option value=\"100\">肖右生组</option>
              
            </select>";
        }else if ( $_SESSION['uid'] == 2000){
            echo "<i>组别</i>
            <select class=\"selectTeam form-control\" name=\"F-team\">
            
                <option value=\"200\">夏阳组</option>
              
            </select>";
        }
        echo " <i>客服</i>
        <select class=\"selectCustomer form-control\" name=\"F-customer\">
            <option value=\" \">[不指定客服]</option>
        </select>


        <i>状态</i>

        <select class=\"selectStatus form-control\" name=\"F-status\">
            <option value=\" \">[不指定状态]</option>
            <option value=\"1\">待跟进..</option>
            <option value=\"2\">跟进中..</option>
            <option value=\"3\">已订单..</option>
            <option value=\"4\">客户流失</option>
            <option value=\"5\">已上门</option>

        </select>

        <i>来源</i>
        <select class=\"selectFrom form-control\" name=\"F-from\">
            <option value=\" \">[不指定来源]</option>
            <option value=\"官网\">官网</option>
            <option value=\"天猫\">天猫</option>
            <option value=\"淘宝\">淘宝</option>
            <option value=\"京东\">京东</option>
            <option value=\"400电话\">400电话</option>
            <option value=\"其他\">其他</option>
        </select>

        <input type=\"submit\" value=\"查询\" class='btn btn-primary'/>

        <input type=\"button\" class=\"clearSelect btn btn-primary\" style=\"display:inline-block; width:120px; float:right; margin-right:20px;\" value=\"清空查询条件\"/>
    </form>


    <!--高级查询, select框 前端JS 控制-->
    <script src=\"../js/selectCheck.js\"></script>";

    }else{
        echo "<form class=\"selectCheck\" style=\"height:130px; border:1px #eee solid;\" action=\"adminIndex.php\" method=\"post\">
        <div>
            开始日期：<input type=\"text\" name='timeStart' id=\"J-xl\">
            结束日期：<input type=\"text\" name='timeEnd' id=\"J-xl-3\">
            <span class='timeErr' style='color:red; visibility:hidden;'>时间段选择错误！！</span>
        </div>
        <br/> <input type=\"submit\" value=\"查询\" class='btn btn-primary'/></form>
        <!--高级查询, select框 前端JS 控制-->
    <script src=\" ../js /selectCheck.js\"></script>\";";
    }






    ?>
    <!-- 根据登录的不同权限用户 加载显示不同的客户信息列表-->
    <h4>
        客户信息列表

    <?php

    //  根据管理人员ID 是否赋予 [添加用户] 权限
    include '../poweLv/addInfoButton.php';
    //  根据登录角色不同加载不同数据
    include 'loadDataList.php';
    ?>

    </h4>






    <?php
    echo "
    <div class=\"pageSelect\">
        客户信息总条数
            <span>
            $num_rows
            </span>
        当前显示
        <span>
        第  $startPageA 条 至 $endPage 条
        </span>
        页面
        <span>
             $nowPages
        
        /
     
            $pageTotle 
        </span>
        <a href=\"";
    include "../urlTransf.php";
    echo "adminindex.php\" class='changePage first'>首页</a>
        <a href=\"";
    include "../urlTransf.php";
    echo "adminindex.php?page={$prePages}\" class='changePage prePage'>上一页</a>
        <a href=\"";
    include "../urlTransf.php";
    echo "adminindex.php?page={$nextPages}\" class='changePage nextPage'>下一页</a>
    
    <a href=\"";
    include "../urlTransf.php";
    echo "adminindex.php?page={$pageTotle}\" class='changePage nextPage'>尾页</a>
    </div>";


    while ($data = mysqli_fetch_assoc($query)){

        $team = $data['team'];

        echo "<div class=\"wrap\">
        <div class=\"item\">
            <div class=\"title\">
                编号：<span class=\"number\">$data[id]</span>
                <span class=\"date\">星期$data[week]</span>
                时间：<span class=\"time\">$data[time]</span>
                
                到店情况: <span style='color:#1dbcf7'>$data[arrive]</span>
                状态：<span class=\"orno$data[status]\" data-color=$data[status]></span>
                
                   
       <a class='delete1' href='../updata/delete.php?id=$data[id]'>删除</a>             
                ";

               switch ($data[status]){
                   case 1:
                       echo "<span>待跟进..</span>";
                       break;
                   case 2:
                       echo "<span>跟进中..</span>";
                       break;
                   case 3:
                       echo "<span>已订单..</span>";
                       break;
                   case 4:
                       echo "<span>客户流失</span>";
                       break;
                   case 5:
                       echo "<span>已上门..</span>";
                       break;
               }

    include "../poweLv/changeInfoButton.php";
        $urlencodename = urlencode($data['name']);

    //  根据管理人员ID 是否赋予 [备注] 权限
    include '../poweLv/commentButton.php';

    $statusNote = Array('', '未跟进', '跟进中', '已成单', '客户流失');
    echo $statusNote[$data['status']];

    $commentNew = stripos($data['comment'],'<hr/>');
    $commentNew2 = substr($data['comment'],0,$commentNew);
    if($commentNew2 == ''){
        $commentNew2 = '[暂无备注]';
    }

//        <div>
//        所在城市 : <span class=\"city\">$data[location]</span>
//            </div>


    echo "</div>
        </div>
        <div class=\"info hiddeInfo\">
            <div>
                客户姓名：<span class=\"name\">$data[name]</span>
               &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;最后修改时间:<span class=\"time\">$data[lasttime]</span>
            </div>
            <div>
                信息来源：<span class=\"infoFrom\">$data[infoFrom]</span>
                <span>责任客服:$data[customer]</span>
            </div>
            <div>
                手机号码 : <span class=\"phone\">$data[phone]</span>
            </div>

            <div>
                责任客服: <span class=\"name\">$data[customer]</span>
            </div>
            
            
            
            
            <div>
                所属团队: ";
                //  根据 工作人员ID值范围 转换成对应中文的 组别
                include '../teamTransform/teamTs.php';
        echo "   
            </div>
            
            <div>
                咨询内容：<span class=\"weico\">$data[consult]</span>
            </div>
            <div>
                楼盘名称：<span class=\"house\">$data[house]</span>
            </div>
            <div>
                IP地址：<span class=\"IP\">$data[IP]</span>
            </div>
            <div>
                跟进导购/经销商客服：<span class=\"guide\">$data[guide]</span>
            </div>
            <i class=\"clearFl\"></i>
        </div>
        <div class=\"from hiddeInfo2\">
            <div>
                访问网页地址：
                <span class=\"href\">
                    <a href='$data[href]'>$data[href]</a>
                </span>
            </div>
        </div>
        <div class='comment'>
            
                最新备注 : $commentNew2
                <i class='clearFl'></i>
        </div>
    </div>";
    }

    ?>

    <?php
    echo "
    <div class=\"pageSelect\">
        客户信息总条数
            <span>
            $num_rows
            </span>
        当前显示
        <span>
        第  $startPageA 条 至 $endPage 条
        </span>
        页面
        <span>
             $nowPages
        
        /
     
            $pageTotle 
        </span>
        <a href=\"";
    include "../urlTransf.php";
    echo "adminindex.php\" class='changePage first'>首页</a>
        <a href=\"";
    include "../urlTransf.php";
    echo "adminindex.php?page={$prePages}\" class='changePage prePage'>上一页</a>
        <a href=\"";
    include "../urlTransf.php";
    echo "adminindex.php?page={$nextPages}\" class='changePage nextPage'>下一页</a>
    
    <a href=\"";
    include "../urlTransf.php";
    echo "adminindex.php?page={$pageTotle}\" class='changePage nextPage'>尾页</a>
    </div>";



    ?>
    <div>

        <input type="text" class="yemian" id="yemian">
        <button class="tiaozhuan">跳转</button>


    </div>


</div>



<script>

  $('.tiaozhuan').click(function(){
      var num=$('#yemian').val();
        if(num><?php echo $pageTotle;?>){
            alert('请核查跳转页面');
            event.stopPropagation();
        }else{
            window.location.href="adminindex.php?page="+num+" ";
        }



  })

</script>



</body>

<!--页面(数据)加载完毕后 根据是否存在data-dealer值 中文显示经销商名称 -->
<script src="../js/dealer.js"></script>
<script src="../js/hiddenInfo.js"></script>
<!--日历插件运行-->
<script type="text/javascript">
    laydate({

        elem: '#J-xl'

    });
    laydate({

        elem: '#J-xl-3'

    });

</script>
</html>
