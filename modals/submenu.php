<?php
include_once "../api/base.php";
?>
<h3 class="cent">編輯次選單</h3>
<hr>

<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table style='width:70%;margin:auto;'>
        <tr>
            <td>次選單名稱：</td>
            <td>次選單超連結：</td>
            <td>刪除</td>
        </tr>
        <?php
        $rows = $Menu->all(['main_id' => $_GET['id']]);
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><input type="text" name="txt[]"></td>
                <td><input type="text" name="href[]"></td>
                <td><input type="checkbox" name="del[]"></td>
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="cent">
        <input type="hidden" name="table" value='menu'>
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單">
    </div>
</form>