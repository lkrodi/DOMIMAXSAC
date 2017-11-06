<?php

session_start();
session_destroy();
echo "ESTAS CERRANDO SESION";
echo '<script>window.location="../index.php";</script>';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cerrando sesion...</title>
	<meta charset="utf-8">
</head>
<body>
	<script type="text/javascript">
	location.href="../index.php";
	</script>

</body>
</html>
