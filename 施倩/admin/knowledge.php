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
                    $.post('adflag.php', {id: fid, flag: fl});
                } else {
                    $(this).css('opacity', .5);
                    $.post('adflag.php', {id: fid, flag: fl});
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
        <li><a href="#">产品知识</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div class="itab">
            <ul>
                <li><a href="knowledgeadd.php">产品知识添加</a></li>
                <li><a href="#" class="selected">产品知识详情</a></li>
            </ul>
        </div>
        <table class="tablelist" style="margin-top:10px">
            <thead>
            <tr>
                <th>ID<i class="sort"><img src="images/px.gif"/></i></th>
                <th>客户服务类</th>
                <th>标题</th>
                <th>时间</th>
                <th>是否显示</th>
                <th width="500">职位的内容</th>
                <th width="200">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($_GET['id'])) {
                $v = $_GET['id'];
                delete('db_knowledge', 'id=' . $v);
            }
            $nn = rpp('db_knowledge', 5, "id,class,name,flag,time,ss(cont,30,'...')t", '1=1', 'order by id desc');
            $p = $nn['result'];
            foreach ($p as $v) {
                ?>
                <tr>
                    <td><?= $v['id'] ?></td>
                    <td><?= $v['class'] ?></td>
                    <td><?= $v['name'] ?></td>
                    <td><?= date('Y-m-d H:i:s', $v['time']) ?></td>
                    <td>
                        <label fid="<?= $v['id'] ?>" flag="<?= $v['flag'] ?>">
                            <input type="checkbox" <?php if ($v['flag'] == 'y') {
                                echo "checked";
                            } else {
                                echo '';
                            } ?>>显示
                        </label>
                    </td>
                    <td><?= $v['t'] ?></td>
                    <td>
                        <a class="chakan" href="knowledge.php?id=<?= $p[0]['id'] ?>" class="tablelink">删除信息</a>
                        <a class="chakan" href="knowledgeupdate.php?id=<?= $p[0]['id'] ?>" class="tablelink">更改信息</a>
                        <a class="chakan" href="#" class="tablelink">查看页面信息</a>
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
