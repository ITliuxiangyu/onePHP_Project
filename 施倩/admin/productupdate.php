<?php
include 'islogin.php';
include '../inc/db.php';
$id = $_GET['id'];
$pro = query('db_product', '*', 'id=' . $id);
$cc1 = isset($_GET['c1']) ? $_GET['c1'] : $pro[0]['class1'];
?>
<!DOCTYPE html>
<html lange="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>修改信息</title>
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
        .uew-select {
            float: right;
        }

        .aa {
            width: 175px;
        }
    </style>
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">修改产品信息</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="productupdatesave.php" method="post" enctype="multipart/form-data">
                <ul class="forminfo">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <li style="width:400px"><label>产品一级类别：</label><input type="text" name="class1" value="<?= $cc1 ?>"
                                                                         class="dfinput aa">
                        <select onchange="location.href='productupdate.php?id=<?= $_GET['id'] ?>&c1='+this.value"
                                class="select2">
                            <option>------请选择--------</option>
                            <?php
                            $c = queryall('db_product', 'distinct class1');
                            foreach ($c as $v) {
                                $ck = $v['class1'] == $cc1 ? 'selected' : '';
                                printf('<option value="%s"  %s>%s</option>', $v['class1'], $ck, $v['class1']);
                            }
                            ?>
                        </select></li>
                    <li style="width:400px"><label> 产品二级类别</label>
                        <input type="text" name="class2" value="<?= $pro[0]['class2'] ?>" class="dfinput aa">
                        <select onchange="$(this).parent().prev().val($(this).val())" class="select2">
                            <?php
                            $c = queryall('db_product', 'distinct class2', "class1='$cc1'");
                            foreach ($c as $v) {
                                printf('<option value="%s">%s</option>', $v['class2'], $v['class2']);
                            }
                            ?>
                        </select>
                    </li>
                    <li><label>产品名称</label>
                        <input type="text" name="name" placeholder="产品名称" value="<?= $pro[0]['name'] ?>"
                               class="dfinput">
                    </li>
                    <li style="margin-top:25px"><label>产品图片</label>
                        <input type="file" name="img[]" multiple><i>图片格式为jpg,尺寸： * </i>
                    </li>
                    <li><label>是否显示</label>
                        <label><input type="radio" name="flag" value="y" <?php if ($pro[0]['flag'] == 'y') {
                                echo "checked";
                            } else {
                                echo "";
                            } ?>>是</label>
                        <label><input type="radio" name="flag" value="n"<?php if ($pro[0]['flag'] == 'n') {
                                echo "checked";
                            } else {
                                echo "";
                            } ?>>否</label>
                    </li>
                    <li><label>产品介绍</label>
                    <li style="width:950px">
                        <script id="container" name="intro" type="text/plain" style="width:100%"></script>
                        <script>
                            var cfg = {
                                emotionLocalization: true,
                                charset: 'utf-8',
                                initialContent: '<?=$pro[0]['intro']?>', /*当前编辑器默认值为 user text 如果删除则默认值为 欢迎使用ueditor!*/
                                autoClearinitialContent: true,
                                lang: 'zh-cn',
                                initialFrameHeight: 350,
                                enableAutoSave: false,
                                saveInterval: 50000,
                                wordCount: false,
                                elementPathEnabled: false
                            };
                            var ue = UE.getEditor('container', cfg);
                        </script>
                    <li>
                    </li>
                    <li><label>&nbsp;</label><input type="submit" value="提交" class="btn">&nbsp;&nbsp;
                        <input type="reset" value="重置" class="btn">&nbsp;&nbsp;
                        <input type="button" value="查看广告展示" onclick="location.href='productadmin.php'" class="btn"></li>
                </ul>
        </div>
</body>
</html>
