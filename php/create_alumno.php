<?php
require('conexion.php');

// Obtiene los datos del formulario
$nie = $_POST["nie"];
$nombre = $_POST["nombre"];
$fechaNacimiento = $_POST["fechaNacimiento"];
$sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "";

// Procesa la foto
$fotoNombre = $_FILES["foto"]["name"];
$fotoTemp = $_FILES["foto"]["tmp_name"];
$fotoDestino = "fotos/" . $fotoNombre; 

// Mueve la foto al destino
if (move_uploaded_file($fotoTemp, $fotoDestino)) {
   
    // Convierte los descriptores faciales a una cadena JSON
    $descriptors = json_encode($_POST["descriptors"]);
    

    $sql = "INSERT INTO alumnos (nie, nombre, fecha_nacimiento, sexo, foto, descriptores_foto) VALUES ('$nie', '$nombre', '$fechaNacimiento', '$sexo', '$fotoNombre', '$descriptors')";

    if ($conn->query($sql) === TRUE) {
        echo "Alumno registrado correctamente.";
        echo "Descriptores: ";
        print_r($descriptors);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error al subir la foto.";
}

// Cierra la conexión
$conn->close();
?>
