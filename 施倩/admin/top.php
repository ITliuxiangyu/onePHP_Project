<?php
include 'islogin.php';
include '../inc/db.php';
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script>
        $(function () {
            //顶部导航切换
            $(".nav li a").click(function () {
                $(".nav li a.selected").removeClass("selected")
                $(this).addClass("selected");
            })
        })
    </script>


</head>

<body style="background:url(images/topbg.gif) repeat-x;">

<div class="topleft">
    <a href="main.html" target="_parent"><img src="images/logo.png" title="系统首页"/></a>
</div>

<ul class="nav">
    <li><a href="default.html" target="rightFrame" class="selected"><img src="images/icon01.png" title="工作台"/>
            <h2>工作台</h2></a></li>
    <li><a href="imgtable.html" target="rightFrame"><img src="images/icon02.png" title="模型管理"/>
            <h2>模型管理</h2></a></li>
    <li><a href="imglist.html" target="rightFrame"><img src="images/icon03.png" title="模块设计"/>
            <h2>模块设计</h2></a></li>
    <li><a href="tools.html" target="rightFrame"><img src="images/icon04.png" title="常用工具"/>
            <h2>常用工具</h2></a></li>
    <li><a href="computer.html" target="rightFrame"><img src="images/icon05.png" title="文件管理"/>
            <h2>文件管理</h2></a></li>
    <li><a href="tab.html" target="rightFrame"><img src="images/icon06.png" title="系统设置"/>
            <h2>系统设置</h2></a>
    </li>
</ul>
<div class="topright">
    <ul>
        <li><span><img src="images/help.png" title="帮助" class="helpimg"/></span><a href="#">帮助</a></li>
        <li><a href="#">关于</a></li>
        <li><a href="logout.php" target="_top">退出</a></li>
    </ul>

    <div class="user">
        <span><?= $_SESSION['admin'][0] ?></span>
        <i>消息</i>
        <?php
        $num = rcount('db_service', "rw='n'");
        $nn = "severadmin.php?ww='n'";
        ?>
        <b><a href="<?php if ($num == 0) {
                echo 'javascript:void(0)';
            } else {
                echo $nn;
            } ?>" style="color:#ffffff" target="rightFrame"><?= $num ?></a></b>
    </div>
</div>
</body>
</html>
