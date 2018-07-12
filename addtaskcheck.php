<?php
session_start();
include 'dbset.php';
$suid = $_SESSION['suid'];
$slogin = $_SESSION['slogin'];

if (! isset( $_POST["task"] ) || ($_POST["task"]=="")) {
    header('Location: addtask.php?err=emptylog');
    exit;
}
$task = $_POST["task"];

$query = "INSERT INTO `tasks` (`goal`,`id`) VALUES ('" . $task . "','" . $suid . "')";
$res = mysqli_query($conn,$query);
header('Location: addtask.php?add=ok');
exit;
