<?php
include 'inc/db.php';
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$quer = query('db_product', '*', 'id=' . $id);
$im = query('db_product_img', '*', 'pid=' . $id);
$a = isset($_REQUEST['k']) ? $_REQUEST['k'] : '';
if ($a == "" || $a == "江友企业有限公司") {
    header('location:./');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>搜索</title>
    <?php
    pagecss();
    ?>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/aa.js"></script>
    <script>
        $(function () {
            $('input[type=submit]').click(function () {
                var aa = $(this).prev().val();
                if (aa == '') {
                    alert('请输入你要查询的内容');
                    return false;
                }
            })
        });
    </script>
</head>
<body>
<div class="header">
    <?php
    include 'top.php';
    include 'nav.php';
    ?>
</div>
<!------搜索内容-------------------->
<div class="zoujing">
    <div class="seac">
        <p class="pseac">搜索结果</p>
        <div class="seac1">
            <div class="seac2">
                <div class="seachview">
                    <form action="seach1.html" method="post">
                        <input class="seachv" type="text" name="k" placeholder="<?= $a ?>">
                        <input class="seachvR" type="submit" value="搜索">
                    </form>
                </div>
                <?php
                $count = rcount('db_news', "title like '%$a%'");
                ?>
                <p class="seachjg"><strong>搜索：&nbsp;</strong><span>&nbsp;<?= $a ?>&nbsp;</span>共有<?= $count ?>条结果</p>
                <p class="xianxian"></p>
                <ul>
                    <?php
                    $aa = npp('db_news', 7, "id,class,title,time,fnStripTags(cont,320,'...')t", "title like '%$a%'", 'order by id desc', "k=$a&");
                    foreach ($aa['result'] as $v) {
                        ?>
                        <li><span class="xinwen">[<?= $v['class'] ?>]</span>&nbsp;
                            <a href="newsdeti.html?id=<?= $v['id'] ?>">
                                <?php
                                $tt = $v['title'];
                                $rep = '<b style="color:red">' . $a . '</b>';
                                echo str_replace($a, $rep, $tt);
                                ?>
                            </a>
                            <span class="time"
                                  style="float:none;margin-left:20px"><?= date('Y-m-d H:i:s', $v['time']) ?></span>
                            <p class="seachxin">
                                <?php
                                $ss = $v['t'];
                                echo $ss;
                                ?>
                            </p>
                            <p class="xianxian"></p>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="seachpage">
                    <?php
                    echo $aa['info'];
                    ?>
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
