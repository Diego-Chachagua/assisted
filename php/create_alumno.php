<?php
require('../cone.php');

// Obtiene los datos del formulario
$nie = $_POST["nie"];
$nombre = $_POST["nombre"];
$sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "";

// Procesa la foto
$fotoNombre = $_FILES["foto"]["name"];
$fotoTemp = $_FILES["foto"]["tmp_name"];
$fotoDestino = "../fotos/" . $fotoNombre; 

// Mueve la foto al destino
if (move_uploaded_file($fotoTemp, $fotoDestino)) {
   
    // Convierte los descriptores faciales a una cadena JSON
    $descriptors = json_encode($_POST["descriptors"]);
    

    $sql = "INSERT INTO estudiantes (nie, nombre, genero, foto, descriptores) VALUES ('$nie', '$nombre', '$sexo', '$fotoNombre', '$descriptors')";

    if ($conexion->query($sql) === TRUE) {
        echo "Alumno registrado correctamente.";
        echo "Descriptores: ";
        print_r($descriptors);
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
} else {
    echo "Error al subir la foto.";
}

// Cierra la conexión
$conexion->close();
?>
