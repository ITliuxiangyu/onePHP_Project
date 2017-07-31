<?php
include '../inc/db.php';
$aa=save('db_post',$_POST);
header('location:postadmin.php');