<?php


$con = mysqli_connect("120.24.83.142" , "test" , "Novellus2010");//链接数据库
if(!$con){
    die("can't connect!!");
}else{
    //  echo "连接数据库成功";
}
$link = mysqli_select_db($con , 'membersysbase');
mysqli_query($con ,"set names ’utf8’ ");


$name='tianmao';


$vertifyPhone = " select url from erweima where name = '$name'";
$phoneTest = mysqli_query($con, $vertifyPhone);
$isok = mysqli_num_rows($phoneTest);

$data = mysqli_fetch_assoc($phoneTest);

echo $data['url'];


//header("Location:http://".$data['url']."");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="http://<?PHP ECHO $data['url']?>">跳转一下</a>

<iframe src="http://<?PHP ECHO $data['url']?>" frameborder="0"
style="width: 200px;height: 200px;"

></iframe>
</body>
</html>





