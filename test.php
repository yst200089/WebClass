<!DOCTYPE html>
<html>
<?php 
include 'head.php';
?>
<head>
    <meta charset="UTF-8" />
    <title>Index PHP</title>
    <style type="text/css">

    </style>
    <script type="text/javascript">
        window.onload = function() {

        };
    </script>
</head>

<body>
    <?php
        $age = 20; // php 宣告變數前面為 $
        $name = "YST";
        echo "<h1>Hello World!</h1>"; // 輸出
    ?>
    <div>
        <p>My name is <?php echo$name; ?></p>
        <p>My name is <?=$name ?></p> <!--簡寫-->

        <?php
        echo "My name is" . $name . ".<br/ >";
        ?>
        <?php
        echo "My name is $name.<br/ >"; // 簡寫
        ?>

        <p>I'm <?=$age ?> years old.</p>
    </div>
</body>

</html>