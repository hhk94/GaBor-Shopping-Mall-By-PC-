<?php



?>
<style>

    .containerfoot{
        margin:0 auto;
        width: 1280px;
    }

</style>

<footer>
    <div class=" containerfoot" style="overflow: hidden;">







        <ul>
            <li>关于我们</li>

            <?php
            $list=$action->getArticle(' and typeid = 30 ',' order by id ');
            foreach ($list as $row){
                echo "<li><a href='{$webdir}/user_about/index.php?id={$row['id']}' target='_blank'>{$row['title']}</a></li>";

            }

            ?>



        </ul>

        <?php
            $articleType=$action->getArticleType(" and leixing = '帮助中心' ",' order by id ');
        foreach ($articleType as $rows){
            echo "<ul>";
            echo "<li>{$rows['typename']}</li>";
            $list=$action->getArticle(" and typeid = '{$rows['id']}'",' order by id ');
            foreach ($list as $item) {

                 echo "<li><a href='{$webdir}/user_help/index.php?id={$item['id']}'>{$item['title']}</a></li>";


            }

            echo "</ul>";
        }

        ?>




<!--        <ul>-->
<!--            <li>帮助中心</li>-->
<!--            <li><a href="#">售前咨询</a></li>-->
<!--            <li><a href="#">售后服务</a></li>-->
<!--            <li><a href="javascript:window.top.location='php/admin/checkIn.php'" target="_blank">管理登录</a></li>-->
<!--        </ul>-->
<!--        <ul>-->
<!--            <li>购物指南</li>-->
<!--            <li><a href="#">0元设计</a></li>-->
<!--            <li><a href="#">订单查询</a></li>-->
<!--            <li><a href="javascript:top.location.href='productList/productList.html'">产品展示</a></li>-->
<!--        </ul>-->
<!--        <ul>-->
<!--            <li>嘉宝实力</li>-->
<!--            <li><a href="#">案例展示</a></li>-->
<!--            <li><a href="#">专家团队</a></li>-->
<!--            <li><a href="#">嘉宝网点</a></li>-->
<!--        </ul>-->
<!--        <ul>-->
<!--            <li>新闻动态</li>-->
<!--            <li><a href="javascript:top.location.href='new/news.html'">公司新闻</a></li>-->
<!--            <li><a href="#">活动动态</a></li>-->
<!--            <li><a href="#">行业新闻</a></li>-->
<!--        </ul>-->
    </div>
    <div class="" style="width: 1280px   ;margin:0 auto">
        <h1>战略合作</h1>
        <ol>
            <li><a href="<?php echo $webdir?>/user_links/links.php"><img src="<?php echo $webdir?>/indexImg/indexhezuo1.png" alt=""></a></li>
            <li><a href="<?php echo $webdir?>/user_links/links.php"><img src="<?php echo $webdir?>/indexImg/indexhezuo2.png" alt=""></a></li>
            <li><a href="<?php echo $webdir?>/user_links/links.php"><img src="<?php echo $webdir?>/indexImg/indexhezuo3.png" alt=""></a></li>
            <li><a href="<?php echo $webdir?>/user_links/links.php"><img src="<?php echo $webdir?>/indexImg/indexhezuo4.png" alt=""></a></li>
            <li><a href="<?php echo $webdir?>/user_links/links.php"><img src="<?php echo $webdir?>/indexImg/indexhezuo5.png" alt=""></a></li>
            <li><a href="<?php echo $webdir?>/user_links/links.php"><img src="<?php echo $webdir?>/indexImg/indexhezuo6.png" alt=""></a></li>
            <li><a href="<?php echo $webdir?>/user_links/links.php"><img src="<?php echo $webdir?>/indexImg/indexhezuo7.png" alt=""></a></li>
            <li><a href="<?php echo $webdir?>/user_links/links.php"><img src="<?php echo $webdir?>/indexImg/indexhezuo8.png" alt=""></a></li>
            <li><a href="<?php echo $webdir?>/user_links/links.php"><img src="<?php echo $webdir?>/indexImg/indexhezuo9.png" alt=""></a></li>
            <li><a href="<?php echo $webdir?>/user_links/links.php"><img src="<?php echo $webdir?>/indexImg/indexhezuo10.png" alt=""></a></li>
        </ol>
        <h2><?php echo $webcopy;?></h2>
    </div>
</footer>
