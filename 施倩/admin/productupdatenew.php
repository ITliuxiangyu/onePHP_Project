<?php
include 'islogin.php';
include '../inc/db.php';
$ss = $_GET['id'];
$aa = query('db_new', '*', "id='$ss'");
$cc1 = isset($_GET['c1']) ? $_GET['c1'] : $aa[0]['class'];
?>
<!DOCTYPE html>
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
        <li><a href="#">新闻修改</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <ul class="forminfo">
                <form action="productnewupdatesave.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="time" value="<?= time() ?>">
                    <input type="hidden" name="id" value="<?= $ss ?>">
                    <li style="width:400px"><label> 产品类别</label>
                        <input type="text" name="class" value="<?= $cc1 ?>" class="dfinput aa">
                        <select onchange="location.href='productadd.php?c1='+this.value" class="select2">
                            <option>------请选择--------</option>
                            <?php
                            $c = queryall('db_new', 'distinct class');
                            foreach ($c as $v) {
                                $ck = $v['class'] == $cc1 ? 'selected' : '';
                                printf('<option value="%s"  %s>%s</option>', $v['class'], $ck, $v['class']);
                            }
                            ?>
                        </select>
                    </li>
                    <li style="width:400px"><label>产品类型</label>
                        <input type="text" name="typ" placeholder="产品类型" value="<?= $aa[0]['typ'] ?>"
                               class="dfinput aa">
                        <select onchange="$(this).prev().val($(this).val())" class="select2">
                            <option>------请选择--------</option>
                            <?php
                            $c = queryall('db_new', 'distinct typ', "class='$cc1'");
                            foreach ($c as $v) {
                                printf('<option value="%s">%s</option>', $v['typ'], $v['typ']);
                            }
                            ?>
                        </select>
                    </li>
                    <li><label> 产品标题</label>
                        <input type="text" name="title" placeholder="产品名称" size="70" value="<?= $aa[0]['title'] ?>"
                               class="dfinput">
                    </li>
                    <li><label>是否显示</label>
                        <label><input type="radio" name="flag" value="y" <?php if ($aa[0]['flag'] == 'y') {
                                echo "checked";
                            } else {
                                echo "";
                            } ?>>是</label>
                        <label><input type="radio" name="flag" value="n" <?php if ($aa[0]['flag'] == 'n') {
                                echo "checked";
                            } else {
                                echo "";
                            } ?>>否</label>
                    </li>
                    <li><label>产品图片</label>
                    <li style="width:950px">
                        <script id="container" name="cont" type="text/plain" style="width:100%"></script>
                        <script>
                            var cfg = {
                                emotionLocalization: true,
                                charset: 'utf-8',
                                initialContent: '<?=$aa[0]['cont']?>', /*当前编辑器默认值为 user text 如果删除则默认值为 欢迎使用ueditor!*/
                                autoClearinitialContent: false,
                                lang: 'zh-cn',
                                initialFrameHeight: 350,
                                enableAutoSave: false,
                                saveInterval: 50000,
                                initialFrameWidth: 850,
                                wordCount: false,
                                elementPathEnabled: false,
                                toolbars: [[
                                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                                    'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                                    'directionalityltr', 'directionalityrtl', 'indent', '|',
                                    'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                                    'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                                    'simpleupload', 'insertimage', 'emotion', 'scrawl',
                                ]]
                            };
                            var ue = UE.getEditor('container', cfg);
                        </script>
                    </li>
                    </li>
                    <li>
                        <label>&nbsp;</label>
                        <input type="submit" value="提交" class="btn">&nbsp;&nbsp;
                        <input type="reset" value="重置" class="btn">&nbsp;&nbsp;
                        <input type="button" value="查看广告展示" onclick="location.href='productadmin.php'" class="btn">
                    </li>
                </form>
            </ul>
        </div>
        </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>
