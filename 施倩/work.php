<?php include 'inc/db.php'; ?>
<!DOCTYPE html>
<html>
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
        <?php include 'worknav.php'; ?>
        <div class="zjR">
            <div class="zj1">用人理念<span><a href="index.html">首页 </a>&gt;<a href="linian.html"> 人力资源 </a>&gt;<a
                        href="linian.html"> 用人理念</a></span></div>
            <table class="work" width="95%" border="1" align="center" cellpadding="2" cellspacing="0">
                <tr>
                    <th width="22%">职位名称
                    </td>
                    <th width="16%">详细资料
                    </td>
                </tr>
                <?php
                $a = queryall('db_postnew');
                foreach ($a as $v) {
                    ?>
                    <tr>
                        <td><?= $v['post'] ?></td>
                        <td><a href="workdetail.php?id=<?= $v['id'] ?>">点击查看</a></td>
                    </tr>
                    <?php
                }
                ?>
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
