<?php
$email = $_POST['email'];
$pw = $_POST['pw'];
$age = $_POST['age'];
// if (isset($_POST['yahoo'])) { // 
//     $yahoo = $_POST['yahoo'];
// } else {
//     $yahoo = false;
// }
// $_POST['menber'] is a array
?>
<!-- GET可換POST -->
<!-- 選項沒勾選POST會當不存在 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>網頁標題</title>
<style type="text/css">

</style>
</head>
<body>
Email: <?=$email ?><br />
Password: <?=$pw ?><br />
Age: <?=$age ?><br />
Yahoo: <?php print_r($_POST['member']); ?><br />
公私立: <?php print_r($_POST['P']); ?><br />
</body>
</html>