<?php $servername = "localhost";
$username = "root";
$password = "";
$dbname = "tsk";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    mysqli_query($conn,"SET names 'cp1251'");
    mysqli_query($conn,"SET NAMES utf8");
}
