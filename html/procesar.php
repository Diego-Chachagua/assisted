<?php
require ('conexion.php');
$data = json_decode(file_get_contents('php://input'), true);
// Obtén los datos enviados por JavaScript
$seccion = $data['seccion'];
$grado = $data['grado'];
$consulta5=mysqli_query($conexion,"SELECT c_se FROM seccion WHERE seccion='$seccion'");
$cod_c;
while($dato=mysqli_fetch_array($consulta5,MYSQLI_ASSOC)){
       $cod_c=$dato['c_se'];
}
$consulta2=mysqli_query ($conexion,"SELECT estudiantes.nie,estudiantes.nombre,estudiantes.genero FROM estudiantes INNER JOIN alum_seccion ON alum_seccion.nie=estudiantes.nie INNER JOIN alum_anio ON alum_anio.nie=estudiantes.nie INNER JOIN alum_grado ON alum_grado.nie=estudiantes.nie INNER JOIN seccion ON seccion.c_se=alum_seccion.c_se WHERE alum_seccion.c_se='$cod_c' AND alum_grado.c_grado='$grado' AND alum_anio.c_anio='1'");
// Realiza la consulta o el procesamiento necesario en la base de datos
// Aquí un ejemplo ficticio:
// Devuelve los datos al cliente (JavaScript)
echo '<table id="miTabla">

<tr class="cab">
  <td class="nie">NIE</td>
  <td class="nom">Nombre Completo</td>
  <td class="gen">Genero</td>
  <td class="edit">Editar</td>
</tr>
</table>';
while($dato2=mysqli_fetch_array($consulta2,MYSQLI_ASSOC)){
       echo '<table>
           <tr class="cab">
               <td class="nie1">' . $dato2["nie"] . '</td>
               <td class="nom1">' . $dato2['nombre'] . '</td>
               <td  class="gen1">' . $dato2['genero'] . '</td>
               <td class="edit1">
                   <button class="editar">
                       <img class="ed" src="/assisted/img/lapiz.png">
                   </button>
                   <button class="drop">
                       <img class="bor" src="/assisted/img/eliminar.png">
                   </button>
               </td>
           </tr>
       </table>';  
}
?>