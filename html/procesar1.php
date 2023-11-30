<?php  ob_start(); ?>
<style>

.tab{
    margin-top: 30px;
    margin-left: 180px;
    background: white;
    text-align: center;
}

th{
    height: 40px;
    width: 80px;
    text-align: center;
    font-size: 13px;
}

td{
    width: 90px;
    font-size: 13px;
}

.nombre{
    margin-top: 10px;
    font-size: 30px;
    color: black;
    text-align: center;
}

.inst{
    margin-top: 5px;
    font-size: 16px;
    color: black;
    margin-left: 5px;
    margin-right: 5px;
}
</style>


<?php

function conexion(){
    $db_host="srv1082.hstgr.io";
    $db_nombre="u328483004_assisted";
    $db_usuario="u328483004_Asis2024";
    $db_contraseña="Assisted314";

    $conexion = mysqli_connect($db_host,$db_usuario,$db_contraseña,$db_nombre);

    if (mysqli_connect_errno()) {
        echo "No se pudo conectar con la Base de Datos";
        exit();
    }
   
    mysqli_set_charset($conexion,"utf8");
    return $conexion;
}

$conexion = conexion();
// Verificar si se han recibido datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nie = $_POST["nie"];
    $mes = $_POST["mes"];
    $año = $_POST["año"];

    // Realizar cualquier procesamiento adicional aquí
}

$sql1 = "SELECT nombre FROM estudiantes WHERE nie = '$nie'";

// Ejecutar la consulta
$result1 = $conexion->query($sql1);

// Verificar si se obtuvieron resultados
if ($result1->num_rows > 0) {
    // Extraer el nombre de la fila obtenida
    $row = $result1->fetch_assoc();
    $nombre = $row["nombre"];

    // Imprimir el nombre
    echo "<h1 class='nombre'>El alumno que esta consultando es: $nombre</h1>";
} else {
    echo "No se encontraron resultados para el NIE: $nie";
}
    echo "<p class='inst'>A continuaci&oacute;n se presenta una tabla en la que estas las siguietes columnas como son: asisg lo que hace referencia a la asistencia general si el estudiante asistio se marca con una letra A, tambiem esta asis_j la cual significa asistencia justificada se marca con una J y bajo de esta se encuentra la causa de esa justificación, adem&aacute;s tambiem se encuentra la asig_in que seria la asistencia institucional la cual se asignara cuando el instituto se encuentre en alguna actividad y el estudiante no pueda asistir se marcara con IN y por ultimo estaria asg_ai que esta seria cuando el estudiante no asiste y no tiene justidicacion y se manrca con IN</p>";

 

$sql = "SELECT hora, dia, asisg, asg_j, justificacion, asig_in, asg_ai FROM asistencia_g WHERE MONTH(dia) = $mes AND YEAR(dia) = $año AND nie = $nie";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table class='tab' border='3'>";
    
    // Muestra los datos en columnas
    $info_columnas = $resultado->fetch_fields();

    // Primero, imprime los encabezados de las columnas
    echo "<tr>";
    foreach ($info_columnas as $columna) {
        echo "<th>{$columna->name}</th>";
    }
    echo "</tr>";

    // Luego, imprime los datos de cada fila
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        foreach ($info_columnas as $columna) {
            echo "<td>{$fila[$columna->name]}</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}


$conexion->close();
?>
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

$dompdf->stream("porcentaje.pdf", array("Attachment" =>false));
?>