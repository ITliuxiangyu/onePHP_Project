<?php
include'../inc/db.php';
save('db_news',$_POST);
header('location:newadmin.php');