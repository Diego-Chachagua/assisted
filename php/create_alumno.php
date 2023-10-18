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
$foto = $_FILES["foto"]["tmp_name"];

// Verifica si se cargó una imagen
if (isset($foto) && is_uploaded_file($foto)) {
    // Lee el contenido de la imagen
    $fotoContenido = file_get_contents($foto);

    // Convierte los descriptores faciales a una cadena JSON
    $descriptors = $_POST["descriptors"];
    $descriptors2 = trim($descriptors, '[');
    $descriptors3 = trim($descriptors2, '{');
    $descriptors4 = preg_replace('/"(\d+)"/', '', $descriptors3);
    $descriptors5 = str_replace(':', '', $descriptors4);

    // Codifica la imagen a formato base64
    $fotoBase64 = base64_encode($fotoContenido);

    // Escapa las variables para prevenir SQL injection
    $nie = $conexion->real_escape_string($nie);
    $nombre = $conexion->real_escape_string($nombre);
    $sexo = $conexion->real_escape_string($sexo);
    $descriptors5 = $conexion->real_escape_string($descriptors5);

    // Inserta los datos en la base de datos
    $sql = "INSERT INTO estudiantes (nie, nombre, genero, foto, descriptores) VALUES ('$nie', '$nombre', '$sexo', '$fotoBase64', '$descriptors5')";

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
