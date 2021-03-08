<?php
    $host = "localhost"; //database host name
    $user = "root"; //username to access the database
    $pass = "usbw"; //password to access the database
    $dbName = "login"; //database's name

    //mysqli_connect takes in a host server and its username & password
    //connects to host server, not database
    $dbconnect = mysqli_connect($host, $user, $pass);

    //if mysqli_connect fails...
    if(!$dbconnect) {
        //display error message
        //mysqli_error takes in a server connection
        die("Database connection failed: " . mysqli_error($dbconnect));
    }

    //Selecting a database to use
    $dbSelect = mysqli_select_db($dbconnect, $dbName);

    //if mysqli_select_db fails..
    if(!$dbSelect) {
        //display error message
        die("Database selection failed: " . mysqli_error($dbconnect));
    }

    //use include("dbconnect.php") to include in other scripts
?>