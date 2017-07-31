<?php
include 'islogin.php';
include '../inc/db.php';
?>
<!DOCTYPE html >
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>无标题文档</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/select.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="js/select-ui.min.js"></script>
    <script src="../editor/ueditor.config.js"></script>
    <script src="../editor/ueditor.all.js"></script>
    <script src="../editor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
        KE.show({
            id: 'content7',
            cssPath: './index.css'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function (e) {
            $(".select1").uedSelect({
                width: 345
            });
            $(".select2").uedSelect({
                width: 130
            });
            $(".select3").uedSelect({
                width: 100
            });
        });
    </script>
    <script>
        $(function () {
            $('label').click(function () {
                var c = $(this).find('input');
                var fid = $(this).attr('fid');
                var fl = $(this).attr('flag');
                if (c.is(':checked')) {
                    $(this).css('opacity', 1);
                    $.post('adflag.php', {pnid: fid, flag: fl});
                } else {
                    $(this).css('opacity', .5);
                    $.post('adflag.php', {pnid: fid, flag: fl});
                }
            });
            $('label').css('opacity', .5);
            $('input:checked').parent().css('opacity', 1);
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">产品中心</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div class="itab">
            <ul>
                <li><a href="productnewadd.php">产品新闻添加</a></li>
                <li><a href="#" class="selected">产品新闻详情</a></li>
            </ul>
        </div>
        <table class="tablelist" style="margin-top:10px">
            <thead>
            <tr>
                <th>ID<i class="sort"><img src="images/px.gif"/></i></th>
                <th>产品名称</th>
                <th>类别</th>
                <th>类型</th>
                <th>上传时间</th>
                <th>是否显示</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($_GET['idd'])) {
                $id = $_GET['idd'];
                delete('db_new', 'id=' . $id);
            }
            $add = rpp('db_new', 5, '*', '1=1', 'order by id desc');
            $ad = $add['result'];
            foreach ($ad as $v) {
                ?>
                <tr>
                    <td><?= $v['id'] ?></td>
                    <td><?= $v['title'] ?></td>
                    <td><?= $v['class'] ?></td>
                    <td><?= $v['typ'] ?></td>
                    <td><?= date('Y-m-d H:i:s', $v['time']) ?></td>
                    <td>
                        <label fid="<?= $v['id'] ?>" flag="<?= $v['flag'] ?>">
                            <input type="checkbox" <?php if ($v['flag'] == 'y') echo "checked"; ?>>显示
                        </label>
                    </td>
                    <td>
                        <a href="productnewadmin.php?idd=<?= $v['id'] ?>" onclick="return confirm('确认要删除吗？')"
                           class="tablelink">删除</a>
                        <a href="productupdatenew.php?id=<?= $v['id'] ?>" class="tablelink">编辑</a>
                        <a href="../productnew.php?id=<?= $v['id'] ?>" class="tablelink">查看</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
        echo $add['info'];
        ?>
    </div>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</div>
</body>
</html>
