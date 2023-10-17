<?php
require('../cone.php');
// Función para obtener descriptores faciales
function obtenerDescriptoresFaciales($conexion) {
    $sql = "SELECT descriptores FROM estudiantes WHERE descriptores IS NOT NULL";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $descriptores_faciales = array();
        $descriptor = array();
        while ($row = $result->fetch_assoc()) {
            $descriptores_faciales[] = $row["descriptores"];
        }
        foreach ($descriptores_faciales as $descriptor_foto) {
            $descriptor[] = trim($descriptor_foto, '"');
        }

        // Definir descriptoresFaciales en el ámbito global
        echo "<script>var descriptoresFaciales = " . json_encode($descriptor) . ";</script>";

        return json_encode($descriptor);
    }
    return null;
}


if (isset($_POST['j'])) {
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

        $sql3 = "SELECT nombre FROM estudiantes WHERE descriptores LIKE '%$perfil%'";
        $result3 = $conexion->query($sql3);

        if ($result3->num_rows > 0) {
            $nom = array();
            while ($fila = $result3->fetch_assoc()) {
                $nom[] = $fila['nombre'];
            }

            foreach ($nom as $nombre) {
                echo $nombre;
            }
        }
    }
} else {
    // Obtener descriptores faciales si no se recibió una solicitud AJAX
    $descriptor_json = obtenerDescriptoresFaciales($conexion);
    if ($descriptor_json === null) {
        echo "No se encontraron descriptores faciales.";
    } else {
        $descriptor = json_decode($descriptor_json, true);
        // Resto del código para procesar descriptores si es necesario
    }
}


?>
