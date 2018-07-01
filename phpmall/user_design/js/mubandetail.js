/**
 * Created by Administrator on 2017/10/18.
 */


$(function(){
    $.ajax({
        url : 'muban.txt',
        type:"get",
        dataType:"json",
        success : function(data){
            callBack(data);
            console.log(data)
        }
    });
    function callBack(data){
        var locUrl = window.location.href;
        var indexNub = locUrl.indexOf('id=') +3 ;

//            console.log(locUrl.indexOf('id='))
//            console.log(indexNub)
//          获取号码
        var index = (locUrl.substr(indexNub)).slice(0,2);
        console.log(data[index]);
        //根据号码取数据
        $(".name").text(data[index][0]);

        $(".work").text(data[index][1]);

        $(".xueli>span").text(data[index][2]);
        $(".zhuanye>span").text(data[index][3]);
        $(".school>span").text(data[index][4]);
        $(".old>span").text(data[index][5]);
        $(".style").text(data[index][6]);
        $(".best").text(data[index][7]);

//            详情图片
        $(".work1 img").attr("src",data[index][8]);
        $(".work1 h1").text(data[index][9]);
        $(".work1 p").text(data[index][10]);

        $(".work2 img").attr("src",data[index][11]);
        $(".work2 h1").text(data[index][12]);
        $(".work2 p").text(data[index][13]);

        $(".work3 img").attr("src",data[index][14]);
        $(".work3 h1").text(data[index][15]);
        $(".work3 p").text(data[index][16]);

        $(".work4 img").attr("src",data[index][17]);
        $(".work4 h1").text(data[index][18]);
        $(".work4 p").text(data[index][19]);
        $(".zipai img").attr("src",data[index][20]);



    }



    $(".work4 img").each(function(){
        if( $(this).attr("src")==""){
            $(this).parent().css({"display":"none"}).siblings("a").css({"display":"block"});
        }

    });


});