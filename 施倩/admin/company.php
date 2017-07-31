<?php
include 'islogin.php';
include '../inc/db.php';
if (isset($_GET['id'])) {
    $v = $_GET['id'];
    delete('db_company', 'id=' . $v);
}
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
                    $.post('adflag.php', {cid: fid, flag: fl});
                } else {
                    $(this).css('opacity', .5);
                    $.post('adflag.php', {cid: fid, flag: fl});
                }
            });
            $('label').css('opacity', .5);
            $('input:checked').parent().css('opacity', 1)
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">公司信息</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div class="itab">
            <ul>
                <li><a href="companyadd.php">发布信息</a></li>
                <li><a href="#" class="selected">新闻详情</a></li>
            </ul>
        </div>
        <table class="tablelist" style="margin-top:10px">
            <thead>
            <tr>
                <th>ID<i class="sort"><img src="images/px.gif"/></i></th>
                <th>选择类别</th>
                <th>是否显示</th>
                <th>内容信息</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $nn = rpp('db_company', 6, "id,class,flag,ss(cont,50,'...')qq,diff", '1=1', 'order by id desc');
            $p = $nn['result'];
            foreach ($p as $v) {
                $cla = $v['class'];
                ?>
                <tr>
                    <td><?= $v['id'] ?> </td>
                    <td><?= $cla ?></td>
                    <td>
                        <label fid="<?= $v['id'] ?>" flag="<?= $v['flag'] ?>">
                            <input type="checkbox" <?php if ($v['flag'] == 'y') echo "checked"; ?>>显示
                        </label>
                    </td>
                    <td><?= $v['qq'] ?></td>
                    <td>
                        <a class="chakan" href="companyupdate.php?id=<?= $v['id'] ?>" class="tablelink">更改信息</a>
                        <a class="tablelink" href="company.php?id=<?= $v['id'] ?>" onclick="confirm('要删除吗')">删除信息</a>
                        <a class="tablelink" href="<?php if ($v['diff'] == 'c') {
                            echo '../company.php?class=' . $cla;
                        } else {
                            echo '../shehui.php?class=' . $cla;
                        } ?>">查看详细信息</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
        echo $nn['info'];
        ?>
    </div>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</div>
</body>
</html>
