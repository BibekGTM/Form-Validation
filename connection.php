<?php

    $username='root';
    $server = 'localhost';
    $password  = '';
    $db = 'bg_student';


    $conn = mysqli_connect($server, $username, $password, $db);

    if(!$conn) {
        die("Connection Failed!! Error: ");
    } else {
        echo "Connection Successfull!";
    }


?>