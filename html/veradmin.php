<?php
require ('conexion.php');

$consulta1=mysqli_query($conexion,"SELECT COUNT(*) AS cantidad FROM admin");
$consulta2=mysqli_query($conexion,"SELECT COUNT(usu_a) AS cantidad2 FROM usuario");
$consulta3=mysqli_query($conexion,"SELECT admin.nombre_a,usuario.usu_a,usuario.contra_a FROM admin INNER JOIN usuario ON usuario.c_admin=admin.c_admin");

?>
<div id="admin" class="verprofe"><!--div de ventana flotante-->
<div class="conteido">
    <button class="salir" id="cerrar3">
        <img src="/assisted/img/cancelar.png" alt="">
    </button>
    <?php if($mostrar2=mysqli_fetch_assoc($consulta2)){?> 
    <h2 class="secc">Usuarios: <?php echo $mostrar2['cantidad2'] ?></h2><br><br>
    <?php } ?>
    <?php if($mostrar1=mysqli_fetch_assoc($consulta1)){?>
    <h2 class="secc2">Administrador: <?php echo $mostrar1['cantidad'] ?></h2>
        <?php } ?>
      <button class="agregar" id="agregar3">
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
               <td class="nom"><?php echo $mostrar3['nombre_a'] ?></td>
               <td class="nie"><?php echo $mostrar3['usu_a'] ?></td>
               <td  class="gen"><?php echo $mostrar3['contra_a'] ?></td>
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

        <div class="registro1" id="registro3">
            <div class="contenido">
                <form action="" method="post">
                <input type="text" name="nombre" class="nombree" placeholder="Nombre">  <input type="text" name="apellidos" class="apellidos" placeholder="Apellidos"><br><br>
                <input type="text" name="usuario" class="usus" placeholder="Usuario">  <input type="text" name="contrasenia" class="contrase" placeholder="Contraseña">
                <br>
                <button id="cerrar13" onclick="window.location.href='/assisted/html/verusuarios.php'">
              <img  class="cancel" src="/assisted/img/cancelar.png">
              <p class="ca">Cancelar</p>
            </button>
            <button id="guardar" type="submit">
              <img class="gua" src="/assisted/img/chequesito.png">
              <p class="ca2">Aceptar</p>
            </button>
                </form>
            </div>
        </div>

        <script>
    document.getElementById('agregar3').addEventListener('click', function () {
    document.getElementById('registro3').style.display = 'block';
});

document.getElementById('cerrar13').addEventListener('click', function () {
    document.getElementById('registro3').style.display = 'none';
});
</script>