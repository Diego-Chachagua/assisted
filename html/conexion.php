<?php
$url = 'https://notas10073.000webhostapp.com/conexion.php';

$response = file_get_contents($url);
if ($response !== false) {
    // Procesar la respuesta aquí
    echo $response;
} else {
    // Manejar errores
    echo 'No se conecto a la base de datos';
}
echo $response;
?>