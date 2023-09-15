<?php 
//include '/Classes/DataBase.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <br><br>
    <a href="./index.php?login=0">cerrar sesion</a>
    <br><br>

    <?php

// Crea una instancia de la clase Conexion
$conexion = new Database();

// Obtiene la conexión a la base de datos
$conn = $conexion->getConnection();

// Consulta SQL para obtener los usuarios
$sql = "SELECT * FROM usuarios_pass";
$resultado = $conn->query($sql);

if ($resultado->rowCount() > 0) {
    // Iterar a través de los resultados y mostrar los usuarios
    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row["id"] . " - Usuario: " . $row["usuario"] . " - Nombre: " . $row["nombre"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "No se encontraron usuarios.";
}

// Cierra la conexión a la base de datos
$conn=null;
?>


</body>
</html>