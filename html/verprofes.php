<?php
require ('conexion.php');

$consulta1=mysqli_query($conexion,"SELECT COUNT(*) AS cantidad FROM profesor");
$consulta2=mysqli_query($conexion,"SELECT COUNT(usu_p) AS cantidad2 FROM usuario");
$consulta3=mysqli_query($conexion,"SELECT profesor.nombre_p,usuario.usu_p,usuario.contra_p FROM profesor INNER JOIN usuario ON usuario.c_profe=profesor.c_profe");

?>
<div id="verprofe" class="verprofe"><!--div de ventana flotante-->
<div class="conteido">
    <button class="salir" id="cerrar1">
        <img src="/assisted/img/cancelar.png" alt="">
    </button>
    <?php if($mostrar2=mysqli_fetch_assoc($consulta2)){?> 
    <h2 class="secc">Usuarios: <?php echo $mostrar2['cantidad2'] ?></h2><br><br>
    <?php } ?>
    <?php if($mostrar1=mysqli_fetch_assoc($consulta1)){?>
    <h2 class="secc2">Profesores: <?php echo $mostrar1['cantidad'] ?></h2>
        <?php } ?>
      <button class="agregar" id="agregar">
        <img  class="agre" id="" src="/assisted/img/agregar.png">
      </button>
      <table id="miTabla">
        <thead>
<tr>
  <td class="nom">Nombre </td>
  <td class="nie">Usuario</td>
  <td class="gen">Contrase&ntilde;a</td>
  <td class="edit">Editar</td>
</tr>   
</thead>
<tbody>
    <?php while($mostrar3=mysqli_fetch_assoc($consulta3)) {?>
        <tr>
               <td class="nom"><?php echo $mostrar3['nombre_p'] ?></td>
               <td class="nie"><?php echo $mostrar3['usu_p'] ?></td>
               <td  class="gen"><?php echo $mostrar3['contra_p'] ?></td>
               <td class="edit">
                   <button class="editar" onclick="mostrarVentana34('actualizar','<?php echo $mostrar3['nombre_p']?>','<?php echo $mostrar3['usu_p']?>','<?php echo $mostrar3['contra_p']?>')">
                       <img class="ed" src="/assisted/img/lapiz.png">
                   </button>
                   <button class="drop" id="elimi">
                       <img class="bor" src="/assisted/img/eliminar.png">
                   </button>
               </td>
           </tr>
           <?php } ?>
</tbody>
</table>
    </div>
        </div>

        <div class="registro1" id="registro1">
            <div class="contenido">
                <form action="agreprof.php" method="post">
                <input type="text" name="nombre" class="nombree" placeholder="Nombre">  <input type="text" name="apellidos" class="apellidos" placeholder="Apellidos"><br><br>
                <input type="text" name="usuario" class="usus" placeholder="Usuario">  <input type="text" name="contrasenia" class="contrase" placeholder="Contraseña"><br><br>
                <p class="materr">Materias:</p>
                <div class="materi">
                <input type="checkbox" name="materias[]" value="1">Ciencias <br>
                <input type="checkbox" name="materias[]" value="2">Lenguaje <br>
                <input type="checkbox" name="materias[]" value="3">Sociales <br>
                <input type="checkbox" name="materias[]" value="4">Ingles <br>
                <input type="checkbox" name="materias[]" value="5">Informatica <br>
                <input type="checkbox" name="materias[]" value="6">OPLV <br>
                <input type="checkbox" name="materias[]" value="7">Seminario <br> 
                <input type="checkbox" name="materias[]" value="8">HPP <br>
                <input type="checkbox" name="materias[]" value="9">MUCI  <br>
                <input type="checkbox" name="materias[]" value="10">Matematica <br>
                <input type="checkbox" name="materias[]" value="11">Electricidad <br>
                <input type="checkbox" name="materias[]" value="12">Agropecuario <br>
                <input type="checkbox" name="materias[]" value="13">Turismo  <br>
                <input type="checkbox" name="materias[]" value="14">Software <br>
                <input type="checkbox" name="materias[]" value="15">Contaduria <br>
                </div>
                <select name="grado[]" class="anios">
                    <option value="" disabled selected>Año</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>1 y 2</option>
                </select>
                <select name="seccion[]" class="seccc" multiple>
                    <option value="" disabled selected>Seccion</option>
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
                </div>
                <br>
            <button id="guardar">
              <img class="gua" src="/assisted/img/chequesito.png">
              <p class="ca2">Aceptar</p>
            </button>
            </form>
            <button id="cerrar11" onclick="window.location.href='/assisted/html/verusuarios.php'">
              <img  class="cancel" src="/assisted/img/cancelar.png">
              <p class="ca">Cancelar</p>
            </button>
            </div>
            
            <div class="registro1" id="drop">
                <div class="contenido">
            <p class="materr2">Quieres eliminar este usuario y profesor <br>
       de la lista,Ingrese los datos de nuevo:</p><br>
       <form action="dropprofe.php" method="post">
       <input type="text" name="nombre" class="nombree" placeholder="Nombre">  <input type="text" name="apellido" class="apellidos" placeholder="Apellidos"><br>
                <br>
                <button id="guardar10" type="submit">
              <img class="gua" src="/assisted/img/chequesito.png">
              <p class="ca2">Aceptar</p>
            </button>
       </form>
                <button id="cerrar10" onclick="window.location.href='/assisted/html/verusuarios.php'">
              <img  class="cancel" src="/assisted/img/cancelar.png">
              <p class="ca">Cancelar</p>
            </button>
                </div>
            </div>
        <script>
    document.getElementById('agregar').addEventListener('click', function () {
    document.getElementById('registro1').style.display = 'block';
});

document.getElementById('cerrar11').addEventListener('click', function () {
    document.getElementById('registro1').style.display = 'none';
});
</script>
<script>
    document.querySelectorAll('.drop').forEach(function (boton) {
    boton.addEventListener('click', function () {
        document.getElementById('drop').style.display = 'block';
    });
});

document.getElementById('cerrar10').addEventListener('click', function () {
    document.getElementById('drop').style.display = 'none';
});

</script>
<script>
    function mostrarVentana34(idVentana,nombre, usuario, contraseña) {
  var modal = document.getElementById(idVentana);
    modal.style.display = "block";
    var datosaula = {
        nombre: nombre,
        usuario: usuario,
        contraseña: contraseña
    };  
    fetch('procesar3.php', {
        method: 'POST',
        body: JSON.stringify({ nombre: nombre, usuario: usuario, contraseña: contraseña}),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("datosMostrados").innerHTML = data;
    });
}
</script>