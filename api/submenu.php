<?php
include "base.php";
// print_r($_POST['id']);
dd($_POST);
$do = $_POST['table'];
$db = ${ucfirst($do)};

if (isset($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        // print_r($key);
        // print_r($id);
        if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {

            $db->del($id);
        } else {

            $row = $db->find($id);
            $row['href'] = $_POST['href'][$key];
            $row['txt'] = $_POST['txt'][$key];


            $db->save($row);
        }
    }
}

if (isset($_POST['txt2'])) {
    foreach ($_POST['txt2'] as $key => $txt) {
        // print_r($key);
        // print_r($id);
        if ($txt != '') {
            $db->save([
                'txt' => $txt,
                'href' => $_POST['href2'][$key],
                'main_id' => $_POST['main_id']
            ]);
        }
    }
}

// to("../admin.php?do=$do");
