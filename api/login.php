<?php

include_once "base.php";
// 為預防sql injection所做的字串轉換，能將特殊字元轉換，例如'變成&#39;
$acc = htmlspecialchars($_POST['acc']);
$pw = htmlspecialchars($_POST['pw']);
$chk=$Admin->count(['acc'=>$acc,'pw'=>$pw]);

if($chk){
    $_SESSION['login'] = 1;
    to("../admin.php");
    exit();
}
?>
<script>
    alert("帳號或密碼錯誤");
    location.href = "../index.php?do=login";
</script>