<?php
require('conexion.php');

$nie = '123456789';

$nom = "SELECT nombre FROM estudiantes WHERE nie = '$nie'";
$name = $conexion->query($nom);
$nombre = $name -> fetch_assoc();
$consulta = "SELECT COUNT(DISTINCT dia) AS dias FROM asistencia_g WHERE nie = '$nie'";
$sql = $conexion->query($consulta);
$dias = array();
while ($row = $sql->fetch_assoc()) {
    $dias[] = $row['dias'];
}
foreach ($dias as $fechas) {
}
foreach ($nombre as $nombre1) {
}
$porcentaje = ($fechas/200)*100;
$final = $porcentaje;
echo "El porcentaje de asistencia del alumno " . $nombre1 . " es: " . $final."%";
?>