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
        <title>产品知识</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <script type="text/javascript" src="js/jquery1.42.min.js"></script>
        <script src="js/jquery.SuperSlide.2.1.1.js"></script>
        <link rel="stylesheet" href="css/cssph.css" media="(max-width:599px)">
        <script src="js/aa.js"></script>
    </head>
    <body>
    <div class="header">
        <?php
        include 'top.php';
        include 'nav.php';
        ?>
        <div class="zoujing" style="margin-top:0px;height:530px">
            <div class="zj">
                <div class="zjL">
                    <div class="toolbar">
                        <div class="menu-button"></div>
                    </div>
                    <p>客户服务</p>
                    <ul>
                        <li><a href="knowledge.html">产品知识</a></li>
                        <li><a href="sever.html">在线回答</a></li>
                    </ul>
                </div>
                <div class="zjR">
                    <div class="zj1">
                        <?php
                        if (isset($_GET['c1'])) {
                            echo $_GET['c1'];
                        } else {
                            echo '产品知识';
                        }
                        ?>
                        <span><a href="index.html">首页 </a>&gt;<a href="knowledge.php?c1=产品知识">客户服务</a>&gt;<a
                                href="knowledge.php?c1=产品知识"> 产品知识 </a></span></div>
                    <div class="news">
                        <ul>
                            <?php
                            if (isset($_GET['c1'])) {
                                $c = $_GET['c1'];
                                $ppp = npp('db_knowledge', '8', '*', "flag='y'and class='$c'", 'order by id desc', 'c1=' . $c . '&');
                            } else {
                                $ppp = pp('db_knowledge', '8', '*', "flag='y' and class='产品知识'");
                            }
                            $pro = $ppp['result'];
                            //$new=queryall('db_news','*',"flag='y'",'order by id desc');
                            foreach ($pro as $v) {
                                ?>
                                <li><span class="xinwen">[<?= $v['class'] ?>]</span><a
                                        href="knowledgedeti.php?id=<?= $v['id'] ?>"><?= $v['name'] ?></a><span
                                        class="time"
                                        style="float:none;margin-left:20px"><?= date('Y-m-d', $v['time']) ?></span></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!--------分页------>
                    <div class="page">
                        <?php
                        pagecss();
                        echo $ppp['info'];
                        ?>
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