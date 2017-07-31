<?php
include '../inc/db.php';
update('db_post',$_POST,'id='.$_POST['id']);
header('location:postadmin.php');