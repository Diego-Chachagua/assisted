<?php
include('../cone.php');

$sql = "SELECT descriptores FROM estudiantes WHERE nombre LIKE '%Diego Arturo%' AND descriptores IS NOT NULL";
$resultado = $conexion->query($sql);

if ($resultado) {
    if ($resultado->num_rows > 0) {
        $descriptores = array();
        $descriptores3 = array();
        
        while ($fila = $resultado->fetch_assoc()) {
            $descriptores[] = $fila['descriptores'];
        }
        
        foreach ($descriptores as $descriptores2) {
            $descriptores3[] = trim($descriptores2, '"');
        }
        
        // Convierte $descriptores3 en una cadena de texto separada por comas
        $cadena_descriptores = implode(', ', $descriptores3);
        
        // Elimina las comillas, corchetes, llaves y barras invertidas de la cadena
        $cadena_descriptores = str_replace(['"', '[', ']', '{', '}', '\\'], '', $cadena_descriptores);
        
        // Quita los números de posición y los dos puntos
        $cadena_descriptores = preg_replace('/\d+:\s?/', '', $cadena_descriptores);
        
        // Imprime la cadena de texto sin los números de posición y dos puntos
        echo $cadena_descriptores;
    }
}
?>
