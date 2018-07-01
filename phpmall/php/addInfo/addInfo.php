<!DOCTYPE html>
<?php
include "../lgCheck.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>信息收集</title>
    <link href="../css/table.css" rel="stylesheet"/>
    <script src="../../js/jquery.min.js"></script>
</head>
<body>
<h2>客户信息添加</h2>
<?php

$team = floor($_SESSION['uid']/10);
echo "<form class=\"wrap\" action='addInfoSend.php' method='post'>
      <h4>
        当前ID：
        <span>
           
             $_GET[id]
           
        </span>
        用户名:
        <span>
            
             $_SESSION[name]
            
        </span>

        <a class=\"changePW\" href='../admin/adminIndex.php?id=$_GET[id]'>返回</a>
      </h4>
      
      <span style='margin:0 0 0 30px;'>指定经销商:</span>
      
      
       <select class=\"dealerList\" name=\"dealer\">
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
      
      
      
      "
    ?>





      
      <?php
      echo"
      
      
        <div class=\"item\">
            <div class=\"title\">
                <span class=\"date\">
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
                                <input type='radio' name='from' class='qita' value='其他'/>其他
                            </label>
                
                       
                    </span>
                </span>
            </div>
        </div>
        
        <div class=\"info\">
            <div>
                客户姓名：<input class='inputformname' type='text' name='name' maxlength='12'/>
            </div>
            <div>
                责任客服：<span class=\"name\">$_SESSION[name]</span>
            </div>
            <div>
                手机号码 : <input class='inputformphone' type='text' name=\"phone\"/>
            </div>
            <div>
                所属团队 : ";
include "../teamTransform/teamTs.php";

//
//      <div>
//      所在城市 : <input type='text' name="city">
//            </div>
echo "
            </div>

            
            
            
            <div>
                楼盘名称：<input type='text' name=\"house\">
            </div>
            <div>
                咨询内容：<select name='consult'>
                    <option value='待填写'>待填写</option>
                    <option value='橱柜' >橱柜</option>
                    <option value='衣柜集成'>衣柜集成</option>
                    <option value='橱柜&衣柜集成'>橱柜&衣柜集成</option>
                </select>
            </div>
           
            <div>
                跟进导购/经销商客服：<input type='text' name=\"guide\">
            </div>
            <i class=\"clearFl\"></i>
        </div>
        <div>
            <textarea name=\"comment\"></textarea>
        </div>
        <div class=\"from\">
            <input type='submit' value='确认提交'/>
        </div>
    </form>"
?>


<script>

    $(".from input").click(function(event){
        if(!$("input[name='from']:checked").val()||$(".inputformphone").val()==""||!$(".inputformname").val()){

            console.log($("input[name='from']:checked").val());

            console.log($(".inputform").val());

            console.log($(".inputformname").val());

               alert("请检查 信息渠道 客户姓名 手机号码");
                return false;

        }

    })





</script>
</body>
</html>
