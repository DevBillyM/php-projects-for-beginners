<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'blogposts';

$conn = mysqli_connect($db_host, $db_name, $db_pass, $db_user);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
