<?php
    include "product.php";
    session_start();
    if (!$_SESSION[$_GET["user"]."showCart"]) {
        exit;
    }
    $sel = ""; // 紀錄商品代碼
    if (isset($_GET["pid"])) { // 取得商品代碼
        $sel = $_GET["pid"];
        if ($_GET["quantity"] == "less") { // 取得商品數量
            $_SESSION[$_GET["user"]."cart"][$sel]--;
            if ($_SESSION[$_GET["user"]."cart"][$sel] == 0) {
                unset($_SESSION[$_GET["user"]."cart"][$sel]);
            }
        } else if ($_GET["quantity"] == "plus") {
            $_SESSION[$_GET["user"]."cart"][$sel]++;
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>顯示購物車</title>
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
            position: absolute;
            top: 30px;
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
            width: 80%;
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
            width: 250px;
            height: 70px;
            position: absolute;
            right: 10px;
        }

        #return {
            left: 20px;
        }

        .poin {
            cursor: pointer;
            cursor: hand;
        }

        #checkout {
            right: 20px;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
        };
    </script>
</head>

<body>
    <h1>購物車內容</h1>
    <?php echo "<h2>使用者 : " . $_GET["user"]. "</h2>" ?>
    <div id="login">
            <table>
            <tr>
                <th>商品名稱</th>
                <th>價格</th>
                <th colspan="3">數量</th>
            </tr>
            <?php
                if (isset($_SESSION[$_GET["user"]."cart"])) {
                    foreach ($_SESSION[$_GET["user"]."cart"] as $pid => $cnt) {
                        if ($pid == $sel) {
                            echo "<tr id=\"sel\">
                                <td>{$product[$pid]["name"]}</td>
                                <td>NT\${$product[$pid]["price"]}</td>
                                <td class=poin><a href=showCart.php?pid=$pid&user=" .$_GET["user"]. "&quantity=less> - </a></td>
                                <td>$cnt</td>
                                <td class=poin><a href=showCart.php?pid=$pid&user=" .$_GET["user"]. "&quantity=plus> + </a></td>
                            </tr>\n";
                        } else {
                            echo "<tr>
                                <td>{$product[$pid]["name"]}</td>
                                <td>NT\${$product[$pid]["price"]}</td>
                                <td class=poin><a href=showCart.php?pid=$pid&user=" .$_GET["user"]. "&quantity=less> - </a></td>
                                <td>$cnt</td>
                                <td class=poin><a href=showCart.php?pid=$pid&user=" .$_GET["user"]. "&quantity=plus> + </a></td>
                            </tr>\n";
                        }
                    }
                }
            ?>
        </table>
        </div>
        <?php
            echo "<button id=return><a href=shopping.php?user=" .$_GET["user"]. ">繼續購物</a></button><br />";
            $_SESSION[$_GET["user"]."checkout"] = true;
            echo "<button id=checkout><a href=Checkout.php?user=" .$_GET["user"]. ">確定購買</a></button>";
        ?>
</body>

</html>