<h3 class="cent">新增標題區圖片</h3>
<hr>

<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>標題區圖片：</td>
            <!-- name的部分建議跟資料庫欄位相同 -->
            <td><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <td>標題區替代文字：</td>
            <td><input type="text" name="txt" id="txt"></td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="table" value='title'>
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
            <td></td>
        </tr>
    </table>
</form>