<?php
if ($_FILES['nimg']['size'] > 0 && $_FILES['nimg']['type'] == 'image/jpeg') {
    $path = '../upload/ad/';
    move_uploaded_file($_FILES['nimg']['tmp_name'], $path . $_POST['img']);
    $im = $_POST['img'];
    header('location:adadmin.php');
}