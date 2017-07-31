<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>欢迎登录后台管理系统</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/cloud.js"></script>
    <script>
        $(function () {
            $('.loginbox').css({'position': 'absolute', 'left': ($(window).width() - 692) / 2});
            $(window).resize(function () {
                $('.loginbox').css({'position': 'absolute', 'left': ($(window).width() - 692) / 2});
            })
        });
    </script>
</head>
<body
    style="background-color:#1c77ac; background-image:url(images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">
<div id="mainBody">
    <div id="cloud1" class="cloud"></div>
    <div id="cloud2" class="cloud"></div>
</div>
<div class="logintop">
    <span>欢迎登录后台管理界面平台</span>
    <ul>
        <li><a href="#">回首页</a></li>
        <li><a href="#">帮助</a></li>
        <li><a href="#">关于</a></li>
    </ul>
</div>
<div class="loginbody">
    <span class="systemlogo"></span>
    <div class="loginbox">
        <form action="checklogin.php" method="post">
            <ul>
                <li><input name="account" placeholder="账号" type="text" autofocus class="loginuser"></li>
                <li><input name="pass" type="password" class="loginpwd" placeholder="密码"></li>
                <li><input name="check" type="text" class="loginpwd loginck" placeholder="验证码">&nbsp;<img
                        src="../inc/code.php" align="absmiddle" alt="" title="点击，更换一张!!!" style="cursor:pointer"
                        onclick="this.src='../inc/code.php?v='+new Date()"></li>
                <li><input type="submit" class="loginbtn" value="登 录"><label></li>
            </ul>
        </form>
    </div>
</div>
<div class="loginbm">版权所有 2016 abc.com</div>
</body>
</html>
