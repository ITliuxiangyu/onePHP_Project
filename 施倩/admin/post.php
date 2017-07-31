<?php
include 'islogin.php';
include '../inc/db.php';
if (isset($_GET['iid'])) {
    $v = $_GET['iid'];
    delete('db_resume', 'id=' . $v);
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
        <li><a href="#">简历信息</a></li>
    </ul>
</div>
<div class="rightinfo">
    <?php
    $nn = rpp('db_resume', 1, '*', '1=1', 'order by id desc');
    $p = $nn['result'];
    ?>
    <div class="tools">
        <ul class="toolbar">
            <li><span><a href="post.php?iid=<?= $p[0]['id'] ?>"><img src="images/t03.png"/></span>删除</a></li>
        </ul>
    </div>
    <table class="tablelist" style="margin-top:10px">
        <thead>
        <tr>
            <th width="100">姓名</th>
            <th><?= $p[0]['pname'] ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>性别</td>
            <td><?= $p[0]['sex'] ?></td>
        </tr>
        <tr>
            <td>籍 贯</td>
            <td><?= $p[0]['native'] ?></td>
        </tr>
        <tr>
            <td>学 历</td>
            <td><?= $p[0]['education'] ?></td>
        </tr>
        <tr>
            <td>身 高</td>
            <td><?= $p[0]['height'] ?></td>
        </tr>
        <tr>
            <td>婚 否</td>
            <td><?= $p[0]['merry'] ?></td>
        </tr>
        <tr>
            <td>特 长</td>
            <td><?= $p[0]['speciality'] ?></td>
        </tr>
        <tr>
            <td>就业状态</td>
            <td><?= $p[0]['job'] ?></td>
        </tr>
        <tr>
            <td>出生年月</td>
            <td><?= $p[0]['birthday'] ?></td>
        </tr>
        <tr>
            <td>政治面貌</td>
            <td><?= $p[0]['face'] ?></td>
        </tr>
        <tr>
            <td>外语水平</td>
            <td><?= $p[0]['english'] ?></td>
        </tr>
        <tr>
            <td>谋求职位</td>
            <td><?= $p[0]['post'] ?></td>
        </tr>
        <tr>
            <td>月薪要求</td>
            <td><?= $p[0]['mony'] ?></td>
        </tr>
        <tr>
            <td>工作方式</td>
            <td><?= $p[0]['way'] ?></td>
        </tr>
        <tr>
            <td>联系电话</td>
            <td><?= $p[0]['tel'] ?></td>
        </tr>
        <tr>
            <td>技术职称</td>
            <td><?= $p[0]['technical'] ?></td>
        </tr>
        <tr>
            <td>毕业院校</td>
            <td><?= $p[0]['school'] ?></td>
        </tr>
        <tr>
            <td>通讯地址</td>
            <td><?= $p[0]['address'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $p[0]['email'] ?></td>
        </tr>
        <tr>
            <td>工作经历</td>
            <td><?= $p[0]['work'] ?></td>
        </tr>
        <tr>
            <td>备注</td>
            <td><?= $p[0]['remark'] ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
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
