<?php
    include "product.php";
    session_start();
    if (!$_SESSION[$_GET["user"]."checkout"]) {
        exit;
    }
    if (isset($_GET["CO"])) {
        if($_GET["CO"] == "1") {
            foreach ($_SESSION[$_GET["user"]."cart"] as $pid => $cnt) {
                $cnt = 0;
                unset($_SESSION[$_GET["user"]."cart"][$pid]);
            }
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>購物明細</title>
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
        }

        #end {
            right: 20px;
        }

        #return {
            left: 20px;
        }

        #num {
            width:20px;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
        };
    </script>
</head>

<body>
    <h1>購物明細</h1>
    <?php echo "<h2>使用者 : " . $_GET["user"]. "</h2>" ?>
    <div id="login">
            <table>
            <tr>
                <th id="num">編號</th>
                <th>商品名稱</th>
                <th>價格</th>
                <th>數量</th>
                <th>小計</th>
            </tr>
            <?php
                if (isset($_SESSION[$_GET["user"]."cart"])) {
                    $total = 0;
                    $i = 1;
                    $num = 0;
                    foreach ($_SESSION[$_GET["user"]."cart"] as $pid => $cnt) {
                        echo "<tr>
                            <td>" .$i++. "</td>
                            <td>{$product[$pid]["name"]}</td>
                            <td>NT$" .number_format($product[$pid]["price"]). "</td>";
                            $num += $cnt;
                        echo "<td>$cnt</td>
                            <td>NT$" .number_format($product[$pid]['price']*$cnt). "</td>";
                            $total += $product[$pid]['price']*$cnt;
                        echo "</tr>\n";
                    }
                    echo "<tr><th colspan=5>付款詳情</th></tr>";
                    echo "<tr><td colspan=4>購物金額總計</td>";
                    echo "<td>NT$" .number_format($total). "</td></tr>";
                    echo "<tr><td colspan=4>會員折扣</td>";
                    $Level = $_SESSION[$_GET["user"]]["level"];
                    if ($Level == "Guest") {
                        $discount = 100;
                    } else if ($Level = 'Gold') {
                        $discount = $total*(1-0.95);
                    }else if ($Level = "VIP") {
                        $discount = $total*(1-0.9);
                    }
                    $total = $total - $discount;
                    echo "<td>NT$" .number_format($discount). "</td></tr>";
                    if ($total >= 20000) {
                        echo "<tr><td colspan=4>購買金額達NT$20,000元折扣(元)</td>";
                        echo "<td>NT$" .number_format(2000). "</td></tr>";
                        $total = $total-2000;
                    }

                    if ($num >= 10) {
                        echo "<tr><td colspan=4>購買數量達10件優惠(元)</td>";
                        echo "<td>NT$" .number_format(500). "</td></tr>";
                        $total = $total-500;
                    }
                    echo "<tr><td colspan=4>實付金額</td>";
                    echo "<td>NT$" .number_format($total). "</td></tr>";
                }
            ?>
        </table>
        </div>
        <?php
            echo "<button id=return><a href=showCart.php?user=" .$_GET["user"]. ">返回購物車</a></button>";
            echo "<button id=end><a href=Checkout.php?user=" .$_GET["user"]. "&CO=1>結帳</a></button>";
        ?>
</body>

</html>