<?php
include('conexion.php');
    $valor = "AI";

    $resultado = mysqli_query($conexion, "SELECT nie FROM estudiantes") or die(mysqli_error($conexion));

    while ($nie = mysqli_fetch_assoc($resultado)) {
        $niee = $nie['nie'];

        // Utiliza una sentencia INSERT INTO para agregar un nuevo registro para cada estudiante
       $insertar= mysqli_query($conexion, "INSERT INTO asistencia_g (c_asisg, nie, c_anio, c_turno, turno, dia, asis_g, asg_j, asign_in, asg_ai) SELECT nie, 'AI' FROM estudiantes");
    }

?>
