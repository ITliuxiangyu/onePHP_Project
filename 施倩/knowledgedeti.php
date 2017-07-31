<?php include 'inc/db.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>产品知识</title>
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
            <?php
            $id = $_GET['id'];
            $new = query('db_knowledge', '*', "id='$id'");
            ?>
            <div class="zj1">
                <?php
                if (isset($_GET['c1'])) {
                    echo $_GET['c1'];
                } else {
                    echo '公司新闻';
                }
                ?><span><a href="index.html">首页 </a>&gt;<a href="knowledge.php?c1=产品知识">客户服务</a>&gt;<a
                        href="knowledge.php?c1=产品知识"> 产品知识 </a></span></div>
            <p class="dongTitle" style="font-size:20px;margin-top:20px;font-family:'宋体'"><?= $new[0]['name'] ?></p>
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
