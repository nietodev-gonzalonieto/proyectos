<?php
	session_start();
	if (isset($_SESSION['admin'])){
		if ($_SESSION['admin'] == 'Loborojo1') {
			header('Location: todosFormularios.php');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<script src="https://kit.fontawesome.com/10a1164e39.js" crossorigin="anonymous"></script>
		<style type="text/css">
			
			* {
			  	box-sizing: border-box;
			  	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
			  	font-size: 16px;
			  	-webkit-font-smoothing: antialiased;
			  	-moz-osx-font-smoothing: grayscale;
			}
			body {
			  	background-color: azure;
			}
			.login {
			  	width: 400px;
			  	background-color: #ffffff;
			  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
			  	margin: 100px auto;
			}
			.login h1 {
			  	text-align: center;
			  	color: #5b6574;
			  	font-size: 24px;
			  	padding: 20px 0 20px 0;
			  	border-bottom: 1px solid #dee0e4;
			}
			.login form {
			  	display: flex;
			  	flex-wrap: wrap;
			  	justify-content: center;
			  	padding-top: 20px;
			}
			.login form label {
			  	display: flex;
			  	justify-content: center;
			  	align-items: center;
			  	width: 50px;
			  	height: 50px;
			  	background-color: #3274d6;
			  	color: #ffffff;
			}
			.login form input[type="password"], .login form input[type="text"] {
			  	width: 310px;
			  	height: 50px;
			  	border: 1px solid #dee0e4;
			  	margin-bottom: 20px;
			  	padding: 0 15px;
			}
			.login form input[type="submit"] {
			  	width: 100%;
			  	padding: 15px;
			 	margin-top: 20px;
			  	background-color: #3274d6;
			  	border: 0;
			  	cursor: pointer;
			  	font-weight: bold;
			  	color: #ffffff;
			  	transition: background-color 0.2s;
			}
			.login form input[type="submit"]:hover {
				background-color: #2868c7;
			  	transition: background-color 0.2s;
			}
		</style>
	</head>
	<body>
		<div class="login">
			<h1>Panel Admins</h1>
			<form action="loggin.php" method="post">
				<label for="usuario">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="usuario" placeholder="Usuario" id="usuario" required>
				<label for="contrasena">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="contrasena" placeholder="Contrasena" id="contrasena" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>