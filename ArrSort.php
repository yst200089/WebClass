<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>array, foreach, sort</title>
	<style type="text/css">
		body {
			width: 1004px;
			margin: 10px auto;
			background-color: black
		}

		#content {
			color: ivory;
			background-color: #125;
			border: 2px solid #ccf;
			padding: 20px;
			line-height: 24pt;
			text-align: center;
		}

		table {
			width: 600px;
			border: 2px solid #ccf;
			margin: 12pt 160px
		}

		th {
			border: 2px solid #99c;
			line-height: 22pt;
			text-align: center;
			padding: 2px 5px;
			color: ivory;
			background-color: #003
		}

		td {
			border: 1px solid #99c;
			line-height: 22pt;
			text-align: center;
			padding: 2px 5px
		}

		caption {
			font-size: 18pt;
			font-weight: bold;
			font-family: 標楷體, 微軟正黑體
		}

		#banner {
			text-align: center
		}

		div {
			margin: 20px
		}
	</style>
	<script type="text/javascript">

	</script>
</head>

<body>
	<div id="content">
		<table>
			<tr>
				<th>學號</th>
				<th>國文</th>
				<th>英文</th>
				<th>數學</th>
				<th>總分</th>
			</tr>
			<?php
			//global $tot;
			$arrScores = array(
				"s98210121" => array(95, 87, 65),
				"s96210124" => array(85, 74, 93),
				"s98210133" => array(93, 89, 80),
				"s97210524" => array(98, 76, 67),
				"s98210257" => array(87, 90, 83)
			);
			//while( list($id, $scores)=each($arrScores)) {
			foreach ($arrScores as $id => $scores) { // 用文字(id)做索引
				$tot[$id] = 0; // 計算總數
				echo "<tr><td>$id</td>";
				for ($i = 0; $i < count($scores); $i++) {
					$tot[$id] += $scores[$i];
					echo "<td>{$scores[$i]}</td>";
				}
				echo "<th>{$tot[$id]}</th>";
				echo "</tr>\n";
			}
			?>
		</table>
		<table>
			<caption>依學號排序<caption>
				<tr>
					<th>學號</th>
					<th>國文</th>
					<th>英文</th>
					<th>數學</th>
					<th>總分</th>
				</tr>
				<?php
				ksort($arrScores); // 依照學號排序 ksort:由低到高排序key，保留key(學號), krsort:由高到低排序key，保留key(學號)
				foreach ($arrScores as $id => $scores) { // id 用文字做索引
					echo "<tr><td>$id</td>";
					for ($i = 0; $i < 3; $i++) {
						echo "<td>{$scores[$i]}</td>";
					}
					echo "<th>{$tot[$id]}</th>";
					echo "</tr>\n";
				}   ?>
		</table>
		<table>
			<caption>依總分排序<caption>
				<tr>
					<th>名次</th>
					<th>學號</th>
					<th>國文</th>
					<th>英文</th>
					<th>數學</th>
					<th>總分</th>
				</tr>
				<?php
				$ord = 0; // 計算名次
				arsort($tot); // 依照總分排序 arsort:由大到小排序值，保留key(學號), asort:由小到大排序值，保留key(學號)
				foreach ($tot as $id => $total) {
					$ord++;
					echo "<tr><td>$ord</td><td>$id</td>";
					for ($i = 0; $i < count($arrScores[$id]); $i++) {
						echo "<td>{$arrScores[$id][$i]}</td>";
					}
					echo "<th>{$total}</th>";
					echo "</tr>\n";
				}
				?>
		</table>
	</div>
</body>

</html>