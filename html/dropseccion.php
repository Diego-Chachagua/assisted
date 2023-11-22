<?php
require  ('conexion.php');

$grado = $_POST['grados'];
$seccion = $_POST['seccion'];
$anio = $_POST['anios'];

$consulta=mysqli_query($conexion,"SELECT c_anio FROM anio WHERE anio='$anio'");
$mostrar=mysqli_fetch_assoc($consulta);
$c_anio=$mostrar['c_anio'];

$consulta1=mysqli_query($conexion,"SELECT c_se FROM seccion WHERE seccion='$seccion'");
$mostrar2=mysqli_fetch_assoc($consulta1);
$c_se=$mostrar2['c_se'];

$eliminar=mysqli_query($conexion,"DELETE FROM aula_grado WHERE c_anio='$c_anio' AND c_grado='$grado' AND c_se='$c_se'");
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
            <h1 class="asis">GRADO Y SECCION BORRADOS CON EXITO</h1>
            <br><br><br>
            <div class="white">
            <h2 class="da">Datos de la asistencia</h2><br>
                <p>Grado: <?php echo $grado?> </p>
                <p>Seccion: <?php echo $seccion?> </p>
                <br>
                <br>
                <br>
                <br>
                <a class="verde" href="secciones.php">>>> REGRESAR <<<</a>
                </div>
        </center>
    </div>
</body>
</html>