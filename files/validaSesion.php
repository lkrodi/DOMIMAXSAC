<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Validando Usuario</title>
</head><body>

<?php
if (isset($_POST['validar'])) {
  require_once '../modelos/VehiculosData.php';
  $user=$_POST['user'];
  $pass=$_POST['contra'];

  $Usuario = new VehiculosData();
  $respuesta = $Usuario -> buscaUsuario($user, $pass);

  if ($Usuario -> codigo_retorno == '00') {
    $_SESSION['user'] = $respuesta[0]['nombre_usuario'];
    print "Iniciando sesion para". $_SESSION['user'] .'<br>';
    print '<script> window.location="../vistas/listado.php";</script>';
  }
  else {
    print '<script>alert("Usuario o contrasenia incorrecta.");</script>';
    print '<script>window.location="../index.php"</script>';
  }
}
else {
  print 'No tienes acceso al sistema, inicia sesion';
}
?>
</body>
</html>
