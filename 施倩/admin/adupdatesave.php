<?php
include 'islogin.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>修改广告展示</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">修改广告展示</a></li>
    </ul>
</div>
<?php
include '../inc/db.php';
$ad = query('db_ad', '*', 'id=' . $_GET['id']);
?>
<div class="formbody">
    <div class="formtitle"><span>基本信息</span></div>
    <form action="adupdate.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="img" value="<?= $ad[0]['img'] ?>">
        <ul class="forminfo">
            <li><label>图片标题</label><input type="text" name="title" placeholder="广告展示标题" value="<?= $ad[0]['title'] ?>"
                                          class="dfinput"></li>
            <li><label>链接地址</label><input type="text" name="url" placeholder="链接地址" value="<?= $ad[0]['url'] ?>"
                                          class="dfinput"></li>
            <li><label>展示图片</label><img src="../upload/ad/<?= $ad[0]['img'] ?>" width="500" alt=""><i>(图片格式为jpg，尺寸为1660*48)</i>
            </li>
            <li><label>是否显示</label><cite><label><input type="radio" name="flag"
                                                       value="y" <?php if ($ad[0]['flag'] == 'y') {
                            echo "checked";
                        } else {
                            echo "";
                        } ?>>是</label>
                    <label><input type="radio" name="flag" value="n"<?php if ($ad[0]['flag'] == 'n') {
                            echo 'checked';
                        } else {
                            echo '';
                        } ?>>否</label></cite></li>
            <li><label>&nbsp;</label><input type="submit" value="提交" class="btn">&nbsp;&nbsp;
                <input type="reset" value="重置" class="btn">&nbsp;&nbsp;
                <input type="button" value="查看广告展示" onclick="location.href='adadmin.php'" class="btn"></li>
        </ul>
    </form>
</div>
</body>
</html>
