<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('content-type: text/html; charset=utf-8');
    echo '<script>';
    echo 'alert("请登录");location.href="login.php";';
    echo '</script>';
    exit;
}
