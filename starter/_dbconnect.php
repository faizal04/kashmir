<?php

// Connect to the database
// $servername = "mysql.hostinger.com";
// $username = "u873877420_kashweb";
// $password = "ibrahimbhat123";
// $dbname = "u873877420_kashweb";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kashweb";

try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn) {
        echo "";
    }
} catch (mysqli_sql_exception $e) {
    die("Connection failed: " . $e->getMessage());
}
