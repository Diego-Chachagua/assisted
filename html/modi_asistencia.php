<?php
require ('conexion.php');

if (isset($_POST['fecha'], $_POST['grado'], $_POST['seccion'])) {
    $fecha = $_POST['fecha'];
    $grado = $_POST['grado'];
    $seccion = $_POST['seccion'];
    $consulta3=mysqli_query($conexion,"SELECT grado.c_grado,seccion.c_se FROM grado INNER JOIN aula_grado ON aula_grado.c_grado=grado.c_grado INNER JOIN seccion ON seccion.c_se=aula_grado.c_se INNER JOIN anio ON anio.c_anio=aula_grado.c_anio WHERE grado.grado='$grado' AND seccion.seccion='$seccion'");
    if($mostrar=mysqli_fetch_assoc($consulta3)){

        $cod_seccion=$mostrar['c_se'];
       $cod_grado=$mostrar['c_grado'];
       $numeroMes = date("m", strtotime($fecha));
    
    // Definir un array asociativo con los nombres de los meses en español
    $mesesEnEspanol = array(
        "01" => "Enero",
        "02" => "Febrero",
        "03" => "Marzo",
        "04" => "Abril",
        "05" => "Mayo",
        "06" => "Junio",
        "07" => "Julio",
        "08" => "Agosto",
        "09" => "Septiembre",
        "10" => "Octubre",
        "11" => "Noviembre",
    );

    if (array_key_exists($numeroMes, $mesesEnEspanol)) {
        $nombreMes = $mesesEnEspanol[$numeroMes];
    } else {
        echo "Número de mes no válido.";
    }
       $consulta=mysqli_query ($conexion,"SELECT estudiantes.nombre FROM estudiantes INNER JOIN alum_seccion ON alum_seccion.nie=estudiantes.nie INNER JOIN alum_grado ON alum_grado.nie=estudiantes.nie INNER JOIN seccion ON seccion.c_se=alum_seccion.c_se WHERE alum_seccion.c_se='$cod_seccion' AND alum_grado.c_grado='$cod_grado'");
    }else{
        $consulta=null;
    }
} else {

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assisted/css/cssj.css">
    <title>Asistencia</title>
</head>
<body class="body2">
<header>
    <div class="cabecera2">
            <img class="as" src="/assisted/img/asis.png">
            <a  id="i2" href="#">Inicio</a>
            <img id="c" src="/assisted/img/us.png">
            <p id="tit2">Control de asistencia</p>
            <a href="./cerrarsesion.php">
                <img id="e" src="/assisted/img/salida.png">
            </a>
        <p class="sesion2">Cerrar sesi&oacute;n</p>
        </div>
</header> <br>
<h1 class="selec">Seleccione un boton y ajuste la asistencia:</h1><br>
    <div class="botonnes">
        <button class="modifi">Asistido</button><br><br><br>
        <button class="modifi">No Asistido</button><br><br><br>
        <button class="modifi" id="justi">Justificacion</button>

        <div class="ventanaflotante" id="ventana">
        <div class="contenedor">
            <br>
            <p class="escusa">Escriba la justificacion:</p>
            <textarea type="text" name="justifi" class="chambre"></textarea>
        </div>
        <button id="guardar" type="submit">
              <img class="gua12" src="/assisted/img/chequesito.png">
              <p class="ca2">Aceptar</p>
            </button>
        <button id="cerrar">
              <img  class="cancel12" src="/assisted/img/cancelar.png">
              <p class="ca">Cancelar</p>
            </button>
            
</div>
    </div>
    <div class="table">
    <h1 class="list">Listado de asistencia Instituto Nacional Cornelio Azenón Sierra 2023</h1>
    <br>

    <h2 class="aniiio">A&ntilde;o:<?php echo $grado?></h2><h2 class="seccion">Seccion:<?php echo $seccion?></h2><h2 class="mes">Mes:<?php echo $nombreMes?></h2><br>

    <table>
        <thead>
            <tr>
            <th class="num">N°</th>
            <th class="nombre">Nombre Completo</th>
            <th class="semana">Semana 1
                <table class="minitabla">
                <tr>
                    <td class="dia">L</td>
                    <td class="dia">M</td>
                    <td class="dia">M</td>
                    <td class="dia">J</td>
                    <td class="dia">V</td>
                </tr>
                </table>
            </th>
            <th class="semana">Semana 2
            <table class="minitabla">
                <tr>
                    <td class="dia">L</td>
                    <td class="dia">M</td>
                    <td class="dia">M</td>
                    <td class="dia">J</td>
                    <td class="dia">V</td>
                </tr>
                </table>
            </th>
            <th class="semana">Semana 3
            <table class="minitabla">
                <tr>
                    <td class="dia">L</td>
                    <td class="dia">M</td>
                    <td class="dia">M</td>
                    <td class="dia">J</td>
                    <td class="dia">V</td>
                </tr>
                </table>
            </th>
            <th class="semana">Semana 4
            <table class="minitabla">
                <tr>
                    <td class="dia">L</td>
                    <td class="dia">M</td>
                    <td class="dia">M</td>
                    <td class="dia">J</td>
                    <td class="dia">V</td>
                </tr>
                </table>
            </th>
            </tr>
        </thead>
        <tbody>
        <?php if($consulta !== null && $consulta->num_rows > 0){

        $contador=1;

         while($mostrar2=mysqli_fetch_assoc($consulta)) {?>
        <tr>
        <th ><?php echo $contador?></th>
        <th ><?php echo $mostrar2['nombre'] ?></th>
        <th class=".semana2"> <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="/assisted/img/cancelar.png"></p></td>
                </tr>
                </table></th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="/assisted/img/cancelar.png"></p></td>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        </tr>
        <?php $contador++; } ?>
        <?php }else{
        } ?>
        </th>
        </tr>
        </tbody>
    </table>
    </div>
    <div class="escr">
    <h2 class="fec_nie">Escribe la fecha, nie y nombre del alumno a consultar justificacion:</h2><br>
    <input class="fecc" type="date" name="fecha" id="" placeholder=""> 
    <input class="niee" type="number" name="nie" placeholder="Nie">
    <input class="nomm" type="text" name="nombre" placeholder="Nombre del Alumno">
    <button class="cons" type="submit" id="con">Consultar</button>
    <br><br>
</div>
<div class="ventanaflotante" id="ventana2">
        <div class="contenedor">
            <br>
            <p class="escusa">Tenia problemas de salud</p>
        </div>
        <button id="guardar1" type="submit">
              <img class="gua12" src="/assisted/img/chequesito.png">
              <p class="ca2">Aceptar</p>
            </button>
            
</div>
</body>
<script>
document.getElementById('con').addEventListener('click', function () {
    document.getElementById('ventana2').style.display = 'block';
});

document.getElementById('guardar1').addEventListener('click', function () {
    document.getElementById('ventana2').style.display = 'none';
});


</script>
<script>

document.getElementById('justi').addEventListener('click', function () {
    document.getElementById('ventana').style.display = 'block';
});

document.getElementById('cerrar').addEventListener('click', function () {
    document.getElementById('ventana').style.display = 'none';
});

</script>
</html>