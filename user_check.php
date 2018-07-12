<?php
session_start();
if (! isset ($_POST["login"])) {
    header("Location: main.php?err=1");
    exit;
}
if (! isset ($_POST["pasw"])) {
    header("Location: main.php?err=2");
    exit;
}
if ($_POST["login"] == "") {
    header("Location: main.php?err=3");
    exit;
}
if ($_POST["pasw"] == "") {
    header("Location: main.php?err=4");
    exit;
}
if (($_POST["login"] == "") && ($_POST["pasw"] == "")) {
    header("Location: main.php?err=5");
    exit;
}
$login = $_POST["login"];
$pasw = $_POST["pasw"];
include 'dbset.php';
$query="SELECT * FROM `user` WHERE `login`='" . $login . "' and pass='" . $pasw . "'";
$res = mysqli_query($conn,$query) or die("ERR:query");
$nr = mysqli_num_rows($res);
if ($nr == 0) {
    header("Location:main.php?err=25");
    exit;
}
if ($nr > 1) {
    header("Location:main?err=26");
    exit;
}

$row = mysqli_fetch_array($res);
$_SESSION["suid"] = $row["id"];
$_SESSION["slogin"] = $login;
header("Location:lk.php");
exit;
?>
