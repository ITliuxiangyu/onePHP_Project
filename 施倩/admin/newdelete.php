<?php
include '../inc/db.php';
$id = $_GET['id'];
$aa = query('db_news', 'cont', 'id=' . $id);
$ar = $aa[0]['cont'];
$pre = '/\\d{6}\/\d*.jpg/i';
preg_match_all($pre, $ar, $arry);
foreach ($arry[0] as $v) {
    @unlink('../upload/image/' . $v);
}
deletebyid('db_news', $id);
header('location:newadmin.php');