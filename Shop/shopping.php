<?php
    include "product.php";
    session_start();
    $sel = ""; // 紀錄商品代碼
    if (isset($_GET["pid"])) { // 取得商品代碼
        $sel = $_GET["pid"];
        if (isset($_SESSION[$_GET["user"]."cart"][$sel])) { // 取得商品數量
            $_SESSION[$_GET["user"]."cart"][$sel]++;
        } else {
            $_SESSION[$_GET["user"]."cart"][$sel] = 1;
        }
    }
    if (!$_SESSION[$_GET["user"]."shopping"]) {
        exit;
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>購物</title>
    <style type="text/css">
        body {
            background: #c09f80;
            font-family: Arial;
            font-size: 19px;
        }

        h1 {
            text-align: center;
            color: #76323F;
            background-color: cornsilk;
        }

        h2 {
            text-align: right;
            color:#76323F;
            background-color: #d7cec7;
        }

        div {
            padding: 20px;
        }

        a {
            text-decoration: none;
            color:#76323F;
        }

        button {
            padding: 5px 15px;
            border: 2px indianred gainsboro;
            -webkit-border-radius: 6px;
            border-radius: 5px;
            font-size: 20px;
            color:#76323F;
        }

        table {
            position: relative;
            background-color: cornsilk;
            margin: auto;
            top: 10px;
            border: 2px;
            width: 90%;
            font-size: 20px;
        }

        th {
            border: 2px solid #062f4f;
            width: 400px;
            color: #062f4f;
        }

        td {
            border: 2px solid #76323F;
            /* width: auto; */
            color: #062f4f;
            text-align: center;
        }

        #sel td { /* 選取後變色 */
            background-color: #984B43;
            color:azure;
        }

        #cart {
            width: 190px;
            height: 50px;
            position: absolute;
            right: 20px;
            top: 27px;
            font-size: 20px;
        }

        #return {
            position: absolute;
            top: 30px;
            left: 20px;
        }

        #pro {
            width: 250px;
            height: 250px;
        }

        #c {
            width: 40px;
        }

        #h4 {
            width: 2000px;
        }

        #h5 {
            width: 50px;
        }

        #d {
            text-align: left;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
        };
    </script>
</head>

<body>
    <h1>購物頁面</h1>
    <?php echo "<h2>使用者 : " . $_GET["user"]. "</h2>" ?>
    <div id="login">
        <table>
            <tr>
                <th id="h1">商品圖片</th>
                <th id="h2">商品名稱</th>
                <th id="h3">價格</th>
                <th id="h4">商品描述</th>
                <th id="h5">購物</th>
            </tr>
            <?php
                foreach ($product as $pid => $pInfo) {
                    if ($pid == $sel) {
                        $_SESSION[$_GET["user"]."shopping"] = true;
                        echo "<tr id=\"sel\">
                                <td><img id=pro src=$pInfo[img] /></td>
                                <td>{$pInfo['name']}</td>
                                <td>NT\$" .number_format($pInfo['price']). "</td>
                                <td id=d>{$pInfo['des']}</td>
                                <td><button><a href=shopping.php?pid=$pid&user=" .$_GET["user"]. ">放入購物車</a></button></td>
                            </tr>\n";
                    } else {
                        echo "<tr>
                                <td><img id=pro src=$pInfo[img] /></td>
                                <td>{$pInfo['name']}</td>
                                <td>NT\$" .number_format($pInfo['price']). "</td>
                                <td id=d>{$pInfo['des']}</td>
                                <td><button><a href=shopping.php?pid=$pid&user=" .$_GET["user"]. ">放入購物車</a></button></td>
                            </tr>\n";
                    }
                }
            ?>
        </table>
    </div>
        <?php
            echo "<button id=return><a href=menberdata.php?user=" .$_GET["user"]. ">返回使用者介面</a></button>";
            $_SESSION[$_GET["user"]."showCart"] = true;
            echo "<button id=cart><img id=c src=cart1.png /><a href=showCart.php?user=" .$_GET["user"]. ">購物車內容</a></button>";
        ?>
</body>

</html>