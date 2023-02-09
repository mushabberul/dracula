<?php
$hostName = 'localhost';
$userName = 'root';
$password = '';
$database = 'dracula';

$db_connect = mysqli_connect($hostName, $userName, $password, $database);

if (mysqli_connect_errno()) {
    echo "The error: " . mysqli_connect_error();
    exit;
}
