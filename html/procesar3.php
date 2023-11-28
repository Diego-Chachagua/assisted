<?php
$data = json_decode(file_get_contents('php://input'), true);
$nombre = $data['nombre'];
$usuario = $data['usuario'];
$contrasena = $data['contraseña'];
?>
<form action="actprof.php" method="post">
  <input type="text" name="viejo_n" value="<?php echo $nombre?>" hidden>
  <input type="text" name="viejo_u" value="<?php echo $usuario?>" hidden>
  <input type="text" name="vieja_c" value="<?php echo $contrasena?>" hidden>
<input type="text" name="nombres" class="nombree2" placeholder="Nombre" value="<?php echo $nombre?>"><br><br>
<input type="text" name="usuario" class="usus" placeholder="Usuario" value="<?php echo $usuario?>">  <input type="text" name="contrasenia" class="contrase" placeholder="Contraseña" value="<?php echo $contrasena?>">

<button id="guardar10" type="submit">
              <img class="gua" src="/assisted/img/chequesito.png">
              <p class="ca2">Aceptar</p>
            </button>
            </form>       
                