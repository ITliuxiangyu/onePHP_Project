<?php
include'../inc/db.php';
$qq=save('db_service',$_POST);
header('location:../sever.html');