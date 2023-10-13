<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        function aceptar() {
            alert("Has presionado el boton Aceptar");
        }
    </script>
  <link rel="stylesheet" href="/assisted/css/cssm.css">
  <title>Registro</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="post">
                    <h2>Registro</h2>
                 <img src=\assisted\img\asis.png width="290px" height="140px"> 
                    <div class="inputbox">
                        <!-- //<ion-icon name="mail-outline"></ion-icon> -->
                        <input type="text" required name="usuario">
                        <label for="">Usuarios</label>
                    </div>
                    <div class="inputbox">
                        <!-- //<ion-icon name="lock-closed-outline"></ion-icon> -->
                        <input type="password" required name="contrasena">
                        <label for="">Contrase&ntilde;a</label>
                    </div>
                    <button id="aceptar" type="submit" name="registro">Ingresar</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php
require ('conexion.php');

if(isset($_POST['registro'])) {//Evaluea si hay datos
    if (strlen($_POST['usuario']) >= 1 or strlen($_POST['contrasena']) >= 1 ) {
        session_start();
        $usuario = trim($_POST['usuario']);//Llama los datos de usuario
        $password = trim($_POST['contrasena']);//Llama los datos de contraseña
        //Validad los datos
        $query="SELECT * FROM usuario WHERE usu_p='$usuario' AND contra_p='$password'";
        $consulta=mysqli_query($conexion,$query);
        $cantidad=mysqli_num_rows($consulta);
        if($cantidad>0){
            header("location: ./materias.html");
        }else{
           echo "Datos incorrectos";
        }


    }

}
?>
                      



