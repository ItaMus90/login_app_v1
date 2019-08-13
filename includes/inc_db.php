<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "login_app_v1";

    $connection = mysqli_connect($host, $username, $password, $db);

    if(!$connection){

        die("Connection Failed: " . mysqli_connect_error());

    }
