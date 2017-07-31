<?php
include 'islogin.php';
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
        <li><a href="#">职位添加</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div class="itab">
            <ul>
                <li><a href="#tab1" class="selected">添加求职职位</a></li>
                <li><a href="postadmin.php">详细求职职位</a></li>
            </ul>
        </div>
        <div id="tab1" class="tabson">
            <ul class="forminfo">
                <form action="postaddsave.php" method="post">
                    <li style="width:400px"><label>职位名称</label>
                        <input type="text" name="post" placeholder="职位名称" class="dfinput aa">
                    </li>
                    <li>
                        <label>&nbsp;</label>
                        <input type="submit" value="提交" class="btn">&nbsp;&nbsp;
                        <input type="reset" value="重置" class="btn">&nbsp;&nbsp;
                        <input type="button" value="查看展示" onclick="location.href='postadmin.php'" class="btn">
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
