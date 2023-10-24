<?php  ob_start(); ?>
<?php
require ('conexion.php');
// $cod_seccion=$_POST[''];
$cod_seccion="1";
$cod_grado="1";
$cod_anio="1";
$consulta=mysqli_query ($conexion,"SELECT estudiantes.nombre FROM estudiantes INNER JOIN alum_seccion ON alum_seccion.nie=estudiantes.nie INNER JOIN alum_anio ON alum_anio.nie=estudiantes.nie INNER JOIN alum_grado ON alum_grado.nie=estudiantes.nie INNER JOIN seccion ON seccion.c_se=alum_seccion.c_se WHERE alum_seccion.c_se='1' AND alum_grado.c_grado='1' AND alum_anio.c_anio='1'");
$consulta2=mysqli_query($conexion,"SELECT grado.grado,seccion.seccion FROM grado INNER JOIN aula_grado ON aula_grado.c_grado=grado.c_grado INNER JOIN seccion ON seccion.c_se=aula_grado.c_se INNER JOIN anio ON anio.c_anio=aula_grado.c_anio WHERE grado.c_grado='1' AND seccion.c_se='1'");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
    margin: 0%;
    padding: 0%;
}

h1{
    text-align: center;
}

.anio{
    text-align: left;
    margin-left: 90px;
}

.seccion{
    text-align: center;
    margin-top: -30px;
}

.mes{
    text-align: right;
    margin-top: -30px;
    margin-right: 90px;
}

table, th{
    border-collapse:collapse;
    border: 2px solid rgb(6, 6, 6);
    text-align: center;
}

table{
    margin-left: 50px;
}

.nombre{
    width: 250px;
}

.semana{
    width: 150px;
}

.minitabla{
    border-collapse:collapse;
    border: 2px solid rgb(6, 6, 6);
    text-align: center;
    margin-left: 0px;

}

td{
    border: 2px solid rgb(6, 6, 6);
}
.dia{
    width: 35px;
}

.cheq{
    height: 15px;
}

.cancel{
    height: 10px;
}
    </style>
</head>
<body>
    <br>
    <h1>Listado de asistencia Instituto Nacional Cornelio Azenón Sierra 2023</h1>
    <br>
    <?php if($mostrar=mysqli_fetch_assoc($consulta2)) {?>
    <h2 class="anio">A&ntilde;o:<?php echo $mostrar['grado'] ?></h2><h2 class="seccion">Seccion:<?php echo $mostrar['seccion']?></h2><h2 class="mes">Mes:Septiembre</h2><br><br><br>
    <?php } ?>
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
            <?php if($consulta->num_rows > 0){

                $contador=1;

             while($mostrar2=mysqli_fetch_array($consulta)) {?>
        <tr>
        <th class="num2"><?php echo $contador ?></th>
        <th class="nom2"><?php echo $mostrar2['nombre']?></th>
        <th class=".semana2"> <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table></th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </table>
        </th>
        <th class=".semana2">
        <table class="minitabla">
                <tr>
                <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cheq" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/chequesito.png"></p></td>
                    <td class="dia"><p><img class="cancel" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/assisted/img/cancelar.png"></p></td>
                </tr>
                </table>
        </th>
        </tr>
        
        <?php $contador++; } ?>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
<?php

$html= ob_get_clean();

require_once '../libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();


$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','landscape'); 

$dompdf->render();

$dompdf->stream("boleta.pdf", array("Attachment" =>false));
?>