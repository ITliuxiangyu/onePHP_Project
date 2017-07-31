<?php
include '../inc/db.php';
$id = $_POST['id'];
unset($_POST['id']);
update('db_ad', $_POST, 'id=' . $id);
header('location:adadmin.php');
