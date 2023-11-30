<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assisted/css/usuarios.css">
    <title>Usuarios</title>
</head>
<body class="body1">
    <?php include ('verprofes.php');?>
    <?php include ('versub.php'); ?>
    <?php include ('veradmin.php'); ?>
<header>
            <div class="cabecera">
                <img class="as" src="/assisted/img/asis.png">
                <a  id="i" href="../index.html">Inicio</a>
                <img id="c" src="/assisted/img/us.png">
                <p id="tit">Control de asistencia</p>
                <a href="cerrarsesion.php">
                    <img id="e" src="/assisted/img/salida.png">
                </a>
                <p class="sesion">Cerrar sesi&oacute;n</p>
            </div>
        </header>
        <br>
        <div class="grid-layout1">
    <button class="cuadro-gris" id="ver">
        <img class="ima" src="/assisted/img/profesor.png">
    </button>
    <button class="cuadro-gris" id="ver2">
        <img class="ima" src="/assisted/img/sub.png">
     </button>
     <button class="cuadro-gris" id="ver3">
        <img class="ima" src="/assisted/img/administrador.png">
    </button>
    <br><br>
</div>
<div class="modasis10"><br>
 <center><img class="fleca" src="/assisted/img/flechita.png" alt=""></center>
 <p class="ll">En este apartado tendra acceso a modificar <br>
 todos los tipos de usuarios que existen.</p>
</div>
</body>
</html>
<script>
    document.getElementById('ver').addEventListener('click', function () {
    document.getElementById('verprofe').style.display = 'block';
});

document.getElementById('cerrar1').addEventListener('click', function () {
    document.getElementById('verprofe').style.display = 'none';
});
</script>
<script>
    document.getElementById('ver2').addEventListener('click', function () {
    document.getElementById('versub').style.display = 'block';
});

document.getElementById('cerrar2').addEventListener('click', function () {
    document.getElementById('versub').style.display = 'none';
});
</script>
<script>
    document.getElementById('ver3').addEventListener('click', function () {
    document.getElementById('admin').style.display = 'block';
});

document.getElementById('cerrar3').addEventListener('click', function () {
    document.getElementById('admin').style.display = 'none';
});
</script>