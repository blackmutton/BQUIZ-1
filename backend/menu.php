<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">主選單管理</p>
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="30%">選單文字</td>
					<td width="30%">超連結</td>
					<td width="10%">次選單數</td>
					<td width="10%">顯示</td>
					<td width="10%">刪除</td>
					<td></td>
				</tr>
				<?php

				// $sql = "select * from title";
				// $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				// $rows=q("select * from title");
				// $rows = ${ucfirst($do)}->all();
				$rows = ${ucfirst($do)}->all(['main_id' => 0]);
				// print_r($rows);
				foreach ($rows as $row) {
				?>
					<tr class="cent">
						<td width="30%">
							<input type="text" name="href[]" id="txt" value="<?= $row['href']; ?>" style="width:98%">
						</td>
						<td width="30%">
							<input type="txt" name="txt[]" value="<?= $row['txt'] ?>" style="width:98%">
						</td>
						<td width="10%">

						</td>
						<td width="10%">
							<input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['show'] == 1) ? 'checked' : ''; ?>>
						</td>
						<td width="10%">
							<input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
						</td>
						<td width="10%">
							<input type="button" name="" value="編輯次選單" onclick="op('#cover','#cvr','./modals/submenu.php?id=<?= $row['id']; ?>')">
						</td>

						<input type="hidden" name="id[]" value="<?= $row['id'] ?>">

					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','./modals/<?= $do; ?>.php')" value="新增主選單"></td>
					<td class="cent">
						<input type="hidden" name="table" value=<?= $do; ?>>
						<input type="submit" value="修改確定">
						<input type="reset" value="重置">
					</td>
				</tr>
			</tbody>
		</table>

	</form>
</div>