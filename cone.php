<?php
    $db_host="srv1082.hstgr.io";
    $db_nombre="u328483004_IncasIngles";
    $db_usuario="u328483004_ingles123";
    $db_contraseña="Incas10073@";

    $conexion = mysqli_connect($db_host,$db_usuario,$db_contraseña,$db_nombre);

    if (mysqli_connect_errno()) {
        echo "No se pudo conectar con la Base de Datos";
        exit();
    }
   
    mysqli_set_charset($conexion,"utf8");
?>