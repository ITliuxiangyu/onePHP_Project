<?php
include '../inc/db.php';
$id = $_POST['id'];
unset($_POST['id']);
update('db_postnew', $_POST, 'id=' . $id);
header('location:work.php');