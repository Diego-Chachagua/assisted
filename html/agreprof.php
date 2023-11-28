<?php 
require ('conexion.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$usuario = $_POST['usuario'];
$contra = $_POST['contrasenia'];
$materias= $_POST['materias'];
$grado = $_POST['grado'];
$seccion = $_POST['seccion'];

$nombre_completo = $nombre .' '. $apellido; //concatena nombre y apellido en una sola variable

$consulta1=mysqli_query($conexion,"SELECT c_profe FROM profesor ORDER BY c_profe DESC LIMIT 1"); //consultar codigo de profesor
$mostrar=mysqli_fetch_assoc($consulta1);
$c_profe=$mostrar['c_profe'];
$c_prof=$c_profe + 1;
$consulta2=mysqli_query($conexion,"SELECT c_d FROM usuario ORDER BY c_d DESC LIMIT 1"); //consulta codigo de usuario
$mostrar2=mysqli_fetch_assoc($consulta2);
$c_d=$mostrar2['c_d'];
$cod_u=$c_d+1; //suma uno mas  para la insercion
$insertar=mysqli_query($conexion,"INSERT INTO profesor (c_profe,nombre_p) VALUES('$c_prof','$nombre_completo')"); //inserta el nuevo profesor

$insertar2=mysqli_query($conexion,"INSERT INTO usuario (c_d,c_profe,usu_p,contra_p) VALUES('$cod_u','$c_prof','$usuario','$contra')"); //inserta el usuario

foreach ($materias as $materia) {
    $insertar3=mysqli_query($conexion, "INSERT INTO profe_materia (c_mp, c_profe, c_materia) VALUES (null, '$c_prof', '$materia')");
}

foreach ($grado as $grados){
    if( $grados == '1 y 2'){
        $anios = [1,2];
        foreach ($anios as $anio) {
            $consulta4 = mysqli_query($conexion, "INSERT INTO grado_profe (c_gp, c_profe, c_grado) VALUES (null, '$c_prof', '$anio')");
        }
    }else {
        $consulta4 = mysqli_query($conexion, "INSERT INTO grado_profe (c_gp, c_profe, c_grado) VALUES (null, '$c_prof', '$grados')");
    }
}
if (!is_array($seccion)) {
    // Si no es un array, conviértelo en un array
    $seccion = array($seccion);
}
foreach ($seccion as $secciones) {
    $secc = [
        'A' => 1,
        'E' => 2,
        'K' => 3,
        'G' => 4,
        'D' => 5,
        'O' => 6,
        'L' => 7,
        'M' => 8,
        'N' => 9,
        'F' => 10,
        'H' => 11,
        'B' => 12
    ];

    if (array_key_exists($secciones, $secc)) {
        $c_seccion = $secc[$secciones];
    }
    echo $c_seccion . "<br>";
            $consulta5 = mysqli_query($conexion, "INSERT INTO seccion_profe (c_sp, c_se, c_profe) VALUES (null, '$c_seccion', '$c_prof')");
            if ($consulta5) {
                echo "Registro exitoso";
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }            
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Usuario</title>
    <link rel="stylesheet" type="text/css" href="/assisted/css/option.css">
</head>
<body>
    <div>
        <center> 
            <h1 class="asis">PROFESOR Y USUARIO GURDADA CON EXITO</h1>
            <br><br><br>
            <div class="white">
            <h2 class="da">Datos de la asistencia</h2><br>
                <p>Nombre del profesor: <?php echo $nombre_completo?> </p>
                <p>Usuario: <?php echo $usuario?> </p>
                <br>
                <br>
                <br>
                <br>
                <a class="verde" href="verusuarios.php">>>> REGRESAR <<<</a>
                </div>
        </center>
    </div>
</body>
</html>