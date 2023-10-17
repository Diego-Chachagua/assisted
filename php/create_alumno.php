<?php
require('../cone.php');

// Obtiene los datos del formulario
$nie = $_POST["nie"];
$nombre = $_POST["nombre"];
$sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "";

// Procesa la foto
$fotoTemp = $_FILES["foto"]["tmp_name"];

// Mueve la foto al destino
if (isset($fotoTemp)) {
   
    // Convierte los descriptores faciales a una cadena JSON
    $descriptors = json_encode($_POST["descriptors"]);
    

    $sql = "INSERT INTO estudiantes (nie, nombre, genero, foto, descriptores) VALUES ('$nie', '$nombre', '$sexo', '$fotoTemp', '$descriptors')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: /assisted/html/secciones.php"); // Ruta absoluta
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
} else {
    echo "Error al subir la foto.";
}

// Cierra la conexión
$conexion->close();
?>
