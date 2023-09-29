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
<?php
$url2 = 'https://notas10073.000webhostapp.com/verestu.php';
$response2 = file_get_contents($url2);

if($response2 !== false){
}else{
    echo "no hay registros";
}
echo "<h1>" . $response2 . "</h1>";
?>