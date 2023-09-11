<?php

include("../Model/usuario.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
if(isset($_POST['usuario']) && $_POST['usuario'] !=''){

    $usuario = new Usuario();
    $existe = $usuario->validarInicioSesion($_POST['usuario'], $_POST['contrasena']);
    echo "valor existe [$existe]";

    if($existe){
        echo "entramos!";
        header('location:principal.php');
    }

}

?>
<body>
    
    <form action="index.php" method="post">
        <label for="">Usuario:</label>
        <input type="text"id="usuario" name="usuario" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        
        <input type="submit" value="Iniciar sesión">
    </form>

    <h2>¿No tienes cuenta? Regístrate.</h2>
    <form action="formularioRegistro.php" method="">
        <input type="submit" value="Regístrate">
    </form>


</body>
</html>