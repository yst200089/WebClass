<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>登入</title>
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
            color:#76323F;
        }

        label {
            color:#76323F;
        }

        input {
            padding: 5px 15px;
            border: 2px indianred gainsboro;
            -webkit-border-radius: 6px;
            border-radius: 5px;
            font-size: 17px;
            color:#76323F;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
        };
    </script>
</head>

<body>
    <div id="login">
        <img src="../Shop/shopping online.png" />
        <form action="login_check.php" method="post">
            <h1 id="hh1">會員登入</h1>
            <label>帳號</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type=text name="acc" id="acc" placeholder="請輸入帳號"><br /><br />
            <label>密碼</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type=password name="pwd" id="pwd"><br /><br />
            <input id="s" type=submit value="登入">
            <input type="reset" value="清除">
        </form>
    </div>
</body>

</html>