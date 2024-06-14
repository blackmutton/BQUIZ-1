<?php
include "base.php";
// print_r($_POST['id']);
dd($_POST);

foreach ($_POST['id'] as $key => $id) {
    // print_r($key);
    // print_r($id);
    if (!empty($_POST['del'] && in_array($id, $_POST['del']))) {
        /* $sql = "delete from `title` where id='$id'";
        $pdo->exec($sql); */
        $Title->del($id);
    } else {
        /* if (isset($_POST['show']) && $_POST['show'] == $id) {
            $sql = "update `title` set `txt` ='{$_POST['txt'][$key]}',`show`='1' where id='$id'";
        } else {
            $sql = "update `title` set `txt` ='{$_POST['txt'][$key]}',`show`='0' where id='$id'";
        } */
        // echo $sql;
        // $pdo->exec($sql);
        $row = $Title->find($id);
        $row['txt'] = $_POST['txt'][$key];
        $row['show'] = (isset($_POST['show']) && $_POST['show'] == $id) ? 1 : 0;
        // $Title->save($row);
    }
}
unset($_POST['table']);
dd($_POST);
// to("../admin.php?do=title");
