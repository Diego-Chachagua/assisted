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

$fecha_actual = date('Y-m-d'); // Formato: Año-Mes-Día Hora:Minutos:Segundos
date_default_timezone_set('America/El_Salvador');
$hora = date("H"); // Formato de 24 horas (HH:MM:SS)



if ($hora >= 7 && $hora <= 12) {
    $consulta = mysqli_query($conexion, "SELECT COUNT(*) AS hombres FROM asistencia_g INNER JOIN estudiantes ON asistencia_g.nie = estudiantes.nie WHERE dia = '$fecha_actual' AND genero = 'M' AND asisg = 'A'");
$datos=mysqli_fetch_array($consulta);

$consulta1 = mysqli_query($conexion, "SELECT COUNT(*) AS mujer FROM asistencia_g INNER JOIN estudiantes ON asistencia_g.nie = estudiantes.nie WHERE dia = '$fecha_actual' AND genero = 'F' AND asisg = 'A'");
$datos1=mysqli_fetch_array($consulta1);

$total=$datos['hombres']+$datos1['mujer'];
} else {
    $consulta = mysqli_query($conexion, "SELECT COUNT(*) AS hombres FROM asistencia_g INNER JOIN estudiantes ON asistencia_g.nie = estudiantes.nie WHERE dia = '$fecha_actual' AND genero = 'M' AND asisg = 'A' AND hora >= '$hora'");
    $datos=mysqli_fetch_array($consulta);
    
    $consulta1 = mysqli_query($conexion, "SELECT COUNT(*) AS mujer FROM asistencia_g INNER JOIN estudiantes ON asistencia_g.nie = estudiantes.nie WHERE dia = '$fecha_actual' AND genero = 'F' AND asisg = 'A' AND hora >= '$hora'");
    $datos1=mysqli_fetch_array($consulta1);
    
    $total=$datos['hombres']+$datos1['mujer'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" type="text/css" href="/assisted/css/csse.css">
    
</head>

<body>
    <header>
        <h2 class="logo"><img id="logo" src="/assisted/img/logo1.png" ></h2>
        <nav class="navigation">
        <a href="../index.html" class="active">Inicio<span></span></a>
        <a href="../html/modificar_opciones.php">Asistencia<span></span></a>
        <a href="../html/secciones.php">Secciones<span></span></a>
        <a href="../html/verusuarios.php">Usuarios<span></span></a>
        </nav>
        </header>

        <div class="modasis">
            <p class="ra">Asistencia General: Asistencia Total: <?php echo $total ?> Alumnos</p>
            <p class="ra1">Asistencia Por Genero:</p><br><br>
            <img class="imagen1" src="/assisted/img/hombre.png" >
            <p class="ipo"></p>
            <img class="imagen2" src="/assisted/img/mujer.png" >  
            <br><br><br><br><br><br>
            <p class = "H"><?php echo $datos['hombres'] ?></p>
            <p class = "F"><?php echo $datos1['mujer'] ?></p>
        </div>
        
        
        <div class="modasis2">
            <p class="ra1">Creacion de archivos informativo </p>
            <p class="ra1">sobre la asistencia:</p>
            <br>
            <p class="ma"> </p>
            <p class="ma">este archivo incluye la asistencia general de: 
                (Dias,semanas Y mes seleccionado)</p>

                <form action="procesar1.php" method="post">
                    <input type="number" class="nie" name="nie" placeholder="Nie del estudiante" required>
                    <label for="mes">Escriba el numero de mes que desea ver si es menor a 10 poner un cero antes ej: 01, 02 y 03</label>
                    <input type="number" class="mes" name="mes" maxlength="2" placeholder="Mes que desea ver" required>
                    <input type="number" class="año" name="año" maxlength="2" placeholder="Año que desea ver" required>
                    <input type="submit" value="ENVIAR">
                </form><br>

                <p class="ma">Aqui puede ver en un archivo el porcentaje<br>
        de cada estudiante al año</p>
        <form action="porcentaje.php" method="post">
        <input type="text" name="nie" class="mess" placeholder="NIE">
        <button class="modi" type="button">Ver Informe</button>
        </form>
        </div>
        
        <br><br>
        <div class="modasis2">
            <p class="ra1">Consulta de asistencia por secciones</p>
            <p class="ra1">justificaci&oacute;n:</p>
            <br>
            <br>
            <p class="ma">Creacion de archivos informativo sobre la asistencia: </p>
            <p class="ma">este archivo incluye la asistencia general de: 
                (Dias,semanas Y mes seleccionado)</p>
                <form action="./modi_asistencia.php" method="post">
                <input type="date" name="fecha" class="fecc">
                <select name="grado" class="anio">
                <option disabled selected="">A&ntilde;o</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <select name="seccion" class="sec">
                <option disabled selected="">Secci&oacute;n</option>
                <option>A</option>
                <option>E</option>
                <option>K</option>
                <option>G</option>
                <option>D</option>
                <option>O</option>
                <option>L</option>
                <option>M</option>
                <option>N</option>
                <option>F</option>
                <option>H</option>
                <option>B</option>
            </select>
            <input class="modii2" type="submit" value="Consultar">
                </form>
                <br>
                
        </div>

</body>
</html>

