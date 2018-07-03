<?php 
session_start();

if (!isset($_POST["log"]) || ($_POST["log"]==""))
{
	header("Location: main.php?err=emptylog");
		exit;
}
if (!isset($_POST["pass"])| ($_POST["pass"]==""))
{
	header("Location: main.php?err=emptypass");
		exit;
}
if (($_POST["pass"])!=($_POST["passcheck"]))
{
	header("Location: main.php?err=wrongpass");
		exit;
}
if (!isset($_POST["email"]) || ($_POST["email"]==""))
{
	header("Location: main.php?emptyemail");
		exit;
}


require_once 'dbset.php';




$query="SELECT * FROM user WHERE login='".$_POST["log"]."'";

$res = mysqli_query($conn,$query) or die ("ERR:query1");
$nr = mysqli_num_rows($res);
if ($nr > 0)
	{
		header("Location: main.php?err=313");
		exit;
	}
	$query="SELECT * FROM user WHERE email='".$_POST["email"]."'";

$res = mysqli_query($conn,$query) or die ("ERR:query1");
$nr = mysqli_num_rows($res);
if ($nr > 0)
	{
		header("Location: main.php?err=314");
		exit;
	}
	
$result = $conn->query($query) or die("err:querryfirst");

	
	$query1="INSERT INTO user SET login='".$_POST["log"]."', pass='".$_POST["pass"]."', email='".$_POST["email"]."'";

$result = $conn->query($query1) or die("err:querry2");


?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta charset="utf-8">
</head>
<body>
<?php if (isset ($_GET["err"])) {
		if ($_GET["err"]== "0") { ?> <DIV style="color:red;"> Logout </DIV>
	<?php } if ($_GET["err"]== "1") { ?> <DIV style="color:red;"> ERR 1</DIV>
	<?php } if ($_GET["err"]=="2") { ?> <DIV style="color:red;"> ERR 2 </DIV>
	<?php } if ($_GET["err"]=="3") { ?> <DIV style="color:red;"> ERR 3 </DIV>
	<?php } if ($_GET["err"]=="4") { ?> <DIV style="color:red;"> ERR 4 </DIV>
	<?php } if ($_GET["err"]=="5") { ?> <DIV style="color:red;"> ERR 5 </DIV>
	<?php } if ($_GET["err"]=="13") { ?> <DIV style="color:red;"> ERROR 13 SESSION </DIV>
	<?php } if ($_GET["err"]=="25") { ?> <DIV style="color:red;"> USER IS NOT FOUND </DIV>
	<?php } if ($_GET["err"]=="26") { ?> <DIV style="color:red;">  SERVER ERROR  </DIV>
	<?php } } ?>
<div id=wrapper>
<p>
Регистрация успешна</p>


<p><A href="main.php"> Вернуться на главную страницу </A></p>


</div>
</body>
</html>