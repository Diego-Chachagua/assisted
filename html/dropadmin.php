<?php 
require ('conexion.php');

$nombre = $_POST['nom'];
$apellido = $_POST['apellido'];

$nombre_completo = $nombre.' '.$apellido;

$consulta=mysqli_query($conexion,"SELECT c_admin FROM admin WHERE nombre_a='$nombre_completo'");
$mostrar=mysqli_fetch_assoc($consulta);
$c_admin = $mostrar['c_admin'];

$drop=mysqli_query($conexion,"DELETE FROM usuario WHERE c_admin='$c_admin'");

$drop2=mysqli_query($conexion,"DELETE FROM admin WHERE nombre_a='$nombre_completo'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Usuario</title>
    <link rel="stylesheet" type="text/css" href="/assisted/css/option.css">
</head>
<body>
    <div>
        <center> 
            <h1 class="asis">ADMINISTRADOR Y USUARIO BORRADOS CON EXITO</h1>
            <br><br><br>
            <div class="white">
            <h2 class="da">Administrador</h2><br>
                <p>nombre: <?php echo $nombre_completo?> </p>
                <br>
                <br>
                <br>
                <a class="verde" href="verusuarios.php">>>> REGRESAR <<<</a>
                </div>
        </center>
    </div>
</body>
</html>