<?php
include 'islogin.php';
include '../inc/db.php';
if (isset($_GET['id'])) {
    $aa = $_GET['id'];
    $oo = $_GET['post'];
    deletebyid('db_post', $aa);
    delete('db_postnew', "post='$oo'");
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
    <style>
        .ss {
            color: red;
            font-weight: bloder
        }
    </style>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">职位发布</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div class="itab">
            <ul>
                <li><a href="postadd.php">添加求职职位</a></li>
                <li><a href="#" class="selected">详细求职职位</a></li>
            </ul>
        </div>
        <table class="tablelist" style="margin-top:10px">
            <thead>
            <tr>
                <th>ID<i class="sort"><img src="images/px.gif"/></i></th>
                <th>职位名称</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $ad = queryall('db_post', '*', '1=1', 'order by id desc');
            $zh = queryall('db_postnew', 'post');
            foreach ($zh as $vv) {
                $two[] = $vv['post'];
            }
            foreach ($ad as $v) {
                $first[] = $v['post'];
                $ff = end($first);
                ?>
                <tr>
                    <td><?= $v['id'] ?></td>
                    <td><?= $v['post'] ?></td>
                    <td width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="postadmin.php?id=<?= $v['id'] ?>&post=<?= $ff ?>" onclick="return confirm('确认要删除吗？')"
                           class="tablelink">删除</a>&nbsp;&nbsp;&nbsp
                        <?php
                        if (in_array($ff, $two)) {
                            printf('<a href="work.php?post=%s"  class="tablelink ss">已有招聘信息,去查看</a>', $ff);
                        } else {
                            printf('<a href="workadd.php?c1=%s"  class="tablelink">添加招聘信息</a>', $ff);
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
</div>


</body>
</html>
