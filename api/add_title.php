<?php
include "base.php";

if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], "../images/" . $_FILES['img']['name']);
    $sql = "insert into `title` (`img`,`txt`) values ('{$_FILES['img']['name']}','{$_POST['txt']}')";
    $pdo->exec($sql);
    to("../admin.php?do=title");
}
