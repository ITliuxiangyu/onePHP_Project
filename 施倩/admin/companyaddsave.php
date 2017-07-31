<?php
include '../inc/db.php';
save('db_company', $_POST);
header('location:company.php');