<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/10
 * Time: 15:48
 */

class page{

    private $infoCount; //信息总数

    private $pageSize;//每页显示数量
    private $pageCount;//总页数
    private $currPage;//当前页码
    function __construct($ifcount,$pgsize,$pgcount=1,$cupage=1){
        $this->infoCount=$ifcount;
        $this->pageSize=$pgsize;
        $this->pageCount=ceil($this->infoCount/$this->pageSize);
        $this->currPage=min($this->pageCount,max((int)@$_GET['page'],1));
    }


        function currpage(){
            echo $this->currPage;
        }

    function pageCount(){
        echo $this->pageCount;
    }


    function hello(){
        echo $this->infoCount;
        echo "<br>";
        echo $this->pageSize;
        echo "<br>";
//        echo $this->pageCount;
//        echo "<br>";
//        echo $this->currPage;
    }







    function show(){
        $s='';
        for($i=1;$i<=$this->pageCount;$i++){
            if($i==$this->currPage){
                $s.="<span style='font-size:22px;;font-weight:bold;color:rgb(86,61,124)'>$i</span>&nbsp;";
            }else{
                $s.="<a href='".$this->pageurl()."$i'>$i</a>&nbsp;";
            }



        }
        return $s;
    }

        //产品页面
    function showStyle($q=5,$h=5){
        $sid=$this->currPage-$q;
        $eid=$this->currPage+$h;
        $s="";
        if($sid<=1){
            $eid=$eid+abs($sid-1)-1;
        }

        if($eid>=$this->pageCount){
            $sid=$sid-abs($this->pageCount-$eid)+1;
            $eid=$eid-abs($this->pageCount-$eid);
        }

        if($this->currPage>1){
             $s.="<a  href='".$this->pageurl()."1'>首页</a>";
             $s.="<a  href='".$this->pageurl().($this->currPage-1)."'>上一页</a>";
        }else{
            $s.="<a >首页</a>";
            $s.="<a >上一页</a>";
        }

        for($i=$sid;$i<=$eid;$i++){

            if($i<1) continue;
            if($i==$this->currPage){
                $s.= "<a class='activePro' href='".$this->pageurl()."$i'>".$i."</a>";
            }else{
                $s.= "<a href='".$this->pageurl()."$i'>".$i."</a>";
            }


        }
            if($this->currPage<$this->pageCount){
                $s.="<a  href='".$this->pageurl().($this->currPage+1)."'>下一页</a>";
                $s.="<a  href='".$this->pageurl().$this->pageCount."'>尾页</a>";

            }else{
                $s.="<a >下一页</a>";
                $s.="<a >尾页</a>";
            }
            if($this->infoCount>0){
                return $s;
            }


    }




    function limit(){
        return "limit ".($this->currPage-1)*$this->pageSize.",".$this->pageSize;
    }
//d当前页码的url地址

    function pageurl(){

        $url=isset($_SERVER['REQUEST_URL'])?$_SERVER['REQUEST_URL']:$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];

//

       $request_arr=parse_url($url);

        if(isset($request_arr['query'])){
//                    echo "有参数";
            parse_str($request_arr['query'],$arr);

//            注销某个值
            unset($arr['page']);
//            从新组合网址
            $url=$request_arr['path']."?".http_build_query($arr)."&page=";
        }else{
//            echo "无参数";
                $url=strstr($url,"?")?$url."page=":$url."?page=";
        }

        return $url;

    }

//y页面
    function pageurl2($dq){

        $url=isset($_SERVER['REQUEST_URL'])?$_SERVER['REQUEST_URL']:$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];

//

        $request_arr=parse_url($url);

        if(isset($request_arr['query'])){
//                    echo "有参数";
            parse_str($request_arr['query'],$arr);

//            注销某个值
            unset($arr['page']);
            unset($arr[$dq]);
//            从新组合网址
            $url=$request_arr['path']."?".http_build_query($arr)."&$dq=";
        }else{
//            echo "无参数";
            $url=strstr($url,"?")?$url."$dq=":$url."?$dq=";
        }

        return $url;

    }

}