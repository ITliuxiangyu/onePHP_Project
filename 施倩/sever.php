<?php
include 'inc/db.php';
$cc = isset($_GET['p']) ? $_GET['p'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>在线回答</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel="stylesheet" href="css/cssph.css" media="(max-width:599px)">
    <script type="text/javascript" src="js/jquery1.42.min.js"></script>
    <script src="js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="js/aa.js"></script>
    <script>
        $(function () {
            $('input[type=submit]').click(function () {
                var vv = $('b').parent().next().children().val();
                if (vv == '') {
                    alert('带"*"的都为必填项');
                    return false;
                } else {
                    alert('提问成功,等待回答！');
                    return true;
                }
            });
        });
    </script>
</head>
<body>
<div class="header">
    <?php
    include 'top.php';
    include 'nav.php';
    ?>
</div>
<div class="zoujing">
    <div class="zj">
        <div class="zjL">
            <div class="toolbar">
                <div class="menu-button"></div>
            </div>
            <p>客户服务</p>
            <ul>
                <li><a href="knowledge.html">产品知识</a></li>
                <li><a href="sever.html">在线回答</a></li>
            </ul>
        </div>
        <div class="zjR">
            <div class="zj1">毛遂自荐<span><a href="index.html">首页 </a>&gt;<a href="knowledge.html"> 客户服务 </a>&gt;<a
                        href="sever.html">在线回答</a></span></div>
            <div class="maosui">
                <div class="kehu">
                    <span class="kehu1">客户在线问答</span>
                    <span class="kehu2">注意：带 <b>*</b> 为必填项！</span>
                </div>
                <table class="table1" width="670">
                    <form action="admin/sever.html" method="post">
                        <tr>
                            <td width="80">&nbsp;&nbsp;<b>*</b> 姓名：</td>
                            <td width="240">
                                <input type="text" name="name" value="" style="width:149px;">
                            </td>
                            <td width="70">&nbsp;&nbsp;性别：</td>
                            <td width="280">
                                <select name="sex" value="">
                                    <option selected>先生</option>
                                    <option>女士</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;<b>*</b> 单位：</td>
                            <td>
                                <input type="text" name="work" value="" size="20" maxlength="30" style="width:149px;">
                            </td>
                            <td>&nbsp;&nbsp;地址：</td>
                            <td>
                                <input type="text" name="address" value="" size="20" maxlength="30"
                                       style="width:179px;"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;<b>*</b> 电话：</td>
                            <td>
                                <input type="text" name="tel" value="" size="20" maxlength="30"
                                       style="width:149px;height:22px">
                            </td>
                            <td>&nbsp;&nbsp;传真：</td>
                            <td><input type="text" name="fax" value="" size="20" maxlength="30" style="width:179px;">
                            </td>
                        </tr>
                        <tr>
                            <td><b>*</b> 电子邮件：</td>
                            <td>
                                <input type="text" name="email" value="" size="20" maxlength="30"
                                       style="width:149px;height:22px">
                            </td>
                            <td>公司网络：</td>
                            <td><input type="text" name="net" value="" size="20" maxlength="30" style="width:179px;">
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;主题：</td>
                            <td colspan="3">
                                <input type="text" name="title" value="" size="20" maxlength="30"
                                       style="width:490px;height:22px">
                            </td>
                        </tr>
                        <tr>
                            <td width="80">&nbsp;&nbsp;<b>*</b> 留言：</td>
                            <td colspan="3">
                                <textarea type="text" name="message" value=""
                                          style="width:490px;height:80px;margin-top:5px"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <div class="sub">
                                    <input type="submit" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="reset" value="重置">
                                </div>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
<!------------dibu-->
<?php
include 'bottom.php';
?>
</body>
</html>