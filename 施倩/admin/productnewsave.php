<?php
include '../inc/db.php';
save('db_new',$_POST);
header('location:productnewadd.php');
