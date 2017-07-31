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
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$quer = query('db_product', '*', 'id=' . $id);
$im = query('db_product_img', '*', 'pid=' . $id);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title><?= $quer[0]['name'] ?></title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/aa.js"></script>
        <link rel="stylesheet" href="css/cssph.css" media="(max-width:599px)">
        <link rel="stylesheet" href="js/cloudzoom/cloudzoom.css">
        <script src="js/cloudzoom/cloudzoom.js"></script>
        <script>
            CloudZoom.quickStart();
        </script>
    </head>
    <body>
    <div class="header">
        <div class="top">
            <h1>江友企业</h1>
            <div class="top-L"><img src="img/logo2.gif"></div>
            <div class="top-R">
                <p>
                    <a href="#">简体中文</a>&nbsp;&nbsp;|
                    <a href="#">繁体中文</a>&nbsp;&nbsp;|
                    <a href="#">ENGLISH</a>
                </p>
                <span>
				<form action="#" method="post">
					<input class="seach" type="text" value="江友企业有限公司">
					<input class="seachL" type="button">
				</form>
			</span>
            </div>
        </div>
        <!------导航-------------------->

        <?php include 'nav.php'; ?>
    </div>
    <!------左侧导航-------------------->
    <?php include 'leftnav.php'; ?>
    <!------右侧内容-------->
    <div class="zjR">
        <div class="zj1">
            <?php
            echo $quer[0]['class2'];
            ?>
            <span><a href="index.html">首页 </a>&gt;<a href="chanpin.php"> 产品中心 </a>&gt;<a href="chanpin.php">
             <?php
             echo $quer[0]['class1'];
             ?>
			</a></span></div>
        <div class="product">
            <div class="title"><?= $quer[0]['name'] ?></div>
            <div class="produ1">
                <a href="upload/product/large/<?= $im[0]['img'] ?>">
                    <img class="cloudzoom" data-cloudzoom="zoomPosition:'inside',autoInside:true"
                         src="upload/product/middle/<?= $im[0]['img'] ?>">
                </a>
            </div>
            <div class="aa">
                <?= $quer[0]['intro'] ?>
            </div>
            <div class="newbutton">
                <a class="butaniu" href="javascript:history.go(-1);">返回</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!------------底部--------->
    <?php
    include 'bottom.php';
    ?>
    </body>
    </html>
<?php
file_put_contents($cf, ob_get_contents());
ob_end_flush();
?>