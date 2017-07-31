<?php
include '../inc/db.php';
print_r($_POST);
save('db_knowledge', $_POST);
header('location:knowledge.php');
