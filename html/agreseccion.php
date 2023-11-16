<?php 
require ('conexion.php');
$grado = $_POST['grado'];
$seccion = $_POST['seccion'];
$anio = $_POST['anio'];
$turno = $_POST['turno'];
$especialidad = $_POST['especialidad'];

$consulta1=mysqli_query($conexion,"SELECT c_se FROM seccion WHERE seccion='$seccion'");
$mostrar1=mysqli_fetch_assoc($consulta1);
$seec=$mostrar1['c_se'];
$c_se=$seec;

$consulta2=mysqli_query($conexion,"SELECT c_turno FROM turno WHERE turno='$turno'");
$mostrar2=mysqli_fetch_assoc($consulta2);
$c_turno=$mostrar2['c_turno'];

$consulta3=mysqli_query($conexion,"SELECT c_anio FROM anio WHERE anio='$anio'");
$mostrar3=mysqli_fetch_assoc($consulta3);
$c_anio=$mostrar3['c_anio'];

$consulta4=mysqli_query($conexion,"SELECT c_es FROM especialidades WHERE nombre_es='$especialidad'");
$mostrar4=mysqli_fetch_assoc($consulta4);
$c_es=$mostrar4['c_es'];

$consulta5=mysqli_query($conexion,"SELECT c_almg FROM aula_grado ORDER BY c_almg DESC LIMIT 1");
$mostrar5=mysqli_fetch_assoc($consulta5);
$c_almg=$mostrar5['c_almg'];
$c_al = $c_almg + 1;

$insertar=mysqli_query($conexion,"INSERT INTO aula_grado (c_almg,c_anio,c_grado,c_se) VALUES('$c_al','$c_anio','$grado','$c_se')");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Seccion</title>
    <link rel="stylesheet" type="text/css" href="/assisted/css/option.css">
</head>
<body>
    <div>
        <center> 
            <h1 class="asis">SECCION GURDADA CON EXITO</h1>
            <br><br><br>
            <div class="white">
            <h2 class="da">Datos de la asistencia</h2><br>
                <p>Nombre del profesor: <?php echo $grado?> </p>
                <p>Usuario: <?php echo $seccion?> </p>
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