<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!--    <link href="../css/table.css" rel="stylesheet"/>-->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <title>Document</title>
    <style>
        body{
            font-size:16px;
            background:rgb(79,164,223)}
        body div{border-top:2px solid rgb(79,164,223);

            line-height:40px;}
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
        .wrap{
            position: absolute;top:100px;left:50%;
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
            transform: translateX(-50%);
            background: black;}
        .wrap>div{margin: 0 10px 0 10px}
        .wrap a{margin: 0 10px 0 10px}
    </style>
</head>
<body>
<a href="adminIndex.php" style="color: black;font-size: 30px;">返回</a>

<?php
include '../lgCheck.php';
include "../connectAdmin.php";


$search_number=$_POST['search_number'];

//$vertifyPhone = "select phone from user where phone = ".$search_number ;
//$phoneTest = mysqli_query($con, $vertifyPhone);


$vertifyPhone  = "SELECT * from user WHERE phone=".$search_number." or id=".$search_number;
$phoneTest = mysqli_query($con,$vertifyPhone);
$data = mysqli_fetch_assoc($phoneTest);


//print_r($phoneResult);
if ($data !== false ) {
    echo "<div class=\"wrap\">
        <div class=\"item\">
            <div class=\"title\">
                编号：<span class=\"number\">$data[id]</span>
                <span class=\"date\">星期$data[week]</span>
                时间：<span class=\"time\">$data[time]</span>
                到店情况: <span style='color:#1dbcf7'>$data[arrive]</span>
                状态：<span class=\"orno$data[status]\" data-color=$data[status]></span>
                
                ";


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

    echo "</div>
        </div>
        <div class=\"info hiddeInfo\">
            <div>
                客户姓名：<span class=\"name\">$data[name]</span>
            </div>
            <div>
                信息来源：<span class=\"infoFrom\">$data[infoFrom]</span>
            </div>
            <div>
                手机号码 : <span class=\"phone\">$data[phone]</span>
            </div>

            <div>
                责任客服: <span class=\"name\">$data[customer]</span>
            </div>
            <div>
                所在城市 : <span class=\"city\">$data[location]</span>
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






} else {

    echo "<font color='red'>你搜索的信息不存在，请使用类似的关键字</font>";
}


?>


</body>
</html>










