<HTML>
<head>
<meta charset="windows-1251_bin">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<?php
session_start();
include "dbset.php";
mysqli_query($conn,"SET NAMES utf8");
mysqli_query($conn,"SET names 'cp1251'");

$suid=$_SESSION["suid"];
$slogin=$_SESSION["slogin"];
if($slogin=="" || !isset($slogin)){
	header("Location: main.php?err=nelzya");
		exit;
	
}

$query="SELECT * FROM tasks WHERE id='".$suid."'";
$res=mysqli_query($conn,$query);

if(isset($_GET['del'])){
$del=0;
$del=$_GET['del'];
$query5= "DELETE FROM tasks Where id_task='".$del."'"; 
$resilt=mysqli_query($conn,$query5);
if($_GET['del']) { echo'<META HTTP-EQUIV=Refresh Content="0;URL=lk.php">';  }  }



?>

<BODY>
<div align=center>
<br>
<p>Menu page</p>
</div>

<div class=register>
<form action="logout.php" method="post">
<p>Привет, <?=$slogin?> 


<input type=submit value=Выход>  </form></p></div>

<table align=center>
<?php

While($row=mysqli_fetch_array($res)) {
?>	
<tr>
<td>
	<?=$row["goal"];?>
</td>
<td>

<a name="del" href='lk.php?del=<?=$row["id_task"]?>' >Выполнено?</a> 

	
</td></tr>

<?php }

?>
<div id=wrapper>

<p>
<a href="addtask.php">Добавить задание </a></p>
</p>
</div>
</BODY>
</HTML>