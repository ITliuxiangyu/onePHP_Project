<?php
include 'islogin.php';
include '../inc/db.php';
$cc1 = isset($_GET['post']) ? $_GET['post'] : '';
if (isset($_GET['iiid'])) {
    $v = $_GET['iiid'];
    delete('db_postnew', 'id=' . $v);
}
?>
<!DOCTYPE html >
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>无标题文档</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <style>
        tr th {
            text-align: center
        }
    </style>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">招聘信息</a></li>
    </ul>
</div>
<div class="rightinfo">
    <?php
    if ($cc1 == '') {
        $c = "1=1";
    } else {
        $c = "post='$cc1'";
    }
    $nn = rpp('db_postnew', 1, '*', $c);
    $aa = $nn['result'];
    ?>
    <div class="tools">
        <ul class="toolbar">
            <li class="click"><a href="workadd.php"><span><img src="images/t01.png"/></span>添加</a></li>
            <li class="click"><a href="workupdate.php?id=<?= $aa[0]['id'] ?>"><span><img src="images/t02.png"/></span>修改</a>
            </li>
            <li><span><a href="work.php?iiid=<?= $aa[0]['id'] ?>"><img src="images/t03.png"/></span>删除</a></li>
            <li><span><a href="../workdetail.php?id=<?= $aa[0]['id'] ?>"><img src="images/t03.png"/></span>查看前台</a></li>
        </ul>
        <ul class="toolbar1">
            <li><a href="javascript:history.go(-1);"><span><img src="images/t05.png"/></span>返回</a></li>
        </ul>

    </div>
    <table class="tablelist" style="margin-top:10px">
        <thead>
        <tr>
            <th><?= $aa[0]['post'] ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>是否显示 <?= $aa[0]['flag'] ?></th>
        </tr>
        <tr>
            <td><?= $aa[0]['intro'] ?></td>
        </tr>
        </tbody>
    </table>
    <?php
    echo $nn['info'];
    ?>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</body>
</html>
