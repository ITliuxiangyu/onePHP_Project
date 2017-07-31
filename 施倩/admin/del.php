<?php
include '../inc/db.php';
$i = '../upload/ad/' . $_GET['ss'];
@unlink($i);
delete('db_ad', 'id=' . $_GET['id']);
header('location:adadmin.php');