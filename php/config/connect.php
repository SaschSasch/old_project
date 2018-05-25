<?php
    $connection_link = mysqli_connect("localhost", "root", "", "DPr");

    mysqli_query($connection_link, "SET CHARACTER SET 'utf8'", $bd);
    mysqli_query($connection_link, "set character_set_client='utf8'");
    mysqli_query($connection_link, "set character_set_results='utf8'");
    mysqli_query($connection_link, "set collation_connection='utf8_general_ci'");
    mysqli_query($connection_link, "SET NAMES utf8");
?>