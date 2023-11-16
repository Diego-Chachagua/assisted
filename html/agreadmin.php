<?php
require ('conexion.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$usuario = $_POST['usuario'];
$contra = $_POST['contrasenia'];

$nombre_completo = $nombre . ' ' .$apellido;//poner en una sola variable el nombre y apellido

$consulta=mysqli_query($conexion,"SELECT c_admin FROM admin ORDER BY c_admin DESC LIMIT 1");//consulta  ultimo codigo del administrador
$mostrar=mysqli_fetch_assoc($consulta);
$c_a=$mostrar['c_admin'];
$cod_admin = $c_a + 1;

$insertar=mysqli_query($conexion,"INSERT INTO admin (c_admin,nombre_a) VALUES('$cod_admin','$nombre_completo')");

$consulta2=mysqli_query($conexion,"SELECT c_d FROM usuario ORDER BY c_d DESC LIMIT 1");//cconsultar el ultimo codigo de usuario
$mostrar2=mysqli_fetch_assoc($consulta2);
$c_u = $mostrar2['c_d'];
$cod_usu = $c_u + 1;

$insertar2=mysqli_query($conexion,"INSERT INTO usuario (c_d,c_admin,usu_a,contra_a) VALUES('$cod_usu','$cod_admin','$usuario','$contra')");
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
            <h1 class="asis">ADMINISTRADOR Y USUARIO GURDADA CON EXITO</h1>
            <br><br><br>
            <div class="white">
            <h2 class="da">Datos de la asistencia</h2><br>
                <p>Nombre del profesor: <?php echo $nombre_completo?> </p>
                <p>Usuario: <?php echo $usuario?> </p>
                <br>
                <a class="verde" href="verusuarios.php">>>> REGRESAR <<<</a>
                <br>
                </div>
        </center>
    </div>
</body>
</html>