<?php
include 'islogin.php';
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>添加广告展示</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">广告管理</a></li>
        <li><a href="#">新增广告展示</a></li>
    </ul>
</div>
<div class="formbody">
    <div class="formtitle"><span>新增广告展示条目</span></div>
    <form action="adsave.php" method="post" enctype="multipart/form-data">
        <ul class="forminfo">
            <li><label>标题文本</label><input name="title" type="text" class="dfinput"><i>标题不能超过30个字符</i></li>
            <li><label>链接地址</label><input name="url" type="text" class="dfinput"><i>多个关键字用,隔开</i></li>
            <li><label>链接地址</label><input type="file" name="img"><i>(图片格式为jpg,尺寸：1600 * 408)</i></li>
            <li><label>是否显示</label><cite><input name="flag" type="radio" value="y" checked="checked"/>是&nbsp;&nbsp;&nbsp;&nbsp;<input
                        name="flag" type="radio" value="n"/>否</cite></li>
            <li><label>&nbsp;</label><input type="submit" class="btn" value="确认保存">&nbsp;&nbsp;<input type="reset"
                                                                                                      class="btn"
                                                                                                      value="重置"></li>
        </ul>
    </form>
</div>
</body>
</html>
