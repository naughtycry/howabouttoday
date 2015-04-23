<!DOCTYPE html>
<html>
<head>
	<title> #wat member </title>
	<style type="text/css">

		@font-face{
		    font-family: watVivaldi;
		    src: url(../fonts/VIVALDII.TTF);
		}

		@font-face{
			font-family: watPapyrus;
		    src: url(../fonts/PAPYRUS.TTF);
		}

		@font-face{
			font-family: watPristina;
		    src: url(../fonts/PRISTINA.TTF);
		}

		body{background-image: url('../images/nature.jpg'); background-size: 100%;}
		.container{width: 330px; margin: auto; text-align: center}
		.wat{font-family: 'watVivaldi'; color: #f3ac12; font-size: 70px; text-align: center; font-weight: 500; margin-top: 110px;
				margin-bottom: 0px;
			}
		form input{border: none; border-bottom: 1px solid #a8a8a8; background: none; width: 100%; height: 40px;
					outline: none; text-align: center; font-family: 'watPristina'; font-size: 25px; color: #a8a8a8;
					margin-top: 30px;
					}
		.sbm{width: 100%; height: 45px; margin-top: 55px; border: none; background: #27ae60; font-family: 'watVivaldi';
				font-size: 25px; color: #e8e8e8;
			}

		.signup{color: #e8e8e8; font-family: 'watVivaldi'; font-size: 16px; float: right;}

		.warning{font-family: 'watVivaldi'; font-size: 25px; color: #a8a8a8; margin-top: 5vh; outline: 1px solid red}
		.success{font-family: 'watVivaldi'; font-size: 25px; color: #a8a8a8; margin-top: 5vh; outline: 1px solid green}
		.copyright{font-family: 'watVivaldi'; font-size: 25px; color: #6c6b6b; position: absolute; bottom: 20px;
				width: 330px; text-align: center}
	</style>
	<script src="../libraries/jquery-1.11.2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".username").focus();	

		})

		function checkFrm(frm){
			var username = $('.username').val();
			var password = $('.password').val();
			var re_password = $('.re-password').val();
			if(username=="" || username==null){
				$(".username").attr('placeholder', 'this field is required');
				$(".username").css({"outline":"1px solid red"});
				$(".username").focus();
				$(".warning").css({"display": "none"});
				return false;
			}

			if(password=="" || password==null){
				$(".password").attr('placeholder', 'this field is required');
				$(".password").css({"outline": "1px solid red"});
				$(".password").focus();
				$(".warning").css({"display": "none"});
				return false;
			}

			if(re_password=="" || re_password==null){
				$(".re-password").attr('placeholder', 'this field is required');
				$(".re-password").css({"outline": "1px solid red"});
				$(".re-password").focus();
				$(".warning").css({"display": "none"});
				return false;
			}

			if(re_password!=password){
				$(".re-password").val("");
				$(".re-password").attr('placeholder', 're-password incorrect.');
				$(".re-password").css({"outline": "1px solid red"});
				$(".warning").css({"display": "none"});
				return false;
			}

			return true;
		}
	</script>
</head>
<body>
	<div class="container">
		<p class="wat"> #wat </p>
		<form method="POST" action="new_member_check.php" onsubmit="return checkFrm(this)">
			<input type="text" name="username" class="username" placeholder="username" autocomplete="off">
			<input type="password" name="password" class="password" placeholder="password">
			<input type="password" name="re-password" class="re-password" placeholder="re-password">
			<button type="submit" class="sbm"> create new </button>
		</form>
		<a class="signup" href="member.php"> sign in? </a>

		<?php
		if(isset($_GET['warn']))
			echo '<p class="warning"> username already exsits. </p>';
		
		if(isset($_GET['success']))
			echo '<p class="success"> your account has been created. </p>';	

		?>
		<p class="copyright"> Copyright 2015 </p>
	</div>
</body>
</html>