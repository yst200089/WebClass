<?php
    session_start();
    if (!$_SESSION["is".$_GET['user']]) {
        exit;
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>用戶資料</title>
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
            bottom: 10px;
            right: 70px;
            padding: 5px 15px;
            border: 2px indianred gainsboro;
            -webkit-border-radius: 6px;
            border-radius: 5px;
            font-size: 25px;
            color:#76323F;
        }

        #out {
            position: absolute;
            left: 60px;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
        };
    </script>
</head>

<body>
    <div id="person">
        <img src="../Shop/shopping online.png" />
        <?php
            echo "<form>";
            echo "<fieldset>";
            echo "<legend><h1>~系統管理~</h1></legend>";
            echo "<h2>用戶名稱 : " . $_SESSION[$_GET['user']]["acc"] . "</h2>";
            echo "<h2>用戶等級 : " . $_SESSION[$_GET['user']]["level"] . "</h2>";
            echo "</fieldset>";
            $_SESSION[$_GET['user']."shopping"] = true;
            echo "<button id=out><a href=login_inc.php>登出</a></button>";
            echo "<button><a href=shopping.php?user=" .$_GET['user']. ">開始購物</a></button>";
            echo "</form>";
        ?>
    </div>
</body>

</html>