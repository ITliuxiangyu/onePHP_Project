<?php
include '../inc/db.php';
$id=$_POST['id'];
unset($_POST['id']);
print_r($_POST);
echo $id ;
update('db_new',$_POST,"id='$id'");
header('location:productnewadmin.php');