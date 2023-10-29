<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/assisted/css/csso.css" media="screen"/>
</head>
<body>
<?php
session_start(); // Iniciar o reanudar la sesión

require('../cone.php');

if (isset($_POST['j'])) {
    if ($_POST['j']) {
        $numero = $_POST['j'];
            $sql2 = "SELECT descriptores FROM estudiantes WHERE descriptores IS NOT NULL";
            $result2 = $conexion->query($sql2);

            if ($result2->num_rows > 0) {
                $descriptores_faciales2 = array();
                $descriptor2 = array();
                while ($row2 = $result2->fetch_assoc()) {
                    $descriptores_faciales2[] = $row2["descriptores"];
                }
                foreach ($descriptores_faciales2 as $descriptor_foto2) {
                    $descriptor2[] = trim($descriptor_foto2, '"');
                }
                $perfil = $descriptor2[$numero];
                $sql3 = "SELECT nie, nombre, foto FROM estudiantes WHERE descriptores LIKE '%$perfil'";
                $result3 = $conexion->query($sql3);

                if ($result3->num_rows > 0) {
                    echo '<table class="custom-table" border="3">';
                    while ($fila = $result3->fetch_assoc()) {
                        $nombre = $fila['nombre'];
                        $foto = $fila['foto'];
                        $nie = $fila['nie'];
                        date_default_timezone_set('America/El_Salvador');
                        $fecha = date('Y-m-d');
                        $hora = date('H:i:s'); // Formato de hora: horas:minutos:segundos
                        $anio = date('Y');
                        function turno($hora, $rango){
                            $horaActual = strtotime($hora);
                            $horaInicio = strtotime($rango[0]);
                            $horaFin = strtotime($rango[1]);

                            return ($horaActual >= $horaInicio && $horaActual <= $horaFin);
                        }
                        $rango2 = ['06:30:00', '07:10:00'];
                        $rango1 = ['12:30:00', '13:10:00'];
                        
                        if (turno($hora, $rango1)) {
                            $c_turno = 1;
                        }elseif (turno($hora, $rango2)) {
                            $c_turno = 2;
                        }else{
                            $c_turno = null;
                        }
                        $consulta3= "SELECT g.grado, s.seccion
                        FROM estudiantes e
                        JOIN alum_grado ag ON e.nie = ag.nie
                        JOIN grado g ON ag.c_grado = g.c_grado
                        JOIN alum_seccion asl ON e.nie = asl.nie
                        JOIN seccion s ON asl.c_se = s.c_se
                        WHERE e.nie = '$nie';";
                        $da = $conexion->query($consulta3);
                        $datos = $da->fetch_assoc();
                    
                        echo '<tr>';
                        echo '<td colspan="2">';
                        // Mostrar la imagen directamente en la página utilizando el esquema de datos base64
                        echo '<img src="data:image/jpeg;base64,' . $foto . '" alt="Foto del estudiante" width="900" height="900">';
                        echo '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td colspan="2" class="nombre">';
                        echo $nombre;
                        echo '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td class="grado">';
                        echo 'A&ntilde;o: ' . $datos['grado'];               
                        $c_anio = [
                            2023 => 1,
                            2024 => 2,
                            2025 => 3,
                            2026 => 4,
                            2027 => 5,
                            2028 => 6,
                            2029 => 7,
                            2030 => 8
                        ];
                        if (array_key_exists($anio, $c_anio)) {
                            $cod_anio = $c_anio[$anio];
                        }
                        $consulta = "SELECT dia FROM asistencia_g WHERE nie = '$nie' AND dia = '$fecha' AND c_turno = '$c_turno'";
                        $comprobar = $conexion->query($consulta); 
                        if ($comprobar) {
                            $turno = $comprobar->fetch_assoc();
                            if (!$turno) {
                                $insert = "INSERT INTO asistencia_g (c_asisg, nie, c_anio, c_turno, hora, dia, asisg, asg_j, asig_in, asg_ai) VALUES (null, '$nie', '$cod_anio', '$c_turno', '$hora', '$fecha', 'A', null, null, null )";
                                $into = $conexion->query($insert);        
                            }    
                        }     
                        echo '</td>';
                        echo '<td class="seccion">';
                        echo 'secci&oacute;n: ' . $datos['seccion']; 
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
            }        
    }
}
?>

</body>
</html>