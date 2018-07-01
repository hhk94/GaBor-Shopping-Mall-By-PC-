$(function(){
    // get cust Ip url
    var IP = '';
    $.getJSON('//freegeoip.net/json/', function(data) {
        IP = data.ip;
    });




    function submitInfo(name, tel, loupan, mianji ){
        var name=$(".indexName").val();
        var tel=$(".indexNum").val();
        var loupan=$(".indexLocal").val();


        $.ajax({
            url : "php/dataCollection.php?name=" + name + "&phone=" + tel + "&location=" + loupan + "&house=" + mianji + "&content=" + document.title + "&url=" + location.href + "&IP=" + IP,
            type : 'get'

        })
    }

        //
        // function BtnClick(btn){
        //
        //
        // }






    //  退出会员登录状态
        $('.closelog').on('click', function(){

            $.ajax({
                url: 'http://localhost/Jiabao0519/htmls/php/closelog.php',
                type: 'post',
                success: function(data){
                    window.location.href ="http://localhost/Jiabao0519/index.html";
                }
            })
        })
});