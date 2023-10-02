<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Dividir la pantalla en dos partes verticales</title>
    <script src="../face-api.js"></script>
    <style>
        /* Estilo para el contenedor principal */
        .container {
            display: flex; /* Utilizamos flexbox para dividir la pantalla */
            height: 100vh; /* Establecemos la altura al 100% del viewport */
        }

        /* Estilo para la primera columna (izquierda) */
        .column {
            flex: 1; /* La columna ocupa el 50% del ancho total */
            padding: 20px;
            background-color: red;
        }

        /* Estilo para la segunda columna (derecha) */
        .column2 {
            flex: 1; /* La columna ocupa el 50% del ancho total */
            padding: 20px;
            background-color: grey;
        }

          #video {
            margin: 0;
            padding: 0;
            width: 550px;
            height: 400px;
            display: flex;
            flex-direction: column; /
        }
        canvas {
    position: absolute;
    top: 0;
    left: 0;
    margin-top: 168px;
    margin-left: 20px;
    width: 550px;
     height: 400px;
    

}



        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    min-height: 100vh ;


}

header{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding: 30px 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
    background-color: blue;
}

.logo{
    font-size: 2em;
    color: #fff;
    user-select: none;
}

.navigation a {
    position: relative;
    font-size: 1.1em;
    color: #fff;
    font-weight: 600;
    text-decoration: none;
    margin-left: 20px;
    padding: 6px 15px;
    transform: .5s;
}

.navigation a:hover,
.navigation a.active{
color: #333;

}

.navigation a span{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #fff;
    border-radius: 30px;
    z-index: -1;
    transform: scale(0);
    opacity: 0;
    transition: .5s;
}

.navigation a:hover span,
.navigation a.active span{
transform: scale(1);
opacity: 1;
}


.parallax {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url("https://fondosmil.com/fondo/52705.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    
}

#text {
position: absolute;
font-size: 5em;
color: #1b283a;
text-shadow: 2px 4px 5px #f9f9f9;

}

.sec{
position: relative;
background: #fff;
padding: 30px 100px;


}

.sec h2{
font-size: 3em;
color: #01050c;
margin-bottom: 10px;

}

.sec p{
font-size: 1em;
color: rgb(76, 76, 168);
font-weight: 300;
text-align: justify;


}

    </style>
</head>
<body>
<header>
        <h2 class="logo"><img id="logo" src="/pag_web/images/logo1.png" ></h2>
        <nav class="navigation">
        <a href="#" class="active">Inicio<span></span></a>
        <a href="#">Asistencia<span></span></a>
        <a href="#">Secciones<span></span></a>
        <a href="#">Usuarios<span></span></a>
        </nav>
        </header><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="column">
            <!-- Contenido de la primera columna -->
            <video id="video" width="660" height="350" autoplay muted></video>
    <p id="mensaje"></p>
    <p id="resultado"></p>
    <script src="../JS/main.js"></script>
        </div>
        <div class="column2">
            <!-- Contenido de la segunda columna -->
            <h1>Columna 2</h1>
            <p>Contenido de la segunda columna.</p>
        </div>
    </div>
</body>
</html>


<?php
require('cone.php');

$sql = "SELECT descriptores_foto FROM alumnos";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si hay filas en el resultado, procesa y muestra los datos
    $descriptores_faciales = array();
    $descriptor = array();
    while ($row = $result->fetch_assoc()) {
        $descriptores_faciales[] = $row["descriptores_foto"];
    }
    foreach ($descriptores_faciales as $descriptor_foto) {
        $descriptor[] = trim($descriptor_foto, '"');
    }
    // Convierte el arreglo $descriptor a una cadena JSON
    $descriptor_json = json_encode($descriptor);
    // Imprime la cadena JSON como una variable JavaScript
    echo "<script> var descriptoresFaciales = " . json_encode($descriptor) . "; </script>";

}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $posicion = $_POST['j'];

    if ($posicion !== null) {
        $descriptr = array();
        $descriptr = $descriptor[$posicion]; // Agregar el descriptor al array
        $perfil = json_encode($descriptr);

        $sql2 = "SELECT nombre FROM alumnos WHERE descriptores_foto LIKE '%$perfil%'";

        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // Si hay filas en el resultado, procesa y muestra los nombres
            $nombres = array(); // Inicializar un array para almacenar los nombres
            while ($row2 = $result2->fetch_assoc()) {
                $nombres = $row2["nombre"];
            }
            // Imprimir los nombres
            json_encode($nombres);
        }
    }
}

?>




