<?php
$ch = './cache/';
$ct = 3600;
$cf = './cache/' . md5($_SERVER['REQUEST_URI']) . '.html';
if (!file_exists($ch)) mkdir($ch, 0777, true);
if (file_exists($cf) && (time() - filemtime($cf)) < $ct) {
    include $cf;
    exit;
}
ob_start();
?>
<?php include 'inc/db.php'; ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>江友首页</title>
        <link rel="stylesheet" href="css/css.css">
        <script src="js/jquery1.42.min.js"></script>
        <script src="js/jquery.SuperSlide.2.1.1.js"></script>
        <link rel="stylesheet" href="css/cssph.css" media="(max-width:599px)">
    </head>
    <body>
    <div class="header">
        <?php
        include 'top.php';
        include 'nav.php';
        ?>
    </div>
    <?php
    include 'flash.php';
    ?>
    <!-----------内容--------->
    <div class="content2">
        <div class="new">
            <p><a href="news.html?c1=行业资讯"><span>新闻中心</span>&nbsp;/&nbsp;News</a></p>
            <ul>
                <?php
                $nn = query('db_news', "id,ttt(title,21,'...')t,time", '1=1', 'order by id desc', 5);
                foreach ($nn as $v) {
                    ?>
                    <li>
                        <a href="newsdeti.html?id=<?= $v['id'] ?>"><?= $v['t'] ?></a><span><?= date('Y-m-d H:i:s', $v['time']) ?></span>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="about">
            <p><a href="company.html"><span>关于江友</span>&nbsp;/&nbsp;About Us</a></p>
            <div class="abT">
                江友企业是一家港商独资企业，创立于1995年6月。产品主要有各国认证插头电源线，电线电缆，接插件等，现已取得二十几个国家的安全认证，其中包括德国、韩国、英国、阿根廷、澳大利亚、美国、日本、以色列、巴西、南非、中国等，
                是同行中获得认证最多的企业之一
            </div>
        </div>
        <div class="shehui">
            <p><a href="shehui.html"><span>社会责任</span>&nbsp;/&nbsp;Environment &amp; Society</a></p>
            <div class="shehui2"><p>始终关注民生和社会进步， 建设，促和谐宣导积极健康的环保文化，节能降耗、污染预防...始...</p></div>
        </div>
    </div>
    <div class="content3">
        <div class="ct">
            <div class="wenhua">
                <p class="wh"><a href="company.html?class=企业文化"><span style="margin-top:5px">企业文化</span>&nbsp;/&nbsp;Environment
                        &amp; Society</a></p>
                <div class="12">
                <span class="jngshen">
                    <p class="p1">公司精神</p>
                    <p>团结 求实 拼搏 开拓 创新 荣誉</p>
                </span>
                    <span class="linian">
                    <p class="p1">公司理念</p>
                    <p>诚：诚实，诚信，诚心诚意；</p>
                    <p>信：诚实，讲信用，不欺骗；</p>
                    <p>勤：按规定时间办事，且做事尽力，不偷懒，不拖拉；</p>
                    <p>准：做事有依据，有准则，确保正确无误；</p>
                </span>
                </div>
            </div>
            <div class="xiazai">
                <p><a href="chanpin.html?a1=技术资料"><span>产品资料下载</span>&nbsp;/&nbsp;Download</a></p>
                <ul>
                    <?php
                    $query = query('db_new', "ttt(title,25,'...') name,id", "class='技术资料'", 'order by id desc', 4);
                    foreach ($query as $v) {
                        ?>
                        <li><a href="productnew.html?id=<?= $v['id'] ?>"><?= $v['name'] ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="renli">
            <ul>
                <li><a href="linian.html"><img src="img/ywxx.jpg"></a></li>
                <li><a href="sever.html"><img src="img/wsly.jpg"></a></li>
                <li><a href="lianxi.html"><img src="img/lxfs.jpg"></a></li>
                <li class="renli4"><a href="chanpin.html"><img src="img/cpzx.jpg"></a></li>
            </ul>
        </div>
    </div>
    <!------------dibu-->
    <?php
    include 'bottom.php';
    ?>
    </body>
    </html>
<?php
file_put_contents($cf, ob_get_contents());
ob_end_flush();
?>