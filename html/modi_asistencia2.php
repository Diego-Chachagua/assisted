<?php
require ('conexion.php');
$nombreMes = " ";

session_start();

// Verifica si ya hay datos en la sesión, si no, inicializa las variables
if (!isset($_SESSION['fecha'], $_SESSION['grado'], $_SESSION['seccion'])) {
    $_SESSION['fecha'] = '';
    $_SESSION['grado'] = '';
    $_SESSION['seccion'] = '';
}
if (isset($_POST['fecha'], $_POST['grado'], $_POST['seccion'])) {
    $_SESSION['fecha'] = $_POST['fecha'];
   $_SESSION['grado']  = $_POST['grado'];
    $_SESSION['seccion'] = $_POST['seccion'];
    $consulta3=mysqli_query($conexion,"SELECT grado.c_grado,seccion.c_se FROM grado INNER JOIN aula_grado ON aula_grado.c_grado=grado.c_grado INNER JOIN seccion ON seccion.c_se=aula_grado.c_se INNER JOIN anio ON anio.c_anio=aula_grado.c_anio WHERE grado.grado='$_SESSION[grado]' AND seccion.seccion='$_SESSION[seccion]'");
    if($mostrar=mysqli_fetch_assoc($consulta3)){

        $_SESSION['c_se']=$mostrar['c_se'];
       $_SESSION['c_grado']=$mostrar['c_grado'];
      $numeroMes = date("m", strtotime($_SESSION['fecha']));
    $mesesEnEspanol = array(
        "01" => "enero",
        "02" => "febrero",
        "03" => "marzo",
        "04" => "abril",
        "05" => "mayo",
        "06" => "junio",
        "07" => "julio",
        "08" => "agosto",
        "09" => "septiembre",
        "10" => "octubre",
        "11" => "noviembre",
        "12" => "diciembre"
    );

    if (array_key_exists($numeroMes, $mesesEnEspanol)) {
        $nombreMes = $mesesEnEspanol[$numeroMes];
    } else {
        echo "Número de mes no válido.";
    }

       $consulta=mysqli_query ($conexion,"SELECT estudiantes.nombre,asistencia_g.asisg FROM estudiantes INNER JOIN alum_seccion ON alum_seccion.nie=estudiantes.nie INNER JOIN alum_grado ON alum_grado.nie=estudiantes.nie INNER JOIN seccion ON seccion.c_se=alum_seccion.c_se INNER JOIN asistencia_g ON asistencia_g.nie=estudiantes.nie WHERE alum_seccion.c_se='$_SESSION[c_se]' AND alum_grado.c_grado='$_SESSION[c_grado]'");
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
        <button class="modifi" onclick="insertarImagen()">Asistido</button><br><br><br>
        <button class="modifi" onclick="insertarImagen2()">No Asistido</button><br><br><br>
        <button class="modifi" id="justi" onclick="insertarjusti()">Justificacion</button><br><br><br>

    </div>
    <div class="table">
    <h1 class="list">Listado de asistencia Instituto Nacional Cornelio Azenón Sierra 2023</h1>
    <br>

    <h2 class="aniiio" id="Anio">A&ntilde;o:<?php echo $_SESSION['grado']?></h2><h2 class="seccion" id="Seccion">Seccion:<?php echo $_SESSION['seccion']?></h2><h2 class="mes" id="Mes">Mes:<?php echo $nombreMes?></h2><br>

    <table id="tablaAsistencia">
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

         while($mostrar2=mysqli_fetch_assoc($consulta)) {
            $_SESSION['nombre']=$mostrar2['nombre']?>
        <tr>
        <th ><?php echo $contador?></th>
        <th ><?php echo $_SESSION['nombre'] ?></th>
        <th class=".semana2"> <table class="minitabla">
                <tr>
                <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                </tr>
                </table></th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia"onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                </tr>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
                    <td class="dia" onclick="habilitarEdicion(this)"><?php 
                if($mostrar2['asisg'] == 'A'){
                    echo '<img class="cheq" src=/assisted/img/chequesito.png >';
                }else{
                    echo '<img class="cancel" src=/assisted/img/cancelar.png >';
                }?></td>
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
    </div><br><br>
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
<div class="ventanaflotante" id="ventana">
        <div class="contenedor">
            <br>
            <p class="escusa">Escriba la justificacion:</p>
            <form action="guardar.php" method="post" onsubmit="">
            <textarea type="text" name="justifi" class="chambre"></textarea>
        </div>
        <button id="guardar" type="submit">
              <img class="gua12" src="/assisted/img/chequesito.png">
              <p class="ca2">Aceptar</p>
            </button>
            </form>
        <button id="cerrar">
              <img  class="cancel12" src="/assisted/img/cancelar.png">
              <p class="ca">Cancelar</p>
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
<script>
    function enviarJustificacion() {
    // Obtén los datos del formulario
    var justificacion = document.getElementsByName('justifi')[0].value;

    // Realiza una petición AJAX para enviar la justificación al servidor
    // Aquí deberías usar una biblioteca como jQuery o la API Fetch

    // Por ejemplo, usando Fetch:
    fetch('tu_script_de_procesamiento.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'justificacion=' + encodeURIComponent(justificacion),
    })
    .then(response => response.json())
    .then(data => {
        // Aquí puedes manejar la respuesta del servidor, si es necesario
        console.log(data);
    })
    .catch(error => {
        console.error('Error al enviar la justificación:', error);
    });

    // Cierra la ventana flotante
    document.getElementById('ventana').style.display = 'none';
}
</script>
<script>
     var celdaEditable = null;

function habilitarEdicion(celda) {
    if (celdaEditable !== null) {
        celdaEditable.contentEditable = false;
    }

    celda.contentEditable = true;
    celdaEditable = celda;
}

function insertarImagen() {
    if (celdaEditable !== null) {
        
        var imagenPredeterminada = document.createElement("img");
        imagenPredeterminada.src = "/assisted/img/chequesito.png"; // Reemplaza "URL_DE_LA_IMAGEN" con la URL de la imagen que desees utilizar.
        imagenPredeterminada.alt = "Imagen predeterminada";
        imagenPredeterminada.height = 15;
        imagenPredeterminada.style.width = "70%";
        imagenPredeterminada.style.display = "block"; // Alinear el contenido como bloque
        imagenPredeterminada.style.margin = "0 auto";
        celdaEditable.innerHTML = ""; // Limpia cualquier contenido existente en la celda.
        celdaEditable.appendChild(imagenPredeterminada);
        celdaEditable.contentEditable = false;
        celdaEditable = null;
        ajustarTamanioImagen(celda);
    }
}
function insertarImagen2() {
    if (celdaEditable !== null) {
        var imagenPredeterminada = document.createElement("img");
        imagenPredeterminada.src = "/assisted/img/cancelar.png"; // Reemplaza "URL_DE_LA_IMAGEN" con la URL de la imagen que desees utilizar.
        imagenPredeterminada.alt = "Imagen predeterminada";
        imagenPredeterminada.height = 10;
        imagenPredeterminada.style.width = "50%";
        imagenPredeterminada.style.display = "block"; // Alinear el contenido como bloque
        imagenPredeterminada.style.margin = "0 auto";
        celdaEditable.innerHTML = ""; // Limpia cualquier contenido existente en la celda.
        celdaEditable.appendChild(imagenPredeterminada);
        celdaEditable.contentEditable = false;
        celdaEditable = null;
        ajustarTamanioImagen(celda);
    }
}

function insertarjusti() {
            if (celdaEditable !== null) {
                var informacionPredeterminada = "J";
                celdaEditable.textContent = informacionPredeterminada;
                celdaEditable.contentEditable = false;
                celdaEditable = null;
            }
        }

        function ajustarTamanioImagen(celda) {
    var imagen = celda.querySelector('img'); // Obtener la imagen dentro de la celda

    if (imagen) {
        // Obtener las dimensiones de la celda
        var anchoCelda = celda.offsetWidth;
        var altoCelda = celda.offsetHeight;

        // Ajustar el tamaño de la imagen al tamaño de la celda
        imagen.style.width = anchoCelda + 'px';
        imagen.style.height = altoCelda + 'px';
    }
}
</script>

</html>