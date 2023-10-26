<?php
require ('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="description" content="Sitio web sobre control de notas INCAS">
        <meta name="Keywords" content="Control de notas incas,CONTROL DE NOTA,incas,Incas,INCAS,&iacute;nstituto nacional cornelio azen&oacute;n Sierra, &Iacute;NSTITUTO NACIONAL CORNELIO AZEN&Oacute;N SIERRA,&Iacute;nstituto Nacional Cornelio Azen&oacute;n Sierra">
        <meta name="author" content="Promoci&oacute;n de bachillerato tecnico vocacional en software año 2023">
        <meta name="copyright" content="Sitio web sobre control de notas INCAS,Promoci&oacute;n de bachillerato tecnico vocacional en software año 2023">
        
        <!--Vinculaación de ficheros externos-->
    <title>Modificaciones</title>
    <link rel="stylesheet" type="text/css" href="/assisted/css/cssj.css" media="screen"/>
    </head>
    <body class="body1">
        <header>
            <div class="cabecera">
                <img class="as" src="/assisted/img/asis.png">
                <a  id="i" href="#">Inicio</a>
                <img id="c" src="/assisted/img/us.png">
                <p id="tit">Control de asistencia</p>
                <a href="cerrarsesion.php">
                    <img id="e" src="/assisted/img/salida.png">
                </a>
                <p class="sesion">Cerrar sesi&oacute;n</p>
            </div>
        </header>
        <br>
        <br>
        <div class="modasis">
            <p class="ra">Razones Especiales De</p>
            <p class="ra">Asistencia:</p>
            <a href="#">
                <button class="but" type="button">Dia deportivo</button>
        </a>
        <a href="#">
                <button class="b" type="button">Act.Institucional</button>
        </a>
        <a href="#">
                <button class="bu" type="button">Dia Feriado</button>
        </a>
        </div>
        <br><br><br>
        <div class="modasis2">
            <p class="ra">Modificaci&oacute;n a alumno por</p>
            <p class="ra">justificaci&oacute;n:</p>
            <br>
            <br>
            <p class="ma">Ingrese la fecha que desea modificar ademas de la secci&oacute;n y a&ntilde;o que desea:</p>
            <br>
            <br>
            <div id="container">
                <form action="./modi_asistencia2.php" method="post">
                <input type="date" id="fecha" name="fecha">
            </div>
            <select class="anio" name="grado">
                <option disabled selected="">A&ntilde;o</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <select class="sec" name="seccion">
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
            <input class="modi" type="submit" value="Consultar">
            </form>
        </div>
        <br><br>
    </body>
</html>