<?php
$subject = "新客户：".$name.' 手机号码:'.$phone;
$message = "新客户：".$name."\n".'手机号码:'.$phone."\n". "客服访问地址： ".$href."\n".'客户所在地：'.$location."\n"."客户留言时间： ".$time;





if(mail($to, $subject, $message)){
    echo "嘉宝客服:发送成功";
}else{
    echo "send mail fail.";
};

?>