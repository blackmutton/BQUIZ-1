<?php
include "base.php";
// print_r($_POST['id']);
dd($_POST);
$do = $_POST['table'];
$db = ${ucfirst($do)};

foreach ($_POST['id'] as $key => $id) {
    // print_r($key);
    // print_r($id);
    if (!empty($_POST['del'] && in_array($id, $_POST['del']))) {

        $db->del($id);
    } else {

        $row = $db->find($id);
        switch ($do) {
            case 'admin':
                $row['acc'] = $_POST['acc'][$key];
                $row['pw'] = $_POST['pw'][$key];
                break;
            case 'menu':
                $row['href'] = $_POST['href'][$key];
                $row['txt'] = $_POST['txt'][$key];
                $row['show'] = (isset($_POST['show']) && in_array($id, $_POST['show'])) ? 1 : 0;
                break;
            case 'title':
                $row['txt'] = $_POST['txt'][$key];
                $row['show'] = (isset($_POST['show']) && $_POST['show'] == $id) ? 1 : 0;
                break;
            case 'ad':
            case 'news':
                $row['txt'] = $_POST['txt'][$key];
                $row['show'] = (isset($_POST['show']) && in_array($id, $_POST['show'])) ? 1 : 0;
                break;
            case 'image':
            case 'mvim':
                $row['show'] = (isset($_POST['show']) && in_array($id, $_POST['show'])) ? 1 : 0;
        }

        $db->save($row);

        // $Title->save($row);
    }
}


to("../admin.php?do=$do");
