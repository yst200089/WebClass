<?php
    session_start();
    require("menber.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>檢驗登入輸入</title>
    <style type="text/css">
        body {
            background: #c09f80;
            font-family: Arial;
            font-size: 19px;
        }

        img {
            width: 700px;
            position: relative;
            left: 50px;
        }

        form {
            position: absolute;
            background:cornsilk;
            width: 300px;
            padding: 50px;
            right: 200px;
            top: 150px;
            height: 300px;
            text-align: center;
            border: 2px solid #c09f80;
            box-shadow: 3px 3px 5px 5px gray;
        }

        h1 {
            text-align: center;
            color: #062f4f;
            font-style: italic;
        }

        h2 {
            text-align: center;
            color:#76323F;
        }

        label {
            color:#76323F;
        }

        a {
            text-decoration: none;
            color:#76323F;
        }

        button {
            position: absolute;
            bottom: 80px;
            right: 70px;
            padding: 5px 15px;
            border: 2px indianred gainsboro;
            -webkit-border-radius: 6px;
            border-radius: 5px;
            font-size: 25px;
            color:#76323F;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {

        };
    </script>
</head>

<body>
    <img src="../Shop/shopping online.png" />
    <?php
        if (!(isset($_POST["acc"]) || isset($_POST["pwd"]))) {
            include "login_w.php";
        }
        $check = false;
        for ($i =0; $i<count($member); $i++) {
            if ($member[$i]["acc"] == $_POST["acc"] && $member[$i]["pwd"] == $_POST["pwd"]) {
                $check = true;
                $_SESSION[$_POST["acc"]] = $member[$i];
            }
        }
        if ($check) {
            $_SESSION["is".$_POST["acc"]] = true;
            echo "<form>";
            echo "<h2>登入成功</h2>";
            echo "<h2>您登入的帳號是</h2>";
            echo "<h1>" .$_POST["acc"]. "</h1>";
            echo "<button><a href=menberdata.php?user=" .$_POST['acc']. ">進入系統管理畫面</a></button>";
            echo "</form>";
        } else {
            include "login_w.php";
        }
    ?>
</body>

</html>