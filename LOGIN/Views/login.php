<?php 

//define("RAIZ", "C:\\xampp\\htdocs\\ProyectoMini\\LOGIN");
require_once(__DIR__ . '/../Configs/params.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: 300px;
            margin: auto;
            background-color: #FFC;
            border: 2px solid #F00;
            padding: 5px
        }

        h2{
            text-align: center;
        }

        input[type="submit"]{
            display: block;
            margin: 0 auto; /* Esto centra horizontalmente el botón */
        }
    </style>
</head>

<?php
/* if(isset($_POST['usuario']) && $_POST['usuario'] !=''){

    $usuario = new Usuario();
    $existe = $usuario->validarInicioSesion($_POST['usuario'], $_POST['contrasena']);

    if($existe){
        echo "entramos!";
        header('location:principal.php');
    }else{
        echo "Usuario o contraseña errónea.";
    }

} */

?>
<body>
    <form action="./index.php" method="post">
        <label for="">Usuario:</label>
        <input type="text"id="usuario" name="usuario" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        
        <input type="submit" value="Iniciar sesión">
    </form>

    <h2>¿No tienes cuenta? Regístrate.</h2>
    <form action="./index.php" method="post">
        <input type="hidden" id="registrar" name="registrar" value="1">
        <input type="submit" value="Regístrate">
    </form>
   

</body>
</html>