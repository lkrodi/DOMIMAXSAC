<?php

session_start();
if(isset($_SESSION['user']))
{
	print '<script>window.location="vistas/listado.php";</script>';
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-
	width, initial-scale=1, maximum-scale=1"/>
	<link rel="stylesheet"  href="main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<title>Inicio de sesión | Domimax SAC</title>
</head>
<body>
	<h1>SISTEMA DOMIMAX S.A.C</h1>
	<hr>
	<h2>INICIO DE SESIÓN</h2>
	<form action="files/validaSesion.php" method="post" class="login">
		<input class="input" type="text" name="user" id="username"placeholder="Usuario">
		<input class="input" type="password" name="contra" id="password" placeholder="Contraseña">
		<input type="submit" value="ENTRAR" class="envio" name="validar">
	</form>
	<footer>
		<p>© Copyright 2017 Domimax S.A.C</p>
		<p>
			Desarrollado por <a herf="https:www.facebook.com/RodolfoKenllyEscalanteCumpa">Rodolfo Escalante Cumpa</a>
		</p>	
	</footer>
</body>
</html>
