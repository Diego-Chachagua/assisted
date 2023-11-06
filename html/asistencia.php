<?php
require ('conexion.php');
 date_default_timezone_set('America/El_Salvador');
 $zonaHoraria = date_default_timezone_get();
 $Hora= date('H:i:s');
 $dia=date('Y-m-d ');

session_start();
$grado = $_SESSION['grado'];
$seccion = $_SESSION['seccion'];
$materia=$_SESSION['materia'];
$turno=$_SESSION['turno'];
$consulta=mysqli_query($conexion,"SELECT estudiantes.nie,estudiantes.nombre,estudiantes.genero FROM estudiantes INNER JOIN alum_seccion ON alum_seccion.nie=estudiantes.nie INNER JOIN alum_anio ON alum_anio.nie=estudiantes.nie INNER JOIN alum_grado ON alum_grado.nie=estudiantes.nie INNER JOIN seccion ON seccion.c_se=alum_seccion.c_se WHERE alum_seccion.c_se='$seccion' AND alum_grado.c_grado='$grado' AND alum_anio.c_anio='1'");
if (isset($_POST['checkbox']) && is_array($_POST['checkbox'])) {
    $check=$_POST['checkbox'];
}
while($dato=mysqli_fetch_array($consulta,MYSQLI_ASSOC)){
    $array[]=$dato['nie'];
}
$elementosCoinciden = array_intersect($array, $check);
// Elementos que no coinciden en $array1
$elementosNoCoincidenEnArray1 = array_diff($array, $check);
foreach($elementosCoinciden as $asis){
    $consulta=mysqli_query($conexion,"INSERT INTO asistencia_m(c_materia,nie,c_anio,c_turno,hora,dia,asism) VALUES ('$materia','$asis','$grado','$turno','$Hora','$dia','A')");
}
foreach($elementosNoCoincidenEnArray1 as $noasis){
    $consulta=mysqli_query($conexion,"INSERT INTO asistencia_m(c_materia,nie,c_anio,c_turno,hora,dia,asism) VALUES ('$materia','$noasis','$grado','$turno','$Hora','$dia','N')");
}
$asistencia=array();
if(isset($_POST['textarea']) && is_array($_POST['textarea'])){
    foreach($_POST['textarea'] as $valor){
        if($valor==""){
            $asistencia[]="N";
        }else{
            $asistencia[]="S";
        }
    }
}
$cant=count($asistencia);
for($i=0;$i<$cant;$i++){
    $consulta=mysqli_query($conexion,"UPDATE asistencia_m SET asm_j='$asistencia[$i]' WHERE nie='$array[$i]' AND c_materia='$materia' AND c_anio ='$grado' AND c_turno='$turno' AND hora='$Hora' AND dia='$dia'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Asistencia</title>
    <link rel="stylesheet" type="text/css" href="/assisted/css/option.css">
</head>
<body>
    <div>
        <center> 
            <h1 class="asis">ASISTENCIA GURDADA CON EXITO</h1>
            <br><br><br>
            <div class="white">
            <h2 class="da">Datos de la asistencia</h2><br>
                <p>Hora de ingreso: <?php echo $Hora?> </p>
                <p>Fecha de ingreso: <?php echo $dia?> </p>
                <br>
                <br>
                <a class="verde" href="option.html">>>> REGRESAR <<<</a>
                </div>
        </center>
    </div>
</body>
</html>