<?php
include '../inc/db.php';
save('db_resume', $_POST);
header('location:../zhaopin.php');
