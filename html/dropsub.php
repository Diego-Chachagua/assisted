<?php
require ('conexion.php');

$nombre = $_POST['nom'];
$apellido = $_POST['apellido'];

$nombre_completo = $nombre.' '.$apellido;

$consulta=mysqli_query($conexion,"SELECT c_sub FROM subdirector WHERE nombre_s='$nombre_completo'");
$mostrar=mysqli_fetch_assoc($consulta);
$c_sub = $mostrar['c_sub'];

$drop=mysqli_query($conexion,"DELETE FROM usuario WHERE c_sub='$c_sub'");

$drop2=mysqli_query($conexion,"DELETE FROM subdirector WHERE nombre_s='$nombre_completo'");
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
            <h1 class="asis">SUBDIRECTOR Y USUARIO BORRADOS CON EXITO</h1>
            <br><br><br>
            <div class="white">
            <h2 class="da">Subdirector</h2><br>
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