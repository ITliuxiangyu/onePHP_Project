<?php
include 'islogin.php';
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>产品展示</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <style>
        .toolbar {
            margin-left: 25px
        }

        .toolbar li a {
            display: block;
            height: 50px
        }

        .toolbar li a img {
            margin-top: 5px;
            margin-left: -10px;
        }

        .toolbar li a span {
            float: right;
            margin: 0 0 0 -37px
        }

        .click {
            cursor: pointer
        }
    </style>
    <script language="javascript">
        $(function () {
            //导航切换
            $(".imglist li").click(function () {
                $(".imglist li.selected").removeClass("selected")
                $(this).addClass("selected");
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".click").click(function () {
                $(".tip").fadeIn(200);
                $("input[name=aa]").click(function () {
                    location.href = "productadd.php";
                });
            });
            $(".tiptop a").click(function () {
                $(".tip").fadeOut(200);
            });
            $(".sure").click(function () {
                $(".tip").fadeOut(100);
            });
            $(".cancel").click(function () {
                $(".tip").fadeOut(100);
            });
        });
        $(function () {
            $('label').click(function () {
                var c = $(this).find('input');
                var fid = $(this).attr('fid');
                var fl = $(this).attr('flag');
                if (c.is(':checked')) {
                    $(this).css('opacity', 1);
                    $.post('adflag.php', {pid: fid, flag: fl});
                } else {
                    $(this).css('opacity', .5);
                    $.post('adflag.php', {pid: fid, flag: fl});
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
        <li><a href="#">图片列表</a></li>
    </ul>
</div>
<div class="rightinfo">
    <div class="tools">
        <ul class="toolbar1">
            <li class="click"><span><img src="images/t01.png"/></span>添加</li>
        </ul>
    </div>
    <table class="imgtable">
        <thead>
        <tr>
            <th width="100px;">id</th>
            <th>产品图片</th>
            <th>产品名称</th>
            <th>主类</th>
            <th>二级类</th>
            <th>是否显示</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include '../inc/db.php';
        if (isset($_GET['idd'])) {
            $id = $_GET['idd'];
            $iimg = queryall('db_product_img', 'img', 'pid=' . $id);
            foreach ($iimg as $v) {
                $nn = $v['img'];
                @unlink('../upload/product/small/' . $nn);
                @unlink('../upload/produwct/middle/' . $nn);
                @unlink('../upload/product/large/' . $nn);
            }
            delete('db_product_img', 'pid=' . $id);
            delete('db_product', 'id=' . $id);
        }
        $dd = rpp('db_product', 6, '*', '1=1', 'order by id desc');
        $ad = $dd['result'];
        //$ad=queryall('db_product','*','1=1','order by id desc');
        foreach ($ad as $v) {
            ?>
            <tr>
                <td class="imgtd"><?= $v['id'] ?></td>
                <?php
                $img = query('db_product_img', '*', 'id=' . $v['id'], '', 1);
                ?>
                <td width="100"><img src="../upload/product/small/<?= $img[0]['img'] ?>" width="80"></td>
                <td><?= $v['name'] ?></td>
                <td><?= $v['class1'] ?></td>
                <td><?= $v['class2'] ?></td>
                <td>
                    <label fid="<?= $v['id'] ?>" flag="<?= $v['flag'] ?>">
                        <input type="checkbox" <?php if ($v['flag'] == 'y') echo "checked"; ?>>显示
                    </label>
                </td>
                <td width="320">
                    <ul class="toolbar">
                        <li>
                            <a href="productadmin.php?idd=<?= $v['id'] ?>" onclick="return confirm('确认要删除吗？')">
                                <img src="images/t03.png">
                                <span>删除</span>
                            </a>
                            </a>
                        </li>
                        <li>
                            <a href="../product.php?id=<?= $v['id'] ?>">
                                <img src="images/ico06.png">
                                <span>查看产品</span>
                            </a>
                        </li>
                        <li>
                            <a href="productupdate.php?id=<?= $v['id'] ?>">
                                <img src="images/t02.png">
                                <span>修改</span>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
    echo $dd['info'];
    ?>
    <div class="tip">
        <div class="tiptop"><span>提示信息</span><a></a></div>
        <div class="tipinfo">
            <span><img src="images/ticon.png"/></span>
            <div class="tipright">
                <p>是否确认对信息的添加 ？</p>
                <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
            </div>
        </div>
        <div class="tipbtn">
            <input name="aa" type="button" class="sure" value="确定">&nbsp;
            <input name="" type="button" class="cancel" value="取消"/>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.imgtable tbody tr:odd').addClass('odd');
</script>
</body>
</html>
