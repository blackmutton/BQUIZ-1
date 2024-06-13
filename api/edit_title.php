<?php
include "base.php";
// print_r($_POST['id']);

foreach ($_POST['id'] as $key => $id) {
    // print_r($key);
    // print_r($id);
    if (!empty($_POST['del'] && in_array($id, $_POST['del']))) {
        $sql = "delete from `title` where id='$id'";
        $pdo->exec($sql);
    } else {
        if (isset($_POST['show']) && $_POST['show'] == $id) {
            $sql = "update `title` set `txt` ='{$_POST['txt'][$key]}',`show`='1' where id='$id'";
        } else {
            $sql = "update `title` set `txt` ='{$_POST['txt'][$key]}',`show`='0' where id='$id'";
        }
        // echo $sql;
        $pdo->exec($sql);
    }
}
to("../admin.php?do=title");
