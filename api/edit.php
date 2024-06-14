<?php
include "base.php";
// print_r($_POST['id']);
dd($_POST);
$do=$_POST['table'];
$db = ${ucfirst($do)};

foreach ($_POST['id'] as $key => $id) {
    // print_r($key);
    // print_r($id);
    if (!empty($_POST['del'] && in_array($id, $_POST['del']))) {
       
        $db->del($id);
    } else {
       
        $row = $db->find($id);
        if(isset($_POST['txt'])){
            $row['txt']=$_POST['text'][$key];
        }
        if($do=='title'){

            $row['show'] = (isset($_POST['show']) && $_POST['show'] == $id) ? 1 : 0;
        }else{
            $row['show'] = (isset($_POST['show']) && in_array($id,$_POST['show']) == $id) ? 1 : 0;

        }
        $db->save($row);
        
        // $Title->save($row);
    }
}


to("../admin.php?do=$do");
