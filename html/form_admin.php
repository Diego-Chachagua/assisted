<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="/assisted/css/login.css">
  <title>Formulario</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="post">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" required name="usuario">
                        <label for="">Usuario</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="contrasena">
                        <label for="">Contrase&ntilde;a</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Olvidastes <a href="#">tu contrase&ntilde;a</a></label>
                      
                    </div>
                    <button type="submit" name="registro">Log in</button>
                    <div class="register">
                        <p>No tienes una cuenta? <a href="#">Registrarse</a></p>
                    </div>
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
        $query="SELECT * FROM usuario WHERE usu_a='$usuario' AND contra_a='$password'";
        $consulta=mysqli_query($conexion,$query);
        $cantidad=mysqli_num_rows($consulta);
        if($cantidad>0){
            header("location: ./admin.html");
        }else{
           echo "Datos incorrectos";
        }


    }

}
?>