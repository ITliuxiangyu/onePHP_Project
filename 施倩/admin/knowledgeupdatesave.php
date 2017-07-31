<?php
include '../inc/db.php';
$id = $_POST['id'];
unset($_POST['id']);
update('db_knowledge', $_POST, 'id=' . $id);
header('location:knowledge.php');