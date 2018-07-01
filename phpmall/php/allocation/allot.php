<?php
if( $_SESSION['uid'] == 1000){
    echo
    "<select name='customer'>
    <option value='肖右生'";
    if($data['customer'] == '肖右生'){
        echo "selected";
    }
    echo
    ">肖右生</option>";

    echo
    "<option value='曾漂亮'";
    if($data['customer'] == '曾漂亮'){
        echo "selected";
    }
    echo
    ">曾漂亮</option>";

    echo
    "<option value='涂品品'";
    if($data['customer'] == '涂品品'){
        echo "selected";
    }
    echo
    ">涂品品</option>";

    echo
    "<option value='肖玉洁'";
    if($data['customer'] == '肖玉洁'){
        echo "selected";
    }
    echo
    ">肖玉洁</option>";

    echo
    "<option value='匡匡'";
    if($data['customer'] == '匡匡'){
        echo "selected";
    }
    echo
    ">匡匡</option>";

    echo
    "<option value='陈蓉'";
    if($data['customer'] == '陈蓉'){
        echo "selected";
    }
    echo
    ">陈蓉</option>";

    echo
    "<option value='黄思维'";
    if($data['customer'] == '黄思维'){
        echo "selected";
    }
    echo
    ">黄思维</option>";




    echo "
    </select>";
}else if ( $_SESSION['uid'] == 2000){
    echo
    "<select name='customer'>
                                    <option value='夏阳'";
    if($data['customer'] == '夏阳'){
        echo "selected";
    }
    echo
    ">夏阳</option>";

    echo
    "<option value='谢蓉'";
    if($data['customer'] == '谢蓉'){
        echo "selected";
    }
    echo
    ">谢蓉</option>";

    echo
    "<option value='涂涂'";
    if($data['customer'] == '涂涂'){
        echo "selected";
    }
    echo
    ">涂涂</option>";

    echo
    "<option value='黄丽'";
    if($data['customer'] == '黄丽'){
        echo "selected";
    }
    echo
    ">黄丽</option>";

    echo
    "<option value='浣艳琳'";
    if($data['customer'] == '浣艳琳'){
        echo "selected";
    }
    echo
    ">浣艳琳</option>";

    echo
    "<option value='李震宇'";
    if($data['customer'] == '李震宇'){
        echo "selected";
    }
    echo
    ">李震宇</option>";

    echo
    "</select>";
}else if( $_SESSION['uid'] > 3000){
    echo "<input type='text' name='customer' value='$data[customer]' readonly/>";

}else{
    echo "<input type='text' name='customer' value='$data[customer]' readonly/>";
}


?>