<?php

    $servername = '';
    $username = '';
    $password = "";
    $database = "";
    $dbport = ;

    // Create connection
    $db = mysqli_connect($servername, $username, $password, $database, $dbport);

    // Check connection
    if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
    }
//    echo "Connected successfully (".$db->host_info.")";
?>
