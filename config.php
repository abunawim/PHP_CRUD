<?php
/**
 * Database Connection Code
 */

$hostName = 'localhost';
$databaseName = 'phpcrud';
$userName = 'root';
$password = '';

$mysqli = mysqli_connect($hostName, $userName, $password, $databaseName);

if (!$mysqli) {
    echo "Error No: " . mysqli_connect_errno();
    echo "Error Description: " . mysqli_connect_error();
    exit;
}

?>