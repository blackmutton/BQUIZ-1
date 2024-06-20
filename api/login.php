<?php
session_start();
include_once "base.php";
if ($_POST['acc'] == 'admin' && $_POST['pw'] == '1234') {
    $_SESSION['login'] = 1;
    to("../admin.php");
    exit();
}
?>
<script>
    alert("帳號或密碼錯誤");
    location.href = "../index.php?do=login";
</script>