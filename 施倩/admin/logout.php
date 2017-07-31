<?php
session_start();
include '../inc/db.php';
//将本次，记录日志
$log['title'] = '系统退出';
$log['ltime'] = time();
$log['lip'] = sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$log['aaccount'] = $_SESSION['admin'][0];
save('db_adminlog', $log);
session_destroy();
header('location:../');