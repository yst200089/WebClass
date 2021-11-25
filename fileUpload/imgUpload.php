<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>圖片檔上傳</title>
<style type="text/css">
body {width:600px; margin:10px auto;}
#content {background-color:DarkOliveGreen; margin:20px; padding:20px; border:2px solid ivory; font-size: 16pt; color:#ff9; line-height:32px}
input {line-height:32px; font-size: 16pt}
form {line-height:40pt}
</style>
<script type="text/javascript">

</script>
</head>
<body>
<div id="content">
<?php
$path="C:/yourDirectory/files";
$arrTypes =array ("image/gif", "image/png", "image/jpeg", "image/pjpeg");
if ($_FILES['pic']['error']==0) { // Error?
   if (in_array($_FILES['pic']['type'], $arrTypes)) { // image type checking 
      echo "Upload: " . $_FILES["pic"]["name"] . "<br />";
      echo "Type: " . $_FILES["pic"]["type"] . "<br />";
      echo "Size: " . round(($_FILES["pic"]["size"] / 1024),2) . " Kb<br />";
      echo "Stored in: " . $_FILES["pic"]["tmp_name"]. "<br/>";
      if (file_exists("$path/" . $_FILES["pic"]["name"])) {
            echo $_FILES["pic"]["name"] . " already exists. ";
      } else {
         move_uploaded_file($_FILES["pic"]["tmp_name"], "$path/" . $_FILES["pic"]["name"]);
         echo "Image file Uploaded!";
      }
   } else { 
   echo "Invalid File Format<br />";
   }
} else {
   echo "Error: " . $_FILES["pic"]["error"] . "<br />";
}
?>
</div>
</body>
</html>