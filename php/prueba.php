<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Imagen de Estudiante</title>
</head>
<body>
<?php
include('../cone.php');

$nie = '123456789'; // El NIE del estudiante que deseas mostrar

$sql = "SELECT foto FROM estudiantes WHERE nie = '$nie'";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $imagenBase64 = $fila['foto'];

    // Mostrar la imagen directamente en la página utilizando el esquema de datos base64
    echo '<img src="data:image/jpeg;base64,' . $imagenBase64 . '" alt="Foto del estudiante" width="100" height="100">';
} else {
    echo 'No se encontraron registros para el NIE: ' . $nie;
}

$conexion->close();
?>
</body>
</html>
