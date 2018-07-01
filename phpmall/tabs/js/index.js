/**
 * Created by Administrator on 2017/10/24.
 */





$(function(){





    // get cust Ip url

    var IP = '';
    $.getJSON('//freegeoip.net/json/', function(data) {
        IP = data.ip;
    });

    function submitInfo(elm,phNub,location,xuqiu,gongsi,leaveMessage ){

        $.ajax({
            url : "php/dataCollection.php?name=" + elm + "&phone=" +phNub + "&location=" + location  + "&content=" + document.title  + "&IP=" + IP+"&xuqiu=" +xuqiu +"&gongsi=" + gongsi + "&leaveMessage=" +leaveMessage,
            type : 'get',
            beforeSend : function(){

            },
            success : function(data){
                alert(data)
            }
        })
    }

    BtnClick($(".button"));
    BtnClick($(".button2"));


    function BtnClick(btn){
        btn.on('click',function(){
            var elm = $(this).parent().find('.indexName').val();
            // console.log(elm)
            var phNub = $(this).parent().find('.indexNum').val();
            // console.log(phNub )
            var location = $(this).parent().find('.indexLocal').val();
            // console.log(location)
            var xuqiu = $(this).parent().find('.xuqiu').val();
            var gongsi = $(this).parent().find('.indexcom').val();
            var leaveMessage = $(this).parent().find('.leaveMessage').val();
// console.log(leaveMessage)
            // console.log(gongsi)

            IsChinese(elm,phNub,location,xuqiu,gongsi,leaveMessage)
        })
    }


// 定制输入验证

    function IsChinese(elm,phNub,location,xuqiu,gongsi,leaveMessage) {
        if(elm.length!=0){
            reg=/^[\u0391-\uFFE5]+$/;
            if(!reg.test(elm)){
                alert("对不起，请正确输入您的称呼!");//请将“字符串类型”要换成你要验证的那个属性名称！
                return;
            }
        }
        if(elm.length == 0){
            alert("请输入您的称呼");
            return;
        }
        if(phNub.length == 0){
            alert("请输入您的手机号码..");
            return;
        }
        if(phNub.length!=0){
            reg=/^\d{11}$/;
            if(!reg.test(phNub)){
                alert("对不起，请输入正确的手机号码!");//请将“字符串类型”要换成你要验证的那个属性名称！
                return;
            }else{
                //  若验证通过 则提交客户信息
                submitInfo(elm,phNub,location,xuqiu,gongsi,leaveMessage);
                // send(elm,phNub,location,xiaoqu);
            }
        }
    }


















//        banner悬浮选项


//x新品速递


})


//            提交表单
function check(form){
    if(form.indexNum.value==""){
        alert("请输入您的电话");
        form.indexNum.focus();
        return false;
    }else{
        reg=/^\d{11}$/;
        if(!reg.test(form.indexNum.value)){
            alert("对不起，请输入正确的手机号码!");//请将“字符串类型”要换成你要验证的那个属性名称！
            form.indexNum.focus();
            return false;
        }
    }
    if(form.indexName.value!=""){
        reg=/^[\u0391-\uFFE5]+$/;
        if(!reg.test(form.indexName.value)){
            alert("对不起，请正确输入您的称呼!");//请将“字符串类型”要换成你要验证的那个属性名称！
            form.indexName.focus();
            return false;

        }
    }else{
        alert("对不起，请输入您的称呼!");
        form.indexName.focus();
        return false;
    }
    form.submit();

    // submitInfo();
}
//留言
function check1(form){
    if(form.indexName.value!=""){
        reg=/^[\u0391-\uFFE5]+$/;
        if(!reg.test(form.indexName.value)){
            alert("对不起，请正确输入您的称呼!");//请将“字符串类型”要换成你要验证的那个属性名称！
            form.indexName.focus();
            return false;
        }
    }else{
        alert("对不起，请输入您的称呼!");
        form.indexName.focus();
        return false;
    }
    if($("#leaveMessage").val()==""){
        alert("请输入您的留言");
        $("#leaveMessage").focus();
        return false;
    }else{
        alert("留言成功");
    }
    form.submit();

    // submitInfo();
}

