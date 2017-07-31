<?php
include'../inc/f.php';
include'../inc/i.php';
include'../inc/db.php';
$id=$_POST['id'];
unset($_POST['id']);
update('db_product',$_POST,'id='.$id);
header('location:productadmin.php');
