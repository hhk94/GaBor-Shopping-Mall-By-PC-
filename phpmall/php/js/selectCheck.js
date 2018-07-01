$(function(){

    /* 选择时间 保存时间起 - 止点*/

    $('#J-xl').val(sessionStorage.getItem('timeStart'));
    $('#J-xl-3').val(sessionStorage.getItem('timeEnd'));

    SelectTime($('#J-xl'));
    SelectTime($('#J-xl-3'));

    function SelectTime(elm){
        elm.on('blur', function(){
            setTimeout(function(){
                sessionStorage.setItem( elm.attr('name'), elm.val());

                if(sessionStorage.getItem('timeEnd') < sessionStorage.getItem('timeStart')){
                    $('#J-xl').css({borderColor: 'red'});
                    $('#J-xl-3').css({borderColor: 'red'});
                    $('.timeErr').css({visibility: 'visible'})
                }else{
                    $('#J-xl').css({borderColor: '#eee'});
                    $('#J-xl-3').css({borderColor: '#eee'});
                    $('.timeErr').css({visibility: 'hidden'})
                }
            },500);
        })
    }

    showCustomerSelectForm();

    $('.selectTeam').on('change', function(){
        showCustomerSelectForm();
    });


    function showCustomerSelectForm(){

        //  根据选择的不同组 加载不同的客服
        var Custer = $('.selectCustomer'),
            teamOp = $('.selectTeam'),
            statusOp = $('.selectStatus'),
            fromOp = $('.selectFrom'),
            arriveOp = $('.selectArrive'),
            consultOp = $('.selectConsult'),
            dealerOp = $('.selectDealer')
            ;

        // 选中的 team / customer / status / from   localStorage 本地存储


        //  4个 select 分别调用  设置 对应的 sessionStorage
        setSelectItem(teamOp);

        function setSelectItem(elm){
            //  设置
            elm.on('change', function(){
                sessionStorage.setItem( elm.attr('name'), elm.val());
            });

            // 若有设置值 循环 判断
            if(sessionStorage.getItem(elm.attr('name'))){
                var elmSelect = sessionStorage.getItem(elm.attr('name'));
                for(var i=0; i<elm.find('option').length; i++){
                    (function(i){
                        if( elm.find('option').eq(i).val() == elmSelect){
                            elm.find('option').eq(i).attr('selected', true)
                        }
                    })(i)
                }
            };
        }


        //  team 设置完成后 根据 team select值 再显示不同的 customer select
        if(teamOp.val() == 100 ){

            Custer.html(
                '<option value=" ">[不指定客服]</option>' +
                '<option value="肖右生">肖右生</option>' +
                '<option value="曾漂亮">曾漂亮</option>' +
                '<option value="匡匡">匡匡</option>' +
                '<option value="涂品品">涂品品</option>' +
                '<option value="肖玉洁">肖玉洁</option>'+
                '<option value="陈蓉">陈蓉</option>'+
                '<option value="黄思维">黄思维</option>'
            )


        }else if(teamOp.val() == 200 ){

            Custer.html(

                '<option value=" ">[不指定客服]</option>' +
                '<option value="夏阳">夏阳</option>' +
                '<option value="谢蓉">谢蓉</option>'+
                '<option value="浣艳琳">浣艳琳</option>'+
                '<option value="李震宇">李震宇</option>')
        }else {

            Custer.html(
                '<option value="">[不指定客服]</option>')
        }

        setSelectItem(Custer);
        setSelectItem(statusOp);
        setSelectItem(fromOp);
        setSelectItem(arriveOp);
        setSelectItem(consultOp);
        setSelectItem(dealerOp);
    }

    $('.clearSelect').on('click', function(){
        sessionStorage.setItem("timeStart", " ");
        sessionStorage.setItem("timeEnd", " ");
        sessionStorage.setItem("F-team", " ");
        sessionStorage.setItem("F-customer", " ");
        sessionStorage.setItem("F-status", " ");
        sessionStorage.setItem("F-from", " ");
        sessionStorage.setItem("F-arrive", " ");
        sessionStorage.setItem("F-consult", " ");
        sessionStorage.setItem("F-dealer", " ");
        $('select option').removeAttr('selected');
        $('#J-xl').val(' ');
        $('#J-xl-3').val(' ');
    });

});
