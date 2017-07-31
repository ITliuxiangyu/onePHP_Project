<?php
include '../inc/f.php';
include '../inc/i.php';
include '../inc/db.php';
$f = ups('../upload/product/large/');
if ($f === false || !isset($_POST['intro'])) {
    exit('没有添加图片或产品介绍');
} else if (is_array($f)) {
    $id = saves('db_product', $_POST);
    foreach ($f as $v) {
        thumb('../upload/product/large/' . $v, 130, 130, '../upload/product/small/' . $v);
        thumb('../upload/product/large/' . $v, 300, 300, '../upload/product/middle/' . $v);
        save('db_product_img', ['img' => $v, 'pid' => $id]);
    }
} else {
    $id = saves('db_product', $_POST);
    thumb('../upload/product/large/' . $f, 130, 130, '../upload/product/small/' . $f);
    thumb('../upload/product/large/' . $f, 300, 300, '../upload/product/middle/' . $f);
    save('db_product_img', ['img' => $f, 'pid' => $id]);
}
header('location:productadmin.php');
