			<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
				<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">

					<?php
					$ad = $Ad->all(['show' => 1]);
					foreach ($ad as $a) {
						echo $a['txt'];
						echo "&nbsp;&nbsp;&nbsp;";
					}
					?>
				</marquee>
				<div style="height:32px; display:block;"></div>
				<!--正中央-->
				<h3>更多最新消息顯示區</h3>
				<hr>
				<div>
					<?php
					$total = ${ucfirst($do)}->count();
					$div = 5;
					$pages = ceil($total / $div);
					$now = $_GET['p'] ?? 1;
					$start = ($now - 1) * $div;
					$rows = ${ucfirst($do)}->all(" limit $start, $div");
					?>
					<ol start="<?= $start + 1; ?>">
						<?php
						foreach ($rows as $row) {
							echo "<li class='sswww'>";
							echo mb_substr($row['txt'], 0, 25);
							echo "<span class='all' style='display:none'>{$row['txt']}</span>";
							echo "</li>";
						}
						?>

					</ol>
				</div>
				<div class="cent">
					<?php
					if ($now - 1 >= 1) {
						$prev = $now - 1;
						echo "<a href='?do=$do&p=$prev'>";
						echo "<";
						echo "</a>";
					}
					for ($i = 1; $i <= $pages; $i++) {
						$size = ($i == $now) ? "24px" : "18px";
						echo "<a href='?do=$do&p=$i' style='font-size:$size'> ";
						echo $i;
						echo " </a>";
					}
					if ($now + 1 <= $pages) {
						$next = $now + 1;
						echo "<a href='?do=$do&p=$next'> ";
						//echo "&gt;";
						echo ">";
						echo "</a>";
					}
					?>
				</div>
			</div>
			<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
			<script>
				$(".sswww").hover(
					function() {
						$("#alt").html("" + $(this).children(".all").html() + "").css({
							"top": $(this).offset().top - 50
						})
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function() {
						$("#alt").hide()
					}
				)
			</script>