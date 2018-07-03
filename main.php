<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <style type="text/css">

.modal_div {
	width: 300px; 
	height: 300px; 
	border-radius: 5px;
	border: 3px #000 solid;
	background: #fff;
	position: fixed;
	top: 45%; 
	left: 50%; 
	margin-top: -150px;
	margin-left: -150px; 
	display: none; 
	opacity: 0; 
	z-index: 5; 
	padding: 20px 10px;
	font-size:15px;
	color:000000;
}

.modal_close {
	width: 21px;
	height: 21px;
	position: absolute;
	top: 10px;
	right: 10px;
	cursor: pointer;
	display: block;
}
/* Подложка */
#overlay {
	z-index: 3; 
	position: fixed; 
	background-color: #000; 
	opacity: 0.8; 
	width: 100%; 
	height: 100%; 
	top: 0; 
	left: 0; 
	cursor: pointer;
	display: none;
}
</style>
 <script type="text/javascript">
$(document).ready(function() { 
    
    var overlay = $('#overlay'); 
    var open_modal = $('.open_modal');
    var close = $('.modal_close, #overlay'); 
    var modal = $('.modal_div'); 

     open_modal.click( function(event){ 
         event.preventDefault(); 
         var div = $(this).attr('href'); 
         overlay.fadeIn(400, 
             function(){
                 $(div) 
                     .css('display', 'block') 
                     .animate({opacity: 1, top: '50%'}, 200); 
         });
     });

     close.click( function(){ 
            modal 
             .animate({opacity: 0, top: '45%'}, 200, 
                 function(){ 
                     $(this).css('display', 'none');
                     overlay.fadeOut(400);
                 }
             );
     });
});

function alert2(){
var login=document.getElementById("log").value;
var password=document.getElementById("pass").value;
var email1=document.getElementById("email").value;
}

</script>
</head>

  <body>
<?php
require_once 'dbset.php'; ?>
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
	<?php } if ($_GET["err"]=="emptylog") { ?> <DIV style="color:red;">  Логин не введен  </DIV>
	<?php } if ($_GET["err"]=="emptypass") { ?> <DIV style="color:red;"> Пароль не введен  </DIV>
	<?php } if ($_GET["err"]=="emptyemail") { ?> <DIV style="color:red;">  E-mail не введен  </DIV>
	<?php } if ($_GET["err"]=="wrongpass") { ?> <DIV style="color:red;">  Пароли не совпадают  </DIV>
		<?php } if ($_GET["err"]=="313") { ?> <DIV style="color:red;">  Логин занят  </DIV>
	
	<?php } } ?>
	<?php
$query="SELECT * FROM user";
$result = $conn->query($query);

?>
  <div class=register>
  <button href=#modal1 class="open_modal">Регистрация</button>
  <button id=btn href=#modal2 class="open_modal">Вход</button>
    </div>
<div id=wrapper>
<p> Список дел</p>
<p> Чтобы просмотреть, авторизуйтесь</p>

		
</div>
<div id="modal1" class="modal_div">
	<span class="modal_close">X</span>
		<form action="reg_check.php" method="post">
			<h3>Регистрация</h3>
			<p>Логин<br />
				<input type="text" name="log" value="123" id="log" size="40" />
			</p>
			<p>Пароль<br />
				<input type="password" name="pass" value="" id ="pass" size="40" />
			</p>
			<p>Повторите пароль<br />
				<input type="password" name="passcheck" value="" id ="passcheck" size="40" />
			</p>
			<p>e-mail<br />
				<input type="e-mail" name="email" id="email" value="" size="40" />
			</p>
			<p style="text-align: center; padding-bottom: 10px;">
				<input type="submit"  value="Отправить" />
			</p>
		
		</form>

</div>


<div id="modal2" class="modal_div">
	<span class="modal_close">X</span>
		<form action="user_check.php" method="post">
			<h3>Вход</h3>
			<p>Логин</p>
			<input type="text" name="login" id="login" value="" size="40" />
			</p>
			<p>Пароль<br />
				<input type="password" name="pasw" id="pasw" value="" size="40" />
			</p>
			
			<p style="text-align: center; padding-bottom: 10px;">
				<input type="submit" value="Отправить" />
			</p>
			
		</form>

	
</div>





<div id="overlay"></div>

</body>