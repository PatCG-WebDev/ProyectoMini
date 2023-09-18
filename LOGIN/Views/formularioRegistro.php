<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        h1{
            text-align: center;
        }

        form{
            width: 300px;
            margin: auto;
            background-color: #FFC;
            border: 2px solid #F00;
            padding: 5px
        }

        input[type="submit"]{
            display: block;
            margin: 0 auto; /* Esto centra horizontalmente el botón */
        }
    </style>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form action="./index.php" method="POST">
        <input type="hidden" name="registrar" id="registrar" value=1>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
