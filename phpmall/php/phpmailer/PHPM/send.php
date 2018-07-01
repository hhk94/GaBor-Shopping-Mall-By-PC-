<?php

$subject = "新客户：".@$name.' 手机号码:'.@$phone;
$message = "新客户：".@$name."\n".' 手机号码:'.@$phone."\n". " 客服访问地址： ".@$href."\n".' 客户所在地：'.@$location."\n"." 客户留言： ".$leaveMessage." 客户留言时间： ".$time;





require_once("phpmailersend.php");


//$flag = sendMail('350839123@qq.com', $subject, $message);
//

if( $day == 0 ){
//    $to = "350839123@qq.com, 45362911@qq.com,58003840@qq.com";
    $team = 100;
    $customer = '肖右生';
    $flag = sendMail('350839123@qq.com', $subject, $message);
    $flag = sendMail('45362911@qq.com', $subject, $message);
    $flag = sendMail('58003840@qq.com', $subject, $message);

}else if($day == 1){

//    $to = "350839123@qq.com, 58003840@qq.com, 420116301@qq.com";
    $flag = sendMail('350839123@qq.com', $subject, $message);
    $flag = sendMail('58003840@qq.com', $subject, $message);
    $flag = sendMail('357224848@qq.com', $subject, $message);


    $team = 200;
    $customer = '夏阳';



}





if($flag){
    echo " ";
}else{
    echo "发送邮件失败！";
};

?>