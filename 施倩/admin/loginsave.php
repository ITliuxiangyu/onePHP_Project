<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
if (isset($_POST['account'])) {
    $p1 = $_POST['pass'];
    $p2 = $_POST['pass2'];
    if ($p1 == $p2) {
        include '../inc/db.php';
        $a = $_POST['account'];
        if (rcount('db_admin', "account='$a'") > 0) {
            echo '账号添加失败，因为已经存在';
        } else {
            unset($_POST['pass2']);
            $_POST['pass'] = m($_POST['pass'], $_POST['account']);
            $_POST['face'] = 'user.jpg';
            $_POST['atime'] = time();
            $_POST['aip'] = sprintf("%u", ip2long('192.168.102.253'));
            $_POST['anum'] = 0;
            save('db_admin', $_POST);
            echo '新账号注册成功!!!';
        }
    } else {
        echo '添加管理员账号，两次不一致';
    }
}
?>
</body>
</html>
