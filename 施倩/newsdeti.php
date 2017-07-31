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
include 'inc/db.php';
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>公司新闻</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <script type="text/javascript" src="js/jquery1.42.min.js"></script>
        <script src="js/jquery.SuperSlide.2.1.1.js"></script>
        <script src="js/aa.js"></script>
        <link rel="stylesheet" href="css/cssph.css" media="(max-width:599px)">
    </head>
    <body>
    <div class="header">
        <?php
        include 'top.php';
        include 'nav.php';
        ?>
    </div>
    <div class="zoujing">
        <div class="zj">
            <?php include 'Lnav.php'; ?>
            <div class="zjR">
                <?php
                $id = $_GET['id'];
                $new = query('db_news', '*', "id='$id'");
                ?>
                <div class="zj1">
                    <?php
                    if (isset($_GET['c1'])) {
                        echo $_GET['c1'];
                    } else {
                        echo '公司新闻';
                    }
                    ?><span><a href="index.html">首页 </a>&gt;<a href="news.php?c1=行业资讯"> 企业动态 </a>&gt;<a
                            href="news.php?c1=公司新闻"> 公司新闻 </a></span></div>
                <div>
                    <p class="dongTitle"
                       style="font-size:20px;margin-top:20px;font-family:'宋体'"><?= $new[0]['title'] ?></p>
                    <p class="tims" style="font-family:'宋体'"><?= date('Y-m-d H:i:s', $new[0]['time']) ?></p>
                    <p class="print" style="margin-top:-10px">[打印]</p>
                    <p class="text"><?= $new[0]['cont'] ?></p>
                    <div class="newbutton">
                        <a class="butaniu" href="javascript:history.go(-1);">关闭</a>
                    </div>
                </div>
            </div>
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