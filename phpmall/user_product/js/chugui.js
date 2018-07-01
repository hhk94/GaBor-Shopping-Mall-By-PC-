/**
 * Created by Administrator on 2017/10/18.
 */


$(function(){
    $.ajax({
        url : 'muban.json',
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
        $(".section1>.container>h3>a:nth-of-type(2)").text(data[index][0]);
        $(".detailForm>h1").text(data[index][0]);
        $(".detailForm>h2").text(data[index][1]);
        $(".price1").text(data[index][2]);
        $(".gray li:nth-of-type(1)>em").text(data[index][3]);
//            详情图片
        $(".section4_1>.bigPic>img").attr("src",data[index][4]);
        $(".section4_1>.container>img").attr("src",data[index][5]);
        $(".section4_2>.bigPic>img").attr("src",data[index][6]);
        $(".section4_2>.container>img").attr("src",data[index][7]);
        $(".section4_3>.bigPic>img").attr("src",data[index][8]);
        $(".section4_3>.container>img").attr("src",data[index][9]);
        $(".section4_4>.bigPic>img").attr("src",data[index][10]);
        $(".section4_4>.container>img").attr("src",data[index][11]);
        $(".section4_5>.bigPic>img").attr("src",data[index][12]);
    };
//        .addClass("navActive");
//       var test=$("#iframe1").contents().find(".headerRbottom").text("hahaha")
//        console.log(test)

})