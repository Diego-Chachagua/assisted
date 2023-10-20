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
            $sql3 = "SELECT nombre, foto FROM estudiantes WHERE descriptores LIKE '%$perfil'";
            $result3 = $conexion->query($sql3);

            if ($result3->num_rows > 0) {
                while ($fila = $result3->fetch_assoc()) {
                    $nombre = $fila['nombre'];
                    $foto = $fila['foto'];

                    // Mostrar la imagen directamente en la página utilizando el esquema de datos base64
                    echo '<img src="data:image/jpeg;base64,' . $foto . '" alt="Foto del estudiante" width="100" height="100">';
                    echo $nombre;
                }
            }
        }
    }
}
?>
