<?php
require ('conexion.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$nombre_completo = $nombre.' '.$apellido;
 
$consulta=mysqli_query($conexion,"SELECT c_profe FROM profesor WHERE nombre_p='$nombre_completo'");
$mostrar=mysqli_fetch_assoc($consulta);
$cod_p=$mostrar['c_profe'];

$eliminar=mysqli_query($conexion,"DELETE FROM grado_profe WHERE c_profe='$cod_p'");

$eliminar2=mysqli_query($conexion,"DELETE FROM profe_materia WHERE c_profe='$cod_p'");

$eliminar3=mysqli_query($conexion,"DELETE FROM seccion_profe WHERE c_profe='$cod_p'");

$drop=mysqli_query($conexion,"DELETE FROM usuario WHERE c_profe='$cod_p'");

$drop2=mysqli_query($conexion,"DELETE FROM profesor WHERE c_profe='$cod_p'");
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
            <h1 class="asis">PROFESOR Y USUARIO BORRADOS CON EXITO</h1>
            <br><br><br>
            <div class="white">
            <h2 class="da">Profesor</h2><br>
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