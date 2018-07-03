<?php
session_start();
session_unset();
header("Location:main.php?err=0");exit;
?>