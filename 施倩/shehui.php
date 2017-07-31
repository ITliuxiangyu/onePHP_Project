<?php
include 'inc/db.php';
$class = isset($_GET['class']) ? $_GET['class'] : '社会责任'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>社会责任</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <script type="text/javascript" src="js/jquery1.42.min.js"></script>
    <script src="js/jquery.SuperSlide.2.1.1.js"></script>
    <link rel="stylesheet" href="css/cssph.css " media="(max-width:599px)">
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
        <?php
        include 'shehuinav.php';
        ?>
        <div class="zjR">
            <div class="zj1">
                <?= $class ?>
                <span>
				    <a href="index.html">首页 </a>&gt;<a href="shehui.html">社会责任</a>
					&gt;<a href="shehui.html?class=<?= $class ?>"><?= $class ?></a>
				</span>
            </div>
            <?php
            $q = query('db_company', '*', "class='$class'and diff='s'");
            ?>
            <div><?= $q[0]['cont'] ?></div>
        </div>
    </div>
</div>
<!------------dibu-->
<?php
include 'bottom.php';
?>
</body>
</html>
