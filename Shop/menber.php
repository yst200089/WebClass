<?php
    $member = array();
    if (file_exists("Description.txt")) {
        $ff = fopen("menber.txt", "r");
        while ($line = fgets($ff)) {
            $convert = mb_convert_encoding($line,"utf-8","big5");
            $data = explode(",", $convert);
            array_push($member, array("acc"=> $data[0], "pwd" => $data[1], "level" => $data[2]));
        }
        fclose($ff);
    }
?>