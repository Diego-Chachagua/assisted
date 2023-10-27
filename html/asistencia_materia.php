<?php
require ('conexion.php');
    $grado=$_POST["grado"];
    $seccion=$_POST["seccion"];
    $materia=$_POST["materia"];
    $turno=$_POST["turno"];
    session_start();
    $_SESSION['grado'] = $grado;
    $_SESSION['seccion']=$seccion;
    $_SESSION['materia']=$materia;
    $_SESSION['turno']=$turno;
    if($grado!="Grado"  && $seccion!="Seccion" && $materia!="Materias" && $turno !="Turnos"){
        $consulta1=mysqli_query($conexion,"SELECT seccion FROM seccion WHERE c_se='$seccion'");
        $consulta2=mysqli_query($conexion,"SELECT nombre_m FROM materia WHERE c_materia='$materia'");
        $consulta3=mysqli_query($conexion,"SELECT turno FROM turno  WHERE c_turno='$turno'");
        $n_secc;
        $n_mat;
        $n_tur;
        while($dato=mysqli_fetch_array($consulta1,MYSQLI_ASSOC)){
            $n_secc=$dato['seccion'];
        }

        while($dato=mysqli_fetch_array($consulta2,MYSQLI_ASSOC)){
            $n_mat=$dato['nombre_m'];
        }
        while($dato=mysqli_fetch_array($consulta3,MYSQLI_ASSOC)){
            $n_tur=$dato['turno'];
        }
        $consulta4=mysqli_query($conexion,"SELECT estudiantes.nie,estudiantes.nombre FROM estudiantes INNER JOIN alum_seccion ON alum_seccion.nie=estudiantes.nie INNER JOIN alum_anio ON alum_anio.nie=estudiantes.nie INNER JOIN alum_grado ON alum_grado.nie=estudiantes.nie INNER JOIN seccion ON seccion.c_se=alum_seccion.c_se WHERE alum_seccion.c_se='$seccion' AND alum_grado.c_grado='$grado' AND alum_anio.c_anio='1'");
   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia Materia</title>
    <link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
    <section class="contenedor_P">
        <center>
        <div class="titulos">
        <h1 class="titulo1">CONTROL DE ASISTENCIA POR MATERIA</h1>
        <h2 class="titulo2">Asistencia de el año:<?php echo $grado?>  Seccion:<?php echo $n_secc ?><br>de la materia:<?php echo $n_mat?> </h2>
        </div>
        
        <div id="miModal" class="modal">
    <div class="modal-content">
        <span class="close" id="cerrarModal">&times;</span>
        <h2>Uso de Justificacion</h2>
        <p>La justificacion debera ser añadida en dado caso que el estudiante/alumno no haya asistido.</p>
    </div>
</div>
        <div class="Tabla">
           <table class="tabla_alumnos" border solid 1px>
            <caption> Asistencia de alumnos del turno: <?php echo $n_tur ?> </caption>
            <thead>
        <tr>
            <td>N°</td>
            <td>Nombre Completo</td>
            <td>Asistencia</td>
            <td>Justificacion   
                 <input type="button" id="abrirModal" value="?" ></input></td>
        </tr>
    </thead>
    <tbody>
    <form method="post" action="asistencia.php">
        <?php
        $id=0;
        while($dato=mysqli_fetch_array($consulta4,MYSQLI_ASSOC)){
            $id++;
        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $dato['nombre']?></td>
            <td>
        
            <center><input type="checkbox" name="checkbox[]" value="<?php echo  $dato['nie']?>" checked></center>
            </td>
            <td><input type="textarea" name="textarea[]" value="<?php $i?>" placeholder="añadir justificacion"></td>
        </tr>
        <?php
        };
        ?>
    </tbody>
            
</table>
</div>
<br>
<input type="submit" value="Guardar asistencia">
</form>
</center>
    </section>
</body>
</html>

<script>
  var modal = document.getElementById("miModal");
var botonAbrir = document.getElementById("abrirModal");
var botonCerrar = document.getElementById("cerrarModal");

botonAbrir.onclick = function() {
    modal.style.display = "block";
}

botonCerrar.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    
    </script>
    <?php
    }else{
        echo "<center><h1>Error al completar el formulario\n Falto completar</h1></center>";
    }
    ?>