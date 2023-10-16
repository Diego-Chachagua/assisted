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
        <a href="#" class="active">Inicio<span></span></a>
        <a href="#">Asistencia<span></span></a>
        <a href="#">Secciones<span></span></a>
        <a href="#">Usuarios<span></span></a>
        </nav>
        </header>

        <div class="modasis">
            <p class="ra">Asistencia General: Asistencia Total: 450 Alumnos  </p>
            <p class="ra">Asistencia Por Genero:</p><br><br>
            <img class="imagen1" src="/assisted/img/hombre.png" >
            <p class="ipo">250</p>

            <img class="imagen2" src="/assisted/img/mujer.png" >


           
        </a>
        </div>
        
        <div class="modasis2">
            <p class="ra">Creacion de archivos informativo </p>
            <p class="ra">sobre la asistencia:</p>
            <br>
            <br>
            <p class="ma"> </p>
            <p class="ma">este archivo incluye la asistencia general de: 
                (Dias,semanas Y mes seleccionado)</p>

            
            <div id="container">
                <input type="date" id="fecha">
            </div>
            
            <a href="#">
                <button class="modi" type="button">Imprimir Reporte</button>
        </a>
        </div>
        
        <br><br>
        <div class="modasis2">
            <p class="ra">Consulta de asistencia por secciones</p>
            <p class="ra">justificaci&oacute;n:</p>
            <br>
            <br>
            <p class="ma">Creacion de archivos informativo sobre la asistencia: </p>
            <p class="ma">este archivo incluye la asistencia general de: 
                (Dias,semanas Y mes seleccionado)</p>
                <select class="anio">
                <option disabled selected="">A&ntilde;o</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <select class="sec">
                <option disabled selected="">Secci&oacute;n</option>
                <option>A</option>
                <option>B</option>
                <option>D</option>
                <option>H</option>
                <option>E</option>
                <option>M</option>
                <option>N</option>
            </select>

        <script src="/assisted/JS/script.js"></script>

</html>

<?php
    require('../cone.php');

"SELECT * FROM(asistencia_g.nie)  FROM asistencia_g INNER JOIN estudiantes ON asistencia_g.nie = estudiantes.nie WHERE genero = 'M'";

 
?>