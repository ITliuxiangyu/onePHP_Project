<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>注册</title>
    <style>
        input {
            padding: 5px;
            margin: 5px;
        }
    </style>
</head>
<body>
<h3>新加项目管理员</h3>
<form action="loginsave.php" method="post">
    　　账号：<input type="text" name="account" autofocus placeholder="账号"><br>
    　　密码：<input type="password" name="pass"><br>
    确认密码：<input type="password" name="pass2"><br>
    真实姓名：<input type="text" name="tname" maxlength="10"><br>
    <input type="submit" value="提交">&nbsp;
    <input type="reset" value="重置">&nbsp;
    <input type="button" value="查看管理" onclick="location.href='login.php'">
</form>
</body>
</html>