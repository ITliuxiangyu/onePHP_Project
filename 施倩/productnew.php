<?php
include 'inc/db.php';
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$quer = query('db_new', '*', 'id=' . $id);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= $quer[0]['title'] ?></title>
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
        echo $quer[0]['class'];
        ?>
        <span><a href="index.html">首页 </a>&gt;<a href="chanpin.php"> 产品中心 </a>&gt;<a href="chanpin.php">
             <?php
             echo $quer[0]['class'];
             ?>
			</a></span></div>
    <div>
        <p class="dongTitle"
           style="font-size:20px;margin-left:-30px;padding-top: 15px; font-family: '宋体'"><?= $quer[0]['title'] ?></p>
        <p class="tims" style="color: #999;font-family: '宋体'"><?= date('Y-m-d H:i:s', $quer[0]['time']) ?></p>
        <p class="print"><a href="#" style="display:block">[打印]</a></p>
        <div style="text-align:center"><?= $quer[0]['cont'] ?></div>
        <div class="off"><a href="javascript:history.go(-1);">关闭</a></div>
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
