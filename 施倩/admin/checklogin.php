<?php
session_start();
$post = strtolower($_SESSION['ck']);
$session = strtolower($_POST['check']);
if ($post != $session) {
    echo '验证码错误';
} else {
    include '../inc/db.php';
    $stmt = $db->prepare("select  count(*) c,tname,atime,aip,face,anum from db_admin where account=?and pass=?");
    $stmt->execute([$_POST['account'], m($_POST['pass'], $_POST['account'])]);
    $rr = $stmt->fetchAll(2);
    if ($rr[0]['c'] == 1) {
        $a = $_POST['account'];
        $_SESSION['admin'] = [$a, $rr[0]['tname'], long2ip($rr[0]['aip']), date('Y-m-d H:i:s', $rr[0]['atime']), $rr[0]['face']];
        $up['atime'] = time();
        $up['aip'] = sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
        $up['anum'] = $rr[0]['anum'] + 1;
        update('db_admin', $up, "account='$a'");
        $log['title'] = '登录';
        $log['ltime'] = time();
        $log['lip'] = sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
        $log['aaccount'] = $a;
        print_r($log);
        save('db_adminlog', $log);
        header('location:main.php');
    } else {
        echo '密码错误与账户密码';
    }
}