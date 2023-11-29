<?php
require ('conexion.php');
$nombre_v = $_POST['viejo_n'];
$usu_v = $_POST['viejo_u'];
$contra_v = $_POST['vieja_c'];
$nombre_n = $_POST['nombres'];
$usuario_n = $_POST['usuario'];
$contra_n = $_POST['contrasenia'];

if(isset($_POST['nombres'])){
    $nombre_n = $_POST['nombres'];
    $update=mysqli_query($conexion,"UPDATE subdirector SET nombre_s ='$nombre_n' WHERE nombre_s='$nombre_v'");
}

if(isset($_POST['usuario'])){
    $usuario_n = $_POST['usuario'];
    $update2=mysqli_query($conexion,"UPDATE usuario SET usu_s='$usuario_n' WHERE usu_s='$usu_v'");
}

if(isset($_POST['contrasenia'])){
    $contra_n = $_POST['contrasenia'];
    $update3=mysqli_query($conexion,"UPDATE usuario SET contra_s='$contra_n' WHERE contra_s='$contra_v'");
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
            <h1 class="asis">SUBDIRECTOR O USUARIO ACTUALIZADO CON EXITO</h1>
            <br><br><br>
            <div class="white">
                <p>Nombre del profesor: <?php echo $nombre_n?> </p>
                <p>Usuario: <?php echo $usuario_n?> </p>
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