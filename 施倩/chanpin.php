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
<?php
include 'inc/db.php';
include 'admin/qq.php';
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>产品中心</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <?php pagecss(); ?>
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
    <?php
    include 'leftnav.php';
    ?>
    <div class="zjR">
        <div class="zj1">
            <?php
            if (isset($_GET['c1'])) {
                echo $_GET['c1'];
            } else if (isset($_GET['c2'])) {
                echo $_GET['c2'];
            } else if (isset($_GET['a1'])) {
                echo $_GET['a1'];
            } else {
                echo '产品总汇';
            }
            ?>
            <span><a href="index.html">首页 </a>&gt;<a href="chanpin.php"> 产品中心 </a>&gt;<a href="#">
			<?php
            if (isset($_GET['a1'])) {
                echo $_GET['a1'];
            } else {
                echo '产品总汇';
            }
            ?></a></span></div>
        <div class="chatou" style="height:350px">
            <ul>
                <?php
                ww();
                if (isset($_GET['c1'])) {
                    $c = $_GET['c1'];
                    $ppp = npp('db_product', '4', '*', "flag='y'and class1='$c'", 'order by id desc', 'c1=' . $c . '&');
                } else if (isset($_GET['c2'])) {
                    $cc = $_GET['c2'];
                    $ppp = npp('db_product', '4', '*', "flag='y' and class2='$cc'", 'order by id asc', 'c2=' . $cc . '&'); //最后是传值的地址及页号
                } else {
                    $ppp = pp('db_product', '8', '*', "flag='y' and class1='产品总汇'", 'order by class2 asc');
                }
                $pro = $ppp['result'];
                foreach ($pro as $v) {
                    $im = query('db_product_img', 'img', 'pid=' . $v['id'], '', 1);
                    ?>
                    <li class="qqq"><a href="product.php?id=<?= $v['id'] ?>">
                            <img src="upload/product/small/<?= $im[0]['img'] ?>" alt=""></a>
                        <p><a href="product.php?id=<?= $v['id'] ?>"><?= $v['name'] ?></a></p></li>
                    <?php
                }
                ?>
                <!---------------->
                <?php
                if (isset($_GET['a1'])) {
                    qqq();
                    $a1 = $_GET['a1'];
                    $pag = page('db_new', '9');
                    if ($pag['pagecount'] > 1) {
                        $prr = npp('db_new', '9', "id,typ,time,ttt(title,20,'· · ·')t", "flag='y'and class='$a1'", 'order by id desc', 'a1=' . $a1 . '&');
                        $aa = $prr['result'];
                    } else {
                        $aa = query('db_new', "id,typ,time,ttt(title,20,'· · ·')t", "flag='y'and class='$a1'");
                    }
                }
                //$aa=query('db_new','*',"class='$a1'");
                foreach ($aa as $v) {
                    ?>
                    <li class=qq><span class="xinwen">[<?= $v['typ'] ?>]</span><a
                            href="productnew.php?id=<?= $v['id'] ?>"><?= $v['t'] ?></a><span class="time"><?php
                            $sss = $v['time'];
                            echo date('Y-m-d', $sss);
                            ?></span></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <!--------分页------>
    <div class="pagg">
        <?php
        if (isset($_GET['a1'])) {
            if ($pag['pagecount'] > 1) {
                echo $prr['info'];
            }
        } else {
            echo $ppp['info'];
        }
        ?>
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