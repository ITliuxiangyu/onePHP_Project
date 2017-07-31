<?php
include '../inc/db.php';
print_r($_POST);
$id = $_POST['id'];
unset($_POST['id']);
update('db_company', $_POST, "id='$id'");
header('location:company.html');