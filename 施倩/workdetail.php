<?php include 'inc/db.php'; ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>招聘信息</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/cssph.css" media="(max-width:599px)">
    <script src="js/jquery1.42.min.js"></script>
    <script src="js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="js/aa.js"></script>
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
        <div class="toolbar">
            <div class="menu-button"></div>
        </div>
        <?php
        include 'worknav.php';
        ?>
        <div class="zjR">
            <div class="zj1">用人理念<span><a href="index.html">首页 </a>&gt;<a href="#"> 走进江友 </a></span></div>
            <table class="workd" width="95%" border="1" align="center" cellpadding="2" cellspacing="0">
                <?php
                $id = $_GET['id'];
                $a = queryall('db_postnew', '*', 'id=' . $id);
                ?>
                <tr>
                    <th>
                    <?= $a[0]['post'] ?></td>
                </tr>
                <tr>
                    <td><?= $a[0]['intro'] ?></td>
                </tr>
                <tr>
                    <td><a href="zhaopin.php?p=<?= $a[0]['post'] ?>" class="yinpin">应聘此岗位</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!------------dibu-->
<?php
include 'bottom.php';
?>
</body>
</html>
