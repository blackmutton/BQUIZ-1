<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">動態文字管理</p>
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="80%">動態文字廣告</td>
					<td width="10%">顯示</td>
					<td width="10%">刪除</td>
					<td></td>
				</tr>
				<?php

				// $sql = "select * from title";
				// $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				// $rows=q("select * from title");
				$rows = ${ucfirst($do)}->all();
				// print_r($rows);
				foreach ($rows as $row) {
				?>
					<tr class="cent">
						<td width="80%">
							<input type="text" name="txt[]" id="txt" value="<?= $row['txt']; ?>">
						</td>
						<td width="10%">
							<input type="checkbox" name="show[]" value="<?= $row['id'] ?>" <?= ($row['show'] == 1) ? "checked" : ""; ?>>
						</td>
						<td width="10%">
							<input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
						</td>
						<td>
							<input type="hidden" name="id[]" value="<?= $row['id'] ?>">
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','./modals/<?= $do; ?>.php')" value="新增動態文字廣告"></td>
					<td class="cent">
					<input type="hidden" name="table" value="<?= $do; ?>">
						<input type="submit" value="修改確定">
						<input type="reset" value="重置">
					</td>
				</tr>
			</tbody>
		</table>

	</form>
</div>