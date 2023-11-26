<?php
include('conexion.php');

$resultado = mysqli_query($conexion, "SELECT nie FROM estudiantes") or die(mysqli_error($conexion));

date_default_timezone_set('America/El_Salvador');
$anio = date('Y');
$dia = date('Y-m-d');
$Hora = date('H:i:s');
$c_anio = [
    2023 => 1,
    2024 => 2,
    2025 => 3,
    2026 => 4,
    2027 => 5,
    2028 => 6,
    2029 => 7,
    2030 => 8,
];

if (array_key_exists($anio, $c_anio)) {
    $id_anio = $c_anio[$anio];
} else {
    die("Año no válido");
}

while ($nie = mysqli_fetch_assoc($resultado)) {
    $niee = $nie['nie'];
    $insertar = mysqli_query($conexion, "INSERT INTO asistencia_g (c_asisg, nie, c_anio, dia, asisg, asg_j, asig_in, asg_ai) VALUES (null, '$niee', '$id_anio', '$dia', null, null, null, 'AI')");
}
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Asistencia</title>
    <link rel="stylesheet" type="text/css" href="/assisted/css/option.css">
</head>
<body>
    <div>
        <center> 
            <h1 class="asis">ASISTENCIA GURDADA CON EXITO</h1>
            <br><br><br>
            <div class="white">
            <h2 class="da">Datos de la asistencia</h2><br>
                <p>Fecha de ingreso: <?php echo $dia?> </p>
                <br>
                <br>
                <a class="verde" href="modificar_opciones.php">>>> REGRESAR <<<</a>
                </div>
        </center>
    </div>
</body>
</html>