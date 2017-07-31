<!------falsh------------->
<div class="content">
    <span class="zuo"><img src="img/left.gif"></span>
    <span class="you"><img src="img/right.gif"></span>
    <ul>
        <?php
        $ad = queryall('db_ad', 'url,img,title', "flag='y'", 'order by id desc');
        foreach ($ad as $v) printf('<a href="%s"><li style="background: url(upload/ad/%s) center center" title="%s"></li></a>', $v['url'], $v['img'], $v['title']);
        ?>
    </ul>
    <script>
        jQuery(".content").slide({mainCell: "ul", prevCell: ".zuo", nextCell: ".you", autoPlay: false});
    </script>
</div>