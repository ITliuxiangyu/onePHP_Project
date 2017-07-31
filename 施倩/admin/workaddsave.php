<?php
include '../inc/db.php';
print_r($_POST);
save('db_postnew',$_POST);
header('location:work.php');
