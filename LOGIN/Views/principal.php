<?php 
//include '/Classes/DataBase.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <!-- Incluye los estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Bienvenido</h1>
        <br><br>
        <a href="./index.php?login=0" class="btn btn-danger">Cerrar Sesión</a>
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
            // Mostrar una tabla con los usuarios utilizando Bootstrap
            echo '<table class="table table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Usuario</th>';
            echo '<th>Nombre</th>';
            echo '<th>Email</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            
            // Iterar a través de los resultados y mostrar los usuarios en filas de la tabla
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["usuario"] . '</td>';
                echo '<td>' . $row["nombre"] . '</td>';
                echo '<td>' . $row["email"] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p class="text-center">No se encontraron usuarios.</p>';
        }

        // Cierra la conexión a la base de datos
        $conn=null;
        ?>

    </div>
    <!-- Incluye los scripts de Bootstrap al final del documento (antes de </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
