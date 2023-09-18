<?php 

//define("RAIZ", "C:\\xampp\\htdocs\\ProyectoMini\\LOGIN");
require_once(__DIR__ . '/../Configs/params.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inicio de Sesión</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="./index.php" method="post">
                    <h2 class="text-center">Inicio de Sesión</h2>
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" id="usuario" name="usuario" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña:</label>
                        <input type="password" id="contrasena" name="contrasena" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                </form>
                <h2 class="mt-4 text-center">¿No tienes cuenta? Regístrate.</h2>
                <form action="./index.php" method="post">
                    <input type="hidden" id="registrar" name="registrar" value="1">
                    <button type="submit" class="btn btn-success btn-block">Regístrate</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Incluye los scripts de Bootstrap al final del documento (antes de </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

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
</html> -->