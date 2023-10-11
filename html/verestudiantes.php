<?php
require ('conexion.php');
// $cod_seccion=$_POST[''];
$consulta=mysqli_query($conexion,"SELECT estudiantes.nie,estudiantes.nombre,estudiantes.genero FROM estudiantes INNER JOIN alum_seccion ON alum_seccion.nie=estudiantes.nie INNER JOIN alum_anio ON alum_anio.nie=estudiantes.nie INNER JOIN alum_grado ON alum_grado.nie=estudiantes.nie INNER JOIN seccion ON seccion.c_se=alum_seccion.c_se WHERE alum_seccion.c_se='1' AND alum_grado.c_grado='1' AND alum_anio.c_anio='1'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link rel="stylesheet" type="text/css" href="/assisted/css/cssj.css" media="screen"/>
</head>
<body class="body2">
  <button class="salir">
    <img class="exit" src="/assisted/img/cancelar.png">
  </button>
    <h1 class="seccion">3°k</h1>
    <h2 class="secc">Estudiantes:</h2>
      <button class="elimina">
        <img class="elimi" onclick="" src="/assisted/img/eliminar.png"> Elimiar Secci&oacute;n
      </button>
      <button class="agregar">
        <img  class="agre" onclick="mostrarVentana()" src="/assisted/img/agregar.png">
      </button>
    <br>
    <div>
      <table id="miTabla">
          <thead>
          <tr>
            <td class="nie">NIE</td>
            <td class="nom">Nombre Completo</td>
            <td class="gen">Genero</td>
            <td class="edit">Editar</td>
          </tr>
          </thead>
          <tbody>
             <?php while ($datos = mysqli_fetch_array( $consulta )) { ?> 
            <tr>
              <td><?php echo $datos['nie']?></td>
                <td><?php echo $datos['nombre'] ?></td>
                <td><?php echo $datos['genero']?></td>
                <td><button onclick="mostrarVentana()" class="lapiz">
                  <img  class="lapiz" src="/assisted/img/lapiz.png">
                </button>
                <form action="">
                <button onclick="" class="drop">
                  <img class="lapiz" src="/assisted/img/eliminar.png">
                </button>
                </form>
              </td>
              </tr>
          </tbody>
          <?php
             }
             ?>
        </table>
      </div>
    <div id="ventanaFlotante" class="ventana">
        <div class="contenido">
            <div id="imageContainer">
              <button class="img" onclick="openFileInput()">
                <img class="ad" src="/assisted/img/re.png">
              </button>
            <input type="file" id="fileInput" accept="image/*" style="display: none;">
        </div>
            <br><br>
            <input type="text" id="nie" name="miTextField" placeholder="Nie:" maxlength="12">
            <br>
            <br>
            <input type="text" id="nom" name="miTextField" placeholder="Nombre" maxlength="30">
            <input type="text" id="ape" name="miTextField" placeholder="Apellido" maxlength="30"><br><br>
            <select class="mes" id="mes">
              <option disabled selected="">Mes</option>
              <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
          </select>
          <select class="dia" id="dia">
            <option disabled selected="">Dia</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>
        </select>
        <input type="text" id="aniio" name="miTextField" placeholder="a&ntilde;o" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
        <br><br>
        <div class="g">
          <h2 class="sexo">G&eacute;nero:</h2>
          <input type="radio" id="masculino" name="genero" value="masculino">
          <label class="mascu">Masculino</label>
          <input type="radio" id="femenino" name="genero" value="femenino">
          <label class="feme">Femenino</label>
        </div><br>
              <form class="datos">
             <button id="cerrarVentana" onclick="cerrarVentana()">
              <img  class="cancel" src="/assisted/img/cancelar.png">Cancelar
            </button>
              </form>
              <form class="datos">
            <button id="guardar" type="submit" onclick="insertdatos()">
              <img class="gua" src="/assisted/img/chequesito.png">Aceptar
            </button>
          </form>
    </div>


    <script> // Función para mostrar la ventana flotante
    // Función para mostrar la ventana flotante
function mostrarVentana() {
    document.getElementById("ventanaFlotante").style.display = "block";
}

// Función para cerrar la ventana flotante
function cerrarVentana() {
    document.getElementById("ventanaFlotante").style.display = "none";
}
</script>
<script>
     function openFileInput() {
            // Simula un clic en el elemento de entrada de archivos
            document.getElementById('fileInput').click();
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
                image.style.maxWidth = '100%';
                image.style.height = '200px';
                imageContainer.appendChild(image);
            }
        }

        // Asigna la función displayImages al evento change del input de archivos
        document.getElementById('fileInput').addEventListener('change', displayImages);
</script>
</body>
</html>