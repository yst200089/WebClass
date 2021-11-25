<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>網頁標題</title>
<style type="text/css">
/* 設定 table 外觀 */
table, td {
    border: 1px solid blue;
}
</style>
</head>
<body>
<?php
//echo $_GET("uid");
?>
<table>
<?php
foreach ($_SERVER as $key => $val) { // $_SERVER 是全域變數
   echo "<tr><td>$key</td>";
   echo "<td>$val</td></tr>";
}
?>
</table>
</body>
</html>