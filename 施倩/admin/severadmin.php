<?php
include 'islogin.php';
include '../inc/db.php';
if (isset($_GET['iiid'])) {
    $v = $_GET['iiid'];
    delete('db_service', 'id=' . $v);
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
        <li><a href="#">在线留言</a></li>
    </ul>
</div>
<div class="rightinfo">
    <?php
    if (isset($_GET['ww'])) {
        $rw = "rw='n'";
        $a = 'n';
    } else {
        $rw = '1=1';
        $a = '1=1';
    }
    $nn = rpp('db_service', 1, '*', $rw, 'order by id desc', "rw=$a&");
    $p = $nn['result'];
    ?>
    <div class="tools">
        <ul class="toolbar">
            <li><span><a href="severadmin.php?iiid=<?= $p[0]['id'] ?>"><img src="images/t03.png"/></span>删除</a></li>
        </ul>
    </div>
    <table class="tablelist" style="margin-top:10px">
        <thead>
        <tr>
            <th width="100">姓名</th>
            <th><?= $p[0]['name'] ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>性别</td>
            <td><?= $p[0]['sex'] ?></td>
        </tr>
        <tr>
            <td>单位</td>
            <td><?= $p[0]['work'] ?></td>
        </tr>
        <tr>
            <td>地址</td>
            <td><?= $p[0]['address'] ?></td>
        </tr>
        <tr>
            <td>电话</td>
            <td><?= $p[0]['tel'] ?></td>
        </tr>
        <tr>
            <td>传真</td>
            <td><?= $p[0]['fax'] ?></td>
        </tr>
        <tr>
            <td>EMAIL</td>
            <td><?= $p[0]['email'] ?></td>
        </tr>
        <tr>
            <td>公司网址</td>
            <td><?= $p[0]['net'] ?></td>
        </tr>
        <tr>
            <td>主题</td>
            <td><?= $p[0]['title'] ?></td>
        </tr>
        <tr>
            <td>留言</td>
            <td><?= $p[0]['message'] ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
                $id = $p[0]['id'];
                $aa = ['rw' => 'y'];
                update('db_service', $aa, "id='$id'");
                echo $nn['info'];
                ?>
            </td>
        </tr>
        </tbody>
    </table>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</body>
</html>
