<?php
session_start();

if(isset($_GET["add"])){
?>
<div>Все ок</div>
<?php

	
	
}
include "dbset.php";
$suid=$_SESSION["suid"];
$slogin=$_SESSION["slogin"];
include "dbset.php";
	mysqli_query($conn,"SET names 'cp1251'");
	mysqli_query($conn,"SET NAMES utf8");
if($slogin=="" || !isset($slogin)){
	header("Location: main.php?err=nelzya");
		exit;
	
}
?>
<html>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>
  <body>
  <div><br><br>
  <p align=center> Добавление новой задачи </p>
  </div>
  <div class=register>
<form action="logout.php" method="post">
<p>Привет, <?=$slogin?> 


<input type=submit value=Выход>  </form></p></div>
  <div id=wrapper>
  <form action="addtaskcheck.php" method="post">
  <p>Добавить новую задачу
				<input type="e-mail" name="task" id="task" value="" size="40" />
			</p>
			<p style="padding-bottom: 10px;">
				<input type="submit"  value="Отправить" />
			</p>
			<br><br>
			<p><a href=lk.php>Вернутся на главную страницу<a></p>
			</div>
			</body>
			</html>