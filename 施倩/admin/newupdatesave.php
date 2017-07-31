<?php
include '../inc/db.php';
$id = $_POST['id'];
unset($_POST['id']);
update('db_news', $_POST, "id='$id'");
header('location:newadmin.php');