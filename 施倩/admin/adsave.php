<?php
include 'islogin.php';
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>无标题文档</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script language="javascript">
        $(function () {
            $('.error').css({'position': 'absolute', 'left': ($(window).width() - 490) / 2});
            $(window).resize(function () {
                $('.error').css({'position': 'absolute', 'left': ($(window).width() - 490) / 2});
            })
        });
    </script>
</head>
<body style="background:#edf6fa;">
<div class="place">
    </ul>
</div>
<div class="error">
    <?php
    if ($_FILES['img']['size'] > 0 && $_FILES['img']['type'] == 'image/jpeg') {
        $path = '../upload/ad/';
        if (!file_exists($path)) mkdir($path, 0777, true);
        $name = date('YmdHis') . '.jpg';
        move_uploaded_file($_FILES['img']['tmp_name'], $path . $name);
        $_POST['img'] = $name;
        include '../inc/db.php';
        save('db_ad', $_POST);
        header('location:adadmin.php');
    } else {
        echo "<h2>非常遗憾，您添加失败！</h2>";
        echo '<div class="reindex"><a href="add.html" target="_parent">重新添加</a></div>';
    }
    ?>
</div>
</body>
</html>
