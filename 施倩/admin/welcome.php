<?php
include 'islogin.php';
include '../inc/db.php';
include '../inc/f.php';
include '../inc/i.php';
$aa = $_SESSION['admin'][0];
if (isset($_FILES['img'])) {
    if ($_FILES['img']['error'] != 4) {
        $nn = up('images/face/', 2);
        $en = end($nn);
        update('db_admin', ['face' => $en], 'account=' . $aa);
        $yuan = $_SESSION['admin'][4];
        @unlink('images/face/' . $yuan);
        thumb('images/face/' . $en, 110, 110, 'images/face/' . $en);
        $_SESSION['admin'][4] = $en;
        header('location:welcome.php');
    }
}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>欢迎登陆</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script>
        $(function () {
            $('.as').click(function () {
                parent.location.reload();
            });
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
    </ul>
</div>
<div class="mainindex">
    <div class="welinfo"><b><?= $_SESSION['admin'][1] ?> &nbsp;
            <?php
            $tt = date('H', time());
            if ($tt >= 6 && $tt <= 8) {
                echo '早上好，欢迎使用信息管理系统';
            } elseif ($tt >= 9 && $tt <= 12) {
                echo '上午好，欢迎使用信息管理系统';
            } else if ($tt > 12 && $tt < 14) {
                echo '中午好，欢迎使用信息管理系统';
            } else if ($tt >= 14 && $tt < 18) {
                echo '下午好，欢迎使用信息管理系统';
            } else {
                echo '晚上好，欢迎使用信息管理系统';
            }
            ?>
        </b></div>

    <div class="welinfo">
        <span><img src="images/time.png" alt="时间"/></span>
        <i>您上次登录的时间：<?= $_SESSION['admin'][3] ?>&nbsp;&nbsp;上次登录IP：<?= $_SESSION['admin'][2] ?></i>
    </div>

    <div class="xline"></div>
    <div class="box"></div>

    <div class="welinfo">
        <span><img src="images/dp.png" alt="提醒"/></span>
        <b>Uimaker信息管理系统使用指南</b>
    </div>

    <ul class="infolist">
        <li><span>您可以快速进行文章发布管理操作</span><a href="newadd.php" class="ibtn">发布或管理文章</a></li>
        <li><span>您可以快速发布产品</span><a href="productadmin.php" class="ibtn">发布或管理产品</a></li>
        <li><span>您可以进行密码修改、账户设置等操作</span><a class="ibtn">账户管理</a></li>
    </ul>

    <div class="xline"></div>
    <ul class="infolist">
        <li><span>更改头像</span></li>
        <li style="height:110px">
            <?php
            $qu = query('db_admin', 'face', 'account=' . $aa);
            $im = $qu[0]['face'];
            //echo 'images/face/'.$im;
            ?>
            <img src="<?= 'images/face/' . $im ?>" style="border-radius:50%">
        </li>
        <form method="post" action="" enctype="multipart/form-data">
            <li><input type="file" name="img"></li>
            <li><input type="submit" value="提交" class="ibtn as">&nbsp;&nbsp;
                <input type="reset" value="重置" class="ibtn"></li>
        </form>
    </ul>
</body>
</html>
