 <!DOCTYPE html>
<?php
include "../lgCheck.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../css/table.css" rel="stylesheet"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../../js/jquery.min.js"></script>
    <style>
        input[readonly]{  background:#777; padding:0; border:0;
            color: black;
            }
        select{
            color: black;}
        body{
            background:rgb(79,164,223)}
        .info div{
            color: white}
        .info div input{
            color: black;}
    </style>
</head>
<body>
<h2>修改客户信息</h2>
<?php
$id =  $_GET['id'];
include '../connectAdmin.php';
$query = mysqli_query($con,"select * from user where id = $id");
$data = mysqli_fetch_assoc($query);
$team = $data['team'];
echo "<form class=\"wrap\" action='updataSend.php' method='post'>
        <div class=\"item\">
            <div class=\"title\">
                编号：<input class=\"number \" type='text' name='id' value='$data[id]' readonly>
                星期：<span class=\"date\">$data[week]</span>
                时间：<span class=\"time\">$data[time]</span>
                状态：<span class=\"orno$data[status]\"></span>
                    <select name='status'>
                        <option value='1'>待跟进..</option>
                        <option value='2'>跟进中..</option>
                        <option value='3'>已订单..</option>
                        <option value='4'>客户流失</option>
                        <option value='5'>已上门</option>
                    </select>
                    <!--引入 JS 控制状态灯颜色 -->
                    <script src='../js/changeStatus.js'></script>
                    <span style='margin:0 0 0 30px;'>指定经销商:</span>";?>
<?php //if($_SESSION['uid'] > 3000){ echo "disabled=\"disabled\"";}?>
                    <select class="dealerList" name="dealer">
                        <option value="" <?php if($data['dealer'] == null){ echo 'selected="selected"';}?>>	--未选定--</option>

                        <option value="100" <?php if($data['dealer'] == 100){ echo 'selected="selected"';}?>>	未分配	</option>
                        <option value="300" <?php if($data['dealer'] == 300){ echo 'selected="selected"';}?>>	长沙	</option>
                        <option value='' style='color:lightskyblue'>--岳阳区域--</option>
                        <option value='320' <?php if($data['dealer'] == 320){ echo 'selected="selected"';}?>>岳阳旗舰店——杜治文</option>
                        <option value='330' <?php if($data['dealer'] == 330){ echo 'selected="selected"';}?>>湘阴旗舰店——刘博</option>
                        <option value='340' <?php if($data['dealer'] == 340){ echo 'selected="selected"';}?>>平江旗舰店——钟丽</option>                                                                      <option value='350' <?php if($data['dealer'] == 350){ echo 'selected="selected"';}?>>华容旗舰店——李爱国</option>
                        <option value='' style='color:lightskyblue'>--益阳区域--</option>
                        <option value='400' <?php if($data['dealer'] == 400){ echo 'selected="selected"';}?>>益阳旗舰店——邓文峰</option>
                        <option value='410' <?php if($data['dealer'] == 410){ echo 'selected="selected"';}?>>桃江旗舰店——蔡浩</option>
                        <option value='' style='color:lightskyblue'>--常德区域--</option>
                        <option value='420' <?php if($data['dealer'] == 420){ echo 'selected="selected"';}?>>常德旗舰店——王娇君</option>
                        <option value='430' <?php if($data['dealer'] == 430){ echo 'selected="selected"';}?>>汉寿旗舰店——邹继华	</option>
                        <option value='440' <?php if($data['dealer'] == 440){ echo 'selected="selected"';}?>>石门旗舰店——杨子浔</option>
                        <option value='450' <?php if($data['dealer'] == 450){ echo 'selected="selected"';}?>>临澧旗舰店——刘涛</option>
                        <option value='' style='color:lightskyblue'>--株洲区域--</option>
                        <option value='500' <?php if($data['dealer'] == 500){ echo 'selected="selected"';}?>>株洲旗舰店——谭振民</option>
                        <option value='510' <?php if($data['dealer'] == 510){ echo 'selected="selected"';}?>>醴陵旗舰店——文万尧</option>
                        <option value='520' <?php if($data['dealer'] == 520){ echo 'selected="selected"';}?>>茶陵旗舰店——段斯齐</option>
                        <option value='' style='color:lightskyblue'>--邵阳区域--</option>
                        <option value='600' <?php if($data['dealer'] == 600){ echo 'selected="selected"';}?>>邵阳旗舰店——欧阳刚健</option>
                        <option value='610' <?php if($data['dealer'] == 610){ echo 'selected="selected"';}?>>武冈旗舰店——曾钦</option>
                        <option value='620' <?php if($data['dealer'] == 620){ echo 'selected="selected"';}?>>邵东旗舰店——姚璐</option>
                        <option value='' style='color:lightskyblue'>--娄底区域--</option>
                        <option value='700' <?php if($data['dealer'] == 700){ echo 'selected="selected"';}?>>娄底旗舰店——张期</option>
                        <option value='710' <?php if($data['dealer'] ==710){ echo 'selected="selected"';}?>>双峰旗舰店——戴红梅</option>
                        <option value='' style='color:lightskyblue'>--望城区域--</option>
                        <option value='800' <?php if($data['dealer'] == 800){ echo 'selected="selected"';}?>>望城旗舰店——蒋开旺</option>
                        <option value='810' <?php if($data['dealer'] == 810){ echo 'selected="selected"';}?>>宁乡旗舰店——彭俊峰</option>
                        <option value='820' <?php if($data['dealer'] == 820){ echo 'selected="selected"';}?>>浏阳旗舰店——唐利清</option>
                        <option value='' style='color:lightskyblue'>--湘潭区域--</option>
                        <option value='900' <?php if($data['dealer'] == 900){ echo 'selected="selected"';}?>>湘潭旗舰店——高峰</option>
                        <option value='910' <?php if($data['dealer'] == 910){ echo 'selected="selected"';}?>>湘乡旗舰店——彭淑芳</option>
                        <option value='' style='color:lightskyblue'>--永州区域--</option>
                        <option value='1000' <?php if($data['dealer'] ==1000){ echo 'selected="selected"';}?>>永州旗舰店——杜爱民</option>
                        <option value='1010' <?php if($data['dealer'] == 1010){ echo 'selected="selected"';}?>>新田旗舰店——龙上辉</option>
                        <option value='1020' <?php if($data['dealer'] == 1020){ echo 'selected="selected"';}?>>祁阳旗舰店——唐玲</option>
                        <option value='' style='color:lightskyblue'>--郴州区域--</option>
                        <option value='1110' <?php if($data['dealer'] == 1110){ echo 'selected="selected"';}?>>宜章旗舰店——黄增才</option>
                        <option value='1120' <?php if($data['dealer'] == 1120){ echo 'selected="selected"';}?>>安仁旗舰店——凡征北</option>
                        <option value='1130' <?php if($data['dealer'] == 1130){ echo 'selected="selected"';}?>>临武旗舰店——易岳云</option>
                        <option value='1140' <?php if($data['dealer'] == 1140){ echo 'selected="selected"';}?>>汝城旗舰店——周远雄</option>
                        <option value='1150' <?php if($data['dealer'] == 1150){ echo 'selected="selected"';}?>>桂阳旗舰店——陈庆中</option>
                        <option value='1160' <?php if($data['dealer'] == 1160){ echo 'selected="selected"';}?>>嘉禾旗舰店——曾启轩</option>
                        <option value='' style='color:lightskyblue'>--衡阳区域--</option>
                        <option value='1200' <?php if($data['dealer'] == 1200){ echo 'selected="selected"';}?>>衡阳旗舰店——张检平</option>
                        <option value='1210' <?php if($data['dealer'] == 1210){ echo 'selected="selected"';}?>>祁东旗舰店——彭俊奇</option>
                        <option value='1220' <?php if($data['dealer'] == 1220){ echo 'selected="selected"';}?>>衡东旗舰店——曾聪聪</option>
                        <option value='1230' <?php if($data['dealer'] == 1230){ echo 'selected="selected"';}?>>常宁旗舰店——刘希龙</option>
                        <option value='' style='color:lightskyblue'>--怀化区域--</option>
                        <option value='1300' <?php if($data['dealer'] == 1300){ echo 'selected="selected"';}?>>沅陵旗舰店——宋强</option>
                        <option value='1310' <?php if($data['dealer'] == 1310){ echo 'selected="selected"';}?>>辰溪旗舰店——杜志军</option>
                        <option value='1320' <?php if($data['dealer'] == 1320){ echo 'selected="selected"';}?>>麻阳旗舰店——张籍尹</option>
                        <option value='1330'  <?php if($data['dealer'] == 1330){ echo 'selected="selected"';}?>>通道旗舰店——朱彦鸿</option>
                        <option value='1340'  <?php if($data['dealer'] == 1340){ echo 'selected="selected"';}?>>靖州旗舰店——丁豪</option>
                        <option value='1350'  <?php if($data['dealer'] == 1350){ echo 'selected="selected"';}?>>洪江旗舰店——陈小桃</option>
                        <option value='1360'  <?php if($data['dealer'] == 1360){ echo 'selected="selected"';}?>>怀化旗舰店</option>
                        <option value='' style='color:lightskyblue'>--吉首区域--</option>
                        <option value='1400' <?php if($data['dealer'] == 1400){ echo 'selected="selected"';}?>>吉首旗舰店——田云</option>
                        <option value='1410' <?php if($data['dealer'] == 1410){ echo 'selected="selected"';}?>>保靖旗舰店——黄珍</option>
                        <option value='1420' <?php if($data['dealer'] == 1420){ echo 'selected="selected"';}?>>古丈旗舰店——饶佳</option>
                        <option value='1430' <?php if($data['dealer'] == 1430){ echo 'selected="selected"';}?>>龙山旗舰店——罗亚琼</option>
                        <option value='' style='color:lightskyblue'>--其他区域--</option>
                        <option value='1500' <?php if($data['dealer'] == 1500){ echo 'selected="selected"';}?>>张家界旗舰店——李琅</option>
                        <option value='1600' <?php if($data['dealer'] == 1600){ echo 'selected="selected"';}?>>成都旗舰店——李清萍</option>






                    </select>
<?php
echo
 "                <!--若经销商进入修改页面, 则 select 框仅显示选中的 option-->
                <script>
                    $(function(){
                        var oPtion = $('.dealerList option');
                
                        for(var i=0; i< oPtion.length; i++){
                            
                            if(oPtion.eq(i).val() != $data[dealer] && $data[dealer] != 300){
                                oPtion.eq(i).remove();
                            }
                        }
                
                    })
                </script>

                <a href='../admin/adminIndex.php' style='float:right;'>返回首页</a>
                <a href='javascript:window.history.go(-1)' style='float:right;'>返回上一级</a>
            </div>
        </div>

        <div class=\"info\">
        
            <div>
            <!--<input type='text' name='name' value=''/>-->
                信息渠道：
                <span class=\"infoFrom\">
                    <label>
                        <input type='radio' name='from' value='官网'/>官网
                    </label>
                    <label>
                        <input type='radio' name='from' value='天猫'/>天猫
                    </label>
                    <label>
                        <input type='radio' name='from' value='淘宝'/>淘宝
                    </label>
                    <label>
                        <input type='radio' name='from' value='京东'/>京东
                    </label>
                    <label>
                        <input type='radio' name='from' value='400电话'/>400电话
                    </label>
                    <label>
                        <input type='radio' name='from' value='其他'/>其他
                    </label>                
                </span>

            <script>
            /*JS 控制信息来源 checked*/
                function checked(elm){
                    if(elm.val() == '$data[infoFrom]'){
                        elm.attr('checked', 'checked')
                    }
                }
                for(var i=0; i<$('.infoFrom > label').length; i++){
                    checked($('.infoFrom').find('input').eq(i));
                }
            </script>
            </div>"?>

            <div>
                                到店情况:   
                <select name='arrive'>
                    <option value="未到" <?php if($data['arrive'] == '未到'){ echo "selected";}?>>未到</option>
                    <option value="已到店" <?php if($data['arrive'] == '已到店'){ echo "selected";}?>>已到店</option>
                </select>
            </div>
        <?php
        echo "
        
            <div>
                客户姓名：<input type='text' style='color:#fff' name='name' value='$data[name]' readonly/>
            </div>
        
            <div>
                责任客服：";
            //  组长 分配信息给组员 根据不同组长 显示不同的组员
            include  "../allocation/allot.php";

        echo "
            </div>
        
        
            <div>
                手机号码 : <input type='text' style='color:#E7E7E7'name=\"phone\" value='$data[phone]' maxlength='11' minlength='11' readonly/>
            </div>
            <div>
                所属团队 : ";
            include  "../teamTransform/teamTs.php";

//        <div>
//        所在城市 : <input type='text' name=\"location\" value='$data[location]'>
//            </div>

        echo "
            </div>
            
            <div>
                楼盘名称：<input type='text' name=\"house\" value='$data[house]'>
            </div>
            "?>
            <div>
                咨询内容：
                <select name='consult'>
                    <option value='待填写' <?php if( $data['consult'] == '待填写' ){ echo "selected";}?>>待填写</option>
                    <option value='橱柜' <?php if( $data['consult'] == '橱柜' ){ echo "selected";}?>>橱柜</option>
                    <option value='衣柜集成' <?php if( $data['consult'] == '衣柜集成' ){ echo "selected";}?>>衣柜集成</option>
                    <option value='橱柜&衣柜集成' <?php if( $data['consult'] == '橱柜&衣柜集成' ){ echo "selected";}?>>橱柜&衣柜集成</option>
                </select>
            </div>
<?php
    echo "
            <div>
                跟进导购/经销商客服：<input type='text' name=\"guide\" value='$data[guide]'>
            </div>
            <i class=\"clearFl\"></i>
        </div>
        <div class=\"from\">
            <div style='color:white;'>
                访问网页地址：<span class=\"href\">$data[href]</span>
            </div>
        </div>
        <input type='submit' value='确认修改'/>
        
    </form>
    ";

?>
</body>
</html>
