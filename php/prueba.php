<!DOCTYPE html>
<html>
<head>
    <title>Entrada de Números</title>
</head>
<body>
    <?php
    $numero = ""; // Inicializa la variable número
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["numero"]) && is_numeric($_POST["numero"])) {
            // Si se envió un número válido, guárdalo en la variable
            $numero = $_POST["numero"];
        } else {
            echo "Por favor, ingrese un número válido.";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="numero">Ingrese un número:</label>
        <input type="text" id="numero" name="numero" pattern="[0-9]+" required>
        <input type="submit" value="Guardar">
    </form>

    <?php
    if (!empty($numero)) {
        // Si se ha ingresado un número válido, muestra el número
        echo "Número ingresado: " . $numero;
    }
    ?>
</body>
</html>
