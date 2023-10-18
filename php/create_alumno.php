<?php

function conexion(){
    $db_host="srv1082.hstgr.io";
    $db_nombre="u328483004_assisted";
    $db_usuario="u328483004_Asis2024";
    $db_contraseña="Assisted314";

    $conexion = mysqli_connect($db_host,$db_usuario,$db_contraseña,$db_nombre);

    if (mysqli_connect_errno()) {
        echo "No se pudo conectar con la Base de Datos";
        exit();
    }
   
    mysqli_set_charset($conexion,"utf8");
    return $conexion;
}

// Obtén la conexión a la base de datos
$conexion = conexion();

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
