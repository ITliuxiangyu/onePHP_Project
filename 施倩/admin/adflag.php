<?php
include '../inc/db.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if ($_POST['flag'] == 'y') {
        $_POST['flag'] = 'n';
    } else {
        $_POST['flag'] = 'y';
    }
    unset($_POST['id']);

    update('db_ad', $_POST, 'id=' . $id);
}
if (isset($_POST['nid'])) {
    $id = $_POST['nid'];
    if ($_POST['flag'] == 'y') {
        $_POST['flag'] = 'n';
    } else {
        $_POST['flag'] = 'y';
    }
    unset($_POST['nid']);

    update('db_news', $_POST, 'id=' . $id);
}
if (isset($_POST['pid'])) {
    $id = $_POST['pid'];
    if ($_POST['flag'] == 'y') {
        $_POST['flag'] = 'n';
    } else {
        $_POST['flag'] = 'y';
    }
    unset($_POST['pid']);

    update('db_product', $_POST, 'id=' . $id);
}
if (isset($_POST['cid'])) {
    $id = $_POST['cid'];
    if ($_POST['flag'] == 'y') {
        $_POST['flag'] = 'n';
    } else {
        $_POST['flag'] = 'y';
    }
    unset($_POST['cid']);

    update('db_company', $_POST, 'id=' . $id);
}
if (isset($_POST['pnid'])) {
    $id = $_POST['pnid'];
    if ($_POST['flag'] == 'y') {
        $_POST['flag'] = 'n';
    } else {
        $_POST['flag'] = 'y';
    }
    unset($_POST['pnid']);

    update('db_new', $_POST, 'id=' . $id);
}