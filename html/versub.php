<?php
require ('conexion.php');

$consulta1=mysqli_query($conexion,"SELECT COUNT(*) AS cantidad FROM subdirector");
$consulta2=mysqli_query($conexion,"SELECT COUNT(usu_s) AS cantidad2 FROM usuario");
$consulta3=mysqli_query($conexion,"SELECT subdirector.nombre_s,usuario.usu_s,usuario.contra_s FROM subdirector INNER JOIN usuario ON usuario.c_sub=subdirector.c_sub");

?>
<div id="versub" class="verprofe"><!--div de ventana flotante-->
<div class="conteido">
    <button class="salir" id="cerrar2">
        <img src="/assisted/img/cancelar.png" alt="">
    </button>
    <?php if($mostrar2=mysqli_fetch_assoc($consulta2)){?> 
    <h2 class="secc">Usuarios: <?php echo $mostrar2['cantidad2'] ?></h2><br><br>
    <?php } ?>
    <?php if($mostrar1=mysqli_fetch_assoc($consulta1)){?>
    <h2 class="secc2">Subdirector: <?php echo $mostrar1['cantidad'] ?></h2>
        <?php } ?>
      <button class="agregar" id="agregar2">
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
               <td class="nom"><?php echo $mostrar3['nombre_s'] ?></td>
               <td class="nie"><?php echo $mostrar3['usu_s'] ?></td>
               <td  class="gen"><?php echo $mostrar3['contra_s'] ?></td>
               <td class="edit">
                   <button class="editar">
                       <img class="ed" src="/assisted/img/lapiz.png">
                   </button>
                   <button class="drop">
                       <img class="bor" src="/assisted/img/eliminar.png">
                   </button>
               </td>
           </tr>
           <?php } ?>
</tbody>
</table>
    </div>
        </div>

        <div class="registro2" id="registro2">
            <div class="contenido">
                <form action="agresub.php" method="post">
                <input type="text" name="nombre" class="nombree" placeholder="Nombre">  <input type="text" name="apellidos" class="apellidos" placeholder="Apellidos"><br><br>
                <input type="text" name="usuario" class="usus" placeholder="Usuario">  <input type="text" name="contrasenia" class="contrase" placeholder="Contraseña">
                <br>
            <button id="guardar1" type="submit">
              <img class="gua" src="/assisted/img/chequesito.png">
              <p class="ca2">Aceptar</p>
            </button>
                </form>
                <button id="cerrar12" onclick="window.location.href='/assisted/html/verusuarios.php'">
              <img  class="cancel" src="/assisted/img/cancelar.png">
              <p class="ca">Cancelar</p>
            </button>
            </div>
        </div>

        <div class="registro1" id="drop1">
                <div class="contenido">
            <p class="materr2">Quieres eliminar este usuario y subdirector <br>
       de la lista,Ingrese los datos de nuevo:</p><br>
       <form action="dropsub.php" method="post">
       <input type="text" name="nom" class="nombree" placeholder="Nombre">  <input type="text" name="apellido" class="apellidos" placeholder="Apellidos"><br>
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
    document.getElementById('agregar2').addEventListener('click', function () {
    document.getElementById('registro2').style.display = 'block';
});

document.getElementById('cerrar12').addEventListener('click', function () {
    document.getElementById('registro2').style.display = 'none';
});
</script>
<script>
document.querySelectorAll('.drop').forEach(function (boton) {
    boton.addEventListener('click', function () {
        document.getElementById('drop1').style.display = 'block';
    });
});

document.getElementById('cerrar11').addEventListener('click', function () {
    document.getElementById('drop1').style.display = 'none';
});
</script>