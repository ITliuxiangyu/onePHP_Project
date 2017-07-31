<?php
include 'islogin.php';
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>修改广告图片</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">广告管理</a></li>
        <li><a href="#">更改广告展示图片</a></li>
    </ul>
</div>
<div class="formbody">
    <div class="formtitle"><span>更改广告展示图片</span></div>
    <form action="adimgsave.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="img" value="<?= $_GET['im'] ?>">
        <ul class="forminfo">
            <li><label>展示图片</label><img src="../upload/ad/<?= $_GET['im'] ?>" alt="" width="500"><i>(图片格式为jpg，尺寸为1660*48）</i>
            </li>
            <li><label>展示图片</label><input type="file" name="nimg"><i>可以不更换</i></li>
            <li><label>链接地址</label><input type="submit" value="提交" class="btn">&nbsp;&nbsp;
                <input type="reset" value="重置" class="btn">&nbsp;&nbsp;
                <input type="button" value="查看广告展示" onclick="location.href='adadmin.php'" class="btn"></li>
        </ul>
    </form>
</div>
</body>
</html>
