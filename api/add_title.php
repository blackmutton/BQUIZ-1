<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=dbno1";
$pdo = new PDO($dsn, 'root', '');

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../images/" . $_FILES['img']['name']);
    $sql = "insert into `title` (`img`,`txt`) values ('{$_FILES['img']['name']}','{$_POST['txt']}')";
    $pdo->exec($sql);
    header("location:../admin.php?do=title");
}
