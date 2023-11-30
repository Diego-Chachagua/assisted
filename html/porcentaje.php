<?php  ob_start(); ?>
<?php
require('conexion.php');

$nie = $_POST['nie'];
$anio = date("Y");
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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porcentaje</title>
    <style>
        .nombre{
            width: 360px;
        }

        .por{
            width: 100px;
        }

        .anio{
            width: 50px;
        }
    </style>
</head>
<body>
    <center><h1>PORCENTAJE DE CADA ESTUDIANTE EN EL AÑO <?php echo $anio?></h1></center><br><br>
     <p>Este esl el porcentaje del estudiante <?php echo $nombre1?> en el a&ntilde;o <?php echo $anio?>:</p><br>

     <table border="3">
        <tr>
            <th class="nombre">Nombre del estudiante</th>
            <th class="por">Porcentaje</th>
            <th class="anio">A&ntilde;o</th>
        </tr>
        <tr>
            <th><?php echo $nombre1?></th>
            <th><?php echo $final.'%'?></th>
            <th><?php echo $anio?></th>
        </tr>
     </table>
</body>
</html>
<?php

$html= ob_get_clean();

require_once '../libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();


$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4'); 

$dompdf->render();

$dompdf->stream("porcentaje.pdf", array("Attachment" =>false));
?>