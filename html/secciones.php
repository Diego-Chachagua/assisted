<?php
require ('conexion.php');
// $cod_seccion=$_POST[''];
$cod_seccion="3";
$cod_grado="1";
$cod_anio="1";
$consulta=mysqli_query ($conexion,"SELECT estudiantes.nie,estudiantes.nombre,estudiantes.genero FROM estudiantes INNER JOIN alum_seccion ON alum_seccion.nie=estudiantes.nie INNER JOIN alum_anio ON alum_anio.nie=estudiantes.nie INNER JOIN alum_grado ON alum_grado.nie=estudiantes.nie INNER JOIN seccion ON seccion.c_se=alum_seccion.c_se WHERE alum_seccion.c_se='$cod_seccion' AND alum_grado.c_grado='$cod_grado' AND alum_anio.c_anio='$cod_anio'");
?>
<?php
  $consulta3=mysqli_query($conexion,"SELECT grado.grado,seccion.seccion,especialidades.nombre_es FROM grado INNER JOIN aula_grado ON aula_grado.c_grado=grado.c_grado INNER JOIN seccion ON seccion.c_se=aula_grado.c_se INNER JOIN anio ON anio.c_anio=aula_grado.c_anio INNER JOIN seccion_especialidad ON seccion_especialidad.c_se=seccion.c_se INNER JOIN especialidades ON especialidades.c_es=seccion_especialidad.c_es");
  $consulta4=mysqli_query($conexion,"SELECT COUNT(*) AS cantidad FROM estudiantes INNER JOIN alum_seccion ON alum_seccion.nie=estudiantes.nie INNER JOIN alum_anio ON alum_anio.nie=estudiantes.nie INNER JOIN alum_grado ON alum_grado.nie=estudiantes.nie INNER JOIN seccion ON seccion.c_se=alum_seccion.c_se WHERE alum_seccion.c_se='$cod_seccion' AND alum_grado.c_grado='$cod_grado' AND alum_anio.c_anio='$cod_anio'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secciones</title>
    <link rel="stylesheet" href="/assisted/css/cssc.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/assisted/css/modal.css">
</head>
<body class="body2">
    <header>
        <div class="cabecera2">
            <img class="as2" src="/assisted/img/asis.png">
            <nav class="navigation">
            <a  id="i2" href="../index.html" class="active">Inicio <span></span></a>
            <a  id="i2" href="../html/modificar_opciones.php">Asistencia <span></span></a>
            <a  id="i2" href="./secciones.php">Secciones <span></span> </a>
            <a  id="i2" href="./verusuarios.php">Usuarios <span></span></a>
        </nav>
            <img id="c2" src="/assisted/img/us.png">
            <p id="tit2">Control de asistencia</p>
            <a href="#">
                <img id="e2" src="/assisted/img/salida.png">
            </a>
            <p class="sesion2">Cerrar sesi&oacute;n</p>
        </div>
    </header><br><br>
    
    <div class="conteiner">
    <?php while($datos4=mysqli_fetch_array($consulta4)){?>
      <?php while($datos3=mysqli_fetch_array($consulta3)){?>

        <input type="text" name="idSeccion" id="" value="<?php echo $datos3["grado"].$datos3['seccion']; ?>" hidden>

    <button class="sec" onclick="mostrarVentana('verestu','<?php echo $datos3['grado']?>','<?php echo $datos3['seccion']?>')" type="submit">
            <h1 class="anio"><?php echo $datos3['grado'] .'°'.$datos3['seccion']?></h1>
            <div class="btn">
                <p class="s">Estudiantes:<?php echo $datos4['cantidad']?></p>
                <p class="sa">Especialidad:<?php echo $datos3['nombre_es'] ?></p>                   
            </div>
        </button>
        
        <?php } ?>
        <?php } ?>
        <button class="agre_seccion">
            <img src="/assisted/img/agregar.png" onclick="mostrarVentana('ventanaFlotante')">
        </button>
        </div>
    <div id="verestu" class="verestu"><!--div de ventana flotante-->
    <button class="salir" onclick="cerrarVentana('verestu')">
    <img class="exit" src="/assisted/img/cancelar.png">
  </button>
  <button class="elimina" id="elimina">
<img class="elimi" src="/assisted/img/eliminar.png"> Eliminar Secci&oacute;n
</button>
  <div id="datosModal" class="seccion"></div>
      <button class="agregar">
        <img  class="agre" id="openModal" src="/assisted/img/agregar.png">
      </button>
      
            <div id="datosMostrados">
          </div>
            <!-- inicio de mi codigo -->
        
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <div id="imageContainer">
                <button class="img" onclick="openFileInput()">
                  <img class="ad" src="/assisted/img/re.png">
                </button>
          </div>
            <form action="../php/create_alumno.php" method="POST" enctype="multipart/form-data">

                <input type="file" id="foto" name="foto" accept="image/*" style="display: none;"><br>
            
                <input type="number" id="nie" name="nie" placeholder="NIE"><br><br>
        
                <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo"><br><br>

                <div class="blanco">
                <label class="genero">G&eacute;nereo:</label><br><br>
                <input type="checkbox" class="masculino" id="masculino" name="sexo" value="M">
                <label for="masculino">Masculino</label>
                <input type="checkbox" id="femenino" name="sexo" value="F">
                <label for="femenino">Femenino</label>
                 </div><br><br>
            

                <button type="button" class="cancelar" onclick="window.location.href='/assisted/html/secciones.php'">Cancelar</button>
                <button type="submit" class="guardar" id="boton-guardar" >Guardar</button>
            
                <script src="../face-api.js"></script>
                <script src="../JS/descriptorFoto.js"></script>
            </form>
        </div>
    </div>
    <div id="elimiar" class="ventana2">
           <div class="contenido2">
            <p class="secc2">Enserio quiere eliminar la seccion</p>
            <br>
            <p class="secc3">Digite el grado y seccion denuevo:</p>
            <br>
            <form action="dropseccion.php" method="post">
            <input type="text" id="aniio" name="grados" placeholder="Grado" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            <input type="text" id="nom" name="seccion" placeholder="Seccion" maxlength="1">
            <input type="text" id="aniio" name="anios" placeholder="A&ntilde;o" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            <button id="guardar01" type="submit">
              <img class="gua" src="/assisted/img/chequesito.png">
              <p class="ca2">Aceptar</p>
            </button>
             </form>
             <form action="">
             <button id="cerrarVentana01" onclick="cerrarVentana('ventanaFlotante')">
              <img  class="cancel" src="/assisted/img/cancelar.png">
              <p class="ca">Cancelar</p>
            </button>
           </div>
    </div>
    </div>
    <script src="/assisted/JS/modal.js"></script>
    <script>
        function openFileInput() {
               // Simula un clic en el elemento de entrada de archivos
               document.getElementById('foto').click();
           }
   
           // Función para mostrar las imágenes seleccionadas
           function displayImages(event) {
               const imageContainer = document.getElementById('imageContainer');
               imageContainer.innerHTML = ''; // Limpia el contenedor de imágenes
   
               const files = event.target.files;
   
               for (let i = 0; i < files.length; i++) {
                   const file = files[i];
                   const image = document.createElement('img');
                   image.src = URL.createObjectURL(file);
                   image.style.maxWidth = '200px';
                   image.style.height = '150px';
                   imageContainer.appendChild(image);
               }
           }
   
           // Asigna la función displayImages al evento change del input de archivos
           document.getElementById('foto').addEventListener('change', displayImages);
   </script>

<!-- // codigo fin mio -->
    <div id="ventanaFlotante" class="ventana">
        <div class="contenido2">
        <form action="agreseccion.php" method="post">
            <input type="text" id="aniio" name="grado" placeholder="Grado" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            <input type="text" id="nom" name="seccion" placeholder="Seccion" maxlength="1">
            <input type="text" id="aniio" name="anio" placeholder="A&ntilde;o" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            <select class="mes2" id="mes2" name="turno">
              <option disabled selected="">Turno</option>
              <option>Matutino</option>
            <option>Vespertino</option>
          </select>
          <br><br>
          <input type="text" id="espe" name="especialidad" placeholder="Nombre de la Especialidad" maxlength="70">
             
            <button id="guardar" type="submit">
              <img class="gua" src="/assisted/img/chequesito.png">
              <p class="ca2">Aceptar</p>
            </button>
             </form>
             <form action="">
             <button id="cerrarVentana" onclick="cerrarVentana('ventanaFlotante')">
              <img  class="cancel" src="/assisted/img/cancelar.png">
              <p class="ca">Cancelar</p>
            </button>
            </form>
        </div>
        
    <script> // Función para mostrar la ventana flotante
      // Función para mostrar una ventana flotante
function mostrarVentana(idVentana,grado, seccion) {
  var modal = document.getElementById(idVentana);
    modal.style.display = "block";
    var datosaula = {
        seccion: seccion,
        grado:grado
    };  
    datosModal.innerHTML = datosaula.grado+"°"+datosaula.seccion;
    fetch('procesar.php', {
        method: 'POST',
        body: JSON.stringify({ seccion: seccion, grado: grado }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("datosMostrados").innerHTML = data;
    });
}



// Función para cerrar una ventana flotante
function cerrarVentana(idVentana) {

    document.getElementById(idVentana).style.display = "none";
}
    </script>
    <script>
      document.getElementById('elimina').addEventListener('click', function () {
    document.getElementById('elimiar').style.display = 'block';
});

document.getElementById('cerrarVentana01').addEventListener('click', function () {
    document.getElementById('elimiar').style.display = 'none';
});


    </script>
</body>
</html>