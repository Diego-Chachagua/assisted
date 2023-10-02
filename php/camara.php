<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
    <script src="face-api.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column; /* Alinear elementos en columna */
            justify-content: center;
            align-items: center;
        }
        canvas {
            position: absolute;
        }
    </style>
    
</head>
<body>
    <video id="video" width="720" height="560" autoplay muted></video>
    <p id="mensaje"></p>
    <p id="resultado"></p>
    <script src="main.js"></script>
</body>
</html>


<?php
require('conexion.php');

$sql = "SELECT nombre, descriptores_foto FROM alumnos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si hay filas en el resultado, procesa y muestra los datos
    $descriptores_faciales = array();
    $descriptor = array();
    while ($row = $result->fetch_assoc()) {
        $descriptores_faciales[] = $row["descriptores_foto"];
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
        $descriptr = $descriptor[$posicion]; // Agregar el descriptor al array
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
            json_encode($nombres);
        }
    }
}

?>




