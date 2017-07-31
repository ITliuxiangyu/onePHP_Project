<?php
include 'islogin.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script>
        $(function () {
            //导航切换
            $(".menuson li").click(function () {
                $(".menuson li.active").removeClass("active")
                $(this).addClass("active");
            });

            $('.title').click(function () {
                var $ul = $(this).next('ul');
                $('dd').find('ul').slideUp();
                if ($ul.is(':visible')) {
                    $(this).next('ul').slideUp();
                } else {
                    $(this).next('ul').slideDown();
                }
            });
        })
    </script>
    <style>
        .ht {
            width: 180px;
            text-align: center;
        }

        .face {
            width: 180px;
            text-align: center;
        }

        .face img {
            width: 80px;
            border-radius: 50%;
        }
    </style>
</head>

<body style="background:#f0f9fd;">
<div class="lefttop"><span></span>后台管理系统</div>
<div class="face">
    <img src="images/face/<?= $_SESSION['admin'][4] ?>" alt="">
</div>
<h3 class="ht"><?= $_SESSION['admin'][1] ?></h3>
<dl class="leftmenu">
    <dd>
        <div class="title"><span><img src="images/leftico01.png"/></span>管理信息</div>
        <ul class="menuson">
            <li class="active"><cite></cite><a href="welcome.html" target="rightFrame">数据列表</a><i></i></li>
            <li><cite></cite><a href="productadd.php" target="rightFrame">发布产品展示</a><i></i></li>
            <li><cite></cite><a href="productadmin.php" target="rightFrame">查看所有产品</a><i></i></li>
            <li><cite></cite><a href="productnewadmin.php" target="rightFrame">产品新闻管理</a><i></i></li>
            <li><cite></cite><a href="newadmin.php" target="rightFrame">新闻信息</a><i></i></li>
            <li><cite></cite><a href="knowledge.php" target="rightFrame">知识产品信息</a><i></i></li>
            <li><cite></cite><a href="company.php" target="rightFrame">公司信息管理</a><i></i></li>
        </ul>
    </dd>
    <dd>
        <div class="title">
            <span><img src="images/leftico02.png"/></span>广告管理
        </div>
        <ul class="menuson">
            <li><cite></cite><a href="add.php" target="rightFrame">发布广告展示</a><i></i></li>
            <li><cite></cite><a href="adadmin.php" target="rightFrame">查看所有广告</a><i></i></li>
        </ul>
    </dd>
    <dd>
        <div class="title"><span><img src="images/leftico02.png"/></span>求职招聘</div>
        <ul class="menuson">
            <li><cite></cite><a href="postadmin.php" target="rightFrame">查看求职职位</a><i></i></li>
            <li><cite></cite><a href="work.php" target="rightFrame">招聘信息发布</a><i></i></li>
            <li><cite></cite><a href="post.php" target="rightFrame">求职简历</a><i></i></li>
        </ul>
    </dd>
    <dd>
        <div class="title"><span><img src="images/leftico03.png"/></span>留言</div>
        <ul class="menuson">
            <li><cite></cite><a href="severadmin.php" target="rightFrame">留言</a><i></i></li>
        </ul>
    </dd>
</dl>
</body>
</html>
