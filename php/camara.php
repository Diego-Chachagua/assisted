<?php
require('../cone.php');
include('descriptores.php');
ini_set('max_execution_time', 300);
$sql = "SELECT descriptores FROM estudiantes WHERE descriptores IS NOT NULL";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $descriptores_faciales = array();
    $descriptor = array();
    while ($row = $result->fetch_assoc()) {
        $descriptores_faciales[] = $row["descriptores"];
    }
    foreach ($descriptores_faciales as $descriptor_foto) {
        $descriptor[] = trim($descriptor_foto, '"');
    }        
    echo "<script>var descriptoresFaciales = " . json_encode($descriptor) . ";</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/assisted/css/camara.css" media="screen"/>
    <script src="../jquery.min.js"></script>
    <title>Dividir la pantalla en dos partes verticales</title>
    <script src="../face-api.js"></script>

</head>
<body>
<header>
    <img class="logo" src="/assisted/img/logo1.png" >
    <nav class="navigation">
        <a href="#" class="active">Inicio<span></span></a>
        <a href="#">Asistencia<span></span></a>
        <a href="#">Secciones<span></span></a>
        <a href="#">Usuarios<span></span></a>
    </nav>
</header><br>
<div class="container">
    <div class="column">
        <!-- Contenido de la primera columna -->
        <video id="video" width="660" height="350" autoplay muted></video>
        <p id="mensaje"></p>
        <p id="lista"></p>
    </div>
    <div class="column2">
 
    <p id="resultado"></p>
    <script src="../JS/main.js"></script>
    </div>
</div>
</body>
</html>


