<?php
require('../cone.php');

$sql = "SELECT nombre, descriptores_foto FROM alumnos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si hay filas en el resultado, procesa y muestra los datos
    $descriptores_faciales = array();
    $descriptor = array();
    $nom = array();

    while ($row = $result->fetch_assoc()) {
        $descriptores_faciales[] = $row["descriptores_foto"];
        $nom[] = $row["nombre"];
    }
    foreach ($descriptores_faciales as $descriptor_foto) {
        $descriptor[] = trim($descriptor_foto, '"');
    }
    // Convierte el arreglo $descriptor a una cadena JSON
    $descriptor_json = json_encode($descriptor);
    // Imprime la cadena JSON como una variable JavaScript
    echo "<script> var descriptoresFaciales = " . json_encode($descriptor) . "; </script>";

}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $posicion = $_POST['j'];

    if ($posicion !== null) {
        $descriptr = array();
        $descriptr = $nom2[$posicion]; // Agregar el descriptor al array
        $perfil = json_encode($descriptr);

        $sql2 = "SELECT nombre FROM alumnos WHERE descriptores_foto LIKE '%$perfil%'";

        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // Si hay filas en el resultado, procesa y muestra los nombres
            $nombres = array(); // Inicializar un array para almacenar los nombres
            while ($row2 = $result2->fetch_assoc()) {
                $nombres = $row2["nombre"];
            }
            // Imprimir los nombres
            echo json_encode($nombres);
        }
    }
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
    <script src="../JS/main.js"></script>
        </div>
        <div class="column2">
            <!-- Contenido de la segunda columna -->
            <h1>Columna 2</h1>
            <p>Contenido de la segunda columna.</p>
            <p id="resultado"></p>

        </div>
    </div>
</body>
</html>